<?php

class WeeklyReport {
	private $Id = null;
	private $ReportContent = null;
	private $ApprovedContent = null;
	private $ReportTime = null;
	private $WriteReportTime = null;
	private $ApprovedTime = null;
	private $AdminId = null;
	private $ApprovedAdminId = null;
	private $OrderCount = null;
	private $EmailCount = null;
	private $StatusId = null;
	private $IsEnable = null;
	private $Remark = null;
	
	function WeeklyReport($Id=null, $ReportContent=null, $ApprovedContent=null, $ReportTime=null, $WriteReportTime=null, $ApprovedTime=null, 
		$AdminId=null, $ApprovedAdminId=null, $OrderCount=null, $EmailCount=null, $StatusId=null, 
		$IsEnable=null, $Remark=null)
	{
		$this->Id = $Id;
		$this->ReportContent = $ReportContent;
		$this->ApprovedContent = $ApprovedContent;
		$this->ReportTime = $ReportTime;
		$this->WriteReportTime = $WriteReportTime;
		$this->ApprovedTime = $ApprovedTime;
		$this->AdminId = $AdminId;
		$this->ApprovedAdminId = $ApprovedAdminId;
		$this->OrderCount = $OrderCount;
		$this->EmailCount = $EmailCount;
		$this->StatusId = $StatusId;
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