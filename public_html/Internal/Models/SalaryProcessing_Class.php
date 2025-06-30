<?php

class SalaryProcessing {
	private $Id = null;
	private $SalaryDate = null;
	private $SalaryAdminId = null;
	private $StatusId = null;
	private $TypeId = null;
	private $AdminId = null;
	private $ProcessTime = null;
	private $Remark = null;
	
	function SalaryProcessing($Id=null, $SalaryDate=null, $SalaryAdminId=null, $StatusId=null, $TypeId=null, $AdminId=null, 
		$ProcessTime=null, $Remark=null)
	{
		$this->Id = $Id;
		$this->SalaryDate = $SalaryDate;
		$this->SalaryAdminId = $SalaryAdminId;
		$this->StatusId = $StatusId;
		$this->TypeId = $TypeId;
		$this->AdminId = $AdminId;
		$this->ProcessTime = $ProcessTime;
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