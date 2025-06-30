<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/EETypeService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/EEAttributeService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/EEElectronicElementService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/EEAttributeValueService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/EEFileUploadInfoService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/Config_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/Common_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/Pager_Class.php");


$eeTypeService = new EETypeService();
$eeAttributeService = new EEAttributeService();
$eeElectronicElementService = new EEElectronicElementService();
$eeAttributeValueService = new EEAttributeValueService();
$eeFileUploadInfoService = new EEFileUploadInfoService();

$searchTypeId = $_REQUEST[searchTypeId];
$searchKeyWord = $_REQUEST[searchKeyWord];
$currentPage = $_GET[page];

$oaId = $_GET[oaId];//orderEEAttributeId
$omId = $_GET[omId];//orderModeId
$doId = $_GET[doId];//divOrderId

if($searchTypeId){
	$_SESSION[searchTypeId] = $searchTypeId;
}
if($searchKeyWord){
	$_SESSION[searchKeyWord] = $searchKeyWord;
}
if(!$searchTypeId){
	$searchTypeId = $_SESSION[searchTypeId];
}
if(!$searchKeyWord){
	$searchKeyWord = $_SESSION[searchKeyWord];
}

$_SESSION[categoryTypeId] = $searchTypeId;

if(!$currentPage){
	$currentPage = 1;
}
if(!$oaId){
	$oaId = 4;//Price
}
if(!$omId || $omId == 1){
	$orderMode = "ASC";
}else if($omId == 2){
		$orderMode = "DESC";
	}
if(!$doId){
	$doId = 2;
}
if($searchTypeId>0){
	$eeType = $eeTypeService->GetEETypeById($searchTypeId);
	$strTypeIds = $eeTypeService->GetParentAndChildrenEETypeById($searchTypeId);
	$result = $eeElectronicElementService->GetEEElectronicElementsByTypeIdsAndPage($strTypeIds, Config::$pageSize, $currentPage, $oaId, "2,5,6,78", $searchKeyWord, $orderMode);
}else{
	$result = $eeElectronicElementService->GetEEElectronicElementsByPage(Config::$pageSize, $currentPage, $oaId, "2,5,6,78", $searchKeyWord, $orderMode);
}
$recoudCount = $result[0];
$eeArray = $result[1];
$pager = new Pager(Config::$pageSize,$recoudCount,$currentPage,"searchList.php?searchTypeId=".$searchTypeId."&oaId=".$oaId."&omId=".$omId."&doId=".$doId."&searchKeyWord=".$searchKeyWord."&page=");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>PCB Manufacturing,UK printed circuit board Online Quote,UK PCB Manufacturer,circuit board Prototype manufacture</title>
<meta name="description" content="Low Cost PCB Manufacturing,Online Quote PCB,pcb manufacture,UK circuit board Prototype Fabrication offering two layers prototype to multilayer PTH printed circuit board." />
<meta name="keywords" content="Low Cost PCB Manufacturing,Online Quote PCB price,pcb manufacturer,UK PCB Prototype Manufacture,pcbs,PCB Prototype Fabrication,Fabrication, double layers PCB prototype" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/rescources/css/style.css" rel="stylesheet" type="text/css" />
<link href="/rescources/css/accordion.css" type="text/css" rel="stylesheet" />
<style type="text/css">
.dialogWindowBin{
	position:absolute;left:0;top:0;background:#F9F9F9;border:1px #CCC solid;display:none;padding:10px;
}
.Titlediv
{
    border: 2px solid #ccc;
    height:36px;
    padding-left: 10px;
    vertical-align: middle;
    font-size: 16px;
}
.Titlediv td
{
    height: 36px;
    background-repeat: no-repeat;
    background-position:center;
}
.td1
{
    color: Red;
    width: 72px;
}
.td2
{
    width: 70px;
}
.td3
{
    width: 70px;
}
.td4
{
    width: 500px;
    text-align: right;
    padding-right: 5px;
    font-size: 14px;
}
hr
{
    height: 1px;
    border: none;
    border-top: 1px solid #ccc;
    padding-bottom: 5px;
}
.Textbuy
{
	 width:40px;
	 height:20px;
	 border:1px solid #cfcfcf;
	 padding-left:3px;
	}
</style>
<script type="text/javascript" src="/rescources/js/jquery.min.js"></script>
<script type="text/javascript" src="/rescources/js/ainatec.js"></script>
<script type="text/javascript" src="/rescources/js/accordion.js"></script>
<script type="text/javascript" src="scripts/Script.js"></script>
<script type="text/javascript" src="../Management/Scripts/admin.js"></script>
<script type="text/javascript">
function myOpen(url,height,width){
	window.open(url,'','height='+height+', width='+width+', top=100, left=100, location=no, toolbar=no, menubar=no, scrollbars=no, resizable=yes, location=no, status=no');
}
$(document).ready(function(){
	$(".dialogShow").mouseout(function(){$("#dialogWindowBin").fadeOut(500,function(){$("#dialogWindowBin").html("");});});
});
function ShowDialog(obj,url)
{
	var oRect=obj.getBoundingClientRect();
	x=oRect.left;
	y=oRect.top;
	x+=20;y+=20+$(document).scrollTop();
	
	$("#dialogWindowBin").css({'left':x,'top':y});
	$("#dialogWindowBin").fadeIn(500,function()
	{
		$("#dialogWindowBin").load(url);
	}
	);
}
</script>
</head>
<body class="bg">
<div class="dialogWindowBin" id="dialogWindowBin"></div>
<?php include '../static/header.php';?>
<div class="w980 auto clearbox mt5">
		<div class="w980 banner"><a href="/onlinequote/onlinequote.php" title=""><img src="/rescources/images/banner02.jpg" width="980" height="170" alt="" /></a></div>
		<div class="bnav ico_home mt10"><a href="/" title="">Home</a> - <a href="#" title="">Electronic component</a></div>
		<div class="fl mt10 left_box">
			<?php
				$strClientTypeIds = $eeTypeService->GetAllEETypesString(1);
				$clientEE = $eeElectronicElementService->GetEEElectronicElementsByTypeIds($strClientTypeIds);
			?>
			<div class="left_nav_title">
				<span class="ico_title" style="font-size:12px"><a href="eeCriteria.php" style="color:red">Electronic Component&nbsp;<span style="font-weight:normal">(<?php echo count($clientEE) ?>)</span></a></span>
			</div>
			<div class="left_box_c">
				<?php include_once("category.php");?>
                <div class="mt10">
                </div>
			</div>
			<div class="left_box_b"></div>
		</div>
		<div class="w710 fr mt10">
			<?php  include_once("shoppingCarTop.php");?>
			<form name="form1" method="get" action="searchList.php">
				<p class="title_main" style="text-align: left; padding-left: 5px;">
					<?php //echo $eeType->Name; ?><span style="color: Black; padding-left: 10px; font-size: 14px;">Category:</span>
					<select id="searchTypeId" name="searchTypeId" style="width:200px">
						<option value="-1">--All--</option>
						<?php
						for($i=0; $i < count($eeTypeArray); $i++)
						{
							if($eeTypeArray[$i]->TypeLevel == 2){
						?>
							<option value="<?php echo $eeTypeArray[$i]->Id ?>" <?php if($eeTypeArray[$i]->Id == $searchTypeId){echo 'selected="selected"';}?>>&nbsp;&nbsp;--<?php echo $eeTypeArray[$i]->Name ?></option>
						<?php
							}else{
						?>
							<option value="<?php echo $eeTypeArray[$i]->Id ?>" <?php if($eeTypeArray[$i]->Id == $searchTypeId){echo 'selected="selected"';}?> ><?php echo $eeTypeArray[$i]->Name ?></option>
						<?php
							}
						}
						?>
					</select>
					<span style="color: Black; padding-left: 10px; font-size: 14px;">Key word:&nbsp;</span>
					<input id="searchKeyWord" name="searchKeyWord" type="text" value="<?php echo $searchKeyWord;?>" style="width:150px"/>
					<input class="toplogin_btn" id="Button1" type="submit" value="Search" />
				</p>
            </form>
            <div class="Titlediv" style="margin-top:10px">
                <table cellspacing="5" cellpadding="0" width="100%" border="0">
                    <tr>
                        <td class="td1">
                            Order by:
                        </td>
                        <td class="td2">
                            <a href="<?php echo "searchList.php?searchTypeId=".$searchTypeId."&oaId=4&omId=1&doId=2&searchKeyWord=".$searchKeyWord; ?>"><img <?php if($doId == 2){echo "src='../rescources/images/eeList_03.gif'";}else{echo "src='../rescources/images/eeList_01.gif'";} ?> height="36"/></a>
                        </td>
                        <td class="td3">
							<a href="<?php echo "searchList.php?searchTypeId=".$searchTypeId."&oaId=4&omId=2&doId=3&searchKeyWord=".$searchKeyWord; ?>"><img <?php if($doId == 2){echo "src='../rescources/images/eeList_04.gif'";}else{echo "src='../rescources/images/eeList_02.gif'";} ?> height="36"/></a>
                        </td>
                        <td class="td4">
                            Record Count:<?php echo $recoudCount; ?>
                        </td>
                    </tr>
                </table>
            </div>
            <div style="padding: 10px;">
                <?php 
				$eeAttributeArray = $eeAttributeService->GetEEAttributesByStrTypeIds2("");
				$searchKeyWord = str_replace('/','\/',$searchKeyWord);
				for($i=0; $i < count($eeArray); $i++)
				{
					$imageArray = $eeFileUploadInfoService->GetEEFileUploadInfoByEEIdAndTypeId($eeArray[$i]->Id, 1);
					$fileArray = $eeFileUploadInfoService->GetEEFileUploadInfoByEEIdAndTypeId($eeArray[$i]->Id, 2);
					$attributeValueArray = $eeAttributeValueService->GetEEAttributeValueByEEId($eeArray[$i]->Id);
				?>
					<table cellspacing="5" cellpadding="0" width="100%" border="0">
						<tr>
							<td class="w_111" rowspan="5">
								<?php 
									//Image
									$attributeValue = $attributeValueArray[78];
									if(count($imageArray) > 0){
										$imagePath = str_replace("..","../Management",$imageArray[0]->FilePath);
										echo "<img width='100' height='100' border='0' src='".$imagePath."' alt=''/>";
									}else{
										echo "<img width='100' height='100' border='0' src='' alt='".$attributeValue->AttributeValue."'/>";
									}
								?>
							</td>
							<td class="w_180">
								<?php 
									//Name
									$attributeValue = $attributeValueArray[78];
									
									$keyWordArray = explode(" ",$searchKeyWord);
									$name = $attributeValue->AttributeValue;
									for($j=0; $j < count($keyWordArray); $j++){
										if($keyWordArray[$j]!=""){
											$name = preg_replace("/($keyWordArray[$j])/i","<font color=red>\\1</font>",$name);
										}
									}
									echo "<a href='eeDetail.php?eeId=".$eeArray[$i]->Id."' style='font-weight:bold;color:blue; font-size:14px'>".$name."</a>";
								?>
							</td>
							<td class="w_150">
								<?php 
									//Manufacturer
									$attributeValue = $attributeValueArray[1];
									echo $eeAttributeArray[1]->Name.":&nbsp".$attributeValue->AttributeValue;
								?>
							</td>
							<td class="w_210">
								<?php 
									//Price1
									$attributeValue = $attributeValueArray[9];
									echo $attributeValue->AttributeValue;
									echo "~";
									$attributeValue = $attributeValueArray[10];
									echo $attributeValue->AttributeValue;
									echo ":&nbsp;";
									$attributeValue = $attributeValueArray[4];
									echo "<span style='font-weight:bold;'>&pound;".$attributeValue->AttributeValue."</span>";
								?>
							</td>
						</tr>
						<tr>
							<td class="w_111">
								<?php 
									//Category
									echo $eeTypeService->GetEETypeById($eeArray[$i]->TypeId)->Name;
								?>
							</td>
							<td class="w_111">
								<?php 
									//Datasheet
									if(count($fileArray) > 0){
										$filePath = str_replace("..","../Management",$fileArray[0]->FilePath);
										echo "Data sheet:&nbsp;<a target='_blank' href='".$filePath."' style='text-decoration:underline'>Download</a>";
									}else{
										echo "Data sheet:&nbsp;<span style='color:#cccccc'>Download</span>";
									}
								?>
							</td>
							<td class="w_111">
								<?php 
									$attributeValue = $attributeValueArray[12];
									echo $attributeValue->AttributeValue;
									echo "~";
									$attributeValue = $attributeValueArray[13];
									echo $attributeValue->AttributeValue;
									echo ":&nbsp;";
									$attributeValue = $attributeValueArray[11];
									echo "<span style='font-weight:bold;'>&pound;".$attributeValue->AttributeValue."</span>";
								?>
							</td>
						</tr>
						<tr>
							<td>
								<?php 
									//Package
									$attributeValue = $attributeValueArray[8];
									echo $eeAttributeArray[8]->Name.":&nbsp".$attributeValue->AttributeValue;
								?>
							</td>
							<td>
								<?php 
									//Value
									$attributeValue = $attributeValueArray[6];
									
									$keyWordArray = explode(" ",$searchKeyWord);
									$eeValue = $attributeValue->AttributeValue;
									for($j=0; $j < count($keyWordArray); $j++){
										if($keyWordArray[$j]!=""){
											$eeValue = preg_replace("/($keyWordArray[$j])/i","<font color=red>\\1</font>",$eeValue);
										}
									}
									
									echo $eeAttributeArray[6]->Name.":&nbsp".$eeValue;
								?>
							</td>
							<td>
								<?php 
									//Max order qty
									$attributeValue = $attributeValueArray[86];
									$maxOrderQty = $attributeValue->AttributeValue;
									//Stock qty
									$attributeValue = $attributeValueArray[93];
									$stockQty = $attributeValue->AttributeValue;
									//Min order qty
									$attributeValue = $attributeValueArray[9];
									$minOrderQty = $attributeValue->AttributeValue;
								
									echo "Up to ";
									$attributeValue = $attributeValueArray[15];
									//echo $attributeValue->AttributeValue;
									echo $maxOrderQty;
									echo ":&nbsp;";
									$attributeValue = $attributeValueArray[14];
									echo "<span style='font-weight:bold;'>&pound;".$attributeValue->AttributeValue."</span>";
								?>
							</td>
						</tr>
						<tr>
							<td>
								<?php 
									//Order code
									$attributeValue = $attributeValueArray[5];
									
									$keyWordArray = explode(" ",$searchKeyWord);
									$eeValue = $attributeValue->AttributeValue;
									for($j=0; $j < count($keyWordArray); $j++){
										if($keyWordArray[$j]!=""){
											$eeValue = preg_replace("/($keyWordArray[$j])/i","<font color=red>\\1</font>",$eeValue);
										}
									}
									
									echo $eeAttributeArray[5]->Name.":&nbsp".$eeValue;
								?>
							</td>
							<td>
								&nbsp;
							</td>
							<td>
								&nbsp;
							</td>
						</tr>
						<tr>
							<td>
								<?php 
									//Manufacturer part No
									$attributeValue = $attributeValueArray[2];
									
									$keyWordArray = explode(" ",$searchKeyWord);
									$eeValue = $attributeValue->AttributeValue;
									for($j=0; $j < count($keyWordArray); $j++){
										if($keyWordArray[$j]!=""){
											$eeValue = preg_replace("/($keyWordArray[$j])/i","<font color=red>\\1</font>",$eeValue);
										}
									}
									
									echo "Part no:&nbsp".$eeValue;
								?>
							</td>
							<td>
								<?php 
									//Stock qty
									$attributeValue = $attributeValueArray[93];
									echo "Availability :&nbsp".$attributeValue->AttributeValue;
								?>
							</td>
							<td>
								Qty:
								<?php 
									if($stockQty < $maxOrderQty){
										$maxOrderQty = $stockQty;
									}
									echo "Quantity($minOrderQty~".$maxOrderQty."):&nbsp;"
								?>
								<input id="quantity_<?php echo $eeArray[$i]->Id; ?>" name="quantity" type="text" class="adminMyInput40" value="<?php  echo $minOrderQty;?>"/>
								<input id="minQuantity_<?php echo $eeArray[$i]->Id; ?>" name="minQuantity" type="hidden" value="<?php  echo $minOrderQty;?>"/>
								<input id="maxQuantity_<?php echo $eeArray[$i]->Id; ?>" name="maxQuantity" type="hidden" value="<?php  echo $maxOrderQty;?>"/>
								<input type="image"  src="../rescources/images/btn_buy.gif" onclick="javascript:addShoppingCar_list(<?php echo $eeArray[$i]->Id; ?>);"/>
							</td>
						</tr>
					</table>
                <hr />
				<?php
				}
				?>
            </div>
            <div class="num_box">
				<?php $pager->createPager2();?>
			</div>
            <div class="clear">
            </div>
        </div>
	</div>
	<div class="clear"></div>
</div>
<?php include '../static/footer.php';?>
</body>
</html>