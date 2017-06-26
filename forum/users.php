<?php
if (!empty($_POST))
{
	
	session_start();
	session_name("MoldovaTruck");
	require_once "../system/configuration.php";
	require_once "../system/functions.php";
	$_POST['title'] = htmlspecialchars($_POST['title'],ENT_QUOTES);
	$query = "SELECT * FROM `".DB_PREFIX."users` WHERE `activated`='1' AND `isEnabled`='1'";
	if (isset($_POST['title'])) $query.=" AND (`login` LIKE '%".$_POST['title']."%' OR `userName` LIKE '%".$_POST['title']."%' OR `userFullname` LIKE '%".$_POST['title']."%')";
	if (!isset($_POST['order']) or $_POST['order']=='topics_asc') $query.=" ORDER BY `topics`";
	if ($_POST['order']=='topics_desc') $query.=" ORDER BY `topics` DESC";
	if ($_POST['order']=='comments_asc') $query.=" ORDER BY `comments` ASC";
	if ($_POST['order']=='comments_desc') $query.=" ORDER BY `comments` DESC";
	$_SESSION['searchusers'] = $query;

	
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

}elseif(empty($_POST))
{
	$query = "SELECT * FROM `".DB_PREFIX."users` WHERE `activated`='1' AND `isEnabled`='1'";
	if ($_POST['order']=='topics_desc') $query.=" ORDER BY `topics` DESC";
	
}
if (!empty($_SESSION['searchusers']))$query = $_SESSION['searchusers'];
function Navigation2($page,$pages) {
   $n='';
	global $home_page;
    if($pages>1){
        $n.='<div class="pages" style="text-align:center;margin-top:1em">';
		
		
        if($pages <= 9) {
        $start = 1;
           $end = $pages;
      }
        else {
           if(($page - 4) < 1) {
                $start = 1;
                $end = 9;
          }
           elseif(($page + 4) > $pages) {
               $end = $pages;
               $start = $pages - 9;
          }
            else {
               $start = ($page - 4);
                $end = ($page +4);
          }
        }
        for($i = $start; $i <= $end; $i++){
            $n.='<a href="'.HOME.LANG.'/forum?user='.$_GET['user'].('&page='.$i).'"'.(($page == $i) ? ' class="btn btn-primary" ' : ' class="btn btn-link"').' style="margin-right:0.5em;">'.$i.'</a>';
        }
        if($end < $pages) {
           if($end != ($pages - 1)) $n.='...';
            $n.='<a href="'.HOME.LANG.'/forum?user='.$_GET['user'].'&page='.$pages.'" class="btn btn-link" style="margin-left:0.5em;">'.$pages.'</a>';
        }
        $n.='</div>';
    }
return $n;
}

$number = 20;
if (!empty($_GET['page'])) $start = (htmlspecialchars($_GET['page'],ENT_QUOTES)-1) * $number; 
$CPages = mysqli_query($CONNECTION,$query);
$PagesCount=intval((mysqli_num_rows($CPages) - 1) / $number) + 1;
if(!is_numeric($_GET['page'])) $_GET['page'] = 1;
if (!empty($start)) $query.=" LIMIT ".$start.",$number";
else $query.=' LIMIT '.$number;

$getUsers = mysqli_query($CONNECTION,$query);
if (mysqli_num_rows($getUsers)>0)
{
	
	echo '<div class="forum_title" style="margin-top:2em;"><h1>Пользователи</h1></div>
	<div class="table-responsive">
		<table class="table">
		<tbody>
		<tr>
			<th colspan="2">Имя и Фамилия</th>
			<th>Тем</th>
			<th>Комментариев</th>
			<th>Дата регистрации</th>
			<th>Последний визит</th>
		</tr>
	';
	$users = mysqli_fetch_array($getUsers);
	do
	{
		$getThemes = mysqli_query($CONNECTION,"SELECT `forumID` FROM `".DB_PREFIX."forum_topic` WHERE `userID`='$users[userID]' AND `ParentTopic`='0' AND `isEnabled`='1'");
		$getCom = mysqli_query($CONNECTION,"SELECT `forumID` FROM `".DB_PREFIX."forum_topic` WHERE `userID`='$users[userID]' AND `ParentTopic`<>'0' AND `isEnabled`='1'");
		$upd = mysqli_query($CONNECTION,"UPDATE `".DB_PREFIX."users` SET `topics`='".mysqli_num_rows($getThemes)."', `comments`='".mysqli_num_rows($getCom)."' WHERE `userID`='$users[userID]'");
		echo mysqli_error(CONNECTION);
		$getLastVisit = mysqli_query($CONNECTION,"SELECT `DateTime`,`timeseconds` FROM `".DB_PREFIX."activity` WHERE `userID`='$users[userID]' ORDER BY `ID` DESC LIMIT 1");
		$LastVisit = mysqli_fetch_array($getLastVisit);
		echo'
		<tr>
			<td style="width:3em;text-align:center;vertical-align: middle;">';
			if (empty($users['Avatar'])) echo'<p><i class="fa fa-user-secret" aria-hidden="true" style="font-size:3em;"></i></p>';
			else echo'<p><img src="'.$users['Avatar'].'" style="max-width:3em;"></p>';
			echo'</td>
			<td style="vertical-align: middle;">'.getUserInfo($users['userID']).'</td>
			<td style="vertical-align: middle;">'.$users['topics'].'</td>
			<td style="vertical-align: middle;">'.$users['comments'].'</td>
			<td style="vertical-align: middle;">'.Date_($users['dateReg']).'</td>
			<td style="vertical-align: middle;">';
			$diference = time()-$LastVisit['timeseconds'];
			if ($diference>(15*60)) {
				echo Date_($LastVisit['DateTime']).'';
			}else echo'<font style="color:#18bc9c">В сети</font>';
			echo'</td>
		</tr>
		';
	}
	while($users = mysqli_fetch_array($getUsers));
	echo '</tbody></table></div>';
	echo Navigation2(htmlspecialchars($_GET['page'],ENT_QUOTES),$PagesCount);
}
						
?>