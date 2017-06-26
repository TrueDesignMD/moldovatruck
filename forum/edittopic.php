<?php
session_start();
session_name("MoldovaTruck");
require_once "../system/configuration.php";
require_once "../system/functions.php";

function getUserInfo($userID)
{
	global $CONNECTION;
	$getAuthor = mysqli_query($CONNECTION,"SELECT `userName`,`userFullname` FROM `".DB_PREFIX."users` WHERE `userID`='$userID'");
	if (mysqli_num_rows($getAuthor)>0)
	{
		$Author = mysqli_fetch_array($getAuthor);
		$userAuthor = '<a href="'.HOME.LANG.'/forum?user='.$userID.'">'.$Author['userName'].' '.$Author['userFullname'].'</a>';
		}
	else $userAuthor = 'Пользователь удален';
	return $userAuthor;
}

$id = htmlspecialchars($_POST['id'],ENT_QUOTES);
$title = htmlspecialchars($_POST['title'],ENT_QUOTES);
$text = htmlspecialchars($_POST['text'],ENT_QUOTES);
$metatitle = htmlspecialchars($_POST['metatitle'],ENT_QUOTES);
$metadesc = htmlspecialchars($_POST['metadesc'],ENT_QUOTES);
$metakey = htmlspecialchars($_POST['metakey'],ENT_QUOTES);
$parent = htmlspecialchars($_POST['parent'],ENT_QUOTES);

if (isset($_SESSION['user'])&&$_SESSION['group']=='admin')
{
	
	$update = mysqli_query($CONNECTION,"UPDATE `".DB_PREFIX."forum_topic` SET `title`='$title', `text`='$text',`MetaTitle`='$metatitle',`MetaDescription`='$metadesc',`MetaTags`='$metakey',`forumCatID`='$parent' WHERE `forumID`='$id'");
	if ($update) echo 'ok'; else echo mysqli_error($CONNECTION);
}
else echo 'Вы не администратор';

?>