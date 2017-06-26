<?php
include(dirname(__FILE__)."/../system/configuration.php");
	$dell = mysqli_query($CONNECTION,"UPDATE `buianov_menu` SET `Active`='0' WHERE `menuId`='".$_POST['ID']."'");
	if ($dell)	echo '1'; else echo mysqli_error($CONNECTION);

?>