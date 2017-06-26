<?php
session_start();
session_name("MoldovaTruck");
require_once "../system/configuration.php";
require_once "../system/functions.php";

	$cat = htmlspecialchars($_POST['cat'],ENT_QUOTES);
	$title = htmlspecialchars(trim($_POST['title']),ENT_QUOTES);
	$desc = htmlspecialchars(trim($_POST['desc']),ENT_QUOTES);
	if(!empty($title)&&$_SESSION['group']=='admin')
	{
		if ($_SESSION['group']=='admin') $Enabled = '1'; else $Enabled = '0';
		$tags = join(',',explode(' ',$title));
		$Insert = mysqli_query($CONNECTION,"INSERT INTO `".DB_PREFIX."forum_category`(`isEnabled`,`datetime`,`Description`,`Parent`,`title`, `MetaTitle`, `MetaDescription`,`MetaTags`)VALUES('$Enabled','".time()."','$desc','$cat','$title','$title','$title','$tags')");
		if ($Insert)	echo mysqli_insert_id($CONNECTION);else echo mysqli_error($CONNECTION);
		
	}
	else echo 'Длина текста менее 15 символов';

						
?>