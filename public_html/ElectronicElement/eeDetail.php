<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/EETypeService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/EEAttributeService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/EEElectronicElementService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/EEAttributeValueService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/EEFileUploadInfoService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/EEPrivateAttributeService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/Config_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/Common_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/Pager_Class.php");


$eeTypeService = new EETypeService();
$eeAttributeService = new EEAttributeService();
$eeElectronicElementService = new EEElectronicElementService();
$eeAttributeValueService = new EEAttributeValueService();
$eeFileUploadInfoService = new EEFileUploadInfoService();
$eePrivateAttributeService = new EEPrivateAttributeService();


$eeTypeArray = $eeTypeService->GetAllClientEETypes();
$eeId = $_GET[eeId];
if(!$eeId || !is_numeric($eeId)){
	echo "<script type='text/javascript'>location.href='eeList.php';</script>";
	return;
}
$ee = $eeElectronicElementService->GetEEElectronicElementById($eeId);
if(!$ee){
	echo "<script type='text/javascript'>location.href='eeList.php';</script>";
	return;
}
$typeId = $ee->TypeId;
$strTypeIds = $eeTypeService->GetParentAndSelfEETypeById($ee->TypeId);

$_SESSION[categoryTypeId] = $typeId;

$eeAttributeArray = $eeAttributeService->GetEEAttributesByStrTypeIds2($strTypeIds);
$eeAttributeArray_showOnClient = $eeAttributeService->GetShowOnClientEEAttributesByStrTypeIds($strTypeIds);
$eePrivateAttributeArray_showOnClient = $eePrivateAttributeService->GetEEPrivateAttributesByEEId($eeId);
$attributeValueArray = $eeAttributeValueService->GetEEAttributeValueByEEId($eeId);

$imageArray = $eeFileUploadInfoService->GetEEFileUploadInfoByEEIdAndTypeId($eeId, 1);
$fileArray = $eeFileUploadInfoService->GetEEFileUploadInfoByEEIdAndTypeId($eeId, 2);
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
				<span class="ico_title" style="font-size:12px"><a href="eeCriteria.php" style="color:red">Electronic Component&nbsp;<span style="font-weight:12px">(<?php echo count($clientEE) ?>)</span></a></span>
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
							<option value="<?php echo $eeTypeArray[$i]->Id ?>">&nbsp;&nbsp;--<?php echo $eeTypeArray[$i]->Name ?></option>
						<?php
							}else{
						?>
							<option value="<?php echo $eeTypeArray[$i]->Id ?>"><?php echo $eeTypeArray[$i]->Name ?></option>
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
			<div class="online_from mt10">
                <table cellspacing="0" cellpadding="0" width="100%" border="0">
                    <tbody>
                        <tr>
                            <td class="w_210">
                                 <span style="font-family: Arial; font-size: 16px;">
									<?php 
										//Name
										$attributeValue = $attributeValueArray[78];
										echo $attributeValue->AttributeValue;
									?>
									</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div  style=" padding-top:10px;">
				<table cellspacing="5" cellpadding="0" width="100%" border="0">
                    <tbody>
                        <tr>
                            <td rowspan="10" class="w_210">
                                <?php 
								//Image
								$attributeValue = $attributeValueArray[78];
								if(count($imageArray) > 0){
									$imagePath = str_replace("..","../Management",$imageArray[0]->FilePath);
									echo "<img width='250' height='250' border='0' src='".$imagePath."' alt=''/>";
								}else{
									echo "<img width='250' height='250' border='0' src='' alt='".$attributeValue->AttributeValue."'/>";
								}
							?>
                            </td>
                            <td class="w_30" height="30px">&nbsp;
								
                            </td>
                            <td class="w_110">
								<?php 
									//Name
									echo $eeAttributeArray[78]->Name.":";
								?>
							</td>
                            <td>
								<?php 
									//Name
									$attributeValue = $attributeValueArray[78];
									echo $attributeValue->AttributeValue;
								?>
                            </td>
                        </tr>
                        <tr>
							<td class="w_30" height="23px">&nbsp;
								
                            </td>
                            <td class="w_110">
								<?php 
								//Category
								echo "Category:";
							?>
							</td>
                            <td>
								<?php 
								//Category
								echo $eeTypeService->GetEETypeById($ee->TypeId)->Name;
								?>
                            </td>
                        </tr>
                        <tr>
							<td class="w_30" height="23px">&nbsp;
								
                            </td>
                            <td class="w_110">
								<?php 
								//Manufacturer
								echo $eeAttributeArray[1]->Name.":";
								?>
                            </td>
                            <td>
								<?php 
								//Manufacturer
								$attributeValue = $attributeValueArray[1];
								echo $attributeValue->AttributeValue;
								?>
                            </td>
                        </tr>
                        <tr>
							<td class="w_30" height="23px">&nbsp;
								
                            </td>
                            <td class="w_110">
								<?php 
								//Datasheet
								echo "Data sheet:";
								?>
                            </td>
                            <td>
								<?php 
								//Datasheet
								if(count($fileArray) > 0){
									$filePath = str_replace("..","../Management",$fileArray[0]->FilePath);
									echo "<a target='_blank' href='".$filePath."' style='text-decoration:underline'>Download</a>";
								}else{
									echo "<span style='color:#cccccc'>download</span>";
								}
							?>
                            </td>
                        </tr>
                        <tr>
							<td class="w_30" height="23px">&nbsp;
								
                            </td>
                            <td class="w_110">
								<?php 
								//Package
								echo $eeAttributeArray[8]->Name.":";
								?>
                            </td>
                            <td>
								<?php 
								//Package
								$attributeValue = $attributeValueArray[8];
								echo $attributeValue->AttributeValue;
								?>
                            </td>
                        </tr>
                        <tr>
							<td class="w_30" height="23px">&nbsp;
								
                            </td>
                            <td class="w_110">
								<?php 
								//Value
								echo $eeAttributeArray[6]->Name.":";
								?>
                            </td>
                            <td>
								<?php 
									//Value
									$attributeValue = $attributeValueArray[6];
									echo $attributeValue->AttributeValue;
								?>
                            </td>
                        </tr>
                        <tr>
							<td class="w_30" height="23px">&nbsp;
								
                            </td>
                            <td class="w_110">Price:</td>
                            <td style="font-family:Arial">
								<?php 
								//Price1
								$attributeValue = $attributeValueArray[9];
								echo $attributeValue->AttributeValue;
								echo "~";
								$attributeValue = $attributeValueArray[10];
								echo $attributeValue->AttributeValue;
								echo ":&nbsp;";
								$attributeValue = $attributeValueArray[4];
								echo "<span style='font-weight:bold; color:red'>&pound;".$attributeValue->AttributeValue."</span>";
								?>
                            </td>
                        </tr>
                        <tr>
							<td class="w_30" height="23px">&nbsp;
								
                            </td>
                            <td class="w_110">&nbsp;</td>
                            <td style="font-family:Arial">
							<?php 
								//Price2
								$attributeValue = $attributeValueArray[12];
								echo $attributeValue->AttributeValue;
								echo "~";
								$attributeValue = $attributeValueArray[13];
								echo $attributeValue->AttributeValue;
								echo ":&nbsp;";
								$attributeValue = $attributeValueArray[11];
								echo "<span style='font-weight:bold; color:red'>&pound;".$attributeValue->AttributeValue."</span>";
							?>
						</td>
                        </tr>
                         <tr>
							<td class="w_30" height="23px">&nbsp;
								
                            </td>
							<td class="w_110">&nbsp;</td>
                            <td style="font-family:Arial">
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
							
								//Price3
								echo "Up to ";
								//$attributeValue = $attributeValueArray[15];
								//echo $attributeValue->AttributeValue;
								echo $maxOrderQty;
								echo ":&nbsp;";
								$attributeValue = $attributeValueArray[14];
								echo "<span style='font-weight:bold; color:red'>&pound;".$attributeValue->AttributeValue."</span>";
							?>
						</td>
                        </tr>
                        <tr>
							<td class="w_30" height="23px">&nbsp;
								
                            </td>
							<td style="font-weight:bold;" colspan="2">
								<?php
									if($stockQty < $maxOrderQty){
										$maxOrderQty = $stockQty;
									}
									echo "Quantity($minOrderQty~".$maxOrderQty."):&nbsp;";
								?>
								&nbsp;&nbsp;
								<input id="quantity" name="quantity" type="text" class="adminMyInput40" value="<?php  echo $minOrderQty;?>"/>
								<input id="minQuantity" name="minQuantity" type="hidden" value="<?php  echo $minOrderQty;?>"/>
								<input id="maxQuantity" name="maxQuantity" type="hidden" value="<?php  echo $maxOrderQty;?>"/>
								<img  src="../rescources/images/btn_Add to cart.gif" onclick="javascript:addShoppingCar(<?php echo $eeId; ?>);"/>
                           </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="online_from mt10">
                <table cellspacing="0" cellpadding="0" width="100%" border="0">
                    <tbody>
                        <tr>
                            <td  colspan="2">
                                <span style="display: block; font-size: 16px; color:Red;">Product Details</span>
                            </td>
                           
                        </tr>
                        <?php
						for($i=0; $i < count($eeAttributeArray_showOnClient); $i++)
						{
							$attributeValue = $attributeValueArray[$eeAttributeArray_showOnClient[$i]->Id];
						?>
						<tr>
							<td class="w_211">
								<b><?php echo $eeAttributeArray_showOnClient[$i]->Name ?>:</b>
							</td>
							<td>
								<?php echo $attributeValue->AttributeValue ?>
							</td>
						</tr>
						<?php
						}
						
						for($i=0; $i < count($eePrivateAttributeArray_showOnClient); $i++)
						{
						?>
						<tr>
							<td class="w_211">
								<b><?php echo $eePrivateAttributeArray_showOnClient[$i]->Name ?>:</b>
							</td>
							<td>
								<?php echo $eePrivateAttributeArray_showOnClient[$i]->AttributeValue ?>
							</td>
						</tr>
						<?php
						}
						?>
                    </tbody>
                </table>
            <div class="clear">
            </div>
        </div>
        <div class="main_box clearbox mt10">
			<img src="/rescources/images/stencil.png" width="42" height="57" alt="" class="nr_m10 fl" />
			<div class="right_box1 fr lh2em">
			Quick-teck have strong negotiating power in pricing, our factory purchase over one million pounds of electronics components per year. The prices  here should  be similar or better(most likely) than these international components suppliers, like Farnell, Mouser, RS, Digi-Key offered. If you find an unreasonable  price or any description mistakes in this page 
			please <a href="../contactus/contactus.php?type=eeIssues&eeId=<?php echo $eeId; ?>" target="_blank" style="color:#E36C0A">contact us</a>. 
			In return, £10 of Quick-teck discount voucher will be issued to you. <br>
			Quick-teck try our best to keep price changes to a minimum but sometime it is inevitable. We aim to update the web site as soon as possible, but may not be able to make changes immediately. If the price of an item you have ordered has increased we will contact you before charging the additional amount.
		    </div>
			<div class="clear"></div>
		</div>
	</div>
	<div class="clear"></div>
</div>
<?php include '../static/footer.php';?>
</body>
</html>