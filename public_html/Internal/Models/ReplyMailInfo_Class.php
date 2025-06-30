<?php

class ReplyMailInfo {
	private $Id = null;
	private $Subject = null;
	private $ToList = null;
	private $CcList = null;
	private $BccList = null;
	private $AttachmentsCount = null;
	private $MailStatus = null;
	private $ReplyTime = null;
	private $ApprovalTime = null;
	private $SendTime = null;
	private $IsNeedApproval = null;
	private $IntendantAdminId = null;
	private $BusinessAdminId = null;
	private $IsEnable = null;
	private $Remark = null;
	
	function ReplyMailInfo($Id=null, $Subject=null, $ToList=null, $CcList=null, $BccList=null, $AttachmentsCount=null, 
		$MailStatus=null, $ReplyTime=null, $ApprovalTime=null, $SendTime=null, $IsNeedApproval=null, 
		$IntendantAdminId=null, $BusinessAdminId=null, $IsEnable=null, $Remark=null)
	{
		$this->Id = $Id;
		$this->Subject = $Subject;
		$this->ToList = $ToList;
		$this->CcList = $CcList;
		$this->BccList = $BccList;
		$this->AttachmentsCount = $AttachmentsCount;
		$this->MailStatus = $MailStatus;
		$this->ReplyTime = $ReplyTime;
		$this->ApprovalTime = $ApprovalTime;
		$this->SendTime = $SendTime;
		$this->IsNeedApproval = $IsNeedApproval;
		$this->IntendantAdminId = $IntendantAdminId;
		$this->BusinessAdminId = $BusinessAdminId;
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