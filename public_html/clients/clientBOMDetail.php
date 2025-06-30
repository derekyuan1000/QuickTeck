<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/AdminService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/OrderService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/OrderStatusService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/OrderCommentService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/ImageUploadInfoService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/Common_Class.php");
require_once($_SERVER['DOCUMENT_ROOT']."/Management/PHPExcel/Classes/PHPExcel/IOFactory.php");

$adminService = new AdminService();
$orderService = new OrderService();
$orderStatusService = new OrderStatusService();
$orderCommentService = new OrderCommentService();
$imageUploadInfoService = new ImageUploadInfoService();

//$_GET[orderId]=8335;
//$_GET[key]=460796;

$bomComment = addslashes($_POST["comment"]);
$order = $orderService->GetOrderById($_REQUEST["orderId"]);
if(!$order || $_REQUEST["key"]!=$order->ClientRandomCode){
	echo "<script type='text/javascript'>location.href='../index.php';</script>";
	return;
}
if($bomComment){
	$now = date("Y-m-d H:i:s");
	$orderComment = new OrderComment(0, $order->Id, trim($bomComment), 8, $now, 4);
	$result1 = $orderCommentService->AddOrderComment($orderComment);
}
$lastBOM = $imageUploadInfoService->GetMaxNumberImageByOrderId($_REQUEST["orderId"],2);

class MyReadFilter implements PHPExcel_Reader_IReadFilter
{
	private $_startRow = 0;
	
	private $_endRow = 0;
	
	private $_columns = array();
	
	public function __construct($startRow, $endRow, $columns) {
		$this->_startRow	= $startRow;
		$this->_endRow		= $endRow;
		$this->_columns	= $columns;
	}
	
	public function readCell($column, $row, $worksheetName = '') {
		if ($row >= $this->_startRow && $row <= $this->_endRow) {
			if (in_array($column,$this->_columns)) {
				return true;
			}
		}
		return false;
	}
}

$inputFileType = 'Excel2007';
$sheetname = 'Sheet1';
$objReader = PHPExcel_IOFactory::createReader($inputFileType);
$objReader->setLoadSheetsOnly($sheetname);
$isShowBg = false;

if ($lastBOM && file_exists($_SERVER['DOCUMENT_ROOT']."/Management".$lastBOM->FilePath)){
	$inputFileName = $_SERVER['DOCUMENT_ROOT']."/Management".$lastBOM->FilePath;
	
	$objPHPExcel = $objReader->load($inputFileName);
	$sheet = $objPHPExcel->getSheetByName($sheetname);
	$highestRow = $sheet->getHighestRow();
	$highestColumm = $sheet->getHighestColumn();

	$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
}else{
	$inputFileName = $_SERVER['DOCUMENT_ROOT']."/clients/BOM_08122015.xlsx";
	
	$objPHPExcel = $objReader->load($inputFileName);
	$sheet = $objPHPExcel->getSheetByName($sheetname);
	$highestRow = $sheet->getHighestRow();
	$highestColumm = $sheet->getHighestColumn();
	
	$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
	$isShowBg = true;
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Printed Circuit Board Manufacturing and Assembly,UK PCB board manufacturer,PCB prototype,PCB board manufacturer</title>
    <meta name="description" content="PCB Assembly,PCB manufacturing,UK PCB board manufacturer,PCB prototype,PCB board manufacturer" />
    <meta name="keywords" content="PCB Manufacturing and Assembly,PCB manufacturing,UK PCB board manufacturer,PCB prototype,PCB board manufacturer" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<style type="text/css">
        .bg{
            width: 100%;
            height: 100%;
            margin: 0px;
            position: absolute;
            z-index: 100;
            top: 0px;
            left: 0px;
            background-color: #000;
            filter: alpha(opacity=5);
            -moz-opacity: 0.05;
            opacity: 0.05;
            font-size: 90px;
            color: White;
			text-align:center;
        }
    </style>
</head>
<body style="background:white;">
	<div class="bg" <?php if(!$isShowBg){echo "style='display:none'";} ?>>
		Sample&nbsp;&nbsp;Sample&nbsp;&nbsp;Sample&nbsp;&nbsp;Sample
        <br>
		Sample&nbsp;&nbsp;Sample&nbsp;&nbsp;Sample&nbsp;&nbsp;Sample
        <br>
		Sample&nbsp;&nbsp;Sample&nbsp;&nbsp;Sample&nbsp;&nbsp;Sample
		<br>
        Sample&nbsp;&nbsp;Sample&nbsp;&nbsp;Sample&nbsp;&nbsp;Sample
		<br>
        Sample&nbsp;&nbsp;Sample&nbsp;&nbsp;Sample&nbsp;&nbsp;Sample
		<br>
        Sample&nbsp;&nbsp;Sample&nbsp;&nbsp;Sample&nbsp;&nbsp;Sample
		<br>
        Sample&nbsp;&nbsp;Sample&nbsp;&nbsp;Sample&nbsp;&nbsp;Sample
		<br>
        Sample&nbsp;&nbsp;Sample&nbsp;&nbsp;Sample&nbsp;&nbsp;Sample
		<br>
        Sample&nbsp;&nbsp;Sample&nbsp;&nbsp;Sample&nbsp;&nbsp;Sample
	</div>
	<div style="width:1300px; height:<?php $height = count($sheetData)*20+900; echo $height."px"; ?>; border:#cccccc solid 1px; margin:auto; padding:10px">
    <div style="height:20px"></div>
    <form action="clientBOMDetail.php" method="post" name="form1">
    <table width="1300px" border="0" cellpadding="0" cellspacing="0" style="font-family:Arial">
        <tr>
            <td style="height: 30px;text-align:center;font-weight:bold;font-size:25px">
                 <?php echo $order->Number ?> board BOM list
            </td>
        </tr>
        <tr>
            <td style="height: 100px; font-size:12px; padding-left:150px">
                 <div style="float:left;clear:left;width:700px">
					<span style="font-size:16px;font-weight:bold;">Job Summary: </span><br/>
					<b>Quantity: </b><?php echo $order->Quantity ?><br/>
					<b>Target date: </b><?php $targetDate = explode(' ', $order->TargetDate); echo Common::ChangeDateFormat($targetDate[0],"date"); ?><br/>
					<b>Components sourcing type: </b><?php if($order->CSTypeId == 1){ echo "Quick-teck & Client";}else if($order->CSTypeId == 2){ echo "Quick-teck";}else if($order->CSTypeId == 3){ echo "Client";} ?><br/>
					<b>Quick-teck components sourcing status: </b><?php if($order->CSStatusId){$status = $orderStatusService->GetOrderStatusById($order->CSStatusId); echo $status->Status;} ?><br/>
					<b>Client components sourcing status: </b><?php if($order->CustomerCSStatusId){$status = $orderStatusService->GetOrderStatusById($order->CustomerCSStatusId); echo $status->Status;} ?><br/>
				 </div>
				 <div style="float:left;clear:right;width:300px">
					<img width="146px" height="73px" src="../images/logo.jpg" alt="Quick-teck"/>
				 </div>
				 
            </td>
        </tr>
        <tr>
			<td>
              <table width="1300px" border="0" cellpadding="0" cellspacing="1" style="background-color:black; font-size:12px; text-align:center;">
				<tr style="background-color:#C0C0C0; color:#F56600; font-weight:bold;">
					<td style="width: 50px;height: 20px;">
						Id<!--A-->
					</td>
					<td style="width: 150px;">
						Description<!--B-->
					</td>
					<td style="width: 50px;">
						Package<!--C-->
					</td>
					<td style="width: 50px;">
						Supplier<!--D-->
					</td>
					<td style="width: 100px;">
						Supplier Part No.<!--E-->
					</td>
					<td style="width: 50px;">
						Manufacturer<!--F-->
					</td>
					<td style="width: 100px;">
						Manufacturer Part No.<!--G-->
					</td>
					<td style="width: 100px;">
						QT Part number (Alternative parts)<!--H-->
					</td>
					<td style="width: 100px;">
						Referenct Designator<!--I-->
					</td>
					<td style="width: 50px;">
						Qty per board<!--J-->
					</td>
					<td style="width: 50px;">
						Qty in total<!--K-->
					</td>
					<td style="width: 50px;">
						QT Unit Pirce<!--L-->
					</td>
					<td style="width: 50px;">
						Sub-total<!--M-->
					</td>
					<td style="width: 230px;">
						Comment<!--V-->
					</td>
					<td style="width: 120px;">
						Status<!--W-->
					</td>
				</tr>
				<?php 
				$lineCount = 0;
				$totalQty = 0;
				$totalCost = 0;
				for($i=5; $i < count($sheetData)+1; $i++){
					$lineCount ++;
				?>
				<tr style="background-color:White;">
					<td style="height: 20px;">
						<?php echo $sheetData[$i]['A'];?>
					</td>
					<td>
						<?php echo $sheetData[$i]['B']; ?>
					</td>
					<td>
						<?php echo $sheetData[$i]['C']; ?>
					</td>
					<td>
						<?php echo $sheetData[$i]['D']; ?>
					</td>
					<td>
						<?php echo $sheetData[$i]['E']; ?>
					</td>
					<td>
						<?php echo $sheetData[$i]['F']; ?>
					</td>
					<td>
						<?php echo $sheetData[$i]['G']; ?>
					</td>
					<td>
						<?php echo $sheetData[$i]['H']; ?>
					</td>
					<td style="word-break:break-all">
						<?php echo $sheetData[$i]['I']; ?>
					</td>
					<td>
						<?php echo $sheetData[$i]['J']; $totalQty += $sheetData[$i]['J']; ?>
					</td>
					<td>
						<?php echo $sheetData[$i]['K']; ?>
					</td>
					<td>
						<?php echo $sheetData[$i]['L']; ?>
					</td>
					<td>
						<?php echo $sheetData[$i]['M']; $totalCost += substr($sheetData[$i]['M'], 2, strlen($sheetData[$i]['M']));?>
					</td>
					<td>
						<?php echo $sheetData[$i]['V']; ?>
					</td>
					<td>
						<?php echo $sheetData[$i]['W']; ?>
					</td>
				</tr>
				<?php
				}
				?>
			  </table>
			</td>
		</tr>
        <tr>
            <td style="height:20px">
                &nbsp;
            </td>
        </tr>
		<tr>
			<td>
			<table width="250px" border="0" cellpadding="0" cellspacing="1" style="background-color:black; font-size:12px;">
				<tr style="background-color:White;">
					<td style='width:150px; height: 20px;font-weight:bold;'>
						&nbsp;BOM lines:
					</td>
					<td style="100px">
						&nbsp;<?php echo $lineCount; ?>
					</td>
				</tr>
				<tr style="background-color:White;">
					<td style='height: 20px;font-weight:bold;'>
						&nbsp;Total components qty:
					</td>
					<td>
						&nbsp;<?php echo $totalQty; ?>
					</td>
				</tr>
				<tr style="background-color:White;">
					<td style='height: 20px;font-weight:bold;'>
						&nbsp;Total components cost:
					</td>
					<td>
						&nbsp;<?php echo "&pound;".number_format($totalCost,2); ?>
					</td>
				</tr>
			</table>
			</td>
		</tr>
		<tr>
            <td style="height:20px">
                &nbsp;
            </td>
        </tr>
        <tr>
            <td style='height: 80px;font-size:12px; font-weight:bold;'>
			Notes: <br/>
			1. Please use this template to ask for assembly and/or components sourcing quotes. <br/> 
			2. You don't need to provide the 'Manufacturer' and 'Manufacturer part no.' information, if you use Quick-teck as the supplier(input 'Quick-teck in the 'Supplier' cell')<br/>
			3. Quick-teck China factory have over 4000 different components in stock. These parts are most common and popular used in our China factory site.The average price for these components
			 is just one third of Europe suppliers. The real time in stock information can be found from: <a href="http://www.quick-teck.co.uk/ElectronicElement/eeList.php" target="_blank">http://www.quick-teck.co.uk/ElectronicElement/eeList.php</a><br/>
			4. Any miss information or different format BOM file may result in additional engineering charges. <br/>
            </td>
        </tr>
		<tr>
            <td style="height:20px">
                &nbsp;
            </td>
        </tr>
        <tr>
            <td style='height: 50px;'>
                <table width="50%" border="0" cellpadding="0" cellspacing="1" style="background-color:black; font-size:12px; text-align:center; margin-top:2px; margin-bottom:2px">
					<tr style="background-color:White;">
						<td style="width:120px; height:23px;">
							<b>Time</b>
						</td>
						<td style="width:200px">
							<b>BOM Comment</b>
						</td>
						<td style="width:80px;">
							<b>Author</b>
						</td>
					</tr>
					<?php 
					$allOrderComment = $orderCommentService->GetOrderCommentByOrderId($order->Id, 4);
					for($i=0; $i < count($allOrderComment); $i++)
					{
					?>
					<tr style="background-color:White;">
						<td style="height:23px;">
							<?php echo Common::ChangeDateFormat($allOrderComment[$i]->Time,"dateTime"); ?>
						</td>
						<td style="text-align:left; padding:2px">
							<?php echo nl2br($allOrderComment[$i]->Comment) ?>
						</td>
						<td>
							<?php 
								$admin = $adminService->GetAdminById($allOrderComment[$i]->AdminId); 
								if($allOrderComment[$i]->AdminId == 8){
									echo "Client";
								}else{
									echo $admin->Name;
								}
							?>
							
						</td>
					</tr>
					<?php
					}
					?>
				</table>
            </td>
        </tr>
    </table>
    <br/>
    Your comment:<br/>
    <textarea id="comment" name="comment" rows="4" class="adminMyInput3" style="width:505px; margin-bottom:5px"></textarea>
    <input id="orderId" name="orderId" type="hidden" value="<?php echo $order->Id ?>"/>
    <input id="orderId" name="key" type="hidden" value="<?php echo $order->ClientRandomCode ?>"/>
    <p class="mt10 tc"><input type="submit" value="Submit" class="submit_bn"  name="send" /></p>
    </form>
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
