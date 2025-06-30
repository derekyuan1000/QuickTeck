<?php

class MailAttachment {
	private $Id = null;
	private $MailId = null;
	private $FileName = null;
	private $FilePath = null;
	private $FileType = null;
	private $IsEnable = null;
	private $Remark = null;
	
	function MailAttachment($Id=null, $MailId=null, $FileName=null, $FilePath=null, $FileType=null, $IsEnable=null, 
		$Remark=null)
	{
		$this->Id = $Id;
		$this->MailId = $MailId;
		$this->FileName = $FileName;
		$this->FilePath = $FilePath;
		$this->FileType = $FileType;
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