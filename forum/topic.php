<script>
function atd()
	{
		$(window).scroll(function () {
			if($(this).scrollTop()!==post)
			{
				$('#menu').css('display','block');
				$('#marginTop').css('display','block');
				$('.container').css('margin-top','2em');
			}
		});
	}
	$(document).ready(function(){
		
		//$("html, body").animate({ scrollTop: (post - 70) }, 800);
		post = $(this).scrollTop();
		$('#menu').css('display','none');
		
		setTimeout(atd,1500);
		
	});
</script>
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
            $n.='<a href="'.HOME.LANG.'/forum?topic='.$_GET['topic'].(($i != 1) ? '&page='.$i : '').'"'.(($page == $i) ? ' class="btn btn-primary" ' : ' class="btn btn-link"').' style="margin-right:0.5em;">'.$i.'</a>';
        }
        if($end < $pages) {
           if($end != ($pages - 1)) $n.='...';
            $n.='<a href="'.HOME.LANG.'/forum?topic='.$_GET['topic'].'&page='.$pages.'" class="btn btn-link" style="margin-left:0.5em;">'.$pages.'</a>';
        }
        $n.='</div>';
    }
return $n;
}
if (!empty($_SESSION['search'])) unset($_SESSION['search']);
$number = 20;
if (!empty($_GET['page'])) $start = (htmlspecialchars($_GET['page'],ENT_QUOTES)-1) * $number; 
if ($_SESSION['group']=='admin') $query = "SELECT * FROM `".DB_PREFIX."forum_topic` WHERE `forumID`='$_GET[topic]' OR `ParentTopic`='$_GET[topic]' AND `isEnabled`='1' ORDER BY `forumID`";
else if(!empty($_SESSION['user']))$query = "SELECT * FROM `".DB_PREFIX."forum_topic` WHERE `forumID`='$_GET[topic]' OR (`ParentTopic`='$_GET[topic]' AND `isEnabled`='1') OR (`ParentTopic`='$_GET[topic]' AND `userID`=$_SESSION[user]) ORDER BY `forumID`";
else $query = "SELECT * FROM `".DB_PREFIX."forum_topic` WHERE `forumID`='$_GET[topic]' OR (`ParentTopic`='$_GET[topic]' AND `isEnabled`='1') ORDER BY `forumID`";
$CPages = mysqli_query($CONNECTION,$query);
$PagesCount=intval((mysqli_num_rows($CPages) - 1) / $number) + 1;
if(!is_numeric($_GET['page'])) $_GET['page'] = 1;
if (!empty($start)) $query.=" LIMIT ".$start.",$number";
else $query.=' LIMIT '.$number;
if((isset($_SESSION['user'])&&empty($params))or(!empty($_GET['topic'])&&isset($_SESSION['user'])))	{echo'<a href="#" onclick="';?>$('html, body').animate({ scrollTop: ($('h2').offset().top - 60) }, 800);<?php echo'" style="float:right;font-size:1.3em"><i class="fa fa-commenting-o" aria-hidden="true"></i> Ответить</a>';}
if (!isset($_SESSION['user'])) echo'<a href="#" data-toggle="modal" data-target="#Autorize" style="float:right;margin-top: 0em;font-size:1.3em"><i class="fa fa-commenting-o" aria-hidden="true"></i> Ответить</a>';
						
			 if(isset($_SESSION['group'])&&$_SESSION['group']=='admin')	echo'<a href="'.HOME.LANG.'/forum?action=addcategory" style="float:right;margin-right:1em;font-size:1.3em"><i class="fa fa-sitemap" aria-hidden="true"></i> Создать категорию или форум</a>';
if (count($BROMS_)>0){
							echo '<div style="font-size:1.1em"><a href="'.HOME.$URL.'">Все форумы</a>';
							if (!empty($BROMS_[0])&&!isset($_GET['user'])&&!isset($_GET['action'])) echo ' › категория <a href="'.$BROMS_[0][1].'">'.$BROMS_[0][0].'</a>';
							if (!empty($BROMS_[1])&&!isset($_GET['user'])&&!isset($_GET['action'])) echo ' › форум <a href="'.$BROMS_[1][1].'">'.$BROMS_[1][0].'</a>';
							echo '</div>';
						}
						echo '<br>';
$getTopic = mysqli_query($CONNECTION,$query);
if (mysqli_num_rows($getTopic)>0)
{
	
	$Topic = mysqli_fetch_array($getTopic);
	if ($_GET['page']==1) 
	{
		$topicTitle=htmlspecialchars_decode($Topic['title']);
		$_SESSION['category'] = $Topic['forumCatID'];
		if(isset($_SESSION['user'])&&$_SESSION['group']!=='admin')
		{	
			$q1="SELECT `forumID` FROM `".DB_PREFIX."forum_notifier` WHERE `userID`='$_SESSION[user]' AND `forumID`='$_GET[topic]'";
			$q2="SELECT `forumID` FROM `".DB_PREFIX."forum_notifier` WHERE `userID`='$_SESSION[user]' AND `forumCatID`='$Topic[forumCatID]'";
			
			$topicNotification = mysqli_query($CONNECTION,$q1);
			$forumNotification = mysqli_query($CONNECTION,$q2);
		}
		
	}
	$closed  = $Topic['closed'];
	if ($Topic['ParentTopic']>0&&$_GET['page']==1) exit('Не найдено');
	if($_GET['page']>1)
	{
		$thisTopic = mysqli_query($CONNECTION,"SELECT `title`,`forumCatID` FROM `".DB_PREFIX."forum_topic` WHERE `forumID`='$Topic[ParentTopic]'");
		$Tpk = mysqli_fetch_array($thisTopic);
		$topicTitle = $Tpk['title'];
		$_SESSION['category'] = $Tpk['forumCatID'];
		if(isset($_SESSION['user'])&&$_SESSION['group']!=='admin')
		{	
			$topicNotification = mysqli_query($CONNECTION,"SELECT `forumID` FROM `".DB_PREFIX."notifier` WHERE `userID`='$_SESSION[user]' AND `forumID`='$_GET[topic]'");
			$forumNotification = mysqli_query($CONNECTION,"SELECT `forumID` FROM `".DB_PREFIX."notifier` WHERE `userID`='$_SESSION[user]' AND `forumCatID`='$Tpk[forumCatID]'");
		}
	}
	if ($_SESSION['group']!=='admin')
	{
		if ($Topic['isEnabled']==0 and $_SESSION['user']==$Topic['userID']) echo '<div class="forum_title"><h1>'.htmlspecialchars_decode($Topic['title']).' <font style="color:#3498db">Еще не проверена модератором</font></h1></div>';
		else if ($Topic['isEnabled']==1&&$_GET['page']==1) echo '<div class="forum_title"><h1>'.htmlspecialchars_decode($Topic['title']).'</h1></div>';
			  else if($Topic['isEnabled']==0) exit('Не найдено');
	}
	else{ 
	if ($_GET['page']==1)
	{
		echo'<div class="forum_title"><font style="float:right;margin-top:1em;margin-right:1em">';
		if($Topic['seen']==0) echo '<a title="Принять - тема прошла модерацию" alt="Принять - тема прошла модерацию" href="javascript:Accept('.$Topic['forumID'].');" style="margin-right:"><i class="fa fa-check" aria-hidden="true" style="color:#18bc9c"></i></a> ';
		if ($Topic['closed']==1&&isset($_SESSION['user'])&&$_SESSION['group']=='admin') echo '<a title="Открыть тему - пользователи смогут добавлять в ней сообщения" alt="Открыть тему - пользователи смогут добавлять в ней сообщения" href="javascript:OpenForum('.$Topic['forumID'].');" style="margin-right:"><i class="fa fa-unlock-alt" aria-hidden="true"></i></a> ';
		elseif(isset($_SESSION['user'])&&$_SESSION['group']=='admin') echo '<a title="Закрыть тему - пользователи не смогут добалвять новые сообщения" alt="Закрыть тему - пользователи не смогут добалвять новые сообщения" href="javascript:CloseForum('.$Topic['forumID'].');"><i class="fa fa-lock" aria-hidden="true"></i></a> ';
		echo'<a title="Удалить" alt="Удалить" href="javascript:DellForum('.$Topic['forumID'].');"><i class="fa fa-trash" aria-hidden="true" style="color:#e74c3c"></i></a></font><h1>'.htmlspecialchars_decode($Topic['title']).'</h1></div>';
	}
	 else 
	 {
		 $getTopic2 = mysqli_query($CONNECTION,"SELECT `title` FROM `".DB_PREFIX."forum_topic` WHERE `forumID`='$_GET[topic]' AND `isEnabled`='1'");
		 if (mysqli_num_rows($getTopic)>0)
		 {
			 $TopicTitle = mysqli_fetch_array($getTopic2);
			 $topicTitle=htmlspecialchars_decode($TopicTitle['title']);
		 }
		 else exit("Не найдено"); 
	 }
	}
	$k=1;
	do
	{
		
		if ($Topic['ParentTopic']==0)
		{
			$pg = $_SERVER["REQUEST_URI"];
			$getStatisticViews = mysqli_query($CONNECTION,"SELECT DISTINCT `ip` FROM `".DB_PREFIX."activity` WHERE `page`='$pg'");
			$update = mysqli_query($CONNECTION,"UPDATE `".DB_PREFIX."forum_topic` SET `views`='".mysqli_num_rows($getStatisticViews)."' WHERE `forumID`='$Topic[forumID]'");
		}
		$getLikes = mysqli_query($CONNECTION,"SELECT DISTINCT `ip` FROM `".DB_PREFIX."likes` WHERE `forumID`='$Topic[forumID]'");
		$getLikesMe = mysqli_query($CONNECTION,"SELECT DISTINCT `likeID` FROM `".DB_PREFIX."likes` WHERE `forumID`='$Topic[forumID]' AND `ip`='$_SERVER[REMOTE_ADDR]'");
		
		$getUserData = mysqli_query($CONNECTION,"SELECT `Avatar`,`dateReg` FROM `".DB_PREFIX."users` WHERE `userID`='$Topic[userID]' AND `isEnabled`='1'");
		if (mysqli_num_rows($getUserData)>0)
		{
			$userData = mysqli_fetch_array($getUserData);
			$ShortInfo = getUserInfo($Topic['userID']);
			if (empty($userData['Avatar'])) $ShortInfo.='<p><i class="fa fa-user-secret" aria-hidden="true" style="font-size:7em;"></i></p>';
			else $ShortInfo.='<p><img src="'.$userData['Avatar'].'" style="max-width: 7em;
    width: 7em;
    height: 7em;"></p>';
			$getLastVisit = mysqli_query($CONNECTION,"SELECT `DateTime`,`timeseconds` FROM `".DB_PREFIX."activity` WHERE `userID`='$Topic[userID]' ORDER BY `ID` DESC LIMIT 1");
			$LastVisit = mysqli_fetch_array($getLastVisit);
			$diference = time()-$LastVisit['timeseconds'];
			if ($diference>(15*60)) {
				$ShortInfo.='<i class="fa fa-street-view" aria-hidden="true"></i> <font class="inf">Последний визит:  </font>'.Date_($LastVisit['DateTime']);
			}else $ShortInfo.='<font style="color:#18bc9c">В сети</font>';
			$ShortInfo.='
			<p><i class="fa fa-calendar-o" aria-hidden="true"></i> <font class="inf">Дата регистрации: </font>'.Date_($userData['dateReg']).'</p>';
		}
		else $ShortInfo = 'Пользователь удален';
		echo '
		<table class="table forum" id="message'.$Topic['forumID'].'" ';
		if ($k==1&&$_GET['page']==1) echo ' style="border-radius:0px"';
		echo'>
		<tr>
			<td style="font-size:0.85em">'.$ShortInfo.'</td>
			<td'; 
			if (($k>1&&$_GET['page']==1) or $_GET['page']>1) echo ' style="background: #F4F7F9;padding:0px;"';
			echo'>';
			if (($k>1&&$_GET['page']==1) or $_GET['page']>1) echo '<theme>Тема: '.$topicTitle.' <font>'.Date_($Topic['timestamp']).'</font></theme>';
			echo '<div style="padding:1em">'.htmlspecialchars_decode($Topic['text']).'</div></td>
		</tr>
		<tr>
			<td>'.Date_($Topic['timestamp']).' '.substr($Topic['timestamp'],11,5).'';
			if ($k>1&&$_SESSION['group']!=='admin'&&$Topic['userID']==$_SESSION['user']&&$Topic['isEnabled']==0) echo '<font style="color:#e74c3c">Еще не проверено модератором</font>'; 
			if($Topic['seen']==0&&$_SESSION['group']=='admin') echo '<br><a title="Принять - тема прошла модерацию" alt="Принять - тема прошла модерацию" href="javascript:Accept('.$Topic['forumID'].');" style="margin-right:"><i class="fa fa-check" aria-hidden="true" style="color:#18bc9c"> Принять</i></a> ';
			if ($k==1) if (isset($_SESSION['user'])&&$_SESSION['group']=='admin'&&$Topic['closed']==1) echo '<a title="Открыть тему - пользователи смогут добавлять в ней сообщения" alt="Открыть тему - пользователи смогут добавлять в ней сообщения" href="javascript:OpenForum('.$Topic['forumID'].');" style="margin-right:"><i class="fa fa-unlock-alt" aria-hidden="true"> Открыть тему</i></a> ';
	elseif(isset($_SESSION['user'])&&$_SESSION['group']=='admin') echo '<a title="Закрыть тему - пользователи не смогут добалвять новые сообщения" alt="Закрыть тему - пользователи не смогут добалвять новые сообщения" href="javascript:CloseForum('.$Topic['forumID'].');"><i class="fa fa-lock" aria-hidden="true"> Закрыть тему</i></a> ';
			if(isset($_SESSION['user'])&&$_SESSION['group']=='admin')echo'<a title="Удалить" alt="Удалить" href="javascript:DellForum('.$Topic['forumID'].');"><i class="fa fa-trash" aria-hidden="true" style="color:#e74c3c"> Удалить</i></a>';
			echo'</td>
			<td style="border-top:1px solid #F2F2F2;font-size:0.9em;color:#3498db;'; 
			if (($k>1&&$_GET['page']==1) or $_GET['page']>1) echo 'background: #F4F7F9;"';
			echo'">';
			if ($k==1&&$_GET['page']==1){ echo'<i class="fa fa-commenting-o" aria-hidden="true" style="margin-right:2em"> Ответы '.(mysqli_num_rows($getTopic)-1).'</i> <i class="fa fa-eye" aria-hidden="true" style="margin-right:2em"> Просмотрты '.mysqli_num_rows($getStatisticViews).' </i>';
			
			if (mysqli_num_rows($getLikesMe)>0) echo '<i class="fa fa-thumbs-up" aria-hidden="true"></i> Мне нравится '.mysqli_num_rows($getLikes);
			else echo '<a href="javascript:Like('.$Topic['forumID'].')" style="text-decoration:none" id="Like'.$Topic['forumID'].'"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> Мне нравится '.mysqli_num_rows($getLikes).'</a>';
			
			?>
            


<script type="text/javascript">(function(w,doc) {
if (!w.__utlWdgt ) {
    w.__utlWdgt = true;
    var d = doc, s = d.createElement('script'), g = 'getElementsByTagName';
    s.type = 'text/javascript'; s.charset='UTF-8'; s.async = true;
    s.src = ('https:' == w.location.protocol ? 'https' : 'http')  + '://w.uptolike.com/widgets/v1/uptolike.js';
    var h=d[g]('body')[0];
    h.appendChild(s);
}})(window,document);
</script><font style="margin-left:2em">Поделиться</font>
<div data-background-alpha="0.0" data-buttons-color="#ffffff" data-counter-background-color="#ffffff" data-share-counter-size="5" data-top-button="false" data-share-counter-type="disable" data-share-style="6" data-mode="share" data-like-text-enable="false" data-mobile-view="true" data-icon-color="#ffffff" data-orientation="horizontal" data-text-color="#000000" data-share-shape="round-rectangle" data-sn-ids="fb.vk.tw.ok.gp.mr.em." data-share-size="20" data-background-color="#ffffff" data-preview-mobile="false" data-mobile-sn-ids="fb.vk.tw.wh.ok.vb.em.ln." data-pid="1558256" data-counter-background-alpha="1.0" data-following-enable="false" data-exclude-show-more="false" data-selection-enable="false" class="uptolike-buttons" style="display:inline-block"></div>

            <?
			}
			if (($k>1&&$_GET['page']==1) or $_GET['page']>1)
			if (mysqli_num_rows($getLikesMe)>0) echo '<i class="fa fa-thumbs-up" aria-hidden="true" style="color:"></i> Мне нравится '.mysqli_num_rows($getLikes).'';
			else echo '<a href="javascript:Like('.$Topic['forumID'].')" style="text-decoration:none" id="Like'.$Topic['forumID'].'"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> Мне нравится '.mysqli_num_rows($getLikes).'</a>';
			echo'
			<font style="float:right">';
			if (isset($_SESSION['user']) and $_SESSION['user']==$Topic['userID'] and $_SESSION['group']=='user' and  mysqli_num_rows($getTopic)==$k) echo '<a href="#" data-toggle="modal" data-target="#EditComment" onclick="EditComment('.$Topic['forumID'].');" style="margin-right:1em">Изменить</a> ';
			if (isset($_SESSION['user']) and $_SESSION['group']=='admin' and $k>1) echo '<a href="#" data-toggle="modal" data-target="#EditComment" onclick="EditComment('.$Topic['forumID'].');" style="margin-right:1em">Изменить</a> ';
			if(isset($_SESSION['user'])) echo'<a href="#message'.$Topic['forumID'].'" style="margin-right:1em" onclick="Quote('.$Topic['forumID'].');">Цитировать</a> ';
			echo' <a href="'.HOME.LANG.'/forum?topic='.$_GET['topic'].'&page='.$_GET['page'].'#message'.$k.'">'.$k.'</></font>
			</td>
		</tr>
		</table>
		';
		$k++;
	}
	while($Topic = mysqli_fetch_array($getTopic));
	echo Navigation(htmlspecialchars($_GET['page'],ENT_QUOTES),$PagesCount);
		if (!isset($_SESSION['user'])) echo'
		<div style="text-align:center">Чтобы добавить ответ <a href="#" data-toggle="modal" data-target="#Autorize">авторизируйтесь</a> или <a href="#" data-toggle="modal" data-target="#Register">зарегистрируйтесь</a></div>
		
		<a href="#" data-toggle="modal" data-target="#Autorize" style="float:right;margin-top: -0.75em;font-size:1.3em"><i class="fa fa-commenting-o" aria-hidden="true"></i> Ответить</a>';
	if (isset($_SESSION['user']))
	{
		?>
         <script>
		 <?php
if (!empty($_SESSION['comment'])&&is_numeric($_SESSION['comment']))
{
	?>
    $(document).ready(function(){

	$(function () {

		$("html, body").animate({ scrollTop: ($('#message<?php echo $_SESSION['comment'] ?>').offset().top - 150) }, 800);

	});

});
    <?php
	unset($_SESSION['comment']);
}?>
	function is_numeric( mixed_var ) {	
		return !isNaN( mixed_var );
	}
	function Accept(ID) {
		$.post(home_url+'forum/accept.php', {id:ID},function(data){
			if (data=='ok') location.reload(true);
			else alert(data);
		});
	}
	function CloseForum(ID) {
		if (confirm("Вы точно хотите закрыть данную тему?") == true) {$.post(home_url+'forum/close.php', {id:ID},function(data){
			if (data=='ok') location.reload(true);
			else alert(data);
		});
		}
	}
	function OpenForum(ID) {
		$.post(home_url+'forum/open.php', {id:ID},function(data){
			if (data=='ok') location.reload(true);
			else alert(data);
		});
	}
	function DellForum(ID) {
		if (confirm("Вы точно хотите удалить данную запись?") == true) {$.post(home_url+'forum/dell.php', {id:ID},function(data){
			if (data=='ok') location.replace(home_url+'<?php echo LANG.'/forum' ?>');
			else alert(data);
		});
		}
	}
	</script>
        <?php
		if((isset($_SESSION['user'])&&empty($params))or(!empty($_GET['topic'])&&isset($_SESSION['user'])))	{echo'<a href="#" onclick="';?>$('html, body').animate({ scrollTop: ($('h2').offset().top - 60) }, 800);<?php echo'" style="float:right;font-size:1.3em""><i class="fa fa-commenting-o" aria-hidden="true"></i> Ответить</a>';}
	
		if ($closed==0)
		{
			
	?>
    
    <h2 style="margin-top:2em;font-size:1.2em;margin-bottom:1em;">Добавить комментарий к теме: «<?php echo $topicTitle; ?>»</h2>
    <p id="err_message" class='alert alert-dismissible alert-danger' style="text-align:center;display:none">Длина текста должна быть не менее 15 символов</p>
    <textarea id="editor" placeholder="Here your text"></textarea>
    <?php if (isset($_SESSION['user'])&&$_SESSION['group']!=='admin'&&mysqli_num_rows($topicNotification)==0){ ?><div><input type="checkbox" id="send_topic" /> Получать новые комментарии по теме <b>«<?php echo $topicTitle; ?>»</b> на почту</div><? }else echo '<div><input type="checkbox" id="send_topic" style="display:none" /> Вы уже получаете новые комментарии по теме <b>«'.$topicTitle.'»</b> на почту</div>'; ?>
    <?php if (isset($_SESSION['user'])&&$_SESSION['group']!=='admin'&&mysqli_num_rows($forumNotification)==0){ ?><div><input type="checkbox" id="send_forum" /> Получать новые темы форума <b>«<?php echo $BROMS_[1][0]; ?>»</b> на почту</div><? }else echo '<div><input type="checkbox" id="send_forum" style="display:none" /> Вы уже получаете новые темы форума <b>«'.$BROMS_[1][0].'»</b> на почту</div>';?>
    <div style="text-align:center;margin-top:1.8em"><button class="btn btn-info" onclick="AddComment()">Добавить комментарий</button></div>
    
   <script>
   function AddComment() {	
		text = CKEDITOR.instances.editor.getData();
		snd_topic = $('#send_topic').prop('checked');
		snd_forum = $('#send_forum').prop('checked');
	
		if (text.length<15) 
		{
			
			$('#err_message').html('Длина текста должна быть не менее 15 символов');
			$('#err_message').css('display','block');
			
		}
		else
		{
			
			$.post(home_url+'forum/add.php', {id:<?php echo $_GET['topic'] ?>,text:text,topic:snd_topic,forum:snd_forum},function(data){
				
				if(data[0]=='&') location.replace(home_url+'<?php echo LANG.'/forum?topic='.$_GET['topic'] ?>'+data);
				else {
					$('#err_message').css('display','block');
					$('#err_message').html(data);
				}
			});
		}
		
	}
   function EditComment(id) {	
   $('#cke_EditComm').css('border-color','#3498db');
		$('#cke_EditComm .cke_toolbox span:eq(0)').hide();
		$('#cke_EditComm .cke_toolbox .cke_toolbar:eq(1) span:eq(2) a:eq(5)').hide();
		$('#cke_EditComm .cke_toolbox .cke_toolbar:eq(1) span:eq(2) a:eq(6)').hide();
		$('#cke_EditComm .cke_toolbox .cke_toolbar:eq(1) span:eq(2) span:eq(10)').hide();
		$('#cke_EditComm .cke_toolbox .cke_toolbar:eq(2)').hide();
		$('#cke_EditComm .cke_toolbox .cke_toolbar:eq(3)').hide();
		$('#cke_EditComm .cke_toolbar_break').hide();
		$('#cke_EditComm.cke_toolbox .cke_toolbar:eq(5) span:eq(2) a:eq(5)').hide();
		$('#cke_EditComm .cke_toolbox .cke_toolbar:eq(5) span:eq(2) a:eq(4)').hide();
		$('#cke_EditComm .cke_toolbox .cke_toolbar:eq(5) span:eq(2) a:eq(12)').hide();
		$('#cke_EditComm .cke_toolbox .cke_toolbar:eq(5) span:eq(2) span:eq(14)').hide();
		$('#cke_EditComm .cke_toolbox .cke_toolbar:eq(6)').hide();
		$('#cke_EditComm .cke_toolbox .cke_toolbar:eq(7)').hide();
		$('#cke_EditComm .cke_toolbox .cke_toolbar:eq(8)').hide();
		$('#cke_EditComm .cke_toolbox .cke_toolbar:eq(9)').hide();
		$('#cke_EditComm .cke_toolbox .cke_toolbar:eq(10)').hide();
		$('#cke_EditComm .cke_toolbox .cke_toolbar:eq(11)').hide();
		$('#cke_EditComm .cke_bottom').hide();
		CKEDITOR.instances.EditComm.setData($('#message'+id+' td:eq(1) div').html());
		$('#cid').val(id);		
	}
	
	function Quote(id) {
		
		if (window.getSelection()=='') {
			alert('Выделите текст для цитирования');
			return 0;
		}
		var s = CKEDITOR.instances.editor.getSelection();
		var selected_ranges = s.getRanges();
		$('html, body').animate({ scrollTop: ($('h2').offset().top - 60) }, 800);
		CKEDITOR.instances.editor.focus();
		CKEDITOR.instances.editor.setData(CKEDITOR.instances.editor.getData()+'<blockquote><em>'+($('#message'+id+' td:eq(0) a').html())+' пишет:</em><p>'+window.getSelection()+'</p></blockquote><br>');
		s.selectRanges(selected_ranges); 
		if (window.getSelection) {
   if (window.getSelection().empty) {  // Chrome
     window.getSelection().empty();
   } else if (window.getSelection().removeAllRanges) {  // Firefox
     window.getSelection().removeAllRanges();
   }
} else if (document.selection) {  // IE?
  document.selection.empty();
}		
	}
	initSample();
	function fnc1()
	{
		$('#cke_editor').css('border-color','#3498db');
		$('.cke_toolbox span:eq(0)').hide();
		$('.cke_toolbox .cke_toolbar:eq(1) span:eq(2) a:eq(5)').hide();
		$('.cke_toolbox .cke_toolbar:eq(1) span:eq(2) a:eq(6)').hide();
		$('.cke_toolbox .cke_toolbar:eq(1) span:eq(2) span:eq(10)').hide();
		$('.cke_toolbox .cke_toolbar:eq(2)').hide();
		$('.cke_toolbox .cke_toolbar:eq(3)').hide();
		$('.cke_toolbar_break').hide();
		$('.cke_toolbox .cke_toolbar:eq(5) span:eq(2) a:eq(5)').hide();
		$('.cke_toolbox .cke_toolbar:eq(5) span:eq(2) a:eq(4)').hide();
		$('.cke_toolbox .cke_toolbar:eq(5) span:eq(2) a:eq(12)').hide();
		$('.cke_toolbox .cke_toolbar:eq(5) span:eq(2) span:eq(14)').hide();
		$('.cke_toolbox .cke_toolbar:eq(6)').hide();
		$('.cke_toolbox .cke_toolbar:eq(7)').hide();
		$('.cke_toolbox .cke_toolbar:eq(8)').hide();
		$('.cke_toolbox .cke_toolbar:eq(9)').hide();
		$('.cke_toolbox .cke_toolbar:eq(10)').hide();
		$('.cke_toolbox .cke_toolbar:eq(11)').hide();
		$('.cke_bottom').hide();
		
	}
	
	$(document).ready(function(){
		
		setTimeout(fnc1,1000);
	});
	
	
	</script>            
    <?php
	echo '<div class="modal fade" id="EditComment" role="dialog"><div class="modal-dialog" style="width: 80%;">
	<div class="modal-content">
			<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title">Редактирование комменатрия</h4>
			</div>
			<div class="modal-body">
			<p id="err_message2" class="alert alert-dismissible alert-danger" style="text-align:center;display:none">Длина текста должна быть не менее 15 символов</p>
			<textarea id="EditComm" placeholder="Here your text"></textarea>
			<input type="hidden" id="cid" value="">
			<div style="text-align:center;margin-top:1.8em"><button class="btn btn-info" onclick="EComment()">Изменить комментарий</button></div>
			</div>
			</div>
		  </div></div></div>';
		  ?>
          <script>
		   function EComment() {	
		text = CKEDITOR.instances.EditComm.getData();
		id = $('#cid').val();
		if (text.length<15) 
		{
			
			$('#err_message2').html('Длина текста должна быть не менее 15 символов');
			$('#err_message2').css('display','block');
			
		}
		else
		{
			
			$.post(home_url+'forum/edit.php', {id:id,text:text},function(data){
				
				if(data=='') location.reload();
				else {
					$('#err_message2').css('display','block');
					$('#err_message2').html(data);
				}
			});
		}
		
	}
	
		  var initSample3 = ( function() {
	var wysiwygareaAvailable = isWysiwygareaAvailable(),
		isBBCodeBuiltIn = !!CKEDITOR.plugins.get( 'bbcode' );

	return function() {
		var editorElement = CKEDITOR.document.getById( 'EditComm' );

		// :(((
		if ( isBBCodeBuiltIn ) {
			editorElement.setHtml(
				'Hello world!\n\n' +
				'I\'m an instance of [url=http://ckeditor.com]CKEditor[/url].'
			);
		}

		// Depending on the wysiwygare plugin availability initialize classic or inline editor.
		if ( wysiwygareaAvailable ) {
			CKEDITOR.replace( 'EditComm' );
		} else {
			editorElement.setAttribute( 'contenteditable', 'true' );
			CKEDITOR.inline( 'EditComm' );

			// TODO we can consider displaying some info box that
			// without wysiwygarea the classic editor may not work.
		}
	};

	function isWysiwygareaAvailable() {
		// If in development mode, then the wysiwygarea must be available.
		// Split REV into two strings so builder does not replace it :D.
		if ( CKEDITOR.revision == ( '%RE' + 'V%' ) ) {
			return true;
		}

		return !!CKEDITOR.plugins.get( 'wysiwygarea' );
	}
} )();
	   initSample3();
		
		  </script>
          <?php
		}
	}
}
else exit('Не надйна тема');

						
?>