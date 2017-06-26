<?php

	$getMenu = mysqli_query($CONNECTION,"SELECT * FROM `".DB_PREFIX."menu` WHERE `menuId`='$arr[1]'");
	if (mysqli_num_rows($getMenu)>0)
	{
		$menu = mysqli_fetch_array($getMenu);
		if ($arr[0]=='menu_top') 
		{
			$query = "UPDATE `".DB_PREFIX."menu` SET `Order`=`Order`+1 WHERE `menuTypeId`='$menu[menuTypeId]' AND `Parent`='$menu[Parent]' AND `Order`>'".($menu['Order']-1)."'";
			
			$do = mysqli_query($CONNECTION,$query);
			$query = "UPDATE `".DB_PREFIX."menu` SET `Order`=".($menu['Order']-1)." WHERE `menuId`='$menu[menuId]'";
			
			$this_ = mysqli_query($CONNECTION, $query);
			echo '<html><head><meta http-equiv="refresh" content="0;URL='.$admin_page.'edit_menu/'.$menu['menuTypeId'].'" /></head></html>';
		}
		else
		{
			$query = "UPDATE `".DB_PREFIX."menu` SET `Order`=`Order`-1 WHERE `menuTypeId`='$menu[menuTypeId]' AND `Parent`='$menu[Parent]' AND `Order`<'".($menu['Order']+1)."'";
		
			$do = mysqli_query($CONNECTION,$query);
			$query = "UPDATE `".DB_PREFIX."menu` SET `Order`=".($menu['Order']+1)." WHERE `menuId`='$menu[menuId]'";
		
			$this_ = mysqli_query($CONNECTION, $query);
			echo '<html><head><meta http-equiv="refresh" content="0;URL='.$admin_page.'edit_menu/'.$menu['menuTypeId'].'" /></head></html>';
		}
	}

?>