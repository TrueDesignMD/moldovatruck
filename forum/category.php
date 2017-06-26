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
            $n.='<a href="'.HOME.LANG.'/forum?category='.$_GET['category'].(($i != 1) ? '&page='.$i : '').'"'.(($page == $i) ? ' class="btn btn-primary" ' : ' class="btn btn-link"').' style="margin-right:0.5em;">'.$i.'</a>';
        }
        if($end < $pages) {
           if($end != ($pages - 1)) $n.='...';
            $n.='<a href="'.HOME.LANG.'/forum?category='.$_GET['category'].'&page='.$pages.'" class="btn btn-link" style="margin-left:0.5em;">'.$pages.'</a>';
        }
        $n.='</div>';
    }
return $n;
}
if (!empty($_SESSION['search'])) unset($_SESSION['search']);
$number = 20;
if (!empty($_GET['page'])) $start = (htmlspecialchars($_GET['page'],ENT_QUOTES)-1) * $number; 
$query = "SELECT * FROM `".DB_PREFIX."forum_topic` WHERE `forumCatID`='$_GET[category]' AND `isEnabled`='1' AND `ParentTopic`='0' ORDER BY `timestamp` DESC";
$CPages = mysqli_query($CONNECTION,$query);
$PagesCount=intval((mysqli_num_rows($CPages) - 1) / $number) + 1;
if(!is_numeric($_GET['page'])) $_GET['page'] = 1;
if (!empty($start)) $query.=" LIMIT ".$start.",$number";
else $query.=' LIMIT '.$number;
$getParent = mysqli_query($CONNECTION,"SELECT `title`,`Description` FROM `".DB_PREFIX."forum_category` WHERE `forumCatID`='".$_GET['category']."' AND `isEnabled`='1'");
$parent = mysqli_fetch_array($getParent);
if(isset($_SESSION['user']))	echo'<a href="'.HOME.LANG.'/forum?action=addtopic" id="Alnk" style="float:right;margin-top: 3.5em;font-size:1.3em" title="Создать тему в данном форуме"><i class="fa fa-plus-circle" aria-hidden="true"></i> Создать тему</a>';
if (!isset($_SESSION['user'])) echo'<a href="#" data-toggle="modal" data-target="#Autorize" id="Alnk" title="Создать тему в данном форуме" style="float:right;margin-top: 3.5em;font-size:1.3em"><i class="fa fa-plus-circle" aria-hidden="true"></i> Создать тему</a>';
						
			 if(isset($_SESSION['group'])&&$_SESSION['group']=='admin')	echo'<a href="'.HOME.LANG.'/forum?action=addcategory" style="float:right;margin-right:1em;margin-top: 3.5em;font-size:1.3em"><i class="fa fa-sitemap" aria-hidden="true"></i> Создать категорию или форум</a>';
echo '<h1 style="margin-bottom:0.5em">Список тем</h1>';
if (count($BROMS_)>0){
							echo '<div style="font-size:1.1em"><a href="'.HOME.$URL.'">Все форумы</a>';
							if (!empty($BROMS_[0])&&!isset($_GET['user'])&&!isset($_GET['action'])) echo ' › категория <a href="'.$BROMS_[0][1].'">'.$BROMS_[0][0].'</a>';
							if (!empty($BROMS_[1])&&!isset($_GET['user'])&&!isset($_GET['action'])) echo ' › форум <a href="'.$BROMS_[1][1].'">'.$BROMS_[1][0].'</a>';
							echo '</div>';
						}echo '<br>';
$getChilds = mysqli_query($CONNECTION,$query);
$_SESSION['category'] = $_GET['category'];
							echo '<div class="forum_title"><h3>'.$parent['title'].'</h3></div>';
							if(mysqli_num_rows($getChilds)>0)
							{
								echo '
								<div class="table-responsive">
								<table class="table">
								<tr>
								<th colspan="2">Название темы</th>
								<th>Автор</th>
								<th>Статистика</th>
								<th>Последний комментарий</th>
								</tr>
								';
								$Childs = mysqli_fetch_array($getChilds);
								do
								{
									
									$pg = $_SERVER["REQUEST_URI"];
									$getStatisticViews = mysqli_query($CONNECTION,"SELECT DISTINCT `ip` FROM `".DB_PREFIX."activity` WHERE `page`='$pg'");
									$getStatisticMessages = mysqli_query($CONNECTION,"SELECT `forumID` FROM `".DB_PREFIX."forum_topic` WHERE `isEnabled`='1' AND `ParentTopic`='$Childs[forumID]'");
									$getLastMessage = mysqli_query($CONNECTION,"SELECT * FROM `".DB_PREFIX."forum_topic` WHERE (`ParentTopic` =  '$Childs[forumID]' OR `forumID`='$Childs[forumID]')
AND  `isEnabled` =  '1'
ORDER BY  `forumID` DESC 
LIMIT 1");
									
									
									
									if (mysqli_num_rows($getLastMessage)>0)
									{
									
										$LastMessage = mysqli_fetch_array($getLastMessage);	
										$query = "SELECT * FROM `".DB_PREFIX."forum_topic` WHERE `forumID`='$Childs[forumID]' OR `ParentTopic`='$Childs[forumID]' AND `isEnabled`='1' ORDER BY `forumID`";
										$CPages2 = mysqli_query($CONNECTION,$query);
										$PagesCount2=intval((mysqli_num_rows($CPages2) - 1) / 20) + 1;
										if($LastMessage['ParentTopic']==0)$Last = 'Тема: <a href="'.HOME.LANG.'/forum?topic='.$Childs['forumID'].'&page=1#message'.$Childs['forumID'].'">'.mb_substr(strip_tags(htmlspecialchars_decode($Childs['text'])),0,25,"UTF-8").'</a>'.Last($Childs); 
										else $Last = 'Тема: <a href="'.HOME.LANG.'/forum?topic='.$LastMessage['ParentTopic'].'&page='.$PagesCount2.'#message'.$LastMessage['forumID'].'">'.mb_substr(strip_tags(htmlspecialchars_decode($LastMessage['text'])),0,25,"UTF-8").'</a>'.Last($LastMessage);
										
										
										
										
										
									    $SQLthemeCreated = mysqli_query($CONNECTION,"SELECT `forumID` FROM `".DB_PREFIX."forum_topic` WHERE `forumID`='$Childs[forumID]' AND `isEnabled`='1' AND `ParentTopic`='0' AND `timestamp` LIKE '".date('Y-m-d')."%'");
										
										
									if (mysqli_num_rows($SQLthemeCreated)>0) $new = 'color:#f39c12'; else $new = '';
									
										
										
									}else {$Last = 'Пусто'; $new='';}
									
									$Title = '<a href="'.HOME.LANG.'/forum?topic='.$Childs['forumID'].'">'.htmlspecialchars_decode($Childs['title']).'</a>';
									$SQLtodayComment = mysqli_query($CONNECTION,"SELECT `forumID` FROM `".DB_PREFIX."forum_topic` WHERE `isEnabled`='1' AND `ParentTopic`='$Childs[forumID]' AND `timestamp` LIKE '".date('Y-m-d')."%' LIMIT 1");
										if (mysqli_num_rows($SQLtodayComment)>0)
										{
											$todayComment = mysqli_fetch_array($SQLtodayComment);
											$CPages3 = mysqli_query($CONNECTION,"SELECT `forumID` FROM `".DB_PREFIX."forum_topic` WHERE `forumID`<='$todayComment[forumID]' AND `isEnabled`='1' AND `ParentTopic`='$Childs[forumID]'");
											$PagesCount3=intval((mysqli_num_rows($CPages3) - 1) / 20) + 1;
											$Title.=' <a href="'.HOME.LANG.'/forum?topic='.$Childs['forumID'].'&page='.$PagesCount3.'#message'.$todayComment['forumID'].'" style="color:red"> NEW</a>';
										}
										
									if (!empty($Childs['Description'])) $Title.= '<br>'.htmlspecialchars_decode($Childs['Description']);
									
									echo '
									<td style="width:3em;text-align:center;vertical-align: middle;" valign="middle">
									<i class="fa fa-envelope-o" aria-hidden="true" style="font-size: 1.5em;'.$new.'"></i>
									</td>
									<td style="vertical-align: middle;">'.$Title.'</td>
									<td style="vertical-align: middle;">'.getUserInfo($Childs['userID']).'</td>
									<td style="vertical-align: middle;">'.mysqli_num_rows($getStatisticViews).' просмотров<br>'.mysqli_num_rows($getStatisticMessages).' комметариев</td>
									<td style="vertical-align: middle;">'.$Last.'</td>
									</tr>';
								}
								while($Childs = mysqli_fetch_array($getChilds));
								echo '</table></div>';
								if((isset($_SESSION['user'])&&empty($params))or(!empty($_GET['topic'])&&isset($_SESSION['user'])))	echo'<a href="'.HOME.LANG.'/forum?action=addtopic" style="float:right;font-size:1.3em;margin-top:-0.75em" id="Alnk" title="Создать тему в данном форуме"><i class="fa fa-plus-circle" aria-hidden="true"></i> Создать тему</a>';
								if (!isset($_SESSION['user'])) echo'<a href="#" data-toggle="modal" id="Alnk" title="Создать тему в данном форуме" data-target="#Autorize" style="float:right;margin-top: 1.5em;font-size:1.3em"><i class="fa fa-plus-circle" aria-hidden="true"></i> Создать тему</a>';
								echo Navigation(htmlspecialchars($_GET['page'],ENT_QUOTES),$PagesCount);
							}else echo '<Div style="width:100%;background:#F4F7F9;padding:1em;color: #7F7F7F;">Нет тем</div>';
						
						
?>