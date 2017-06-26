<?php
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
            $n.='<a href="'.HOME.LANG.'/forum?action='.$_GET['action'].(($i != 1) ? '&page='.$i : '').'"'.(($page == $i) ? ' class="btn btn-primary" ' : ' class="btn btn-link"').' style="margin-right:0.5em;">'.$i.'</a>';
        }
        if($end < $pages) {
           if($end != ($pages - 1)) $n.='...';
            $n.='<a href="'.HOME.LANG.'/forum?action='.$_GET['action'].'&page='.$pages.'" class="btn btn-link" style="margin-left:0.5em;">'.$pages.'</a>';
        }
        $n.='</div>';
    }
return $n;
}
if (!isset($_SESSION['user']) or $_SESSION['group']!=='admin')
exit('Доступ запрещен');
$number = 20;
if (!empty($_GET['page'])) $start = (htmlspecialchars($_GET['page'],ENT_QUOTES)-1) * $number; 
$query = "SELECT * FROM `".DB_PREFIX."forum_topic` WHERE `ParentTopic`<>'0' AND `seen`='0'";
$CPages = mysqli_query($CONNECTION,$query);
$PagesCount=intval((mysqli_num_rows($CPages) - 1) / $number) + 1;
if(!is_numeric($_GET['page'])) $_GET['page'] = 1;
if (!empty($start)) $query.=" LIMIT ".$start.",$number";
else $query.=' LIMIT '.$number;
echo '<h1 style="margin-bottom:1em">Модерация тем</h1>';
$getChilds = mysqli_query($CONNECTION,$query);
							
							if(mysqli_num_rows($getChilds)>0)
							{
								echo '
								<div class="table-responsive">
								<table class="table">
								<tr>
								<th colspan="2">Название темы</th>
								<th>Автор</th>
								<th>Раздел</th>
								<th>Ссылка</th>
								</tr>
								';
								$Childs = mysqli_fetch_array($getChilds);
								do
								{
									
									$pg = $_SERVER["REQUEST_URI"];
									$getStatisticViews = mysqli_query($CONNECTION,"SELECT DISTINCT `ip` FROM `".DB_PREFIX."activity` WHERE `page`='$pg'");
									$getStatisticMessages = mysqli_query($CONNECTION,"SELECT `forumID` FROM `".DB_PREFIX."forum_topic` WHERE `isEnabled`='1' AND `ParentTopic`='$Childs[forumID]'");
									$getParent = mysqli_query($CONNECTION,"SELECT `title` FROM `".DB_PREFIX."forum_topic` WHERE `forumID`='$Childs[ParentTopic]'");
									$parent = mysqli_fetch_array($getParent);
									
									$getCat = mysqli_query($CONNECTION,"SELECT `title` FROM `".DB_PREFIX."forum_category` WHERE `forumCatID`='$Childs[forumCatID]'");
									$category = mysqli_fetch_array($getCat);
									
									echo '
									<td style="width:3em;text-align:center;vertical-align: middle;" valign="middle">
									<i class="fa fa-envelope-o" aria-hidden="true" style="font-size: 1.5em;'.$new.'"></i>
									</td>
									<td style="vertical-align: middle;"><a href="'.HOME.LANG.'/forum?topic='.$Childs['ParentTopic'].'#message'.$Childs['forumID'].'">'.htmlspecialchars_decode($parent['title']).'</td>
									<td style="vertical-align: middle;">'.getUserInfo($Childs['userID']).'</td>
									<td style="vertical-align: middle;"><a href="'.HOME.LANG.'/forum?category='.$Childs['forumCatID'].'">'.$category['title'].'</a></td>
									<td style="vertical-align: middle;"><a href="'.HOME.LANG.'/forum?topic='.$Childs['ParentTopic'].'#message'.$Childs['forumID'].'">'.mb_substr(strip_tags(htmlspecialchars_decode($Childs['text'])),0,25,"UTF-8").'</a></td>
									</tr>';
								}
								while($Childs = mysqli_fetch_array($getChilds));
								echo '</table></div>';
								echo Navigation(htmlspecialchars($_GET['page'],ENT_QUOTES),$PagesCount);
							}else echo '<Div style="width:100%;background:#F4F7F9;padding:1em;color: #7F7F7F;">Нет тем</div>';
						
						
?>