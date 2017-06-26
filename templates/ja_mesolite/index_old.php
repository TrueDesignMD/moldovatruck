<?php
/**
 * @copyright	Copyright (C) 2005 - 2007 Open Source Matters. All rights reserved.
 * @license		GNU/GPL, see LICENSE.php
 * Joomla! is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * See COPYRIGHT.php for copyright notices and details.
 */

// no direct access
defined( '_VALID_MOS' ) or die( 'Restricted access' );
defined( 'DS') || define( 'DS', DIRECTORY_SEPARATOR );

include_once (dirname(__FILE__).DS.'/ja_vars_1.0x.php');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<?php mosShowHead(); ?>
<meta name="cmsmagazine" content="a01afd07b6e487665253fb6845cb09f2" />
<link rel="stylesheet" href="<?php echo $tmpTools->baseurl(); ?>/templates/ja_mesolite/css/style.css" type="text/css" />
</head>

<body>

<div class="main">

	<div class="header">
    	<!--<div style="background-image:url(<?php echo $tmpTools->baseurl(); ?>/templates/ja_mesolite/images/header_top.jpg);height:7px;width:965px;background-repeat:no-repeat;margin-left:1px;"></div>-->
        
        <div style="background-color:#fff; margin-left:1px;">
			<div style="height:80px;padding-top:5px;padding-left:15px;margin-bottom:5px;">
				<div class="logo"><a style="display:block;float:left;" href="<?php echo $tmpTools->baseurl(); ?>"><img src="<?php echo $tmpTools->baseurl(); ?>/templates/ja_mesolite/images/logo.png" /></a><span style="margin-left:20px;margin-top:30px;position:relative;float:left;font-size:20px;">Moldova Truck - Сайт транспортных экспедиторских услуг</span></div>
				
				<div class="lang">
				<?php mosLoadModules ( 'user3',-1); ?>
					<!--<ul>
						<li><a href="#"><img src="<?php echo $tmpTools->baseurl(); ?>/templates/ja_mesolite/images/russ.png" /> Rus</a></li>
						<li><a href="#"><img src="<?php echo $tmpTools->baseurl(); ?>/templates/ja_mesolite/images/rom.png" /> Rom</a></li>
						<li><a href="#"><img src="<?php echo $tmpTools->baseurl(); ?>/templates/ja_mesolite/images/eng.png" /> Eng</a></li>
					</ul>-->
					<div style="font-size:14px;font-weight:bold;">Контакт: <a style="color:#5897e9;font-size:14px;" href="mailto:info@moldovatruck.md">info@moldovatruck.md</a><br>
					<a style="font-size:13px;" href="index.php?option=com_performs&formid=1&Itemid=57">Обратная связь</a></div>
				</div>
			</div>
			<div class="hmenu">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
			  <tr>
				<td width="265">
					<div class="menu">
						<?php mosLoadModules ( 'user9',-1); ?>       
					</div>
				</td>
				<td><div class="banner"><img src="<?php echo $tmpTools->baseurl(); ?>/templates/ja_mesolite/images/banner.png" /></div></td>
				<td width="265">
					<div class="menu2">
						<?php mosLoadModules ( 'user10',-1); ?>
					</div>
				</td>
			  </tr>
			</table>
			</div>
        </div>
    </div>
    
    <div class="center">
    
    	<div class="menu">
    	<?php mosLoadModules ( 'left',-1); ?>
        </div>
        <div class="content">
        
        	<div id="pathway"> 
			<?php if($_GET['Itemid'] == 2) {
			?><span class="pathway"><a class="pathway" href="index.php">Транспорт для перевозок</a><img alt="arrow" src="<?php echo $mosConfig_live_site; ?>/images/M_images/arrow.png"/><? echo $row['product_name']; ?></span><?
			} else { mospathway(); 
			} ?> 
		</div>
        	<div class="left">
			
<!-- import the calendar CSS -->			
<link rel="stylesheet" type="text/css" media="all" href="http://riatec.md/includes/js/calendar/calendar-mos.css" title="green" />
<style>
.redborder {
	border: 1px solid red; /*Рамка(ширина, тип, цвет)*/
	display: table-cell;
}

.none {
	border: 1px;
}

</style>
<!-- import the calendar script -->
<script type="text/javascript" src="http://riatec.md/includes/js/calendar/calendar_mini.js"></script>
<!-- import the language module -->
<script type="text/javascript" src="http://riatec.md/includes/js/calendar/lang/calendar-en.js"></script>
<script language="JavaScript1.2" src="http://riatec.md/includes/js/joomla.javascript.js" type="text/javascript"></script>
<script language="JavaScript1.2" src="http://riatec.md/includes/js/mambojavascript.js" type="text/javascript"></script>
<!-- JavaScripts -->
<script language="JavaScript">

/**
* Function : dump()
* Arguments: The data - array,hash(associative array),object
*    The level - OPTIONAL
* Returns  : The textual representation of the array.
* This function was inspired by the print_r function of PHP.
* This will accept some data as the argument and return a
* text that will be a more readable version of the
* array/hash/object that is given.
*/
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
} else { //Stings/Chars/Numbers etc.
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

function updateinput (fs, action)
{
if (fs == "import_city") {
	var input = document.getElementById("import_city_type");
	var text = document.getElementById("import_city_text");
	if (action=="delete") {
				input.innerHTML = "";
				text.innerHTML = "";
	} else {
	input.innerHTML = "<br><input type='text' name='import_city_type' size=20 />";
	text.innerHTML = "<br>Введите город<br>";
	}
}
if (fs == "export_city") {
	var input = document.getElementById("export_city_type");
	var text = document.getElementById("export_city_text");
	if (action=="delete") {
				input.innerHTML = "";
				text.innerHTML = "";
	} else {
	input.innerHTML = "<br><input type='text' name='export_city_type' size=20 />";
	text.innerHTML = "<br>Введите город<br>";
	}
}
}
function updateSelect (selectId, optValue, fs)
{
	if (!xmlHttp)
		return false;
	if (optValue == 0 || (selectId == "ignore" && optValue !=1))
	{
		if (selectId != "ignore") {
			disableSelect(fs);
		}
		updateinput(fs, "delete");
		return false;
	}
	if (optValue == 1)
	{
		updateinput(fs, "none");
		return false;
	}
	sid = document.getElementById(selectId);
	sid.options.length = 0;
	sid.disabled = true;
	sid.options[sid.options.length] = new Option("Подождите, идет загрузка...", 0, false, false);
	var params = "value=" + optValue;
	xmlHttp.open("GET","cargo/city.php?" + params, true);

	//var requestTimer = setTimeout(function() {
	//	xmlHttp.abort();
	//	//sid.options[sid.options.length] = new Option("--- не имеет значения ---", 0, false, false);
	//	sid.options[sid.options.length] = new Option("--- другой город ---", 1, false, false);
	//	updateinput(fs, "none");
    //}, 10000);

	xmlHttp.onreadystatechange = function()
	{

		if (xmlHttp.readyState == 4)
		{		//alert(xmlHttp.status);
				//clearTimeout(requestTimer);
				var from_php = xmlHttp.responseText;
				//alert(dump(string));
				sid.options.length = 0;
				sid.innerHTML="";
				if (from_php == "" || from_php == null || from_php == 0) {
							//alert("here");
							sid.options[sid.options.length] = new Option("---Города не найдены---", 0, false, true);
							updateinput(fs,"none");
				} else {
				updateinput(fs, "delete");
				sid.options[sid.options.length] = new Option("--- не имеет значения ---", 0, false, false);
				sid.options[sid.options.length] = new Option("--- другой город ---", 1, false, false);
				var array_work = from_php.split("|"); //in 0 is region in 1 is country in 2 is region in 3 is country
				//alert(dump(array));
				for(var i = 0; i < array_work.length; i++)
				{
					if (i == 0 || is_int(i/2)) {
								var region = document.createElement("optgroup");
								region.label = array_work[i];
					} else {
							var array_city = array_work[i].split(",");
							for(var j = 0; j < array_city.length; j++)
							{
									var city = document.createElement("option");
									city.value = array_city[j];
									city.appendChild(document.createTextNode(array_city[j]));
									region.appendChild(city);
							}

					}
					if ( region != "" && region.hasChildNodes()) { sid.appendChild(region); }

				}
				sid.disabled = false;
				}
		}
	}
	xmlHttp.send(null);
}
</script>


<!-- left cargo form  -->
<script language="JavaScript1.2">
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
function look(type){
param=document.getElementById(type);
if(param.style.display == "none") param.style.display = "block";
else param.style.display = "none"
}
</script>

<!--   заказ транспорта  -->
<h1 onclick="look('left_cargo_form'); return false;"><?php if($mosConfig_lang == 'russian') { echo "Заказать транспорт"; }
	elseif ($mosConfig_lang == 'romanian') { echo "Comanda transport"; }
	elseif ($mosConfig_lang == 'english') { echo "Order transport"; }
?></h1>

<div id="left_cargo_form" style="display: none;">
<p><span id="left_cargo_form_err_message" style="color:red"></span></p>
<form action="/index.php?option=com_content&amp;task=view&amp;id=94&amp;form=left_order" method="POST" name="left_cargo_form" onsubmit="return left_cargo_form_parse_info(this, 'left_cargo_form_');">
<table border="0" width="100%">

<tr>
	<td style="padding-bottom:8px;"><?php if($mosConfig_lang == 'russian') { echo "Тип транспорта"; }
	elseif ($mosConfig_lang == 'romanian') { echo "Tipul de transport"; }
	elseif ($mosConfig_lang == 'english') { echo "Transport type"; }
?> <span style="color: red">*</span>
	<span id="left_cargo_form_select_transport">
	<select type="select" name="type_transport" size="1" style="width: 220px" id="type_transport">
<?php if($mosConfig_lang == 'russian') { echo '
                                    	<option value="">- укажите тип транспорта -</option>
                                    	<option value="Тентованный Полуприцеп">Тентованный Полуприцеп</option>
                                        <option value="Рефрижератор">Рефрижератор</option>
                                        <option value="Автопоезд с прицепом тентованный">Автопоезд с прицепом тентованный</option>
                                        <option value="Мегатрейлер Полуприцеп тенованный">Мегатрейлер Полуприцеп тенованный</option>
                                        <option value="Юмбо платформа полуприцеп">Юмбо платформа полуприцеп</option>
                                        <option value="Автовоз-трейлер с прицепом">Автовоз-трейлер с прицепом</option>
                                        <option value="Трейлер трал-платформа">Трейлер трал-платформа  </option>
                                        <option value="Контейнеровоз полуприцеп">Контейнеровоз полуприцеп</option>
                                        <option value="Изотерм или Цельномет.">Изотерм или Цельномет.</option>
                                        <option value="Перевозки Опасного груза ADR">Перевозки Опасного груза ADR</option>
                                        <option value="Перевозки Сборного груза">Перевозки Сборного груза</option>
                                        <option value="Самосвал">Самосвал</option>
                                        <option value="Цистерна бочка, термос">Цистерна бочка, термос</option>
                                        <option value="Морские перевозки">Морские перевозки</option>
										<option value="Другой">Другой</option>
';}
                                          elseif ($mosConfig_lang == 'romanian') { echo '
										<option value="">- indicati tipul transportului -</option>
										<option value="Самосвал">Autobasculanta</option>
										<option value="Автовоз-трейлер с прицепом">Autotrailer cu remorca</option>

										<option value="Автопоезд с прицепом тентованный">Autotren cu remorca cu prelata</option>
										<option value="Изотерм или Цельномет.">Bena metalica sau izoterma</option>
										<option value="Рефрижератор">Camion frigorific</option>
										<option value="Цистерна бочка, термос">Cisterna cilindru, termos</option>
										<option value="Контейнеровоз полуприцеп">Container auto cu semiremorca</option>
										<option value="Мегатрейлер Полуприцеп тенованный">Mega trailer semiremorca cu prelata</option>

										<option value="Трейлер трал-платформа">Remorca carosata cu platforma de tractare</option>
										<option value="Тентованный Полуприцеп">Semiremorca cu prelata</option>
										<option value="Юмбо платформа полуприцеп">Semiremorca Jumbo carosata</option>
										<option value="Перевозки Сборного груза">Transportare incarcaturi mixte</option>
										<option value="Перевозки Опасного груза ADR">Transportare marfuri periculoase ADR</option>
										<option value="Морские перевозки">Transporturi maritime</option>
										<option value="Другой">Altul</option>
  ';}
                                        elseif ($mosConfig_lang == 'english') { echo  '
										<option value="">- choose transport type -</option>
                                    	<option value="Тентованный Полуприцеп">Tilt-covered semi-trailer</option>
										<option value="Рефрижератор">Refrigerated trailer</option>
										<option value="Автопоезд с прицепом тентованный">Tilt-covered road train with a trailer </option>
										<option value="Мегатрейлер Полуприцеп тенованный">Tilt-covered mega trailer </option>

										<option value="Юмбо платформа полуприцеп">Semi-trailer with Yumbo platform</option>
										<option value="Автовоз-трейлер с прицепом">Car hauler with a trailer </option>
										<option value="Трейлер трал-платформа">Troll-platform trailer </option>
										<option value="Контейнеровоз полуприцеп">Container semi-truck </option>
										<option value="Изотерм или Цельномет.">All-metal and insulated trailer </option>
										<option value="Перевозки Опасного груза ADR">ADR transportations</option>
										<option value="Перевозки Сборного груза">Joint cargo transportations</option>

										<option value="Самосвал">Tipper</option>
										<option value="Цистерна бочка, термос">Insulated tanker </option>
										<option value="Морские перевозки">Sea freight </option>
										<option value="Другой">Other</option>
';}
?>
	</select>
	</span>
	</td>
</tr>

<tr>
	<td align="left" style="padding-bottom:8px;"><?php if($mosConfig_lang == 'russian') { echo "Страна загрузки"; }
	elseif ($mosConfig_lang == 'romanian') { echo "Tara de incarcare"; }
	elseif ($mosConfig_lang == 'english') { echo "Country of loading"; }
?> <span style="color: red">*</span>
	<span id="left_cargo_form_select_export">
			<select type="select" name="export_country" size="1" onchange="updateSelect('left_cargo_form_export_city', this.value, 'left_cargo_form_export_city');" id="export_country"  style="width: 220px" >
<?php if($mosConfig_lang == 'russian') { echo '
                                    	<option value="">- укажите страну -</option>
                                        <option value="Австрия">Австрия</option>
                                        <option value="Азербайджан">Азербайджан</option>
                                        <option value="Албания">Албания</option>
                                        <option value="Андорра">Андорра</option>
                                        <option value="Армения">Армения</option>
                                        <option value="Афганистан">Афганистан</option>
                                        <option value="Беларусь">Беларусь</option>
                                        <option value="Бельгия">Бельгия</option>
                                        <option value="Болгария">Болгария</option>
                                        <option value="Босния/Герцеговина">Босния и Герцеговина</option>
                                        <option value="Великобритания">Великобритания</option>
                                        <option value="Венгрия">Венгрия</option>
                                        <option value="Вьетнам">Вьетнам</option>
                                        <option value="Германия">Германия</option>
                                        <option value="Голандия">Голандия</option>
                                        <option value="Греция">Греция</option>
                                        <option value="Грузия">Грузия</option>
                                        <option value="Дания">Дания</option>
                                        <option value="Египет">Египет</option>
                                        <option value="Израиль">Израиль</option>
                                        <option value="Индия">Индия</option>
                                        <option value="Иордания">Иордания</option>
                                        <option value="Ирак">Ирак</option>
                                        <option value="Иран">Иран</option>
                                        <option value="Ирландия">Ирландия</option>
                                        <option value="Исландия">Исландия</option>
                                        <option value="Испания">Испания</option>
                                        <option value="Италия">Италия</option>
                                        <option value="Йемен">Йемен</option>
                                        <option value="Казахстан">Казахстан</option>
                                        <option value="Канада">Канада</option>
                                        <option value="Канада">Канада</option>
                                        <option value="Кипр">Кипр</option>
                                        <option value="Китай">Китай</option>
                                        <option value="Северная Корея">Корея Северная</option>
                                        <option value="Южная Корея">Корея Южная</option>
                                        <option value="Кыргызстан">Кыргызстан</option>
                                        <option value="Латвия">Латвия</option>
                                        <option value="Ливан">Ливан</option>
                                        <option value="Литва">Литва</option>
                                        <option value="Люксембург">Люксембург</option>
                                        <option value="Македония">Македония</option>
                                        <option value="Малайзия">Малайзия</option>
                                        <option value="Мальта">Мальта</option>
                                        <option value="Мексика">Мексика</option>
                                        <option value="Молдова">Молдова</option>
                                        <option value="Монголия">Монголия</option>
                                        <option value="Мьянма">Мьянма</option>
                                        <option value="Непал">Непал</option>
                                        <option value="Нидерланды">Нидерланды</option>
                                        <option value="Норвегия">Норвегия</option>
                                        <option value="О.А.Э.">ОА Эмираты</option>
                                        <option value="Польша">Польша</option>
                                        <option value="Португалия">Португалия</option>
                                        <option value="Россия">Россия</option>
                                        <option value="Румыния">Румыния</option>
                                        <option value="Северный">Северный Кипр</option>
                                        <option value="Сербия">Сербия</option>
                                        <option value="Силандия">Силандия</option>
                                        <option value="Сингапур">Сингапур</option>
                                        <option value="Сирия">Сирия</option>
                                        <option value="Словакия">Словакия</option>
                                        <option value="Словения">Словения</option>
                                        <option value="США">США</option>
                                        <option value="Таджикистан">Таджикистан</option>
                                        <option value="Тайланд">Тайланд</option>
                                        <option value="Туркменистан">Туркменистан</option>
                                        <option value="Турция">Турция</option>
                                        <option value="Узбекистан">Узбекистан</option>
                                        <option value="Украина">Украина</option>
                                        <option value="Финляндия">Финляндия</option>
                                        <option value="Франция">Франция</option>
                                        <option value="Хорватия">Хорватия</option>
                                        <option value="Черногория">Черногория</option>
                                        <option value="Чехия">Чехия</option>
                                        <option value="Швейцария">Швейцария</option>
                                        <option value="Швеция">Швеция</option>
                                        <option value="Шри-Ланка">Шри-Ланка</option>
                                        <option value="Эстония">Эстония</option>
                                        <option value="Япония">Япония</option>

';}

                                    elseif($mosConfig_lang == 'romanian') { echo '
											<option value="">- alegeti tara  -</option>
											<option value="Афганистан">Afganistan</option>
											<option value="Албания">Albania</option>

											<option value="Андорра">Andora</option>
											<option value="Армения">Armenia</option>
											<option value="Австрия">Austria</option>
											<option value="Азербайджан">Azerbaijan</option>
											<option value="Беларусь">Belarus</option>
											<option value="Бельгия">Belgia</option>

											<option value="Босния/Герцеговина">Bosnia si Hertegovina</option>
											<option value="Болгария">Bulgaria</option>
											<option value="Канада">Canada</option>
											<option value="Чехия">Cehia</option>
											<option value="Китай">China</option>

											<option value="Кипр">Cipru</option>
											<option value="Северная Корея">Coreea de Nord</option>
											<option value="Южная Корея">Coreea de Sud</option>
											<option value="Хорватия">Crotia</option>
											<option value="Дания">Danemarca</option>

											<option value="Египет">Egipt</option>
											<option value="Швейцария">Elvetia</option>
											<option value="О.А.Э.">Emiratele Arabe</option>
											<option value="Эстония">Estonia</option>
											<option value="Финляндия">Finlanda</option>
											<option value="Франция">Franta</option>

											<option value="Грузия">Georgia</option>
											<option value="Германия">Germania </option>
											<option value="Греция">Grecia</option>
											<option value="Индия">India</option>
											<option value="Иордания">Iordania</option>
											<option value="Ирак">Irak</option>

											<option value="Иран">Iran</option>
											<option value="Ирландия">Irlanda</option>
											<option value="Исландия">Islanda</option>
											<option value="Израиль">Israel</option>
											<option value="Италия">Italia</option>
											<option value="Япония">Japonia</option>

											<option value="Казахстан">Kazahstan</option>
											<option value="Кыргызстан">Kirghizstan</option>
											<option value="Латвия">Letonia</option>
											<option value="Ливан">Liban</option>
											<option value="Литва">Lituania</option>
											<option value="Люксембург">Luxemburg</option>

											<option value="Македония">Macedonia</option>
											<option value="Малайзия">Malaezia</option>
											<option value="Мальта">Malta</option>
											<option value="Великобритания">Marea Britanie</option>
											<option value="Мексика">Mexic</option>
											<option value="Молдова">Moldova</option>

											<option value="Монголия">Mongolia</option>
											<option value="Черногория">Muntenegru</option>
											<option value="Мьянма">Myanma</option>
											<option value="Непал">Nepal</option>
											<option value="Норвегия">Norvegia</option>
											<option value="Нидерланды">Olanda</option>

											<option value="Польша">Polonia</option>
											<option value="Португалия">Portugalia</option>
											<option value="Румыния">Romania</option>
											<option value="Россия">Rusia</option>
											<option value="Сербия">Serbia</option>
											<option value="Бангладеш">Silandia (Bangladesh)</option>

											<option value="Сингапур">Singapore</option>
											<option value="Сирия">Siria</option>
											<option value="Словакия">Slovacia</option>
											<option value="Словения">Slovenia</option>
											<option value="Испания">Spania </option>
											<option value="Шри-Ланка">Sri Lanka</option>

											<option value="США">SUA</option>
											<option value="Швеция">Suedia</option>
											<option value="Тайланд">Tailanda</option>
											<option value="Таджикистан">Tajikistan</option>
											<option value="Нидерланды">Tarile de jos</option>
											<option value="Турция">Turcia</option>

											<option value="Туркменистан">Turkmenistan</option>
											<option value="Украина">Ucraina</option>
											<option value="Венгрия">Ungaria</option>
											<option value="Узбекистан">Uzbekistan</option>
											<option value="Вьетнам">Vietnam</option>
											<option value="Йемен">Yemen</option>
';}



                                    elseif($mosConfig_lang == 'english') { echo '
                                    	<option value="">- choose the country -</option>
											<option value="Афганистан">Afghanistan</option>
											<option value="Азербайджан">Azerbaijan</option>
											<option value="Албания">Albania</option>
											<option value="Андорра">Andorra</option>
											<option value="Армения">Armenia</option>
											<option value="Австрия">Austria</option>

											<option value="Беларусь">Belarus</option>
											<option value="Бельгия">Belgium</option>
											<option value="Босния/Герцеговина">Bosnia &amp; Herzegovina</option>
											<option value="Болгария">Bulgaria</option>
											<option value="Канада">Canada</option>
											<option value="Китай">China</option>

											<option value="Хорватия">Croatia</option>
											<option value="Кипр">Cyprus</option>
											<option value="Чехия">Czech Republic</option>
											<option value="Дания">Denmark</option>
											<option value="Египет">Egypt</option>
											<option value="Эстония">Estonia</option>

											<option value="Финляндия">Finland</option>
											<option value="Франция">France</option>
											<option value="Грузия">Georgia</option>
											<option value="Германия">Germany</option>
											<option value="Греция">Greece</option>
											<option value="Венгрия">Hungary</option>

											<option value="Исландия">Iceland</option>
											<option value="Индия">India</option>
											<option value="Иран">Iran</option>
											<option value="Ирак">Iraq</option>
											<option value="Ирландия">Ireland</option>
											<option value="Израиль">Israel</option>

											<option value="Италия">Italy</option>
											<option value="Япония">Japan</option>
											<option value="Иордания">Jordan</option>
											<option value="Казахстан">Kazakhstan</option>
											<option value="Кыргызстан">Kyrgyzstan</option>
											<option value="Латвия">Latvia</option>

											<option value="Ливан">Lebanon</option>
											<option value="Литва">Lithuania</option>
											<option value="Люксембург">Luxembourg</option>
											<option value="Македония">Macedonia</option>
											<option value="Малайзия">Malaysia</option>
											<option value="Мальта">Malta</option>

											<option value="Мексика">Mexico</option>
											<option value="Молдова">Moldova</option>
											<option value="Монголия">Mongolia</option>
											<option value="Черногория">Montenegro</option>
											<option value="Мьянма">Myanmar</option>
											<option value="Непал">Nepal</option>

											<option value="Нидерланды">Netherlands</option>
											<option value="Нидерланды">Netherlands Antilles</option>
											<option value="Северная Корея">North Korea</option>
											<option value="Кипр">Northern Cyprus</option>
											<option value="Норвегия">Norway</option>
											<option value="Польша">Poland</option>

											<option value="Португалия">Portugal</option>
											<option value="Румыния">Romania</option>
											<option value="Россия">Russia</option>
											<option value="Сингапур">Singapore</option>
											<option value="Словакия">Slovakia</option>
											<option value="Словения">Slovenia</option>

											<option value="Южная Корея">South Korea</option>
											<option value="Испания">Spain</option>
											<option value="Шри-Ланка">Sri Lanka</option>
											<option value="Швеция">Sweden</option>
											<option value="Швейцария">Switzerland</option>
											<option value="Сирия">Syria</option>

											<option value="Таджикистан">Tajikistan</option>
											<option value="Тайланд">Thailand</option>
											<option value="Турция">Turkey</option>
											<option value="Туркменистан">Turkmenistan</option>
											<option value="Украина">Ukraine</option>
											<option value="О.А.Э.">United Arab Emirates</option>

											<option value="Великобритания">United Kingdom</option>
											<option value="США">USA</option>
											<option value="Узбекистан">Uzbekistan</option>
											<option value="Вьетнам">Vietnam</option>
											<option value="Йемен">Yemen (Arab Republic)</option>
';}
?>
			</select>
	</span>
	</td>
</tr>


<tr>
	<td align="left" style="padding-bottom:8px;"><?php if($mosConfig_lang == 'russian') {
	echo 'Город загрузки';}
    elseif($mosConfig_lang == 'romanian') { echo'Oras de incarcare';}
    elseif($mosConfig_lang == 'english') { echo'City of Loading';}
?><span id="export_city_text"></span>
	<select type="select" name="left_cargo_form_export_city" size="1" id="left_cargo_form_export_city"  style="width: 220px" onchange="updateSelect('ignore', this.value, 'left_cargo_form_export_city');">
	<option value="0"><?php if($mosConfig_lang == 'russian') {
	echo '---не имеет значения---';}
    elseif($mosConfig_lang == 'romanian') { echo'---oricare---';}
    elseif($mosConfig_lang == 'english') { echo'---all cities---';}
?></option>
	</select><span id="export_city_type"></span>
	</td>
</tr>


<tr>
	<td align="left" style="padding-bottom:8px;"><?php if($mosConfig_lang == 'russian') {
	echo 'Страна выгрузки';}
	elseif($mosConfig_lang == 'romanian') { echo'Tara de descarcare';}
    elseif($mosConfig_lang == 'english') { echo'Country of unloading';}
 ?> <span style="color: red">*</span>
	<span id="left_cargo_form_select_import">
	<select type="select" name="import_country" size="1" id="import_country" onchange="updateSelect('left_cargo_form_import_city', this.value, 'left_cargo_form_import_city');"  style="width: 220px" >
<?php if($mosConfig_lang == 'russian') { echo '
                                    	<option value="">- укажите страну -</option>
                                        <option value="Австрия">Австрия</option>
                                        <option value="Азербайджан">Азербайджан</option>
                                        <option value="Албания">Албания</option>
                                        <option value="Андорра">Андорра</option>
                                        <option value="Армения">Армения</option>
                                        <option value="Афганистан">Афганистан</option>
                                        <option value="Беларусь">Беларусь</option>
                                        <option value="Бельгия">Бельгия</option>
                                        <option value="Болгария">Болгария</option>
                                        <option value="Босния/Герцеговина">Босния и Герцеговина</option>
                                        <option value="Великобритания">Великобритания</option>
                                        <option value="Венгрия">Венгрия</option>
                                        <option value="Вьетнам">Вьетнам</option>
                                        <option value="Германия">Германия</option>
                                        <option value="Голандия">Голандия</option>
                                        <option value="Греция">Греция</option>
                                        <option value="Грузия">Грузия</option>
                                        <option value="Дания">Дания</option>
                                        <option value="Египет">Египет</option>
                                        <option value="Израиль">Израиль</option>
                                        <option value="Индия">Индия</option>
                                        <option value="Иордания">Иордания</option>
                                        <option value="Ирак">Ирак</option>
                                        <option value="Иран">Иран</option>
                                        <option value="Ирландия">Ирландия</option>
                                        <option value="Исландия">Исландия</option>
                                        <option value="Испания">Испания</option>
                                        <option value="Италия">Италия</option>
                                        <option value="Йемен">Йемен</option>
                                        <option value="Казахстан">Казахстан</option>
                                        <option value="Канада">Канада</option>
                                        <option value="Канада">Канада</option>
                                        <option value="Кипр">Кипр</option>
                                        <option value="Китай">Китай</option>
                                        <option value="Северная Корея">Корея Северная</option>
                                        <option value="Южная Корея">Корея Южная</option>
                                        <option value="Кыргызстан">Кыргызстан</option>
                                        <option value="Латвия">Латвия</option>
                                        <option value="Ливан">Ливан</option>
                                        <option value="Литва">Литва</option>
                                        <option value="Люксембург">Люксембург</option>
                                        <option value="Македония">Македония</option>
                                        <option value="Малайзия">Малайзия</option>
                                        <option value="Мальта">Мальта</option>
                                        <option value="Мексика">Мексика</option>
                                        <option value="Молдова">Молдова</option>
                                        <option value="Монголия">Монголия</option>
                                        <option value="Мьянма">Мьянма</option>
                                        <option value="Непал">Непал</option>
                                        <option value="Нидерланды">Нидерланды</option>
                                        <option value="Норвегия">Норвегия</option>
                                        <option value="О.А.Э.">ОА Эмираты</option>
                                        <option value="Польша">Польша</option>
                                        <option value="Португалия">Португалия</option>
                                        <option value="Россия">Россия</option>
                                        <option value="Румыния">Румыния</option>
                                        <option value="Северный">Северный Кипр</option>
                                        <option value="Сербия">Сербия</option>
                                        <option value="Силандия">Силандия</option>
                                        <option value="Сингапур">Сингапур</option>
                                        <option value="Сирия">Сирия</option>
                                        <option value="Словакия">Словакия</option>
                                        <option value="Словения">Словения</option>
                                        <option value="США">США</option>
                                        <option value="Таджикистан">Таджикистан</option>
                                        <option value="Тайланд">Тайланд</option>
                                        <option value="Туркменистан">Туркменистан</option>
                                        <option value="Турция">Турция</option>
                                        <option value="Узбекистан">Узбекистан</option>
                                        <option value="Украина">Украина</option>
                                        <option value="Финляндия">Финляндия</option>
                                        <option value="Франция">Франция</option>
                                        <option value="Хорватия">Хорватия</option>
                                        <option value="Черногория">Черногория</option>
                                        <option value="Чехия">Чехия</option>
                                        <option value="Швейцария">Швейцария</option>
                                        <option value="Швеция">Швеция</option>
                                        <option value="Шри-Ланка">Шри-Ланка</option>
                                        <option value="Эстония">Эстония</option>
                                        <option value="Япония">Япония</option>

';}

                                    elseif($mosConfig_lang == 'romanian') { echo '
											<option value="">- alegeti tara  -</option>
											<option value="Афганистан">Afganistan</option>
											<option value="Албания">Albania</option>

											<option value="Андорра">Andora</option>
											<option value="Армения">Armenia</option>
											<option value="Австрия">Austria</option>
											<option value="Азербайджан">Azerbaijan</option>
											<option value="Беларусь">Belarus</option>
											<option value="Бельгия">Belgia</option>

											<option value="Босния/Герцеговина">Bosnia si Hertegovina</option>
											<option value="Болгария">Bulgaria</option>
											<option value="Канада">Canada</option>
											<option value="Чехия">Cehia</option>
											<option value="Китай">China</option>

											<option value="Кипр">Cipru</option>
											<option value="Северная Корея">Coreea de Nord</option>
											<option value="Южная Корея">Coreea de Sud</option>
											<option value="Хорватия">Crotia</option>
											<option value="Дания">Danemarca</option>

											<option value="Египет">Egipt</option>
											<option value="Швейцария">Elvetia</option>
											<option value="О.А.Э.">Emiratele Arabe</option>
											<option value="Эстония">Estonia</option>
											<option value="Финляндия">Finlanda</option>
											<option value="Франция">Franta</option>

											<option value="Грузия">Georgia</option>
											<option value="Германия">Germania </option>
											<option value="Греция">Grecia</option>
											<option value="Индия">India</option>
											<option value="Иордания">Iordania</option>
											<option value="Ирак">Irak</option>

											<option value="Иран">Iran</option>
											<option value="Ирландия">Irlanda</option>
											<option value="Исландия">Islanda</option>
											<option value="Израиль">Israel</option>
											<option value="Италия">Italia</option>
											<option value="Япония">Japonia</option>

											<option value="Казахстан">Kazahstan</option>
											<option value="Кыргызстан">Kirghizstan</option>
											<option value="Латвия">Letonia</option>
											<option value="Ливан">Liban</option>
											<option value="Литва">Lituania</option>
											<option value="Люксембург">Luxemburg</option>

											<option value="Македония">Macedonia</option>
											<option value="Малайзия">Malaezia</option>
											<option value="Мальта">Malta</option>
											<option value="Великобритания">Marea Britanie</option>
											<option value="Мексика">Mexic</option>
											<option value="Молдова">Moldova</option>

											<option value="Монголия">Mongolia</option>
											<option value="Черногория">Muntenegru</option>
											<option value="Мьянма">Myanma</option>
											<option value="Непал">Nepal</option>
											<option value="Норвегия">Norvegia</option>
											<option value="Нидерланды">Olanda</option>

											<option value="Польша">Polonia</option>
											<option value="Португалия">Portugalia</option>
											<option value="Румыния">Romania</option>
											<option value="Россия">Rusia</option>
											<option value="Сербия">Serbia</option>
											<option value="Бангладеш">Silandia (Bangladesh)</option>

											<option value="Сингапур">Singapore</option>
											<option value="Сирия">Siria</option>
											<option value="Словакия">Slovacia</option>
											<option value="Словения">Slovenia</option>
											<option value="Испания">Spania </option>
											<option value="Шри-Ланка">Sri Lanka</option>

											<option value="США">SUA</option>
											<option value="Швеция">Suedia</option>
											<option value="Тайланд">Tailanda</option>
											<option value="Таджикистан">Tajikistan</option>
											<option value="Нидерланды">Tarile de jos</option>
											<option value="Турция">Turcia</option>

											<option value="Туркменистан">Turkmenistan</option>
											<option value="Украина">Ucraina</option>
											<option value="Венгрия">Ungaria</option>
											<option value="Узбекистан">Uzbekistan</option>
											<option value="Вьетнам">Vietnam</option>
											<option value="Йемен">Yemen</option>
';}



                                    elseif($mosConfig_lang == 'english') { echo '
                                    	<option value="">- choose the country -</option>
											<option value="Афганистан">Afghanistan</option>
											<option value="Азербайджан">Azerbaijan</option>
											<option value="Албания">Albania</option>
											<option value="Андорра">Andorra</option>
											<option value="Армения">Armenia</option>
											<option value="Австрия">Austria</option>

											<option value="Беларусь">Belarus</option>
											<option value="Бельгия">Belgium</option>
											<option value="Босния/Герцеговина">Bosnia &amp; Herzegovina</option>
											<option value="Болгария">Bulgaria</option>
											<option value="Канада">Canada</option>
											<option value="Китай">China</option>

											<option value="Хорватия">Croatia</option>
											<option value="Кипр">Cyprus</option>
											<option value="Чехия">Czech Republic</option>
											<option value="Дания">Denmark</option>
											<option value="Египет">Egypt</option>
											<option value="Эстония">Estonia</option>

											<option value="Финляндия">Finland</option>
											<option value="Франция">France</option>
											<option value="Грузия">Georgia</option>
											<option value="Германия">Germany</option>
											<option value="Греция">Greece</option>
											<option value="Венгрия">Hungary</option>

											<option value="Исландия">Iceland</option>
											<option value="Индия">India</option>
											<option value="Иран">Iran</option>
											<option value="Ирак">Iraq</option>
											<option value="Ирландия">Ireland</option>
											<option value="Израиль">Israel</option>

											<option value="Италия">Italy</option>
											<option value="Япония">Japan</option>
											<option value="Иордания">Jordan</option>
											<option value="Казахстан">Kazakhstan</option>
											<option value="Кыргызстан">Kyrgyzstan</option>
											<option value="Латвия">Latvia</option>

											<option value="Ливан">Lebanon</option>
											<option value="Литва">Lithuania</option>
											<option value="Люксембург">Luxembourg</option>
											<option value="Македония">Macedonia</option>
											<option value="Малайзия">Malaysia</option>
											<option value="Мальта">Malta</option>

											<option value="Мексика">Mexico</option>
											<option value="Молдова">Moldova</option>
											<option value="Монголия">Mongolia</option>
											<option value="Черногория">Montenegro</option>
											<option value="Мьянма">Myanmar</option>
											<option value="Непал">Nepal</option>

											<option value="Нидерланды">Netherlands</option>
											<option value="Нидерланды">Netherlands Antilles</option>
											<option value="Северная Корея">North Korea</option>
											<option value="Кипр">Northern Cyprus</option>
											<option value="Норвегия">Norway</option>
											<option value="Польша">Poland</option>

											<option value="Португалия">Portugal</option>
											<option value="Румыния">Romania</option>
											<option value="Россия">Russia</option>
											<option value="Сингапур">Singapore</option>
											<option value="Словакия">Slovakia</option>
											<option value="Словения">Slovenia</option>

											<option value="Южная Корея">South Korea</option>
											<option value="Испания">Spain</option>
											<option value="Шри-Ланка">Sri Lanka</option>
											<option value="Швеция">Sweden</option>
											<option value="Швейцария">Switzerland</option>
											<option value="Сирия">Syria</option>

											<option value="Таджикистан">Tajikistan</option>
											<option value="Тайланд">Thailand</option>
											<option value="Турция">Turkey</option>
											<option value="Туркменистан">Turkmenistan</option>
											<option value="Украина">Ukraine</option>
											<option value="О.А.Э.">United Arab Emirates</option>

											<option value="Великобритания">United Kingdom</option>
											<option value="США">USA</option>
											<option value="Узбекистан">Uzbekistan</option>
											<option value="Вьетнам">Vietnam</option>
											<option value="Йемен">Yemen (Arab Republic)</option>
';}
?>
	</select>
	</span>
	</td>
</tr>


<tr>
	<td align="left" style="padding-bottom:8px;"><?php
    if($mosConfig_lang == 'russian') { echo'Город выгрузки';}
    elseif($mosConfig_lang == 'romanian') { echo'Oras de descarcare';}
    elseif($mosConfig_lang == 'english') { echo'City of unloading';}
?><span id="import_city_text"></span>
	<select type="select" name="left_cargo_form_import_city" size="1" id="left_cargo_form_import_city" style="width: 220px" onchange="updateSelect('ignore', this.value, 'left_cargo_form_import_city');">
		<option value="0"><?php if($mosConfig_lang == 'russian') {
	echo '---не имеет значения---';}
    elseif($mosConfig_lang == 'romanian') { echo'---oricare---';}
    elseif($mosConfig_lang == 'english') { echo'---all cities---';}
?></option>
	</select><span id="import_city_type"></span>
	</td>
</tr>


<tr>
	<td style="padding-bottom:8px;"><?php if($mosConfig_lang == 'russian') { echo "Дата погрузки"; }
								elseif ($mosConfig_lang == 'romanian') { echo "Data incarcarii"; }
								elseif ($mosConfig_lang == 'english') { echo "Loading Date"; }
								?> <span style="color: red">*</span>
	<span id="left_cargo_form_date_span"><input readonly="true" type="text" name="left_cargo_form_date_export" size=12 maxlength=19 id="left_cargo_form_date_export"  style="width: 200px"  /><input name="calendar" type="button" onClick="return showCalendar('left_cargo_form_date_export', 'dd-mm-y');" tabindex="105" value="..." style="width: 20px"/></span>
	</td>
</tr>


<tr>
	<td style="padding-bottom:8px;"><?php if($mosConfig_lang == 'russian') {
	echo "Наименование груза"; }
	elseif ($mosConfig_lang == 'romanian') { echo "Denumirea incarcaturii"; }
	elseif ($mosConfig_lang == 'english') { echo "Description of cargo"; }
?> <span style="color: red">*</span>
	<span id="left_cargo_form_select_cargo">
	<select type="select" name="cargo_type" size="1"  style="width: 220px" id="cargo_type">
<?php

 if($mosConfig_lang == 'russian') { echo'
                                            <option value="">- укажите тип груза -</option>
                                            <option value="Автошины">Автошины</option>
                                            <option value="Алкогольные напитки">Алкогольные напитки</option>
                                            <option value="Безалкогольные напитки">Безалкогольные напитки</option>
                                            <option value="Бумага">Бумага</option>
                                            <option value="Бутылки">Бутылки</option>
                                            <option value="Бытовая техника">Бытовая техника</option>
                                            <option value="Бытовая химия">Бытовая химия</option>
                                            <option value="Гофрокартон">Гофрокартон</option>
                                            <option value="Грибы">Грибы</option>
                                            <option value="ДВП">ДВП</option>
                                            <option value="Доски">Доски</option>
                                            <option value="Древесина">Древесина</option>
                                            <option value="Древесный уголь">Древесный уголь</option>
                                            <option value="ДСП">ДСП</option>
                                            <option value="Зерно и семена">Зерно и семена</option>
                                            <option value="Изделия из кожи">Изделия из кожи</option>
                                            <option value="Изделия из металла">Изделия из металла</option>
                                            <option value="Изделия из резины">Изделия из резины</option>
                                            <option value="Кабель">Кабель</option>
                                            <option value="Казеин">Казеин</option>
                                            <option value="Канц. товары">Канц. товары</option>
                                            <option value="Кирпич">Кирпич</option>
                                            <option value="Ковры">Ковры</option>
                                            <option value="Компьютеры">Компьютеры</option>
                                            <option value="Кондитерские изделия">Кондитерские изделия</option>
                                            <option value="Консервы">Консервы</option>
                                            <option value="Контейнер 20фут">Контейнер 20фут</option>
                                            <option value="Контейнер 40фут">Контейнер 40фут</option>
                                            <option value="ЛДСП">ЛДСП</option>
                                            <option value="Макулатура">Макулатура</option>
                                            <option value="Мебель">Мебель</option>
                                            <option value="Медикаменты">Медикаменты</option>
                                            <option value="Металл">Металл</option>
                                            <option value="Металлолом">Металлолом</option>
                                            <option value="Минвата">Минвата</option>
                                            <option value="Молоко сухое">Молоко сухое</option>
                                            <option value="Мороженое">Мороженое</option>
                                            <option value="Мука">Мука</option>
                                            <option value="Мясо">Мясо</option>
                                            <option value="Напитки">Напитки</option>
                                            <option value="Напитки">Напитки</option>
                                            <option value="Нефтепродукты">Нефтепродукты</option>
                                            <option value="Оборудование и части">Оборудование и части</option>
                                            <option value="Обувь">Обувь</option>
                                            <option value="Овощи">Овощи</option>
                                            <option value="Одежда">Одежда</option>
                                            <option value="Парфюмерия и косметика">Парфюмерия и косметика</option>
                                            <option value="Пенопласт">Пенопласт</option>
                                            <option value="Пиво">Пиво</option>
                                            <option value="Пиломатериалы">Пиломатериалы</option>
                                            <option value="Пластик">Пластик</option>
                                            <option value="Поддоны">Поддоны</option>
                                            <option value="Продукты питания">Продукты питания</option>
                                            <option value="Птица">Птица</option>
                                            <option value="Рыба">Рыба</option>
                                            <option value="Сантехника">Сантехника</option>
                                            <option value="Сахар">Сахар</option>
                                            <option value="Сборный груз">Сборный груз</option>
                                            <option value="Соки">Соки</option>
                                            <option value="Стекло и фарфор">Стекло и фарфор</option>
                                            <option value="Стройматериалы">Стройматериалы</option>
                                            <option value="Табачные изделия">Табачные изделия</option>
                                            <option value="Тара и упаковка">Тара и упаковка</option>
                                            <option value="Текстиль">Текстиль</option>
                                            <option value="ТНП">ТНП</option>
                                            <option value="Торф">Торф</option>
                                            <option value="Транспортные средства">Транспортные средства</option>
                                            <option value="Трубы">Трубы</option>
                                            <option value="Удобрения">Удобрения</option>
                                            <option value="Утеплитель">Утеплитель</option>
                                            <option value="Фанера">Фанера</option>
                                            <option value="Фрукты">Фрукты</option>
                                            <option value="Хим. продукты">Хим. продукты</option>
                                            <option value="Хим. продукты неопасные">Хим. продукты неопасные</option>
                                            <option value="Хозтовары">Хозтовары</option>
                                            <option value="Холодильное оборудование">Холодильное оборудование</option>
                                            <option value="Цемент">Цемент</option>
                                            <option value="Чипсы">Чипсы</option>
                                            <option value="Шкуры мокросоленые">Шкуры мокросоленые</option>
                                            <option value="Электроника">Электроника</option>
                                            <option value="Ягоды">Ягоды</option>
                                            <option value="Другой">Другой</option>
                                        </select> ';
									}   elseif($mosConfig_lang == 'english') { echo'
                                            <option value="">- chose the cargo type -</option>
                                            <option value="Автошины">Envelopes</option>
											<option value="Алкогольные напитки">Alcoholic beverage</option>
											<option value="Безалкогольные напитки">Alcohol-free beverage</option>
											<option value="Бумага">Paper</option>
											<option value="Бутылки">Bottles</option>
											<option value="Бытовая техника">Household appliances</option>
											<option value="Бытовая химия">Household chemicals</option>
											<option value="Гофрокартон">Fluted board</option>
											<option value="Грибы">Mushrooms</option>
											<option value="ДВП">Fiber-building boards</option>
											<option value="Доски">Wood boards</option>

											<option value="Древесина">Woody tissue</option>
											<option value="Древесный уголь">Charcoals</option>
											<option value="ДСП">Flake boards</option>
											<option value="Зерно и семена">Grains and seeds</option>
											<option value="Изделия из кожи">Leather goods</option>
											<option value="Изделия из металла">Metal works</option>

											<option value="Изделия из резины">Rubber articles</option>
											<option value="Кабель">Cable</option>
											<option value="Казеин">Casein</option>
											<option value="Канц. товары">Office supplies</option>
											<option value="Кирпич">Bricks</option>
											<option value="Ковры">Carpets</option>

											<option value="Компьютеры">Computers</option>
											<option value="Кондитерские изделия">Confectionery </option>
											<option value="Консервы">Conserves (canned food)</option>
											<option value="Контейнер 20фут">Container of 20 foot</option>
											<option value="Контейнер 40фут">Container of 40 foot</option>
                                            <option value="ЛДСП">Laminated chip board</option>

                                            <option value="Макулатура">Waste paper</option>
                                            <option value="Мебель">Furniture</option>
                                            <option value="Медикаменты">Medicines</option>
                                            <option value="Металл">Metal</option>
                                            <option value="Металлолом">Waste metal</option>
                                            <option value="Минвата">Mineral wool</option>

                                            <option value="Молоко сухое">Milk powder</option>
                                            <option value="Мороженое">Ice-cream</option>
                                            <option value="Мука">Flour </option>
                                            <option value="Мясо">Meat</option>
                                            <option value="Напитки">Beverages</option>
                                            <option value="Нефтепродукты">Oil products</option>

                                            <option value="Оборудование и части">Equipment and spare parts</option>
                                            <option value="Обувь">Shoes</option>
                                            <option value="Овощи">Vegetables </option>
											<option value="Одежда">Clothes </option>
											<option value="Парфюмерия и косметика">Perfumes and makeup</option>
											<option value="Пенопласт">Foamed plastics</option>

											<option value="Пиво">Beer</option>
											<option value="Пиломатериалы">Board lumber</option>
											<option value="Пластик">Plastic</option>
											<option value="Поддоны">Palettes</option>
											<option value="Продукты питания">Food stuff</option>
											<option value="Птица">Poultry</option>

											<option value="Рыба">Fish</option>
											<option value="Сантехника">Plumbing equipment</option>
											<option value="Сахар">Sugar </option>
											<option value="Сборный груз">Joint cargo</option>
											<option value="Соки">Juices</option>
											<option value="Стекло и фарфор">Glass works and porcelain</option>

											<option value="Стройматериалы">Construction materials</option>
											<option value="Табачные изделия">Tobacco products</option>
											<option value="Тара и упаковка">Containers and packages</option>
											<option value="Текстиль">Textile </option>
											<option value="ТНП">Consumer goods</option>
											<option value="Торф">Turf</option>

											<option value="Транспортные средства">Transport vehicles</option>
											<option value="Трубы">Pipes</option>
											<option value="Удобрения">Fertilizer materials</option>
											<option value="Утеплитель">Insulators</option>
											<option value="Фанера">Plywood</option>
											<option value="Фрукты">Fruits</option>

											<option value="Хим. продукты">Chemical products</option>
											<option value="Хим. продукты неопасные">Unhazardous chemical products</option>
											<option value="Хозтовары">Household products</option>
											<option value="Холодильное оборудование">Refrigerating equipment </option>
											<option value="Цемент">Cement</option>
											<option value="Чипсы">Chips</option>

											<option value="Шкуры мокросоленые">Wet-sated hide</option>
											<option value="Электроника">Electronic devices</option>
											<option value="Ягоды">Berries</option>
											<option value="Другой">Other</option>';
										} elseif ($mosConfig_lang == 'romanian') { echo '
                                            <option value="">- indicati tipul de incarcatura -</option>
                                            <option value="Тара и упаковка">Ambalaje</option>
											<option value="Автошины">Anvelope auto</option>
											<option value="Канц. товары">Articole de birou</option>
											<option value="Парфюмерия и косметика">Articole de cosmetica si parfumerie</option>
											<option value="Изделия из резины">Articole din cauciuc</option>

											<option value="Изделия из металла">Articole din metal</option>
											<option value="Изделия из кожи">Articole din piele</option>
											<option value="Напитки">Bauturi</option>
											<option value="Алкогольные напитки">Bauturi alcoolice</option>
											<option value="Безалкогольные напитки">Bauturi nealcoolice</option>
											<option value="Пиво">Bere</option>

											<option value="Бутылки">Butelii</option>
											<option value="Кабель">Cablu</option>
											<option value="Компьютеры">Calculatoare</option>
											<option value="Кирпич">Caramida</option>
											<option value="Древесный уголь">Carbune de lemn</option>
											<option value="Мясо">Carne</option>

											<option value="Гофрокартон">Carton ondulat</option>
											<option value="Зерно и семена">Cereale si seminte</option>
											<option value="Пиломатериалы">Cherestea</option>
											<option value="Чипсы">Chipsuri</option>
											<option value="Цемент">Ciment</option>
											<option value="Грибы">Ciuperci</option>

											<option value="Консервы">Conserve</option>
											<option value="Контейнер 20фут">Container de 20 picioare</option>
											<option value="Контейнер 40фут">Container de 40 picioare</option>
											<option value="Ковры">Covoare</option>
											<option value="Бытовая техника">Electrocasnice</option>
											<option value="Мука">Faina</option>

											<option value="Металлолом">Fier uzat</option>
											<option value="Фрукты">Fructe</option>
											<option value="Бумага">Hartie</option>
											<option value="Утеплитель">Izolant termic</option>
											<option value="Одежда">Imbracaminte</option>

											<option value="Сборный груз">Incarcatura mixta</option>
											<option value="Мороженое">Inghetata</option>
											<option value="Удобрения">Ingrasaminte</option>
											<option value="Молоко сухое">Lapte praf</option>
											<option value="Овощи">Legume</option>
											<option value="Макулатура">Maculatura</option>

											<option value="ТНП">Marfuri de larg consum</option>
											<option value="Хозтовары">Marfuri de uz gospodaresc</option>
											<option value="Древесина">Material lemnos</option>
											<option value="Пластик">Material plastic</option>
											<option value="Пенопласт">Material plastic expandat</option>
											<option value="Стройматериалы">Materiale de constructie</option>

											<option value="Медикаменты">Medicamente</option>
											<option value="Металл">Metal</option>
											<option value="Транспортные средства">Mijloace de transport</option>
											<option value="Мебель">Mobila</option>
											<option value="Птица">Pasari</option>
											<option value="Рыба">Peste</option>

											<option value="Шкуры мокросоленые">Piei crude sarate</option>
											<option value="Оборудование и части">Piese si utilaje</option>
											<option value="Фанера">Placaj</option>
											<option value="ДСП">Placi aglomerate din aschii de lemn</option>
											<option value="ЛДСП">Placi aglomerate din aschii de lemn laminat</option>
											<option value="ДВП">Placi fibrolemnoase</option>

											<option value="Ковры">Platouri</option>
											<option value="Продукты питания">Produse alimentare</option>
											<option value="Хим. продукты">Produse chimice</option>
											<option value="Хим. продукты неопасные">Produse chimice inofensive</option>
											<option value="Бытовая химия">Produse chimice pentru uz casnic</option>
											<option value="Кондитерские изделия">Produse de patiserie</option>

											<option value="Табачные изделия">Produse de tutungerie</option>
											<option value="Нефтепродукты">Produse petroliere</option>
											<option value="Доски">Scandura </option>
											<option value="Стекло и фарфор">Sticla si portelanuri</option>
											<option value="Ягоды">Struguri</option>
											<option value="Соки">Sucuri</option>

											<option value="Электроника">Tehnica electronica</option>
											<option value="Сантехника">Tehnica sanitara</option>
											<option value="Трубы">Tevi</option>
											<option value="Текстиль">Textile</option>
											<option value="Торф">Turba</option>
											<option value="Холодильное оборудование">Utilaj frigorific</option>

											<option value="Минвата">Vata minerala</option>
											<option value="Сахар">Zahar</option>
											<option value="Другой">Altele</option>';
										}
?>
	</select>
	</span>
	</td>
</tr>


<tr>
	<td style="padding-bottom:8px;"><?php if($mosConfig_lang == 'russian') { echo "Объём груза, вес груза"; }
		elseif ($mosConfig_lang == 'romanian') { echo "Volumul si greutatea incarcaturii"; }
		elseif ($mosConfig_lang == 'english') { echo "Cargo size and weight"; }
?> <span style="color: red">*</span>
	<span id="left_cargo_form_select_cargo_size">
	<select type="select" name="cargo_size" size="1"  style="width: 220px"  id="cargo_size">
 <?php if($mosConfig_lang == 'russian') { echo '
                                            <option value="">- выбрать массу/объём -</option>
                                            <option value="до 0,500кг., до 20куб">до 0,500кг., до 20куб.</option>
                                            <option value="до 1т., до 25куб.">до 1т., до 25куб. </option>
                                            <option value="до 3т., до 30куб.">до 3т., до 30куб.</option>
                                            <option value="до 5т., до 50куб.">до 5т., до 50куб.</option>
                                            <option value="до 10т., до 86куб.">до 10т., до 86куб.</option>
                                            <option value="до 20т., до 90куб.">до 20т., до 90куб. </option>
                                            <option value="до 20т., до 120куб.">до 20т., до 120куб. </option>
                                        ';}

                                        elseif ($mosConfig_lang == 'romanian') { echo '
                                            <option value="">- selectati Volumul/greutatea -</option>
											<option value="до 0,500кг., до 20куб.">de la 0,500kg., de la 20cub.</option>
											<option value="до 1т., до 25куб.">de la 1t., de la 25cub. </option>
											<option value="до 3т., до 30куб.">de la 3t., de la 30cub.</option>
											<option value="до 5т., до 50куб.">de la 5t., de la 50cub.</option>

											<option value="до 10т., до 86куб.">de la 10t., de la 86cub.</option>
											<option value="до 20т., до 90куб.">de la 20t., de la 90cub. </option>
											<option value="до 20т., до 120куб.">de la 20t., de la 120cub. </option>
                                        ' ;}

                                        elseif ($mosConfig_lang == 'english') { echo '
                                            <option value="">- choose size/weight -</option>
											<option value="до 0,500кг., до 20куб.">up to 0,500 kg., up to 20 cub</option>
											<option value="до 1т., до 25куб.">up to 1t., up to 25 cub </option>
											<option value="до 3т., до 30куб.">up to 3t., up to 30 cub </option>
											<option value="до 5т., до 50куб.">up to 5t., up to 50 cub</option>

											<option value="до 10т., до 86куб.">up to 10t., up to 86 cub</option>
											<option value="до 20т., до 90куб.">up to 20t., up to 90 cub</option>
											<option value="до 20т., до 120куб.">up to 20t., up to 120 cub </option>
                                        ';}
?>
	</select>
	</span>
	</td>
</tr>


<tr>
	<td style="padding-bottom:8px;"><?php if($mosConfig_lang == 'russian') { echo "Контактное лицо"; }
	elseif ($mosConfig_lang == 'romanian') { echo "Persoana de contact"; }
	elseif ($mosConfig_lang == 'english') { echo "Contact person"; }
?> <span style="color: red">*</span>
	<span id="left_cargo_form_fio_span"><input type="text" name="fio" size="25" id="fio"  style="width: 220px" /></span></td>
</tr>


<tr>
	<td style="padding-bottom:8px;"><div><?php if($mosConfig_lang == 'russian') { echo "Контактный телефон"; }
								elseif ($mosConfig_lang == 'romanian') { echo "Telefon de contact"; }
								elseif ($mosConfig_lang == 'english') { echo "Telephone"; }
								?> <span style="color: red">*</span></div>
	+ <span id="tel_span"><span id="left_cargo_form_telefon_country_code_span"><input type="text" name="telefon_country_code" size="1" maxlength="3" id="telefon_country_code" style="width: 25px" /></span>
	- <span id="left_cargo_form_telefon_city_code_span"><input type="text" name="telefon_city_code" size="2" maxlength="4" id="telefon_city_code" style="width: 30px" /></span>
	- <span id="left_cargo_form_telefon_span"><input type="text" name="telefon" size="15" maxlength="15" id="telefon"  style="width: 125px" /></span></span>
	</td>
</tr>


<tr>
	<td style="padding-bottom:8px;"><div>E-mail<span style="color: red">*</span></div>
	<span id="left_cargo_form_email_span"><input type="text" name="email" size="25"  style="width: 220px" /></span></td>
</tr>


<!--<tr>
	<td style="padding-bottom:8px;"><div>Skype</div> <input type="text" name="skype" size="25"  style="width: 220px" /></td>
</tr>


<tr>
	<td style="padding-bottom:10px;"><div>ICQ</div> <input type="text" name="icq" size="25" style="width: 220px"  /></td>
</tr>-->


<tr>
	<td style="padding-bottom:10px;"><div style="margin-top:5px; margin-bottom:5px;"><span style="color: red">*</span> - <?php if($mosConfig_lang == 'russian') { echo "обязательные поля"; }
								elseif ($mosConfig_lang == 'romanian') { echo "campuri obligatorii"; }
								elseif ($mosConfig_lang == 'english') { echo "required fields"; }
								?></div>
	<div class="button_left"> </div>
	<input type="submit" name="submit" value="<?php if($mosConfig_lang == 'russian') { echo "Заказать"; }
								elseif ($mosConfig_lang == 'romanian') { echo "Comanda"; }
								elseif ($mosConfig_lang == 'english') { echo "Order"; }
								?>" id="submit" style="float:left;background-image:url(<?php echo $tmpTools->baseurl(); ?>/templates/ja_mesolite/images/button_back.png);background-repeat:repeat-x;height:31px;line-height:31px;width:100px;border:0;color:white;"/>
	<div class="button_right"></div>
	</td>
</tr>

</table>
</form>
</div>

<!--   заказ транспорта  END  -->






<!--    Расчитать стоимость перевозки  -->
<h1 onclick="look('calculate_transportation_form'); return false;"><?php if($mosConfig_lang == 'russian') { echo "Расчитать стоимость перевозки"; }
								elseif ($mosConfig_lang == 'romanian') { echo "Calculeaza costul expedierii"; }
								elseif ($mosConfig_lang == 'english') { echo "Calculate cost of transportation"; }
								?></h1>

<div id="calculate_transportation_form">
<p><span id="calculate_transportation_form_err_message" style="color:red"></span></p>
<form action="/index.php?option=com_content&amp;task=view&amp;id=95&amp;form=left_calc" method="POST" name="calculate_transportation_form" onsubmit="return left_cargo_form_parse_info(this, 'calculate_transportation_form_');">
<table border="0" width="100%">

<tr>
	<td align="left" style="padding-bottom:8px;"><?php if($mosConfig_lang == 'russian') { echo "Страна загрузки"; }
	elseif ($mosConfig_lang == 'romanian') { echo "Tara de incarcare"; }
	elseif ($mosConfig_lang == 'english') { echo "Country of loading"; }
?> <span style="color: red">*</span>
	<span id="calculate_transportation_form_select_export">
			<select type="select" name="export_country" size="1" onchange="updateSelect('calculate_transportation_form_export_city', this.value, 'calculate_transportation_form_export_city');" id="export_country"  style="width: 220px" >
<?php if($mosConfig_lang == 'russian') { echo '
                                    	<option value="">- укажите страну -</option>
                                        <option value="Австрия">Австрия</option>
                                        <option value="Азербайджан">Азербайджан</option>
                                        <option value="Албания">Албания</option>
                                        <option value="Андорра">Андорра</option>
                                        <option value="Армения">Армения</option>
                                        <option value="Афганистан">Афганистан</option>
                                        <option value="Беларусь">Беларусь</option>
                                        <option value="Бельгия">Бельгия</option>
                                        <option value="Болгария">Болгария</option>
                                        <option value="Босния/Герцеговина">Босния и Герцеговина</option>
                                        <option value="Великобритания">Великобритания</option>
                                        <option value="Венгрия">Венгрия</option>
                                        <option value="Вьетнам">Вьетнам</option>
                                        <option value="Германия">Германия</option>
                                        <option value="Голандия">Голандия</option>
                                        <option value="Греция">Греция</option>
                                        <option value="Грузия">Грузия</option>
                                        <option value="Дания">Дания</option>
                                        <option value="Египет">Египет</option>
                                        <option value="Израиль">Израиль</option>
                                        <option value="Индия">Индия</option>
                                        <option value="Иордания">Иордания</option>
                                        <option value="Ирак">Ирак</option>
                                        <option value="Иран">Иран</option>
                                        <option value="Ирландия">Ирландия</option>
                                        <option value="Исландия">Исландия</option>
                                        <option value="Испания">Испания</option>
                                        <option value="Италия">Италия</option>
                                        <option value="Йемен">Йемен</option>
                                        <option value="Казахстан">Казахстан</option>
                                        <option value="Канада">Канада</option>
                                        <option value="Канада">Канада</option>
                                        <option value="Кипр">Кипр</option>
                                        <option value="Китай">Китай</option>
                                        <option value="Северная Корея">Корея Северная</option>
                                        <option value="Южная Корея">Корея Южная</option>
                                        <option value="Кыргызстан">Кыргызстан</option>
                                        <option value="Латвия">Латвия</option>
                                        <option value="Ливан">Ливан</option>
                                        <option value="Литва">Литва</option>
                                        <option value="Люксембург">Люксембург</option>
                                        <option value="Македония">Македония</option>
                                        <option value="Малайзия">Малайзия</option>
                                        <option value="Мальта">Мальта</option>
                                        <option value="Мексика">Мексика</option>
                                        <option value="Молдова">Молдова</option>
                                        <option value="Монголия">Монголия</option>
                                        <option value="Мьянма">Мьянма</option>
                                        <option value="Непал">Непал</option>
                                        <option value="Нидерланды">Нидерланды</option>
                                        <option value="Норвегия">Норвегия</option>
                                        <option value="О.А.Э.">ОА Эмираты</option>
                                        <option value="Польша">Польша</option>
                                        <option value="Португалия">Португалия</option>
                                        <option value="Россия">Россия</option>
                                        <option value="Румыния">Румыния</option>
                                        <option value="Северный">Северный Кипр</option>
                                        <option value="Сербия">Сербия</option>
                                        <option value="Силандия">Силандия</option>
                                        <option value="Сингапур">Сингапур</option>
                                        <option value="Сирия">Сирия</option>
                                        <option value="Словакия">Словакия</option>
                                        <option value="Словения">Словения</option>
                                        <option value="США">США</option>
                                        <option value="Таджикистан">Таджикистан</option>
                                        <option value="Тайланд">Тайланд</option>
                                        <option value="Туркменистан">Туркменистан</option>
                                        <option value="Турция">Турция</option>
                                        <option value="Узбекистан">Узбекистан</option>
                                        <option value="Украина">Украина</option>
                                        <option value="Финляндия">Финляндия</option>
                                        <option value="Франция">Франция</option>
                                        <option value="Хорватия">Хорватия</option>
                                        <option value="Черногория">Черногория</option>
                                        <option value="Чехия">Чехия</option>
                                        <option value="Швейцария">Швейцария</option>
                                        <option value="Швеция">Швеция</option>
                                        <option value="Шри-Ланка">Шри-Ланка</option>
                                        <option value="Эстония">Эстония</option>
                                        <option value="Япония">Япония</option>

';}

                                    elseif($mosConfig_lang == 'romanian') { echo '
											<option value="">- alegeti tara  -</option>
											<option value="Афганистан">Afganistan</option>
											<option value="Албания">Albania</option>

											<option value="Андорра">Andora</option>
											<option value="Армения">Armenia</option>
											<option value="Австрия">Austria</option>
											<option value="Азербайджан">Azerbaijan</option>
											<option value="Беларусь">Belarus</option>
											<option value="Бельгия">Belgia</option>

											<option value="Босния/Герцеговина">Bosnia si Hertegovina</option>
											<option value="Болгария">Bulgaria</option>
											<option value="Канада">Canada</option>
											<option value="Чехия">Cehia</option>
											<option value="Китай">China</option>

											<option value="Кипр">Cipru</option>
											<option value="Северная Корея">Coreea de Nord</option>
											<option value="Южная Корея">Coreea de Sud</option>
											<option value="Хорватия">Crotia</option>
											<option value="Дания">Danemarca</option>

											<option value="Египет">Egipt</option>
											<option value="Швейцария">Elvetia</option>
											<option value="О.А.Э.">Emiratele Arabe</option>
											<option value="Эстония">Estonia</option>
											<option value="Финляндия">Finlanda</option>
											<option value="Франция">Franta</option>

											<option value="Грузия">Georgia</option>
											<option value="Германия">Germania </option>
											<option value="Греция">Grecia</option>
											<option value="Индия">India</option>
											<option value="Иордания">Iordania</option>
											<option value="Ирак">Irak</option>

											<option value="Иран">Iran</option>
											<option value="Ирландия">Irlanda</option>
											<option value="Исландия">Islanda</option>
											<option value="Израиль">Israel</option>
											<option value="Италия">Italia</option>
											<option value="Япония">Japonia</option>

											<option value="Казахстан">Kazahstan</option>
											<option value="Кыргызстан">Kirghizstan</option>
											<option value="Латвия">Letonia</option>
											<option value="Ливан">Liban</option>
											<option value="Литва">Lituania</option>
											<option value="Люксембург">Luxemburg</option>

											<option value="Македония">Macedonia</option>
											<option value="Малайзия">Malaezia</option>
											<option value="Мальта">Malta</option>
											<option value="Великобритания">Marea Britanie</option>
											<option value="Мексика">Mexic</option>
											<option value="Молдова">Moldova</option>

											<option value="Монголия">Mongolia</option>
											<option value="Черногория">Muntenegru</option>
											<option value="Мьянма">Myanma</option>
											<option value="Непал">Nepal</option>
											<option value="Норвегия">Norvegia</option>
											<option value="Нидерланды">Olanda</option>

											<option value="Польша">Polonia</option>
											<option value="Португалия">Portugalia</option>
											<option value="Румыния">Romania</option>
											<option value="Россия">Rusia</option>
											<option value="Сербия">Serbia</option>
											<option value="Бангладеш">Silandia (Bangladesh)</option>

											<option value="Сингапур">Singapore</option>
											<option value="Сирия">Siria</option>
											<option value="Словакия">Slovacia</option>
											<option value="Словения">Slovenia</option>
											<option value="Испания">Spania </option>
											<option value="Шри-Ланка">Sri Lanka</option>

											<option value="США">SUA</option>
											<option value="Швеция">Suedia</option>
											<option value="Тайланд">Tailanda</option>
											<option value="Таджикистан">Tajikistan</option>
											<option value="Нидерланды">Tarile de jos</option>
											<option value="Турция">Turcia</option>

											<option value="Туркменистан">Turkmenistan</option>
											<option value="Украина">Ucraina</option>
											<option value="Венгрия">Ungaria</option>
											<option value="Узбекистан">Uzbekistan</option>
											<option value="Вьетнам">Vietnam</option>
											<option value="Йемен">Yemen</option>
';}



                                    elseif($mosConfig_lang == 'english') { echo '
                                    	<option value="">- choose the country -</option>
											<option value="Афганистан">Afghanistan</option>
											<option value="Азербайджан">Azerbaijan</option>
											<option value="Албания">Albania</option>
											<option value="Андорра">Andorra</option>
											<option value="Армения">Armenia</option>
											<option value="Австрия">Austria</option>

											<option value="Беларусь">Belarus</option>
											<option value="Бельгия">Belgium</option>
											<option value="Босния/Герцеговина">Bosnia &amp; Herzegovina</option>
											<option value="Болгария">Bulgaria</option>
											<option value="Канада">Canada</option>
											<option value="Китай">China</option>

											<option value="Хорватия">Croatia</option>
											<option value="Кипр">Cyprus</option>
											<option value="Чехия">Czech Republic</option>
											<option value="Дания">Denmark</option>
											<option value="Египет">Egypt</option>
											<option value="Эстония">Estonia</option>

											<option value="Финляндия">Finland</option>
											<option value="Франция">France</option>
											<option value="Грузия">Georgia</option>
											<option value="Германия">Germany</option>
											<option value="Греция">Greece</option>
											<option value="Венгрия">Hungary</option>

											<option value="Исландия">Iceland</option>
											<option value="Индия">India</option>
											<option value="Иран">Iran</option>
											<option value="Ирак">Iraq</option>
											<option value="Ирландия">Ireland</option>
											<option value="Израиль">Israel</option>

											<option value="Италия">Italy</option>
											<option value="Япония">Japan</option>
											<option value="Иордания">Jordan</option>
											<option value="Казахстан">Kazakhstan</option>
											<option value="Кыргызстан">Kyrgyzstan</option>
											<option value="Латвия">Latvia</option>

											<option value="Ливан">Lebanon</option>
											<option value="Литва">Lithuania</option>
											<option value="Люксембург">Luxembourg</option>
											<option value="Македония">Macedonia</option>
											<option value="Малайзия">Malaysia</option>
											<option value="Мальта">Malta</option>

											<option value="Мексика">Mexico</option>
											<option value="Молдова">Moldova</option>
											<option value="Монголия">Mongolia</option>
											<option value="Черногория">Montenegro</option>
											<option value="Мьянма">Myanmar</option>
											<option value="Непал">Nepal</option>

											<option value="Нидерланды">Netherlands</option>
											<option value="Нидерланды">Netherlands Antilles</option>
											<option value="Северная Корея">North Korea</option>
											<option value="Кипр">Northern Cyprus</option>
											<option value="Норвегия">Norway</option>
											<option value="Польша">Poland</option>

											<option value="Португалия">Portugal</option>
											<option value="Румыния">Romania</option>
											<option value="Россия">Russia</option>
											<option value="Сингапур">Singapore</option>
											<option value="Словакия">Slovakia</option>
											<option value="Словения">Slovenia</option>

											<option value="Южная Корея">South Korea</option>
											<option value="Испания">Spain</option>
											<option value="Шри-Ланка">Sri Lanka</option>
											<option value="Швеция">Sweden</option>
											<option value="Швейцария">Switzerland</option>
											<option value="Сирия">Syria</option>

											<option value="Таджикистан">Tajikistan</option>
											<option value="Тайланд">Thailand</option>
											<option value="Турция">Turkey</option>
											<option value="Туркменистан">Turkmenistan</option>
											<option value="Украина">Ukraine</option>
											<option value="О.А.Э.">United Arab Emirates</option>

											<option value="Великобритания">United Kingdom</option>
											<option value="США">USA</option>
											<option value="Узбекистан">Uzbekistan</option>
											<option value="Вьетнам">Vietnam</option>
											<option value="Йемен">Yemen (Arab Republic)</option>
';}
?>
			</select>
	</span>
	</td>
</tr>


<tr>
	<td align="left" style="padding-bottom:8px;"><?php if($mosConfig_lang == 'russian') {
	echo 'Город загрузки';}
    elseif($mosConfig_lang == 'romanian') { echo'Oras de incarcare';}
    elseif($mosConfig_lang == 'english') { echo'City of Loading';}
?><span id="export_city_text"></span>
	<select type="select" name="calculate_transportation_form_export_city" size="1" id="calculate_transportation_form_export_city"  style="width: 220px" onchange="updateSelect('ignore', this.value, 'calculate_transportation_form_export_city');">
	<option value="0"><?php if($mosConfig_lang == 'russian') {
	echo '---не имеет значения---';}
    elseif($mosConfig_lang == 'romanian') { echo'---oricare---';}
    elseif($mosConfig_lang == 'english') { echo'---all cities---';}
?></option>
	</select><span id="export_city_type"></span>
	</td>
</tr>


<tr>
	<td align="left" style="padding-bottom:8px;"><?php if($mosConfig_lang == 'russian') {
	echo 'Страна выгрузки';}
	elseif($mosConfig_lang == 'romanian') { echo'Tara de descarcare';}
    elseif($mosConfig_lang == 'english') { echo'Country of unloading';}
 ?> <span style="color: red">*</span>
	<span id="calculate_transportation_form_select_import">
	<select type="select" name="import_country" size="1" id="import_country" onchange="updateSelect('calculate_transportation_form_import_city', this.value, 'calculate_transportation_form_import_city');"  style="width: 220px" >
<?php if($mosConfig_lang == 'russian') { echo '
                                    	<option value="">- укажите страну -</option>
                                        <option value="Австрия">Австрия</option>
                                        <option value="Азербайджан">Азербайджан</option>
                                        <option value="Албания">Албания</option>
                                        <option value="Андорра">Андорра</option>
                                        <option value="Армения">Армения</option>
                                        <option value="Афганистан">Афганистан</option>
                                        <option value="Беларусь">Беларусь</option>
                                        <option value="Бельгия">Бельгия</option>
                                        <option value="Болгария">Болгария</option>
                                        <option value="Босния/Герцеговина">Босния и Герцеговина</option>
                                        <option value="Великобритания">Великобритания</option>
                                        <option value="Венгрия">Венгрия</option>
                                        <option value="Вьетнам">Вьетнам</option>
                                        <option value="Германия">Германия</option>
                                        <option value="Голандия">Голандия</option>
                                        <option value="Греция">Греция</option>
                                        <option value="Грузия">Грузия</option>
                                        <option value="Дания">Дания</option>
                                        <option value="Египет">Египет</option>
                                        <option value="Израиль">Израиль</option>
                                        <option value="Индия">Индия</option>
                                        <option value="Иордания">Иордания</option>
                                        <option value="Ирак">Ирак</option>
                                        <option value="Иран">Иран</option>
                                        <option value="Ирландия">Ирландия</option>
                                        <option value="Исландия">Исландия</option>
                                        <option value="Испания">Испания</option>
                                        <option value="Италия">Италия</option>
                                        <option value="Йемен">Йемен</option>
                                        <option value="Казахстан">Казахстан</option>
                                        <option value="Канада">Канада</option>
                                        <option value="Канада">Канада</option>
                                        <option value="Кипр">Кипр</option>
                                        <option value="Китай">Китай</option>
                                        <option value="Северная Корея">Корея Северная</option>
                                        <option value="Южная Корея">Корея Южная</option>
                                        <option value="Кыргызстан">Кыргызстан</option>
                                        <option value="Латвия">Латвия</option>
                                        <option value="Ливан">Ливан</option>
                                        <option value="Литва">Литва</option>
                                        <option value="Люксембург">Люксембург</option>
                                        <option value="Македония">Македония</option>
                                        <option value="Малайзия">Малайзия</option>
                                        <option value="Мальта">Мальта</option>
                                        <option value="Мексика">Мексика</option>
                                        <option value="Молдова">Молдова</option>
                                        <option value="Монголия">Монголия</option>
                                        <option value="Мьянма">Мьянма</option>
                                        <option value="Непал">Непал</option>
                                        <option value="Нидерланды">Нидерланды</option>
                                        <option value="Норвегия">Норвегия</option>
                                        <option value="О.А.Э.">ОА Эмираты</option>
                                        <option value="Польша">Польша</option>
                                        <option value="Португалия">Португалия</option>
                                        <option value="Россия">Россия</option>
                                        <option value="Румыния">Румыния</option>
                                        <option value="Северный">Северный Кипр</option>
                                        <option value="Сербия">Сербия</option>
                                        <option value="Силандия">Силандия</option>
                                        <option value="Сингапур">Сингапур</option>
                                        <option value="Сирия">Сирия</option>
                                        <option value="Словакия">Словакия</option>
                                        <option value="Словения">Словения</option>
                                        <option value="США">США</option>
                                        <option value="Таджикистан">Таджикистан</option>
                                        <option value="Тайланд">Тайланд</option>
                                        <option value="Туркменистан">Туркменистан</option>
                                        <option value="Турция">Турция</option>
                                        <option value="Узбекистан">Узбекистан</option>
                                        <option value="Украина">Украина</option>
                                        <option value="Финляндия">Финляндия</option>
                                        <option value="Франция">Франция</option>
                                        <option value="Хорватия">Хорватия</option>
                                        <option value="Черногория">Черногория</option>
                                        <option value="Чехия">Чехия</option>
                                        <option value="Швейцария">Швейцария</option>
                                        <option value="Швеция">Швеция</option>
                                        <option value="Шри-Ланка">Шри-Ланка</option>
                                        <option value="Эстония">Эстония</option>
                                        <option value="Япония">Япония</option>

';}

                                    elseif($mosConfig_lang == 'romanian') { echo '
											<option value="">- alegeti tara  -</option>
											<option value="Афганистан">Afganistan</option>
											<option value="Албания">Albania</option>

											<option value="Андорра">Andora</option>
											<option value="Армения">Armenia</option>
											<option value="Австрия">Austria</option>
											<option value="Азербайджан">Azerbaijan</option>
											<option value="Беларусь">Belarus</option>
											<option value="Бельгия">Belgia</option>

											<option value="Босния/Герцеговина">Bosnia si Hertegovina</option>
											<option value="Болгария">Bulgaria</option>
											<option value="Канада">Canada</option>
											<option value="Чехия">Cehia</option>
											<option value="Китай">China</option>

											<option value="Кипр">Cipru</option>
											<option value="Северная Корея">Coreea de Nord</option>
											<option value="Южная Корея">Coreea de Sud</option>
											<option value="Хорватия">Crotia</option>
											<option value="Дания">Danemarca</option>

											<option value="Египет">Egipt</option>
											<option value="Швейцария">Elvetia</option>
											<option value="О.А.Э.">Emiratele Arabe</option>
											<option value="Эстония">Estonia</option>
											<option value="Финляндия">Finlanda</option>
											<option value="Франция">Franta</option>

											<option value="Грузия">Georgia</option>
											<option value="Германия">Germania </option>
											<option value="Греция">Grecia</option>
											<option value="Индия">India</option>
											<option value="Иордания">Iordania</option>
											<option value="Ирак">Irak</option>

											<option value="Иран">Iran</option>
											<option value="Ирландия">Irlanda</option>
											<option value="Исландия">Islanda</option>
											<option value="Израиль">Israel</option>
											<option value="Италия">Italia</option>
											<option value="Япония">Japonia</option>

											<option value="Казахстан">Kazahstan</option>
											<option value="Кыргызстан">Kirghizstan</option>
											<option value="Латвия">Letonia</option>
											<option value="Ливан">Liban</option>
											<option value="Литва">Lituania</option>
											<option value="Люксембург">Luxemburg</option>

											<option value="Македония">Macedonia</option>
											<option value="Малайзия">Malaezia</option>
											<option value="Мальта">Malta</option>
											<option value="Великобритания">Marea Britanie</option>
											<option value="Мексика">Mexic</option>
											<option value="Молдова">Moldova</option>

											<option value="Монголия">Mongolia</option>
											<option value="Черногория">Muntenegru</option>
											<option value="Мьянма">Myanma</option>
											<option value="Непал">Nepal</option>
											<option value="Норвегия">Norvegia</option>
											<option value="Нидерланды">Olanda</option>

											<option value="Польша">Polonia</option>
											<option value="Португалия">Portugalia</option>
											<option value="Румыния">Romania</option>
											<option value="Россия">Rusia</option>
											<option value="Сербия">Serbia</option>
											<option value="Бангладеш">Silandia (Bangladesh)</option>

											<option value="Сингапур">Singapore</option>
											<option value="Сирия">Siria</option>
											<option value="Словакия">Slovacia</option>
											<option value="Словения">Slovenia</option>
											<option value="Испания">Spania </option>
											<option value="Шри-Ланка">Sri Lanka</option>

											<option value="США">SUA</option>
											<option value="Швеция">Suedia</option>
											<option value="Тайланд">Tailanda</option>
											<option value="Таджикистан">Tajikistan</option>
											<option value="Нидерланды">Tarile de jos</option>
											<option value="Турция">Turcia</option>

											<option value="Туркменистан">Turkmenistan</option>
											<option value="Украина">Ucraina</option>
											<option value="Венгрия">Ungaria</option>
											<option value="Узбекистан">Uzbekistan</option>
											<option value="Вьетнам">Vietnam</option>
											<option value="Йемен">Yemen</option>
';}



                                    elseif($mosConfig_lang == 'english') { echo '
                                    	<option value="">- choose the country -</option>
											<option value="Афганистан">Afghanistan</option>
											<option value="Азербайджан">Azerbaijan</option>
											<option value="Албания">Albania</option>
											<option value="Андорра">Andorra</option>
											<option value="Армения">Armenia</option>
											<option value="Австрия">Austria</option>

											<option value="Беларусь">Belarus</option>
											<option value="Бельгия">Belgium</option>
											<option value="Босния/Герцеговина">Bosnia &amp; Herzegovina</option>
											<option value="Болгария">Bulgaria</option>
											<option value="Канада">Canada</option>
											<option value="Китай">China</option>

											<option value="Хорватия">Croatia</option>
											<option value="Кипр">Cyprus</option>
											<option value="Чехия">Czech Republic</option>
											<option value="Дания">Denmark</option>
											<option value="Египет">Egypt</option>
											<option value="Эстония">Estonia</option>

											<option value="Финляндия">Finland</option>
											<option value="Франция">France</option>
											<option value="Грузия">Georgia</option>
											<option value="Германия">Germany</option>
											<option value="Греция">Greece</option>
											<option value="Венгрия">Hungary</option>

											<option value="Исландия">Iceland</option>
											<option value="Индия">India</option>
											<option value="Иран">Iran</option>
											<option value="Ирак">Iraq</option>
											<option value="Ирландия">Ireland</option>
											<option value="Израиль">Israel</option>

											<option value="Италия">Italy</option>
											<option value="Япония">Japan</option>
											<option value="Иордания">Jordan</option>
											<option value="Казахстан">Kazakhstan</option>
											<option value="Кыргызстан">Kyrgyzstan</option>
											<option value="Латвия">Latvia</option>

											<option value="Ливан">Lebanon</option>
											<option value="Литва">Lithuania</option>
											<option value="Люксембург">Luxembourg</option>
											<option value="Македония">Macedonia</option>
											<option value="Малайзия">Malaysia</option>
											<option value="Мальта">Malta</option>

											<option value="Мексика">Mexico</option>
											<option value="Молдова">Moldova</option>
											<option value="Монголия">Mongolia</option>
											<option value="Черногория">Montenegro</option>
											<option value="Мьянма">Myanmar</option>
											<option value="Непал">Nepal</option>

											<option value="Нидерланды">Netherlands</option>
											<option value="Нидерланды">Netherlands Antilles</option>
											<option value="Северная Корея">North Korea</option>
											<option value="Кипр">Northern Cyprus</option>
											<option value="Норвегия">Norway</option>
											<option value="Польша">Poland</option>

											<option value="Португалия">Portugal</option>
											<option value="Румыния">Romania</option>
											<option value="Россия">Russia</option>
											<option value="Сингапур">Singapore</option>
											<option value="Словакия">Slovakia</option>
											<option value="Словения">Slovenia</option>

											<option value="Южная Корея">South Korea</option>
											<option value="Испания">Spain</option>
											<option value="Шри-Ланка">Sri Lanka</option>
											<option value="Швеция">Sweden</option>
											<option value="Швейцария">Switzerland</option>
											<option value="Сирия">Syria</option>

											<option value="Таджикистан">Tajikistan</option>
											<option value="Тайланд">Thailand</option>
											<option value="Турция">Turkey</option>
											<option value="Туркменистан">Turkmenistan</option>
											<option value="Украина">Ukraine</option>
											<option value="О.А.Э.">United Arab Emirates</option>

											<option value="Великобритания">United Kingdom</option>
											<option value="США">USA</option>
											<option value="Узбекистан">Uzbekistan</option>
											<option value="Вьетнам">Vietnam</option>
											<option value="Йемен">Yemen (Arab Republic)</option>
';}
?>
	</select>
	</span>
	</td>
</tr>


<tr>
	<td align="left" style="padding-bottom:8px;"><?php
    if($mosConfig_lang == 'russian') { echo'Город выгрузки';}
    elseif($mosConfig_lang == 'romanian') { echo'Oras de descarcare';}
    elseif($mosConfig_lang == 'english') { echo'City of unloading';}
?><span id="import_city_text"></span>
	<select type="select" name="calculate_transportation_form_import_city" size="1" id="calculate_transportation_form_import_city" style="width: 220px" onchange="updateSelect('ignore', this.value, 'calculate_transportation_form_import_city');">
		<option value="0"><?php if($mosConfig_lang == 'russian') {
	echo '---не имеет значения---';}
    elseif($mosConfig_lang == 'romanian') { echo'---oricare---';}
    elseif($mosConfig_lang == 'english') { echo'---all cities---';}
?></option>
	</select><span id="import_city_type"></span>
	</td>
</tr>


<tr>
	<td style="padding-bottom:8px;"><?php if($mosConfig_lang == 'russian') { echo "Дата погрузки"; }
								elseif ($mosConfig_lang == 'romanian') { echo "Data incarcarii"; }
								elseif ($mosConfig_lang == 'english') { echo "Loading Date"; }
								?> <span style="color: red">*</span>
	<span id="calculate_transportation_form_date_span"><input readonly="true" type="text" name="calculate_transportation_form_date_export" size="12" maxlength="19" id="calculate_transportation_form_date_export"  style="width: 200px"  /><input name="calendar" type="button" onClick="return showCalendar('calculate_transportation_form_date_export', 'dd-mm-y');" tabindex="105" value="..." style="width: 20px"/></span>
	</td>
</tr>

<tr>
	<td style="padding-bottom:8px;"><?php if($mosConfig_lang == 'russian') { echo "Тип транспорта"; }
	elseif ($mosConfig_lang == 'romanian') { echo "Tipul de transport"; }
	elseif ($mosConfig_lang == 'english') { echo "Transport type"; }
?> <span style="color: red">*</span>
	<span id="calculate_transportation_form_select_transport">
	<select type="select" name="type_transport" size="1" style="width: 220px" id="type_transport">
<?php if($mosConfig_lang == 'russian') { echo '
                                    	<option value="">- укажите тип транспорта -</option>
                                    	<option value="Тентованный Полуприцеп">Тентованный Полуприцеп</option>
                                        <option value="Рефрижератор">Рефрижератор</option>
                                        <option value="Автопоезд с прицепом тентованный">Автопоезд с прицепом тентованный</option>
                                        <option value="Мегатрейлер Полуприцеп тенованный">Мегатрейлер Полуприцеп тенованный</option>
                                        <option value="Юмбо платформа полуприцеп">Юмбо платформа полуприцеп</option>
                                        <option value="Автовоз-трейлер с прицепом">Автовоз-трейлер с прицепом</option>
                                        <option value="Трейлер трал-платформа">Трейлер трал-платформа  </option>
                                        <option value="Контейнеровоз полуприцеп">Контейнеровоз полуприцеп</option>
                                        <option value="Изотерм или Цельномет.">Изотерм или Цельномет.</option>
                                        <option value="Перевозки Опасного груза ADR">Перевозки Опасного груза ADR</option>
                                        <option value="Перевозки Сборного груза">Перевозки Сборного груза</option>
                                        <option value="Самосвал">Самосвал</option>
                                        <option value="Цистерна бочка, термос">Цистерна бочка, термос</option>
                                        <option value="Морские перевозки">Морские перевозки</option>
										<option value="Другой">Другой</option>
';}
                                          elseif ($mosConfig_lang == 'romanian') { echo '
										<option value="">- indicati tipul transportului -</option>
										<option value="Самосвал">Autobasculanta</option>
										<option value="Автовоз-трейлер с прицепом">Autotrailer cu remorca</option>

										<option value="Автопоезд с прицепом тентованный">Autotren cu remorca cu prelata</option>
										<option value="Изотерм или Цельномет.">Bena metalica sau izoterma</option>
										<option value="Рефрижератор">Camion frigorific</option>
										<option value="Цистерна бочка, термос">Cisterna cilindru, termos</option>
										<option value="Контейнеровоз полуприцеп">Container auto cu semiremorca</option>
										<option value="Мегатрейлер Полуприцеп тенованный">Mega trailer semiremorca cu prelata</option>

										<option value="Трейлер трал-платформа">Remorca carosata cu platforma de tractare</option>
										<option value="Тентованный Полуприцеп">Semiremorca cu prelata</option>
										<option value="Юмбо платформа полуприцеп">Semiremorca Jumbo carosata</option>
										<option value="Перевозки Сборного груза">Transportare incarcaturi mixte</option>
										<option value="Перевозки Опасного груза ADR">Transportare marfuri periculoase ADR</option>
										<option value="Морские перевозки">Transporturi maritime</option>
										<option value="Другой">Altul</option>
  ';}
                                        elseif ($mosConfig_lang == 'english') { echo  '
										<option value="">- choose transport type -</option>
                                    	<option value="Тентованный Полуприцеп">Tilt-covered semi-trailer</option>
										<option value="Рефрижератор">Refrigerated trailer</option>
										<option value="Автопоезд с прицепом тентованный">Tilt-covered road train with a trailer </option>
										<option value="Мегатрейлер Полуприцеп тенованный">Tilt-covered mega trailer </option>

										<option value="Юмбо платформа полуприцеп">Semi-trailer with Yumbo platform</option>
										<option value="Автовоз-трейлер с прицепом">Car hauler with a trailer </option>
										<option value="Трейлер трал-платформа">Troll-platform trailer </option>
										<option value="Контейнеровоз полуприцеп">Container semi-truck </option>
										<option value="Изотерм или Цельномет.">All-metal and insulated trailer </option>
										<option value="Перевозки Опасного груза ADR">ADR transportations</option>
										<option value="Перевозки Сборного груза">Joint cargo transportations</option>

										<option value="Самосвал">Tipper</option>
										<option value="Цистерна бочка, термос">Insulated tanker </option>
										<option value="Морские перевозки">Sea freight </option>
										<option value="Другой">Other</option>
';}
?>
	</select>
	</span>
	</td>
</tr>

<tr>
	<td style="padding-bottom:8px;"><?php if($mosConfig_lang == 'russian') {
	echo "Наименование груза"; }
	elseif ($mosConfig_lang == 'romanian') { echo "Denumirea incarcaturii"; }
	elseif ($mosConfig_lang == 'english') { echo "Description of cargo"; }
?> <span style="color: red">*</span>
	<span id="calculate_transportation_form_select_cargo">
	<select type="select" name="cargo_type" size="1"  style="width: 220px" id="cargo_type">
<?php

 if($mosConfig_lang == 'russian') { echo'
                                            <option value="">- укажите тип груза -</option>
                                            <option value="Автошины">Автошины</option>
                                            <option value="Алкогольные напитки">Алкогольные напитки</option>
                                            <option value="Безалкогольные напитки">Безалкогольные напитки</option>
                                            <option value="Бумага">Бумага</option>
                                            <option value="Бутылки">Бутылки</option>
                                            <option value="Бытовая техника">Бытовая техника</option>
                                            <option value="Бытовая химия">Бытовая химия</option>
                                            <option value="Гофрокартон">Гофрокартон</option>
                                            <option value="Грибы">Грибы</option>
                                            <option value="ДВП">ДВП</option>
                                            <option value="Доски">Доски</option>
                                            <option value="Древесина">Древесина</option>
                                            <option value="Древесный уголь">Древесный уголь</option>
                                            <option value="ДСП">ДСП</option>
                                            <option value="Зерно и семена">Зерно и семена</option>
                                            <option value="Изделия из кожи">Изделия из кожи</option>
                                            <option value="Изделия из металла">Изделия из металла</option>
                                            <option value="Изделия из резины">Изделия из резины</option>
                                            <option value="Кабель">Кабель</option>
                                            <option value="Казеин">Казеин</option>
                                            <option value="Канц. товары">Канц. товары</option>
                                            <option value="Кирпич">Кирпич</option>
                                            <option value="Ковры">Ковры</option>
                                            <option value="Компьютеры">Компьютеры</option>
                                            <option value="Кондитерские изделия">Кондитерские изделия</option>
                                            <option value="Консервы">Консервы</option>
                                            <option value="Контейнер 20фут">Контейнер 20фут</option>
                                            <option value="Контейнер 40фут">Контейнер 40фут</option>
                                            <option value="ЛДСП">ЛДСП</option>
                                            <option value="Макулатура">Макулатура</option>
                                            <option value="Мебель">Мебель</option>
                                            <option value="Медикаменты">Медикаменты</option>
                                            <option value="Металл">Металл</option>
                                            <option value="Металлолом">Металлолом</option>
                                            <option value="Минвата">Минвата</option>
                                            <option value="Молоко сухое">Молоко сухое</option>
                                            <option value="Мороженое">Мороженое</option>
                                            <option value="Мука">Мука</option>
                                            <option value="Мясо">Мясо</option>
                                            <option value="Напитки">Напитки</option>
                                            <option value="Напитки">Напитки</option>
                                            <option value="Нефтепродукты">Нефтепродукты</option>
                                            <option value="Оборудование и части">Оборудование и части</option>
                                            <option value="Обувь">Обувь</option>
                                            <option value="Овощи">Овощи</option>
                                            <option value="Одежда">Одежда</option>
                                            <option value="Парфюмерия и косметика">Парфюмерия и косметика</option>
                                            <option value="Пенопласт">Пенопласт</option>
                                            <option value="Пиво">Пиво</option>
                                            <option value="Пиломатериалы">Пиломатериалы</option>
                                            <option value="Пластик">Пластик</option>
                                            <option value="Поддоны">Поддоны</option>
                                            <option value="Продукты питания">Продукты питания</option>
                                            <option value="Птица">Птица</option>
                                            <option value="Рыба">Рыба</option>
                                            <option value="Сантехника">Сантехника</option>
                                            <option value="Сахар">Сахар</option>
                                            <option value="Сборный груз">Сборный груз</option>
                                            <option value="Соки">Соки</option>
                                            <option value="Стекло и фарфор">Стекло и фарфор</option>
                                            <option value="Стройматериалы">Стройматериалы</option>
                                            <option value="Табачные изделия">Табачные изделия</option>
                                            <option value="Тара и упаковка">Тара и упаковка</option>
                                            <option value="Текстиль">Текстиль</option>
                                            <option value="ТНП">ТНП</option>
                                            <option value="Торф">Торф</option>
                                            <option value="Транспортные средства">Транспортные средства</option>
                                            <option value="Трубы">Трубы</option>
                                            <option value="Удобрения">Удобрения</option>
                                            <option value="Утеплитель">Утеплитель</option>
                                            <option value="Фанера">Фанера</option>
                                            <option value="Фрукты">Фрукты</option>
                                            <option value="Хим. продукты">Хим. продукты</option>
                                            <option value="Хим. продукты неопасные">Хим. продукты неопасные</option>
                                            <option value="Хозтовары">Хозтовары</option>
                                            <option value="Холодильное оборудование">Холодильное оборудование</option>
                                            <option value="Цемент">Цемент</option>
                                            <option value="Чипсы">Чипсы</option>
                                            <option value="Шкуры мокросоленые">Шкуры мокросоленые</option>
                                            <option value="Электроника">Электроника</option>
                                            <option value="Ягоды">Ягоды</option>
                                            <option value="Другой">Другой</option>
                                        </select> ';
									}   elseif($mosConfig_lang == 'english') { echo'
                                            <option value="">- chose the cargo type -</option>
                                            <option value="Автошины">Envelopes</option>
											<option value="Алкогольные напитки">Alcoholic beverage</option>
											<option value="Безалкогольные напитки">Alcohol-free beverage</option>
											<option value="Бумага">Paper</option>
											<option value="Бутылки">Bottles</option>
											<option value="Бытовая техника">Household appliances</option>
											<option value="Бытовая химия">Household chemicals</option>
											<option value="Гофрокартон">Fluted board</option>
											<option value="Грибы">Mushrooms</option>
											<option value="ДВП">Fiber-building boards</option>
											<option value="Доски">Wood boards</option>

											<option value="Древесина">Woody tissue</option>
											<option value="Древесный уголь">Charcoals</option>
											<option value="ДСП">Flake boards</option>
											<option value="Зерно и семена">Grains and seeds</option>
											<option value="Изделия из кожи">Leather goods</option>
											<option value="Изделия из металла">Metal works</option>

											<option value="Изделия из резины">Rubber articles</option>
											<option value="Кабель">Cable</option>
											<option value="Казеин">Casein</option>
											<option value="Канц. товары">Office supplies</option>
											<option value="Кирпич">Bricks</option>
											<option value="Ковры">Carpets</option>

											<option value="Компьютеры">Computers</option>
											<option value="Кондитерские изделия">Confectionery </option>
											<option value="Консервы">Conserves (canned food)</option>
											<option value="Контейнер 20фут">Container of 20 foot</option>
											<option value="Контейнер 40фут">Container of 40 foot</option>
                                            <option value="ЛДСП">Laminated chip board</option>

                                            <option value="Макулатура">Waste paper</option>
                                            <option value="Мебель">Furniture</option>
                                            <option value="Медикаменты">Medicines</option>
                                            <option value="Металл">Metal</option>
                                            <option value="Металлолом">Waste metal</option>
                                            <option value="Минвата">Mineral wool</option>

                                            <option value="Молоко сухое">Milk powder</option>
                                            <option value="Мороженое">Ice-cream</option>
                                            <option value="Мука">Flour </option>
                                            <option value="Мясо">Meat</option>
                                            <option value="Напитки">Beverages</option>
                                            <option value="Нефтепродукты">Oil products</option>

                                            <option value="Оборудование и части">Equipment and spare parts</option>
                                            <option value="Обувь">Shoes</option>
                                            <option value="Овощи">Vegetables </option>
											<option value="Одежда">Clothes </option>
											<option value="Парфюмерия и косметика">Perfumes and makeup</option>
											<option value="Пенопласт">Foamed plastics</option>

											<option value="Пиво">Beer</option>
											<option value="Пиломатериалы">Board lumber</option>
											<option value="Пластик">Plastic</option>
											<option value="Поддоны">Palettes</option>
											<option value="Продукты питания">Food stuff</option>
											<option value="Птица">Poultry</option>

											<option value="Рыба">Fish</option>
											<option value="Сантехника">Plumbing equipment</option>
											<option value="Сахар">Sugar </option>
											<option value="Сборный груз">Joint cargo</option>
											<option value="Соки">Juices</option>
											<option value="Стекло и фарфор">Glass works and porcelain</option>

											<option value="Стройматериалы">Construction materials</option>
											<option value="Табачные изделия">Tobacco products</option>
											<option value="Тара и упаковка">Containers and packages</option>
											<option value="Текстиль">Textile </option>
											<option value="ТНП">Consumer goods</option>
											<option value="Торф">Turf</option>

											<option value="Транспортные средства">Transport vehicles</option>
											<option value="Трубы">Pipes</option>
											<option value="Удобрения">Fertilizer materials</option>
											<option value="Утеплитель">Insulators</option>
											<option value="Фанера">Plywood</option>
											<option value="Фрукты">Fruits</option>

											<option value="Хим. продукты">Chemical products</option>
											<option value="Хим. продукты неопасные">Unhazardous chemical products</option>
											<option value="Хозтовары">Household products</option>
											<option value="Холодильное оборудование">Refrigerating equipment </option>
											<option value="Цемент">Cement</option>
											<option value="Чипсы">Chips</option>

											<option value="Шкуры мокросоленые">Wet-sated hide</option>
											<option value="Электроника">Electronic devices</option>
											<option value="Ягоды">Berries</option>
											<option value="Другой">Other</option>';
										} elseif ($mosConfig_lang == 'romanian') { echo '
                                            <option value="">- indicati tipul de incarcatura -</option>
                                            <option value="Тара и упаковка">Ambalaje</option>
											<option value="Автошины">Anvelope auto</option>
											<option value="Канц. товары">Articole de birou</option>
											<option value="Парфюмерия и косметика">Articole de cosmetica si parfumerie</option>
											<option value="Изделия из резины">Articole din cauciuc</option>

											<option value="Изделия из металла">Articole din metal</option>
											<option value="Изделия из кожи">Articole din piele</option>
											<option value="Напитки">Bauturi</option>
											<option value="Алкогольные напитки">Bauturi alcoolice</option>
											<option value="Безалкогольные напитки">Bauturi nealcoolice</option>
											<option value="Пиво">Bere</option>

											<option value="Бутылки">Butelii</option>
											<option value="Кабель">Cablu</option>
											<option value="Компьютеры">Calculatoare</option>
											<option value="Кирпич">Caramida</option>
											<option value="Древесный уголь">Carbune de lemn</option>
											<option value="Мясо">Carne</option>

											<option value="Гофрокартон">Carton ondulat</option>
											<option value="Зерно и семена">Cereale si seminte</option>
											<option value="Пиломатериалы">Cherestea</option>
											<option value="Чипсы">Chipsuri</option>
											<option value="Цемент">Ciment</option>
											<option value="Грибы">Ciuperci</option>

											<option value="Консервы">Conserve</option>
											<option value="Контейнер 20фут">Container de 20 picioare</option>
											<option value="Контейнер 40фут">Container de 40 picioare</option>
											<option value="Ковры">Covoare</option>
											<option value="Бытовая техника">Electrocasnice</option>
											<option value="Мука">Faina</option>

											<option value="Металлолом">Fier uzat</option>
											<option value="Фрукты">Fructe</option>
											<option value="Бумага">Hartie</option>
											<option value="Утеплитель">Izolant termic</option>
											<option value="Одежда">Imbracaminte</option>

											<option value="Сборный груз">Incarcatura mixta</option>
											<option value="Мороженое">Inghetata</option>
											<option value="Удобрения">Ingrasaminte</option>
											<option value="Молоко сухое">Lapte praf</option>
											<option value="Овощи">Legume</option>
											<option value="Макулатура">Maculatura</option>

											<option value="ТНП">Marfuri de larg consum</option>
											<option value="Хозтовары">Marfuri de uz gospodaresc</option>
											<option value="Древесина">Material lemnos</option>
											<option value="Пластик">Material plastic</option>
											<option value="Пенопласт">Material plastic expandat</option>
											<option value="Стройматериалы">Materiale de constructie</option>

											<option value="Медикаменты">Medicamente</option>
											<option value="Металл">Metal</option>
											<option value="Транспортные средства">Mijloace de transport</option>
											<option value="Мебель">Mobila</option>
											<option value="Птица">Pasari</option>
											<option value="Рыба">Peste</option>

											<option value="Шкуры мокросоленые">Piei crude sarate</option>
											<option value="Оборудование и части">Piese si utilaje</option>
											<option value="Фанера">Placaj</option>
											<option value="ДСП">Placi aglomerate din aschii de lemn</option>
											<option value="ЛДСП">Placi aglomerate din aschii de lemn laminat</option>
											<option value="ДВП">Placi fibrolemnoase</option>

											<option value="Ковры">Platouri</option>
											<option value="Продукты питания">Produse alimentare</option>
											<option value="Хим. продукты">Produse chimice</option>
											<option value="Хим. продукты неопасные">Produse chimice inofensive</option>
											<option value="Бытовая химия">Produse chimice pentru uz casnic</option>
											<option value="Кондитерские изделия">Produse de patiserie</option>

											<option value="Табачные изделия">Produse de tutungerie</option>
											<option value="Нефтепродукты">Produse petroliere</option>
											<option value="Доски">Scandura </option>
											<option value="Стекло и фарфор">Sticla si portelanuri</option>
											<option value="Ягоды">Struguri</option>
											<option value="Соки">Sucuri</option>

											<option value="Электроника">Tehnica electronica</option>
											<option value="Сантехника">Tehnica sanitara</option>
											<option value="Трубы">Tevi</option>
											<option value="Текстиль">Textile</option>
											<option value="Торф">Turba</option>
											<option value="Холодильное оборудование">Utilaj frigorific</option>

											<option value="Минвата">Vata minerala</option>
											<option value="Сахар">Zahar</option>
											<option value="Другой">Altele</option>';
										}
?>
	</select>
	</span>
	</td>
</tr>


<tr>
	<td style="padding-bottom:8px;"><?php if($mosConfig_lang == 'russian') { echo "Объём груза, вес груза"; }
		elseif ($mosConfig_lang == 'romanian') { echo "Volumul si greutatea incarcaturii"; }
		elseif ($mosConfig_lang == 'english') { echo "Cargo size and weight"; }
?> <span style="color: red">*</span>
	<span id="calculate_transportation_form_select_cargo_size">
	<select type="select" name="cargo_size" size="1"  style="width: 220px"  id="cargo_size">
 <?php if($mosConfig_lang == 'russian') { echo '
                                            <option value="">- выбрать массу/объём -</option>
                                            <option value="до 0,500кг., до 20куб">до 0,500кг., до 20куб.</option>
                                            <option value="до 1т., до 25куб.">до 1т., до 25куб. </option>
                                            <option value="до 3т., до 30куб.">до 3т., до 30куб.</option>
                                            <option value="до 5т., до 50куб.">до 5т., до 50куб.</option>
                                            <option value="до 10т., до 86куб.">до 10т., до 86куб.</option>
                                            <option value="до 20т., до 90куб.">до 20т., до 90куб. </option>
                                            <option value="до 20т., до 120куб.">до 20т., до 120куб. </option>
                                        ';}

                                        elseif ($mosConfig_lang == 'romanian') { echo '
                                            <option value="">- selectati Volumul/greutatea -</option>
											<option value="до 0,500кг., до 20куб.">de la 0,500kg., de la 20cub.</option>
											<option value="до 1т., до 25куб.">de la 1t., de la 25cub. </option>
											<option value="до 3т., до 30куб.">de la 3t., de la 30cub.</option>
											<option value="до 5т., до 50куб.">de la 5t., de la 50cub.</option>

											<option value="до 10т., до 86куб.">de la 10t., de la 86cub.</option>
											<option value="до 20т., до 90куб.">de la 20t., de la 90cub. </option>
											<option value="до 20т., до 120куб.">de la 20t., de la 120cub. </option>
                                        ' ;}

                                        elseif ($mosConfig_lang == 'english') { echo '
                                            <option value="">- choose size/weight -</option>
											<option value="до 0,500кг., до 20куб.">up to 0,500 kg., up to 20 cub</option>
											<option value="до 1т., до 25куб.">up to 1t., up to 25 cub </option>
											<option value="до 3т., до 30куб.">up to 3t., up to 30 cub </option>
											<option value="до 5т., до 50куб.">up to 5t., up to 50 cub</option>

											<option value="до 10т., до 86куб.">up to 10t., up to 86 cub</option>
											<option value="до 20т., до 90куб.">up to 20t., up to 90 cub</option>
											<option value="до 20т., до 120куб.">up to 20t., up to 120 cub </option>
                                        ';}
?>
	</select>
	</span>
	</td>
</tr>


<tr>
	<td style="padding-bottom:8px;"><?php if($mosConfig_lang == 'russian') { echo "Контактное лицо"; }
	elseif ($mosConfig_lang == 'romanian') { echo "Persoana de contact"; }
	elseif ($mosConfig_lang == 'english') { echo "Contact person"; }
?> <span style="color: red">*</span>
	<span id="calculate_transportation_form_fio_span"><input type="text" name="fio" size="25" id="fio"  style="width: 220px" /></span></td>
</tr>


<tr>
	<td style="padding-bottom:8px;"><div><?php if($mosConfig_lang == 'russian') { echo "Контактный телефон"; }
								elseif ($mosConfig_lang == 'romanian') { echo "Telefon de contact"; }
								elseif ($mosConfig_lang == 'english') { echo "Telephone"; }
								?> <span style="color: red">*</span></div>
	+ <span id="tel_span"><span id="calculate_transportation_form_telefon_country_code_span"><input type="text" name="telefon_country_code" size="1" maxlength="3" id="telefon_country_code" style="width: 25px" /></span>
	- <span id="calculate_transportation_form_telefon_city_code_span"><input type="text" name="telefon_city_code" size="2" maxlength="4" id="telefon_city_code" style="width: 30px" /></span>
	- <span id="calculate_transportation_form_telefon_span"><input type="text" name="telefon" size="15" maxlength="15" id="telefon"  style="width: 125px" /></span></span>
	</td>
</tr>


<tr>
	<td style="padding-bottom:8px;"><div>E-mail<span style="color: red">*</span></div>
	<span id="calculate_transportation_form_email_span"><input type="text" name="email" size="25"  style="width: 220px" /></span></td>
</tr>

<!--
<tr>
	<td style="padding-bottom:8px;"><div>Skype</div> <input type="text" name="skype" size="25"  style="width: 220px" /></td>
</tr>


<tr>
	<td style="padding-bottom:10px;"><div>ICQ</div> <input type="text" name="icq" size="25" style="width: 220px"  /></td>
</tr>
-->

<tr>
	<td style="padding-bottom:10px;"><div style="margin-top:5px; margin-bottom:5px;"><span style="color: red">*</span> - <?php if($mosConfig_lang == 'russian') { echo "обязательные поля"; }
								elseif ($mosConfig_lang == 'romanian') { echo "campuri obligatorii"; }
								elseif ($mosConfig_lang == 'english') { echo "required fields"; }
								?></div>
	<div class="button_left"> </div>
	<input type="submit" name="submit" value="<?php if($mosConfig_lang == 'russian') { echo "Рассчитать"; }
								elseif ($mosConfig_lang == 'romanian') { echo "Calculeaza"; }
								elseif ($mosConfig_lang == 'english') { echo "Calculate"; }
								?>" id="submit" style="float:left;background-image:url(<?php echo $tmpTools->baseurl(); ?>/templates/ja_mesolite/images/button_back.png);background-repeat:repeat-x;height:31px;line-height:31px;width:100px;border:0;color:white;"/>
	<div class="button_right"></div>
	</td>
</tr>

</table>
</form>
</div>

<!--   Расчитать стоимость перевозки  END  -->








<?
/*
// левая форма для добавления транспорта
<!-- left transport form -->
<script language="JavaScript1.2">
function left_transport_form_parse_info(form_user)
{
	var err_message = "";
	var text = "Пожалуйста заполните обязательные поля.<br>";
	var err_message_more = "";
	if (form_user.import_country.value == 0 || form_user.import_country.value == "" || form_user.import_country.value == null) {
		document.getElementById("left_transport_form_select_import").className = "redborder"; err_message += "1";
	}else {
		document.getElementById("left_transport_form_select_import").className = "none";
	}
	
	if (form_user.export_country.value == 0 || form_user.export_country.value == "" || form_user.export_country.value == null) {
		document.getElementById("left_transport_form_select_export").className = "redborder"; err_message += "1";
	}else {
		document.getElementById("left_transport_form_select_export").className = "none";
	}
	
	if (form_user.date_export.value == 0 || form_user.date_export.value == "" || form_user.date_export.value == null) {
		document.getElementById("left_transport_form_date_span").className = "redborder"; err_message += "1";
	}else {
		document.getElementById("left_transport_form_date_span").className = "none";
	}
	
	if (form_user.type_transport.value == 0 || form_user.type_transport.value == "" || form_user.type_transport.value == null) {
		document.getElementById("left_transport_form_select_transport").className = "redborder"; err_message += "1";
	}else{
		document.getElementById("left_transport_form_select_transport").className = "none";
	}
	
	if (form_user.cargo_size.value == 0 || form_user.cargo_size.value == "" || form_user.cargo_size.value == null) {
		document.getElementById("left_transport_form_select_cargo_size").className = "redborder"; err_message += "1";
	}else {
		document.getElementById("left_transport_form_select_cargo_size").className = "none";
	}
	
	if (form_user.fio.value == 0 || form_user.fio.value == "" || form_user.fio.value == null) {
		document.getElementById("left_transport_form_fio_span").className = "redborder"; err_message +="1";
	}else {
		document.getElementById("left_transport_form_fio_span").className = "none";
	}
	
	if (form_user.company.value == 0 || form_user.company.value == "" || form_user.company.value == null) {
		document.getElementById("left_transport_form_company_span").className = "redborder"; err_message +="1";
	}else {
		document.getElementById("left_transport_form_company_span").className = "none";
	}
	
	if (!isValidEmail(form_user.email.value, false) || form_user.email.value == "") {
		document.getElementById("left_transport_form_email_span").className = "redborder"; err_message_more +="Почтовый ящик указан неверно.<br>"; err_message += "1";
	}else {
		document.getElementById("left_transport_form_email_span").className = "none";
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
		document.getElementById("left_transport_form_telefon_country_code_span").className = "redborder";
		document.getElementById("left_transport_form_telefon_city_code_span").className = "redborder";
		document.getElementById("left_transport_form_telefon_span").className = "redborder";
		err_message_more +="Неправильный формат телефонного номера. <br>(Пример: + код страны - код города - номер абонента)<br>";
		err_message += "1";
	} else {
		document.getElementById("left_transport_form_telefon_country_code_span").className = "none";
		document.getElementById("left_transport_form_telefon_city_code_span").className = "none";
		document.getElementById("left_transport_form_telefon_span").className = "none";
	}
	if (err_message != "") {
		document.getElementById("left_transport_form_err_message").innerHTML = text + err_message_more;
		return false;
	} else {
		document.getElementById("left_transport_form_err_message").innerHTML = "";
		return true;
	}
}
</script>

<h1 onclick="look('left_transport_form'); return false;">Добавить транспорт</h1>

<div id="left_transport_form" style="display: none;">
<p><span id="left_transport_form_err_message" style="color:red"></span></p>
<form action="/index.php?option=com_content&amp;task=view&amp;id=8&amp;Itemid=21" method="POST" name="left_transport_form" onsubmit="return left_transport_form_parse_info(this);">
<table border="0" width="100%">
	<tr>
		<td align="left" style="padding-bottom:8px;">Страна отправления <span style="color: red">*</span>
			<span id="left_transport_form_select_import">
				<select type="select" name="import_country" size="1" onchange="updateSelect('left_transport_form_import_city', this.value, 'left_transport_form_import_city');" id="import_country" style="width: 220px">
                    <option value="0"><center>---Укажите страну---<center></option>
                    <option value="Австрия">Австрия</option>
                    <option value="Азербайджан">Азербайджан</option>
                    <option value="Албания">Албания</option>
                    
                    <option value="Андорра">Андорра</option>
                    <option value="Армения">Армения</option>
                    <option value="Афганистан">Афганистан</option>
                    <option value="Беларусь">Беларусь</option>
                    <option value="Бельгия">Бельгия</option>
                    
                    <option value="Болгария">Болгария</option>
                    <option value="Босния/Герцеговина">Босния/Герцеговина</option>
                    <option value="Великобритания">Великобритания</option>
                    <option value="Венгрия">Венгрия</option>
                    <option value="Вьетнам">Вьетнам</option>
                    <option value="Германия">Германия</option>
                    
                    <option value="Голандия">Голандия</option>
                    <option value="Греция">Греция</option>
                    <option value="Грузия">Грузия</option>
                    <option value="Дания">Дания</option>
                    <option value="Египет">Египет</option>
                    <option value="Израиль">Израиль</option>
                    
                    <option value="Индия">Индия</option>
                    <option value="Иордания">Иордания</option>
                    <option value="Ирак">Ирак</option>
                    <option value="Иран">Иран</option>
                    <option value="Ирландия">Ирландия</option>
                    <option value="Исландия">Исландия</option>
                    
                    <option value="Испания">Испания</option>
                    <option value="Италия">Италия</option>
                    <option value="Йемен">Йемен</option>
                    <option value="Казахстан">Казахстан</option>
                    <option value="Канада">Канада</option>
                    <option value="Кипр">Кипр</option>
                    
                    <option value="Китай">Китай</option>
                    <option value="Северная Корея">Северная Корея</option>
                    <option value="Южная Корея">Южная Корея</option>
                    <option value="Кыргызстан">Кыргызстан</option>
                    <option value="Латвия">Латвия</option>
                    <option value="Ливан">Ливан</option>
                    
                    <option value="Литва">Литва</option>
                    <option value="Люксембург">Люксембург</option>
                    <option value="Македония">Македония</option>
                    <option value="Малайзия">Малайзия</option>
                    <option value="Мальта">Мальта</option>
                    <option value="Мексика">Мексика</option>
                    
                    <option value="Молдова">Молдова</option>
                    <option value="Монголия">Монголия</option>
                    <option value="Мьянма">Мьянма</option>
                    <option value="Непал">Непал</option>
                    <option value="Нидерланды">Нидерланды</option>
                    <option value="Норвегия">Норвегия</option>
                    
                    <option value="О.А.Э.">ОА Эмираты</option>
                    <option value="Польша">Польша</option>
                    <option value="Португалия">Португалия</option>
                    <option value="Россия">Россия</option>
                    <option value="Румыния">Румыния</option>
                    <option value="Кипр">Северный Кипр</option>
                    
                    <option value="Сербия">Сербия</option>
                    <option value="Силандия">Силандия</option>
                    <option value="Сингапур">Сингапур</option>
                    <option value="Сирия">Сирия</option>
                    <option value="Словакия">Словакия</option>
                    <option value="Словения">Словения</option>
                    
                    <option value="США">США</option>
                    <option value="Таджикистан">Таджикистан</option>
                    <option value="Тайланд">Тайланд</option>
                    <option value="Туркменистан">Туркменистан</option>
                    <option value="Турция">Турция</option>
                    <option value="Узбекистан">Узбекистан</option>
                    
                    <option value="Украина">Украина</option>
                    <option value="Финляндия">Финляндия</option>
                    <option value="Франция">Франция</option>
                    <option value="Хорватия">Хорватия</option>
                    <option value="Черногория">Черногория</option>
                    <option value="Чехия">Чехия</option>
                    
                    <option value="Швейцария">Швейцария</option>
                    <option value="Швеция">Швеция</option>
                    <option value="Шри-Ланка">Шри-Ланка</option>
                    <option value="Эстония">Эстония</option>
                    <option value="Япония">Япония</option>
				</select>
			</span>
		</td>
	</tr>
	<tr>
		<td align="left" style="padding-bottom:8px;">Город отправления
			<span id="import_city_text"></span>
				<select type="select" name="import_city" size="1" id="left_transport_form_import_city"  style="width: 175px" onchange="updateSelect('ignore', this.value, 'left_transport_form_import_city');" style="width: 220px">
					<option value="0">---не имеет значения---</option>
				</select>
			<span id="import_city_type"></span>
		</td>
	</tr>
	<tr>
		<td align="left" style="padding-bottom:8px;"><div>Страна прибытия <span style="color: red">*</span></div>
			<span id="left_transport_form_select_export">
				<select type="select" name="export_country" size="1" id="export_country" onchange="updateSelect('left_transport_form_export_city', this.value, 'left_transport_form_export_city');" style="width: 220px">
					<option value="0">---Укажите страну---</option>
					<option value="Австрия">Австрия</option>
					<option value="Азербайджан">Азербайджан</option>
					<option value="Албания">Албания</option>
					
					<option value="Андорра">Андорра</option>
					<option value="Армения">Армения</option>
					<option value="Афганистан">Афганистан</option>
					<option value="Беларусь">Беларусь</option>
					<option value="Бельгия">Бельгия</option>
					
					<option value="Болгария">Болгария</option>
					<option value="Босния/Герцеговина">Босния/Герцеговина</option>
					<option value="Великобритания">Великобритания</option>
					<option value="Венгрия">Венгрия</option>
					<option value="Вьетнам">Вьетнам</option>
					<option value="Германия">Германия</option>
					
					<option value="Голандия">Голандия</option>
					<option value="Греция">Греция</option>
					<option value="Грузия">Грузия</option>
					<option value="Дания">Дания</option>
					<option value="Египет">Египет</option>
					<option value="Израиль">Израиль</option>
					
					<option value="Индия">Индия</option>
					<option value="Иордания">Иордания</option>
					<option value="Ирак">Ирак</option>
					<option value="Иран">Иран</option>
					<option value="Ирландия">Ирландия</option>
					<option value="Исландия">Исландия</option>
					
					<option value="Испания">Испания</option>
					<option value="Италия">Италия</option>
					<option value="Йемен">Йемен</option>
					<option value="Казахстан">Казахстан</option>
					<option value="Канада">Канада</option>
					<option value="Кипр">Кипр</option>
					
					<option value="Китай">Китай</option>
					<option value="Северная Корея">Северная Корея</option>
					<option value="Южная Корея">Южная Корея</option>
					<option value="Кыргызстан">Кыргызстан</option>
					<option value="Латвия">Латвия</option>
					<option value="Ливан">Ливан</option>
					
					<option value="Литва">Литва</option>
					<option value="Люксембург">Люксембург</option>
					<option value="Македония">Македония</option>
					<option value="Малайзия">Малайзия</option>
					<option value="Мальта">Мальта</option>
					<option value="Мексика">Мексика</option>
					
					<option value="Молдова">Молдова</option>
					<option value="Монголия">Монголия</option>
					<option value="Мьянма">Мьянма</option>
					<option value="Непал">Непал</option>
					<option value="Нидерланды">Нидерланды</option>
					<option value="Норвегия">Норвегия</option>
					
					<option value="О.А.Э.">ОА Эмираты</option>
					<option value="Польша">Польша</option>
					<option value="Португалия">Португалия</option>
					<option value="Россия">Россия</option>
					<option value="Румыния">Румыния</option>
					<option value="Кипр">Северный Кипр</option>
					
					<option value="Сербия">Сербия</option>
					<option value="Силандия">Силандия</option>
					<option value="Сингапур">Сингапур</option>
					<option value="Сирия">Сирия</option>
					<option value="Словакия">Словакия</option>
					<option value="Словения">Словения</option>
					
					<option value="США">США</option>
					<option value="Таджикистан">Таджикистан</option>
					<option value="Тайланд">Тайланд</option>
					<option value="Туркменистан">Туркменистан</option>
					<option value="Турция">Турция</option>
					<option value="Узбекистан">Узбекистан</option>
					
					<option value="Украина">Украина</option>
					<option value="Финляндия">Финляндия</option>
					<option value="Франция">Франция</option>
					<option value="Хорватия">Хорватия</option>
					<option value="Черногория">Черногория</option>
					<option value="Чехия">Чехия</option>
					
					<option value="Швейцария">Швейцария</option>
					<option value="Швеция">Швеция</option>
					<option value="Шри-Ланка">Шри-Ланка</option>
					<option value="Эстония">Эстония</option>
					<option value="Япония">Япония</option>
				</select>
			</span>
		</td>
	</tr>
	<tr>
		<td align="left" style="padding-bottom:8px;"><div>Город прибытия</div>
			<span id="export_city_text"></span>
				<select type="select" name="export_city" size="1" id="left_transport_form_export_city" style="width: 175px" onchange="updateSelect('ignore', this.value, 'left_transport_form_export_city');" style="width: 220px" >
					<option value="0">---не имеет значения---</option>
				</select>
			<span id="export_city_type"></span>
		</td>
	</tr>
	<tr>
		<td style="padding-bottom:8px;"><div>Свободен с <span style="color: red">*</span></div><!-- TODO change id of evry field in date -->
			<span id="left_transport_form_date_span"><input readonly="true" type="text" name="date_export" size="12" maxlength="19" id="left_transport_form_date_export"  style="width: 200px"  /><input name="calendar" type="button" onClick="return showCalendar('left_transport_form_date_export', 'dd-mm-y');" tabindex="105" value="..." style="width: 20px"/></span>
		</td>
	</tr>
<tr>
<td style="padding-bottom:8px;">Тип транспорта <span style="color: red">*</span>
<span id="left_transport_form_select_transport">
<select type="select" name="type_transport" size="1" style="width: 220px" id="type_transport">
<option value="">---Укажите тип транспорта---</option>
<option value="Тентованный Полуприцеп">Тентованный Полуприцеп</option>
<option value="Рефрижератор">Рефрижератор</option>
<option value="Автопоезд с прицепом тентованный">Автопоезд с прицепом тентованный</option>

<option value="Мегатрейлер Полуприцеп тенованный">Мегатрейлер Полуприцеп тенованный</option>
<option value="Юмбо платформа полуприцеп">Юмбо платформа полуприцеп</option>
<option value="Автовоз-трейлер с прицепом">Автовоз-трейлер с прицепом</option>
<option value="Трейлер трал-платформа">Трейлер трал-платформа</option>
<option value="Контейнеровоз полуприцеп">Контейнеровоз полуприцеп</option>
<option value="Изотерм или Цельномет.">Изотерм или Цельномет.</option>
<option value="Перевозки Опасного груза ADR">Перевозки Опасного груза ADR</option>
<option value="Перевозки Сборного груза">Перевозки Сборного груза</option>
<option value="Самосвал">Самосвал</option>

<option value="Цистерна бочка, термос">Цистерна бочка, термос</option>
<option value="Морские перевозки">Морские перевозки</option>
<option value="Другой"> Другой</option>
</select>
</span>
</td>
</tr>

<tr>
<td style="padding-bottom:8px;"> Объём, вес<span style="color: red">*</span>
<span id="left_transport_form_select_cargo_size">
<select type="select" name="cargo_size" size="1" style="width: 220px" id="cargo_size">
<option value="">---Укажите объём, вес---</option>
<option value="до 0,500кг., до 20куб.">до 0,500кг., до 20куб.</option>
<option value="до 1т., до 25куб.">до 1т., до 25куб.</option>
<option value="до 3т., до 30куб.">до 3т., до 30куб.</option>
<option value="до 5т., до 50куб.">до 5т., до 50куб.</option>
<option value="до 10т., до 86куб.">до 10т., до 86куб.</option>
<option value="до 20т., до 90куб.">до 20т., до 90куб.</option>
<option value="до 20т., до 120куб.">до 20т., до 120куб.</option>
</select>
</span>
</td>
</tr>

<tr>
<td style="padding-bottom:8px;">Компания<span style="color: red">*</span>
<span id="left_transport_form_company_span"><input type="text" name="company" size="25" id="company"  style="width: 220px" /></span></td>
</tr>

<tr>
<td style="padding-bottom:8px;">Контактное лицо <span style="color: red">*</span>
<span id="left_transport_form_fio_span"><input type="text" name="fio" size="25" id="fio"  style="width: 220px" /></span></td>
</tr>

<tr>
<td style="padding-bottom:8px;"><div>Контактный телефон <span style="color: red">*</span></div> 
+ <span id="tel_span"><span id="left_transport_form_telefon_country_code_span"><input type="text" name="telefon_country_code" size="1" maxlength="3" id="telefon_country_code" style="width: 25px" /></span>
- <span id="left_transport_form_telefon_city_code_span"><input type="text" name="telefon_city_code" size="2" maxlength="4" id="telefon_city_code" style="width: 30px" /></span>
- <span id="left_transport_form_telefon_span"><input type="text" name="telefon" size="15" maxlength="15" id="telefon" style="width: 130px" /></span></span>
</td>

<tr>
<td style="padding-bottom:8px;"><div>E-mail <span style="color: red">*</span></div>
<span id="left_transport_form_email_span"><input type="text" name="email" size="25" style="width: 220px"  /></span></td>
</tr>

<tr>
<td style="padding-bottom:10px;"><div>Примечание</div><textarea type="textarea" name="other" class="inputbox" cols="30" rows="5" id="other"  style="width: 220px" ></textarea></td>
</tr>

<tr>
<td style="padding-bottom:10px;"><div style="margin-top: 5px; margin-bottom:5px;"><span style="color: red">*</span> - обязательные поля</div>
<div class="button_left"> </div>
<input type="submit" name="submit" value="Отправить" id="submit" style="float:left;background-image:url(<?php echo $tmpTools->baseurl(); ?>/templates/ja_mesolite/images/button_back.png);background-repeat:repeat-x;height:31px;line-height:31px;width:100px;border:0;color:white;"/>
<div class="button_right"></div>
</td>
</tr>

</table>
</form>
</div>
<!-- Добавить транспорт  END -->
*/
?>                
                
                                <br style="font-size:1px;height:1px;clear:both;"/>
                                <ul class="leftmenu">
                                	<!--<li><a href="#">Обратная связь</a></li>
                                    <li><a href="index.php?option=com_content&task=view&id=2&Itemid=13">Контакты</a></li>-->
                                </ul>
          </div>
          <div class="right">
			<?php mosLoadModules ( 'user8',-1); ?>
          	<?php mosMainBody(); ?>
			<?php mosLoadModules ( 'user5',-1); ?>
          	
		  </div>
         
     
    </div>
    </div>
    <div class="footer">
		<table>
			<tr>
				<td><div class="copy"><p>2009 &copy; Moldovatruck</p><a href="index.php?option=com_xmap&Itemid=12">Карта сайта</a>
				| <a href="index.php?option=com_performs&formid=1&Itemid=57">Обратная связь</a>
				
				<p>
<!--Openstat-->
<span id="openstat2064831"></span><script type="text/javascript"> var openstat = { counter: 2064831, image: 25, next: openstat , track_links: "ext" }; document.write(unescape("%3Cscript%20src=%22http" +
(("https:" == document.location.protocol) ? "s" : "") +
"://openstat.net/cnt.js%22%20defer=%22defer%22%3E%3C/script%3E")); </script>
<!--Openstat-->
</p>


				</div></td>
				<td>
					<div class="seo_text">Международные грузоперевозки из Молдавии в Россию. Грузоперевозки сборных грузов из Румынии в Россию. Доставка грузов из России в Молдову. Автоперевозки опасных сборных грузов из Турции, Греции, в Россию, Беларусию. Транспортная экспедиторская компания из Молдавии. Транспортные услуги по перевозке негабаритного груза из Германии, Италии, Польши в Молдову. Транспортный сайт поиск транспорта, поиск груза. Транспорт для доставки грузов из Европы в Россию. Перевозки контейнерные,перевозки легковых автомобилей из Европы, России в Румынию, Молдову. Расчёт стоимости доставки грузов из России в румынию и Молдову.<br><br>
					<span style="font-size: 11px; color: rgb(0, 0, 0);">Все права защищены. При цитировании и использовании материалов с сайта гиперссылка на www.moldovatruck.md обязательна.</span> <br>Транспортные услуги. Предложения грузов - <a href="http://www.movers-auto.md" target="_blank">www.movers-auto.md</a>, <a href="http://www.riatec.md" target="_blank">www.riatec.md</a>
					<br><br>
					
					Создание сайта - <a style="color:#FFFFFF;" target="_blank" href="http://magicweb.md">Magic-Web</a>

</div>
				</td>
			</tr>
		</table>
    </div>

</div>
</body>

</html>