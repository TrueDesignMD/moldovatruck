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
				<div class="logo"><a style="display:block;float:left;" href="<?php echo $tmpTools->baseurl(); ?>"><img src="<?php echo $tmpTools->baseurl(); ?>/templates/ja_mesolite/images/logo.png" /></a><span style="margin-left:20px;margin-top:30px;position:relative;float:left;font-size:20px;">Moldova Truck - ���� ������������ �������������� �����</span></div>
				
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
			<?php if($_GET['Itemid'] == 2) {
			?><span class="pathway"><a class="pathway" href="index.php">��������� ��� ���������</a><img alt="arrow" src="<?php echo $mosConfig_live_site; ?>/images/M_images/arrow.png"/><? echo $row['product_name']; ?></span><?
			} else { mospathway(); 
			} ?> 
		</div>
        	<div class="left">
			
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
	sid.options[sid.options.length] = new Option("���������, ���� ��������...", 0, false, false);
	var params = "value=" + optValue;
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
				sid.options[sid.options.length] = new Option("--- ������ ����� ---", 1, false, false);
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

<!--   ����� ����������  -->
<h1 onclick="look('left_cargo_form'); return false;"><?php if($mosConfig_lang == 'russian') { echo "�������� ���������"; }
	elseif ($mosConfig_lang == 'romanian') { echo "Comanda transport"; }
	elseif ($mosConfig_lang == 'english') { echo "Order transport"; }
?></h1>

<div id="left_cargo_form" style="display: none;">
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
<?php if($mosConfig_lang == 'russian') { echo '
                                    	<option value="">- ������� ��� ���������� -</option>
                                    	<option value="����������� ����������">����������� ����������</option>
                                        <option value="������������">������������</option>
                                        <option value="��������� � �������� �����������">��������� � �������� �����������</option>
                                        <option value="����������� ���������� ����������">����������� ���������� ����������</option>
                                        <option value="���� ��������� ����������">���� ��������� ����������</option>
                                        <option value="�������-������� � ��������">�������-������� � ��������</option>
                                        <option value="������� ����-���������">������� ����-���������  </option>
                                        <option value="������������� ����������">������������� ����������</option>
                                        <option value="������� ��� ���������.">������� ��� ���������.</option>
                                        <option value="��������� �������� ����� ADR">��������� �������� ����� ADR</option>
                                        <option value="��������� �������� �����">��������� �������� �����</option>
                                        <option value="��������">��������</option>
                                        <option value="�������� �����, ������">�������� �����, ������</option>
                                        <option value="������� ���������">������� ���������</option>
										<option value="������">������</option>
';}
                                          elseif ($mosConfig_lang == 'romanian') { echo '
										<option value="">- indicati tipul transportului -</option>
										<option value="��������">Autobasculanta</option>
										<option value="�������-������� � ��������">Autotrailer cu remorca</option>

										<option value="��������� � �������� �����������">Autotren cu remorca cu prelata</option>
										<option value="������� ��� ���������.">Bena metalica sau izoterma</option>
										<option value="������������">Camion frigorific</option>
										<option value="�������� �����, ������">Cisterna cilindru, termos</option>
										<option value="������������� ����������">Container auto cu semiremorca</option>
										<option value="����������� ���������� ����������">Mega trailer semiremorca cu prelata</option>

										<option value="������� ����-���������">Remorca carosata cu platforma de tractare</option>
										<option value="����������� ����������">Semiremorca cu prelata</option>
										<option value="���� ��������� ����������">Semiremorca Jumbo carosata</option>
										<option value="��������� �������� �����">Transportare incarcaturi mixte</option>
										<option value="��������� �������� ����� ADR">Transportare marfuri periculoase ADR</option>
										<option value="������� ���������">Transporturi maritime</option>
										<option value="������">Altul</option>
  ';}
                                        elseif ($mosConfig_lang == 'english') { echo  '
										<option value="">- choose transport type -</option>
                                    	<option value="����������� ����������">Tilt-covered semi-trailer</option>
										<option value="������������">Refrigerated trailer</option>
										<option value="��������� � �������� �����������">Tilt-covered road train with a trailer </option>
										<option value="����������� ���������� ����������">Tilt-covered mega trailer </option>

										<option value="���� ��������� ����������">Semi-trailer with Yumbo platform</option>
										<option value="�������-������� � ��������">Car hauler with a trailer </option>
										<option value="������� ����-���������">Troll-platform trailer </option>
										<option value="������������� ����������">Container semi-truck </option>
										<option value="������� ��� ���������.">All-metal and insulated trailer </option>
										<option value="��������� �������� ����� ADR">ADR transportations</option>
										<option value="��������� �������� �����">Joint cargo transportations</option>

										<option value="��������">Tipper</option>
										<option value="�������� �����, ������">Insulated tanker </option>
										<option value="������� ���������">Sea freight </option>
										<option value="������">Other</option>
';}
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
<?php if($mosConfig_lang == 'russian') { echo '
                                    	<option value="">- ������� ������ -</option>
                                        <option value="�������">�������</option>
                                        <option value="�����������">�����������</option>
                                        <option value="�������">�������</option>
                                        <option value="�������">�������</option>
                                        <option value="�������">�������</option>
                                        <option value="����������">����������</option>
                                        <option value="��������">��������</option>
                                        <option value="�������">�������</option>
                                        <option value="��������">��������</option>
                                        <option value="������/�����������">������ � �����������</option>
                                        <option value="��������������">��������������</option>
                                        <option value="�������">�������</option>
                                        <option value="�������">�������</option>
                                        <option value="��������">��������</option>
                                        <option value="��������">��������</option>
                                        <option value="������">������</option>
                                        <option value="������">������</option>
                                        <option value="�����">�����</option>
                                        <option value="������">������</option>
                                        <option value="�������">�������</option>
                                        <option value="�����">�����</option>
                                        <option value="��������">��������</option>
                                        <option value="����">����</option>
                                        <option value="����">����</option>
                                        <option value="��������">��������</option>
                                        <option value="��������">��������</option>
                                        <option value="�������">�������</option>
                                        <option value="������">������</option>
                                        <option value="�����">�����</option>
                                        <option value="���������">���������</option>
                                        <option value="������">������</option>
                                        <option value="������">������</option>
                                        <option value="����">����</option>
                                        <option value="�����">�����</option>
                                        <option value="�������� �����">����� ��������</option>
                                        <option value="����� �����">����� �����</option>
                                        <option value="����������">����������</option>
                                        <option value="������">������</option>
                                        <option value="�����">�����</option>
                                        <option value="�����">�����</option>
                                        <option value="����������">����������</option>
                                        <option value="���������">���������</option>
                                        <option value="��������">��������</option>
                                        <option value="������">������</option>
                                        <option value="�������">�������</option>
                                        <option value="�������">�������</option>
                                        <option value="��������">��������</option>
                                        <option value="������">������</option>
                                        <option value="�����">�����</option>
                                        <option value="����������">����������</option>
                                        <option value="��������">��������</option>
                                        <option value="�.�.�.">�� �������</option>
                                        <option value="������">������</option>
                                        <option value="����������">����������</option>
                                        <option value="������">������</option>
                                        <option value="�������">�������</option>
                                        <option value="��������">�������� ����</option>
                                        <option value="������">������</option>
                                        <option value="��������">��������</option>
                                        <option value="��������">��������</option>
                                        <option value="�����">�����</option>
                                        <option value="��������">��������</option>
                                        <option value="��������">��������</option>
                                        <option value="���">���</option>
                                        <option value="�����������">�����������</option>
                                        <option value="�������">�������</option>
                                        <option value="������������">������������</option>
                                        <option value="������">������</option>
                                        <option value="����������">����������</option>
                                        <option value="�������">�������</option>
                                        <option value="���������">���������</option>
                                        <option value="�������">�������</option>
                                        <option value="��������">��������</option>
                                        <option value="����������">����������</option>
                                        <option value="�����">�����</option>
                                        <option value="���������">���������</option>
                                        <option value="������">������</option>
                                        <option value="���-�����">���-�����</option>
                                        <option value="�������">�������</option>
                                        <option value="������">������</option>

';}

                                    elseif($mosConfig_lang == 'romanian') { echo '
											<option value="">- alegeti tara  -</option>
											<option value="����������">Afganistan</option>
											<option value="�������">Albania</option>

											<option value="�������">Andora</option>
											<option value="�������">Armenia</option>
											<option value="�������">Austria</option>
											<option value="�����������">Azerbaijan</option>
											<option value="��������">Belarus</option>
											<option value="�������">Belgia</option>

											<option value="������/�����������">Bosnia si Hertegovina</option>
											<option value="��������">Bulgaria</option>
											<option value="������">Canada</option>
											<option value="�����">Cehia</option>
											<option value="�����">China</option>

											<option value="����">Cipru</option>
											<option value="�������� �����">Coreea de Nord</option>
											<option value="����� �����">Coreea de Sud</option>
											<option value="��������">Crotia</option>
											<option value="�����">Danemarca</option>

											<option value="������">Egipt</option>
											<option value="���������">Elvetia</option>
											<option value="�.�.�.">Emiratele Arabe</option>
											<option value="�������">Estonia</option>
											<option value="���������">Finlanda</option>
											<option value="�������">Franta</option>

											<option value="������">Georgia</option>
											<option value="��������">Germania </option>
											<option value="������">Grecia</option>
											<option value="�����">India</option>
											<option value="��������">Iordania</option>
											<option value="����">Irak</option>

											<option value="����">Iran</option>
											<option value="��������">Irlanda</option>
											<option value="��������">Islanda</option>
											<option value="�������">Israel</option>
											<option value="������">Italia</option>
											<option value="������">Japonia</option>

											<option value="���������">Kazahstan</option>
											<option value="����������">Kirghizstan</option>
											<option value="������">Letonia</option>
											<option value="�����">Liban</option>
											<option value="�����">Lituania</option>
											<option value="����������">Luxemburg</option>

											<option value="���������">Macedonia</option>
											<option value="��������">Malaezia</option>
											<option value="������">Malta</option>
											<option value="��������������">Marea Britanie</option>
											<option value="�������">Mexic</option>
											<option value="�������">Moldova</option>

											<option value="��������">Mongolia</option>
											<option value="����������">Muntenegru</option>
											<option value="������">Myanma</option>
											<option value="�����">Nepal</option>
											<option value="��������">Norvegia</option>
											<option value="����������">Olanda</option>

											<option value="������">Polonia</option>
											<option value="����������">Portugalia</option>
											<option value="�������">Romania</option>
											<option value="������">Rusia</option>
											<option value="������">Serbia</option>
											<option value="���������">Silandia (Bangladesh)</option>

											<option value="��������">Singapore</option>
											<option value="�����">Siria</option>
											<option value="��������">Slovacia</option>
											<option value="��������">Slovenia</option>
											<option value="�������">Spania </option>
											<option value="���-�����">Sri Lanka</option>

											<option value="���">SUA</option>
											<option value="������">Suedia</option>
											<option value="�������">Tailanda</option>
											<option value="�����������">Tajikistan</option>
											<option value="����������">Tarile de jos</option>
											<option value="������">Turcia</option>

											<option value="������������">Turkmenistan</option>
											<option value="�������">Ucraina</option>
											<option value="�������">Ungaria</option>
											<option value="����������">Uzbekistan</option>
											<option value="�������">Vietnam</option>
											<option value="�����">Yemen</option>
';}



                                    elseif($mosConfig_lang == 'english') { echo '
                                    	<option value="">- choose the country -</option>
											<option value="����������">Afghanistan</option>
											<option value="�����������">Azerbaijan</option>
											<option value="�������">Albania</option>
											<option value="�������">Andorra</option>
											<option value="�������">Armenia</option>
											<option value="�������">Austria</option>

											<option value="��������">Belarus</option>
											<option value="�������">Belgium</option>
											<option value="������/�����������">Bosnia &amp; Herzegovina</option>
											<option value="��������">Bulgaria</option>
											<option value="������">Canada</option>
											<option value="�����">China</option>

											<option value="��������">Croatia</option>
											<option value="����">Cyprus</option>
											<option value="�����">Czech Republic</option>
											<option value="�����">Denmark</option>
											<option value="������">Egypt</option>
											<option value="�������">Estonia</option>

											<option value="���������">Finland</option>
											<option value="�������">France</option>
											<option value="������">Georgia</option>
											<option value="��������">Germany</option>
											<option value="������">Greece</option>
											<option value="�������">Hungary</option>

											<option value="��������">Iceland</option>
											<option value="�����">India</option>
											<option value="����">Iran</option>
											<option value="����">Iraq</option>
											<option value="��������">Ireland</option>
											<option value="�������">Israel</option>

											<option value="������">Italy</option>
											<option value="������">Japan</option>
											<option value="��������">Jordan</option>
											<option value="���������">Kazakhstan</option>
											<option value="����������">Kyrgyzstan</option>
											<option value="������">Latvia</option>

											<option value="�����">Lebanon</option>
											<option value="�����">Lithuania</option>
											<option value="����������">Luxembourg</option>
											<option value="���������">Macedonia</option>
											<option value="��������">Malaysia</option>
											<option value="������">Malta</option>

											<option value="�������">Mexico</option>
											<option value="�������">Moldova</option>
											<option value="��������">Mongolia</option>
											<option value="����������">Montenegro</option>
											<option value="������">Myanmar</option>
											<option value="�����">Nepal</option>

											<option value="����������">Netherlands</option>
											<option value="����������">Netherlands Antilles</option>
											<option value="�������� �����">North Korea</option>
											<option value="����">Northern Cyprus</option>
											<option value="��������">Norway</option>
											<option value="������">Poland</option>

											<option value="����������">Portugal</option>
											<option value="�������">Romania</option>
											<option value="������">Russia</option>
											<option value="��������">Singapore</option>
											<option value="��������">Slovakia</option>
											<option value="��������">Slovenia</option>

											<option value="����� �����">South Korea</option>
											<option value="�������">Spain</option>
											<option value="���-�����">Sri Lanka</option>
											<option value="������">Sweden</option>
											<option value="���������">Switzerland</option>
											<option value="�����">Syria</option>

											<option value="�����������">Tajikistan</option>
											<option value="�������">Thailand</option>
											<option value="������">Turkey</option>
											<option value="������������">Turkmenistan</option>
											<option value="�������">Ukraine</option>
											<option value="�.�.�.">United Arab Emirates</option>

											<option value="��������������">United Kingdom</option>
											<option value="���">USA</option>
											<option value="����������">Uzbekistan</option>
											<option value="�������">Vietnam</option>
											<option value="�����">Yemen (Arab Republic)</option>
';}
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
<?php if($mosConfig_lang == 'russian') { echo '
                                    	<option value="">- ������� ������ -</option>
                                        <option value="�������">�������</option>
                                        <option value="�����������">�����������</option>
                                        <option value="�������">�������</option>
                                        <option value="�������">�������</option>
                                        <option value="�������">�������</option>
                                        <option value="����������">����������</option>
                                        <option value="��������">��������</option>
                                        <option value="�������">�������</option>
                                        <option value="��������">��������</option>
                                        <option value="������/�����������">������ � �����������</option>
                                        <option value="��������������">��������������</option>
                                        <option value="�������">�������</option>
                                        <option value="�������">�������</option>
                                        <option value="��������">��������</option>
                                        <option value="��������">��������</option>
                                        <option value="������">������</option>
                                        <option value="������">������</option>
                                        <option value="�����">�����</option>
                                        <option value="������">������</option>
                                        <option value="�������">�������</option>
                                        <option value="�����">�����</option>
                                        <option value="��������">��������</option>
                                        <option value="����">����</option>
                                        <option value="����">����</option>
                                        <option value="��������">��������</option>
                                        <option value="��������">��������</option>
                                        <option value="�������">�������</option>
                                        <option value="������">������</option>
                                        <option value="�����">�����</option>
                                        <option value="���������">���������</option>
                                        <option value="������">������</option>
                                        <option value="������">������</option>
                                        <option value="����">����</option>
                                        <option value="�����">�����</option>
                                        <option value="�������� �����">����� ��������</option>
                                        <option value="����� �����">����� �����</option>
                                        <option value="����������">����������</option>
                                        <option value="������">������</option>
                                        <option value="�����">�����</option>
                                        <option value="�����">�����</option>
                                        <option value="����������">����������</option>
                                        <option value="���������">���������</option>
                                        <option value="��������">��������</option>
                                        <option value="������">������</option>
                                        <option value="�������">�������</option>
                                        <option value="�������">�������</option>
                                        <option value="��������">��������</option>
                                        <option value="������">������</option>
                                        <option value="�����">�����</option>
                                        <option value="����������">����������</option>
                                        <option value="��������">��������</option>
                                        <option value="�.�.�.">�� �������</option>
                                        <option value="������">������</option>
                                        <option value="����������">����������</option>
                                        <option value="������">������</option>
                                        <option value="�������">�������</option>
                                        <option value="��������">�������� ����</option>
                                        <option value="������">������</option>
                                        <option value="��������">��������</option>
                                        <option value="��������">��������</option>
                                        <option value="�����">�����</option>
                                        <option value="��������">��������</option>
                                        <option value="��������">��������</option>
                                        <option value="���">���</option>
                                        <option value="�����������">�����������</option>
                                        <option value="�������">�������</option>
                                        <option value="������������">������������</option>
                                        <option value="������">������</option>
                                        <option value="����������">����������</option>
                                        <option value="�������">�������</option>
                                        <option value="���������">���������</option>
                                        <option value="�������">�������</option>
                                        <option value="��������">��������</option>
                                        <option value="����������">����������</option>
                                        <option value="�����">�����</option>
                                        <option value="���������">���������</option>
                                        <option value="������">������</option>
                                        <option value="���-�����">���-�����</option>
                                        <option value="�������">�������</option>
                                        <option value="������">������</option>

';}

                                    elseif($mosConfig_lang == 'romanian') { echo '
											<option value="">- alegeti tara  -</option>
											<option value="����������">Afganistan</option>
											<option value="�������">Albania</option>

											<option value="�������">Andora</option>
											<option value="�������">Armenia</option>
											<option value="�������">Austria</option>
											<option value="�����������">Azerbaijan</option>
											<option value="��������">Belarus</option>
											<option value="�������">Belgia</option>

											<option value="������/�����������">Bosnia si Hertegovina</option>
											<option value="��������">Bulgaria</option>
											<option value="������">Canada</option>
											<option value="�����">Cehia</option>
											<option value="�����">China</option>

											<option value="����">Cipru</option>
											<option value="�������� �����">Coreea de Nord</option>
											<option value="����� �����">Coreea de Sud</option>
											<option value="��������">Crotia</option>
											<option value="�����">Danemarca</option>

											<option value="������">Egipt</option>
											<option value="���������">Elvetia</option>
											<option value="�.�.�.">Emiratele Arabe</option>
											<option value="�������">Estonia</option>
											<option value="���������">Finlanda</option>
											<option value="�������">Franta</option>

											<option value="������">Georgia</option>
											<option value="��������">Germania </option>
											<option value="������">Grecia</option>
											<option value="�����">India</option>
											<option value="��������">Iordania</option>
											<option value="����">Irak</option>

											<option value="����">Iran</option>
											<option value="��������">Irlanda</option>
											<option value="��������">Islanda</option>
											<option value="�������">Israel</option>
											<option value="������">Italia</option>
											<option value="������">Japonia</option>

											<option value="���������">Kazahstan</option>
											<option value="����������">Kirghizstan</option>
											<option value="������">Letonia</option>
											<option value="�����">Liban</option>
											<option value="�����">Lituania</option>
											<option value="����������">Luxemburg</option>

											<option value="���������">Macedonia</option>
											<option value="��������">Malaezia</option>
											<option value="������">Malta</option>
											<option value="��������������">Marea Britanie</option>
											<option value="�������">Mexic</option>
											<option value="�������">Moldova</option>

											<option value="��������">Mongolia</option>
											<option value="����������">Muntenegru</option>
											<option value="������">Myanma</option>
											<option value="�����">Nepal</option>
											<option value="��������">Norvegia</option>
											<option value="����������">Olanda</option>

											<option value="������">Polonia</option>
											<option value="����������">Portugalia</option>
											<option value="�������">Romania</option>
											<option value="������">Rusia</option>
											<option value="������">Serbia</option>
											<option value="���������">Silandia (Bangladesh)</option>

											<option value="��������">Singapore</option>
											<option value="�����">Siria</option>
											<option value="��������">Slovacia</option>
											<option value="��������">Slovenia</option>
											<option value="�������">Spania </option>
											<option value="���-�����">Sri Lanka</option>

											<option value="���">SUA</option>
											<option value="������">Suedia</option>
											<option value="�������">Tailanda</option>
											<option value="�����������">Tajikistan</option>
											<option value="����������">Tarile de jos</option>
											<option value="������">Turcia</option>

											<option value="������������">Turkmenistan</option>
											<option value="�������">Ucraina</option>
											<option value="�������">Ungaria</option>
											<option value="����������">Uzbekistan</option>
											<option value="�������">Vietnam</option>
											<option value="�����">Yemen</option>
';}



                                    elseif($mosConfig_lang == 'english') { echo '
                                    	<option value="">- choose the country -</option>
											<option value="����������">Afghanistan</option>
											<option value="�����������">Azerbaijan</option>
											<option value="�������">Albania</option>
											<option value="�������">Andorra</option>
											<option value="�������">Armenia</option>
											<option value="�������">Austria</option>

											<option value="��������">Belarus</option>
											<option value="�������">Belgium</option>
											<option value="������/�����������">Bosnia &amp; Herzegovina</option>
											<option value="��������">Bulgaria</option>
											<option value="������">Canada</option>
											<option value="�����">China</option>

											<option value="��������">Croatia</option>
											<option value="����">Cyprus</option>
											<option value="�����">Czech Republic</option>
											<option value="�����">Denmark</option>
											<option value="������">Egypt</option>
											<option value="�������">Estonia</option>

											<option value="���������">Finland</option>
											<option value="�������">France</option>
											<option value="������">Georgia</option>
											<option value="��������">Germany</option>
											<option value="������">Greece</option>
											<option value="�������">Hungary</option>

											<option value="��������">Iceland</option>
											<option value="�����">India</option>
											<option value="����">Iran</option>
											<option value="����">Iraq</option>
											<option value="��������">Ireland</option>
											<option value="�������">Israel</option>

											<option value="������">Italy</option>
											<option value="������">Japan</option>
											<option value="��������">Jordan</option>
											<option value="���������">Kazakhstan</option>
											<option value="����������">Kyrgyzstan</option>
											<option value="������">Latvia</option>

											<option value="�����">Lebanon</option>
											<option value="�����">Lithuania</option>
											<option value="����������">Luxembourg</option>
											<option value="���������">Macedonia</option>
											<option value="��������">Malaysia</option>
											<option value="������">Malta</option>

											<option value="�������">Mexico</option>
											<option value="�������">Moldova</option>
											<option value="��������">Mongolia</option>
											<option value="����������">Montenegro</option>
											<option value="������">Myanmar</option>
											<option value="�����">Nepal</option>

											<option value="����������">Netherlands</option>
											<option value="����������">Netherlands Antilles</option>
											<option value="�������� �����">North Korea</option>
											<option value="����">Northern Cyprus</option>
											<option value="��������">Norway</option>
											<option value="������">Poland</option>

											<option value="����������">Portugal</option>
											<option value="�������">Romania</option>
											<option value="������">Russia</option>
											<option value="��������">Singapore</option>
											<option value="��������">Slovakia</option>
											<option value="��������">Slovenia</option>

											<option value="����� �����">South Korea</option>
											<option value="�������">Spain</option>
											<option value="���-�����">Sri Lanka</option>
											<option value="������">Sweden</option>
											<option value="���������">Switzerland</option>
											<option value="�����">Syria</option>

											<option value="�����������">Tajikistan</option>
											<option value="�������">Thailand</option>
											<option value="������">Turkey</option>
											<option value="������������">Turkmenistan</option>
											<option value="�������">Ukraine</option>
											<option value="�.�.�.">United Arab Emirates</option>

											<option value="��������������">United Kingdom</option>
											<option value="���">USA</option>
											<option value="����������">Uzbekistan</option>
											<option value="�������">Vietnam</option>
											<option value="�����">Yemen (Arab Republic)</option>
';}
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
<?php

 if($mosConfig_lang == 'russian') { echo'
                                            <option value="">- ������� ��� ����� -</option>
                                            <option value="��������">��������</option>
                                            <option value="����������� �������">����������� �������</option>
                                            <option value="�������������� �������">�������������� �������</option>
                                            <option value="������">������</option>
                                            <option value="�������">�������</option>
                                            <option value="������� �������">������� �������</option>
                                            <option value="������� �����">������� �����</option>
                                            <option value="�����������">�����������</option>
                                            <option value="�����">�����</option>
                                            <option value="���">���</option>
                                            <option value="�����">�����</option>
                                            <option value="���������">���������</option>
                                            <option value="��������� �����">��������� �����</option>
                                            <option value="���">���</option>
                                            <option value="����� � ������">����� � ������</option>
                                            <option value="������� �� ����">������� �� ����</option>
                                            <option value="������� �� �������">������� �� �������</option>
                                            <option value="������� �� ������">������� �� ������</option>
                                            <option value="������">������</option>
                                            <option value="������">������</option>
                                            <option value="����. ������">����. ������</option>
                                            <option value="������">������</option>
                                            <option value="�����">�����</option>
                                            <option value="����������">����������</option>
                                            <option value="������������ �������">������������ �������</option>
                                            <option value="��������">��������</option>
                                            <option value="��������� 20���">��������� 20���</option>
                                            <option value="��������� 40���">��������� 40���</option>
                                            <option value="����">����</option>
                                            <option value="����������">����������</option>
                                            <option value="������">������</option>
                                            <option value="�����������">�����������</option>
                                            <option value="������">������</option>
                                            <option value="����������">����������</option>
                                            <option value="�������">�������</option>
                                            <option value="������ �����">������ �����</option>
                                            <option value="���������">���������</option>
                                            <option value="����">����</option>
                                            <option value="����">����</option>
                                            <option value="�������">�������</option>
                                            <option value="�������">�������</option>
                                            <option value="�������������">�������������</option>
                                            <option value="������������ � �����">������������ � �����</option>
                                            <option value="�����">�����</option>
                                            <option value="�����">�����</option>
                                            <option value="������">������</option>
                                            <option value="���������� � ���������">���������� � ���������</option>
                                            <option value="���������">���������</option>
                                            <option value="����">����</option>
                                            <option value="�������������">�������������</option>
                                            <option value="�������">�������</option>
                                            <option value="�������">�������</option>
                                            <option value="�������� �������">�������� �������</option>
                                            <option value="�����">�����</option>
                                            <option value="����">����</option>
                                            <option value="����������">����������</option>
                                            <option value="�����">�����</option>
                                            <option value="������� ����">������� ����</option>
                                            <option value="����">����</option>
                                            <option value="������ � ������">������ � ������</option>
                                            <option value="��������������">��������������</option>
                                            <option value="�������� �������">�������� �������</option>
                                            <option value="���� � ��������">���� � ��������</option>
                                            <option value="��������">��������</option>
                                            <option value="���">���</option>
                                            <option value="����">����</option>
                                            <option value="������������ ��������">������������ ��������</option>
                                            <option value="�����">�����</option>
                                            <option value="���������">���������</option>
                                            <option value="����������">����������</option>
                                            <option value="������">������</option>
                                            <option value="������">������</option>
                                            <option value="���. ��������">���. ��������</option>
                                            <option value="���. �������� ���������">���. �������� ���������</option>
                                            <option value="���������">���������</option>
                                            <option value="����������� ������������">����������� ������������</option>
                                            <option value="������">������</option>
                                            <option value="�����">�����</option>
                                            <option value="����� ������������">����� ������������</option>
                                            <option value="�����������">�����������</option>
                                            <option value="�����">�����</option>
                                            <option value="������">������</option>
                                        </select> ';
									}   elseif($mosConfig_lang == 'english') { echo'
                                            <option value="">- chose the cargo type -</option>
                                            <option value="��������">Envelopes</option>
											<option value="����������� �������">Alcoholic beverage</option>
											<option value="�������������� �������">Alcohol-free beverage</option>
											<option value="������">Paper</option>
											<option value="�������">Bottles</option>
											<option value="������� �������">Household appliances</option>
											<option value="������� �����">Household chemicals</option>
											<option value="�����������">Fluted board</option>
											<option value="�����">Mushrooms</option>
											<option value="���">Fiber-building boards</option>
											<option value="�����">Wood boards</option>

											<option value="���������">Woody tissue</option>
											<option value="��������� �����">Charcoals</option>
											<option value="���">Flake boards</option>
											<option value="����� � ������">Grains and seeds</option>
											<option value="������� �� ����">Leather goods</option>
											<option value="������� �� �������">Metal works</option>

											<option value="������� �� ������">Rubber articles</option>
											<option value="������">Cable</option>
											<option value="������">Casein</option>
											<option value="����. ������">Office supplies</option>
											<option value="������">Bricks</option>
											<option value="�����">Carpets</option>

											<option value="����������">Computers</option>
											<option value="������������ �������">Confectionery </option>
											<option value="��������">Conserves (canned food)</option>
											<option value="��������� 20���">Container of 20 foot</option>
											<option value="��������� 40���">Container of 40 foot</option>
                                            <option value="����">Laminated chip board</option>

                                            <option value="����������">Waste paper</option>
                                            <option value="������">Furniture</option>
                                            <option value="�����������">Medicines</option>
                                            <option value="������">Metal</option>
                                            <option value="����������">Waste metal</option>
                                            <option value="�������">Mineral wool</option>

                                            <option value="������ �����">Milk powder</option>
                                            <option value="���������">Ice-cream</option>
                                            <option value="����">Flour </option>
                                            <option value="����">Meat</option>
                                            <option value="�������">Beverages</option>
                                            <option value="�������������">Oil products</option>

                                            <option value="������������ � �����">Equipment and spare parts</option>
                                            <option value="�����">Shoes</option>
                                            <option value="�����">Vegetables </option>
											<option value="������">Clothes </option>
											<option value="���������� � ���������">Perfumes and makeup</option>
											<option value="���������">Foamed plastics</option>

											<option value="����">Beer</option>
											<option value="�������������">Board lumber</option>
											<option value="�������">Plastic</option>
											<option value="�������">Palettes</option>
											<option value="�������� �������">Food stuff</option>
											<option value="�����">Poultry</option>

											<option value="����">Fish</option>
											<option value="����������">Plumbing equipment</option>
											<option value="�����">Sugar </option>
											<option value="������� ����">Joint cargo</option>
											<option value="����">Juices</option>
											<option value="������ � ������">Glass works and porcelain</option>

											<option value="��������������">Construction materials</option>
											<option value="�������� �������">Tobacco products</option>
											<option value="���� � ��������">Containers and packages</option>
											<option value="��������">Textile </option>
											<option value="���">Consumer goods</option>
											<option value="����">Turf</option>

											<option value="������������ ��������">Transport vehicles</option>
											<option value="�����">Pipes</option>
											<option value="���������">Fertilizer materials</option>
											<option value="����������">Insulators</option>
											<option value="������">Plywood</option>
											<option value="������">Fruits</option>

											<option value="���. ��������">Chemical products</option>
											<option value="���. �������� ���������">Unhazardous chemical products</option>
											<option value="���������">Household products</option>
											<option value="����������� ������������">Refrigerating equipment </option>
											<option value="������">Cement</option>
											<option value="�����">Chips</option>

											<option value="����� ������������">Wet-sated hide</option>
											<option value="�����������">Electronic devices</option>
											<option value="�����">Berries</option>
											<option value="������">Other</option>';
										} elseif ($mosConfig_lang == 'romanian') { echo '
                                            <option value="">- indicati tipul de incarcatura -</option>
                                            <option value="���� � ��������">Ambalaje</option>
											<option value="��������">Anvelope auto</option>
											<option value="����. ������">Articole de birou</option>
											<option value="���������� � ���������">Articole de cosmetica si parfumerie</option>
											<option value="������� �� ������">Articole din cauciuc</option>

											<option value="������� �� �������">Articole din metal</option>
											<option value="������� �� ����">Articole din piele</option>
											<option value="�������">Bauturi</option>
											<option value="����������� �������">Bauturi alcoolice</option>
											<option value="�������������� �������">Bauturi nealcoolice</option>
											<option value="����">Bere</option>

											<option value="�������">Butelii</option>
											<option value="������">Cablu</option>
											<option value="����������">Calculatoare</option>
											<option value="������">Caramida</option>
											<option value="��������� �����">Carbune de lemn</option>
											<option value="����">Carne</option>

											<option value="�����������">Carton ondulat</option>
											<option value="����� � ������">Cereale si seminte</option>
											<option value="�������������">Cherestea</option>
											<option value="�����">Chipsuri</option>
											<option value="������">Ciment</option>
											<option value="�����">Ciuperci</option>

											<option value="��������">Conserve</option>
											<option value="��������� 20���">Container de 20 picioare</option>
											<option value="��������� 40���">Container de 40 picioare</option>
											<option value="�����">Covoare</option>
											<option value="������� �������">Electrocasnice</option>
											<option value="����">Faina</option>

											<option value="����������">Fier uzat</option>
											<option value="������">Fructe</option>
											<option value="������">Hartie</option>
											<option value="����������">Izolant termic</option>
											<option value="������">Imbracaminte</option>

											<option value="������� ����">Incarcatura mixta</option>
											<option value="���������">Inghetata</option>
											<option value="���������">Ingrasaminte</option>
											<option value="������ �����">Lapte praf</option>
											<option value="�����">Legume</option>
											<option value="����������">Maculatura</option>

											<option value="���">Marfuri de larg consum</option>
											<option value="���������">Marfuri de uz gospodaresc</option>
											<option value="���������">Material lemnos</option>
											<option value="�������">Material plastic</option>
											<option value="���������">Material plastic expandat</option>
											<option value="��������������">Materiale de constructie</option>

											<option value="�����������">Medicamente</option>
											<option value="������">Metal</option>
											<option value="������������ ��������">Mijloace de transport</option>
											<option value="������">Mobila</option>
											<option value="�����">Pasari</option>
											<option value="����">Peste</option>

											<option value="����� ������������">Piei crude sarate</option>
											<option value="������������ � �����">Piese si utilaje</option>
											<option value="������">Placaj</option>
											<option value="���">Placi aglomerate din aschii de lemn</option>
											<option value="����">Placi aglomerate din aschii de lemn laminat</option>
											<option value="���">Placi fibrolemnoase</option>

											<option value="�����">Platouri</option>
											<option value="�������� �������">Produse alimentare</option>
											<option value="���. ��������">Produse chimice</option>
											<option value="���. �������� ���������">Produse chimice inofensive</option>
											<option value="������� �����">Produse chimice pentru uz casnic</option>
											<option value="������������ �������">Produse de patiserie</option>

											<option value="�������� �������">Produse de tutungerie</option>
											<option value="�������������">Produse petroliere</option>
											<option value="�����">Scandura </option>
											<option value="������ � ������">Sticla si portelanuri</option>
											<option value="�����">Struguri</option>
											<option value="����">Sucuri</option>

											<option value="�����������">Tehnica electronica</option>
											<option value="����������">Tehnica sanitara</option>
											<option value="�����">Tevi</option>
											<option value="��������">Textile</option>
											<option value="����">Turba</option>
											<option value="����������� ������������">Utilaj frigorific</option>

											<option value="�������">Vata minerala</option>
											<option value="�����">Zahar</option>
											<option value="������">Altele</option>';
										}
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
 <?php if($mosConfig_lang == 'russian') { echo '
                                            <option value="">- ������� �����/����� -</option>
                                            <option value="�� 0,500��., �� 20���">�� 0,500��., �� 20���.</option>
                                            <option value="�� 1�., �� 25���.">�� 1�., �� 25���. </option>
                                            <option value="�� 3�., �� 30���.">�� 3�., �� 30���.</option>
                                            <option value="�� 5�., �� 50���.">�� 5�., �� 50���.</option>
                                            <option value="�� 10�., �� 86���.">�� 10�., �� 86���.</option>
                                            <option value="�� 20�., �� 90���.">�� 20�., �� 90���. </option>
                                            <option value="�� 20�., �� 120���.">�� 20�., �� 120���. </option>
                                        ';}

                                        elseif ($mosConfig_lang == 'romanian') { echo '
                                            <option value="">- selectati Volumul/greutatea -</option>
											<option value="�� 0,500��., �� 20���.">de la 0,500kg., de la 20cub.</option>
											<option value="�� 1�., �� 25���.">de la 1t., de la 25cub. </option>
											<option value="�� 3�., �� 30���.">de la 3t., de la 30cub.</option>
											<option value="�� 5�., �� 50���.">de la 5t., de la 50cub.</option>

											<option value="�� 10�., �� 86���.">de la 10t., de la 86cub.</option>
											<option value="�� 20�., �� 90���.">de la 20t., de la 90cub. </option>
											<option value="�� 20�., �� 120���.">de la 20t., de la 120cub. </option>
                                        ' ;}

                                        elseif ($mosConfig_lang == 'english') { echo '
                                            <option value="">- choose size/weight -</option>
											<option value="�� 0,500��., �� 20���.">up to 0,500 kg., up to 20 cub</option>
											<option value="�� 1�., �� 25���.">up to 1t., up to 25 cub </option>
											<option value="�� 3�., �� 30���.">up to 3t., up to 30 cub </option>
											<option value="�� 5�., �� 50���.">up to 5t., up to 50 cub</option>

											<option value="�� 10�., �� 86���.">up to 10t., up to 86 cub</option>
											<option value="�� 20�., �� 90���.">up to 20t., up to 90 cub</option>
											<option value="�� 20�., �� 120���.">up to 20t., up to 120 cub </option>
                                        ';}
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
								?>" id="submit" style="float:left;background-image:url(<?php echo $tmpTools->baseurl(); ?>/templates/ja_mesolite/images/button_back.png);background-repeat:repeat-x;height:31px;line-height:31px;width:100px;border:0;color:white;"/>
	<div class="button_right"></div>
	</td>
</tr>

</table>
</form>
</div>

<!--   ����� ����������  END  -->






<!--    ��������� ��������� ���������  -->
<h1 onclick="look('calculate_transportation_form'); return false;"><?php if($mosConfig_lang == 'russian') { echo "��������� ��������� ���������"; }
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
<?php if($mosConfig_lang == 'russian') { echo '
                                    	<option value="">- ������� ������ -</option>
                                        <option value="�������">�������</option>
                                        <option value="�����������">�����������</option>
                                        <option value="�������">�������</option>
                                        <option value="�������">�������</option>
                                        <option value="�������">�������</option>
                                        <option value="����������">����������</option>
                                        <option value="��������">��������</option>
                                        <option value="�������">�������</option>
                                        <option value="��������">��������</option>
                                        <option value="������/�����������">������ � �����������</option>
                                        <option value="��������������">��������������</option>
                                        <option value="�������">�������</option>
                                        <option value="�������">�������</option>
                                        <option value="��������">��������</option>
                                        <option value="��������">��������</option>
                                        <option value="������">������</option>
                                        <option value="������">������</option>
                                        <option value="�����">�����</option>
                                        <option value="������">������</option>
                                        <option value="�������">�������</option>
                                        <option value="�����">�����</option>
                                        <option value="��������">��������</option>
                                        <option value="����">����</option>
                                        <option value="����">����</option>
                                        <option value="��������">��������</option>
                                        <option value="��������">��������</option>
                                        <option value="�������">�������</option>
                                        <option value="������">������</option>
                                        <option value="�����">�����</option>
                                        <option value="���������">���������</option>
                                        <option value="������">������</option>
                                        <option value="������">������</option>
                                        <option value="����">����</option>
                                        <option value="�����">�����</option>
                                        <option value="�������� �����">����� ��������</option>
                                        <option value="����� �����">����� �����</option>
                                        <option value="����������">����������</option>
                                        <option value="������">������</option>
                                        <option value="�����">�����</option>
                                        <option value="�����">�����</option>
                                        <option value="����������">����������</option>
                                        <option value="���������">���������</option>
                                        <option value="��������">��������</option>
                                        <option value="������">������</option>
                                        <option value="�������">�������</option>
                                        <option value="�������">�������</option>
                                        <option value="��������">��������</option>
                                        <option value="������">������</option>
                                        <option value="�����">�����</option>
                                        <option value="����������">����������</option>
                                        <option value="��������">��������</option>
                                        <option value="�.�.�.">�� �������</option>
                                        <option value="������">������</option>
                                        <option value="����������">����������</option>
                                        <option value="������">������</option>
                                        <option value="�������">�������</option>
                                        <option value="��������">�������� ����</option>
                                        <option value="������">������</option>
                                        <option value="��������">��������</option>
                                        <option value="��������">��������</option>
                                        <option value="�����">�����</option>
                                        <option value="��������">��������</option>
                                        <option value="��������">��������</option>
                                        <option value="���">���</option>
                                        <option value="�����������">�����������</option>
                                        <option value="�������">�������</option>
                                        <option value="������������">������������</option>
                                        <option value="������">������</option>
                                        <option value="����������">����������</option>
                                        <option value="�������">�������</option>
                                        <option value="���������">���������</option>
                                        <option value="�������">�������</option>
                                        <option value="��������">��������</option>
                                        <option value="����������">����������</option>
                                        <option value="�����">�����</option>
                                        <option value="���������">���������</option>
                                        <option value="������">������</option>
                                        <option value="���-�����">���-�����</option>
                                        <option value="�������">�������</option>
                                        <option value="������">������</option>

';}

                                    elseif($mosConfig_lang == 'romanian') { echo '
											<option value="">- alegeti tara  -</option>
											<option value="����������">Afganistan</option>
											<option value="�������">Albania</option>

											<option value="�������">Andora</option>
											<option value="�������">Armenia</option>
											<option value="�������">Austria</option>
											<option value="�����������">Azerbaijan</option>
											<option value="��������">Belarus</option>
											<option value="�������">Belgia</option>

											<option value="������/�����������">Bosnia si Hertegovina</option>
											<option value="��������">Bulgaria</option>
											<option value="������">Canada</option>
											<option value="�����">Cehia</option>
											<option value="�����">China</option>

											<option value="����">Cipru</option>
											<option value="�������� �����">Coreea de Nord</option>
											<option value="����� �����">Coreea de Sud</option>
											<option value="��������">Crotia</option>
											<option value="�����">Danemarca</option>

											<option value="������">Egipt</option>
											<option value="���������">Elvetia</option>
											<option value="�.�.�.">Emiratele Arabe</option>
											<option value="�������">Estonia</option>
											<option value="���������">Finlanda</option>
											<option value="�������">Franta</option>

											<option value="������">Georgia</option>
											<option value="��������">Germania </option>
											<option value="������">Grecia</option>
											<option value="�����">India</option>
											<option value="��������">Iordania</option>
											<option value="����">Irak</option>

											<option value="����">Iran</option>
											<option value="��������">Irlanda</option>
											<option value="��������">Islanda</option>
											<option value="�������">Israel</option>
											<option value="������">Italia</option>
											<option value="������">Japonia</option>

											<option value="���������">Kazahstan</option>
											<option value="����������">Kirghizstan</option>
											<option value="������">Letonia</option>
											<option value="�����">Liban</option>
											<option value="�����">Lituania</option>
											<option value="����������">Luxemburg</option>

											<option value="���������">Macedonia</option>
											<option value="��������">Malaezia</option>
											<option value="������">Malta</option>
											<option value="��������������">Marea Britanie</option>
											<option value="�������">Mexic</option>
											<option value="�������">Moldova</option>

											<option value="��������">Mongolia</option>
											<option value="����������">Muntenegru</option>
											<option value="������">Myanma</option>
											<option value="�����">Nepal</option>
											<option value="��������">Norvegia</option>
											<option value="����������">Olanda</option>

											<option value="������">Polonia</option>
											<option value="����������">Portugalia</option>
											<option value="�������">Romania</option>
											<option value="������">Rusia</option>
											<option value="������">Serbia</option>
											<option value="���������">Silandia (Bangladesh)</option>

											<option value="��������">Singapore</option>
											<option value="�����">Siria</option>
											<option value="��������">Slovacia</option>
											<option value="��������">Slovenia</option>
											<option value="�������">Spania </option>
											<option value="���-�����">Sri Lanka</option>

											<option value="���">SUA</option>
											<option value="������">Suedia</option>
											<option value="�������">Tailanda</option>
											<option value="�����������">Tajikistan</option>
											<option value="����������">Tarile de jos</option>
											<option value="������">Turcia</option>

											<option value="������������">Turkmenistan</option>
											<option value="�������">Ucraina</option>
											<option value="�������">Ungaria</option>
											<option value="����������">Uzbekistan</option>
											<option value="�������">Vietnam</option>
											<option value="�����">Yemen</option>
';}



                                    elseif($mosConfig_lang == 'english') { echo '
                                    	<option value="">- choose the country -</option>
											<option value="����������">Afghanistan</option>
											<option value="�����������">Azerbaijan</option>
											<option value="�������">Albania</option>
											<option value="�������">Andorra</option>
											<option value="�������">Armenia</option>
											<option value="�������">Austria</option>

											<option value="��������">Belarus</option>
											<option value="�������">Belgium</option>
											<option value="������/�����������">Bosnia &amp; Herzegovina</option>
											<option value="��������">Bulgaria</option>
											<option value="������">Canada</option>
											<option value="�����">China</option>

											<option value="��������">Croatia</option>
											<option value="����">Cyprus</option>
											<option value="�����">Czech Republic</option>
											<option value="�����">Denmark</option>
											<option value="������">Egypt</option>
											<option value="�������">Estonia</option>

											<option value="���������">Finland</option>
											<option value="�������">France</option>
											<option value="������">Georgia</option>
											<option value="��������">Germany</option>
											<option value="������">Greece</option>
											<option value="�������">Hungary</option>

											<option value="��������">Iceland</option>
											<option value="�����">India</option>
											<option value="����">Iran</option>
											<option value="����">Iraq</option>
											<option value="��������">Ireland</option>
											<option value="�������">Israel</option>

											<option value="������">Italy</option>
											<option value="������">Japan</option>
											<option value="��������">Jordan</option>
											<option value="���������">Kazakhstan</option>
											<option value="����������">Kyrgyzstan</option>
											<option value="������">Latvia</option>

											<option value="�����">Lebanon</option>
											<option value="�����">Lithuania</option>
											<option value="����������">Luxembourg</option>
											<option value="���������">Macedonia</option>
											<option value="��������">Malaysia</option>
											<option value="������">Malta</option>

											<option value="�������">Mexico</option>
											<option value="�������">Moldova</option>
											<option value="��������">Mongolia</option>
											<option value="����������">Montenegro</option>
											<option value="������">Myanmar</option>
											<option value="�����">Nepal</option>

											<option value="����������">Netherlands</option>
											<option value="����������">Netherlands Antilles</option>
											<option value="�������� �����">North Korea</option>
											<option value="����">Northern Cyprus</option>
											<option value="��������">Norway</option>
											<option value="������">Poland</option>

											<option value="����������">Portugal</option>
											<option value="�������">Romania</option>
											<option value="������">Russia</option>
											<option value="��������">Singapore</option>
											<option value="��������">Slovakia</option>
											<option value="��������">Slovenia</option>

											<option value="����� �����">South Korea</option>
											<option value="�������">Spain</option>
											<option value="���-�����">Sri Lanka</option>
											<option value="������">Sweden</option>
											<option value="���������">Switzerland</option>
											<option value="�����">Syria</option>

											<option value="�����������">Tajikistan</option>
											<option value="�������">Thailand</option>
											<option value="������">Turkey</option>
											<option value="������������">Turkmenistan</option>
											<option value="�������">Ukraine</option>
											<option value="�.�.�.">United Arab Emirates</option>

											<option value="��������������">United Kingdom</option>
											<option value="���">USA</option>
											<option value="����������">Uzbekistan</option>
											<option value="�������">Vietnam</option>
											<option value="�����">Yemen (Arab Republic)</option>
';}
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
<?php if($mosConfig_lang == 'russian') { echo '
                                    	<option value="">- ������� ������ -</option>
                                        <option value="�������">�������</option>
                                        <option value="�����������">�����������</option>
                                        <option value="�������">�������</option>
                                        <option value="�������">�������</option>
                                        <option value="�������">�������</option>
                                        <option value="����������">����������</option>
                                        <option value="��������">��������</option>
                                        <option value="�������">�������</option>
                                        <option value="��������">��������</option>
                                        <option value="������/�����������">������ � �����������</option>
                                        <option value="��������������">��������������</option>
                                        <option value="�������">�������</option>
                                        <option value="�������">�������</option>
                                        <option value="��������">��������</option>
                                        <option value="��������">��������</option>
                                        <option value="������">������</option>
                                        <option value="������">������</option>
                                        <option value="�����">�����</option>
                                        <option value="������">������</option>
                                        <option value="�������">�������</option>
                                        <option value="�����">�����</option>
                                        <option value="��������">��������</option>
                                        <option value="����">����</option>
                                        <option value="����">����</option>
                                        <option value="��������">��������</option>
                                        <option value="��������">��������</option>
                                        <option value="�������">�������</option>
                                        <option value="������">������</option>
                                        <option value="�����">�����</option>
                                        <option value="���������">���������</option>
                                        <option value="������">������</option>
                                        <option value="������">������</option>
                                        <option value="����">����</option>
                                        <option value="�����">�����</option>
                                        <option value="�������� �����">����� ��������</option>
                                        <option value="����� �����">����� �����</option>
                                        <option value="����������">����������</option>
                                        <option value="������">������</option>
                                        <option value="�����">�����</option>
                                        <option value="�����">�����</option>
                                        <option value="����������">����������</option>
                                        <option value="���������">���������</option>
                                        <option value="��������">��������</option>
                                        <option value="������">������</option>
                                        <option value="�������">�������</option>
                                        <option value="�������">�������</option>
                                        <option value="��������">��������</option>
                                        <option value="������">������</option>
                                        <option value="�����">�����</option>
                                        <option value="����������">����������</option>
                                        <option value="��������">��������</option>
                                        <option value="�.�.�.">�� �������</option>
                                        <option value="������">������</option>
                                        <option value="����������">����������</option>
                                        <option value="������">������</option>
                                        <option value="�������">�������</option>
                                        <option value="��������">�������� ����</option>
                                        <option value="������">������</option>
                                        <option value="��������">��������</option>
                                        <option value="��������">��������</option>
                                        <option value="�����">�����</option>
                                        <option value="��������">��������</option>
                                        <option value="��������">��������</option>
                                        <option value="���">���</option>
                                        <option value="�����������">�����������</option>
                                        <option value="�������">�������</option>
                                        <option value="������������">������������</option>
                                        <option value="������">������</option>
                                        <option value="����������">����������</option>
                                        <option value="�������">�������</option>
                                        <option value="���������">���������</option>
                                        <option value="�������">�������</option>
                                        <option value="��������">��������</option>
                                        <option value="����������">����������</option>
                                        <option value="�����">�����</option>
                                        <option value="���������">���������</option>
                                        <option value="������">������</option>
                                        <option value="���-�����">���-�����</option>
                                        <option value="�������">�������</option>
                                        <option value="������">������</option>

';}

                                    elseif($mosConfig_lang == 'romanian') { echo '
											<option value="">- alegeti tara  -</option>
											<option value="����������">Afganistan</option>
											<option value="�������">Albania</option>

											<option value="�������">Andora</option>
											<option value="�������">Armenia</option>
											<option value="�������">Austria</option>
											<option value="�����������">Azerbaijan</option>
											<option value="��������">Belarus</option>
											<option value="�������">Belgia</option>

											<option value="������/�����������">Bosnia si Hertegovina</option>
											<option value="��������">Bulgaria</option>
											<option value="������">Canada</option>
											<option value="�����">Cehia</option>
											<option value="�����">China</option>

											<option value="����">Cipru</option>
											<option value="�������� �����">Coreea de Nord</option>
											<option value="����� �����">Coreea de Sud</option>
											<option value="��������">Crotia</option>
											<option value="�����">Danemarca</option>

											<option value="������">Egipt</option>
											<option value="���������">Elvetia</option>
											<option value="�.�.�.">Emiratele Arabe</option>
											<option value="�������">Estonia</option>
											<option value="���������">Finlanda</option>
											<option value="�������">Franta</option>

											<option value="������">Georgia</option>
											<option value="��������">Germania </option>
											<option value="������">Grecia</option>
											<option value="�����">India</option>
											<option value="��������">Iordania</option>
											<option value="����">Irak</option>

											<option value="����">Iran</option>
											<option value="��������">Irlanda</option>
											<option value="��������">Islanda</option>
											<option value="�������">Israel</option>
											<option value="������">Italia</option>
											<option value="������">Japonia</option>

											<option value="���������">Kazahstan</option>
											<option value="����������">Kirghizstan</option>
											<option value="������">Letonia</option>
											<option value="�����">Liban</option>
											<option value="�����">Lituania</option>
											<option value="����������">Luxemburg</option>

											<option value="���������">Macedonia</option>
											<option value="��������">Malaezia</option>
											<option value="������">Malta</option>
											<option value="��������������">Marea Britanie</option>
											<option value="�������">Mexic</option>
											<option value="�������">Moldova</option>

											<option value="��������">Mongolia</option>
											<option value="����������">Muntenegru</option>
											<option value="������">Myanma</option>
											<option value="�����">Nepal</option>
											<option value="��������">Norvegia</option>
											<option value="����������">Olanda</option>

											<option value="������">Polonia</option>
											<option value="����������">Portugalia</option>
											<option value="�������">Romania</option>
											<option value="������">Rusia</option>
											<option value="������">Serbia</option>
											<option value="���������">Silandia (Bangladesh)</option>

											<option value="��������">Singapore</option>
											<option value="�����">Siria</option>
											<option value="��������">Slovacia</option>
											<option value="��������">Slovenia</option>
											<option value="�������">Spania </option>
											<option value="���-�����">Sri Lanka</option>

											<option value="���">SUA</option>
											<option value="������">Suedia</option>
											<option value="�������">Tailanda</option>
											<option value="�����������">Tajikistan</option>
											<option value="����������">Tarile de jos</option>
											<option value="������">Turcia</option>

											<option value="������������">Turkmenistan</option>
											<option value="�������">Ucraina</option>
											<option value="�������">Ungaria</option>
											<option value="����������">Uzbekistan</option>
											<option value="�������">Vietnam</option>
											<option value="�����">Yemen</option>
';}



                                    elseif($mosConfig_lang == 'english') { echo '
                                    	<option value="">- choose the country -</option>
											<option value="����������">Afghanistan</option>
											<option value="�����������">Azerbaijan</option>
											<option value="�������">Albania</option>
											<option value="�������">Andorra</option>
											<option value="�������">Armenia</option>
											<option value="�������">Austria</option>

											<option value="��������">Belarus</option>
											<option value="�������">Belgium</option>
											<option value="������/�����������">Bosnia &amp; Herzegovina</option>
											<option value="��������">Bulgaria</option>
											<option value="������">Canada</option>
											<option value="�����">China</option>

											<option value="��������">Croatia</option>
											<option value="����">Cyprus</option>
											<option value="�����">Czech Republic</option>
											<option value="�����">Denmark</option>
											<option value="������">Egypt</option>
											<option value="�������">Estonia</option>

											<option value="���������">Finland</option>
											<option value="�������">France</option>
											<option value="������">Georgia</option>
											<option value="��������">Germany</option>
											<option value="������">Greece</option>
											<option value="�������">Hungary</option>

											<option value="��������">Iceland</option>
											<option value="�����">India</option>
											<option value="����">Iran</option>
											<option value="����">Iraq</option>
											<option value="��������">Ireland</option>
											<option value="�������">Israel</option>

											<option value="������">Italy</option>
											<option value="������">Japan</option>
											<option value="��������">Jordan</option>
											<option value="���������">Kazakhstan</option>
											<option value="����������">Kyrgyzstan</option>
											<option value="������">Latvia</option>

											<option value="�����">Lebanon</option>
											<option value="�����">Lithuania</option>
											<option value="����������">Luxembourg</option>
											<option value="���������">Macedonia</option>
											<option value="��������">Malaysia</option>
											<option value="������">Malta</option>

											<option value="�������">Mexico</option>
											<option value="�������">Moldova</option>
											<option value="��������">Mongolia</option>
											<option value="����������">Montenegro</option>
											<option value="������">Myanmar</option>
											<option value="�����">Nepal</option>

											<option value="����������">Netherlands</option>
											<option value="����������">Netherlands Antilles</option>
											<option value="�������� �����">North Korea</option>
											<option value="����">Northern Cyprus</option>
											<option value="��������">Norway</option>
											<option value="������">Poland</option>

											<option value="����������">Portugal</option>
											<option value="�������">Romania</option>
											<option value="������">Russia</option>
											<option value="��������">Singapore</option>
											<option value="��������">Slovakia</option>
											<option value="��������">Slovenia</option>

											<option value="����� �����">South Korea</option>
											<option value="�������">Spain</option>
											<option value="���-�����">Sri Lanka</option>
											<option value="������">Sweden</option>
											<option value="���������">Switzerland</option>
											<option value="�����">Syria</option>

											<option value="�����������">Tajikistan</option>
											<option value="�������">Thailand</option>
											<option value="������">Turkey</option>
											<option value="������������">Turkmenistan</option>
											<option value="�������">Ukraine</option>
											<option value="�.�.�.">United Arab Emirates</option>

											<option value="��������������">United Kingdom</option>
											<option value="���">USA</option>
											<option value="����������">Uzbekistan</option>
											<option value="�������">Vietnam</option>
											<option value="�����">Yemen (Arab Republic)</option>
';}
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
<?php if($mosConfig_lang == 'russian') { echo '
                                    	<option value="">- ������� ��� ���������� -</option>
                                    	<option value="����������� ����������">����������� ����������</option>
                                        <option value="������������">������������</option>
                                        <option value="��������� � �������� �����������">��������� � �������� �����������</option>
                                        <option value="����������� ���������� ����������">����������� ���������� ����������</option>
                                        <option value="���� ��������� ����������">���� ��������� ����������</option>
                                        <option value="�������-������� � ��������">�������-������� � ��������</option>
                                        <option value="������� ����-���������">������� ����-���������  </option>
                                        <option value="������������� ����������">������������� ����������</option>
                                        <option value="������� ��� ���������.">������� ��� ���������.</option>
                                        <option value="��������� �������� ����� ADR">��������� �������� ����� ADR</option>
                                        <option value="��������� �������� �����">��������� �������� �����</option>
                                        <option value="��������">��������</option>
                                        <option value="�������� �����, ������">�������� �����, ������</option>
                                        <option value="������� ���������">������� ���������</option>
										<option value="������">������</option>
';}
                                          elseif ($mosConfig_lang == 'romanian') { echo '
										<option value="">- indicati tipul transportului -</option>
										<option value="��������">Autobasculanta</option>
										<option value="�������-������� � ��������">Autotrailer cu remorca</option>

										<option value="��������� � �������� �����������">Autotren cu remorca cu prelata</option>
										<option value="������� ��� ���������.">Bena metalica sau izoterma</option>
										<option value="������������">Camion frigorific</option>
										<option value="�������� �����, ������">Cisterna cilindru, termos</option>
										<option value="������������� ����������">Container auto cu semiremorca</option>
										<option value="����������� ���������� ����������">Mega trailer semiremorca cu prelata</option>

										<option value="������� ����-���������">Remorca carosata cu platforma de tractare</option>
										<option value="����������� ����������">Semiremorca cu prelata</option>
										<option value="���� ��������� ����������">Semiremorca Jumbo carosata</option>
										<option value="��������� �������� �����">Transportare incarcaturi mixte</option>
										<option value="��������� �������� ����� ADR">Transportare marfuri periculoase ADR</option>
										<option value="������� ���������">Transporturi maritime</option>
										<option value="������">Altul</option>
  ';}
                                        elseif ($mosConfig_lang == 'english') { echo  '
										<option value="">- choose transport type -</option>
                                    	<option value="����������� ����������">Tilt-covered semi-trailer</option>
										<option value="������������">Refrigerated trailer</option>
										<option value="��������� � �������� �����������">Tilt-covered road train with a trailer </option>
										<option value="����������� ���������� ����������">Tilt-covered mega trailer </option>

										<option value="���� ��������� ����������">Semi-trailer with Yumbo platform</option>
										<option value="�������-������� � ��������">Car hauler with a trailer </option>
										<option value="������� ����-���������">Troll-platform trailer </option>
										<option value="������������� ����������">Container semi-truck </option>
										<option value="������� ��� ���������.">All-metal and insulated trailer </option>
										<option value="��������� �������� ����� ADR">ADR transportations</option>
										<option value="��������� �������� �����">Joint cargo transportations</option>

										<option value="��������">Tipper</option>
										<option value="�������� �����, ������">Insulated tanker </option>
										<option value="������� ���������">Sea freight </option>
										<option value="������">Other</option>
';}
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
<?php

 if($mosConfig_lang == 'russian') { echo'
                                            <option value="">- ������� ��� ����� -</option>
                                            <option value="��������">��������</option>
                                            <option value="����������� �������">����������� �������</option>
                                            <option value="�������������� �������">�������������� �������</option>
                                            <option value="������">������</option>
                                            <option value="�������">�������</option>
                                            <option value="������� �������">������� �������</option>
                                            <option value="������� �����">������� �����</option>
                                            <option value="�����������">�����������</option>
                                            <option value="�����">�����</option>
                                            <option value="���">���</option>
                                            <option value="�����">�����</option>
                                            <option value="���������">���������</option>
                                            <option value="��������� �����">��������� �����</option>
                                            <option value="���">���</option>
                                            <option value="����� � ������">����� � ������</option>
                                            <option value="������� �� ����">������� �� ����</option>
                                            <option value="������� �� �������">������� �� �������</option>
                                            <option value="������� �� ������">������� �� ������</option>
                                            <option value="������">������</option>
                                            <option value="������">������</option>
                                            <option value="����. ������">����. ������</option>
                                            <option value="������">������</option>
                                            <option value="�����">�����</option>
                                            <option value="����������">����������</option>
                                            <option value="������������ �������">������������ �������</option>
                                            <option value="��������">��������</option>
                                            <option value="��������� 20���">��������� 20���</option>
                                            <option value="��������� 40���">��������� 40���</option>
                                            <option value="����">����</option>
                                            <option value="����������">����������</option>
                                            <option value="������">������</option>
                                            <option value="�����������">�����������</option>
                                            <option value="������">������</option>
                                            <option value="����������">����������</option>
                                            <option value="�������">�������</option>
                                            <option value="������ �����">������ �����</option>
                                            <option value="���������">���������</option>
                                            <option value="����">����</option>
                                            <option value="����">����</option>
                                            <option value="�������">�������</option>
                                            <option value="�������">�������</option>
                                            <option value="�������������">�������������</option>
                                            <option value="������������ � �����">������������ � �����</option>
                                            <option value="�����">�����</option>
                                            <option value="�����">�����</option>
                                            <option value="������">������</option>
                                            <option value="���������� � ���������">���������� � ���������</option>
                                            <option value="���������">���������</option>
                                            <option value="����">����</option>
                                            <option value="�������������">�������������</option>
                                            <option value="�������">�������</option>
                                            <option value="�������">�������</option>
                                            <option value="�������� �������">�������� �������</option>
                                            <option value="�����">�����</option>
                                            <option value="����">����</option>
                                            <option value="����������">����������</option>
                                            <option value="�����">�����</option>
                                            <option value="������� ����">������� ����</option>
                                            <option value="����">����</option>
                                            <option value="������ � ������">������ � ������</option>
                                            <option value="��������������">��������������</option>
                                            <option value="�������� �������">�������� �������</option>
                                            <option value="���� � ��������">���� � ��������</option>
                                            <option value="��������">��������</option>
                                            <option value="���">���</option>
                                            <option value="����">����</option>
                                            <option value="������������ ��������">������������ ��������</option>
                                            <option value="�����">�����</option>
                                            <option value="���������">���������</option>
                                            <option value="����������">����������</option>
                                            <option value="������">������</option>
                                            <option value="������">������</option>
                                            <option value="���. ��������">���. ��������</option>
                                            <option value="���. �������� ���������">���. �������� ���������</option>
                                            <option value="���������">���������</option>
                                            <option value="����������� ������������">����������� ������������</option>
                                            <option value="������">������</option>
                                            <option value="�����">�����</option>
                                            <option value="����� ������������">����� ������������</option>
                                            <option value="�����������">�����������</option>
                                            <option value="�����">�����</option>
                                            <option value="������">������</option>
                                        </select> ';
									}   elseif($mosConfig_lang == 'english') { echo'
                                            <option value="">- chose the cargo type -</option>
                                            <option value="��������">Envelopes</option>
											<option value="����������� �������">Alcoholic beverage</option>
											<option value="�������������� �������">Alcohol-free beverage</option>
											<option value="������">Paper</option>
											<option value="�������">Bottles</option>
											<option value="������� �������">Household appliances</option>
											<option value="������� �����">Household chemicals</option>
											<option value="�����������">Fluted board</option>
											<option value="�����">Mushrooms</option>
											<option value="���">Fiber-building boards</option>
											<option value="�����">Wood boards</option>

											<option value="���������">Woody tissue</option>
											<option value="��������� �����">Charcoals</option>
											<option value="���">Flake boards</option>
											<option value="����� � ������">Grains and seeds</option>
											<option value="������� �� ����">Leather goods</option>
											<option value="������� �� �������">Metal works</option>

											<option value="������� �� ������">Rubber articles</option>
											<option value="������">Cable</option>
											<option value="������">Casein</option>
											<option value="����. ������">Office supplies</option>
											<option value="������">Bricks</option>
											<option value="�����">Carpets</option>

											<option value="����������">Computers</option>
											<option value="������������ �������">Confectionery </option>
											<option value="��������">Conserves (canned food)</option>
											<option value="��������� 20���">Container of 20 foot</option>
											<option value="��������� 40���">Container of 40 foot</option>
                                            <option value="����">Laminated chip board</option>

                                            <option value="����������">Waste paper</option>
                                            <option value="������">Furniture</option>
                                            <option value="�����������">Medicines</option>
                                            <option value="������">Metal</option>
                                            <option value="����������">Waste metal</option>
                                            <option value="�������">Mineral wool</option>

                                            <option value="������ �����">Milk powder</option>
                                            <option value="���������">Ice-cream</option>
                                            <option value="����">Flour </option>
                                            <option value="����">Meat</option>
                                            <option value="�������">Beverages</option>
                                            <option value="�������������">Oil products</option>

                                            <option value="������������ � �����">Equipment and spare parts</option>
                                            <option value="�����">Shoes</option>
                                            <option value="�����">Vegetables </option>
											<option value="������">Clothes </option>
											<option value="���������� � ���������">Perfumes and makeup</option>
											<option value="���������">Foamed plastics</option>

											<option value="����">Beer</option>
											<option value="�������������">Board lumber</option>
											<option value="�������">Plastic</option>
											<option value="�������">Palettes</option>
											<option value="�������� �������">Food stuff</option>
											<option value="�����">Poultry</option>

											<option value="����">Fish</option>
											<option value="����������">Plumbing equipment</option>
											<option value="�����">Sugar </option>
											<option value="������� ����">Joint cargo</option>
											<option value="����">Juices</option>
											<option value="������ � ������">Glass works and porcelain</option>

											<option value="��������������">Construction materials</option>
											<option value="�������� �������">Tobacco products</option>
											<option value="���� � ��������">Containers and packages</option>
											<option value="��������">Textile </option>
											<option value="���">Consumer goods</option>
											<option value="����">Turf</option>

											<option value="������������ ��������">Transport vehicles</option>
											<option value="�����">Pipes</option>
											<option value="���������">Fertilizer materials</option>
											<option value="����������">Insulators</option>
											<option value="������">Plywood</option>
											<option value="������">Fruits</option>

											<option value="���. ��������">Chemical products</option>
											<option value="���. �������� ���������">Unhazardous chemical products</option>
											<option value="���������">Household products</option>
											<option value="����������� ������������">Refrigerating equipment </option>
											<option value="������">Cement</option>
											<option value="�����">Chips</option>

											<option value="����� ������������">Wet-sated hide</option>
											<option value="�����������">Electronic devices</option>
											<option value="�����">Berries</option>
											<option value="������">Other</option>';
										} elseif ($mosConfig_lang == 'romanian') { echo '
                                            <option value="">- indicati tipul de incarcatura -</option>
                                            <option value="���� � ��������">Ambalaje</option>
											<option value="��������">Anvelope auto</option>
											<option value="����. ������">Articole de birou</option>
											<option value="���������� � ���������">Articole de cosmetica si parfumerie</option>
											<option value="������� �� ������">Articole din cauciuc</option>

											<option value="������� �� �������">Articole din metal</option>
											<option value="������� �� ����">Articole din piele</option>
											<option value="�������">Bauturi</option>
											<option value="����������� �������">Bauturi alcoolice</option>
											<option value="�������������� �������">Bauturi nealcoolice</option>
											<option value="����">Bere</option>

											<option value="�������">Butelii</option>
											<option value="������">Cablu</option>
											<option value="����������">Calculatoare</option>
											<option value="������">Caramida</option>
											<option value="��������� �����">Carbune de lemn</option>
											<option value="����">Carne</option>

											<option value="�����������">Carton ondulat</option>
											<option value="����� � ������">Cereale si seminte</option>
											<option value="�������������">Cherestea</option>
											<option value="�����">Chipsuri</option>
											<option value="������">Ciment</option>
											<option value="�����">Ciuperci</option>

											<option value="��������">Conserve</option>
											<option value="��������� 20���">Container de 20 picioare</option>
											<option value="��������� 40���">Container de 40 picioare</option>
											<option value="�����">Covoare</option>
											<option value="������� �������">Electrocasnice</option>
											<option value="����">Faina</option>

											<option value="����������">Fier uzat</option>
											<option value="������">Fructe</option>
											<option value="������">Hartie</option>
											<option value="����������">Izolant termic</option>
											<option value="������">Imbracaminte</option>

											<option value="������� ����">Incarcatura mixta</option>
											<option value="���������">Inghetata</option>
											<option value="���������">Ingrasaminte</option>
											<option value="������ �����">Lapte praf</option>
											<option value="�����">Legume</option>
											<option value="����������">Maculatura</option>

											<option value="���">Marfuri de larg consum</option>
											<option value="���������">Marfuri de uz gospodaresc</option>
											<option value="���������">Material lemnos</option>
											<option value="�������">Material plastic</option>
											<option value="���������">Material plastic expandat</option>
											<option value="��������������">Materiale de constructie</option>

											<option value="�����������">Medicamente</option>
											<option value="������">Metal</option>
											<option value="������������ ��������">Mijloace de transport</option>
											<option value="������">Mobila</option>
											<option value="�����">Pasari</option>
											<option value="����">Peste</option>

											<option value="����� ������������">Piei crude sarate</option>
											<option value="������������ � �����">Piese si utilaje</option>
											<option value="������">Placaj</option>
											<option value="���">Placi aglomerate din aschii de lemn</option>
											<option value="����">Placi aglomerate din aschii de lemn laminat</option>
											<option value="���">Placi fibrolemnoase</option>

											<option value="�����">Platouri</option>
											<option value="�������� �������">Produse alimentare</option>
											<option value="���. ��������">Produse chimice</option>
											<option value="���. �������� ���������">Produse chimice inofensive</option>
											<option value="������� �����">Produse chimice pentru uz casnic</option>
											<option value="������������ �������">Produse de patiserie</option>

											<option value="�������� �������">Produse de tutungerie</option>
											<option value="�������������">Produse petroliere</option>
											<option value="�����">Scandura </option>
											<option value="������ � ������">Sticla si portelanuri</option>
											<option value="�����">Struguri</option>
											<option value="����">Sucuri</option>

											<option value="�����������">Tehnica electronica</option>
											<option value="����������">Tehnica sanitara</option>
											<option value="�����">Tevi</option>
											<option value="��������">Textile</option>
											<option value="����">Turba</option>
											<option value="����������� ������������">Utilaj frigorific</option>

											<option value="�������">Vata minerala</option>
											<option value="�����">Zahar</option>
											<option value="������">Altele</option>';
										}
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
 <?php if($mosConfig_lang == 'russian') { echo '
                                            <option value="">- ������� �����/����� -</option>
                                            <option value="�� 0,500��., �� 20���">�� 0,500��., �� 20���.</option>
                                            <option value="�� 1�., �� 25���.">�� 1�., �� 25���. </option>
                                            <option value="�� 3�., �� 30���.">�� 3�., �� 30���.</option>
                                            <option value="�� 5�., �� 50���.">�� 5�., �� 50���.</option>
                                            <option value="�� 10�., �� 86���.">�� 10�., �� 86���.</option>
                                            <option value="�� 20�., �� 90���.">�� 20�., �� 90���. </option>
                                            <option value="�� 20�., �� 120���.">�� 20�., �� 120���. </option>
                                        ';}

                                        elseif ($mosConfig_lang == 'romanian') { echo '
                                            <option value="">- selectati Volumul/greutatea -</option>
											<option value="�� 0,500��., �� 20���.">de la 0,500kg., de la 20cub.</option>
											<option value="�� 1�., �� 25���.">de la 1t., de la 25cub. </option>
											<option value="�� 3�., �� 30���.">de la 3t., de la 30cub.</option>
											<option value="�� 5�., �� 50���.">de la 5t., de la 50cub.</option>

											<option value="�� 10�., �� 86���.">de la 10t., de la 86cub.</option>
											<option value="�� 20�., �� 90���.">de la 20t., de la 90cub. </option>
											<option value="�� 20�., �� 120���.">de la 20t., de la 120cub. </option>
                                        ' ;}

                                        elseif ($mosConfig_lang == 'english') { echo '
                                            <option value="">- choose size/weight -</option>
											<option value="�� 0,500��., �� 20���.">up to 0,500 kg., up to 20 cub</option>
											<option value="�� 1�., �� 25���.">up to 1t., up to 25 cub </option>
											<option value="�� 3�., �� 30���.">up to 3t., up to 30 cub </option>
											<option value="�� 5�., �� 50���.">up to 5t., up to 50 cub</option>

											<option value="�� 10�., �� 86���.">up to 10t., up to 86 cub</option>
											<option value="�� 20�., �� 90���.">up to 20t., up to 90 cub</option>
											<option value="�� 20�., �� 120���.">up to 20t., up to 120 cub </option>
                                        ';}
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
								?>" id="submit" style="float:left;background-image:url(<?php echo $tmpTools->baseurl(); ?>/templates/ja_mesolite/images/button_back.png);background-repeat:repeat-x;height:31px;line-height:31px;width:100px;border:0;color:white;"/>
	<div class="button_right"></div>
	</td>
</tr>

</table>
</form>
</div>

<!--   ��������� ��������� ���������  END  -->








<?
/*
// ����� ����� ��� ���������� ����������
<!-- left transport form -->
<script language="JavaScript1.2">
function left_transport_form_parse_info(form_user)
{
	var err_message = "";
	var text = "���������� ��������� ������������ ����.<br>";
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
		document.getElementById("left_transport_form_email_span").className = "redborder"; err_message_more +="�������� ���� ������ �������.<br>"; err_message += "1";
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
		err_message_more +="������������ ������ ����������� ������. <br>(������: + ��� ������ - ��� ������ - ����� ��������)<br>";
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

<h1 onclick="look('left_transport_form'); return false;">�������� ���������</h1>

<div id="left_transport_form" style="display: none;">
<p><span id="left_transport_form_err_message" style="color:red"></span></p>
<form action="/index.php?option=com_content&amp;task=view&amp;id=8&amp;Itemid=21" method="POST" name="left_transport_form" onsubmit="return left_transport_form_parse_info(this);">
<table border="0" width="100%">
	<tr>
		<td align="left" style="padding-bottom:8px;">������ ����������� <span style="color: red">*</span>
			<span id="left_transport_form_select_import">
				<select type="select" name="import_country" size="1" onchange="updateSelect('left_transport_form_import_city', this.value, 'left_transport_form_import_city');" id="import_country" style="width: 220px">
                    <option value="0"><center>---������� ������---<center></option>
                    <option value="�������">�������</option>
                    <option value="�����������">�����������</option>
                    <option value="�������">�������</option>
                    
                    <option value="�������">�������</option>
                    <option value="�������">�������</option>
                    <option value="����������">����������</option>
                    <option value="��������">��������</option>
                    <option value="�������">�������</option>
                    
                    <option value="��������">��������</option>
                    <option value="������/�����������">������/�����������</option>
                    <option value="��������������">��������������</option>
                    <option value="�������">�������</option>
                    <option value="�������">�������</option>
                    <option value="��������">��������</option>
                    
                    <option value="��������">��������</option>
                    <option value="������">������</option>
                    <option value="������">������</option>
                    <option value="�����">�����</option>
                    <option value="������">������</option>
                    <option value="�������">�������</option>
                    
                    <option value="�����">�����</option>
                    <option value="��������">��������</option>
                    <option value="����">����</option>
                    <option value="����">����</option>
                    <option value="��������">��������</option>
                    <option value="��������">��������</option>
                    
                    <option value="�������">�������</option>
                    <option value="������">������</option>
                    <option value="�����">�����</option>
                    <option value="���������">���������</option>
                    <option value="������">������</option>
                    <option value="����">����</option>
                    
                    <option value="�����">�����</option>
                    <option value="�������� �����">�������� �����</option>
                    <option value="����� �����">����� �����</option>
                    <option value="����������">����������</option>
                    <option value="������">������</option>
                    <option value="�����">�����</option>
                    
                    <option value="�����">�����</option>
                    <option value="����������">����������</option>
                    <option value="���������">���������</option>
                    <option value="��������">��������</option>
                    <option value="������">������</option>
                    <option value="�������">�������</option>
                    
                    <option value="�������">�������</option>
                    <option value="��������">��������</option>
                    <option value="������">������</option>
                    <option value="�����">�����</option>
                    <option value="����������">����������</option>
                    <option value="��������">��������</option>
                    
                    <option value="�.�.�.">�� �������</option>
                    <option value="������">������</option>
                    <option value="����������">����������</option>
                    <option value="������">������</option>
                    <option value="�������">�������</option>
                    <option value="����">�������� ����</option>
                    
                    <option value="������">������</option>
                    <option value="��������">��������</option>
                    <option value="��������">��������</option>
                    <option value="�����">�����</option>
                    <option value="��������">��������</option>
                    <option value="��������">��������</option>
                    
                    <option value="���">���</option>
                    <option value="�����������">�����������</option>
                    <option value="�������">�������</option>
                    <option value="������������">������������</option>
                    <option value="������">������</option>
                    <option value="����������">����������</option>
                    
                    <option value="�������">�������</option>
                    <option value="���������">���������</option>
                    <option value="�������">�������</option>
                    <option value="��������">��������</option>
                    <option value="����������">����������</option>
                    <option value="�����">�����</option>
                    
                    <option value="���������">���������</option>
                    <option value="������">������</option>
                    <option value="���-�����">���-�����</option>
                    <option value="�������">�������</option>
                    <option value="������">������</option>
				</select>
			</span>
		</td>
	</tr>
	<tr>
		<td align="left" style="padding-bottom:8px;">����� �����������
			<span id="import_city_text"></span>
				<select type="select" name="import_city" size="1" id="left_transport_form_import_city"  style="width: 175px" onchange="updateSelect('ignore', this.value, 'left_transport_form_import_city');" style="width: 220px">
					<option value="0">---�� ����� ��������---</option>
				</select>
			<span id="import_city_type"></span>
		</td>
	</tr>
	<tr>
		<td align="left" style="padding-bottom:8px;"><div>������ �������� <span style="color: red">*</span></div>
			<span id="left_transport_form_select_export">
				<select type="select" name="export_country" size="1" id="export_country" onchange="updateSelect('left_transport_form_export_city', this.value, 'left_transport_form_export_city');" style="width: 220px">
					<option value="0">---������� ������---</option>
					<option value="�������">�������</option>
					<option value="�����������">�����������</option>
					<option value="�������">�������</option>
					
					<option value="�������">�������</option>
					<option value="�������">�������</option>
					<option value="����������">����������</option>
					<option value="��������">��������</option>
					<option value="�������">�������</option>
					
					<option value="��������">��������</option>
					<option value="������/�����������">������/�����������</option>
					<option value="��������������">��������������</option>
					<option value="�������">�������</option>
					<option value="�������">�������</option>
					<option value="��������">��������</option>
					
					<option value="��������">��������</option>
					<option value="������">������</option>
					<option value="������">������</option>
					<option value="�����">�����</option>
					<option value="������">������</option>
					<option value="�������">�������</option>
					
					<option value="�����">�����</option>
					<option value="��������">��������</option>
					<option value="����">����</option>
					<option value="����">����</option>
					<option value="��������">��������</option>
					<option value="��������">��������</option>
					
					<option value="�������">�������</option>
					<option value="������">������</option>
					<option value="�����">�����</option>
					<option value="���������">���������</option>
					<option value="������">������</option>
					<option value="����">����</option>
					
					<option value="�����">�����</option>
					<option value="�������� �����">�������� �����</option>
					<option value="����� �����">����� �����</option>
					<option value="����������">����������</option>
					<option value="������">������</option>
					<option value="�����">�����</option>
					
					<option value="�����">�����</option>
					<option value="����������">����������</option>
					<option value="���������">���������</option>
					<option value="��������">��������</option>
					<option value="������">������</option>
					<option value="�������">�������</option>
					
					<option value="�������">�������</option>
					<option value="��������">��������</option>
					<option value="������">������</option>
					<option value="�����">�����</option>
					<option value="����������">����������</option>
					<option value="��������">��������</option>
					
					<option value="�.�.�.">�� �������</option>
					<option value="������">������</option>
					<option value="����������">����������</option>
					<option value="������">������</option>
					<option value="�������">�������</option>
					<option value="����">�������� ����</option>
					
					<option value="������">������</option>
					<option value="��������">��������</option>
					<option value="��������">��������</option>
					<option value="�����">�����</option>
					<option value="��������">��������</option>
					<option value="��������">��������</option>
					
					<option value="���">���</option>
					<option value="�����������">�����������</option>
					<option value="�������">�������</option>
					<option value="������������">������������</option>
					<option value="������">������</option>
					<option value="����������">����������</option>
					
					<option value="�������">�������</option>
					<option value="���������">���������</option>
					<option value="�������">�������</option>
					<option value="��������">��������</option>
					<option value="����������">����������</option>
					<option value="�����">�����</option>
					
					<option value="���������">���������</option>
					<option value="������">������</option>
					<option value="���-�����">���-�����</option>
					<option value="�������">�������</option>
					<option value="������">������</option>
				</select>
			</span>
		</td>
	</tr>
	<tr>
		<td align="left" style="padding-bottom:8px;"><div>����� ��������</div>
			<span id="export_city_text"></span>
				<select type="select" name="export_city" size="1" id="left_transport_form_export_city" style="width: 175px" onchange="updateSelect('ignore', this.value, 'left_transport_form_export_city');" style="width: 220px" >
					<option value="0">---�� ����� ��������---</option>
				</select>
			<span id="export_city_type"></span>
		</td>
	</tr>
	<tr>
		<td style="padding-bottom:8px;"><div>�������� � <span style="color: red">*</span></div><!-- TODO change id of evry field in date -->
			<span id="left_transport_form_date_span"><input readonly="true" type="text" name="date_export" size="12" maxlength="19" id="left_transport_form_date_export"  style="width: 200px"  /><input name="calendar" type="button" onClick="return showCalendar('left_transport_form_date_export', 'dd-mm-y');" tabindex="105" value="..." style="width: 20px"/></span>
		</td>
	</tr>
<tr>
<td style="padding-bottom:8px;">��� ���������� <span style="color: red">*</span>
<span id="left_transport_form_select_transport">
<select type="select" name="type_transport" size="1" style="width: 220px" id="type_transport">
<option value="">---������� ��� ����������---</option>
<option value="����������� ����������">����������� ����������</option>
<option value="������������">������������</option>
<option value="��������� � �������� �����������">��������� � �������� �����������</option>

<option value="����������� ���������� ����������">����������� ���������� ����������</option>
<option value="���� ��������� ����������">���� ��������� ����������</option>
<option value="�������-������� � ��������">�������-������� � ��������</option>
<option value="������� ����-���������">������� ����-���������</option>
<option value="������������� ����������">������������� ����������</option>
<option value="������� ��� ���������.">������� ��� ���������.</option>
<option value="��������� �������� ����� ADR">��������� �������� ����� ADR</option>
<option value="��������� �������� �����">��������� �������� �����</option>
<option value="��������">��������</option>

<option value="�������� �����, ������">�������� �����, ������</option>
<option value="������� ���������">������� ���������</option>
<option value="������"> ������</option>
</select>
</span>
</td>
</tr>

<tr>
<td style="padding-bottom:8px;"> �����, ���<span style="color: red">*</span>
<span id="left_transport_form_select_cargo_size">
<select type="select" name="cargo_size" size="1" style="width: 220px" id="cargo_size">
<option value="">---������� �����, ���---</option>
<option value="�� 0,500��., �� 20���.">�� 0,500��., �� 20���.</option>
<option value="�� 1�., �� 25���.">�� 1�., �� 25���.</option>
<option value="�� 3�., �� 30���.">�� 3�., �� 30���.</option>
<option value="�� 5�., �� 50���.">�� 5�., �� 50���.</option>
<option value="�� 10�., �� 86���.">�� 10�., �� 86���.</option>
<option value="�� 20�., �� 90���.">�� 20�., �� 90���.</option>
<option value="�� 20�., �� 120���.">�� 20�., �� 120���.</option>
</select>
</span>
</td>
</tr>

<tr>
<td style="padding-bottom:8px;">��������<span style="color: red">*</span>
<span id="left_transport_form_company_span"><input type="text" name="company" size="25" id="company"  style="width: 220px" /></span></td>
</tr>

<tr>
<td style="padding-bottom:8px;">���������� ���� <span style="color: red">*</span>
<span id="left_transport_form_fio_span"><input type="text" name="fio" size="25" id="fio"  style="width: 220px" /></span></td>
</tr>

<tr>
<td style="padding-bottom:8px;"><div>���������� ������� <span style="color: red">*</span></div> 
+ <span id="tel_span"><span id="left_transport_form_telefon_country_code_span"><input type="text" name="telefon_country_code" size="1" maxlength="3" id="telefon_country_code" style="width: 25px" /></span>
- <span id="left_transport_form_telefon_city_code_span"><input type="text" name="telefon_city_code" size="2" maxlength="4" id="telefon_city_code" style="width: 30px" /></span>
- <span id="left_transport_form_telefon_span"><input type="text" name="telefon" size="15" maxlength="15" id="telefon" style="width: 130px" /></span></span>
</td>

<tr>
<td style="padding-bottom:8px;"><div>E-mail <span style="color: red">*</span></div>
<span id="left_transport_form_email_span"><input type="text" name="email" size="25" style="width: 220px"  /></span></td>
</tr>

<tr>
<td style="padding-bottom:10px;"><div>����������</div><textarea type="textarea" name="other" class="inputbox" cols="30" rows="5" id="other"  style="width: 220px" ></textarea></td>
</tr>

<tr>
<td style="padding-bottom:10px;"><div style="margin-top: 5px; margin-bottom:5px;"><span style="color: red">*</span> - ������������ ����</div>
<div class="button_left"> </div>
<input type="submit" name="submit" value="���������" id="submit" style="float:left;background-image:url(<?php echo $tmpTools->baseurl(); ?>/templates/ja_mesolite/images/button_back.png);background-repeat:repeat-x;height:31px;line-height:31px;width:100px;border:0;color:white;"/>
<div class="button_right"></div>
</td>
</tr>

</table>
</form>
</div>
<!-- �������� ���������  END -->
*/
?>                
                
                                <br style="font-size:1px;height:1px;clear:both;"/>
                                <ul class="leftmenu">
                                	<!--<li><a href="#">�������� �����</a></li>
                                    <li><a href="index.php?option=com_content&task=view&id=2&Itemid=13">��������</a></li>-->
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
					<span style="font-size: 11px; color: rgb(0, 0, 0);">��� ����� ��������. ��� ����������� � ������������� ���������� � ����� ����������� �� www.moldovatruck.md �����������.</span> <br>������������ ������. ����������� ������ - <a href="http://www.movers-auto.md" target="_blank">www.movers-auto.md</a>, <a href="http://www.riatec.md" target="_blank">www.riatec.md</a>
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