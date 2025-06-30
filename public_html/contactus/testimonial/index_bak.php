<?php  
session_start();
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/GuestBookInfoService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/Pager2_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/Config_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/Common_Class.php");

$guestBookInfoService = new GuestBookInfoService();
$currentPage = $_GET[page];
if(!$currentPage){
	$currentPage = 1;
}

$result = $guestBookInfoService->GetAllGuestBookInfosByPage(Config::$pageSize, $currentPage,2);
$recoudCount = $result[0];
$guestBookInfoArray = $result[1];
$pager = new Pager2(Config::$pageSize,$recoudCount,$currentPage,"index.php?page=");

if($_SESSION[message]){
	echo "<script>alert('".$_SESSION[message]."')</script>";
	$_SESSION[message]="";
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<title>Low cost print circuit board manufacturer,UK PCB board manufacturer,PCB prototype,PCB board manufacturer</title>
<meta name="description" content="Order PCB from UK print circuit board manufacturer,offering prototype PCB to multilayer volume production PCBs at low price." />
<meta name="keywords" content="Order PCB from UK print circuit board manufacturer,offering prototype PCB to multilayer volume production PCBs at low price." />
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />


<link href="../Management/Styles/mainCss.css" type="text/css" rel="Stylesheet" />
<link href="../Management/Styles/menu.css" type="text/css" rel="Stylesheet" />
<link href="../images/CSS.CSS" type="text/css" rel="stylesheet" />
<link href="images/alex_livre.css" type="text/css" rel="stylesheet" />
<script src="../../kindeditor4/kindeditor.js" type="text/javascript"></script>
<script type="text/javascript">
	var editor1;
    KindEditor.ready(function(K) {
        editor1 = K.create('#comment',{langType : 'en',width:'443px',height:'100',
        	items:['emoticons']
        });
    });
</script>
<script language="javascript" type="text/javascript">
function verif_mail(adresse) {
	var place = adresse.indexOf("@",1);
	var point = adresse.indexOf(".",place+1);

	if ((place > -1)&&(adresse.length >2)&&(point > 1))
		return true;
	else
		return false;
}

function verif_add(){
	var F = document.getElementById("form_add_guest");
	var name = F.name.value;	
	var mail= F.email.value;

	if (!name){
		alert("Please mention your name ");
		return false;
	}else if (editor1.isEmpty()){
		alert("Please add your message ");
		return false;
	}else if (!verif_mail(mail) && mail){
		alert("Your Email is incorrect ");
		return false;
	}
}

function update_flag(objet){
	if (objet.value)
		document.getElementById("img_flags").src = 'images/'+objet.value+'.jpg';
}

</script>

</head>
<body>
<div class="d_title">Quick-teck GuestBook</div>
<br />
<!-- add_message -->
<div class="d_add_msg">
    <div class="d_add_msg_h"><img src="images/blank.png" width="1" height="1" alt="" /></div>
    <div class="d_f_add_msg">
        <form id="form_add_guest" method="post" action="doInsertMessage.php" onsubmit="javascript:return verif_add();">

        <!-- name -->
        <div class="add_msg_left">Name or nickname : *</div>
        <div class="add_msg_right"><input class="i_text" type="text" tabindex="1" name="name" size="34" maxlength="50"
		onfocus="this.className='i_focus'" onblur="this.className='i_text'"/></div>

        <!-- email -->
        <div class="add_msg_left">Email address :</div>
        <div class="add_msg_right"><input class="i_text" type="text" tabindex="2" name="email" size="34" maxlength="150"
         onfocus="this.className='i_focus'" onblur="this.className='i_text'"/></div>

        <!-- city & country -->
        <div class="add_msg_left">Country :</div>
        <div class="add_msg_right">
            <select tabindex="4" size="1" name="country" onchange="update_flag(this)">
				<option value="1" selected="selected">UK</option>
				<option value="2">France</option>
				<option value="3">Ireland</option>
				<option value="4">Germany</option>
				<option value="5">Belgium</option>
				<option value="6">Denmark</option>
				<option value="7">Netherlands</option>
				<option value="8">Spain</option>
				<option value="9">Italy</option>
				<option value="11">Other countries</option>
            </select>&nbsp;<img id="img_flags" src="images/1.jpg" width="18" height="12" alt="" title="Flag" />
        </div>

		<div class="add_msg_left">City :</div>
        <div class="add_msg_right"><input class="i_text" type="text" tabindex="5" name="city" size="34" maxlength="60" 
        onfocus="this.className='i_focus'" onblur="this.className='i_text'"/></div>


        <!-- message -->
        <div class="d_center" style="clear: both;">Your message : *</div>
        <div class="d_center" style="padding:2px">
           <textarea id="comment" name="comment"></textarea>
        </div>
        
        <!-- submit -->
        <div class="d_submit_msg"><br /><input type="submit" tabindex="9" value="Add this message" name="ajouter" class="btn_add" /></div>
        </form>
    </div>

    <div class="d_add_msg_b"><img src="images/blank.png" width="1" height="1" alt="" /></div>
</div>
<!-- end add_message -->
<br /> 

<!--<div class="d_note">
    <form method="get" action="">
        Show only the messages containing the following words : 
        <input maxlength="60" size="19" name="mots_search" value="" />
        <input type="submit" value="Ok" name="rechercher" class="btn_search" />
    </form>
</div>-->
<br />

 
<div class="body_all">
    <div class="body_txt">
    <?php 
		if($recoudCount > 0){
			$pager->createPager(1);
		}
	?>
	<br/>
    <!-- boucle messages  -->
	<?php 
	for($i=0; $i < count($guestBookInfoArray); $i++)
	{
		$country = Common::GetCountryById($guestBookInfoArray[$i]->CountryId);
		$createTime = Common::ChangeDateFormat($guestBookInfoArray[$i]->CreateTime,"dateTime");
		$replyTime = Common::ChangeDateFormat($guestBookInfoArray[$i]->ReplyTime,"dateTime");
	?>
    <div class="d_corps_msg">
        <div class="d_date"><?php echo $createTime;?></div>
        <div class="d_pseudo">
			<img src="images/<?php echo $guestBookInfoArray[$i]->CountryId;?>.jpg" width="18" height="12" style="border: 0px" alt="" title="<?php echo $country;?>" />
			<?php echo $guestBookInfoArray[$i]->ClientName;?> (<?php echo $guestBookInfoArray[$i]->City;?> <?php echo $country;?>)
			<a href="mailto:<?php echo $guestBookInfoArray[$i]->Email;?>"><img src="images/mail.gif" alt="" title="Send an email to <?php echo $guestBookInfoArray[$i]->ClientName;?> [<?php echo $guestBookInfoArray[$i]->Email;?>]" style="border: 0px" width="12" height="10" /></a>
        </div>
         
        <div>
            <br/></break><?php echo $guestBookInfoArray[$i]->ClientMessage;?>
			<?php  
			if($guestBookInfoArray[$i]->ReplyMessage){
				echo "<br /><br /><div class='reponse'><strong>Webmaster's reply</strong> : ".$guestBookInfoArray[$i]->ReplyMessage."&nbsp;&nbsp;(".$replyTime.")</div>";
			}
			?>
        </div>
    </div>
    &nbsp;
	<?php
	}
	?>
    <!-- end boucle messages -->
	
    <?php 
		if($recoudCount > 5){
			$pager->createPager(2);
		}
	?>
    </div>
</div>
<br>
<?php include($_SERVER['DOCUMENT_ROOT']."/Management/Client/bottom.php") ?>
</body>
</html>