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



if(!isset($member) || substr($_SERVER['PHP_SELF'], - 11) != "console.php"){

	exit();

}

else

{
include_once("../../../../_setup.php");
include_once("../../../../classes/faq.php");
	$memberInfo = $member->get_info_filtered();

	$consoleObj->select($_GET['cID']);

	if(!$member->hasAccess($consoleObj)){

		exit();

	}
	

}

$faqs = new faq($mysqli);
	
	$faqs->faq_cat();







?>