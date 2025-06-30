<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/QuotationInfoService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/QuotationDetailService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/Common_Class.php");

$quotationInfoService = new QuotationInfoService();
$quotationDetailService = new QuotationDetailService();
if($_GET[number]){
	$quotationInfo = $quotationInfoService->GetQuotationInfoByNumber($_GET[number]);
}
if(!$quotationInfo || $_GET[key]!=$quotationInfo->RandomCode){
	echo "<script type='text/javascript'>location.href='../index.php';</script>";
	return;
}
$quotationDetailArray = $quotationDetailService->GetQuotationDetailByInfoId($quotationInfo->Id);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>UK PCB,Printed Circuit Board Manufacturing and Assembly,UK PCB board manufacturer,PCB prototype,PCB board manufacturer</title>
    <meta name="description" content="PCB Assembly,PCB manufacturing,UK PCB board manufacturer,PCB prototype,PCB board manufacturer" />
    <meta name="keywords" content="PCB Manufacturing and Assembly,PCB manufacturing,UK PCB board manufacturer,PCB prototype,PCB board manufacturer" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body style="background:white;">
	<div style="width:800px; height:1030px; border:#cccccc solid 1px; margin:auto; padding:10px">
    <div style="height:20px"></div>
    <table width="800px" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td rowspan="4" style="height: 90px; width: 150px">
                <img width="146px" height="73px" src="../images/logo.jpg" alt="Quick-teck"/>
            </td>
            <td style='width: 250px;height:30px;text-align:center;font-weight:bold; font-size:20px'>
                Quick-teck Electronics
            </td>
            <td colspan="2" style='text-align:center;font-weight:bold; font-size:20px'>
                Quotation
            </td>
        </tr>
        <tr>
            <td style='height: 20px; text-align:center'>
                <a href="mailto:info@quick-teck.co.uk" style="color:blue">info@quick-teck.co.uk</a>
            </td>
            <td style="width: 200px;text-align:right">
                Quotation Number:
            </td>
            <td style="width: 200px;">
				&nbsp;&nbsp;<?php echo $quotationInfo->Number ?>
            </td>
        </tr>
        <tr>
            <td style='height: 20px; text-align:center'>
                Unit 3,Clare Hall
            </td>
            <td colspan="2">
            </td>
        </tr>
        <tr>
            <td style='height: 20px; text-align:center'>
                St. Ives Business Park,<br> St Ives, Cambridgeshire, UK<br>PE27 4WY
            </td>
            <td style="text-align:right">
                Date:
            </td>
            <td>
				&nbsp;&nbsp;<?php echo Common::ChangeDateFormat($quotationInfo->CreateTime,"date"); ?>
            </td>
        </tr>
        <tr>
            <td style='height: 20px;'>
            </td>
            <td style="text-align:center">
                T: 01480-764976
            </td>
            <td colspan="2">
            </td>
        </tr>
        <tr>
            <td style='height: 20px;'>
            </td>
            <td style="text-align:center">
                Company No. 09615552
            </td>
            <td style="text-align:right">
                Customer Ref No:
            </td>
            <td>
				&nbsp;&nbsp;<?php echo $quotationInfo->CustomerRefNo ?>
            </td>
        </tr>
        <tr>
            <td colspan="4" style='height: 20px'>
            </td>
        </tr>
        <tr>
            <td colspan="4" style="height:20px"></td>
        </tr>
        <tr>
            <td style='height: 30px; font-weight:bold'>
                Contact Name:
            </td>
            <td colspan="3" style='font-weight:bold'>
				<?php echo $quotationInfo->ContactName ?>
            </td>
        </tr>
        <tr>
            <td style='height: 30px; font-weight:bold'>
                Contact Email:
            </td>
            <td colspan="3" style='font-weight:bold'>
				<?php echo $quotationInfo->ContactEmail ?>
            </td>
        </tr>
        <tr>
            <td colspan="4" style="height:30px"></td>
        </tr>
        <tr>
            <td style='height: 20px; font-weight:bold'>
                Based on
            </td>
            <td colspan="3">
            </td>
        </tr>
        <tr>
            <td colspan="4" style='height: 20px'>
				<?php echo $quotationInfo->BaseOn ?>
            </td>
        </tr>
        <tr>
            <td style='height: 130px' colspan="4">
                <table id="tbTable"  width="790px" border="0" cellpadding="0" cellspacing="1" style="background-color:#a8c7ce; font-size:12px; text-align:center; margin:2px">
			        <tr style="background-color:#DBE5F1; color:#344b50;">
				        <td style="height:35px; font-weight:bold; background-color:#F3F3F3"><?php if($quotationInfo->CurrencyType == 1){echo "Price in GBP(&pound;)";}else if($quotationInfo->CurrencyType == 2){echo "Price in EUR(&euro;)";}   ?> </td>
				        <td colspan="7" style="background-color:#EEECE1; font-weight:bold">Lead time in working days</td>
			        </tr>
			        <tr style="background-color:#EEECE1; color:#344b50;">
				        <td style="width:110px; height:25px; background-color:#EEECE1; font-weight:bold">Quantity</td>
				        <td style="width:110px;font-weight:bold">9</td>
				        <td style="width:110px;font-weight:bold">8</td>
				        <td style="width:110px;font-weight:bold">7</td>
				        <td style="width:110px;font-weight:bold">6</td>
				        <td style="width:110px;font-weight:bold">5</td>
				        <td style="width:130px;font-weight:bold">Laid-back option (12-16)</td>
			        </tr>
			        <?php for ($i = 0; $i < count($quotationDetailArray); $i=$i+7) {  ?>
						<tr name="loop" style="background-color:#ffffff; color:#344b50;">
							<td style="height:25px; background-color:#DBE5F1;font-weight:bold">
								<?php echo $quotationDetailArray[$i+0]->Quantity  ?>
							</td>
							<!--<td style="height:25px; background-color:#DBE5F1;font-weight:bold">
								<?php if($quotationDetailArray[$i+0]->Price != 0){ echo $quotationDetailArray[$i+0]->Price;}else{echo $quotationDetailArray[$i+0]->PriceComment;} ?>
							</td>-->
							<td style="height:25px; background-color:#DBE5F1;font-weight:bold">
								<?php if($quotationDetailArray[$i+1]->Price != 0){ echo $quotationDetailArray[$i+1]->Price;}else{echo $quotationDetailArray[$i+1]->PriceComment;}  ?>
							</td>
							<td style="height:25px; background-color:#DBE5F1;font-weight:bold">
								<?php if($quotationDetailArray[$i+2]->Price != 0){ echo $quotationDetailArray[$i+2]->Price;}else{echo $quotationDetailArray[$i+2]->PriceComment;}  ?>
							</td>
							<td style="height:25px; background-color:#DBE5F1;font-weight:bold">
								<?php if($quotationDetailArray[$i+3]->Price != 0){ echo $quotationDetailArray[$i+3]->Price;}else{echo $quotationDetailArray[$i+3]->PriceComment;}  ?>
							</td>
							<td style="height:25px; background-color:#DBE5F1;font-weight:bold">
								<?php if($quotationDetailArray[$i+4]->Price != 0){ echo $quotationDetailArray[$i+4]->Price;}else{echo $quotationDetailArray[$i+4]->PriceComment;}  ?>
							</td>
							<td style="height:25px; background-color:#DBE5F1;font-weight:bold">
								<?php if($quotationDetailArray[$i+5]->Price != 0){ echo $quotationDetailArray[$i+5]->Price;}else{echo $quotationDetailArray[$i+5]->PriceComment;} ?>
							</td>
							<td style="height:25px; background-color:#DBE5F1;font-weight:bold">
								<?php if($quotationDetailArray[$i+6]->Price != 0){ echo $quotationDetailArray[$i+6]->Price;}else{echo $quotationDetailArray[$i+6]->PriceComment;}  ?>
							</td>
						</tr>
					<?php }  ?>
		        </table>
		    </td>
        </tr>
		<tr>
            <td style='height: 30px;' colspan="4">
			   * Shipping cost included in the prices.<br/>
               * All prices shown above are exclusive of VAT.
            </td>
        </tr>
		<tr>
            <td style='height: 30px;' colspan="4">
            </td>
        </tr>
        <tr>
            <td style='height: 20px; font-weight:bold'>
                Payment methods:
            </td>
            <td colspan="3">
            </td>
        </tr>
		<tr>
            <td style='height: 12px;' colspan="4">
            </td>
        </tr>
        <tr>
            <td style='height: 20px;'>
                - Pay online:
            </td>
            <td colspan="3">
                <a href="https://www.quick-teck.co.uk/order/manualpayment.php" target="_blank" style="color:blue">http://www.quick-teck.co.uk/order/manualpayment.php</a>
            </td>
        </tr>
		<tr>
            <td style='height: 12px;' colspan="4">
            </td>
        </tr>
        <tr>
            <td style='height: 20px;'>
                - PayPal:
            </td>
            <td colspan="3">
                <span style="color:blue">sales@quick-teck.co.uk</span>
            </td>
        </tr>
		<tr>
            <td style='height: 12px;' colspan="4">
            </td>
        </tr>
        <tr>
            <td style='height: 20px; vertical-align:top'>
                - BACS bank transfer:
            </td>
            <td colspan="3" style="color:blue">
                Bank: HSBC(UK)<br>
                Account name: Quick-teck<br>
                Sort code: 40-24-20<br>
                Account number: 71787543<br>
                Reference: (your order or quotation number)<br>
            </td>
        </tr>
        <tr>
            <td style='height: 12px;' colspan="4">
            </td>
        </tr>
        <tr>
            <td style='height: 20px;'>
                - Cheque:
            </td>
            <td colspan="3">
                <span style="color:blue">should be made payable to ‘Quick-teck’.</span>
            </td>
        </tr>
		<tr>
            <td style='height: 20px;' colspan="4">
            </td>
        </tr>
		<tr>
            <td style='height: 20px; font-weight:bold'>
                Terms & Conditions:
            </td>
            <td colspan="3">
            </td>
        </tr>
		<tr>
            <td style='height: 45px;' colspan="4"><br />
1. Quotation is only valid for 45 days from the quoting date. Payment should be made at the time of ordering.</br> 
2. Lead time is counted as manufacturing time + shipping time.</br>
3. The default quality inspection standard (IPC-A-600G class II) is subject to other sales agreement between clients and Quick-teck.</br>
4. Saving option orders are not compliance with IPC-A-600G class II inspection standard.</br>  
5. Production and operation are made according to the files and specifications from clients.</br>

            </td>
        </tr>	
    </table>
	</div>
	
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-12471272-1");
pageTracker._trackPageview();
} catch(err) {}</script>

</body>
</html>
