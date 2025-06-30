<html>
<head><title>PHP Mail Sender</title></head>
<body>
<?php 
$to = "gelukmobile@hotmail.com" ; 
$from = $_REQUEST['email'] ; 
$name = $_REQUEST['name'] ; 
$headers = "From: $from"; 
$subject = "Web Contact Data"; 

$fields = array(); 
$fields{"name"} = "name"; 
$fields{"company"} = "company"; 
$fields{"email"} = "email"; 
$fields{"phone"} = "phone"; 
$fields{"layer"} = "layer";
$fields{"quantity"} = "quantity";
$fields{"length"} = "length";
$fields{"width"} = "width";
$fields{"thickness"} = "thickness";
$fields{"weight"} = "weight";
$fields{"total"} = "total";
$fields{"days"} = "days";
$body = "We have received the following information:\n\n"; foreach($fields as $a => $b){ $body .= sprintf("%20s: %s\n",$b,$_REQUEST[$a]); } 

$headers2 = "From: info@quick-teck.co.uk"; 
$subject2 = "Thank you for contacting us"; 
$autoreply = "Thank you for contacting us. Somebody will get back to you as soon as possible, usualy within 48 hours. If you 
have any more questions, please consult our website at www.quick-teck.co.uk";

if($from == '') {print "You have not entered an email, please go back and try again";} 
else { 
if($name == '') {print "You have not entered a name, please go back and try again";} 
else { 
$send = mail($to, $subject, $body, $headers); 
$send2 = mail($from, $subject2, $autoreply, $headers2); 
if($send) 
{print "Thanks for your email. We ffwill contact you asap!";} 
else 
{print "We encountered an error sending your mail, please notify webmaster@YourCompany.com"; } 
}
}
?> </body>
</html> 
