<?php

session_start();
session_name("MoldovaTruck");
//error_reporting(E_ALL);
require_once "system/configuration.php";
require_once "system/functions.php";
if (MODULE=='activation')
{
	$_GET['code'] = htmlspecialchars($_GET['code'],ENT_QUOTES);
	$getUser = mysqli_query($CONNECTION,"SELECT `userID`,`userType` FROM `".DB_PREFIX."users` WHERE `activationCode`='$_GET[code]'");
	if (mysqli_num_rows($getUser)==1)
	{
		$user = mysqli_fetch_array($getUser);
		$_SESSION['user'] = $user['userID'];
		$_SESSION['group'] = $user['useType'];
		
		$upd = mysqli_query($CONNECTION,"UPDATE `".DB_PREFIX."users` SET `activated`='1' WHERE `userID`='$user[userID]'");
		header('Location: '.HOME.LANG.'/forum');
	}
	else
	{
		exit('Код активации не верен!');
	}
}
if (MODULE == 'forum') $META = ForumTitle(); else $META = metaTitle();
if (LANG=='ru')
{	
	$mtitle = $META['metatitle'];
}	else {
	$getRedirect = mysqli_query($CONNECTION,"SELECT `metatitle` FROM `jos_redirection` WHERE `oldurl`='$URL'");
	$Red = mysqli_fetch_array($getRedirect);
	$mtitle = $Red['metatitle'];
}
$mdesc = $META['metadesc'];
$mkey = $META['metakey'];

?>



<!DOCTYPE html>



<!-- saved from url=(0074)https://p.w3layouts.com/demos/may-2016/01-05-2016/elite_hotel_booking/web/ -->



<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">



<title><?php 



if (ID=='homepage') echo 'Международные грузоперевозки , сайт транспортных услуг, транспортные компании, биржа транспорта, транспортный портал , перевозки грузов, биржа грузов, поиск грузов,грузы для перевозки.';

else 

if (empty($mtitle)) {
	$mtitle = title_page();
	$upd = mysqli_query($CONNECTION,"UPDATE `".DB_PREFIX."pages` SET `MetaTitle`='".$mtitle."' WHERE `URL`='".URL."'");
	
	
}

echo $mtitle;

 ?></title>



<meta name="viewport" content="width=device-width, initial-scale=1">



<meta name="description" content="<?php if (ID=='homepage' && $arrayROUTE[0]!=='forum') echo 'Сайт транспортно-экспедиторских услуг,поиск транспорта для перевозок,поиск грузов для международных перевозок, международные грузоперевозки из и в молдову ,биржа транспорта и грузов,доставка грузов: Европа Россия, Молдова, перевозки из Турции и Румынии, грузоперевозки из и в Приднестровье,автоперевозки ,морские перевозки, перевозки контейнеров по морю.'; else echo $mdesc; ?>">



<meta name="keywords" content="<?php if (ID=='homepage' && $arrayROUTE[0]!=='forum') echo 'транспортный поисковик,биржа грузов и транспорта , грузы для перевозок,международные перевозки, транспорт, грузы, грузоперевозки, доставка грузов,найти транспорт для перевозки, поиск грузов,попутный транспорт,транспортная компания,транспортировка груза,найти груз.'; else echo $mkey; ?>">



<!-- font files -->



<link href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css" rel="stylesheet">



<link rel="stylesheet" href="<?php echo $home_url;?>font-awesome/css/font-awesome.css" media="screen">
<link rel="stylesheet" href="<?php echo $home_url;?>bootstrap/css/bootstrap.css" media="screen">
<link rel="stylesheet" href="<?php echo $home_url;?>bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo $home_url;?>style.css">
<link rel='stylesheet' id='Lora-css'  href='http://fonts.googleapis.com/css?family=Lora%3A1%2C400%2C400italic%2C700%2C700italic%2C900&#038;ver=4.5.3' type='text/css' media='all' />
<link rel='stylesheet' id='Roboto-css'  href='http://fonts.googleapis.com/css?family=Roboto%3A1%2C400%2C400italic%2C700%2C700italic%2C900&#038;ver=4.5.3' type='text/css' media='all' />






<script src="<?php echo $home_url;?>jquery-1.10.2.min.js"></script>
<script src="<?php echo $home_url;?>bootstrap.min.js"></script>
<script src="<?php echo $home_url;?>custom.js"></script>



<script src="<?php echo $home_url;?>moment-with-locales.js"></script>



<script type="text/javascript" src="http://moldovatruck.md/templates/ja_mesolite/js/jquery.carouFredSel-4.3.3-packed.js"></script>

<script src="//cdn.jsdelivr.net/jquery.scrollto/2.1.2/jquery.scrollTo.min.js"></script>

<script src="<?php echo $home_url;?>bootstrap-datetimepicker.js"></script>
<script type="text/javascript" src="<?php echo $home_url;?>script.js"></script>
<script src="<?php echo $home_url;?>forum/ckeditor/ckeditor.js"></script>
<script src="<?php echo $home_url;?>forum/ckeditor/samples/js/sample.js"></script>

<style>

a {color:#1076a8;}
a:hover {color:#18bc9c;;}
</style>







</head>



<body<?php  if (ID=='homepage'or ID=='ro' && $arrayROUTE[0]!=='forum') echo ' onload="MainPage();"';?>>



<i class="fa fa-arrow-circle-o-up fa-2x" id="to-top" aria-hidden="true"></i>



<script>

$(document).ready(function(){







	$("#to-top").hide();



	



	$(function () {



		$(window).scroll(function () {



			if ($(this).scrollTop() > 100) {



				$('#to-top').fadeIn(500);



			} else {



				$('#to-top').fadeOut(700);



			}



		});



		



		$('#to-top').click(function () {



			$('body,html').animate({



				scrollTop: 0



			}, 800);



			return false;



		});



	});







});







</script>



<?php 

if (isset($_SESSION['user'])&&$_SESSION['group']=='admin')
{
	$f = false;
	$avaliableKeys = array('user','topic','category','');
	$ex = explode('/',URL);
	for($i=0;!$foundKey&&$i<count($avaliableKeys);$i++)
		if (in_array($avaliableKeys[$i],array_keys($_GET))) {$f = true;$action = $avaliableKeys[$i];}
	if (!$f)
	{
		$getID = mysqli_query($CONNECTION,"SELECT `pageId` FROM `".DB_PREFIX."pages` WHERE `URL`='".URL."'");
		if (mysqli_num_rows($getID)>0)
		{
			$ID_ = mysqli_fetch_array($getID);
			if ($ex[1]!=='novosti')echo '<a href="'.HOME.'admin/edit_page/'.$ID_['pageId'].'"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true" id="editAdmin" style="display: inline;"></i></a>';
			else echo '<a href="'.HOME.'admin/edit_news/'.$ID_['pageId'].'"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true" id="editAdmin" style="display: inline;"></i></a>';
		}
	}
	else 
	{
		echo '<a href="#" onclick="EditAdmin('.$_GET[$action].','."'".$action."'".')"  data-toggle="modal" data-target="#Edit"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true" id="editAdmin" style="display: inline;"></i></a>';
	}
}
if (ID=='homepage' or ID=='ro' && $arrayROUTE[0]!=='forum')



{



	$PREFIX = 'MAIN';



	?>



    <style>



	#carousel-example-captions {margin-top:1em}



	</style>

<?php
if (empty($_SESSION['background']))
    $numberBack = 1;
else $numberBack = $_SESSION['background'] + 1;
if($numberBack>5) $numberBack = 1;
$_SESSION['background'] = $numberBack;
?>
 <div id="mainPage" style="background-image:url('<?=HOME?>images/banner_<?=$numberBack?>.png')">
<div class="white_block">

</div>


 <div class="container" style="display: block;">



 	 <fieldset id="MYform" style="font-size:0.9em;display: block;">



     <?php echo ViewBlock('formBlock'); ?>



     </fieldset>



     <div id="contacts">



         <p><h1>Международные транспортные услуги</h1></p>




         <p><h3> <a href="<?php echo $home_url.'ru/kontaktyi-menedzherov-otdela-gruzoperevozok-zakaz-transporta-zakaz-perevozok.php'; ?>" style="color:white">Контакты</a> </h3></p>



     </div>



 </div>



 </div>



 <div class="modal fade" id="Contacts" role="dialog"><div class="modal-dialog"><div class="modal-content"><div class="modal-header">



			  <button type="button" class="close" data-dismiss="modal">&times;</button>



			  <h4 class="modal-title">Обратная связь</h4>



			</div>



			<div class="modal-body">



            <label>Ваше имя</label>



            <input type="text" id="cname" value="" placeholder="">



        	<label>Ваше Email</label>



            <input type="text" id="cmail" value="" placeholder="">



            <label>Ваше телефон</label>



            <input type="text" name="cphone" value="" placeholder="">



            <label>Сообщение</label>



            <textarea style="height:8em"></textarea>



            <div style="margin-top:2em; text-align:center"><button type="button" class="btn btn-info">Отправить</button></div>



            </div>



			</div>



		  </div></div>



 <script>



 function MainPage()



{


    if ($('html').width()>1024){
        $('#mainPage #contacts').css('display','block');
    }



}


if ($('html').width()<1024)
{
	$("#menu").removeClass('navbarMAIN navbarMAIN-default navbarMAIN-fixed-top');
        $("#menu").addClass('navbar navbar-default navbar-fixed-top');
		$("#nb-header").removeClass('navbarMAIN-header');
		$("#nb-header").addClass('navbar-header');
		$("#nb-title").removeClass('navbarMAIN-brand');
		$("#nb-title").addClass('navbar-brand');
		$("#nb-btn").removeClass('navbarMAIN-toggle collapsed');
		$("#nb-btn").addClass('navbar-toggle collapsed');
		$("#navbarMAIN-main").removeClass('navbarMAIN-collapse collapse');
		$("#navbarMAIN-main").addClass('navbar-collapse collapse');
		$("#nb-btn").attr("data-target", "#navbar-main");
		$("#navbarMAIN-main").attr('id','navbar-main');
		$("#nb-title").html('<img src="<?php echo $home_url;?>images/small_logo.png">');
		$("#nb-ul").removeClass('nav navbarMAIN-nav');
		$("#nb-ul").addClass('nav navbar-nav');
		$("#nb-right").removeClass('nav navbarMAIN-nav navbarMAIN-right');
		$("#nb-right").addClass('nav navbar-nav navbar-right');
		$("#nb-right").css('margin-right','4em');
		$("#nb-left").removeClass('nav navbarMAIN-form navbarMAIN-left');
		$("#nb-left").addClass('nav navbar-form navbar-left');
		$("#nb-left input").css('background-color','#fff');
		$("#nb-left input").css('color','#798d8f');
}



$(function () {


	if ($('html').width()>1023){		
		$(window).scroll(function(event) {
        if($(this).scrollTop()>90) {
        $("#menu").fadeIn();
		$("#menu").removeClass('navbarMAIN navbarMAIN-default navbarMAIN-fixed-top');
        $("#menu").addClass('navbar navbar-default navbar-fixed-top');
		$("#nb-header").removeClass('navbarMAIN-header');
		$("#nb-header").addClass('navbar-header');
		$("#nb-title").removeClass('navbarMAIN-brand');
		$("#nb-title").addClass('navbar-brand');
		$("#nb-btn").removeClass('navbarMAIN-toggle collapsed');
		$("#nb-btn").addClass('navbar-toggle collapsed');
		$("#navbarMAIN-main").removeClass('navbarMAIN-collapse collapse');
		$("#navbarMAIN-main").addClass('navbar-collapse collapse');
		$("#nb-btn").attr("data-target", "#navbar-main");
		$("#navbarMAIN-main").attr('id','navbar-main');
		$("#nb-title").html('<img src="<?php echo $home_url;?>images/small_logo.png">');
		$("#nb-ul").removeClass('nav navbarMAIN-nav');
		$("#nb-ul").addClass('nav navbar-nav');
		$("#nb-right").removeClass('nav navbarMAIN-nav navbarMAIN-right');
		$("#nb-right").addClass('nav navbar-nav navbar-right');
		$("#nb-right").css('margin-right','4em');
		$("#nb-left").removeClass('nav navbarMAIN-form navbarMAIN-left');
		$("#nb-left").addClass('nav navbar-form navbar-left');
		$("#nb-left input").css('background-color','#fff');
		$("#nb-left input").css('color','#798d8f');
    }

    else {

		$("#menu").removeClass('navbar navbar-default navbar-fixed-top');
        $("#menu").addClass('navbarMAIN navbarMAIN-default navbarMAIN-fixed-top');
		$("#nb-header").removeClass('navbar-header');
		$("#nb-header").addClass('navbarMAIN-header');
		$("#nb-title").removeClass('navbar-brand');
		$("#nb-title").html('<span style="display:block;margin-top:15px">Moldova Truck</span>');
		$("#nb-title").addClass('navbarMAIN-brand');
		$("#nb-btn").removeClass('navbar-toggle collapsed');
		$("#nb-btn").addClass('navbarMAIN-toggle collapsed');
		$("#navbarMAIN-main").removeClass('navbar-collapse collapse');
		$("#navbarMAIN-main").addClass('navbarMAIN-collapse collapse');
		$("#nb-btn").attr("data-target", "#navbarMAIN-main");
		$("#navbarMAIN-main").attr('id','navbarMAIN-main');
		$("#nb-ul").removeClass('nav navbar-nav');
		$("#nb-ul").addClass('nav navbarMAIN-nav');
		$("#nb-right").removeClass('nav navbar-nav navbar-right');
		$("#nb-right").addClass('nav navbarMAIN-nav navbarMAIN-right');
		$("#nb-left").removeClass('nav navbar-form navbar-left');
		$("#nb-left").addClass('nav navbarMAIN-form navbarMAIN-left');
		$("#nb-left input").css('background-color','transparent');
		$("#nb-left input").css('color','#fff');
		$("#nb-right").css('margin-right:1em');

    }



    });
	}

});



 </script>



 <?



}else {



	$PREFIX = '';

	$epl = explode('#formc',$_SERVER['REQUEST_URI']);

	if (count($epl)>1) echo "<script> $('#ModalWindow').modal('show');</script>";



}



?>



<? Slider();?>



 



<div id="menu" class=<?php echo '"navbar'.$PREFIX.' navbar'.$PREFIX.'-default navbar'.$PREFIX.'-fixed-top"'; ?>>



      



        <div id="nb-header" class=<?php echo '"navbar'.$PREFIX.'-header"'; ?>>



          <a id='nb-title' href="<? echo $home_url.LANG; ?>" class=<?php echo '"navbar'.$PREFIX.'-brand"'; ?> style="margin-top:-15px">
		  <?php
		  if(URL=='homepage' or URL=='ro' or URL=='en' or URL=='ru') echo'<span style="display:block;margin-top:15px">Moldova Truck</span>';
		  else echo '<img src="'.$home_url.'images/small_logo.png">'; 
		  ?></a>



          <button id="nb-btn" class=<?php echo '"navbar'.$PREFIX.'-toggle collapsed"'; ?> type="button" data-toggle="collapse" data-target="<?php echo '#navbar'.$PREFIX.'-main';?>" aria-expanded="false">



            <span class="icon-bar"></span>



            <span class="icon-bar"></span>



            <span class="icon-bar"></span>



          </button>



        </div>



        



        <div class="<?php echo 'navbar'.$PREFIX.'-collapse collapse" id="navbar'.$PREFIX.'-main"'; ?>" aria-expanded="false" style="height: 1px;">



          <ul id="nb-ul" class="nav <?php echo 'navbar'.$PREFIX.'-nav';?>">



           <?php getMenu(1); getMenu(3);

			if (LANG=='ru')



{		   echo '<li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes" aria-expanded="false">Услуги <span class="caret"></span></a>



              <ul class="dropdown-menu" aria-labelledby="themes" style="position:absolute;left:-300px;width:1000px;max-height:700px;overflow:auto"><li style="padding:5px;">';



			$query = "SELECT DISTINCT `Parent`,`menuName`,`menuId` FROM `".DB_PREFIX."menu` WHERE `menuTypeId`='5' AND `langAbb`='".LANG."' AND `Active`='1' AND `menuId`>'99' GROUP BY `Parent` ORDER BY `Order`";

			$queryRu = "SELECT DISTINCT `Parent`,`menuName`,`menuId` FROM `".DB_PREFIX."menu` WHERE `menuTypeId`='5' AND `langAbb`='ru' AND `Active`='1' AND `menuId`>'99' GROUP BY `Parent` ORDER BY `Order`";



			$getParent = mysqli_query($CONNECTION,$query);

			

			if (mysqli_num_rows($getParent)>0)



			{



				//echo'<li><div style="display:inline-block;width:33%"><ul>';



				$array = array();



				$AllParent = mysqli_fetch_array($getParent);



				$k = 0;$i=0;



				



				do



				{



					$array[$k][$i] = array('name'=>$AllParent['menuName'],'type'=>'title');



					$i++;



					$getMenu = mysqli_query($CONNECTION,"SELECT * FROM `".DB_PREFIX."menu` WHERE `menuTypeId`='5' AND `Parent`='$AllParent[Parent]' AND `Active`='1'");



					if (mysqli_num_rows($getMenu)>0)



					{



						



						$AllMenu = mysqli_fetch_array($getMenu);



						do



						{	if ($AllParent['menuId']!==$AllMenu['menuId']){



							$array[$k][$i] = array('name'=>$AllMenu['menuName'],'type'=>'href','link'=>$AllMenu['URL'],'ID'=>$AllMenu['menuId']);



							$i++;



							if ($i==20) { $k++;$i=0;}



						}



						}



						while($AllMenu = mysqli_fetch_array($getMenu));



					}



				}



				while($AllParent = mysqli_fetch_array($getParent));



				echo '<table width="100%">';



				$rowTop = $k;



				for($i=0;$i<20;$i++)



				{



					echo'<tr>';



					for($j=0;$j<3;$j++)



					{



						if (mb_strlen($array[$j][$i]['name'],"UTF-8")>25) $title = mb_substr($array[$j][$i]['name'],0,22,'UTF-8').'...';



						else $title = $array[$j][$i]['name'];



						if ($array[$j][$i]['type']=='title')echo '<td style="width:33%;"><b>'.$title.'</b></td>';



						else 



						{



							if (!empty($array[$j][$i])) 



							{



								if(URL==$array[$j][$i]['link']) {echo '<td style="width:33%;"><a href="'.Lng($array[$j][$i]['link']).'" style="display:block;background-color:#1a242f;color:#fff;"><h5 style="margin-top:3px;margin-bottom:3px;">'.$title.'</h5></a></td>';define('PARENT','Услуги');}



								else echo '<td style="width:33%;"><a href="'.Lng($array[$j][$i]['link']).'" title="'.$array[$j][$i]['name'].'" alt="'.$array[$j][$i]['name'].'" style="display:block"><h5 style="margin-top:3px;margin-bottom:3px;">'.$title.'</h5></a></td>';



							}



						}



					}



					echo '</tr>';



				}



				echo'</table>';



			}else echo mysqli_error($CONNECTION);



			echo'</ul></li>';

}

			

			if (LANG=='ro')

			{

				echo'<li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes" aria-expanded="false">Bursa de transport <span class="caret"></span></a>
              <ul class="dropdown-menu" aria-labelledby="themes"><li><a href="'.Lng('ru/prosmotr-gruzov-nayti-gruz-poisk-poputnyih-gruzov-predlozheniya-gruzov-888.php').'" style="text-shadow:none">Marfă</a></li>
<li><a href="'.Lng('ru/poisk-transporta-nayti-svobodnyiy-transport-poisk-poputnogo-transporta-577.php').'" style="text-shadow:none">Trsnsport</a></li>
<li><a href="'.Lng('ru/dobavit-svobodnyiy-transport.php').'" style="text-shadow:none">Adaugă transport</a></li>
<li><a href="'.Lng('ru/predlozhit-gruz.php').'" style="text-shadow:none">Adaugă marfă</a></li>
<li><a href="'.Lng('ru/svodnaya-tablitsa-gruzov-transporta-po-stranam-statistika-transporta-i-gruzov.php').'" style="text-shadow:none">Propunerii marfă/transport</a></li>
</ul>            </li><li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes" aria-expanded="false">Servicii <span class="caret"></span></a>
              <ul class="dropdown-menu" aria-labelledby="themes" style="position:absolute;left:-300px;width:1000px;max-height:700px;overflow:auto"><li style="padding:5px;">';
			  echo '<table width="100%">';
				$getRO = mysqli_query($CONNECTION,"SELECT `reference_id`,`value` FROM `jos_jf_content` WHERE `language_id`='4' AND `reference_table`='content' AND `reference_field`='title'");
				$array = array();
				$i=0;$k=0;
				if(mysqli_num_rows($getRO)>0)
				{
					$Ro = mysqli_fetch_array($getRO);
					do
					{
						$getInsert = mysqli_query($CONNECTION,"SELECT `oldurl` FROM `jos_redirection` WHERE `newurl` LIKE '%id=".$Ro['reference_id']."%' AND `oldurl` LIKE 'ro%'");
						if (mysqli_num_rows($getInsert)>0)
						{
							$Inserted = mysqli_fetch_array($getInsert);
							$array[$k][$i] = array('name'=>$Ro['value'],'type'=>'href','link'=>$Inserted['oldurl'],'ID'=>$AllMenu['reference_id']);
							$i++;
							if ($i==25) { $k++;$i=0;}
						}
					}
					while($Ro = mysqli_fetch_array($getRO));
				}else echo mysqli_error($CONNECTION);
				$rowTop = $k;
				for($i=0;$i<25;$i++)
				{
					echo'<tr>';
					for($j=0;$j<4;$j++)
					{
						if (mb_strlen($array[$j][$i]['name'],"UTF-8")>25) $title = mb_substr($array[$j][$i]['name'],0,22,'UTF-8').'...';
						else $title = $array[$j][$i]['name'];
						if ($array[$j][$i]['type']=='title')echo '<td style="width:25%;"><b>'.$title.'</b></td>';
						else
						{
							if (!empty($array[$j][$i]))
							{
								if(URL==$array[$j][$i]['link']) {echo '<td style="width:25%;"><a href="'.Lng($array[$j][$i]['link']).'" style="display:block;background-color:#1a242f;color:#fff;" alt="'.$array[$j][$i]['name'].'" title="'.$array[$j][$i]['name'].'">'.$title.'</a></td>';define('PARENT','Servicii');}
								else echo '<td style="width:25%;"><a href="'.Lng($array[$j][$i]['link']).'" style="display:block" alt="'.$array[$j][$i]['name'].'" title="'.$array[$j][$i]['name'].'">'.$title.'</a></td>';
						}
					}
				}
					echo '</tr>';
				}
				echo'</table>';
			  echo'</ul></li>';
			}
			if (LANG=='en')
			{
				echo'<li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes" aria-expanded="false">The Freigth exchange <span class="caret"></span></a>
              <ul class="dropdown-menu" aria-labelledby="themes"><li><a href="'.Lng('ru/prosmotr-gruzov-nayti-gruz-poisk-poputnyih-gruzov-predlozheniya-gruzov-888.php').'" style="text-shadow:none">Cargo</a></li>
<li><a href="'.Lng('ru/poisk-transporta-nayti-svobodnyiy-transport-poisk-poputnogo-transporta-577.php').'" style="text-shadow:none">Trsnsport</a></li>
<li><a href="'.Lng('ru/dobavit-svobodnyiy-transport.php').'" style="text-shadow:none">Add transport</a></li>
<li><a href="'.Lng('ru/predlozhit-gruz.php').'" style="text-shadow:none">Add cargo</a></li>
<li><a href="'.Lng('ru/svodnaya-tablitsa-gruzov-transporta-po-stranam-statistika-transporta-i-gruzov.php').'" style="text-shadow:none">Offers cargo/transport</a></li>
</ul>            </li><li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes" aria-expanded="false">Service <span class="caret"></span></a>
              <ul class="dropdown-menu" aria-labelledby="themes" style="position:absolute;left:-300px;width:1000px;max-height:700px;overflow:auto"><li style="padding:5px;">';
			  echo '<table width="100%">';
				$getRO = mysqli_query($CONNECTION,"SELECT `reference_id`,`value` FROM `jos_jf_content` WHERE `language_id`='2' AND `reference_table`='content' AND `reference_field`='title'");
				$array = array();
				$i=0;$k=0;
				if(mysqli_num_rows($getRO)>0)
				{
					$Ro = mysqli_fetch_array($getRO);
					do
					{
						$getInsert = mysqli_query($CONNECTION,"SELECT `oldurl` FROM `jos_redirection` WHERE `newurl` LIKE '%id=".$Ro['reference_id']."%' AND `oldurl` LIKE 'en%'");
						if (mysqli_num_rows($getInsert)>0)
						{
							$Inserted = mysqli_fetch_array($getInsert);
							$array[$k][$i] = array('name'=>$Ro['value'],'type'=>'href','link'=>$Inserted['oldurl'],'ID'=>$AllMenu['reference_id']);
							$i++;
							if ($i==25) { $k++;$i=0;}
						}
					}
					while($Ro = mysqli_fetch_array($getRO));
				}else echo mysqli_error($CONNECTION);
				$rowTop = $k;
				for($i=0;$i<25;$i++)
				{
					echo'<tr>';
					for($j=0;$j<3;$j++)
					{
						if (mb_strlen($array[$j][$i]['name'],"UTF-8")>25) $title = mb_substr($array[$j][$i]['name'],0,22,'UTF-8').'...';
						else $title = $array[$j][$i]['name'];
						if ($array[$j][$i]['type']=='title')echo '<td style="width:33%;"><b>'.$title.'</b></td>';
						else
						{
							if (!empty($array[$j][$i]))
							{
								if(URL==$array[$j][$i]['link']) {echo '<td style="width:33%;"><a href="'.Lng($array[$j][$i]['link']).'" style="display:block;background-color:#1a242f;color:#fff;" alt="'.$array[$j][$i]['name'].'" title="'.$array[$j][$i]['name'].'">'.$title.'</a></td>';define('PARENT','Service');}
								else echo '<td style="width:25%;"><a href="'.Lng($array[$j][$i]['link']).'" style="display:block" alt="'.$array[$j][$i]['name'].'" title="'.$array[$j][$i]['name'].'">'.$title.'</a></td>';
							}
						}
					}
					echo '</tr>';
				}
				echo'</table>';
			  echo'</ul></li>';
			}
           getMenu(4);
           getMenu(6);
		   if (ID!=='homepage'&&LANG=='ru')	echo '<li><a href="#" data-toggle="modal" data-target="#ModalWindow">Заказать транспорт</a></li>';		



			if (LANG=='ro') echo '<li><a href="#" data-toggle="modal" data-target="#ModalWindow">Comandă transport</a></li>';

			if (LANG=='en') echo '<li><a href="#" data-toggle="modal" data-target="#ModalWindow">Order transport</a></li>';



		   ?>



           



          </ul>







          <ul id="nb-right" class="nav <?php echo 'navbar'.$PREFIX.'-nav navbar'.$PREFIX.'-right'; ?>" style="margin-right:5em">



           <li class="dropdown">



              <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes2" aria-expanded="false" style="color:#18bc9c"><? echo Lang('Language',LANG); ?> <span class="caret"></span></a>



              <ul class="dropdown-menu" aria-labelledby="themes2">



               <?php echo LangList(); ?>



              </ul>



            </li>



          </ul>







        </div>



      



    </div>



      



    <div id="left_menu" class="col-lg-3 col-md-3 col-sm-4" style="display:none">



            <div class="list-group table-of-contents">



            <div id='cssmenu'><ul><?php getMenu(2); ?>



            <li class="has-sub"><a href=# class="list-group-item"><span>Биржа</span></a><ul><li><a class='list-group-item' href='<?php echo $home_url; ?>ru/prosmotr-gruzov-nayti-gruz-poisk-poputnyih-gruzov-predlozheniya-gruzov-888.php'>Предложения груза</a></li>



<li><a class='list-group-item' href='<?php echo $home_url; ?>ru/poisk-transporta-nayti-svobodnyiy-transport-poisk-poputnogo-transporta-577.php'>Предложения транспорта</a></li>



<li><a class='list-group-item' href='<?php echo $home_url; ?>ru/prosmotr-gruzov-nayti-gruz-poisk-poputnyih-gruzov-predlozheniya-gruzov-888.php'>Написать отзыв, оставить отзыв, поиск отзывов на компанию клиента, перевозчика, экспедитора.</a></li>



<li><a class='list-group-item' href='<?php echo $home_url; ?>ru/razmestit-transport-dobavit-svobodnyiy-transport-nayti-gruz.php'>Предложить транспорт </a></li>



<li><a class='list-group-item' href='<?php echo $home_url; ?>ru/razmestit-gruz-dobavit-gruz-zakazat-perevozku-nayti-transport.php'>Предложить груз</a></li>



<li><a class='list-group-item' href='<?php echo $home_url; ?>ru/svodnaya-tablitsa-gruzov-transporta-po-stranam-statistika-transporta-i-gruzov.php'>Предложения грузов/транспорта</a></li>







</ul></li>



            



            </ul></div>



            



            </div>



     </div>



     <script>



	 var home_url = '<?php echo $home_url;?>';



$(document).ready(function () {



			$('#cssmenu li.has-sub > a').on('click', function(){



				$(this).removeAttr('href');



				var element = $(this).parent('li');



				if (element.hasClass('open')) {



					element.removeClass('open');



					element.find('li').removeClass('open');



					element.find('ul').slideUp();



				}



				else {



					element.addClass('open');



					element.children('ul').slideDown();



					element.siblings('li').children('ul').slideUp();



					element.siblings('li').removeClass('open');



					element.siblings('li').find('li').removeClass('open');



					element.siblings('li').find('ul').slideUp();



				}



			});







			$('#cssmenu>ul>li.has-sub>a').append('<span class="holder"></span>');



        });







	 </script>



     



    <div class="container" style="margin-top:2em <?php if(isset($_GET['topic'])&&!empty($_GET['topic'])) echo ';margin-top:0px;'; ?>">



    <?php


	$expl = explode('/',URL);
	$expl = explode('.php',$expl[1]);
	
	$BrijaPages = array('poisk-transporta-nayti-svobodnyiy-transport-poisk-poputnogo-transporta-577','sea_transport','train_transport','plain_transport','passenger_transport','post_transport','prosmotr-gruzov-nayti-gruz-poisk-poputnyih-gruzov-predlozheniya-gruzov-888','sea_cargo','train_cargo','plain_cargo','passenger_cargo','post_cargo');
	
	if (ID!=='homepage'and ID!=='ro' and !in_array($expl[0],$BrijaPages) and MODULE!=='forum')
	{
		$URL = URL;
		$broms = array();
		$getParents = mysqli_query($CONNECTION,"SELECT * FROM `".DB_PREFIX."sitemap` WHERE `Link`='$URL'");
		if (mysqli_num_rows($getParents)>0)
		{
			$parent = mysqli_fetch_array($getParents);
			array_push($broms,array($parent['Title'],HOME.$parent['Link']));
			if ($parent['Parent']>0)
			{
				$getCh = mysqli_query($CONNECTION,"SELECT * FROM `".DB_PREFIX."sitemap` WHERE `siteID`='$parent[Parent]'");
				if (mysqli_num_rows($getCh)>0)
				{
					$child = mysqli_fetch_array($getCh);
					array_push($broms,array($child['Title'],HOME.$child['Link']));
				}
			}
	}
		if (defined('PARENT')) array_push($broms,array(PARENT,''));
		array_push($broms,array('О сайте',HOME.'ru'));
		$broms = array_reverse($broms);
		for ($k=0;$k<count($broms)-1;$k++)
		{
			if(!empty($broms[$k][1])) echo '<a href="'.$broms[$k][1].'">'.$broms[$k][0].'</a> › ';
			else echo $broms[$k][0].' › ';
		}
		echo '<a href="'.$broms[count($broms)-1][1].'">'.$broms[count($broms)-1][0].'</a>';

	}



	?>



   <div id="content">



     <div class="panel panel-default" style="margin-top:1em<?php if(MODULE=='forum') echo ';border:none'; ?>">

	
	<?php if(MODULE!=='forum'){ ?>
  <div class="panel-heading" style="background-color:transparent; text-align:center; border-bottom:none; margin-bottom:2em">
  <?php
   if (in_array($expl[0],$BrijaPages))
	{
		$URL = URL;
		$broms = array();
		
		$getParents = mysqli_query($CONNECTION,"SELECT * FROM `".DB_PREFIX."sitemap` WHERE `Link`='$URL'");
		if (mysqli_num_rows($getParents)>0)
		{
			$parent = mysqli_fetch_array($getParents);
			array_push($broms,array($parent['Title'],HOME.$parent['Link']));
			if ($parent['Parent']>0)
			{
				$getCh = mysqli_query($CONNECTION,"SELECT * FROM `".DB_PREFIX."sitemap` WHERE `siteID`='$parent[Parent]'");
				if (mysqli_num_rows($getCh)>0)
				{
					$child = mysqli_fetch_array($getCh);
					array_push($broms,array($child['Title'],HOME.$child['Link']));
				}
			}
	}
		if (defined('PARENT')) array_push($broms,array(PARENT,''));
		$broms = array_reverse($broms);
		echo'<div style="text-align:left">';
		for ($k=0;$k<count($broms);$k++)
		{
			if(!empty($broms[$k][1])) echo '<a href="'.$broms[$k][1].'">'.$broms[$k][0].'</a> ';
			else echo $broms[$k][0].' › ';
		}
		echo'</div>';

	}
  ?>
  <h1><?php echo title_page(); ?></h1></div>
	<?php } ?>


  <div class="panel-body">



   <?php  body(); ?>



  </div>



  </div>



</div>



   </div>



   <?php if (ID=='homepage' or ID=='ro')



   { 



   ?>



   <div id="typeTransport">



   <?php



     

	if (LANG=='ru'||LANG=='en') $l = 'ru'; else $l='ro';

   $getTypes = mysqli_query($CONNECTION,"SELECT * FROM `".DB_PREFIX."types` WHERE `isEnabled`='1' AND `Lang`='$l' ORDER BY `Order`");



   if (mysqli_num_rows($getTypes)>0)



   {



	   echo '<div class="title" style="margin-bottom:1em;margin-top:0.5em">';

	   if(LANG!=='ro')echo'Типы транспорта';

	   if(LANG=='ro') echo 'Tipuri de transport, pentru camioane, a gasi de transport';

	   echo'</div>';



	  $Types = mysqli_fetch_array($getTypes);



	  $k=0;



	  do



	  {



		  echo '<div class="row" onMouseOver="Type('.$k.')">



		  	<div style="background-image:url('.$Types['photo'].')" onclick='."'".'$(location).attr("href", "'.Lng($Types['Link']).'")'."'".'></div>



			<h4><a href="'.Lng($Types['Link']).'">'.$Types['title'].'</a></h4>



			<div class="line"></div>



		  </div>';



		  $k++;



	  }



	  while($Types = mysqli_fetch_array($getTypes));



   }



   ?>



   <div style="text-align:center"><button href="#" data-toggle="modal" data-target="#ModalWindow" class="btn btn-info" type="button" style="min-width:20%;margin-top:2em">Заказать транспорт</button></div>



   </div>



   



   <?php  include (dirname(__FILE__)."/cargo/way.php"); ?>



<div style="text-align:center"><button href="#" data-toggle="modal" data-target="#ModalWindow" class="btn btn-info" type="button" style="min-width:20%;margin-bottom:2em">Узнать стоимость перевозки</button></div>




      <div id="operators" onclick='$(location).attr("href", "<?php echo Lng('ru/kontaktyi-menedzherov-otdela-gruzoperevozok-zakaz-transporta-zakaz-perevozok.php');?>")'>



 	  	         	<?php



				echo '<div class="operator">



									<div class="info">



									<p><div class="ttl"><img src="'.$home_url.'images/ContIcon.png" style="height:2em;margin-right:0.2em"> Отдел заказа перевозок, контакты менеджеров</div></p>



									</div>



							  </div>';



			



			?>



      



      </div>

<div style="padding-top:2em;padding-bottom:2em;background:#E3E9ED" id="fm">
<div class="ttl">
    Транспортный грузовой форум moldovatruck
</div>
<div class="container" style="margin-top:1em">
    <a href="<?=HOME.LANG.'forum'?>" class="forum_link">Перейти на форум</a>
<div class="table-responsive">
				<table class="table" style="border:none">
				<?php
				$getComments = mysqli_query($CONNECTION,"SELECT `forumID`,`userID`,`title` FROM `".DB_PREFIX."forum_topic` WHERE `ParentTopic`='0' AND `isEnabled`='1' ORDER BY `forumID` DESC LIMIT 10");
				if (mysqli_num_rows($getComments)>0)
				{
					function getUserInfo($userID)
{
	global $CONNECTION;
	$getAuthor = mysqli_query($CONNECTION,"SELECT `userName`,`userFullname` FROM `".DB_PREFIX."users` WHERE `userID`='$userID'");
	if (mysqli_num_rows($getAuthor)>0)
	{
		$Author = mysqli_fetch_array($getAuthor);
		$userAuthor = '<a href="'.HOME.LANG.'/forum?user='.$userID.'">'.$Author['userName'].' '.$Author['userFullname'].'</a>';
		}
	else $userAuthor = 'Пользователь удален';
	return $userAuthor;
}
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
				?>
				</table>
				</div>
				<?php
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
?>
				</div>
         
</div>
       <?php
       BirjaIndex();
       ?>
      <div id="contactsBlock">

      	 <div class="ttl">Обратная связь</div>



 	     <div class="container">



        	<div class="col-lg-4 col-md-4 col-sm-5" style="margin-top:2.5em">



            <div style="margin-bottom:1em;">
            <font style="margin-right:2em;background:transparent;display:inline"><i class="fa fa-envelope-o"></i></font> <a href="mailto:info@moldovatruck.md">info@moldovatruck.md</a>
            </div>
            <div style="margin-bottom:1em;">
            <font style="margin-right:2em;background:transparent;display:inline"><i class="fa fa-question-circle"></i></font> <a href="ru/forum">Задать вопрос на форуме</a>
            </div>



            </div> 



            



            <div class="col-lg-8 col-md-8 col-sm-7">



            	<?php
				include(dirname(__FILE__).'/send_.php');
				?>



            </div>        



         </div>



      </div>



        <div style="text-align:center;background-color:#F7F7F7;"><button href="#" data-toggle="modal" data-target="#ModalWindow" class="btn btn-info" type="button" style="min-width:20%;margin-bottom:2em;">Узнать стоимость перевозки</button></div>



        <?php } ?>



   



<script>
<?php
$birjaLinks = array('sea_transport','sea_cargo','poisk-transporta-nayti-svobodnyiy-transport-poisk-poputnogo-transporta-577','prosmotr-gruzov-nayti-gruz-poisk-poputnyih-gruzov-predlozheniya-gruzov-888','plain_transport','plain_cargo','train_transport','train_cargo','post_transport','post_cargo','passenger_transport','passenger_cargo');

$expl = explode('/',URL);
$expl = explode('.php',$expl[1]);

if ($_POST['form_name']=='formc'&&in_array($expl[0],$birjaLinks)) echo '$(document).ready(function () {$("#AddTransport").modal("show");});';
if ($_POST['form_name']=='forma'&&in_array($expl[0],$birjaLinks)) echo '$(document).ready(function () {$("#AddCargo").modal("show");});';
if (in_array($expl[0],$birjaLinks)&&$_GET['add']=='cargo')  echo '$(document).ready(function () {$("#AddCargo").modal("show");});';
if (in_array($expl[0],$birjaLinks)&&$_GET['add']=='transport')  echo '$(document).ready(function () {$("#AddTransport").modal("show");});';

if ($_POST['form_name']=='formc'&&!in_array($expl[0],$birjaLinks)) echo '$(document).ready(function () {$("#ModalWindow").modal("show");});';
if ($_POST['form_name']=='forma'&&!in_array($expl[0],$birjaLinks)){



?>

$(document).ready(function(){

	$(function () {

		console.log($('#forma').parent().hasClass('modal-body'));
		$("html, body").animate({ scrollTop: ($('#forma').offset().top - 150) }, 800);
		if ($('#forma').parent().hasClass('modal-body')) $(document).ready(function () {$("#ModalWindow").modal("show");});

	});

});

<? } ?>

function Category()
{
	cat = $('#catsearch').val();
	if(cat==''||parseInt(cat)==0) location.replace(home_url+'ru/forum');
	else location.replace(home_url+'ru/forum?category='+cat);
}
function sendForm(Form,MustRows,MustRowsTitle)
{
	
	Row = MustRows.split(',');
	RowTitle = MustRowsTitle.split('!');
	alertMessage = '';
	for(k=0;k<count(Row);k++)
	if($('#'+Form+' #'+Row[k]).val()==''||parseInt($('#'+Form+' #'+Row[k]).val())==0) alertMessage+=RowTitle[k]+' не заполнено<br>';
	
	if(alertMessage=='') return true;
	else {
		$('#'+Form+' #err_message').css('display','block');
		$('#'+Form+' #err_message').html(alertMessage.substr(0,alertMessage.length-4));
		return false;
	}
	
}


function Send()



{



	Email = $('#getEmail').val();



	Name = $('#getName').val();



	Phone = $('#getPhone').val();



	Subject = $('#getSubject').val();



	Message = $('#getMessage').val();



	text='';



	if (Email=='') text+=', Email';



	if (Phone=='') text+=', Телефон';



	if (Name=='') text+=', Имя';



	if (Message=='') text+=', Сообщение';



	



	if (text!=='') alert('Поля '+text.substr(2,text.length-2)+' не заполнено');



	else



	{



		$.post(home_url+'sendmessage.php', {email:Email,message:Message,subject:Subject,name:Name,phone:Phone},function(data){



				alert(data)



			});



	}



	



}







$(document).ready(function ()



{


	//if(parseInt($('html').width())>750&&parseInt($('html').width())<1024) $('#nb-right').css('display','none');
	if(parseInt($('html').width())<=750)



	{


	$('#left_menu').css('display','block');
		$('.panel').css('border','none');



		$('.panel').css('padding','0px');



		$('.panel-body').css('padding','0px');


		$('#content').addClass('col-lg-9 col-md-9 col-sm-8');



		$('.logo span').css('display','none');



	}



	



	$('#InfButton').click(function ()



	{



		$('#InfButton').css('display','none');



		$('#additioinal_info').css('display','inline-block');



	});



	



	$('#CloseButton').click(function ()



	{



		$('#InfButton').css('display','inline-block');



		$('#additioinal_info').css('display','none');



	});



	if (parseInt($('html').width())<=360) {$('.row').css('width','100%');console.log('1');}	



	if (parseInt($('html').width())<=768&&parseInt($('html').width())>360) {$('.row').css('width','50%');console.log('2');}



	if (parseInt($('html').width())<=1024&&parseInt($('html').width())>768) {$('.row').css('width','33%');console.log('3');}



	if (parseInt($('html').width())>=1360) $('.row').css('width','20%');



	



	



})



function Type(ID)



{



	console.log(ID);



	$('.view').removeClass('view');



	//$('.row:eq('+ID+')').removeClass('row');



	$('.row:eq('+ID+')').addClass('view');



}



function dump(arr,level) {



var dumped_text = "";



if(!level) level = 0;







//The padding given at the beginning of the line.



var level_padding = "";



for(var j=0;j<level+1;j++) level_padding += "    ";







if(typeof(arr) == 'object') { //Array/Hashes/Objects



 for(var item in arr) {



  var value = arr[item];







  if(typeof(value) == 'object') { //If it is an array,



   dumped_text += level_padding + "'" + item + "' ...\n";



   dumped_text += dump(value,level+1);



  } else {



   dumped_text += level_padding + "'" + item + "' => \"" + value + "\"\n";



  }



 }



} else { 



 dumped_text = "===>"+arr+"<===("+typeof(arr)+")";



}



return dumped_text;



}







function is_int(value){



  if((parseFloat(value) == parseInt(value)) && !isNaN(parseInt(value))){



      return true;



 } else {



      return false;



 }



}







function initSelect()



{



	document.getElementById('import_city').disabled = (document.getElementById('import_country').value==0)?true:false;



	document.getElementById('export_city').disabled = (document.getElementById('export_country').value==0)?true:false;



}







function requestError (sid, msg)



{



	sid.options.length = 0;



	sid.disabled = true;



	sid.options[sid.options.length] = new Option(msg, 0, false, false);



}







//initSelect();



var xmlHttp = false;







try {



 	xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");



} catch (e) {



 	try {



		xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");



	} catch (e2) {



		xmlHttp = false;



	}



}







if (!xmlHttp && typeof XMLHttpRequest != 'undefined') {



	xmlHttp = new XMLHttpRequest();



}







if (!xmlHttp) {







	sidc = document.getElementById("import_city");



	requestError (sidc, 'XMLHttpRequest error');



	sidc = document.getElementById("export_city");



	requestError (sidc, 'XMLHttpRequest error');



	updateinput("import_city", "none");



	updateinput("export_city", "none");



}







function disableSelect(fs)



{







	sid = document.getElementById(fs);



	sid.options.length = 0;



	sid.disabled = true;



	sid.options[sid.options.length] = new Option("--- не имеет значения ---", 0, false, false);







}



function count(mixed_var, mode) {



var key, cnt = 0;



  if (mixed_var === null || typeof mixed_var === 'undefined') {



    return 0;



  } else if (mixed_var.constructor !== Array && mixed_var.constructor !== Object) {



    return 1;



  }







  if (mode === 'COUNT_RECURSIVE') {



    mode = 1;



  }



  if (mode != 1) {



    mode = 0;



  }







  for (key in mixed_var) {



    if (mixed_var.hasOwnProperty(key)) {



      cnt++;



      if (mode == 1 && mixed_var[key] && (mixed_var[key].constructor === Array || mixed_var[key].constructor ===



        Object)) {



        cnt += this.count(mixed_var[key], 1);



      }



    }



  }







  return cnt;







}



function updateinput (fs, action,form)



{



if (fs == "import_city") {



	var input = $('#'+form+' #import_city_type');



	var text = $('#'+form+' #import_city_text');



	if (action=="delete") {



				input.html('');



				text.html('');



	} else {



	input.html("<br><input type='text' name='import_city_type' size=20 />");



	text.html("<br>Введите город<br>");



	}



}



if (fs == "export_city") {



	var input = $('#'+form+' #export_city_type');



	var text = $('#'+form+' #export_city_text');



	if (action=="delete") {



				input.html('');



				text.html('');



	} else {



	input.html("<br><input type='text' name='export_city_type' size=20 />");



	text.html("<br>Введите город<br>");



	}



}



}



function updateSelect (selectId, optValue, fs, form)



{

	if(selectId=='ignore') return 0;

	sid = $('#'+form+' #'+selectId);

	console.log($('#'+form+' #'+selectId).html());

	$('#'+form+' #'+selectId).disabled = true;

	$('#'+form+' #'+selectId).html("<option value=0>Подождите, идет загрузка...</option>");



var params = "value=" + optValue + "&language=ru";

console.log(params);

$.post(home_url+'cargo/city.php', {value:optValue,language:'ru'},function(data){



		console.log(data);



		var from_php = data;



		if (from_php!=='')



		{



			HTML = '';



			sid.html('');



			dt = from_php.split('|');



			dt = dt[1].split(',');



			for(k=0;k<count(dt);k++)



			{



				ex2 = dt[k].split('^');



				HTML+='<option value="'+ex2[1]+'">'+ex2[0]+'</option>';



			}



			HTML='<option value="0">--- не имеет значения ---</option><option value="0">--- другой город ---</option>'+HTML;



			console.log(HTML);



			sid.disabled = false;



			sid.html(HTML);



		}



		else{sid.html("<option value='0'>---Города не найдены---</option>");



							updateinput(fs,"none",form);



}



		});



	



}







function isValidEmail (email, strict)



{



 if ( !strict ) email = email.replace(/^\s+|\s+$/g, '');



 return (/^([a-z0-9_\-]+\.)*[a-z0-9_\-]+@([a-z0-9][a-z0-9\-]*[a-z0-9]\.)+[a-z]{2,4}$/i).test(email);



}







function left_cargo_form_parse_info(form_user, form_type)



{	







	var dateofexport;







	if(form_type=="left_cargo_form_"){



		dateofexport = form_user.left_cargo_form_date_export.value;



	}else if(form_type=="calculate_transportation_form_"){



		dateofexport = form_user.calculate_transportation_form_date_export.value;



	}else{



		form_type="";



		dateofexport = form_user.date_export.value;



	}







	var err_message = "";



	var text = "Пожалуйста заполните обязательные поля.<br>";



	var err_message_more = "";



	



	if (form_user.import_country.value == 0 || form_user.import_country.value == "" || form_user.import_country.value == null) {



		document.getElementById(form_type+"select_import").className = "redborder"; err_message += "1";



	}else { 



		document.getElementById(form_type+"select_import").className = "none";



	}



	



	if (form_user.export_country.value == 0 || form_user.export_country.value == "" || form_user.export_country.value == null) {



		document.getElementById(form_type+"select_export").className = "redborder"; err_message += "1";



	}else {



		document.getElementById(form_type+"select_export").className = "none";



	}



	



	if (dateofexport == 0 || dateofexport == "" || dateofexport == null) {



		document.getElementById(form_type+"date_span").className = "redborder"; err_message += "1";



	}else {



		document.getElementById(form_type+"date_span").className = "none";



	}



	



	if (form_user.type_transport.value == 0 || form_user.type_transport.value == "" || form_user.type_transport.value == null) {



		document.getElementById(form_type+"select_transport").className = "redborder"; err_message += "1";



	}else {



		document.getElementById(form_type+"select_transport").className = "none";



	}



	



	if (form_user.cargo_type.value == 0 || form_user.cargo_type.value == "" || form_user.cargo_type.value == null) {



		document.getElementById(form_type+"select_cargo").className = "redborder"; err_message += "1";



	}else {



		document.getElementById(form_type+"select_cargo").className = "none";



	}



	



	if (form_user.cargo_size.value == 0 || form_user.cargo_size.value == "" || form_user.cargo_size.value == null) {



		document.getElementById(form_type+"select_cargo_size").className = "redborder"; err_message += "1";



	}else {



		document.getElementById(form_type+"select_cargo_size").className = "none";



	}



	



	if (form_user.fio.value == 0 || form_user.fio.value == "" || form_user.fio.value == null) {



		document.getElementById(form_type+"fio_span").className = "redborder"; err_message +="1";



	}else {



		document.getElementById(form_type+"fio_span").className = "none";



	}



	



	if (!isValidEmail(form_user.email.value, false) || form_user.email.value == "") {



		document.getElementById(form_type+"email_span").className = "redborder"; err_message_more +="Почтовый ящик указан неверно.<br>"; err_message += "1";



	}else {



		document.getElementById(form_type+"email_span").className = "none";



	}



	



	



	var country_code = form_user.telefon_country_code.value;



	country_code = country_code.replace(/-/g, "");



	var city_code = form_user.telefon_city_code.value;



	city_code = city_code.replace(/-/g, "");



	var telefon = form_user.telefon.value;



	telefon = telefon.replace(/-/g, "");



	var telefon_number = "+" + country_code + "-" + city_code + "-" + telefon;



	var pattern = /^[+]\d{1,3}-\d{1,4}-\d{1,15}/;



	var ereg = pattern.test(telefon_number);



	if (!ereg) {



		document.getElementById(form_type+"telefon_country_code_span").className = "redborder";



		document.getElementById(form_type+"telefon_city_code_span").className = "redborder";



		document.getElementById(form_type+"telefon_span").className = "redborder";



		err_message_more +="Неправильный формат телефонного номера. <br>(Пример: + код страны - код города - номер абонента)<br>";



		err_message += "1";



	} else {



		document.getElementById(form_type+"telefon_country_code_span").className = "none";



		document.getElementById(form_type+"telefon_city_code_span").className = "none";



		document.getElementById(form_type+"telefon_span").className = "none";



	}



	if (err_message != "") {



		document.getElementById(form_type+"err_message").innerHTML = text + err_message_more;



		return false;



	} else {



		document.getElementById(form_type+"err_message").innerHTML = "";



		return true;



	}



}



</script>







<!-- показать скрыть форму -->



<script>



function popup(mylink, winname)



{



if (! window.focus)return true;



var href;



if (typeof(mylink) == 'string')



   mylink=mylink;



else



   mylink=mylink.href;



window.open(mylink,winname,'width=500,height=600,resizable=0,scrollbars=no,toolbar=no,directories=no,location=no,menubar=no,status=no');



return false;



}



function Modal(id)



{



	



	$('.modal-dialog').html(loading);



	$.post(home_url+'modal.php', {modal:id},function(data){



				console.log(data);



				$('.modal-dialog').html('<div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal">&times;</button> <h4 class="modal-title"></h4></div><div class="modal-body">'+data+'</div></div></div>');



				



			});



}



function look(type){



param=document.getElementById(type);



if(param.style.display == "none") param.style.display = "block";



else param.style.display = "none"



}







</script>



<footer>



	<div class="container">



    



    <?php



	$getFooterMenu = mysqli_query($CONNECTION,"SELECT DISTINCT `menuId`, `menuName` FROM `".DB_PREFIX."menu` WHERE `Active`='1' AND `menuTypeId` IN(1,2,3,4,6) GROUP BY `Parent` ORDER BY `menuTypeId`");



	if (mysqli_num_rows($getFooterMenu)>0)



	{



		$FooterMenu = mysqli_fetch_array($getFooterMenu);



		$i=0;$k=-1; $footer = array();



		do



		{



			$i=0;$k++;



			$footer[$k][$i] = array('title'=>$FooterMenu['menuName'],'type'=>'title');



					



			$query = "SELECT DISTINCT `menuName`, `URL` FROM `".DB_PREFIX."menu` WHERE `Active`='1' AND `Parent`='".$FooterMenu['menuId']."' AND `langAbb`='ru' ORDER BY `Order`";



			if ($FooterMenu['menuId']==18) $query.=' LIMIT 10';



			$getMenu = mysqli_query($CONNECTION,$query);



			if (mysqli_num_rows($getMenu)>0)



			{



				$menu = mysqli_fetch_array($getMenu);



				do



				{



					$footer[$k][$i] = array('title'=>$menu['menuName'],'type'=>'link','link'=>$home_url.$menu['URL']);



					$i++;					



				}



				while($menu = mysqli_fetch_array($getMenu));



			}



		}



		while($FooterMenu = mysqli_fetch_array($getFooterMenu));



		



		for($j=0;$j<=$k;$j++)



		{



			echo '<div class="col-xs-6 col-md-4" style="margin-bottom:2em"><h4>'.$footer[$j][0]['title'].'</h4><line></line><cont>';



			for($i=1;$i<count($footer[$j]);$i++)



			{



				echo '<a href="'.$footer[$j][$i]['link'].'">';



				if (mb_strlen($footer[$j][$i]['title'],"UTF-8")>30) echo mb_substr($footer[$j][$i]['title'],0,29,"UTF-8").'...';



				else echo $footer[$j][$i]['title'];



				echo'</a>';



			}



			echo '</cont></div>';



		}



		



	}



	



	



	?>



	</div><div class="container">



    <a href="<?php echo $home_url.'ru/sitemap' ?>" style="display:inline-block;margin-right:1em">Карта сайта</a> 
	<span id="openstat2064831"></span><script type="text/javascript"> var openstat = { counter: 2064831, image: 25, next: openstat , track_links: "ext" }; document.write(unescape("%3Cscript%20src=%22http" +
(("https:" == document.location.protocol) ? "s" : "") +
"://openstat.net/cnt.js%22%20defer=%22defer%22%3E%3C/script%3E")); </script>
	



    <p style="font-size:1em;color:#ffa726;right:2em;display: block;position: absolute;float: right;text-align: right;margin-top: -6em;min-width:6em"> <font style="text-decoration:none;paddgin-right:1em">2009 - <?php echo date('Y');?></font>



   </p>



   </div> 



</footer>



<div class="modal fade" id="ModalWindow" role="dialog"><div class="modal-dialog"><? 

if(LANG=='ru') $tt = 'Узнать стоимость перевозки';

if(LANG=='ro') $tt = 'Află prețul transportării';

if(LANG=='en') $tt = 'Get price of transportation';

echo '<div class="modal-content">



			<div class="modal-header">



			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>



			<h4 class="modal-title">'.$tt.'</h4>



			</div>



			<div class="modal-body">';



			include (dirname(__FILE__)."/cargo/calculate_cost_of_transportation_cargo.php");



			echo'</div>



			</div>



		  </div>';
		  if (defined('INSERTED')) unset($_POST['form_name']);
		  
		  ?></div></div>







</body>



</html>