<?php
class AdminMessageInbox {
	private $Id = null;
	private $ReceiveAdminId = null;
	private $Title = null;
	private $Content = null;
	private $Status = null;
	private $SendAdminId = null;
	private $CreateTime = null;
	private $IsEnable = null;
	private $Remark = null;
	
	function AdminMessageInbox($Id=null, $ReceiveAdminId=null, $Title=null, $Content=null, $Status=null, $SendAdminId=null, 
		$CreateTime=null, $IsEnable=null, $Remark=null)
	{
		$this->Id = $Id;
		$this->ReceiveAdminId = $ReceiveAdminId;
		$this->Title = $Title;
		$this->Content = $Content;
		$this->Status = $Status;
		$this->SendAdminId = $SendAdminId;
		$this->CreateTime = $CreateTime;
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