<?php

/*
* Bluethrust Clan Scripts v4
* Copyright 2014
*
* Author: Bluethrust Web Development
* E-mail: support@bluethrust.com
* Website: http://www.bluethrust.com
*
* License: http://www.bluethrust.com/license.php
*
*/





include("../../../../_setup.php");
$countErrors = 0;

if(empty($_POST['ruletitle']))
{
	$countErrors++;
	$dispError .= "&nbsp;&nbsp;&nbsp;<b>&middot;</b>Title is mising<br>";
}
if(empty($_POST['rulemessage']))
{
	$countErrors++;
	$dispError .= "&nbsp;&nbsp;&nbsp;<b>&middot;</b>message is mising<br>";
}
if(empty($_POST['ruleanswer']))
{
	$countErrors++;
	$dispError .= "&nbsp;&nbsp;&nbsp;<b>&middot;</b>Answer is mising<br>";
}
if(empty($_POST['rulecat']))
{
	$countErrors++;
	$dispError .= "&nbsp;&nbsp;&nbsp;<b>&middot;</b>category is mising<br>";
}



if($countErrors == 0){
	$rulestitle   = $mysqli->real_escape_string($_POST['ruletitle']);
	$rulesmessage = $mysqli->real_escape_string($_POST['rulemessage']);
	$rulesanswer  = $mysqli->real_escape_string($_POST['ruleanswer']);
	$rulescat     = $mysqli->real_escape_string($_POST['rulecat']);
	$rulesid = $_POST['ruleid'];

	if($mysqli->query("UPDATE faq SET `title`='$rulestitle', `message`='$rulesmessage',`answer`='$rulesanswer',`cat_id`='$rulescat' WHERE faq_id='$rulesid'") === false){
		$countErrors++;
		$dispError .= "&nbsp;&nbsp;&nbsp;<b>&middot;</b> Unable to save the information to the database.<br>";
	}
	else
	{
		$succeed = "Success";
	}







}



if($countErrors == 0){
	echo $_POST['maint'];
	$dispTime = date("l F j, Y g:i:s A");
	echo "
	<script type='text/javascript'>
	$('#saveMessage').html(\"<b><span class='successFont'>Website Settings Saved: $succeed </span> ".$dispTime."</b>\");
	$('#saveMessage').fadeIn(400);
	$('#errorDiv').hide();
	</script>
	";

}
else
{
	echo "
	<script type='text/javascript'>
	$(document).ready(function() {

	$('#errorMessage').html('".$dispError."');
	$('#errorDiv').fadeIn(400);
	$('#saveMessage').html(\"<span class='failedFont'><b>Website Settings Not Saved!</b></span>\");
	$('#saveMessage').fadeIn(400);
	$('html, body').animate({ scrollTop: 0 });

	});
	</script>
	";
}


?>