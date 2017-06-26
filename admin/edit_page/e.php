<?php session_start();include(dirname(__FILE__)."/../../system/configuration.php");?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"><html><head><meta http-equiv="Content-Type" content="text/html; charset=charset=utf-8"><title>Админ панель</title><link href="<? echo $admin_page;?>style.css" rel="stylesheet" type="text/css"><link rel="stylesheet" type="text/css" href="http://s62.ucoz.net/src/ckeditor/custom/ueditor.css">			<script>home_url = '<? echo $home_url; ?>';admin_page = '<? echo $admin_page; ?>';</script><script src="//code.jquery.com/jquery-1.11.0.min.js"></script><script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script><script type="text/javascript" src="<? echo $admin_page;?>java_admin.js"></script><link rel="stylesheet" href="<? echo $admin_page;?>style.css"><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css"><link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">  <script src="//code.jquery.com/jquery-1.10.2.js"></script>  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script><script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script><title><? echo $site_name; ?></title><script>$('.dropdown-toggle').dropdown();</script></head><body> <div  id="menu">    <ul class="nav nav-pills" role="tablist">      <li role="presentation"><a href="<? echo $admin_page; ?>">АДМИН-ПАНЕЛЬ</a></li>      <li role="presentation" class="dropdown">        <a id="drop4" href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false">          НОВОСТИ          <span class="caret"></span>        </a>        <ul id="menu1" class="dropdown-menu" role="menu" aria-labelledby="drop4">                   <li role="presentation"><a role="menuitem" tabindex="-1" href="<? echo $admin_page; ?>edit_news">Изменить</a></li>          <li role="presentation"><a role="menuitem" tabindex="-1" href="<? echo $admin_page; ?>add_news">Добавить</a></li>        </ul>      </li><li role="presentation" class="dropdown">        <a id="drop4" href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false">          СТРАНИЦЫ          <span class="caret"></span>        </a>        <ul id="menu1" class="dropdown-menu" role="menu" aria-labelledby="drop4">                   <li role="presentation"><a role="menuitem" tabindex="-1" href="<? echo $admin_page; ?>edit_page">Изменить</a></li>          <li role="presentation"><a role="menuitem" tabindex="-1" href="<? echo $admin_page; ?>add_page">Добавить</a></li>        </ul>      </li>      <li role="presentation" class="dropdown">        <a id="drop5" href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false">          МЕНЮ          <span class="caret"></span>        </a>        <ul id="menu2" class="dropdown-menu" role="menu" aria-labelledby="drop5">          <li role="presentation"><a role="menuitem" tabindex="-1" href="<? echo $admin_page; ?>edit_menu">Изменить</a></li>          <li role="presentation"><a role="menuitem" tabindex="-1" href="<? echo $admin_page; ?>add_menu">Добавить</a></li>         </ul>      </li>      	  <li role="presentation" class="dropdown">        <a id="drop5" href="<?php echo $admin_page; ?>security"> БЕЗОПАСНОСТЬ  </a>             </li>    </ul> <!-- /pills -->  </div><div id="content"><?php
if (!empty($_POST))
{	
	$parent = htmlspecialchars($_POST['parent'],ENT_QUOTES);
	$ID = htmlspecialchars($_POST['ID'],ENT_QUOTES);
	$title = htmlspecialchars($_POST['title'],ENT_QUOTES);
	$message = htmlspecialchars($_POST['message'],ENT_QUOTES);
	$metakey = htmlspecialchars($_POST['metakey'],ENT_QUOTES);
	$metadesc = htmlspecialchars($_POST['metadesc'],ENT_QUOTES);	$metatitle = htmlspecialchars($_POST['metatitle'],ENT_QUOTES);
	
	$title2 = htmlspecialchars($_POST['title2'],ENT_QUOTES);
	$message2 = htmlspecialchars($_POST['message2'],ENT_QUOTES);
	$metakey2 = htmlspecialchars($_POST['metakey2'],ENT_QUOTES);
	$metadesc2 = htmlspecialchars($_POST['metadesc2'],ENT_QUOTES);	$metatitle2 = htmlspecialchars($_POST['metatitle2'],ENT_QUOTES);
	
	$title3 = htmlspecialchars($_POST['title3'],ENT_QUOTES);
	$message3 = htmlspecialchars($_POST['message3'],ENT_QUOTES);
	$metakey3 = htmlspecialchars($_POST['metakey3'],ENT_QUOTES);
	$metadesc3 = htmlspecialchars($_POST['metadesc3'],ENT_QUOTES);	$metatitle3 = htmlspecialchars($_POST['metatitle3'],ENT_QUOTES);
		
	if (!empty($title)&&!empty($message))
	{		if(empty($metatitle)) $metatitle = $title;
		if(empty($metakey)) $metakey = join(',',explode(' ',$title));
		if(empty($metadesc)) $metadesc = $title.' Сайт транспортно-экспедиторских услуг,поиск транспорта для перевозок,поиск грузов для международных перевозок, международные грузоперевозки из и в молдову ,биржа транспорта и грузов,доставка грузов: Европа Россия, Молдова, перевозки из Турции и Румынии, грузоперевозки из и в Приднестровье,автоперевозки ,морские перевозки, перевозки контейнеров по морю.';				
		$getURL = mysqli_query($CONNECTION,"SELECT `URL` FROM `".DB_PREFIX."pages` WHERE `pageId`='$ID'");		$URL = mysqli_fetch_array($getURL);		
		$insertRU = mysqli_query($CONNECTION,"UPDATE `".DB_PREFIX."pages` SET  `pageName`='$title',`Content`='$message',`MetaDescription`='$metadesc',`MetaTags`='$metakey',`MetaTitle`='$metatitle' WHERE `pageId`='$ID'");	
		if (!$insertRU) echo mysqli_error($CONNECTION);
		$insertMAP = mysqli_query($CONNECTION,"UPDATE `".DB_PREFIX."sitemap` SET `Title`='$title',`Parent`='$parent' WHERE `Link`='".$URL['URL']."'");
		if (!$insertMAP) echo mysqli_error($CONNECTION);	else echo '<A href="'.$home_url.$URL['URL'].'">Измененно</a>';	
		
		
	} else echo 'Заполните все поля на русском';
	if (!empty($title2)&&!empty($message2)&&$insertRU)
	{		if(empty($metatitle2)) $metatitle2 = $title2;		
		if(empty($metakey2)) $metakey2 = join(',',explode(' ',$title2));
		if(empty($metadesc2)) $metadesc2 = $title2.' Сайт транспортно-экспедиторских услуг,поиск транспорта для перевозок,поиск грузов для международных перевозок, международные грузоперевозки из и в молдову ,биржа транспорта и грузов,доставка грузов: Европа Россия, Молдова, перевозки из Турции и Румынии, грузоперевозки из и в Приднестровье,автоперевозки ,морские перевозки, перевозки контейнеров по морю.';
		$URLn = 'ro/'.substr($URL['URL'],3);
		$getURL = mysqli_query($CONNECTION,"SELECT `pageId` FROM `".DB_PREFIX."pages` WHERE `URL`='$URLn'");
		if (mysqli_num_rows($getURL)==0){
			$insertRO = mysqli_query($CONNECTION,"INSERT INTO `".DB_PREFIX."pages` (`pageName`,`URL`,`Content`,`Active`,`langAbb`,`MetaDescription`,`MetaTags`,`MetaTitle`) VALUES ('$title2', '$URLn', '$message2','1','ro','$metadesc2','$metakey2','$metatitle2')");
		}
		else{
				$URL = mysqli_fetch_array($getURL);
				$insertRO = mysqli_query($CONNECTION,"UPDATE `".DB_PREFIX."pages` SET `pageName`='$title2',`Content`='$message2',`MetaDescription`='$metadesc2',`MetaTags`='$metakey2',`MetaTitle`='$metatitle2' WHERE `pageId`='".$URL['pageId']."'");
			}
		if (!$insertRO) echo mysqli_error($CONNECTION);
	}
	if (!empty($title3)&&!empty($message3)&&$insertRU)
	{		if(empty($metatitle3)) $metatitle3 = $title3;		
		if(empty($metakey3)) $metakey3 = join(',',explode(' ',$title3));
		if(empty($metadesc3)) $metadesc3 = $title3.' Сайт транспортно-экспедиторских услуг,поиск транспорта для перевозок,поиск грузов для международных перевозок, международные грузоперевозки из и в молдову ,биржа транспорта и грузов,доставка грузов: Европа Россия, Молдова, перевозки из Турции и Румынии, грузоперевозки из и в Приднестровье,автоперевозки ,морские перевозки, перевозки контейнеров по морю.';
		
		$URLn = 'en/'.substr($URL['URL'],3);
		$getURLEN = mysqli_query($CONNECTION,"SELECT `pageId` FROM `".DB_PREFIX."pages` WHERE `URL`='$URLn'");
		if (mysqli_num_rows($getURLEN)==0){
			$insertRO = mysqli_query($CONNECTION,"INSERT INTO `".DB_PREFIX."pages` (`pageName`,`URL`,`Content`,`Active`,`langAbb`,`MetaDescription`,`MetaTags`,`MetaTitle`) VALUES ('$title3', '$URLn', '$message3','1','en','$metadesc3','$metakey3','$metatitle3')");
		}
		else{
				$URLEN = mysqli_fetch_array($getURLEN);
				$insertRO = mysqli_query($CONNECTION,"UPDATE `".DB_PREFIX."pages` SET  `pageName`='$title3',`Content`='$message3',`MetaDescription`='$metadesc3',`MetaTags`='$metakey3',`MetaTitle`='$metatitle3' WHERE `pageId`='".$URLEN['pageId']."'");
			}
		if (!$insertRO) echo mysqli_error($CONNECTION);
	}	include('edit_page.php');
	
}?></div></body></html>