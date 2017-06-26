<?php
$language = LANG;

$URL = URL;
if($URL=='ru/mezhdunarodnyie-passazhirskie-perevozki.php' || $URL=='ro/mezhdunarodnyie-passazhirskie-perevozki.php' || $URL=='en/mezhdunarodnyie-passazhirskie-perevozki.php') 
$suffix = '_passengers';

$expl = explode('/',URL);
$expl = explode('.php',$expl[1]);
include (dirname(__FILE__).'/db_connect/db_read.php');

//country list
$query = "SELECT country_group, id_country, country_name_$language as country_name FROM country ORDER BY country_group ASC, country_name_$language ASC";
$table = mysqli_query($db,$query);
$countries = "";
if (mysqli_num_rows($table) > 0)
{
	$data= mysqli_fetch_array($table);
	$country_group = $data['country_group'];
	$countries.="<optgroup label=''>";
	if((is_numeric($_GET['export'])&&$_GET['export']==$data['id_country']) or (isset($_POST['export_country'])&&$_POST['export_country']==$data['id_country']))
	$countries.= "<option value='".$data['id_country']."' selected='selected'>".$data['country_name']."</option>";
	else $countries.= "<option value='".$data['id_country']."'>".$data['country_name']."</option>";
	while ($data = mysqli_fetch_array($table))
	{
		if ($data['country_group'] != $country_group)
		{
			$countries.="</optgroup>";
			$country_group = $data['country_group'];
			$countries.="<optgroup label='___________________________'>";
		}
		if((is_numeric($_GET['export'])&&$_GET['export']==$data['id_country']) or (isset($_POST['export_country'])&&$_POST['export_country']==$data['id_country']))
		$countries.="<option value='".$data['id_country']."' selected='selected'>".$data['country_name']."</option>";
		else $countries.="<option value='".$data['id_country']."'>".$data['country_name']."</option>";
	}
	$countries.="</optgroup>";
}
$query = "SELECT country_group, id_country, country_name_$language as country_name FROM country ORDER BY country_group ASC, country_name_$language ASC";
$table = mysqli_query($db,$query);
$countries2 = "";
if (mysqli_num_rows($table) > 0)
{
	$data= mysqli_fetch_array($table);
	$country_group = $data['country_group'];
	$countries2.="<optgroup label=''>";
	if((is_numeric($_GET['import'])&&$_GET['import']==$data['id_country']) or (isset($_POST['import_country'])&&$_POST['import_country']==$data['id_country']))
	$countries2.= "<option value='".$data['id_country']."' selected='selected'>".$data['country_name']."</option>";
	else $countries2.= "<option value='".$data['id_country']."'>".$data['country_name']."</option>";
	while ($data = mysqli_fetch_array($table))
	{
		if ($data['country_group'] != $country_group)
		{
			$countries2.="</optgroup>";
			$country_group = $data['country_group'];
			$countries2.="<optgroup label='___________________________'>";
		}
		if((is_numeric($_GET['import'])&&$_GET['import']==$data['id_country']) or (isset($_POST['import_country'])&&$_POST['import_country']==$data['id_country']))
		$countries2.="<option value='".$data['id_country']."' selected='selected'>".$data['country_name']."</option>";
		else $countries2.="<option value='".$data['id_country']."'>".$data['country_name']."</option>";
	}
	$countries2.="</optgroup>";
}
//country list
//$split = " AND split$suffix=1";
if (!isset($suffix)or empty($suffix))  {$split1 = " OR split_seafreight = 1 OR split_rails = 1"; $split = " AND split=1 ";}
else { $split1 = ""; $split = " AND split$suffix=1 ";}

if(isset($suffix)and ($suffix=='_post' or $suffix=='_passengers'))
{
	$split = '';
}
//Transport type list
if($expl[0]=='prosmotr-gruzov-nayti-gruz-poisk-poputnyih-gruzov-predlozheniya-gruzov-888' or $expl[0]=='poisk-transporta-nayti-svobodnyiy-transport-poisk-poputnogo-transporta-577')  $query = "SELECT id as data_id, transport_type_$language as data_title,  transport_type_group as data_group FROM  transport_type$suffix WHERE id IN (2,3,4,5,7,8,9,10,11,12,13,14,16,17,18,19,20,21,22,23,26,27,28,29,32,35,37,45) AND transport_type_hidden != 1 AND split='1' ORDER BY transport_type_group ASC, `order` ASC, transport_type_$language ASC";
elseif ($expl[0]=='sea_cargo' or $expl[0]=='sea_transport') $query = "SELECT id as data_id, transport_type_$language as data_title,  transport_type_group as data_group FROM  transport_type$suffix WHERE id IN (15) AND transport_type_hidden != 1 AND split_seafreight='1' ORDER BY transport_type_group ASC, `order` ASC, transport_type_$language ASC";
elseif ($expl[0]=='train_cargo' or $expl[0]=='train_transport') $query = "SELECT id as data_id, transport_type_$language as data_title,  transport_type_group as data_group FROM  transport_type$suffix WHERE id IN (44) AND transport_type_hidden != 1 AND split_rails='1' ORDER BY transport_type_group ASC, `order` ASC, transport_type_$language ASC";
elseif ($expl[0]=='plain_cargo' or $expl[0]=='plain_transport') $query = "SELECT id as data_id, transport_type_$language as data_title,  transport_type_group as data_group FROM  transport_type$suffix WHERE id IN (44) AND transport_type_hidden != 1 AND split_avia='1' ORDER BY transport_type_group ASC, `order` ASC, transport_type_$language ASC";
elseif($expl[0]=='post_cargo' or $expl[0]=='post_transport')$query = "SELECT id as data_id, transport_type_$language as data_title,  transport_type_group as data_group FROM  transport_type_post WHERE transport_type_hidden != 1 ORDER BY transport_type_group ASC, `order` ASC, transport_type_$language ASC";
elseif($expl[0]=='passenger_cargo' or $expl[0]=='passenger_transport')$query = "SELECT id as data_id, transport_type_$language as data_title,  transport_type_group as data_group FROM  transport_type_passengers WHERE transport_type_hidden != 1 ORDER BY transport_type_group ASC, `order` ASC, transport_type_$language ASC";
else 
$query = "SELECT id as data_id, transport_type_$language as data_title,  transport_type_group as data_group FROM  transport_type$suffix WHERE transport_type_hidden != 1 $split $split1 ORDER BY transport_type_group ASC, `order` ASC, transport_type_$language ASC";
$table = mysqli_query($db,$query);
$transport_types = "";
if (mysqli_num_rows($table) > 0)
{
	$data= mysqli_fetch_array($table);
	$data_group = $data['data_group'];
	$transport_types.="<optgroup label=''>";
	if(mysqli_num_rows($table)==1) $transport_types.= "<option value='".$data['data_id']."' selected='selected'>".$data['data_title']."</option>";
	
	while ($data = mysqli_fetch_array($table))
	{
		if ($data['data_group'] != $data_group)
		{
			$transport_types.="</optgroup>";
			$data_group = $data['data_group'];
			$transport_types.="<optgroup label='___________________________'>";
		}
		if(isset($_POST['type_transport'])&&!empty($_POST['type_transport'])&&$_POST['type_transport']==$data['data_id']) $transport_types.= "<option value='".$data['data_id']."' selected='selected'>".$data['data_title']."</option>";
		else $transport_types.= "<option value='".$data['data_id']."'>".$data['data_title']."</option>";
	}
	$transport_types.="</optgroup>";
}
//Transport type list

//Cargo type list
if ($expl[0]=='post_cargo' or $expl[0]=='post_transport')
$query = "SELECT id as data_id, cargo_type_$language as data_title, cargo_type_group as data_group  FROM  cargo_type_post WHERE cargo_type_hidden != 1 ORDER BY cargo_type_group ASC, `order` ASC, cargo_type_$language ASC";

else
$query = "SELECT id as data_id, cargo_type_$language as data_title, cargo_type_group as data_group  FROM  cargo_type$suffix WHERE cargo_type_hidden != 1 ORDER BY cargo_type_group ASC, `order` ASC, cargo_type_$language ASC";
$table = mysqli_query($db,$query);
$cargo_types = "";
if (mysqli_num_rows($table) > 0)
{
	$data= mysqli_fetch_array($table);
	$data_group = $data['data_group'];
	$cargo_types.="<optgroup label=''>";
	if(isset($_POST['cargo_type'])&&!empty($_POST['cargo_type'])&&$_POST['cargo_type']==$data['data_id']) $cargo_types.= "<option value='".$data['data_id']."' selected='selected'>".$data['data_title']."</option>";
	else $cargo_types.= "<option value='".$data['data_id']."'>".$data['data_title']."</option>";
	
	while ($data = mysqli_fetch_array($table))
	{
		if ($data['data_group'] != $data_group)
		{
			$cargo_types.="</optgroup>";
			$data_group = $data['data_group'];
			$cargo_types.="<optgroup label=''>";
		}
		if(isset($_POST['cargo_type'])&&!empty($_POST['cargo_type'])&&$_POST['cargo_type']==$data['data_id']) $cargo_types.= "<option value='".$data['data_id']."' selected='selected'>".$data['data_title']."</option>";
		else  $cargo_types.= "<option value='".$data['data_id']."'>".$data['data_title']."</option>";
	}
	$cargo_types.="</optgroup>";
}
//Cargo type list

//Volume type list
if($expl[0]=='sea_cargo' or $expl[0]=='sea_transport')
$query = "SELECT id as data_id, cargo_volume_$language as data_title, cargo_volume_group as data_group  FROM  cargo_volume$suffix WHERE cargo_volume_hidden='0' AND split_seafreight='1' ORDER BY id ASC, cargo_volume_group ASC, `order` ASC, cargo_volume_$language ASC";
elseif($expl[0]=='train_cargo' or $expl[0]=='train_transport')
$query = "SELECT id as data_id, cargo_volume_$language as data_title, cargo_volume_group as data_group  FROM  cargo_volume$suffix WHERE cargo_volume_hidden='0' AND split_rails='1' ORDER BY id ASC, cargo_volume_group ASC, `order` ASC, cargo_volume_$language ASC";
elseif($expl[0]=='plain_cargo' or $expl[0]=='plain_transport')
$query = "SELECT id as data_id, cargo_volume_$language as data_title, cargo_volume_group as data_group  FROM  cargo_volume$suffix WHERE cargo_volume_hidden='0' AND split_avia='1' ORDER BY id ASC, cargo_volume_group ASC, `order` ASC, cargo_volume_$language ASC";
elseif($expl[0]=='post_cargo' or $expl[0]=='post_transport')
$query = "SELECT id as data_id, cargo_volume_$language as data_title, cargo_volume_group as data_group  FROM  cargo_volume_post WHERE cargo_volume_hidden='0'  ORDER BY id ASC, cargo_volume_group ASC, `order` ASC, cargo_volume_$language ASC";
else
$query = "SELECT id as data_id, cargo_volume_$language as data_title, cargo_volume_group as data_group  FROM  cargo_volume$suffix WHERE cargo_volume_hidden='0' $split  ORDER BY id ASC, cargo_volume_group ASC, `order` ASC, cargo_volume_$language ASC";
$table = mysqli_query($db,$query);
$cargo_volumes = "";
if (mysqli_num_rows($table) > 0)
{
	$data= mysqli_fetch_array($table);
	$data_group = $data['data_group'];
	$cargo_volumes.="<optgroup label=''>";
	if(isset($_POST['cargo_size'])&&!empty($_POST['cargo_size'])&&$_POST['cargo_size']==$data['data_id']) $cargo_volumes.= "<option value='".$data['data_id']."' selected='selected'>".$data['data_title']."</option>";
	else $cargo_volumes.= "<option value='".$data['data_id']."'>".$data['data_title']."</option>";
	
	while ($data = mysqli_fetch_array($table))
	{
		if ($data['data_group'] != $data_group)
		{
			$cargo_volumes.="</optgroup>";
			$data_group = $data['data_group'];
			$cargo_volumes.="<optgroup label=''>";
		}
		if(isset($_POST['cargo_size'])&&!empty($_POST['cargo_size'])&&$_POST['cargo_size']==$data['data_id']) $cargo_volumes.= "<option value='".$data['data_id']."' selected='selected'>".$data['data_title']."</option>";
		else $cargo_volumes.= "<option value='".$data['data_id']."'>".$data['data_title']."</option>";
	}
	$cargo_volumes.="</optgroup>";
}
//Volume type list
//$dbo = mysqli_connect('localhost', 'mweb72', 'ytsAF3aA');
//$db_select = mysqli_select_db('usr_mweb72_1', $dbo);
if($expl[0]=='sea_cargo' or $expl[0]=='sea_transport')
{
	$query = "SELECT id as data_id, container_type_$language as data_title, container_type_group as data_group  FROM  container_type_seafreight WHERE container_type_hidden='0'  ORDER BY container_type_group ASC, `order` ASC, container_type_$language ASC";
	$table = mysqli_query($db,$query);
	$cargo_container = '';
	if (mysqli_num_rows($table) > 0)
	{
		$data= mysqli_fetch_array($table);
		$data_group = $data['data_group'];
		$cargo_container.="<optgroup label=''>";
		if(isset($_POST['cont'])&&!empty($_POST['cont'])&&$_POST['cont']==$data['data_id']) $cargo_container.= "<option value='".$data['data_id']."' selected='selected'>".$data['data_title']."</option>";
		else $cargo_container.= "<option value='".$data['data_id']."'>".$data['data_title']."</option>";
		
		while ($data = mysqli_fetch_array($table))
		{
			if ($data['data_group'] != $data_group)
			{
				$cargo_container.="</optgroup>";
				$data_group = $data['data_group'];
				$cargo_container.="<optgroup label=''>";
			}
			if(isset($_POST['cont'])&&!empty($_POST['cont'])&&$_POST['cont']==$data['data_id']) $cargo_container.= "<option value='".$data['data_id']."' selected='selected'>".$data['data_title']."</option>";
			else $cargo_container.= "<option value='".$data['data_id']."'>".$data['data_title']."</option>";
		}
		$cargo_container.="</optgroup>";
	}
}

if($expl[0]=='train_cargo' or $expl[0]=='train_transport')
{
	$query = "SELECT id as data_id, container_type_$language as data_title, container_type_group as data_group  FROM  container_type_rails WHERE container_type_hidden='0'  ORDER BY container_type_group ASC, `order` ASC, container_type_$language ASC";
	$table = mysqli_query($db,$query);
	$cargo_container = '';
	if (mysqli_num_rows($table) > 0)
	{
		$data= mysqli_fetch_array($table);
		$data_group = $data['data_group'];
		$cargo_container.="<optgroup label=''>";
		if(isset($_POST['cont'])&&!empty($_POST['cont'])&&$_POST['cont']==$data['data_id']) $cargo_container.= "<option value='".$data['data_id']."' selected='selected'>".$data['data_title']."</option>";
		else $cargo_container.= "<option value='".$data['data_id']."'>".$data['data_title']."</option>";
		
		while ($data = mysqli_fetch_array($table))
		{
			if ($data['data_group'] != $data_group)
			{
				$cargo_container.="</optgroup>";
				$data_group = $data['data_group'];
				$cargo_container.="<optgroup label=''>";
			}
			if(isset($_POST['cont'])&&!empty($_POST['cont'])&&$_POST['cont']==$data['data_id']) $cargo_container.= "<option value='".$data['data_id']."' selected='selected'>".$data['data_title']."</option>";
			else $cargo_container.= "<option value='".$data['data_id']."'>".$data['data_title']."</option>";
		}
		$cargo_container.="</optgroup>";
	}
}

?>