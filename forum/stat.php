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

function Date_($date)
{
	$explode = explode('-',substr($date,0,10));
	$date_ = $explode[2].' ';
	if ($explode[1]==1) $date_.='января ';
	if ($explode[1]==2) $date_.='февраля ';
	if ($explode[1]==3) $date_.='марта ';
	if ($explode[1]==4) $date_.='апреля ';
	if ($explode[1]==5) $date_.='мая ';
	if ($explode[1]==6) $date_.='июня ';
	if ($explode[1]==7) $date_.='июля ';
	if ($explode[1]==8) $date_.='августа ';
	if ($explode[1]==9) $date_.='сентября ';
	if ($explode[1]==10) $date_.='октября ';
	if ($explode[1]==11) $date_.='ноября ';
	if ($explode[1]==12) $date_.='декабря ';
	$date_.=$explode[0];
	if ($explode[0]==date('Y') and $explode[1]==date('m') and $explode[2]==date('d')) $date_ = 'Сегодня';
	return $date_;
}


$limit = htmlspecialchars($_POST['limit'],ENT_QUOTES);

echo'
<div class="tab-pane fade" role="tabpanel" id="users" aria-labelledby="users-tab">
				<div class="table-responsive">
				<table class="table">';
				$getComments = mysqli_query($CONNECTION,"SELECT `userID`,`dateReg` FROM `".DB_PREFIX."users` WHERE `isEnabled`='1' AND `activated`='1' ORDER BY `userID` DESC LIMIT $limit");
				if (mysqli_num_rows($getComments)>0)
				{
					$comments = mysqli_fetch_array($getComments);
					do
					{
						
						echo '<tr><td>&bull; '.getUserInfo($comments['userID']).'</td>
						<td style="width:25%;text-align:right">Регистрация: '.Date_($comments['dateReg']).'</td></tr>
						
						</div>';
					}
					while($comments = mysqli_fetch_array($getComments));
				}else echo 'Пока нет';
				echo'
				</table>
				</div>
				</div>
				<div class="tab-pane fade" role="tabpanel" id="comment" aria-labelledby="comment-tab">
				<div class="table-responsive">
				<table class="table">';
				$getComments = mysqli_query($CONNECTION,"SELECT `ParentTopic`,`userID` FROM `".DB_PREFIX."forum_topic` WHERE `ParentTopic`<>'0' AND `isEnabled`='1' ORDER BY `forumID` DESC LIMIT $limit");
				if (mysqli_num_rows($getComments)>0)
				{
					
					$comments = mysqli_fetch_array($getComments);
					do
					{
						$getTopic = mysqli_query($CONNECTION,"SELECT `title` FROM `".DB_PREFIX."forum_topic` WHERE `forumID`='$comments[ParentTopic]' AND `isEnabled`='1'");
						$Topic = mysqli_fetch_array($getTopic);
						echo '<tr><td>&bull;  <a href="'.HOME.LANG.'/forum?topic='.$comments['ParentTopic'].'">'.$Topic['title'].'</a></td>
						<td align="left" width="50">Автор:</td>
						<td align="right" width="150">'.getUserInfo($comments['userID']).'</td>
						</tr>';
						
					}
					while($comments = mysqli_fetch_array($getComments));
				
				}else echo 'Пока нет';
				echo'</table>
				</div></div>
				
				 <div class="tab-pane fade in active" role="tabpanel" id="created" aria-labelledby="created-tab">
				 <div class="table-responsive">
				<table class="table">';
				 $getComments = mysqli_query($CONNECTION,"SELECT `forumID`,`userID`,`title` FROM `".DB_PREFIX."forum_topic` WHERE `ParentTopic`='0' AND `isEnabled`='1' ORDER BY `forumID` DESC LIMIT $limit");
				if (mysqli_num_rows($getComments)>0)
				{
					
					$comments = mysqli_fetch_array($getComments);
					do
					{
						echo '<tr><td>&bull;  <a href="'.HOME.LANG.'/forum?topic='.$comments['forumID'].'">'.$comments['title'].'</a></td>
						<td align="left" width="50">Автор:</td>
						<td align="right" width="150">'.getUserInfo($comments['userID']).'</td>
						</tr>';
						
					}
					while($comments = mysqli_fetch_array($getComments));
					
				}else echo 'Пока нет';
				 echo'</table>
				</div></div>
				 <div class="tab-pane fade" role="tabpanel" id="top" aria-labelledby="top-tab">
				 <div class="table-responsive">
				<table class="table">';
				 $getComments = mysqli_query($CONNECTION,"SELECT `forumID`,`views`,`title` FROM `".DB_PREFIX."forum_topic` WHERE `ParentTopic`='0' AND `isEnabled`='1' ORDER BY `views` DESC LIMIT $limit");
				if (mysqli_num_rows($getComments)>0)
				{
					$comments = mysqli_fetch_array($getComments);
					do
					{
						echo '
						<tr><td>&bull;  <a href="'.HOME.LANG.'/forum?topic='.$comments['forumID'].'">'.$comments['title'].'</a></td>
						<td style="width:25%;text-align:right">'.$comments['views'].' просмотров</td>
						</tr>
						';
					}
					while($comments = mysqli_fetch_array($getComments));
				}else echo 'Пока нет';
				 echo'</table>
				</div></div>';				
?>