<h1>Добавление меню</h1>
<?php

	if(!empty($_POST))
	{
		$type = htmlspecialchars($_POST['menuTypeId'],ENT_QUOTES);
		$parent = htmlspecialchars($_POST['parent'],ENT_QUOTES);
		$name = htmlspecialchars($_POST['name'],ENT_QUOTES);
		$link = htmlspecialchars($_POST['link'],ENT_QUOTES);
		
		if (!empty($type)&&!empty($name)&&!empty($parent)&&!empty($link))
		{
			$maxOrder = mysqli_query($CONNECTION,"SELECT MAX(`Order`) AS `max` FROM `".DB_PREFIX."menu` WHERE `menuTypeId`='$type' AND `Parent`='$parent'");
			$Order  = mysqli_fetch_array($maxOrder);
			$Or = ($Order['max']+1);
			$insert = mysqli_query($CONNECTION,"INSERT INTO `".DB_PREFIX."menu`(`menuTypeId`,`menuName`,`URL`,`Parent`,`Order`,`Active`,`langAbb`)VALUES('$type','$name','$link','$parent','$Or','1','ru')"); 
			if ($insert) echo 'Добавленно';
			 else echo mysqli_error($CONNECTION);
		}
		else echo 'Не все поля заполнены';
	}
	else
	{
	?>
    
    <form action="<?php echo $admin_page;?>add_menu" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="exampleInputEmail1" >Меню</label>
        <select name="menuTypeId" class="form-control" onchange="Parent()" id="type">
        <option value="">Выберите меню</option>
        <?php
		$getMenuTypes = mysqli_query($CONNECTION,"SELECT * FROM `buianov_menutypes`");
		if (mysqli_num_rows($getMenuTypes)>0)
		{
			$menuType = mysqli_fetch_array($getMenuTypes);
			do
			{
				echo '<option value="'.$menuType['menuTypeId'].'">'.$menuType['typeTitle'].'</option>';
			}
			while($menuType = mysqli_fetch_array($getMenuTypes));
		}
		?>
        </select>
      </div>
      <div class="form-group" id="parent">
        <label for="exampleInputEmail1">Родитель</label>
        <select disabled="disabled" class="form-control"></select>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Название</label>
        <input type="text" name="name" class="form-control">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Ссылка</label>
        <input type="text" name="link" class="form-control">
      </div>
      
  
	<div style="margin-top:20px;text-align:center"><button type="submit" class="btn btn-primary">Добавить</button></div>
  </form>
    
    <?	
	}
?>