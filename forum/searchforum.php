<?php
if (!isset($_SESSION['search']))
{
	session_start();
	session_name("MoldovaTruck");
	require_once "../system/configuration.php";
	require_once "../system/functions.php";
	$cat = htmlspecialchars($_POST['cat'],ENT_QUOTES);
	$title = htmlspecialchars($_POST['title'],ENT_QUOTES);
	$query = "SELECT `title`,`forumID`,`timestamp`,`userID` FROM `".DB_PREFIX."forum_topic` WHERE `title` LIKE '%$title%' AND `isEnabled`='1' AND `ParentTopic`='0'";
	if (!empty($cat)&&$cat>0) $query.=" AND `forumCatID`='$cat'";
	$_SESSION['search'] = $query;
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
}else $query = $_SESSION['search'];
function Navigation($page,$pages) {
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
            $n.='<a href="'.HOME.LANG.'/forum?action=search'.('&page='.$i).'"'.(($page == $i) ? ' class="btn btn-primary" ' : ' class="btn btn-link"').' style="margin-right:0.5em;">'.$i.'</a>';
        }
        if($end < $pages) {
           if($end != ($pages - 1)) $n.='...';
            $n.='<a href="'.HOME.LANG.'/forum?action=search&page='.$pages.'" class="btn btn-link" style="margin-left:0.5em;">'.$pages.'</a>';
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
	$getContet = mysqli_query($CONNECTION,$query);
	if (mysqli_num_rows($getContet)>0)
	{
		echo '<div class="forum_title"><h3>Результаты поиска</h3></div>
		<div class="table-responsive">
								<table class="table">
								<tr>
								<th>Название темы</th>
								<th>Автор</th>
								<th>Дата</th>
								</tr>';
		
		$search = mysqli_fetch_array($getContet);
		do
		{
			echo '<tr>
			<td><a href="'.HOME.LANG.'/forum?topic='.$search['forumID'].'">'.$search['title'].'</a></td>
			<td>'.getUserInfo($search['userID']).'</td>
			<td>'.Date_($search['timestamp']).'</td>
			</tr>';
		}
		while($search = mysqli_fetch_array($getContet));
		echo'</table></div>';
		echo Navigation($_GET['page'],$PagesCount);
	}
	else echo 'Не найдено';

						
?>