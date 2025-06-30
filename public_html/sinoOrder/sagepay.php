<?php

/**
 * PHP SagePay Server Integration
 *
 * @author Rudi Visser <http://www.rudiv.se/>
 * @copyright Rudi Visser 2012
 */
 
class SagePay_Server
{
	const PROTOCOL = '2.23';
	
	const SIMULATOR_URL = 'https://test.sagepay.com/simulator/VSPServerGateway.asp?Service=VendorRegisterTx';
	const TEST_URL = 'https://test.sagepay.com/gateway/service/vspserver-register.vsp';
	const LIVE_URL = 'https://live.sagepay.com/gateway/service/vspserver-register.vsp';

	protected $_vendor_name = '';
	protected $_environment = 'TEST';
	protected $_profile = 'NORMAL'; // Or LOW for iFrame
	protected $_transaction_reference = '';
	protected $_basket = array();
	
	private $_request_construction = array();
	private $_constructed_request;
	private $_server_response;

	public function __construct($vendorName, $environment = 'TEST', $currency='GBP')
	{
		$this->_vendor_name = $vendorName;
		$this->_environment = $environment;
		
		$this->_request_construction['VPSProtocol'] = self::PROTOCOL;
		$this->_request_construction['TxType'] = 'PAYMENT';
		$this->_request_construction['Currency'] = $currency;
		$this->_request_construction['Vendor'] = $this->_vendor_name;
		$this->_request_construction['Profile'] = $this->_profile;
		
		$this->newTransaction();
	}
	
	public function setOptions($notifyurl = '', $description = '', $giftaid = 0, $avscv2 = 1, $threedsecure = 1)
	{
		$this->_request_construction['NotificationURL'] = $notifyurl;
		$this->_request_construction['Description'] = $description;
		$this->_request_construction['AllowGiftAid'] = $giftaid;
		$this->_request_construction['ApplyAVSCV2'] = $avscv2;
		$this->_request_construction['Apply3DSecure'] = $threedsecure;
	}
	
	public function newTransaction()
	{
		$this->_transaction_reference = $this->_vendor_name . "-" . date('d_m_h_i_s') . "-" . rand(0,4200);
		$this->_request_construction['VendorTxCode'] = $this->_transaction_reference;
	}
	
	public function setReference($reference)
	{
		$this->_transaction_reference = $reference . "-" . rand(0,4200);
		$this->_request_construction['VendorTxCode'] = $this->_transaction_reference;
	}
	
	public function addItem($name, $qty, $price, $vat = 0.00)
	{
		$this->_basket[] = array(
			'name' => $name,
			'qty' => $qty,
			'price' => $price,
			'vat' => $vat
		);
	}
	
	protected function _calculateBasket()
	{
		$total_price = 0.00;
		foreach ($this->_basket as $basketItem) {
			$total_price += ($basketItem['qty'] * $basketItem['price']);
		}
		return $total_price;
	}
	
	protected function _getBasket()
	{
		$constructed_string = '';
		$itemcount = 0;
		foreach ($this->_basket as $basketItem) {
			$constructed_string .= ':' . $basketItem['name'] . ':' . $basketItem['qty'];
			$constructed_string .= ':' . number_format($basketItem['price'], 2); /** Price ex-Vat **/
			$constructed_string .= ':' . "0.00"; /** VAT component **/
			$constructed_string .= ':' . number_format($basketItem['price'], 2); /** Item price **/
			$constructed_string .= ':' . number_format($basketItem['price'] * $basketItem['qty'], 2); /** Line total **/
			$itemcount++;
		}
		return $itemcount . $constructed_string;
	}
	
	public function setEmail($email)
	{
		$this->_request_construction['CustomerEMail'] = $email;
	}
	
	public function setBillingAddress($firstName, $surname, $address1, $address2 = '', $city, $postcode, $country, $state, $phone)
	{
		// If surname is invalid, default it to 'Surname' in hope that they will fix it..
		if (empty($surname))
			$surname = 'Surname';
		
		$this->_request_construction['BillingFirstnames'] = $firstName;
		$this->_request_construction['BillingSurname'] = $surname;
		$this->_request_construction['BillingAddress1'] = $address1;
		$this->_request_construction['BillingAddress2'] = $address2;
		$this->_request_construction['BillingCity'] = $city;
		$this->_request_construction['BillingPostCode'] = $postcode;
		$this->_request_construction['BillingCountry'] = ($country == 'UK' ? 'GB' : $country);
		$this->_request_construction['BillingState'] = $state;
		$this->_request_construction['BillingPhone'] = $phone;
		
		// If the delivery address has not been set yet, default to be the same
		if (empty($this->_request_construction['DeliveryFirstnames'])) {
			$this->setDeliveryAddress($firstName, $surname, $address1, $address2 = '', $city, $postcode, $country, $state, $phone);
		}
	}
	
	public function setDeliveryAddress($firstName, $surname, $address1, $address2 = '', $city, $postcode, $country, $state, $phone)
	{
		// If surname is invalid, default it to 'Surname' in hope that they will fix it..
		if (empty($surname))
			$surname = 'Surname';
		
		$this->_request_construction['DeliveryFirstnames'] = $firstName;
		$this->_request_construction['DeliverySurname'] = $surname;
		$this->_request_construction['DeliveryAddress1'] = $address1;
		$this->_request_construction['DeliveryAddress2'] = $address2;
		$this->_request_construction['DeliveryCity'] = $city;
		$this->_request_construction['DeliveryPostCode'] = $postcode;
		$this->_request_construction['DeliveryCountry'] = ($country == 'UK' ? 'GB' : $country);
		$this->_request_construction['DeliveryState'] = $state;
		$this->_request_construction['DeliveryPhone'] = $phone;
	}
	
	protected function _constructRequest()
	{
		$amount = $this->_calculateBasket();
		$basket_string = $this->_getBasket();
		$this->_request_construction['Amount'] = number_format($amount, 2);
		$this->_request_construction['Basket'] = $basket_string;
		$this->_constructed_request = http_build_query($this->_request_construction);
	}
	
	protected function _makeRequest()
	{
		//set_time_limit(30);

		// Initialise output variable
		$output = array();

		// Open the cURL session
		$curlSession = curl_init();

		$url = self::SIMULATOR_URL;
		switch($this->_environment) {
			case 'TEST':
				$url = self::TEST_URL;
				break;
			case 'LIVE':
				$url = self::LIVE_URL;
				break;
		}
		
		// Set the URL
		curl_setopt ($curlSession, CURLOPT_URL, $url);
		// No headers, please
		curl_setopt ($curlSession, CURLOPT_HEADER, 0);
		// It's a POST request
		curl_setopt ($curlSession, CURLOPT_POST, 1);
		// Set the fields for the POST
		curl_setopt ($curlSession, CURLOPT_POSTFIELDS, $this->_constructed_request);
		// Return it direct, don't print it out
		curl_setopt($curlSession, CURLOPT_RETURNTRANSFER,1); 
		// This connection will timeout in 30 seconds
		curl_setopt($curlSession, CURLOPT_TIMEOUT,30); 
		//The next two lines must be present for the kit to work with newer version of cURL
		//You should remove them if you have any problems in earlier versions of cURL
		curl_setopt($curlSession, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($curlSession, CURLOPT_SSL_VERIFYHOST, 1);

		//Send the request and store the result in an array
		
		$rawresponse = curl_exec($curlSession);
		//Store the raw response for later as it's useful to see for integration and understanding 
		$_SESSION["rawresponse"]=$rawresponse;
		//Split response into name=value pairs
		$response = split(chr(10), $rawresponse);
		// Check that a connection was made
		if (curl_error($curlSession)){
			// If it wasn't...
			$output['Status'] = "FAIL";
			$output['StatusDetail'] = curl_error($curlSession);
		}

		// Close the cURL session
		curl_close ($curlSession);

		// Tokenise the response
		for ($i=0; $i<count($response); $i++){
			// Find position of first "=" character
			$splitAt = strpos($response[$i], "=");
			// Create an associative (hash) array with key/value pairs ('trim' strips excess whitespace)
			$output[trim(substr($response[$i], 0, $splitAt))] = trim(substr($response[$i], ($splitAt+1)));
		} // END for ($i=0; $i<count($response); $i++)

		// Return the output
		$this->_server_response = $output;
	}
	
	public function getSagePayUrl()
	{
		$this->_constructRequest();
		//die($this->_constructed_request);
		$this->_makeRequest();
		
		if ($this->_server_response['Status'] == 'OK') {
			return $this->_server_response['NextURL'];
		} else {
			return array('error' => print_r($this->_server_response, true));
		}
	}

}