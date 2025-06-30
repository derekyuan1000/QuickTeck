<?php

class WeeklyReportCCAdmin {
	private $Id = null;
	private $WeeklyReportId = null;
	private $AdminId = null;
	private $IsEnable = null;
	private $Remark = null;
	
	function WeeklyReportCCAdmin($Id=null, $WeeklyReportId=null, $AdminId=null, $IsEnable=null, $Remark=null)
	{
		$this->Id = $Id;
		$this->WeeklyReportId = $WeeklyReportId;
		$this->AdminId = $AdminId;
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