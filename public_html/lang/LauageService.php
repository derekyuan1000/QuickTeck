<?php
class Lang
{
	public static function EchoString($english="",$french="",$dutch="",$spanish="")
	{
		if(empty($_SESSION['lang'])){
			$_SESSION['lang'] = "";
		}
		$key=$_SESSION['lang'];
		switch ($key)
		{
			case "french": echo $french;break;
			case "dutch":echo $dutch;break;
			case "spanish":echo $spanish;break;
			default:echo $english;break;
		}
	}
	public static function EchoString2($arr=array())
	{
		if(empty($_SESSION['lang'])){
			$_SESSION['lang'] = "";
		}
		$key=$_SESSION['lang'];
		switch ($key)
		{
			case "french": echo $arr['french'];break;
			case "dutch":echo $arr['dutch'];break;
			case "spanish":echo $arr['spanish'];break;
			default:echo $arr['english'];break;
		}
	}
	public static function SetLines()
	{
		if(empty($_SESSION['lang'])){
			$_SESSION['lang'] = "";
		}
		$key=$_SESSION['lang'];
		switch($key)
		{
			case "french": echo ' navline ';break;
		}
	}
	public static function SetLineHeight($height)
	{
		if(empty($_SESSION['lang'])){
			$_SESSION['lang'] = "";
		}
		$key=$_SESSION['lang'];
		switch($key)
		{
			case "french": echo ' style="line-height:'.$height.'px" ';break;
		}
	}
	public static function SetVertical($percent)
	{
		if(empty($_SESSION['lang'])){
			$_SESSION['lang'] = "";
		}
		$key=$_SESSION['lang'];
		switch($key)
		{
			case "french": echo ' style="vertical-align:'.$percent.'%" ';break;
		}
	}
}
?>