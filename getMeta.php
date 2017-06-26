<?php

session_start();
require_once "system/configuration.php";
require_once "system/functions.php";
if (empty($_SESSION['c'])) $_SESSION['c'] = 0;
else $_SESSION['c']+=1000;
if ($_SESSION['c']===111000) exit;
$getPages = mysqli_query($CONNECTION,"SELECT `URL`,`pageName` FROM `".DB_PREFIX."pages` LIMIT ".$_SESSION['c'].",1000");
if (mysqli_num_rows($getPages)>0)
{
	$pages = mysqli_fetch_array($getPages);
	do
	{
		$URL = $pages['URL'];
		$getRedirect = mysqli_query($CONNECTION,"SELECT `metatitle` FROM `jos_redirection` WHERE `oldurl`='$URL'");
		if(mysqli_num_rows($getRedirect)>0)
		{
			$Red = mysqli_fetch_array($getRedirect);
			if(!empty($Red['metatitle']))$mtitle = $Red['metatitle']; else $mtitle = $pages['pageName'];
		}else $mtitle = $pages['pageName'];
		
		$updateMata = mysqli_query($CONNECTION,"UPDATE `".DB_PREFIX."pages` SET `MetaTitle`='$mtitle' WHERE `URL`='$pages[URL]'");
	}
	while($pages = mysqli_fetch_array($getPages));
	sleep(5);
	header("Location: getMeta.php");
}
else echo mysqli_error($CONNECTION);

?>
