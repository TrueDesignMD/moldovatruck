<?php
session_start();
require_once "system/configuration.php";
require_once "system/functions.php";

	$getReference = mysqli_query($CONNECTION,"SELECT `language_id`,`value`,`reference_id`,`reference_field` FROM `jos_jf_content` WHERE `reference_table`='content' ORDER BY `reference_id`");
	if (mysqli_num_rows($getReference)>0)
	{
		$Ref = mysqli_fetch_array($getReference);
		do
		{
			if ($Ref['language_id']==2) $lang = 'en'; elseif($Ref['language_id']==4) $lang = 'ro';
			$getInsert = mysqli_query($CONNECTION,"SELECT `oldurl` FROM `jos_redirection` WHERE `newurl` LIKE '%id=".$Ref['reference_id']."%' AND `oldurl` LIKE '$lang%'");
			if (mysqli_num_rows($getInsert)>0)
			{
				$Inserted = mysqli_fetch_array($getInsert);
				$getIDpages = mysqli_query($CONNECTION,"SELECT `pageId` FROM `".DB_PREFIX."pages` WHERE `URL`='".$Inserted['oldurl']."'");
				if (mysqli_num_rows($getIDpages)>0)
				{
					$IDpages = mysqli_fetch_array($getIDpages);
					if ($Ref['reference_field']=='title') $query = "UPDATE `".DB_PREFIX."pages` SET `pageName`='".htmlspecialchars($Ref['value'],ENT_QUOTES)."' WHERE `pageId`='".$IDpages['pageId']."'";
					else $query = "UPDATE `".DB_PREFIX."pages` SET `Content`='".htmlspecialchars($Ref['value'],ENT_QUOTES)."' WHERE `pageId`='".$IDpages['pageId']."'";
					$upd = mysqli_query($CONNECTION,$query);
					if (!$upd) echo mysqli_error($CONNECTION).'<br>';
				}
			}
			//if ($Ref['reference_field']=='title') 
		}
		while($Ref = mysqli_fetch_array($getReference));
	}else echo mysqli_error($CONNECTION);

?>