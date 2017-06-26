<?php
session_start();
require_once "system/configuration.php";
require_once "system/functions.php";

$modalForm  = (int) htmlspecialchars($_POST['modal'],ENT_QUOTES);
if ($modalForm>0)
{
	$getForm = mysqli_query($CONNECTION,"SELECT `formName` FROM `".DB_PREFIX."forms` WHERE `formId`='$modalForm'");
	if (mysqli_num_rows($getForm)==1)
	{
	$form = mysqli_fetch_array($getForm);
	echo '<div class="modal-content"><div class="modal-header">
			  <button type="button" class="close" data-dismiss="modal">&times;</button>
			  <h4 class="modal-title">'.$form['formName'].'</h4>
			</div>
			<div class="modal-body">';
			?>
            
			<? getIncludes(Image(ViewForm($modalForm)));?>
			<?
			echo'</div>
			</div>
		  </div>';
	}else echo mysqli_error($CONNECTION);
}
//getIncludes(ViewForm($modalForm))
?>