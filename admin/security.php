<?php

if (!empty($_POST))
{
	$old = $_POST['old'];
	$new = $_POST['new'];
	$confirm = $_POST['confirm'];
	
	if ($new!==$confirm)
	{
		echo 'Вы не подтвердили пароль';
	}
	else
	{
		$getPass = mysqli_query($CONNECTION,"SELECT * FROM `".DB_PREFIX."admin`");
		$pass = mysqli_fetch_array($getPass);
		
		if (password_verify($old,$pass['password']))
		{
			$new = password_hash($new,PASSWORD_DEFAULT);
			$upd = mysqli_query($CONNECTION,"UPDATE `".DB_PREFIX."admin` SET `password`='$new'");
			session_destroy();
			echo 'Пароль сменен. Зайдтие снова как администратор';
		}
		else echo 'Старый пароль не верен';
	}
}
else
{

?>

<form action="<?php echo $admin_page;?>security" method="post" enctype="multipart/form-data">
<div class="form-group">
    <label for="exampleInputEmail1">Старый пароль</label>
    <input type="password" class="form-control" id="exampleInputEmail1" name="old">
  </div>
  
  <div class="form-group">
    <label for="exampleInputEmail1">Новый пароль</label>
    <input type="password" class="form-control" id="exampleInputEmail1" name="new">
  </div>
  
  <div class="form-group">
    <label for="exampleInputEmail1">Повотрите новый пароль</label>
    <input type="password" class="form-control" id="exampleInputEmail1" name="confirm">
  </div>
  
  <div style="margin-top:20px;text-align:center"><button type="submit" class="btn btn-primary">Изменить</button></div>
  
</form>

<? }?>