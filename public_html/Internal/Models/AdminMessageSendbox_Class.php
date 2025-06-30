<?php
class AdminMessageSendbox {
	private $Id = null;
	private $ReceiveAdminIds = null;
	private $Title = null;
	private $Content = null;
	private $SendAdminId = null;
	private $CreateTime = null;
	private $IsEnable = null;
	private $Remark = null;
	
	function AdminMessageSendbox($Id=null, $ReceiveAdminIds=null, $Title=null, $Content=null, $SendAdminId=null, $CreateTime=null, 
		$IsEnable=null, $Remark=null)
	{
		$this->Id = $Id;
		$this->ReceiveAdminIds = $ReceiveAdminIds;
		$this->Title = $Title;
		$this->Content = $Content;
		$this->SendAdminId = $SendAdminId;
		$this->CreateTime = $CreateTime;
		$this->IsEnable = $IsEnable;
		$this->Remark = $Remark;
	}
	
	public function __get($property_name){
		return $this->$property_name;
	}
	
	public function __set($property_name, $value){
		$this->$property_name = $value;
	}
	
	public function __isset($property_name){
		return isset($this->$property_name);
	}
	
	public function __unset($property_name){
		unset($this->$property_name);
	}
}
?>