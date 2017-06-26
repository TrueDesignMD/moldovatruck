<?php

include(dirname(__FILE__)."/../system/configuration.php");	$getURL = mysqli_query($CONNECTION,"SELECT `URL` FROM `buianov_pages` WHERE `pageId`='$_POST[ID]'");	$page = mysqli_fetch_array($getURL);
	$dell = mysqli_query($CONNECTION,"UPDATE `buianov_pages` SET `Active`='0' WHERE `pageId`='".$_POST['ID']."'");	$dell = mysqli_query($CONNECTION,"DELETE FROM `buianov_sitemap` WHERE `Link`='".$page['URL']."'");
	if ($dell)	echo '1'; else echo mysqli_error($CONNECTION);

?>