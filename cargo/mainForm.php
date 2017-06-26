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
	if (is_valid_data($_POST['import_country']) and is_valid_data($_POST['export_country']) and is_valid_data($day)and is_valid_data($month)and is_valid_data($year) and mb_strlen($day,'UTF-8')==2 and mb_strlen($month,'UTF-8')==2  and mb_strlen($year,'UTF-8')==4 and is_valid_data($_POST['type_transport']) and is_valid_data($_POST['cargo_type']) and is_valid_data($_POST['cargo_size']) and is_valid_data($_POST['fio']) and isValidEmail($_POST['email'], false) and is_valid_data($_POST['telefon'][0])) {
		include (dirname(__FILE__).'/../db_connect/db_write.php');
		$import_country = mysqli_real_escape_string($db,$_POST['import_country']);
		$export_country = mysqli_real_escape_string($db,$_POST['export_country']);
		$date_export = mysqli_real_escape_string($db,$_POST['date_export']);
		$type_transport = mysqli_real_escape_string($db,$_POST['type_transport']);
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

		$res = mysqli_query($db, "INSERT INTO movers_cargo (`name`,`export`,`export_city`,`import`,`import_city`,`phone`,`email`,`skype`,`icq`,`face`,`date`,`type`,`order_date`,`volume`,`source`,`by_admin`) VALUES ('$cargo_type','$export_country','$export_city','$import_country','$import_city','$telefone_number','$email','$skype','$icq','$fio','$date_export','$type_transport','$date','$cargo_size','$source','$by_admin') ") or die(mysqli_error($db));

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
		if (LANG=='ru') $LINK.=". <a href='".HOME.LANG."/poisk-transporta-nayti-svobodnyiy-transport-poisk-poputnogo-transporta-577.php?import=".$import_country."&export=".$export_country."' style='color:white'>Просмотреть транспорт ";
		if (LANG=='ro') $LINK.=". <a href='".HOME.LANG."/poisk-transporta-nayti-svobodnyiy-transport-poisk-poputnogo-transporta-577.php?import=".$import_country."&export=".$export_country."' style='color:white'>Oferte de transport ";
		if (LANG=='en') $LINK.=". <a href='".HOME.LANG."/poisk-transporta-nayti-svobodnyiy-transport-poisk-poputnogo-transporta-577.php?import=".$import_country."&export=".$export_country."' style='color:white'>View transport ";
	

		if (LANG=='ru') $LINK.='из '.CountryFrom($countryExport['country_name_'.$mosConfig_lang]);
		if (LANG=='ro') $LINK.='din '.CountryFrom($countryExport['country_name_'.$mosConfig_lang]);
		if (LANG=='en') $LINK.='from '.CountryFrom($countryExport['country_name_'.$mosConfig_lang]);
		if(LANG=='ru')$LINK.=' в '.CountryTo($countryImport['country_name_'.$mosConfig_lang]);
		if(LANG=='ro')$LINK.=' în '.CountryTo($countryImport['country_name_'.$mosConfig_lang]);
		if(LANG=='en')$LINK.=' to '.CountryTo($countryImport['country_name_'.$mosConfig_lang]);

		//echo "Ati introdus urmatoarele date: ",$import_country,",",$import_city,",",$export_country,",",$export_city,",",$date_export,",",$cargo_type,",",$type_transport,",",$cargo_size,",",$fio,",",$telefone_number,",",$email,",",$skype,",",$icq,",",$date;

	

		echo '<html><head><meta http-equiv="refresh" content="4;URL='.HOME.LANG.'/poisk-transporta-nayti-svobodnyiy-transport-poisk-poputnogo-transporta-577.php?import='.$import_country.'&export='.$export_country.'" /></head></html>';
		$succes_message= "<p class='alert alert-dismissible alert-success' id='".$_POST['form_name']."' style='text-align:center;display:block;margin-bottom:2em;margin-top:70px;'>".$LINK."</a></p>";

		define('INSERTED',true);
		$inserted = true;		//header("Location:http://".$_SERVER['SERVER_NAME']."/index.php?option=com_content&id=9&task=view&Itemid=26&import=".$import_country."&export=".$export_country."&day=".$day."&month=".$month."&year=".$year);



		/*exit;



		$succes_message ="



		<p>Добавленое обьявление можно просмотреть в разделе <a href='http://moldovatruck.md/index.php?option=com_content&task=view&id=7&Itemid=17'>Просмотр груза</a></p>



		<p>Для&nbsp; быстрого ответа на Ваш запрос&nbsp; обратитесь к менеджерам по направлениям.<br />



		<br />



		Тел:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; +373&nbsp;&nbsp; 686&nbsp; 777 34&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Грузоперевозки по направлению. Россия &ndash;Балканы- Италия<br />



		Тел:&nbsp;&nbsp;&nbsp;&nbsp; +373&nbsp;&nbsp; 693&nbsp; 456 74&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; отдел грузоперевозок&nbsp; Россия- Европа- СНГ-Прибалтика <br />



		Тел:&nbsp;&nbsp;&nbsp;&nbsp; +373&nbsp;&nbsp; 691&nbsp; 298 80&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; отдел грузоперевозок Европа-Россия- СНГ<br />



		Тел:&nbsp;&nbsp;&nbsp;&nbsp; +373&nbsp;&nbsp; 684&nbsp; 99&nbsp; 006&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; отдел грузоперевозок&nbsp; Турция-Греция-СНГ- Казахстан<br />



		Тел:&nbsp;&nbsp;&nbsp;&nbsp; +373&nbsp;&nbsp; 684&nbsp; 99&nbsp; 008&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; отдел перевозок&nbsp; Турция-Греция-СНГ- Казахстан<br />



		Тел:&nbsp;&nbsp;&nbsp;&nbsp; +373&nbsp;&nbsp; 684&nbsp; 99&nbsp; 002/ 003&nbsp; отдел перевозок Россия-Греция- СНГ- Прибалтика<br />



		Тел:&nbsp;&nbsp;&nbsp;&nbsp; +373&nbsp;&nbsp; 684&nbsp; 54&nbsp; 740 /41&nbsp;&nbsp; отдел перевозок, Европа-Турция -Россия <br />



		Тел:&nbsp;&nbsp;&nbsp;&nbsp; +373&nbsp;&nbsp; 684&nbsp; 99&nbsp; 001&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; отдел грузоперевозок Турция-Казахстан Россия<br />



		Тел:&nbsp;&nbsp;&nbsp;&nbsp; +373&nbsp;&nbsp; 690&nbsp; 86&nbsp; 691&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; отдел заказа транспорта Балканы СНГ-Россия-Европа<br />



		Тел:&nbsp;&nbsp;&nbsp;&nbsp; +373&nbsp; 680&nbsp; 13&nbsp;&nbsp; 888&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; отдел экспедирования и консультации<br />



		<br />



		Каждый менеджер даст профессиональную консультацию по Вашему запросу <br />



		Для рекламаций и привередливых клиентов +373-6910-7853</p>";



*/



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

<p><form action="<?php echo str_replace("&amp;","&",$_SERVER["REQUEST_URI"]).'#'.$ANOTHER; ?>" method="POST" name="<?php echo $ANOTHER;?>" id="<?php echo $ANOTHER;?>" onsubmit=" return sendForm('<?php echo $ANOTHER;?>','cargo_type,export_country,import_country,type_transport,cargo_size,fio,t0,email,dt_export','<?php if($mosConfig_lang == 'ru') {
	echo "Наименование груза"; }
	elseif ($mosConfig_lang == 'ro') { echo "Denumirea incarcaturii"; }
	elseif ($mosConfig_lang == 'en') { echo "Description of cargo"; }
?>!<?php if($mosConfig_lang == 'ru') { echo "Страна загрузки"; }
	elseif ($mosConfig_lang == 'ro') { echo "Tara de incarcare"; }
	elseif ($mosConfig_lang == 'en') { echo "Country of loading"; }
?>!<?php if($mosConfig_lang == 'ru') {
	echo 'Страна выгрузки';}
	elseif($mosConfig_lang == 'ro') { echo'Tara de descarcare';}
    elseif($mosConfig_lang == 'en') { echo'Country of unloading';}
 ?>!<?php if($mosConfig_lang == 'ru') { echo "Тип транспорта"; }
	elseif ($mosConfig_lang == 'ro') { echo "Tipul de transport"; }
	elseif ($mosConfig_lang == 'en') { echo "Transport type"; }
?>!<?php if($mosConfig_lang == 'ru') { echo "Вес, объём груза"; }
		elseif ($mosConfig_lang == 'ro') { echo "Volumul si greutatea incarcaturii"; }
		elseif ($mosConfig_lang == 'en') { echo "Cargo size and weight"; }
?>!<?php if($mosConfig_lang == 'ru') { echo "Контактное лицо"; }
	elseif ($mosConfig_lang == 'ro') { echo "Persoana de contact"; }
	elseif ($mosConfig_lang == 'en') { echo "Contact person"; }
?>!<?php if($mosConfig_lang == 'ru') { echo "Контактный телефон"; }
								elseif ($mosConfig_lang == 'ro') { echo "Telefon de contact"; }
								elseif ($mosConfig_lang == 'en') { echo "Telephone"; }
								?>!E-mail!<?php if($mosConfig_lang == 'ru') { echo "Дата погрузки"; }
								elseif ($mosConfig_lang == 'ro') { echo "Data incarcarii"; }
								elseif ($mosConfig_lang == 'en') { echo "Loading Date"; }
							?>');" style="overflow:auto;background-color:white;    padding: 5px;">
                            
 <h4 style="color:#3498db;    text-align: center;
    margin-bottom: 2em;">

<?php

if (LANG=='ru') echo 'Узнать стоимость перевозки';

if (LANG=='ro') echo 'Afla costul de transport';

if (LANG=='en') echo 'Find out the cost of transportation';

?>



</h4>
<p><span id="err_message" style="color:red"><?php echo $err_message; ?></span></p>
	<div class="col-sm-12 col-xs-12">
		<label for="exampleInputEmail1" class="col-sm-6 col-xs-12" style="display:block"><?php if($mosConfig_lang == 'ru') {
				echo "Наименование груза"; }
			elseif ($mosConfig_lang == 'ro') { echo "Denumirea incarcaturii"; }
			elseif ($mosConfig_lang == 'en') { echo "Description of cargo"; }
			?>
			<span style="color: red">*</span>
		</label>
			<span id="select_cargo" class="col-sm-6 col-xs-12">
			<select type="select" name="cargo_type" size="1"  id="cargo_type" class="form-control" style="width:100%;padding: 3px 5px;font-size: 1em;">
			<?php
			if($mosConfig_lang == 'ru') { echo "<option value=''>- укажите тип груза -</option>"; }
			elseif($mosConfig_lang == 'en') { echo "<option value=''>- chose the cargo type -</option>"; }
			elseif ($mosConfig_lang == 'ro') { echo "<option value=''>- indicati tipul de incarcatura -</option>"; }
			echo $cargo_types;
			?>
			</select>
			</span>
	</div>
	<div class="col-sm-12 col-xs-12">
		<label class="col-sm-6 col-xs-12" >
			<?php if($mosConfig_lang == 'ru') { echo "Страна загрузки"; }
			elseif ($mosConfig_lang == 'ro') { echo "Tara de incarcare"; }
			elseif ($mosConfig_lang == 'en') { echo "Country of loading"; }
			?>
			<span style="color: red">*</span>
		</label>
		<span id="select_export" class="col-sm-6 col-xs-12">
<select type="select" name="export_country" class="form-control" style="padding: 3px 5px;font-size: 1em;" size="1" onchange="updateSelect('export_city', this.value, 'export_city','<?php echo $ANOTHER;?>');" id="export_country" >
<?php if($mosConfig_lang == 'ru') { echo '<option value="">- укажите страну -</option>';}
elseif($mosConfig_lang == 'ro') { echo '<option value="">- alegeti tara  -</option>';}
elseif($mosConfig_lang == 'en') { echo '<option value="">- choose the country -</option>';}
echo $countries;
?>
</select>
</span>

	</div>
	<div class="col-sm-12 col-xs-12">
		<label class="col-sm-6 col-xs-12">
			<?php if($mosConfig_lang == 'ru') {
				echo 'Город загрузки';}
			elseif($mosConfig_lang == 'ro') { echo'Oras de incarcare';}
			elseif($mosConfig_lang == 'en') { echo'City of Loading';}
			?>

			<span id="export_city_text"></span>
		</label>
		<span  class="col-sm-6 col-xs-12">
			<select type="select" name="export_city" size="1" id="export_city" style="width:100%;padding: 3px 5px;font-size: 1em;"  class="form-control" onchange="updateSelect('ignore', this.value, 'export_city','<?php echo $ANOTHER;?>');">
			<option value="0"><?php if($mosConfig_lang == 'ru') {
					echo '---не имеет значения---';}
				elseif($mosConfig_lang == 'ro') { echo'---oricare---';}
				elseif($mosConfig_lang == 'en') { echo'---all cities---';}
				?></option>
			</select>
			<span id="export_city_type"></span>
		</span>
	</div>
	<div class="col-sm-12 col-xs-12">
		<label class="col-sm-6 col-xs-12">
			<?php if($mosConfig_lang == 'ru') {
				echo 'Страна выгрузки';}
			elseif($mosConfig_lang == 'ro') { echo'Tara de descarcare';}
			elseif($mosConfig_lang == 'en') { echo'Country of unloading';}
			?> <span style="color: red">*</span>
		</label>
		<span id="select_import" class="col-sm-6 col-xs-12">
<select type="select" name="import_country" size="1" id="import_country" onchange="updateSelect('import_city', this.value, 'import_city','<?php echo $ANOTHER;?>');"  class="form-control" style="width:100%;padding: 3px 5px;font-size: 1em;">
<?php if($mosConfig_lang == 'ru') { echo '<option value="">- укажите страну -</option>';}
elseif($mosConfig_lang == 'ro') { echo '<option value="">- alegeti tara  -</option>';}
elseif($mosConfig_lang == 'en') { echo '<option value="">- choose the country -</option>';}
echo $countries;
?>
</select>
</span>
	</div>
	<div class="col-sm-12 col-xs-12">
		<label class="col-sm-6 col-xs-12">
			<?php
			if($mosConfig_lang == 'ru') { echo'Город выгрузки';}
			elseif($mosConfig_lang == 'ro') { echo'Oras de descarcare';}
			elseif($mosConfig_lang == 'en') { echo'City of unloading';}
			?>
			<span id="import_city_text"></span>
		</label>
		<span class="col-sm-6 col-xs-12">
			<select type="select" name="import_city" size="1" id="import_city" style="width:100%;padding: 3px 5px;font-size: 1em;" class="form-control" onchange="updateSelect('ignore', this.value, 'import_city','<?php echo $ANOTHER;?>');">
<option value="0" ><?php if($mosConfig_lang == 'ru') {
		echo '---не имеет значения---';}
	elseif($mosConfig_lang == 'ro') { echo'---oricare---';}
	elseif($mosConfig_lang == 'en') { echo'---all cities---';}
	?></option>
</select><span id="import_city_type"></span>
		</span>
	</div>
	<div class="col-sm-12 col-xs-12">
		<label class="col-sm-6 col-xs-12">
			<?php if($mosConfig_lang == 'ru') { echo "Тип транспорта"; }
			elseif ($mosConfig_lang == 'ro') { echo "Tipul de transport"; }
			elseif ($mosConfig_lang == 'en') { echo "Transport type"; }
			?>
			<span style="color: red">*</span>
		</label>
	<span id="select_transport" class="col-sm-6 col-xs-12">
	<select type="select" name="type_transport" size="1" class="form-control" id="type_transport" style="width:100%;padding: 3px 5px;font-size: 1em;">
<?php if($mosConfig_lang == 'ru') { echo '<option value="">- укажите тип транспорта -</option>';}
elseif ($mosConfig_lang == 'ro') { echo '<option value="">- indicati tipul transportului -</option>';}
elseif ($mosConfig_lang == 'en') { echo  '<option value="">- choose transport type -</option>';}
echo $transport_types;
?>
	</select>
</span>
	</div>
	<div class="col-sm-12 col-xs-12">
		<label class="col-sm-6 col-xs-12">
			<?php if($mosConfig_lang == 'ru') { echo "Вес, объём груза"; }
			elseif ($mosConfig_lang == 'ro') { echo "Volumul si greutatea incarcaturii"; }
			elseif ($mosConfig_lang == 'en') { echo "Cargo size and weight"; }
			?>
			<span style="color: red">*</span>
		</label>
		<span id="select_cargo_size" class="col-sm-6 col-xs-12">
<select type="select" name="cargo_size" size="1"  class="form-control"  id="cargo_size" style="width:100%;padding: 3px 5px;font-size: 1em;">
 <?php if($mosConfig_lang == 'ru') { echo '<option value="">- выбрать массу/объём -</option>';}
 elseif ($mosConfig_lang == 'ro') { echo '<option value="">- selectati Volumul/greutatea -</option>';}
 elseif ($mosConfig_lang == 'en') { echo '<option value="">- choose size/weight -</option>';}
 echo $cargo_volumes;
 ?>
</select>
</span>
		</div>
	<div class="col-sm-12 col-xs-12">
		<label class="col-sm-6 col-xs-12">
			<?php if($mosConfig_lang == 'ru') { echo "Дата погрузки"; }
			elseif ($mosConfig_lang == 'ro') { echo "Data incarcarii"; }
			elseif ($mosConfig_lang == 'en') { echo "Loading Date"; }
			?> <span style="color: red">*</span>
		</label>
		<span id="date_span"  class="col-sm-6 col-xs-12" style="display: block;">
<div class="form-group">
       <div class='input-group date' id='date_export'>
                   <input type='text' class="form-control" id="dt_export" name="date_export" style="width:100%;padding: 3px 5px;font-size: 1em;height:auto" value="<?php echo $_POST['date_export'] ?>"/>
                   <span class="input-group-addon" style="padding:0px; padding-left:5px; padding-right:5px">
                       <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
  </div>
</span>
	</div>
	<div class="col-sm-12 col-xs-12">
		<label class="col-sm-6 col-xs-12">
			<?php if($mosConfig_lang == 'ru') { echo "Контактное лицо"; }
			elseif ($mosConfig_lang == 'ro') { echo "Persoana de contact"; }
			elseif ($mosConfig_lang == 'en') { echo "Contact person"; }
			?>
			<span style="color: red">*</span></label>
		<span id="fio_span" class="col-sm-6 col-xs-12"><input type="text" name="fio" size="25" id="fio"  class="form-control" value="<?php echo $_POST['fio'] ?>"  style="width:100%;padding: 3px 5px;font-size: 1em; height:auto"/></span>
	</div>
	<div class="col-sm-12 col-xs-12">
		<label class="col-sm-6 col-xs-12">
			<?php if($mosConfig_lang == 'ru') { echo "Контактный телефон"; }
			elseif ($mosConfig_lang == 'ro') { echo "Telefon de contact"; }
			elseif ($mosConfig_lang == 'en') { echo "Telephone"; }
			?> <span style="color: red">*</span></label>
		<span class="col-sm-6 col-xs-12">
			<font  id="phones<?php echo $num;?>"><div class="input-group-addon" style="display:inline-block;  padding-left: 5px; height: 27px;  padding-top: 2.5px;">+</div><input type="text" name="telefon[0]" size="15" maxlength="15" id="t0"  class="form-control"  style="height:auto;padding: 3px 5px;font-size: 1em;display:inline-block;  width: calc(100% - 22px);" placeholder="00000000000"  value="<?php echo $_POST['telefon'][0] ?>"/></font>
		</span>
	</div>
	<div class="col-sm-12 col-xs-12">
		<label class="col-sm-6 col-xs-12">
			E-mail <span style="color: red">*</span>
		</label>
		<span id="email_span"  class="col-sm-6 col-xs-12"><input type="text" name="email" size="25" id="email"  class="form-control" value="<?php echo $_POST['email'] ?>" style="padding: 3px 5px;font-size: 1em;height:auto" /></span>
	</div>
	<div class="col-sm-12 col-xs-12">
		<input type="submit" name="cargo_sm" class="col-md-offset-6 col-sm-offset-6 btn btn-success" value="<?php if($mosConfig_lang == 'ru') { echo "Отправить"; }
		elseif ($mosConfig_lang == 'ro') { echo "Calculeaza"; }
		elseif ($mosConfig_lang == 'en') { echo "Calculate"; }
		?>" id="submit" style="padding:5px;"/>
	</div>

<!--<tr>



<td style="padding-bottom:8px;">Skype</td>



<td style="padding-bottom:8px;"><input type="text" name="skype" size="25"   /></td>



</tr>







<tr>



<td style="padding-bottom:10px;">ICQ</td>



<td style="padding-bottom:10px;"><input type="text" name="icq" size="25"   /></td>



</tr>-->

<input type="hidden" value="<? echo $ANOTHER;?>" name="form_name" />
</form>
<script>
$(function () {
                $('#<?php echo $ANOTHER;?> #date_export').datetimepicker({
				locale:'ru',
				format: 'DD-MM-YYYY'
				}
				);
		});
			<?php if ($ANOTHER=='forma') echo "num = [0,0];
	forms = ['forma','formc'];"; ?>

</script>
<?php } else {
	if (!empty($succes_message)) echo $succes_message;
	else echo 'Данная форма уже ноходится на странице';
	}
?>