<?php
session_start();
session_name("MoldovaTruck");
require_once "../system/configuration.php";
require_once "../system/functions.php";
unset($_SESSION);
unset($_COOKIE['user']);
unset($_COOKIE['group']);
setcookie('user', null, -1, '/');
setcookie('group', null, -1, '/');
session_destroy();
echo '<html><head><meta http-equiv="refresh" content="0;URL='.HOME.LANG.'/forum" /></head></html>';
						
?>