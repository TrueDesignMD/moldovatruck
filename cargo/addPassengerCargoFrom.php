<?php
$err_message = "";
$succes_message = '';

if (!defined('FORMS')) {$ANOTHER = 'forma'; $num=0;define('FORMS',$ANOTHER);}
else
{
	$FORMS = FORMS;
	if ($FORMS=='forma') {$ANOTHER='formc';$num=1;}
	else {$ANOTHER = 'formb';$num=2;}
}

if (!isset($inserted)) $inserted = false;
if (!defined('INSERTED')&&!empty($_POST)&&$_POST['form_name']==$ANOTHER) {
	require_once(dirname(__FILE__).'/../system/functions.php');
	$mosConfig_lang=LANG;
	$explode = explode('-',$_POST['date_export']);
	$day = $explode[0];
	$month = $explode[1];
	$year = $explode[2];
	if (is_valid_data($_POST['transport_type']) and is_valid_data($_POST['export_country']) and is_valid_data($day)and is_valid_data($month)and is_valid_data($year) and mb_strlen($day,'UTF-8')==2 and mb_strlen($month,'UTF-8')==2  and mb_strlen($year,'UTF-8')==4 and is_valid_data($_POST['cargo_size']) and is_valid_data($_POST['fio']) and isValidEmail($_POST['email'], false) and is_valid_data($_POST['telefon'][0])) {
		include (dirname(__FILE__).'/../db_connect/db_write.php');
		$import_country = mysqli_real_escape_string($db,$_POST['import_country']);
		$date_export = mysqli_real_escape_string($db,$_POST['date_export']);
		$export_country = mysqli_real_escape_string($db,$_POST['export_country']);
		$type_transport = mysqli_real_escape_string($db,$_POST['transport_type']);
		$cargo_type = mysqli_real_escape_string($db,$_POST['cargo_type']);
		$cargo_size = mysqli_real_escape_string($db,$_POST['cargo_size']);
		$fio = ucwords(strtolower(mysqli_real_escape_string($db,$_POST['fio'])));
		$email = mysqli_real_escape_string($db,$_POST['email']);
		for($phones=0;$phones<count($_POST['telefon']);$phones++)
		{
			$telefone_number.=mysqli_real_escape_string($db,"+".$_POST['telefon'][$phones]).'; ';
		}
		if (is_valid_data($_POST['import_city']) and $_POST['import_city'] != "-1") {
			$import_city = mysqli_real_escape_string($db,$_POST['import_city']);
		} elseif (isset($_POST['import_city']) and $_POST['import_city'] == "-1" and is_valid_data($_POST['import_city_type'])) {
			$import_city = mysqli_real_escape_string($db,$_POST['import_city_type']);
		} else {
				$import_city = "";
		}
		if (is_valid_data($_POST['export_city']) and $_POST['export_city'] != "-1") {
			$export_city = mysqli_real_escape_string($db,$_POST['export_city']);
		} elseif (isset($_POST['export_city']) and $_POST['export_city'] == "-1" and is_valid_data($_POST['export_city_type'])) {
			$export_city = mysqli_real_escape_string($db,$_POST['export_city_type']);
		} else {
				$export_city = "";
		}
		if (is_valid_data($_POST['skype'])) $skype = mysqli_real_escape_string($db,$_POST['skype']);
		else $skype = "";
		if (is_valid_data($_POST['icq'])) $icq = mysqli_real_escape_string($db,$_POST['icq']);
		else $icq = "";
		$date = date("d-m-Y");
		$dt = explode('-',$date_export);
		$day = $dt[0];
		$month = $dt[1];
		$year = $dt[2];
		$source = "moldovatruck";
		//assign contacts
		$id_contact = 0;
		$query_contacts = mysqli_query($db,"SELECT id FROM movers_contact");
		if ($num_rows = mysqli_num_rows($query_contacts)) {
			$id_contact = mysqli_fetch_array($query_contacts);
			$by_admin = $id_contact['id'];
		}
		//$query = "INSERT INTO movers_cargo ('name','export','export_city','import','impot_city','phone','email','skype','icq','face','date','type','order_date','volume') VALUES ('$cargo_type','$export_country','$export_city','$import_country','$import_city','$telefone_number','$email','$skype','$icq','$fio','$date_export','$type_transport','$date','$cargo_size')";
		$query = "INSERT INTO movers_cargo_passengers (`export`,`export_city`,`import`,`import_city`,`phone`,`email`,`skype`,`icq`,`face`,`type`,`date`,`order_date`,`passenger_number`,`source`,`by_admin`) VALUES ('$export_country','$export_city','$import_country','$import_city','$telefone_number','$email','$skype','$icq','$fio','$type_transport','$date_export','$date_export','$cargo_size','$source','$by_admin') ";
		
		$res = mysqli_query($db, $query) or die(mysqli_error($db));

		if(LANG=='ru') $LINK = "Вы успешно добавили груз ";
		if(LANG=='ro') $LINK = "Dvs ati adaugat cu succes marfa ";
		if(LANG=='en') $LINK = "You successfull added cargo ";
		$getCountryExport = mysqli_query($db,"SELECT `country_name_$mosConfig_lang` FROM `country` WHERE `id_country`='$export_country'");
		$countryExport = mysqli_fetch_array($getCountryExport);
		if (LANG=='ru') $LINK.='из '.CountryFrom($countryExport['country_name_'.$mosConfig_lang]);
		if (LANG=='ro') $LINK.='din '.CountryFrom($countryExport['country_name_'.$mosConfig_lang]);
		if (LANG=='en') $LINK.='from '.CountryFrom($countryExport['country_name_'.$mosConfig_lang]);
		$getCountryImport = mysqli_query($db,"SELECT `country_name_$mosConfig_lang` FROM `country` WHERE `id_country`='$import_country'");
		$countryImport = mysqli_fetch_array($getCountryImport);
		if(LANG=='ru')$LINK.=' в '.CountryTo($countryImport['country_name_'.$mosConfig_lang]);
		if(LANG=='ro')$LINK.=' în '.CountryTo($countryImport['country_name_'.$mosConfig_lang]);
		if(LANG=='en')$LINK.=' to '.CountryTo($countryImport['country_name_'.$mosConfig_lang]);
		if (LANG=='ru') $LINK.=". <a href='".HOME.LANG."/passenger_transport.php?import=".$import_country."&export=".$export_country."' style='color:white'>Просмотреть транспорт ";
		if (LANG=='ro') $LINK.=". <a href='".HOME.LANG."/passenger_transport.php?import=".$import_country."&export=".$export_country."' style='color:white'>Oferte de transport ";
		if (LANG=='en') $LINK.=". <a href='".HOME.LANG."/passenger_transport.php?import=".$import_country."&export=".$export_country."' style='color:white'>View transport ";
	

		if (LANG=='ru') $LINK.='из '.CountryFrom($countryExport['country_name_'.$mosConfig_lang]);
		if (LANG=='ro') $LINK.='din '.CountryFrom($countryExport['country_name_'.$mosConfig_lang]);
		if (LANG=='en') $LINK.='from '.CountryFrom($countryExport['country_name_'.$mosConfig_lang]);
		if(LANG=='ru')$LINK.=' в '.CountryTo($countryImport['country_name_'.$mosConfig_lang]);
		if(LANG=='ro')$LINK.=' în '.CountryTo($countryImport['country_name_'.$mosConfig_lang]);
		if(LANG=='en')$LINK.=' to '.CountryTo($countryImport['country_name_'.$mosConfig_lang]);


	

		echo '<html><head><meta http-equiv="refresh" content="4;URL='.HOME.LANG.'/passenger_transport.php?import='.$import_country.'&export='.$export_country.'" /></head></html>';
		$succes_message= "<p class='alert alert-dismissible alert-success' id='".$_POST['form_name']."' style='text-align:center;display:block;margin-bottom:2em;margin-top:70px;'>".$LINK."</a></p>";

		define('INSERTED',true);
		$inserted = true;		

	} else {

			$succes_message = "";
			$err_message = '<p class="alert alert-dismissible alert-danger">Заполните пожалуйста обязательные поля!</p>';
	}
}else $mosConfig_lang=LANG;

?>
<?php if (!$inserted&&!isset($succes_message) or $succes_message == "") {
			include(dirname(__FILE__)."/../utils.php");
 ?>
<script>
function parse_info(id)
{
	var err_message = "";
	form_user = $('#'+id);
	var text = '<p class="alert alert-dismissible alert-danger">Пожалуйста заполните обязательные поля.</p>';
	var err_message_more = "";

	import_county = $('#'+id+' select[name="import_country"]').val();
	export_country = $('#'+id+' select[name="export_country"]').val();
	datetimepicker1 = $('#'+id+' #date_export input').val();
	type_transport = $('#'+id+' select[name="type_transport"]').val();
	cargo_size = $('#'+id+' select[name="cargo_size"]').val();
	fio = $('#'+id+' #fio').val();
	email = $('#'+id+' #email').val();
	telefon_country_code = $('#'+id+' #telefon_country_code').val();
	telefon_city_code = $('#'+id+' #telefon_city_code').val();
	telefon = $('#'+id+' #telefon').val();
	action = $('#'+id).attr('action');
	console.log(import_county);
	console.log(export_country);
	console.log(datetimepicker1);
	console.log(cargo_size);
	console.log(fio);
	console.log(email);
	console.log(telefon_country_code);
	console.log(telefon_city_code);
	console.log(telefon);
	if (import_county==''||import_county==0||import_county==null) err_message += "1";
	if (export_country==''||export_country==0||export_country==null) err_message += "1";
	if (datetimepicker1==''||datetimepicker1==0||datetimepicker1==null) err_message += "1";
	if (type_transport==''||type_transport==0||type_transport==null) err_message += "1";
	if (cargo_size==''||cargo_size==0||cargo_size==null) err_message += "1";
	if (fio==''||fio==0||fio==null) err_message += "1";
	if (email=='') err_message += "1";
	else if(!isValidEmail(email, false)) err_message += "1";
	if(telefon_country_code!==''&&telefon_city_code!==''&&telefon)
	{
		country_code = telefon_country_code.replace(/-/g, "");
		city_code = telefon_city_code.replace(/-/g, "");
		telefon = telefon.replace(/-/g, "");
		var telefon_number = "+" + country_code + "-" + city_code + "-" + telefon;
		var pattern = /^[+]\d{1,3}-\d{1,4}-\d{1,15}/;
		var ereg = pattern.test(telefon_number);
		if (!ereg) err_message += "1";
	}
	console.log(err_message);
	if (err_message!=="") {
		$('#'+id+' #err_message').html(text);
	//return false;
	} else {
		console.log('here');
		$('#'+id+' #err_message').html("");
		console.log(home_url+'cargo/calculate_cost_of_transportation_cargo.php');
		$.post(home_url+action.substr(1,action.length), {import_country:import_country,export_country:export_country,date_export:datetimepicker1,type_transport:type_transport,cargo_type:cargo_type,cargo_size:cargo_size,fio:fio,email:email,telefon_country_code:telefon_country_code,telefon_city_code:telefon_city_code,telefon:telefon},function(data){
		console.log(data);
	//$('#'+id+' #err_message').html(data);
		});
		//console.log('now_here');
	//return true;
	}
}
AnotherFormName = '<? echo $ANOTHER; ?>';
</script>

<p><form action="<?php echo str_replace("&amp;","&",$_SERVER["REQUEST_URI"]).'#'.$ANOTHER; ?>" method="POST" name="<?php echo $ANOTHER;?>" id="<?php echo $ANOTHER;?>" onsubmit=" return sendForm('<?php echo $ANOTHER;?>','export_country,import_country,transport_type,cargo_size,dt_export,fio,email,t0','<?php if($mosConfig_lang == 'ru') { echo "Страна отправки"; }
	elseif ($mosConfig_lang == 'ro') { echo "Tara de îmbarcare"; }
	elseif ($mosConfig_lang == 'en') { echo "Country of departure"; }
?>!<?php if($mosConfig_lang == 'ru') {
	echo 'Страна прибытия';}
	elseif($mosConfig_lang == 'ro') { echo'Ţara de debarcare';}
    elseif($mosConfig_lang == 'en') { echo'Country of arrival';}
 ?>!<?php if($mosConfig_lang == 'ru') {

	echo 'Тип транспорта';}

	elseif($mosConfig_lang == 'ro') { echo'Tipul transportului';}

    elseif($mosConfig_lang == 'en') { echo'Transport type';}

 ?>!<?php if($mosConfig_lang == 'ru') { echo "Количество пассажиров"; }
		elseif ($mosConfig_lang == 'ro') { echo "Numărul de pasageri"; }
		elseif ($mosConfig_lang == 'en') { echo "Number of passengers"; }
?>!<?php
if($mosConfig_lang == 'ru') { echo "Дата отправки"; }
		elseif ($mosConfig_lang == 'ro') { echo "Data expediării"; }
		elseif ($mosConfig_lang == 'en') { echo "Post date"; }

?>!<?php if($mosConfig_lang == 'ru') { echo "Контактное лицо"; }
	elseif ($mosConfig_lang == 'ro') { echo "Persoana de contact"; }
	elseif ($mosConfig_lang == 'en') { echo "Contact person"; }
?>!E-mail!<?php if($mosConfig_lang == 'ru') { echo "Контактный телефон"; }
								elseif ($mosConfig_lang == 'ro') { echo "Telefon de contact"; }
								elseif ($mosConfig_lang == 'en') { echo "Telephone"; }
								?>');">
<p><span id="err_message" style="color:red"><?php echo $err_message; ?></span></p>
<table class="bold" style="min-width:300px; max-width:80%;">
<tr>
<td align="left" style="padding-bottom:8px;">
<label>
<?php if($mosConfig_lang == 'ru') { echo "Страна отправки"; }
	elseif ($mosConfig_lang == 'ro') { echo "Tara de îmbarcare"; }
	elseif ($mosConfig_lang == 'en') { echo "Country of departure"; }
?>
 <span style="color: red">*</span></label>
</td>
<td align="left" style="padding-bottom:8px;">
<span id="select_export">
<select type="select" name="export_country" class="form-control" style="padding: 3px 5px;font-size: 1em;" size="1" onchange="updateSelect('export_city', this.value, 'export_city','<?php echo $ANOTHER;?>');" id="export_country" >
<?php if($mosConfig_lang == 'ru') { echo '<option value="">- укажите страну -</option>';}
     elseif($mosConfig_lang == 'ro') { echo '<option value="">- alegeti tara  -</option>';}
      elseif($mosConfig_lang == 'en') { echo '<option value="">- choose the country -</option>';}
	  echo $countries;
?>
</select>
</span>
</td>
</tr>
<tr>
<td align="left" style="padding-bottom:8px;"><label>
<?php if($mosConfig_lang == 'ru') {
	echo 'Город отправки';}
    elseif($mosConfig_lang == 'ro') { echo'Oras de îmbarcare';}
    elseif($mosConfig_lang == 'en') { echo'City of departure';}
?>

<span id="export_city_text"></span></label>
</td>
<td align="left" style="padding-bottom:8px;">
<select type="select" name="export_city" size="1" id="export_city" style="width:100%;padding: 3px 5px;font-size: 1em;"  class="form-control" onchange="updateSelect('ignore', this.value, 'export_city','<?php echo $ANOTHER;?>');">
<option value="0"><?php if($mosConfig_lang == 'ru') {
	echo '---не имеет значения---';}
    elseif($mosConfig_lang == 'ro') { echo'---oricare---';}
    elseif($mosConfig_lang == 'en') { echo'---all cities---';}
?></option>
</select><span id="export_city_type"></span>
</td>
</tr>

<tr>
<td align="left" style="padding-bottom:8px;"><label>
 <?php if($mosConfig_lang == 'ru') {
	echo 'Страна прибытия';}
	elseif($mosConfig_lang == 'ro') { echo'Ţara de debarcare';}
    elseif($mosConfig_lang == 'en') { echo'Country of arrival';}
 ?> <span style="color: red">*</span></label>
</td>
<td align="left" style="padding-bottom:8px;">
<span id="select_import">
<select type="select" name="import_country" size="1" id="import_country" onchange="updateSelect('import_city', this.value, 'import_city','<?php echo $ANOTHER;?>');"  class="form-control" style="width:100%;padding: 3px 5px;font-size: 1em;">
<?php if($mosConfig_lang == 'ru') { echo '<option value="">- укажите страну -</option>';}
      elseif($mosConfig_lang == 'ro') { echo '<option value="">- alegeti tara  -</option>';}
      elseif($mosConfig_lang == 'en') { echo '<option value="">- choose the country -</option>';}
	  echo $countries;
?>
</select>
</span>
</td>
</tr>
<tr>
<td align="left" style="padding-bottom:8px;"><label>
<?php
    if($mosConfig_lang == 'ru') { echo'Город прибытия';}
    elseif($mosConfig_lang == 'ro') { echo'Oras de debarcare';}
    elseif($mosConfig_lang == 'en') { echo'City of arrival';}
?>
 <span id="import_city_text"></span></label>
</td>
<td align="left" style="padding-bottom:8px;">
<select type="select" name="import_city" size="1" id="import_city" style="width:100%;padding: 3px 5px;font-size: 1em;" class="form-control" onchange="updateSelect('ignore', this.value, 'import_city','<?php echo $ANOTHER;?>');">
<option value="0" ><?php if($mosConfig_lang == 'ru') {
	echo '---не имеет значения---';}
    elseif($mosConfig_lang == 'ro') { echo'---oricare---';}
    elseif($mosConfig_lang == 'en') { echo'---all cities---';}
?></option>
</select><span id="import_city_type"></span>
</td>
</tr>
<tr>

<td align="left" style="padding-bottom:8px;"><label for="exampleInputEmail1" style="display:block">

 <?php if($mosConfig_lang == 'ru') {

	echo 'Тип транспорта';}

	elseif($mosConfig_lang == 'ro') { echo'Tipul transportului';}

    elseif($mosConfig_lang == 'en') { echo'Transport type';}

 ?><span style="color: red">*</span> </label>

</td>

<td align="left" style="padding-bottom:8px;">



<select type="select" name="transport_type" size="1" id="transport_type" style="width:100%;padding: 3px 5px;font-size: 1em;">

<?php if($mosConfig_lang == 'ru') { echo '<option value="">- укажите тип -</option>';}

      elseif($mosConfig_lang == 'ro') { echo '<option value="">- alegeti tipul  -</option>';}

      elseif($mosConfig_lang == 'en') { echo '<option value="">- choose the type -</option>';}

	  echo $transport_types;

?>

</select>

</td>

</tr>
<tr>
<td style="padding-bottom:8px;"><label>
<?php if($mosConfig_lang == 'ru') { echo "Количество пассажиров"; }
		elseif ($mosConfig_lang == 'ro') { echo "Numărul de pasageri"; }
		elseif ($mosConfig_lang == 'en') { echo "Number of passengers"; }
?>
<span style="color: red">*</span></label>
</td>
<td style="padding-bottom:8px;">
<span id="select_cargo_size">
<select type="select" name="cargo_size" size="1"  class="form-control"  id="cargo_size" style="width:100%;padding: 3px 5px;font-size: 1em;">
 <?php if($mosConfig_lang == 'ru') { echo '<option value="">- укажите кол-во пассажиров -</option>';}
        elseif ($mosConfig_lang == 'ro') { echo '<option value="">- indicați numărul de pasageri -</option>';}
        elseif ($mosConfig_lang == 'en') { echo '<option value="">- indicate number of passengers -</option>';}
		for($k=5;$k<100;$k+=5)
		if(isset($_POST['cargo_size'])&&$_POST['cargo_size']==$k) echo '<option value="'.$k.'">до '.$k.' пассажиров</option>';
		else echo '<option value="'.$k.'">до '.$k.' пассажиров</option>';
?>
</select>
</span>
</td>
</tr>
<tr>

<td style="padding-bottom:8px;"><label for="exampleInputEmail1" style="display:block">

<?php
if($mosConfig_lang == 'ru') { echo "Дата отправки"; }
		elseif ($mosConfig_lang == 'ro') { echo "Data expediării"; }
		elseif ($mosConfig_lang == 'en') { echo "Post date"; }

?> <span style="color: red">*</span> </label>

</td>

<td style="padding-bottom:8px;">

<span id="date_span">

<div class="form-group">

        <div class='input-group date' id='date_export'>

                    <input type='text' class="form-control" value="<?php echo $_POST['date_export'] ?>" id="dt_export" name="date_export" style="width:100%;padding: 3px 5px;font-size: 1em;height:auto"/>

                    <span class="input-group-addon" style="padding:0px; padding-left:5px; padding-right:5px">

                        <span class="glyphicon glyphicon-calendar"></span>

                    </span>

                </div>

  </div>

</span>

</td>

</tr>

<tr>
<td style="padding-bottom:8px;"><label>
<?php if($mosConfig_lang == 'ru') { echo "Контактное лицо"; }
	elseif ($mosConfig_lang == 'ro') { echo "Persoana de contact"; }
	elseif ($mosConfig_lang == 'en') { echo "Contact person"; }
?>
 <span style="color: red">*</span></label></td>
<td style="padding-bottom:8px;"><span id="fio_span"><input type="text" name="fio" value="<?php echo $_POST['fio'] ?>" size="25" id="fio"  class="form-control"  style="width:100%;padding: 3px 5px;font-size: 1em; height:auto"/></span></td>
</tr>
<tr>
<td style="padding-bottom:8px;"><label><?php if($mosConfig_lang == 'ru') { echo "Контактный телефон"; }
								elseif ($mosConfig_lang == 'ro') { echo "Telefon de contact"; }
								elseif ($mosConfig_lang == 'en') { echo "Telephone"; }
								?> <span style="color: red">*</span></label></td>
<td style="padding-bottom:8px;"><font id="phones<?php echo $num;?>"><div class="input-group-addon" style="display:inline-block;  padding-left: 5px; height: 27px;  padding-top: 2.5px;">+</div><input type="text" name="telefon[0]" size="15" maxlength="15" value="<?php echo $_POST['telefon'][0] ?>" id="t0"  class="form-control"  style="height:auto;padding: 3px 5px;font-size: 1em;display:inline-block;  width: calc(100% - 22px);" placeholder="00000000000" /></font>
<a href="javascript:AddNumbers('<?php echo $num;?>')" id="linkAdd">Добавить еще номер</a> <a href="javascript:DellNumbers('<?php echo $num;?>')" id="linkDell" style="float:right;display:none">Удалить</a>
</td>
<tr>
<td style="padding-bottom:8px;"><label>E-mail <span style="color: red">*</span></label></td>
<td style="padding-bottom:8px;"><span id="email_span"><input type="text" name="email" size="25" value="<?php echo $_POST['email'] ?>" id="email"  class="form-control" style="padding: 3px 5px;font-size: 1em;height:auto" /></span></td>
</tr>

<!--<tr>



<td style="padding-bottom:8px;">Skype</td>



<td style="padding-bottom:8px;"><input type="text" name="skype" size="25"   /></td>



</tr>







<tr>



<td style="padding-bottom:10px;">ICQ</td>



<td style="padding-bottom:10px;"><input type="text" name="icq" size="25"   /></td>



</tr>-->
<tr>
<td style="padding-bottom:10px"></td>
<td style="padding-bottom:10px;">
<input type="submit" name="cargo_sm" class="btn btn-success" value="<?php if($mosConfig_lang == 'ru') { echo "Отправить"; }
								elseif ($mosConfig_lang == 'ro') { echo "Calculeaza"; }
								elseif ($mosConfig_lang == 'en') { echo "Calculate"; }
								?>" id="submit" style="padding:5px;font-size:"/>
</td>
</tr>
</table>
<input type="hidden" value="<? echo $ANOTHER;?>" name="form_name" />
</form>
<script>
$(function () {
                $('#<?php echo $ANOTHER;?> #date_export').datetimepicker({
				locale:'ru',
				format: 'DD-MM-YYYY'
				}
				);
			if ($('html').width()<=640) 	$('.bold tr td').css('display','block');
		});
			<?php if ($ANOTHER=='forma') echo "num = [0,0];
	forms = ['forma','formc'];"; ?>
function AddNumbers(nm)
{
	num[nm]++;
	console.log(forms[nm]);
	$('.bold').css('width',$('.bold').width()+'px');
	$('#phones'+nm).append('<div><div class="input-group-addon" id="a'+num[nm]+'" style="display:inline-block;  padding-left: 5px; height: 27px;  padding-top: 2.5px;">+</div><input type="text" name="telefon['+num[nm]+']" size="15" maxlength="15" id="t'+num[nm]+'"  class="form-control"  style="height:auto;padding: 3px 5px;font-size: 1em;display:inline-block;  width: calc(100% - 22px)" placeholder="00000000000" /></div>');
	if (num[nm]>0) $('#'+forms[nm]+' #linkDell').css('display','inline-block');
	if (num[nm]==2) $('#'+forms[nm]+' #linkAdd').css('display','none');
}
function DellNumbers(nm)
{

	$('#t'+num[nm]+'').remove();
	$('#a'+num[nm]+'').remove();
	num[nm]--;
	if (num[nm]==0) $('#'+forms[nm]+' #linkDell').css('display','none');
	if (num[nm]<2) $('#'+forms[nm]+' #linkAdd').css('display','inline-block');
}
</script>
<?php } else {
	if (!empty($succes_message)) echo $succes_message;
	else echo 'Данная форма уже ноходится на странице';
	}
?>