<?php
if (!isset($_GET['category']))
{
echo' <div class="col-md-12 col-xs-12 col-sm-12"  style="margin-top:1em;padding-left:0px;margin-bottom:1em">
				 <div class="forum_title" style="background:#217dbb;width:calc(100% + 15px)">
				 <form action="#" method="post" onsubmit="forumSearch();return false">
				   <button type="submit" class="btn btn-info" style="float:right;margin-top:0.25em;display:inline-block;background-color:#2c3e50">Поиск</button>
				  <input type="text" id="search" class="form-control" placeholder="Введите слово для поска темы" style="max-width:340px;float:right;margin-top:0.25em;display:inline-block">
				</form>
				 <h3>Поиск тем на форуме</h3>
				 
				 
				 </div>
				 <select id="View_" onchange="Stat()" style="float:right;width:auto;display:inline-block;padding: 0.5em; height: auto;margin-top:0.25em;">';
				 for($k=10;$k<=50;$k+=5)
				 {
					 echo '<option value="'.$k.'">'.$k.'</option>';
				 }
				 $limit = 10;
				 echo'</select>
				<div class="bs-example bs-example-tabs" data-example-id="togglable-tabs" style="
    padding: 0.25em;width:calc(100% + 15px)"> 
				<ul class="nav nav-tabs" id="myTabs2" role="tablist"> 
				<li role="presentation"  class="active"><a href="#created" role="tab" id="created-tab" data-toggle="tab" aria-controls="created">Новые темы</a></li> 
				<li role="presentation"><a href="#comment" id="comment-tab" role="tab" data-toggle="tab" aria-controls="comment" aria-expanded="true">Новые комментарии</a></li> 
				
				<li role="presentation"><a href="#top" role="tab" id="top-tab" data-toggle="tab" aria-controls="top">Лучшие темы</a></li> 
				<li role="presentation"><a href="#users" role="tab" id="users-tab" data-toggle="tab" aria-controls="users">Новые пользователи</a></li> 
				
				</ul> 
				<div class="tab-content" id="myTabContent2"> 
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
				</div></div>
				 </div> </div>
			  
				 </div>';
}
if (!empty($_SESSION['search'])) unset($_SESSION['search']);

$getCategories = mysqli_query($CONNECTION,"SELECT `title`,`Parent`,`forumCatID` FROM `".DB_PREFIX."forum_category` WHERE ".$params." AND `isEnabled`='1'");
					if (mysqli_num_rows($getCategories)>0)
					{
						
			 			if(!isset($_GET['category']))
						{
						echo'<select class="form-conrtol" id="catsearch" style="    float: right;
  
    max-width: 340px;
    display: inline-block;
    padding: 0.5em;
    height: auto;" onchange="Category();">
						<option value="0">Поиск категорий и форумов</option>
						';
					$getCategories2 = mysqli_query($CONNECTION,"SELECT `title`,`Parent`,`forumCatID` FROM `".DB_PREFIX."forum_category` WHERE `Parent`='0' AND `isEnabled`='1'");
					if (mysqli_num_rows($getCategories2)>0)
					{
						$CategoriesForum2 = mysqli_fetch_array($getCategories2);
						do
						{
							echo '<option value="'.$CategoriesForum2['forumCatID'].'" class="optionGroup">'.$CategoriesForum2['title'].'</option>';
							$getChilds2 = mysqli_query($CONNECTION,"SELECT `title`,`Parent`,`forumCatID` FROM `".DB_PREFIX."forum_category` WHERE `Parent`='$CategoriesForum2[forumCatID]' AND `isEnabled`='1'");
							if(mysqli_num_rows($getChilds2)>0)
							{
								$Childs2 = mysqli_fetch_array($getChilds2);
								
								do
								{
									$q3="SELECT `forumID` FROM `".DB_PREFIX."forum_topic` WHERE `ParentTopic`='0' AND `forumCatID`='$Childs2[forumCatID]' AND `isEnabled`='1'";
								
									$getCount = mysqli_query($CONNECTION,$q3);
									echo '<option value="'.$Childs2['forumCatID'].'" class="optionChild">'.$Childs2['title'].' ('.mysqli_num_rows($getCount).')</option>';
								}while($Childs2 = mysqli_fetch_array($getChilds2));
							}
						}
						while($CategoriesForum2 = mysqli_fetch_array($getCategories2));
					}
					echo'</select>';
						}
					
						if((isset($_SESSION['user'])&&empty($params))or(!empty($_GET['topic'])&&isset($_SESSION['user'])))	echo'<a href="'.HOME.LANG.'/forum?action=addtopic" style="float:right"><i class="fa fa-plus-circle" aria-hidden="true"></i> Создать тему</a>';
						
			 if(isset($_SESSION['group'])&&$_SESSION['group']=='admin')	echo'<a href="'.HOME.LANG.'/forum?action=addcategory" style="float:right;margin-top: 1em;margin-right:0.5em"><i class="fa fa-sitemap" aria-hidden="true"></i> Создать категорию или форум</a>';
						if (!isset($_GET['category'])) echo '<h1 style="margin-bottom:-0.5em">Список форумов</h1>';
						else echo '<h1 style="margin-bottom:0.5em">Категории форума «'.$BROMS_[0][0].'»</h1>';
						if (count($BROMS_)>0){
							echo '<div style="font-size:1.1em"><a href="'.HOME.$URL.'">Все форумы</a>';
							if (!empty($BROMS_[0])&&!isset($_GET['user'])&&!isset($_GET['action'])) echo ' › категория <a href="'.$BROMS_[0][1].'">'.$BROMS_[0][0].'</a>';
							if (!empty($BROMS_[1])&&!isset($_GET['user'])&&!isset($_GET['action'])) echo ' › форум <a href="'.$BROMS_[1][1].'">'.$BROMS_[1][0].'</a>';
							echo '</div>';
						}echo '<br>';
						$i=0;
						echo '<div id="frm">';
						$CategoriesForum = mysqli_fetch_array($getCategories);
						do
						{
							$i++;
							$getChilds = mysqli_query($CONNECTION,"SELECT `title`,`Parent`,`forumCatID`,`Description` FROM `".DB_PREFIX."forum_category` WHERE `Parent`='$CategoriesForum[forumCatID]' AND `isEnabled`='1'");
							echo '<div class="forum_title"><a href="'.HOME.LANG.'/forum?category='.$CategoriesForum['forumCatID'].'"><h3>'.$CategoriesForum['title'].'</h3></a></div>';
							if(mysqli_num_rows($getChilds)>0)
							{
								echo '
								<div class="table-responsive">
								<table class="table">
								<tr>
								<th colspan="2">Название форума</th>
								<th>Статистика</th>
								<th>Последний комментарий</th>
								</tr>
								';
								$Childs = mysqli_fetch_array($getChilds);
								do
								{
									$getStatisticTopics = mysqli_query($CONNECTION,"SELECT `forumID` FROM `".DB_PREFIX."forum_topic` WHERE `ParentTopic`='0' AND `forumCatID`='$Childs[forumCatID]' AND `isEnabled`='1'");
									$getStatisticMessages = mysqli_query($CONNECTION,"SELECT `forumID` FROM `".DB_PREFIX."forum_topic` WHERE `forumCatID`='$Childs[forumCatID]' AND `isEnabled`='1' AND `ParentTopic`<>'0'");
									$getLastMessage = mysqli_query($CONNECTION,"SELECT * FROM `".DB_PREFIX."forum_topic` WHERE `forumCatID`='$Childs[forumCatID]' AND `isEnabled`='1' ORDER BY `forumID` DESC LIMIT 1");
									if (mysqli_num_rows($getLastMessage)>0) $LastMessage = mysqli_fetch_array($getLastMessage); else $Last = 'Нет комметариев';
									$SQLthemeCreated = mysqli_query($CONNECTION,"SELECT `forumID` FROM `".DB_PREFIX."forum_topic` WHERE `forumCatID`='$Childs[forumCatID]' AND `isEnabled`='1' AND `ParentTopic`='0' AND `timestamp` LIKE '".date('Y-m-d')."%'");
									
									if (mysqli_num_rows($SQLthemeCreated)>0) $new = 'color:#f39c12'; else $new = '';
									if (mysqli_num_rows($getLastMessage)>0)
									{
										if ($LastMessage['ParentTopic']==0){
											 $Last = 'Тема: <a href="'.HOME.LANG.'/forum?topic='.$LastMessage['forumID'].'#message'.$LastMessage['forumID'].'">'.htmlspecialchars_decode($LastMessage['title']).'</a>'.Last($LastMessage);
										}
										else 
										{
											$getTitle = mysqli_query($CONNECTION,"SELECT `title` FROM `".DB_PREFIX."forum_topic` WHERE `forumID`='$LastMessage[ParentTopic]' AND `isEnabled`='1'");
											if (mysqli_num_rows($getTitle)>0) $TitleTopic = mysqli_fetch_array($getTitle); else echo mysqli_error($CONNECTION);
											if (isset($TitleTopic)) {
												
												$Last = 'Тема: <a href="'.HOME.LANG.'/forum?topic='.$LastMessage['ParentTopic'].'#message'.$LastMessage['forumID'].'">'.$TitleTopic['title'].'</a>'.Last($LastMessage);
						
											}else $Last = 'Нет сообщений';
										}
									}else $Last = 'Нет комметариев';
									if (empty($Childs['Description'])) $Title = '<a href="'.HOME.LANG.'/forum?category='.$Childs['forumCatID'].'">'.htmlspecialchars_decode($Childs['title']).'</a>';
									else $Title = '<a href="'.HOME.LANG.'/forum?category='.$Childs['forumCatID'].'">'.htmlspecialchars_decode($Childs['title']).'</a><br>'.$Childs['Description'];
									echo '
									<td style="width:3em;text-align:center;vertical-align: middle;" valign="middle">
									<i class="fa fa-envelope-o" aria-hidden="true" style="font-size: 1.5em;'.$new.'"></i>
									</td>
									<td style="vertical-align: middle;width:50%">'.$Title.'</td>
									<td style="vertical-align: middle;width:15%">'.mysqli_num_rows($getStatisticTopics).' тем<br>'.mysqli_num_rows($getStatisticMessages).' комметариев</td>
									<td style="vertical-align: middle;">'.$Last.'</td>
									</tr>';
								}
								while($Childs = mysqli_fetch_array($getChilds));
								echo '</table></div>';
							}
						}
						while($CategoriesForum = mysqli_fetch_array($getCategories));
					}
					echo '</div>';
					if(isset($_SESSION['group'])&&$_SESSION['group']=='admin')	echo'<a href="'.HOME.LANG.'/forum?action=addcategory" style="float:right;margin-top: -1em;margin-right:0.5em"><i class="fa fa-sitemap" aria-hidden="true"></i> Создать категорию или форум</a>';
?>
<script>
function Stat()
{
	$.post(home_url+'forum/stat.php', {limit:parseInt($('#View_').val())},function(data){
				$('#myTabContent2').html(data);
			});
	View_;
}
</script>