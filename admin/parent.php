<?php
session_start();
include(dirname(__FILE__)."/../system/configuration.php");
	
	$q="SELECT `menuId`,`menuName` FROM `buianov_menu` WHERE `menuTypeId`='".$_POST['type']."' AND `Active`='1' AND `langAbb`='ru'";

	$getMenu = mysqli_query($CONNECTION,$q);
	if (mysqli_num_rows($getMenu)>0)
	{
		echo '<label for="exampleInputEmail1">Родитель</label>
        <select  class="form-control" name="parent"><option>Нет родителя</option>';
		$menu = mysqli_fetch_array($getMenu);
		do
		{
			echo '<option value="'.$menu['menuId'].'">'.$menu['menuName'].'</option>';
		}
		while($menu = mysqli_fetch_array($getMenu));
		echo'</select>';
	}else echo mysqli_error($CONNECTION);

?>