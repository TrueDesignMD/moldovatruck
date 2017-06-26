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
$explodeHttp = explode('http://',$_POST['text']);
	$_POST['text'] = '';
	for($k=0;$k<count($explodeHttp);$k++)
	{
		$_POST['text'].=$explodeHttp[$k];
	}
	$explodeHttp = explode('https://',$_POST['text']);
	$_POST['text'] = '';
	for($k=0;$k<count($explodeHttp);$k++)
	{
		$_POST['text'].=$explodeHttp[$k];
	}
	
	$explodeHttp = explode('href=',$_POST['text']);
	$_POST['text'] = '';
	for($k=0;$k<count($explodeHttp);$k++)
	{
		$_POST['text'].=$explodeHttp[$k];
	}
	
	$text = htmlspecialchars(trim($_POST['text']),ENT_QUOTES);
	$cat = htmlspecialchars($_POST['cat'],ENT_QUOTES);
	$title = htmlspecialchars(trim($_POST['title']),ENT_QUOTES);
	$desc = htmlspecialchars($_POST['desc'],ENT_QUOTES);
	$send = htmlspecialchars($_POST['send'],ENT_QUOTES);
	
	if(!empty($text)&&mb_strlen($text,"UTF-8")>15 and $cat>0 and !empty($title)&&$_SESSION['user']>0)
	{
		if ($_SESSION['group']=='admin') $seen = '1'; else $seen = '0';
		$tags = join(',',explode(' ',$title));
		$upd = mysqli_query($CONNECTION,"UPDATE `".DB_PREFIX."users` SET `topics`=`topics`+1 WHERE `userID`='$_SESSION[user]'");
		$Insert = mysqli_query($CONNECTION,"INSERT INTO `".DB_PREFIX."forum_topic`(`userID`,`isEnabled`,`datetime`,`text`,`forumCatID`,`ParentTopic`,`title`,`MetaTitle`,`MetaDescription`,`MetaTags`,`seen`,`Description`) VALUES ( '$_SESSION[user]', '1', '".time()."','$text','$cat','$id','$title','$title','$title','$tags','$seen','$desc')");
		$new =  mysqli_insert_id($CONNECTION);
		
		if ($send=='true'&&$_SESSION['group']!=='admin')
		{
			$insert2 = mysqli_query($CONNECTION,"INSERT INTO `".DB_PREFIX."forum_notifier`(`forumID`,`userID`)VALUES('$new','$_SESSION[user]')");
		}
		
		$body = '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body style="width:100%;text-align:center;padding:0px;margin:0px;">
	<div style="background:none;width:60%;margin-left:20%;">
	
	<div style="margin-top:15px;color:white;padding:10px;border:1px solid #ccc;padding-top:30px;padding-bottom:30px;background-color:#2c3e50;font-size:18px;text-align:center;">Новая тема на форуме Moldovatruck.md</div>
	<div style="color:#999;font-size:15px;border:1px solid #ccc;padding:10px;padding-top:30px;padding-bottom:30px;text-align:left;">
	
	<b style="font-size:15px;color:#000">Данные:</b>
	<p><font style="display:inline-block;width:120px;color:#333">Тема:</font> '.htmlspecialchars_decode($title).'</p>
	<p><font style="display:inline-block;width:120px;color:#333">Автор:</font> '.getUserInfo($_SESSION['user']).'</p>
	<p><font style="display:inline-block;width:120px;color:#333">Текст:</font> '.htmlspecialchars_decode($text).'</p>
	<p><font style="display:inline-block;width:120px;color:#333">Ссылка:</font> <a href="'.HOME.LANG.'/forum?topic='.$new.'">'.HOME.LANG.'/forum?topic='.$new.'</a></p>
	<p align=Center style="color:#000;margin-top:25px;">При возникновении вопросов пишите нам info@moldovatruck.md</p></div>
	</div>
</body>

</html>';
		if ($_SESSION['group']!=='admin') 
		{
			$send = send_mail('s1.magicnet.md',465,'ssl',true,'Moldovatruck оповещения','notifications@moldovatruck.md','S(N=w)&-[lXl',"Moldovatruck",'moversauto@gmail.com','UTF-8','Новая тема на форуме Moldovatruck',$body);
			if (is_bool($send)&&$send==true)echo $new;  else echo $send;
		}else echo $new;
		
	}
	else echo 'Длина текста менее 15 символов';

						
?>