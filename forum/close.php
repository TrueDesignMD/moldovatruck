<?php
session_start();
session_name("MoldovaTruck");
require_once "../system/configuration.php";
require_once "../system/functions.php";

	$id = htmlspecialchars($_POST['id'],ENT_QUOTES);

	if(!empty($id)&&$id>0&&isset($_SESSION['user'])&&$_SESSION['group']=='admin')
	{
		$Insert = mysqli_query($CONNECTION,"UPDATE `".DB_PREFIX."forum_topic` SET `closed`='1' WHERE `forumID`='$id'");
		if ($Insert) echo 'ok'; else echo mysqli_error($CONNECTION);
		
	}
	else echo 'Длина текста менее 15 символов';

						
?>