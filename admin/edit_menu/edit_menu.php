<h1>Редактирование меню</h1>
<?php

	if (!isset($arr[0]))
	{
		$getMenuTypes = mysqli_query($CONNECTION,"SELECT * FROM `".DB_PREFIX."menutypes`");
		if (mysqli_num_rows($getMenuTypes)>0)
		{
			$menuTypes = mysqli_fetch_array($getMenuTypes);
			do
			{
				echo '<div style="width:49%;display:inline-block">'.$menuTypes['typeTitle'].'</div>
				<div style="display:inline-block;width:50%; text-align:right"><a href="'.$admin_page.'edit_menu/'.$menuTypes['menuTypeId'].'">Редактировать</a></div>
				';
			}
			while($menuTypes = mysqli_fetch_array($getMenuTypes));
		}
	}
	else
	{
		$getParents = mysqli_query($CONNECTION,"SELECT `Parent`,`menuName` FROM `".DB_PREFIX."menu` WHERE `menuTypeId`='$arr[0]' AND `langAbb`='ru' AND `Active`='1' GROUP BY `Parent` ORDER BY `Order`");
		if (mysqli_num_rows($getParents)>0)
		{
			$Parents = mysqli_fetch_array($getParents);
			do
			{
				echo '<div style="width:100%"><b>'.$Parents['menuName'].'</b></div>';
				$getMenu = mysqli_query($CONNECTION,"SELECT * FROM `".DB_PREFIX."menu` WHERE `menuTypeId`='$arr[0]' AND `Parent`='$Parents[Parent]' AND `langAbb`='ru' AND `Active`='1' ORDER BY `Order`");
				if (mysqli_num_rows($getMenu)>0)
				{
					$k=1;
					$menu = mysqli_fetch_array($getMenu);
					do
					{
						if ($menu['menuId']!==$Parents['Parent'])
						{
							echo '<div style="width:70%;display:inline-block;">'.$menu['menuName'].'</div>';
							if ($k>1) echo '<div style="width:10%;display:inline-block;"><a href="'.$admin_page.'menu_top/'.$menu['menuId'].'">Вверх</a></div>';
							else echo '<div style="width:10%;display:inline-block;"></div>';
							if($k<mysqli_num_rows($getMenu)) echo '<div style="width:10%;display:inline-block;"><a href="'.$admin_page.'menu_down/'.$menu['menuId'].'">Вниз</a></div>';
							else echo '<div style="width:10%;display:inline-block;"></div>';
							echo '<div style="width:10%;display:inline-block;"><a href="javascript:DellMenu('.$menu['menuId'].')">Удалить</a></div>';
							$k++;
						}
					}
					while($menu = mysqli_fetch_array($getMenu));
				}
			}
			while($Parents = mysqli_fetch_array($getParents));
		}
	}

?>