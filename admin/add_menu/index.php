<?php
session_start();
include(dirname(__FILE__)."/../../system/configuration.php");

if(!empty($_GET['route'])) { 

    $arr = explode( '/', trim($_GET['route'],'/') );
    $count = count($arr); 
	$k=-1;
	do
	{
		$k++;
		$arr[$k] = htmlspecialchars($arr[$k],ENT_QUOTES);
	}
	while($k<$count-1);
}
?>



<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=charset=utf-8">

<title>Админ панель</title>
<link href="<? echo $admin_page;?>style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="http://s62.ucoz.net/src/ckeditor/custom/ueditor.css">
			
<script>
home_url = '<? echo $home_url; ?>';
admin_page = '<? echo $admin_page; ?>';
</script>


<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="<? echo $admin_page;?>java_admin.js"></script>
<link rel="stylesheet" href="<? echo $admin_page;?>style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<title><? echo $site_name; ?></title>
<script>

$('.dropdown-toggle').dropdown();


</script>

</head>
<?php

if (empty($_SESSION['s']))
{
	echo '<div style="margin-left:45%;width:150px;heigth:150px;">
<div class="form-group">

    <label for="exampleInputEmail1">Логин:</label>

    <input type="text" name="text" class="form-control" id="text">

	</div>

	<div class="form-group">

    <label for="exampleInputEmail1">Пароль:</label>

    <input type="password" name="pass" class="form-control" id="pass">

	</div>
	

	<div id="alerts" style="color:red;"></div>

<div style="margin-top:20px;text-align:center"><button type="submit" onclick=enters(""); class="btn btn-primary">ВОЙТИ</button></div>

</div>';

exit;	

}
?>

<body>

 <div  id="menu">

    <ul class="nav nav-pills" role="tablist">

      <li role="presentation"><a href="<? echo $admin_page; ?>">АДМИН-ПАНЕЛЬ</a></li>

      <li role="presentation" class="dropdown">

        <a id="drop4" href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false">

          НОВОСТИ

          <span class="caret"></span>

        </a>

        <ul id="menu1" class="dropdown-menu" role="menu" aria-labelledby="drop4">

         
          <li role="presentation"><a role="menuitem" tabindex="-1" href="<? echo $admin_page; ?>edit_news">Изменить</a></li>
          <li role="presentation"><a role="menuitem" tabindex="-1" href="<? echo $admin_page; ?>add_news">Добавить</a></li>

        </ul>

      </li>

<li role="presentation" class="dropdown">

        <a id="drop4" href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false">

          СТРАНИЦЫ

          <span class="caret"></span>

        </a>

        <ul id="menu1" class="dropdown-menu" role="menu" aria-labelledby="drop4">

         
          <li role="presentation"><a role="menuitem" tabindex="-1" href="<? echo $admin_page; ?>edit_page">Изменить</a></li>
          <li role="presentation"><a role="menuitem" tabindex="-1" href="<? echo $admin_page; ?>add_page">Добавить</a></li>

        </ul>

      </li>
      <li role="presentation" class="dropdown">

        <a id="drop5" href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false">

          МЕНЮ

          <span class="caret"></span>

        </a>

        <ul id="menu2" class="dropdown-menu" role="menu" aria-labelledby="drop5">

          <li role="presentation"><a role="menuitem" tabindex="-1" href="<? echo $admin_page; ?>edit_menu">Изменить</a></li>

          <li role="presentation"><a role="menuitem" tabindex="-1" href="<? echo $admin_page; ?>add_menu">Добавить</a></li>

         </ul>

      </li>

      
	  <li role="presentation" class="dropdown">
        <a id="drop5" href="<?php echo $admin_page; ?>security"> БЕЗОПАСНОСТЬ  </a>

       
      </li>

    </ul> <!-- /pills -->

  </div>

<div id="content">
<?php 
include("add_menu.php");

?>

</div>


</body>

</html>