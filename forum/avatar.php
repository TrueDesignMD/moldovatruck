<?php
session_start();
session_name("MoldovaTruck");
require_once "../system/configuration.php";
require_once "../system/functions.php";
if (!isset($_SESSION['user'])) exit('Нет сессии');
else if ($_SESSION['group']!=='admin') $userID = htmlspecialchars($_SESSION['user'],ENT_QUOTES);
else if (!empty($_GET['userID'])) $userID = htmlspecialchars($_GET['userID'],ENT_QUOTES);

if (!empty($_FILES['file']))
{
	
	$file = $_FILES['file']['tmp_name'];
	$filename = $_FILES['file']['name'];
	if(!empty($file))
	{
		
		ini_set('memory_limit', '32M'); 
  		$maxsize = "3145728";
 	 	$extentions = array( "jpg","png","gif","jpeg");
  		$size = filesize ($_FILES['file']['tmp_name']); 
  		$type = strtolower(substr($filename, 1+strrpos($filename,".")));
  		$new_name = $userID.md5(time()).'.'.$type;
  		$to = '../images/avatars/'.$new_name;
  		$dr = $home_url.'images/avatars/'.$new_name; 
		if($size > $maxsize)
  		{ 
     		echo "Файл больше 100 мб. Уменьшите размер вашего файла или загрузите другой. <br><a href='' onClick=window.close();>Закрыть окно</a>";
  		} 
  		elseif(!in_array($type,$extentions)) 
  		{ 
    		echo ' <b>Файл имеет недопустимое расширение <font color="#FF0000">'.$type.'</font></b>. Допустимыми являются форматы изображений. <br>';
  		} 
  		else 
  		{ 
			
    		if (copy($file, $to))
			{
				$update = mysqli_query($CONNECTION,"UPDATE `".DB_PREFIX."users` SET `Avatar`='$dr' WHERE `userID`='$userID'");
			}
		}
	}else echo 'Нет файла';
}

	$getAvatar = mysqli_query($CONNECTION,"SELECT `Avatar` FROM `".DB_PREFIX."users` WHERE `userID`='$userID'");
	if (mysqli_num_rows($getAvatar)>0)
	{
		$Avatar = mysqli_fetch_array($getAvatar);
		echo'<table><tr><td>';
		if (!empty($Avatar['Avatar'])) echo '<img src="'.$Avatar['Avatar'].'" style="max-width:5em;max-height:5em;">';
		else echo 'Добавить фото';
		echo '</td>';
	}else echo 'Ошибка '.mysqli_error($getAvatar);

?>
<td>

Сменить фото
<form enctype="multipart/form-data" id="form" action="<?php echo HOME.'forum/avatar.php?userID='.$userID; ?>" method="POST">
<input type="file" id="avatar" name="file" placeholder="Аватар" onchange="$('#form').submit()"/>
</form>
</td>
</tr>
</table>
<script src="<?php echo $home_url;?>jquery-1.10.2.min.js"></script>