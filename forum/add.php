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
	$text = htmlspecialchars($_POST['text'],ENT_QUOTES);
	$snd_topic = htmlspecialchars($_POST['topic'],ENT_QUOTES);
	$snd_forum = htmlspecialchars($_POST['forum'],ENT_QUOTES);
	$id = htmlspecialchars($_POST['id'],ENT_QUOTES);
	if(!empty($text)&&mb_strlen($text,"UTF-8")>15)
	{
		
		if ($_SESSION['group']=='admin') $seen = '1'; else $seen = '0';
		$getCat = mysqli_query($CONNECTION,"SELECT `forumCatID` FROM `".DB_PREFIX."forum_topic` WHERE `forumID`='$id' AND `isEnabled`='1'");
		if (mysqli_num_rows($getCat)>0)
		{
			$CAT = mysqli_fetch_array($getCat);
			$upd = mysqli_query($CONNECTION,"UPDATE `".DB_PREFIX."users` SET `comments`=`comments`+1 WHERE `userID`='$_SESSION[user]'");
			$Insert = mysqli_query($CONNECTION,"INSERT INTO `".DB_PREFIX."forum_topic`(`userID`,`isEnabled`,`datetime`,`text`,`forumCatID`,`ParentTopic`,`seen`)VALUES('$_SESSION[user]','1','".time()."','$text','$CAT[forumCatID]','$id','$seen')");
			$new =  mysqli_insert_id($CONNECTION);
			
			if ($snd_topic=='true'&&$_SESSION['group']!=='admin')
			$insert2 = mysqli_query($CONNECTION,"INSERT INTO `".DB_PREFIX."forum_notifier`(`forumID`,`userID`)VALUES('$id','$_SESSION[user]')");
			
			if ($snd_forum=='true'&&$_SESSION['group']!=='admin')
			$insert3 = mysqli_query($CONNECTION,"INSERT INTO `".DB_PREFIX."forum_notifier`(`forumCatID`,`userID`)VALUES('$CAT[forumCatID]','$_SESSION[user]')");
			
			
			$query = "SELECT * FROM `".DB_PREFIX."forum_topic` WHERE `forumID`='$id' OR `ParentTopic`='$id' ORDER BY `forumID`";
			$CPages = mysqli_query($CONNECTION,$query);
			$PagesCount=intval((mysqli_num_rows($CPages) - 1) / 20) + 1;
			$_SESSION['comment'] = $new;
			$get = mysqli_query($CONNECTION,"SELECT `title` FROM `".DB_PREFIX."forum_topic` WHERE `forumID`='$id'");
			$topic = mysqli_fetch_array($get);
			$body = '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body style="width:100%;text-align:center;padding:0px;margin:0px;">
	<div style="background:none;width:60%;margin-left:20%;">
	
	<div style="margin-top:15px;color:white;padding:10px;border:1px solid #ccc;padding-top:30px;padding-bottom:30px;background-color:#2c3e50;font-size:18px;text-align:center;">Новый комментарий на форуме Moldovatruck.md</div>
	<div style="color:#999;font-size:15px;border:1px solid #ccc;padding:10px;padding-top:30px;padding-bottom:30px;text-align:left;">
	
	<b style="font-size:15px;color:#000">Данные:</b>
	<p><font style="display:inline-block;width:120px;color:#333">Тема:</font> '.$topic['title'].'</p>
	<p><font style="display:inline-block;width:120px;color:#333">Автор:</font> '.getUserInfo($_SESSION['user']).'</p>
	<p><font style="display:inline-block;width:120px;color:#333">Текст:</font> '.htmlspecialchars_decode($text).'</p>
	<p><font style="display:inline-block;width:120px;color:#333">Ссылка:</font> <a href="'.HOME.LANG.'/forum?topic='.$id.'&page='.$PagesCount.'#message'.$new.'">'.HOME.LANG.'/forum?topic='.$id.'&page='.$PagesCount.'#message'.$new.'</a></p>
	<p align=Center style="color:#000;margin-top:25px;">При возникновении вопросов пишите нам info@moldovatruck.md</p></div>
	</div>
</body>

</html>';
		if ($_SESSION['group']!=='admin') 
		{
			$send = send_mail('s1.magicnet.md',465,'ssl',true,'Moldovatruck оповещения','notifications@moldovatruck.md','S(N=w)&-[lXl',"Moldovatruck",'moversauto@gmail.com','UTF-8','Новый комментарий на форуме Moldovatruck',$body);
			if (is_bool($send)&&$send==true)
			{
				$getNotifications = mysqli_query($CONNECTION,"SELECT `Email`,`userName`,`userFullname` FROM `".DB_PREFIX."users` WHERE `userID` IN (SELECT `userID` FROM `".DB_PREFIX."forum_notifier` WHERE (`forumID`='$id' OR `forumCatID`='$CAT[forumCatID]'))");
				if (mysqli_num_rows($getNotifications)>0)
				{
					$notific = mysqli_fetch_array($getNotifications);
					do
					{
						$send = send_mail('s1.magicnet.md',465,'ssl',true,'Moldovatruck оповещения','notifications@moldovatruck.md','S(N=w)&-[lXl',$notific['userName']." ".$notific['userFullname'],$notific['Email'],'UTF-8','Новый комментарий в теме «'.$topic['title'].'» на форуме Moldovatruck',$body);
					}
					while($notific = mysqli_fetch_array($getNotifications));
				}
				echo '&page='.$PagesCount;
			}else echo $send;
		}else echo '&page='.$PagesCount;
		
		}
		else echo 'Не верный ID темы '.mysqli_error($CONNECTION);
	}
	else echo 'Длина текста менее 15 символов';

						
?>