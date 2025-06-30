<?php
$count = 0;
for($i=1; $i <= 70000; $i++){
	if (file_exists("../Mail/MailBody/".$i."_Text.html")){
		unlink("../Mail/MailBody/".$i."_Text.html");
		$count++;
	}
	if (file_exists("../Mail/MailBody/".$i."_Html.html")){
		unlink("../Mail/MailBody/".$i."_Html.html");
		$count++;
	}
}
for($i=1; $i <= 20000; $i++){
	if (file_exists("../Mail/ReplyMailBody/".$i.".html")){
		unlink("../Mail/ReplyMailBody/".$i.".html");
		$count++;
	}
}
echo $count;
?>