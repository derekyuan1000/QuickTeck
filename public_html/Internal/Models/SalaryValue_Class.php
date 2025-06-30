<?php

class SalaryValue {
	private $Id = null;
	private $SalaryTitleId = null;
	private $AdminId = null;
	private $SalaryDoubleValue = null;
	private $SalaryVarcharValue = null;
	private $SalaryDate = null;
	private $IsDefault = null;
	private $IsEnable = null;
	private $Remark = null;
	
	function SalaryValue($Id=null, $SalaryTitleId=null, $AdminId=null, $SalaryDoubleValue=null, $SalaryVarcharValue=null, $SalaryDate=null, 
		$IsDefault=null, $IsEnable=null, $Remark=null)
	{
		$this->Id = $Id;
		$this->SalaryTitleId = $SalaryTitleId;
		$this->AdminId = $AdminId;
		$this->SalaryDoubleValue = $SalaryDoubleValue;
		$this->SalaryVarcharValue = $SalaryVarcharValue;
		$this->SalaryDate = $SalaryDate;
		$this->IsDefault = $IsDefault;
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