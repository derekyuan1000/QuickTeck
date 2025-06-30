<?php   
class Pager{
	private  $pageSize;
	private  $recordCount; 
	private  $currentPage;
	private  $totalPage;
	private  $pagerLink;
	
	function __construct($pageSize,$recordCount,$currentPage,$pagerLink){
		$this->pageSize=intval($pageSize);
		$this->recordCount=intval($recordCount);
		if(!$currentPage){
			$this->currentPage=1;
		}else{
			$this->currentPage=intval($currentPage);
		}
		$totalPage=ceil($recordCount/$pageSize);
		if(!$totalPage){
			$this->totalPage=1;
		}else{
			$this->totalPage=intval($totalPage);	
		}
		$this->pagerLink=$pagerLink;
	}
	
	function __destruct(){
		unset($pageSize);
		unset($recordCount);
		unset($currentPage);
		unset($totalPage);
		unset($pagerLink);
	}
	
	function createPager(){
		if($this->currentPage > 1){
			$firstPageUrl=$this->pagerLink."1";
			$prewPageUrl=$this->pagerLink.($this->currentPage-1);
			$firstPageStr='<a href="'.$firstPageUrl.'" style="color:black">FIRST</a>';
			$prewPageStr='<a href="'.$prewPageUrl.'" style="color:black">PREW</a>';
		}else {
			$firstPageStr='<span style="color:#cccccc">FIRST</span>';
			$prewPageStr='<span style="color:#cccccc">PREW</span>';
		}
		
		if($this->currentPage < $this->totalPage){
			$nextPageUrl=$this->pagerLink.($this->currentPage+1);
			$lastPageUrl=$this->pagerLink.$this->totalPage;
			$nextPageStr='<a href="'.$nextPageUrl.'" style="color:black">NEXT</a>';
			$lastPageStr='<a href="'.$lastPageUrl.'" style="color:black">LAST</a>';
		}else {
			$nextPageStr='<span style="color:#cccccc">NEXT</span>';
			$lastPageStr='<span style="color:#cccccc">LAST</span>';
		}
		$pagerStr = 
			'<table width="100%" border="0" cellspacing="0" align="right" cellpadding="0" style="font-size:12px; margin-top:3px;margin-bottom:3px;">
			<tr>
				<td>&nbsp;</td>
				<td style="width:300px; color:black">
					<b>Record Count:</b>'.$this->recordCount.'
					&nbsp;&nbsp;<b>Current Page:</b>'.$this->currentPage.'
				&nbsp;&nbsp;<b>Total Pages:</b>'.$this->totalPage.'
				</td>
				<td style="width:45px; line-height:15px; text-align:center; font-size:10px; background-image:url(\'images/main_54_1.gif\')">'.$firstPageStr.'</td>
				<td style="width:5px"></td>
				<td style="width:45px; text-align:center; font-size:10px; background-image:url(\'images/main_54_1.gif\')">'.$prewPageStr.'</td>
				<td style="width:5px"></td>
				<td style="width:45px; text-align:center; font-size:10px; background-image:url(\'images/main_54_1.gif\')">'.$nextPageStr.'</td>
				<td style="width:5px"></td>
				<td style="width:45px; text-align:center; font-size:10px; background-image:url(\'images/main_54_1.gif\')">'.$lastPageStr.'</td>
			</tr>
		</table>';
		echo $pagerStr;
	}
	
	private function __get($property_name){
		return $this->$property_name;
	}
	
	private function __set($property_name, $value){
		$this->$property_name = $value;
	}
	
	private function __isset($property_name){
		return isset($this->$property_name);
	}
	
	private function __unset($property_name){
		unset($this->$property_name);
	}
}
?> 