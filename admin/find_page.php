<?php
session_start();
include(dirname(__FILE__)."/../system/configuration.php");

if (!empty($_POST))
{
	if (isset($_POST['page'])) {$pg=$_POST['page']; $start = ($_POST['page'] - 1)*100;} else {$start = 0;$pg=1;}
	
	$query = "SELECT * FROM `".DB_PREFIX."pages` WHERE `Active`='1' AND `News`='".$_POST['news']."' AND `langAbb`='ru'  AND `pageName` LIKE '".htmlspecialchars($_POST['title'],ENT_QUOTES)."%'";
	
	//$CPages = mysqli_query($CONNECTION,"SELECT `pageId` FROM `".DB_PREFIX."pages` WHERE `Active`='1' AND `News`='$_POST[news]' AND `langAbb`='ru' AND `pageName` LIKE '".htmlspecialchars($_POST['title'],ENT_QUOTES)."%'");	
	//$PagesCount=intval((mysqli_num_rows($CPages) - 1) / 100) + 1;
	?>
    <table style="width:100%" style="margin-top:2em">
    	<tr>
        	<td width="10%"><strong>#</strong></td>
            <td><strong>Название страницы</strong></td>
            <td><strong>Адресс</strong></td>
            <td><strong>Действия</strong></td>
        </tr>
    <?php
	
	$getPages = mysqli_query($CONNECTION,$query);
	
	$k=1;
	if (mysqli_num_rows($getPages)>0)
	{
		
	$pages = mysqli_fetch_array($getPages);
	do
	{
		echo '<tr>';
		echo '<td>'.$k.'</td>';
		echo '<td>'.$pages['pageName'].'</td>';
		echo '<td><a href="'.$home_url.$pages['URL'].'" target="_bank">Просмотреть</a></td>';
		if($_POST['news']==1) echo '<td><a href="'.$admin_page.'edit_news/'.$pages['pageId'].'">Редактировать</a><br><a href="'.$admin_page.'dell_news/'.$pages['pageId'].'">Удалить</a></td>';
		else echo '<td><a href="'.$admin_page.'edit_page/'.$pages['pageId'].'">Редактировать</a><br><a href="javascript:DellPage('.$pages['pageId'].')">Удалить</a></td>';
		
		echo '</tr>';
		$k++;
	}
	while($pages = mysqli_fetch_array($getPages));
	
	?>
    </table>
    <?php
	}else echo 'Нет совпадений'. mysqli_error($CONNECTION);
} ?>