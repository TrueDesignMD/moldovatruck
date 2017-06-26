<?php
session_start();
session_name("MoldovaTruck");
require_once "../system/configuration.php";
require_once "../system/functions.php";

$id = htmlspecialchars($_POST['id'],ENT_QUOTES);
$title = htmlspecialchars($_POST['title'],ENT_QUOTES);
$desc = htmlspecialchars($_POST['desc'],ENT_QUOTES);
$metatitle = htmlspecialchars($_POST['metatitle'],ENT_QUOTES);
$metadesc = htmlspecialchars($_POST['metadesc'],ENT_QUOTES);
$metakey = htmlspecialchars($_POST['metakey'],ENT_QUOTES);
$parent = htmlspecialchars($_POST['parent'],ENT_QUOTES);

if (isset($_SESSION['user'])&&$_SESSION['group']=='admin')
{
	$update = mysqli_query($CONNECTION,"UPDATE `".DB_PREFIX."forum_category` SET `title`='$title', `Description`='$desc',`MetaTitle`='$metatitle',`MetaDescription`='$metadesc',`MetaTags`='$metakey',`Parent`='$parent' WHERE `forumCatID`='$id'");
	if ($update) echo 'ok'; else echo mysqli_error($CONNECTION);
}
else echo 'Вы не администратор';

?>