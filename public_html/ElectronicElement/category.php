<div id="accordion">
	<ul>
	<?php
	$eeTypeArray = $eeTypeService->GetAllClientEETypes();
	for($i=0; $i < count($eeTypeArray); $i++){
		if($eeTypeArray[$i]->TypeLevel == 1){
			$strTypeIds = $eeTypeService->GetParentAndChildrenEETypeById($eeTypeArray[$i]->Id);
			$result = $eeElectronicElementService->GetEEElectronicElementsByTypeIds($strTypeIds);
			if($_SESSION[categoryTypeId]){
				$currentEEType = $eeTypeService->GetEETypeById($_SESSION[categoryTypeId]);
			}else{
				$currentEEType = $eeTypeService->GetEETypeById(1);
			}
	?>
        <li>
            <h3 style="font-size:14px">
                <a <?php if($currentEEType->Id==$eeTypeArray[$i]->Id){echo "style='color:red'";}  ?> href="eeList.php?typeId=<?php echo $eeTypeArray[$i]->Id ?>#title"><?php echo $eeTypeArray[$i]->Name ?>&nbsp;(<?php echo count($result) ?>)</a>
				<img id="<?php echo "accordionImg".$i?>" <?php if($currentEEType->Pid == $eeTypeArray[$i]->Id || $currentEEType->Id == $eeTypeArray[$i]->Id){echo 'src="../rescources/images/left_nav_up.png"';}else{echo 'src="../rescources/images/left_nav_down.png"';}?> border="0" align="right" style="cursor:pointer;" onclick="<?php echo "acc_click2(".$i.")" ?>">
			</h3>
            <div id="<?php echo "accordionDiv".$i?>" <?php if(!($currentEEType->Pid == $eeTypeArray[$i]->Id || $currentEEType->Id == $eeTypeArray[$i]->Id)){echo "style=\"display:none\"";}?>>
				<?php 
					for($j=0; $j < count($eeTypeArray); $j++){ 
						if($eeTypeArray[$j]->TypeLevel == 2 && $eeTypeArray[$j]->Pid == $eeTypeArray[$i]->Id){
							$result = $eeElectronicElementService->GetEEElectronicElementsByTypeIds($eeTypeArray[$j]->Id);
				?>
                <a style="font-size:14px;<?php if($currentEEType->Id==$eeTypeArray[$j]->Id){echo "color:red;";}  ?>" href="eeList.php?typeId=<?php echo $eeTypeArray[$j]->Id ?>#title"><?php echo $eeTypeArray[$j]->Name ?>&nbsp;(<?php echo count($result) ?>)</a>
				<?php 
					}
				} 
				?>
            </div>
        </li>
	<?php
		}
	}
	unset($_SESSION[categoryTypeId]);
	?>
    </ul>
</div>


<script>
/*(function bindAcc(){
	$("ul>li>h3","#accordion").bind("click", function(el){
		acc_click(this);
	});
})();*/
function acc_click2(id){
	var img = $("#"+"accordionImg" + id);
	var div = $("#"+"accordionDiv" + id);
	if(img.attr("src") == "../rescources/images/left_nav_up.png"){
		img.attr("src","../rescources/images/left_nav_down.png");
		div.hide();
	}else{
		img.attr("src","../rescources/images/left_nav_up.png");
		div.show();
	}
}
</script>