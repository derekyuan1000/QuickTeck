<?php

class SalaryTitle {
	private $Id = null;
	private $Pid = null;
	private $Name = null;
	private $TypeLevel = null;
	private $Category = null;
	private $ValueType = null;
	private $SortId = null;
	private $IsEnable = null;
	private $Remark = null;
	
	function SalaryTitle($Id=null, $Pid=null, $Name=null, $TypeLevel=null, $Category=null, $ValueType=null, 
		$SortId=null, $IsEnable=null, $Remark=null)
	{
		$this->Id = $Id;
		$this->Pid = $Pid;
		$this->Name = $Name;
		$this->TypeLevel = $TypeLevel;
		$this->Category = $Category;
		$this->ValueType = $ValueType;
		$this->SortId = $SortId;
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