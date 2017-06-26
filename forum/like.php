<?php
session_start();
session_name("MoldovaTruck");
require_once "../system/configuration.php";
require_once "../system/functions.php";

$select = mysqli_query($CONNECTION,"SELECT `likeID` FROM `".DB_PREFIX."likes` WHERE `ip`='$ip' AND `forumID`='".htmlspecialchars($_POST['id'],ENT_QUOTES)."'");
if (mysqli_num_rows($select)==0)
{
	$insert = mysqli_query($CONNECTION,"INSERT INTO `".DB_PREFIX."likes`(`ip`,`forumID`)VALUES('$_SERVER[REMOTE_ADDR]','".htmlspecialchars($_POST['id'],ENT_QUOTES)."')");
	$getLikes = mysqli_query($CONNECTION,"SELECT DISTINCT `ip` FROM `".DB_PREFIX."likes` WHERE `forumID`='".htmlspecialchars($_POST['id'],ENT_QUOTES)."'");
	echo '<i class="fa fa-thumbs-up" aria-hidden="true"></i> Мне нравится '.mysqli_num_rows($getLikes);
}else echo mysqli_error($CONNECTION);
						
?>