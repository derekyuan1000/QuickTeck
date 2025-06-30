<html>
<head><title>PHP Mail Sender</title></head>
<body>
<?php 
$to = "pcb_prototype@hotmail.co.uk,info@quick-teck.co.uk" ; 
$from = $_REQUEST['email'] ; 
$name = $_REQUEST['name'] ; 
$headers = "From: $from"; 
$subject = "Web Contact Data(layout_quote)"; 

$fields = array(); 
$fields{"name"} = "Name"; 
$fields{"phone"} = "phone"; 
$fields{"email"} = "email"; 
$fields{"address1"} = "Delivery address1"; 
$fields{"address2"} = "Delivery address2"; 
$fields{"postcode"} = "Postcode"; 
$fields{"company"} = "company"; 
$fields{"budget"} = "budget"; 
$fields{"message"} = "message"; 



$body = "We have received the following information:\n\n"; foreach($fields as $a => $b){ $body .= sprintf("%20s: %s\n",$b,$_REQUEST[$a]); } 

$headers2 = "From: info@quick-teck.co.uk"; 
$subject2 = "Thank you for contacting us"; 
$autoreply = "Thank you for contacting us. Somebody will get back to you as soon as possible, usualy within 24 hours. If you have any more questions, please consult our website at www.quick-teck.co.uk";

if($from == '') {print "You have not entered an email, please go back and try again";} 
else { 
if($name == '') {print "You have not entered a name, please go back and try again";} 
else { 
$send = mail($to, $subject, $body, $headers); 
/*$send2 = mail($from, $subject2, $autoreply, $headers2); */
if($send) 
/*{header( "Location: http://www.quick-teck.co.uk/thankyou.html" );} */
{print " Thank you for contacting us. We will contact you shortly."; }
/*{echo " <script>location.href='takeorder_step3.htm' </script>";}*/
/*{echo "<script language=javascript>alert('Congraurations.Carry on.')</script>";}*/

else 
{print "We encountered an error sending your mail, please notify info@quick-teck.co.uk"; } 
}
}


$target = "../../public_ftp/layout_quote/"; 
$target = $target . basename( $_FILES['uploaded']['name']) ; 
$ok=1; 

//This is our size condition 
if ($uploaded_size > 10000000) 
{ 
echo "Your file is too large.<br>"; 
$ok=0; 
} 

//This is our limit file type condition 
if ($uploaded_type =="text/php") 
{ 
echo "No PHP files<br>"; 
$ok=0; 
} 

//This is our limit file type condition 
if ($uploaded_type =="text/php") 
{ 
echo "No PHP files<br>"; 
$ok=0; 
} 
 
//Here we check that $ok was not set to 0 by an error 

if ($ok==0) 
{ 
Echo "Sorry your file was not uploaded. Please contact with info@quick-teck.co.uk for help"; 
} 

//If everything is ok we try to upload it 
else 
{ 
if(move_uploaded_file($_FILES['uploaded']['tmp_name'], $target)) 
{ 
echo "Your file ". basename( $_FILES['uploadedfile']['name']). " has been uploaded. "; 
//echo " <script>location.href='takeorder_step4.htm' </script>";

} 
else 
{ 
echo "Quick-teck"; 
} 
} 

?>

            
 </body>
</html> 
