<?php
if (empty($_GET['page'])&&!empty($_SESSION['searchusers'])) unset($_SESSION['searchusers']);
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
            $n.='<a href="'.HOME.LANG.'/forum?user='.$_GET['user'].(($i != 1) ? '&page='.$i : '').'"'.(($page == $i) ? ' class="btn btn-primary" ' : ' class="btn btn-link"').' style="margin-right:0.5em;">'.$i.'</a>';
        }
        if($end < $pages) {
           if($end != ($pages - 1)) $n.='...';
            $n.='<a href="'.HOME.LANG.'/forum?user='.$_GET['user'].'&page='.$pages.'" class="btn btn-link" style="margin-left:0.5em;">'.$pages.'</a>';
        }
        $n.='</div>';
    }
return $n;
}

if (empty($_GET['page'])&&!empty($_SESSION['searchusers'])) unset($_SESSION['searchusers']);
$query = "SELECT * FROM `".DB_PREFIX."users` WHERE `activated`='1' AND `isEnabled`='1' AND `userID`='$_GET[user]' ORDER BY `topics`";
$getUsers = mysqli_query($CONNECTION,$query);
if (mysqli_num_rows($getUsers)>0)
{
	$users = mysqli_fetch_array($getUsers);
	$getTopics = mysqli_query($CONNECTION,"SELECT `forumID` FROM `".DB_PREFIX."forum_topic` WHERE `userID`='$_GET[user]' AND `isEnabled`='1' AND `ParentTopic`='0'");
	$getCom = mysqli_query($CONNECTION,"SELECT `forumID` FROM `".DB_PREFIX."forum_topic` WHERE `userID`='$_GET[user]' AND `isEnabled`='1' AND `ParentTopic`<>'0'");
	
	$getLastVisit = mysqli_query($CONNECTION,"SELECT `DateTime`,`timeseconds` FROM `".DB_PREFIX."activity` WHERE `userID`='$users[userID]' ORDER BY `ID` DESC LIMIT 1");
	$LastVisit = mysqli_fetch_array($getLastVisit);
	echo '<h1>Профиль пользователя</h1>';
	echo '<div class="col-md-12  col-xs-12 col-sm-12" style="margin-top:0.5em;padding-left:0px"><div class="forum_title"><h1>'.$users['userName'].' '.$users['userFullname'].'</h1></div>
		<table class="table forum" istyle="border-radius:0px">
		<tbody><tr>
			<td><p>'.$users['login'].'</p>';
			if (empty($users['Avatar'])) echo'<p><i class="fa fa-user-secret" aria-hidden="true" style="font-size:7em;"></i></p>';
			else echo'<p><img src="'.$users['Avatar'].'" style="max-width: 7em;
    width: 7em;
    height: 7em;"></p>';
			$diference = time()-$LastVisit['timeseconds'];
			if ($diference>(15*60)) {
				echo'<p>Последний визит: '.Date_($LastVisit['DateTime']).'</p>';
			}else echo'<p><font style="color:#18bc9c">В сети</font></p>';
			echo'<p style="color:#3498db">Тем: '.mysqli_num_rows($getTopics).'</p>
			<p style="color:#3498db">Комментариев: '.mysqli_num_rows($getCom).'</p>
			<p style="color:#3498db">Дата регистрации: '.Date_($users['dateReg']).'</p>';
			if(isset($_SESSION['user'])) echo'<p style="color:#3498db">Email: '.$users['Email'].'</p>';
			if (isset($_SESSION['user'])and $_SESSION['user']==$users['userID'] and $_SESSION['group']=='user')
			{
				?>
                <a href="#" onclick="EditAdmin(<?php echo $users['userID']; ?>,'user')" data-toggle="modal" data-target="#Edit"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true" id="editAdmin" style="display: inline-block;position: relative;
    right: 0px;
    top: 0px;"> Изменить профиль</i></a>
               <div class="modal fade" id="Edit" role="dialog" style="text-align:left"><div class="modal-dialog">
	<div class="modal-content">
			<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title">Редактирование</h4>
			</div>
			<div class="modal-body"></div>
			</div>
		  </div></div></div>
                <?php
			}
			echo'</td>
			<td>
			
			<div class="bs-example bs-example-tabs" data-example-id="togglable-tabs"> <ul class="nav nav-tabs" id="myTabs3" role="tablist"> <li role="presentation" class="active"><a href="#th" id="th-tab" role="tab" data-toggle="tab" aria-controls="th" aria-expanded="true" style="text-decoration:none">Темы</a></li> <li role="presentation"><a href="#coms" role="tab" id="coms-tab" data-toggle="tab" aria-controls="coms" style="text-decoration:none">Комментарии</a></li> </ul> <div class="tab-content" id="myTabContent3"> <div class="tab-pane fade in active" role="tabpanel" id="th" aria-labelledby="th-tab" style="padding-top:1em">';
			$getThemes = mysqli_query($CONNECTION,"SELECT `title`,`forumID`,`timestamp` FROM `".DB_PREFIX."forum_topic` WHERE `userID`='$users[userID]' AND `ParentTopic`='0' AND `isEnabled`='1'");
			if (mysqli_num_rows($getThemes)>0)
			{
				
				$themes = mysqli_fetch_array($getThemes);
				do
				{
					echo '<div><font style="display:inline-block;"><a href="'.HOME.LANG.'/forum?topic='.$themes['forumID'].'">'.$themes['title'].'</a></font><font style="display:inline-block;float:right">'.Date_($themes['timestamp']).'</font></div>';
				}
				while($themes = mysqli_fetch_array($getThemes));
			}
			else echo 'Нет тем';
			echo'</div> <div class="tab-pane fade" role="tabpanel" id="coms" aria-labelledby="coms-tab" style="padding-top:1em">';
			$getThemes = mysqli_query($CONNECTION,"SELECT `forumID`,`timestamp`,`ParentTopic` FROM `".DB_PREFIX."forum_topic` WHERE `userID`='$users[userID]' AND `ParentTopic`<>'0' AND `isEnabled`='1'");
			if (mysqli_num_rows($getThemes)>0)
			{
				
				$themes = mysqli_fetch_array($getThemes);
				do
				{
					$getParent = mysqli_query($CONNECTION,"SELECT `title` FROM `".DB_PREFIX."forum_topic` WHERE `forumID`='$themes[ParentTopic]'");
					$Parent = mysqli_fetch_array($getParent);
					echo '<div><font style="display:inline-block;"><a href="'.HOME.LANG.'/forum?topic='.$themes['ParentTopic'].'#message'.$themes['forumID'].'">'.$Parent['title'].'</a></font><font style="display:inline-block;float:right">'.Date_($themes['timestamp']).'</font></div>';
				}
				while($themes = mysqli_fetch_array($getThemes));
			}
			else echo 'Нет сообщений';
			echo'</div>  </div> </div>
			</td>
		</tr>
		<tr>
			<td></td>
			<td style="border-top:1px solid #F2F2F2;font-size:0.9em;color:#3498db"></td>
		</tr>
		</tbody>
		</table>
		</div>';
}
else echo 'Пользователь не найден';
						
?>
<script>
$('#myTabs3 a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
})
</script>