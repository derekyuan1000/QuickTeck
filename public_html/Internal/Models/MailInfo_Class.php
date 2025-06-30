<?php

class MailInfo {
	private $Id = null;
	private $MailId = null;
	private $Subject = null;
	private $FromAddress = null;
	private $FromName = null;
	private $MailTime = null;
	private $ToString = null;
	private $CcString = null;
	private $ReplyToString = null;
	private $AttachmentsCount = null;
	private $MailStatus = null;
	private $IsRead = null;
	private $IsOrder = null;
	private $IsClose = null;
	private $AssignTime = null;
	private $ReplyTime = null;
	private $RatedVitalityTime = null;
	private $RealVitalityTime = null;
	private $IsNeedApproval = null;
	private $IntendantAdminId = null;
	private $BusinessAdminId = null;
	private $MailFlag = null;
	private $IsEnable = null;
	private $Remark = null;
	
	function MailInfo($Id=null, $MailId=null, $Subject=null, $FromAddress=null, $FromName=null, $MailTime=null, 
		$ToString=null, $CcString=null, $ReplyToString=null, $AttachmentsCount=null, $MailStatus=null, 
		$IsRead=null, $IsOrder=null, $IsClose=null, $AssignTime=null, $ReplyTime=null, 
		$RatedVitalityTime=null, $RealVitalityTime=null, $IsNeedApproval=null, $IntendantAdminId=null, $BusinessAdminId=null, 
		$MailFlag = null, $IsEnable=null, $Remark=null)
	{
		$this->Id = $Id;
		$this->MailId = $MailId;
		$this->Subject = $Subject;
		$this->FromAddress = $FromAddress;
		$this->FromName = $FromName;
		$this->MailTime = $MailTime;
		$this->ToString = $ToString;
		$this->CcString = $CcString;
		$this->ReplyToString = $ReplyToString;
		$this->AttachmentsCount = $AttachmentsCount;
		$this->MailStatus = $MailStatus;
		$this->IsRead = $IsRead;
		$this->IsOrder = $IsOrder;
		$this->IsClose = $IsClose;
		$this->AssignTime = $AssignTime;
		$this->ReplyTime = $ReplyTime;
		$this->RatedVitalityTime = $RatedVitalityTime;
		$this->RealVitalityTime = $RealVitalityTime;
		$this->IsNeedApproval = $IsNeedApproval;
		$this->IntendantAdminId = $IntendantAdminId;
		$this->BusinessAdminId = $BusinessAdminId;
		$this->MailFlag = $MailFlag;
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