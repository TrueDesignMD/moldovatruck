<?php$db = mysql_connect ("localhost","root","");$bd = mysql_select_db ("echipament",$db);mysql_query("SET NAMES UTF-8");
$home_url = 'http://localhost/echipament/';
$descr_site = 'Sport';
$site_name = 'Admin';
$admin_page = 'http://localhost/echipament/admin/';
$descr_site = 'Sport';
$site_name = 'Admin Page Echipament Moldova';
$web_page = $_SERVER['REQUEST_URI'];
$t_now = date('H:i:s');
$date = date('Y-m-d');
$hour = date('H');
$day = date('d');
$ip = $_SERVER['REMOTE_ADDR'];
$ya = date('Y');
$minutes = date('i');
$month = date('m');$mymail = 'jenia.don.bosco@gmail.com';$mypassword = 'Qq4541201096';$title_mail = 'Буянов Евгений';
$visit = date('s')+date('i')*60+(date('H')*3600)+($day*3600*24)+($month*30*3600*24)+($ya*12*30*3600*24);$datetime = date('d').'.'.$month.'.'.$ya.' '.$t_now;

$dd = ($ya*12*30*60*60)+($month*30*60*60)+($day*60*60)+($hour*60)+$minutes;
$sezon = $yu[sezon]; 
function redirect($url)
{
	echo "<html><head><meta http-equiv='Refresh' content='0; URL=".$url."'></head></html>";	
}function lang($str,$lng){	$sql_ = mysql_query("SELECT text FROM lang_translate WHERE lang='$lng' and title='$str'");	if (mysql_num_rows($sql_)>0)	{		$ll = mysql_fetch_array($sql_);		return $ll[text];	}	else{		$sql_ = mysql_query("SELECT text FROM lang_translate WHERE title='$str'");		if (mysql_num_rows($sql_)>0)		{			$ll = mysql_fetch_array($sql_);			return $ll[text];		}	}}

?>