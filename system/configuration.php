<?php
define('DB_HOST','178.17.165.189');
define('DB_NAME','mweb72_1');
define('DB_USER','mweb72_1');
define('DB_PASSWORD','huNY3uLa');
define('DB_PREFIX','buianov_');






if($_SERVER['HTTP_HOST']=='localhost')

$home_url = 'http://localhost/mtruck/';

else $home_url = 'http://'.$_SERVER['HTTP_HOST'].'/';



$admin_page= $home_url.'admin/';

$CONNECTION = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

if (!$CONNECTION) exit(mysqli_connect_error());



$ip = $_SERVER['REMOTE_ADDR'];

$web_page = $_SERVER['REQUEST_URI'];

mysqli_query($CONNECTION,"SET CHARACTER SET UTF8");
mysqli_query($CONNECTION,"SET NAMES SET UTF8");



$getLang = mysqli_query($CONNECTION,"SELECT `lang` FROM `".DB_PREFIX."activity` WHERE `ip`='$ip' AND `lang` IN ('ru','ro','en') ORDER BY `DateTime` DESC");

if (mysqli_num_rows($getLang)>0)

{

	$langActivity = mysqli_fetch_array($getLang);

}



$ID = '';

if (!empty($_GET['id'])) $ID = htmlspecialchars($_GET['id'],ENT_QUOTES);

if(!empty($_GET['route']))

{


	
	$arrayROUTE = explode( '/', trim($_GET['route'],'/') );

	if (!empty($arrayROUTE[0])) define('LANG',htmlspecialchars($arrayROUTE[0],ENT_QUOTES));

	if (empty($arrayROUTE[1])&&empty($arrayROUTE[2]))

	{



		define('MODULE','');

		if(LANG!=='ro') define('ID','homepage');

		if(LANG=='ro') define('ID','ro');

	}else

	{

		if (!empty($arrayROUTE[1])) define('MODULE',htmlspecialchars($arrayROUTE[1],ENT_QUOTES)); else define('MODULE','');



	}

	if (!empty($arrayROUTE[2])) define('ID',htmlspecialchars($arrayROUTE[2],ENT_QUOTES)); else define('ID','');



}



else {

	if (isset($_GET['lang']))define('LANG',$_GET['lang']); else  define('LANG','ru');
	define('MODULE','');
	if (empty($ID)&&LANG=='ru') define('ID','homepage'); else define('ID',$ID);
	if (empty($ID)&&LANG=='ro') define('ID','ro'); else define('ID',$ID);

	

}







$MODULE = MODULE;

$ID = ID;

if(!empty($MODULE)) $URL = LANG.'/'.$MODULE;

if (!empty($ID)&&!empty($MODULE)) $URL.='/'.ID;

if (empty($MODULE)&&!empty($ID)) $URL = ID;



if (!empty($_GET['id'])) {

	if (empty($_GET['lang']))

	{

		$URL=$_SERVER['REQUEST_URI'].'&lang='.$langActivity['lang'];

		header("Location: ".$home_url.$URL);

	}

	else

	{

		$getInsert = mysqli_query($CONNECTION,"SELECT `oldurl` FROM `jos_redirection` WHERE `newurl` LIKE '%id=".$_GET['id']."%' AND `oldurl` LIKE '".$_GET['lang']."%'");

		if (mysqli_num_rows($getInsert)>0) $Insert = mysqli_fetch_array($getInsert);

		$URL = $Insert['oldurl'];

	}

}

$insertActivity = mysqli_query($CONNECTION,"INSERT INTO `".DB_PREFIX."activity`(`lang`,`page`,`ip`,`timeseconds`,`userID`)VALUES('".LANG."','$web_page','$ip','".time()."','$_SESSION[user]')");



if (LANG!=='edit_page'&&LANG!=='edit_news'&&LANG!=='dell_page'&&LANG!=='edit_menu'&&LANG!=='dell_menu'&&LANG!=='menu_top'&&LANG!=='menu_down'){

$getPage = mysqli_query($CONNECTION,"SELECT `pageName` FROM `".DB_PREFIX."pages` WHERE `URL`='$URL'");

if (mysqli_num_rows($getPage)==0){

	$getPage = mysqli_query($CONNECTION,"SELECT `title` FROM `jos_content` WHERE `id`='$ID'");

	if (mysqli_num_rows($getPage)==0)

	{



		$getPage = mysqli_query($CONNECTION,"SELECT `oldurl` FROM `jos_redirection` WHERE `oldurl`='$URL'");

	    if (mysqli_num_rows($getPage)==0)

	    {

			header("HTTP/1.0 404 Not Found");

		   require_once(dirname(__FILE__)."/../404.php");



		   exit;



	    }
		


		



	}



	else



	{



		$u = explode('&Itemid',substr($_SERVER['REQUEST_URI'],1,strlen($_SERVER['REQUEST_URI'])));

		$UU = $u[0];

		$query = "SELECT `oldurl` FROM `jos_redirection` WHERE `newurl` LIKE '%$ID%' AND `Itemid`='$_GET[Itemid]'";

		$getURL = mysqli_query($CONNECTION,$query);

		if (mysqli_num_rows($getURL)>0)

		{		



			$URLS = mysqli_fetch_array($getURL);

			do



			{

				$lang = explode('/',$URLS['oldurl']);

				if ($lang[0]==LANG) $URL = $URLS['oldurl'];

			}

			while($URLS = mysqli_fetch_array($getURL));

		}

	}

}

}
if ($_SERVER['HTTP_HOST']=='localhost') $prefix = '/mtruck/'; else $prefix = '';
$pages_ =  array($prefix.'ru/forum',$prefix.'en/forum',$prefix.'ro/forum',$prefix.'ru/forum',$prefix.'en/forum',$prefix.'ro/forum');
if (in_array($_SERVER['REQUEST_URI'],$pages_))
{
	$avaliableKeys = array('action','user','topic','category','');
	$foundKey = false;

	for($i=0;!$foundKey&&$i<count($avaliableKeys);$i++)
		if (in_array($_SERVER['REQUEST_URI'],$pages_) or in_array($avaliableKeys[$i],array_keys($_GET))) 
		$foundKey = true;
	if (!$foundKey) 
	{
		header("HTTP/1.0 404 Not Found");
		require_once("404.php");
		exit;
	}
}
define('URL',$URL);





$t_now = date('H:i:s');



$date = date('Y-m-d');



$hour = date('H');



$day = date('d');



$ip = $_SERVER['REMOTE_ADDR'];



$yaer = date('Y');



$minutes = date('i');



$month = date('m');





function translit($str) {

    $rus = array('А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё', 'Ж', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ъ', 'Ы', 'Ь', 'Э', 'Ю', 'Я', 'а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ы', 'ь', 'э', 'ю', 'я','.',',','?','@','!','#','$','%','^','`','^','&','*','(',')','=','+','/',' ');

    $lat = array('A', 'B', 'V', 'G', 'D', 'E', 'E', 'Gh', 'Z', 'I', 'Y', 'K', 'L', 'M', 'N', 'O', 'P', 'R', 'S', 'T', 'U', 'F', 'H', 'C', 'Ch', 'Sh', 'Sch', 'Y', 'Y', 'Y', 'E', 'Yu', 'Ya', 'a', 'b', 'v', 'g', 'd', 'e', 'e', 'gh', 'z', 'i', 'y', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'h', 'c', 'ch', 'sh', 'sch', 'y', 'y', 'y', 'e', 'yu', 'ya','','','','','','','','','','','','','','','','','','','');

    return str_replace($rus, $lat, $str);

  }

$visit = ($yaer*12*30*60*60)+($month*30*60*60)+($day*60*60)+($hour*60)+$minutes;





?>