<h1>Редактирование старницы</h1>
<?php
function Navigation($page,$pages) {
    $n='';
	global $admin_page;
    if($pages>1){
        $n.='<div class="pages">';
        if($pages <= 9) {
            $start = 1;
            $end = $pages;
        }
        else {
            if(($page - 4) < 1) {
                $start = 1;
                $end = 9;
            }
            elseif(($page + 4) > $pages) {
                $end = $pages;
                $start = $pages - 9;
            }
            else {
                $start = ($page - 4);
                $end = ($page +4);
            }
        }
        for($i = $start; $i <= $end; $i++){
            $n.='<a href="'.$admin_page.'edit_page'.(($i != 1) ? '?page='.$i : '').'"'.(($page == $i) ? ' ' : '').'><strong>'.$i.'</strong></a>';
        }
        if($end < $pages) {
            if($end != ($pages - 1)) $n.='<span>...</span>';
            $n.='<a href="'.$admin_page.'edit_page?page='.$pages.'">'.$pages.'</a>';
        }
        $n.='</div>';
    }
return $n;
}

if(is_numeric($arr[0]) or !empty($_POST['ID']))
{
		if(!empty($_POST['ID'])) $arr[0] = $_POST['ID'];
	$getPage = mysqli_query($CONNECTION,"SELECT *  FROM `buianov_pages` WHERE `pageId`='".$arr[0]."'");
	if (mysqli_num_rows($getPage)==0) exit("Not found");
	$page = mysqli_fetch_array($getPage);	if(empty(trim($page['MetaTitle']))) $page['MetaTitle'] = $page['pageName'];
	$getParent = mysqli_query($CONNECTION,"SELECT `Parent`  FROM `buianov_sitemap` WHERE `Link`='".$page['URL']."'");	$sitemap = mysqli_fetch_array($getParent);
	$getPageRO = mysqli_query($CONNECTION,"SELECT *  FROM `buianov_pages` WHERE `URL`='ro".substr($page['URL'],2)."'");	if (mysqli_num_rows($getPageRO)>0) $pageRO = mysqli_fetch_array($getPageRO);	if(empty(trim($pageRO['MetaTitle']))) $pageRO['MetaTitle'] = $pageRO['pageName'];
	
	$getPageEN = mysqli_query($CONNECTION,"SELECT *  FROM `buianov_pages` WHERE `URL`='en".substr($page['URL'],2)."'");	if (mysqli_num_rows($getPageEN)>0) $pageEN = mysqli_fetch_array($getPageEN);	if(empty(trim($pageEN['MetaTitle']))) $pageEN['MetaTitle'] = $pageEN['pageName'];		if (empty($page['text']))	{		$getPage = mysqli_query($CONNECTION,"SELECT `newurl` FROM `jos_redirection` WHERE `oldurl`='$page[URL]'");		if (mysqli_num_rows($getPage)>0)			{				$title = mysqli_fetch_array($getPage);				$explode= explode('id=',$title['newurl']);				$ex2 = explode('&',$explode[1]);				$getCont = mysqli_query($CONNECTION,"SELECT `introtext`,`fulltext` FROM `jos_content` WHERE `id`='$ex2[0]'");				if (mysqli_num_rows($getCont)>0)				{					$title = mysqli_fetch_array($getCont);					if (empty($title['introtext'])) $title['Content'] = $title['fulltext'];					else $title['Content'] = $title['introtext'];					$page['Content'] = $title['Content'];				}			}	}	if (empty($pageRO['text']))	{		$getPage = mysqli_query($CONNECTION,"SELECT `newurl` FROM `jos_redirection` WHERE `oldurl`='$pageRO[URL]'");		if (mysqli_num_rows($getPage)>0)			{				$title = mysqli_fetch_array($getPage);				$explode= explode('id=',$title['newurl']);				$ex2 = explode('&',$explode[1]);				$getCont = mysqli_query($CONNECTION,"SELECT `introtext`,`fulltext` FROM `jos_content` WHERE `id`='$ex2[0]'");				if (mysqli_num_rows($getCont)>0)				{					$title = mysqli_fetch_array($getCont);					if (empty($title['introtext'])) $title['Content'] = $title['fulltext'];					else $title['Content'] = $title['introtext'];					$pageRO['Content'] = $title['Content'];				}			}	}	if (empty($pageEN['text']))	{		$getPage = mysqli_query($CONNECTION,"SELECT `newurl` FROM `jos_redirection` WHERE `oldurl`='$pageEN[URL]'");		if (mysqli_num_rows($getPage)>0)			{				$title = mysqli_fetch_array($getPage);				$explode= explode('id=',$title['newurl']);				$ex2 = explode('&',$explode[1]);				$getCont = mysqli_query($CONNECTION,"SELECT `introtext`,`fulltext` FROM `jos_content` WHERE `id`='$ex2[0]'");				if (mysqli_num_rows($getCont)>0)				{					$title = mysqli_fetch_array($getCont);					if (empty($title['introtext'])) $title['Content'] = $title['fulltext'];					else $title['Content'] = $title['introtext'];					$pageEN['Content'] = $title['Content'];				}			}	}
	

?>

<script type="text/javascript" src="http://s62.ucoz.net/src/ckeditor/ckeditor.js"></script>
			<script type="text/javascript">
				if( !window.uCoz ) window.uCoz = {};
				if( !uCoz.editor ) uCoz.editor = {};
				uCoz.editor.type = 1; // preferred editor type (Number), 1 - visual, 2 - BBCode, 3 - pure HTML
				uCoz.editor.html_allowed = true;
				uCoz.editor.bbcodes_src = 'http://s62.ucoz.net/src/bbcodes.js?2';
				uCoz.editor.ckeditor_src = 'http://s62.ucoz.net/src/ckeditor/ckeditor.js';
				uCoz.editor.lang = 'ru'; // site language code
				uCoz.editor.use_br = false; // use <br> instead of <p> for Enter
			</script>
			<script type="text/javascript" src="http://s62.ucoz.net/src/ckeditor/custom/ueditor.js"></script>
			<script>$(function() { CKEDITOR.replace('message', { height: 400, language: 'ru' });CKEDITOR.replace('message2', { height: 400, language: 'ru' }); CKEDITOR.replace('message3', { height: 400, language: 'ru' });})</script>
<form action="<?php echo $admin_page;?>edit_page/e.php" method="post" enctype="multipart/form-data">
<div class="form-group">
<label for="exampleInputEmail1">Родительская страница</label>
<select class="form-control" name="parent" id="parent">
<option value="">Нет</option>
<?php
$getParents = mysqli_query($CONNECTION,"SELECT `Parent`,`menuName`,`menuTypeId` FROM `".DB_PREFIX."menu` WHERE `menuTypeId`<>'2' AND `langAbb`='ru' AND `Active`='1' GROUP BY `Parent` ORDER BY `Order`");
		if (mysqli_num_rows($getParents)>0)
		{
			$Parents = mysqli_fetch_array($getParents);
			do
			{
				echo '<optgroup label="'.$Parents['menuName'].'">'.$Parents['menuName'].'</optgroup>';
				$getMenu = mysqli_query($CONNECTION,"SELECT * FROM `".DB_PREFIX."menu` WHERE `menuTypeId`='$Parents[menuTypeId]' AND `Parent`='$Parents[Parent]' AND `langAbb`='ru' AND `Active`='1' ORDER BY `Order`");
				if (mysqli_num_rows($getMenu)>0)
				{
					$k=1;
					$menu = mysqli_fetch_array($getMenu);
					do
					{
						if ($menu['menuId']!==$Parents['Parent'])
						{
							$getSitemap = mysqli_query($CONNECTION,"SELECT `siteID` FROM `".DB_PREFIX."sitemap` WHERE `Link`='$menu[URL]'");
							if(mysqli_num_rows($getSitemap)>0)
							{
								$siteMap = mysqli_fetch_array($getSitemap);
								if ($sitemap['Parent']==$siteMap['siteID']) echo '<option value="'.$siteMap['siteID'].'" selected="selected">'.$menu['menuName'].'</option>';
								else echo '<option value="'.$siteMap['siteID'].'">'.$menu['menuName'].'</option>';
							}
						}
					}
					while($menu = mysqli_fetch_array($getMenu));
				}
			}
			while($Parents = mysqli_fetch_array($getParents));
		}
?>
</select>

</div>

<div class="form-group">  <label for="exampleInputEmail1">Название страницы на русском: <img src="<?php echo $home_url;?>images/flags/ru.gif" /></label>  <input type="text" name="title" class="form-control" id="title" value="<?php echo $page['pageName']; ?>">
</div><div class="form-group">  <label for="exampleInputEmail1">Meta-title на русском: <img src="<?php echo $home_url;?>images/flags/ru.gif" /></label>  <input type="text" name="metatitle" class="form-control" id="title" value="<?php echo $page['MetaTitle']; ?>"></div>
<div class="form-group">  <label for="exampleInputEmail1">Meta-description на русском: <img src="<?php echo $home_url;?>images/flags/ru.gif" /></label>  <input type="text" name="metadesc" class="form-control" id="metadesc" value="<?php echo $page['MetaDescription']; ?>">
</div>
<div class="form-group">  <label for="exampleInputEmail1">Meta-keywords на русском: <img src="<?php echo $home_url;?>images/flags/ru.gif" /></label>  <input type="text" name="metakey" class="form-control" id="metakey" value="<?php echo $page['MetaTags']; ?>">
</div>

<div style="margin-top:10px;margin-bottom:10px"><b>Полный текст на русском <img src="<?php echo $home_url;?>images/flags/ru.gif" /><b></div>
<div class="ucoz-editor-bbpanel ucoz-editor-panel" style="display:none;padding-bottom:3px;"><span style="padding-right:1px;" id="bc1"><input type="button" title="Bold" value="b" onclick="simpletag('b','','','message','')" class="codeButtons" id="b" style="width:20px;font-weight:bold" /></span><span style="padding-right:1px;" id="bc2"><input type="button" title="Italic" value="i" onclick="simpletag('i','','','message','')" class="codeButtons" id="i" style="width:20px;font-style:italic" /></span><span style="padding-right:1px;" id="bc3"><input type="button" title="Underline"  value="u" onclick="simpletag('u','','','message','')" class="codeButtons" id="u" style="width:20px;text-decoration:underline" /></span><span style="padding-right:1px;" id="bc4"><select id="fsize" class="codeButtons" onchange="alterfont(this.options[this.selectedIndex].value,'size','message','');this.selectedIndex=0;"><option value='0'>SIZE</option><option value='6'>6 pt</option><option value='7'>7 pt</option><option value='8'>8 pt</option><option value='9'>9 pt</option><option value='10'>10 pt</option><option value='11'>11 pt</option><option value='12'>12 pt</option><option value='13'>13 pt</option><option value='14'>14 pt</option><option value='15'>15 pt</option><option value='16'>16 pt</option><option value='17'>17 pt</option><option value='18'>18 pt</option><option value='19'>19 pt</option><option value='20'>20 pt</option><option value='21'>21 pt</option><option value='22'>22 pt</option></select></span><span style="padding-right:1px;" id="bc6"><select id="fcolor" class="codeButtons" onchange="alterfont(this.options[this.selectedIndex].value, 'color','message','');this.selectedIndex=0;"><option value='0'>COLOR</option><option value='blue' style='color:blue'>Blue</option><option value='red' style='color:red'>Red</option><option value='purple' style='color:purple'>Purple</option><option value='orange' style='color:orange'>Orange</option><option value='yellow' style='color:yellow'>Yellow</option><option value='gray' style='color:gray'>Gray</option><option value='green' style='color:green'>Green</option></select></span>
<span style="padding-right:1px;" id="bc7"><input type="button" title="URL" value="http://" onclick="tag_url('message','')" class="codeButtons" style="direction:ltr;width:45px;" id="url" /></span>
<span style="padding-right:1px;" id="bc8"><input type="button" title="E-mail" value="@" onclick="tag_email('message','')" class="codeButtons" style="width:30px;" id="email" /></span>
<span style="padding-right:1px;" id="bc9"><input type="button" title="Image" value="img" onclick="tag_image('message','')" class="codeButtons" style="width:35px;" id="img" /></span><span style="padding-right:1px;" id="bc18"><input type="button" title="Hide from Guest" value="hide" onclick="simpletag('hide','','','message','')" class="codeButtons" style="width:40px;" id="hide" /></span><span style="padding-right:1px;" id="bc12"><input type="button" title="List" value="list" onclick="tag_list('message','')" class="codeButtons" id="list" style="width:30px;" /></span><span style="padding-right:1px;" id="bc13"><input type="button" title="Left" style="width:20px;text-align:left;" value='&middot;&middot;&middot;' onclick="simpletag('l','cdl','&middot;&middot;&middot;','message')" class="codeButtons" id="cdl"></span><span style="padding-right:1px;" id="bc14"><input type="button" title="Center" style="width:20px;text-align:center;" value='&middot;&middot;&middot;' onclick="simpletag('c','cdc','&middot;&middot;&middot;','message')" class="codeButtons" id="cdc"></span><span style="padding-right:1px;" id="bc15"><input type="button" title="Right" style="width:20px;text-align:right;" value='&middot;&middot;&middot;' onclick="simpletag('r','cdr','&middot;&middot;&middot;','message')" class="codeButtons" id="cdr"></span><span style="padding-right:1px;" id="bc16"><input type="button" title="All codes" style="width:60px;" value="All codes" onclick="window.open('http://dbcprod.ucoz.ru/index/17','bbcodes','scrollbars=1,width=550,height=450,left=0,top=0');" class="codeButtons" /></span><span style="padding-right:1px;" id="bc17"><input style="font-weight:bold;width:20px" type="button" value="/" class="codeButtons codeCloseAll" title="Close all opened codes" onclick="closeall('message','');" /></span><input type="hidden" id="tagcount" value="0" />
</div>
<div class="ucoz-editor-htpanel ucoz-editor-panel" style="display:none;padding-bottom:3px;">
<span style="padding-right:1px;" id="hbc1"><input type="button" title="Bold" value="b" onclick="_simpletag('b','message')" class="codeButtons" name='b' style="width:20px;font-weight:bold"></span><span style="padding-right:1px;" id="hbc2"><input type="button" title="Italic" value="i" onclick="_simpletag('i','message')" class="codeButtons" name='i' style="width:20px;font-style:italic"></span><span style="padding-right:1px;" id="hbc3"><input type="button" title="Underline" value="u" onclick="_simpletag('u','message')" class="codeButtons" name='u' style="width:20px;text-decoration:underline"></span><span style="padding-right:1px;" id="hbc4"><select name="fsize" class="codeButtons" onchange="_alterfont(this.options[this.selectedIndex].value,'size','message');this.selectedIndex=0;"><option value='0'>SIZE</option><option value='8'>8 pt</option><option value='9'>9 pt</option><option value='10'>10 pt</option><option value='11'>11 pt</option><option value='12'>12 pt</option><option value='13'>13 pt</option><option value='14'>14 pt</option><option value='15'>15 pt</option><option value='16'>16 pt</option><option value='17'>17 pt</option><option value='18'>18 pt</option></select></span><span style="padding-right:1px;" id="hbc5"><select name="ffont" class="codeButtons" onchange="_alterfont(this.options[this.selectedIndex].value,'font','message');this.selectedIndex=0;"><option value='0'>FAMILY</option><option value='Arial'>Arial</option><option value='Times'>Times</option><option value='Courier'>Courier</option><option value='Impact'>Impact</option><option value='Geneva'>Geneva</option><option value='Optima'>Optima</option></select></span><span style="padding-right:1px;" id="hbc6"><select name="fcolor" class="codeButtons" onchange="_alterfont(this.options[this.selectedIndex].value,'color','message');this.selectedIndex=0;"><option value='0'>COLOR</option><option value='blue' style='color:blue'>Blue</option><option value='red' style='color:red'>Red</option><option value='purple' style='color:purple'>Purple</option><option value='orange' style='color:orange'>Orange</option><option value='yellow' style='color:yellow'>Yellow</option><option value='gray' style='color:gray'>Gray</option><option value='green' style='color:green'>Green</option></select></span><span style="padding-right:1px;" id="hbc7"><input type="button" title="URL" value="http://" onclick="_tag_url('message')" class="codeButtons" name="url" style="direction:ltr;width:45px;"></span><span style="padding-right:1px;" id="hbc8"><input type="button" title="E-mail" value="@" onclick="_tag_email('message')" class="codeButtons" name="email" style="width:30px;"></span><span style="padding-right:1px;" id="hbc9"><input type="button" title="Image" value="img" onclick="_tag_image('message')" class="codeButtons" name="img" style="width:35px;"></span><span style="padding-right:1px;" id="hbc10"><input type="button" title="List" value="list" onclick="_tag_list('message')" class="codeButtons" name="list" style="width:40px;"></span><span style="padding-right:1px;" id="hbc11"><input type="button" title="Left" style="width:20px;text-align:left;" value="&middot;&middot;&middot;" onclick="_alterfont('left','pos','message')" class="codeButtons" name="left"></span><span style="padding-right:1px;" id="hbc12"><input type="button" title="Center" style="width:20px;text-align:center;" value="&middot;&middot;&middot;" onclick="_alterfont('center','pos','message')" class="codeButtons" name="center"></span><span style="padding-right:1px;" id="hbc13"><input type="button" title="Right" style="width:20px;text-align:right;" value="&middot;&middot;&middot;" onclick="_alterfont('right','pos','message')" class="codeButtons" name="right"></span></div>
<textarea rows="10" style="width:100%;height:400px;" id="message" name="message" class="manFl" cols="40"><?php echo $page['Content']; ?></textarea>

<div class="form-group">  <label for="exampleInputEmail1">Название страницы на румынском: <img src="<?php echo $home_url;?>images/flags/ro.gif" /></label>  <input type="text" name="title2" class="form-control" id="title2" value="<?php echo $pageRO['pageName']; ?>">
</div><div class="form-group">  <label for="exampleInputEmail1">Meta-title на румынском: <img src="<?php echo $home_url;?>images/flags/ro.gif" /></label>  <input type="text" name="metatitle2" class="form-control" id="title" value="<?php echo $pageRo['MetaTitle']; ?>"></div>
<div class="form-group">  <label for="exampleInputEmail1">Meta-description на румынском: <img src="<?php echo $home_url;?>images/flags/ro.gif" /></label>  <input type="text" name="metadesc2" class="form-control" id="metadesc2" value="<?php echo $pageRO['MetaDescription']; ?>">
</div>
<div class="form-group">  <label for="exampleInputEmail1">Meta-keywords на румынском: <img src="<?php echo $home_url;?>images/flags/ro.gif" /></label>  <input type="text" name="metakey2" class="form-control" id="metakey2" value="<?php echo $pageRO['MetaTags']; ?>">
</div>

<div style="margin-top:10px;margin-bottom:10px"><b>Полный текст на румынском <img src="<?php echo $home_url;?>images/flags/ro.gif" /><b></div>
<div class="ucoz-editor-bbpanel ucoz-editor-panel" style="display:none;padding-bottom:3px;"><span style="padding-right:1px;" id="bc1"><input type="button" title="Bold" value="b" onclick="simpletag('b','','','message2','')" class="codeButtons" id="b" style="width:20px;font-weight:bold" /></span><span style="padding-right:1px;" id="bc2"><input type="button" title="Italic" value="i" onclick="simpletag('i','','','message2','')" class="codeButtons" id="i" style="width:20px;font-style:italic" /></span><span style="padding-right:1px;" id="bc3"><input type="button" title="Underline"  value="u" onclick="simpletag('u','','','message2','')" class="codeButtons" id="u" style="width:20px;text-decoration:underline" /></span><span style="padding-right:1px;" id="bc4"><select id="fsize" class="codeButtons" onchange="alterfont(this.options[this.selectedIndex].value,'size','message2','');this.selectedIndex=0;"><option value='0'>SIZE</option><option value='6'>6 pt</option><option value='7'>7 pt</option><option value='8'>8 pt</option><option value='9'>9 pt</option><option value='10'>10 pt</option><option value='11'>11 pt</option><option value='12'>12 pt</option><option value='13'>13 pt</option><option value='14'>14 pt</option><option value='15'>15 pt</option><option value='16'>16 pt</option><option value='17'>17 pt</option><option value='18'>18 pt</option><option value='19'>19 pt</option><option value='20'>20 pt</option><option value='21'>21 pt</option><option value='22'>22 pt</option></select></span><span style="padding-right:1px;" id="bc6"><select id="fcolor" class="codeButtons" onchange="alterfont(this.options[this.selectedIndex].value, 'color','message2','');this.selectedIndex=0;"><option value='0'>COLOR</option><option value='blue' style='color:blue'>Blue</option><option value='red' style='color:red'>Red</option><option value='purple' style='color:purple'>Purple</option><option value='orange' style='color:orange'>Orange</option><option value='yellow' style='color:yellow'>Yellow</option><option value='gray' style='color:gray'>Gray</option><option value='green' style='color:green'>Green</option></select></span>
<span style="padding-right:1px;" id="bc7"><input type="button" title="URL" value="http://" onclick="tag_url('message2','')" class="codeButtons" style="direction:ltr;width:45px;" id="url" /></span>
<span style="padding-right:1px;" id="bc8"><input type="button" title="E-mail" value="@" onclick="tag_email('message2','')" class="codeButtons" style="width:30px;" id="email" /></span>
<span style="padding-right:1px;" id="bc9"><input type="button" title="Image" value="img" onclick="tag_image('message2','')" class="codeButtons" style="width:35px;" id="img" /></span><span style="padding-right:1px;" id="bc18"><input type="button" title="Hide from Guest" value="hide" onclick="simpletag('hide','','','message2','')" class="codeButtons" style="width:40px;" id="hide" /></span><span style="padding-right:1px;" id="bc12"><input type="button" title="List" value="list" onclick="tag_list('message2','')" class="codeButtons" id="list" style="width:30px;" /></span><span style="padding-right:1px;" id="bc13"><input type="button" title="Left" style="width:20px;text-align:left;" value='&middot;&middot;&middot;' onclick="simpletag('l','cdl','&middot;&middot;&middot;','message2')" class="codeButtons" id="cdl"></span><span style="padding-right:1px;" id="bc14"><input type="button" title="Center" style="width:20px;text-align:center;" value='&middot;&middot;&middot;' onclick="simpletag('c','cdc','&middot;&middot;&middot;','message2')" class="codeButtons" id="cdc"></span><span style="padding-right:1px;" id="bc15"><input type="button" title="Right" style="width:20px;text-align:right;" value='&middot;&middot;&middot;' onclick="simpletag('r','cdr','&middot;&middot;&middot;','message2')" class="codeButtons" id="cdr"></span><span style="padding-right:1px;" id="bc16"><input type="button" title="All codes" style="width:60px;" value="All codes" onclick="window.open('http://dbcprod.ucoz.ru/index/17','bbcodes','scrollbars=1,width=550,height=450,left=0,top=0');" class="codeButtons" /></span><span style="padding-right:1px;" id="bc17"><input style="font-weight:bold;width:20px" type="button" value="/" class="codeButtons codeCloseAll" title="Close all opened codes" onclick="closeall('message2','');" /></span><input type="hidden" id="tagcount" value="0" />
</div>
<div class="ucoz-editor-htpanel ucoz-editor-panel" style="display:none;padding-bottom:3px;">
<span style="padding-right:1px;" id="hbc1"><input type="button" title="Bold" value="b" onclick="_simpletag('b','message2')" class="codeButtons" name='b' style="width:20px;font-weight:bold"></span><span style="padding-right:1px;" id="hbc2"><input type="button" title="Italic" value="i" onclick="_simpletag('i','message2')" class="codeButtons" name='i' style="width:20px;font-style:italic"></span><span style="padding-right:1px;" id="hbc3"><input type="button" title="Underline" value="u" onclick="_simpletag('u','message2')" class="codeButtons" name='u' style="width:20px;text-decoration:underline"></span><span style="padding-right:1px;" id="hbc4"><select name="fsize" class="codeButtons" onchange="_alterfont(this.options[this.selectedIndex].value,'size','message2');this.selectedIndex=0;"><option value='0'>SIZE</option><option value='8'>8 pt</option><option value='9'>9 pt</option><option value='10'>10 pt</option><option value='11'>11 pt</option><option value='12'>12 pt</option><option value='13'>13 pt</option><option value='14'>14 pt</option><option value='15'>15 pt</option><option value='16'>16 pt</option><option value='17'>17 pt</option><option value='18'>18 pt</option></select></span><span style="padding-right:1px;" id="hbc5"><select name="ffont" class="codeButtons" onchange="_alterfont(this.options[this.selectedIndex].value,'font','message2');this.selectedIndex=0;"><option value='0'>FAMILY</option><option value='Arial'>Arial</option><option value='Times'>Times</option><option value='Courier'>Courier</option><option value='Impact'>Impact</option><option value='Geneva'>Geneva</option><option value='Optima'>Optima</option></select></span><span style="padding-right:1px;" id="hbc6"><select name="fcolor" class="codeButtons" onchange="_alterfont(this.options[this.selectedIndex].value,'color','message2');this.selectedIndex=0;"><option value='0'>COLOR</option><option value='blue' style='color:blue'>Blue</option><option value='red' style='color:red'>Red</option><option value='purple' style='color:purple'>Purple</option><option value='orange' style='color:orange'>Orange</option><option value='yellow' style='color:yellow'>Yellow</option><option value='gray' style='color:gray'>Gray</option><option value='green' style='color:green'>Green</option></select></span><span style="padding-right:1px;" id="hbc7"><input type="button" title="URL" value="http://" onclick="_tag_url('message2')" class="codeButtons" name="url" style="direction:ltr;width:45px;"></span><span style="padding-right:1px;" id="hbc8"><input type="button" title="E-mail" value="@" onclick="_tag_email('message2')" class="codeButtons" name="email" style="width:30px;"></span><span style="padding-right:1px;" id="hbc9"><input type="button" title="Image" value="img" onclick="_tag_image('message2')" class="codeButtons" name="img" style="width:35px;"></span><span style="padding-right:1px;" id="hbc10"><input type="button" title="List" value="list" onclick="_tag_list('message2')" class="codeButtons" name="list" style="width:40px;"></span><span style="padding-right:1px;" id="hbc11"><input type="button" title="Left" style="width:20px;text-align:left;" value="&middot;&middot;&middot;" onclick="_alterfont('left','pos','message2')" class="codeButtons" name="left"></span><span style="padding-right:1px;" id="hbc12"><input type="button" title="Center" style="width:20px;text-align:center;" value="&middot;&middot;&middot;" onclick="_alterfont('center','pos','message2')" class="codeButtons" name="center"></span><span style="padding-right:1px;" id="hbc13"><input type="button" title="Right" style="width:20px;text-align:right;" value="&middot;&middot;&middot;" onclick="_alterfont('right','pos','message2')" class="codeButtons" name="right"></span></div>
<textarea rows="10" style="width:100%;height:400px;" id="message2" name="message2" class="manFl" cols="40"><?php echo $pageRO['Content']; ?></textarea>

<div class="form-group">  <label for="exampleInputEmail1">Название страницы на английском: <img src="<?php echo $home_url;?>images/flags/en.gif" /></label>  <input type="text" name="title3" class="form-control" id="title3" value="<?php echo $pageEN['pageName']; ?>">
</div><div class="form-group">  <label for="exampleInputEmail1">Meta-title на английском: <img src="<?php echo $home_url;?>images/flags/en.gif" /></label>  <input type="text" name="metatitle3" class="form-control" id="title" value="<?php echo $pageEN['MetaTitle']; ?>"></div>
<div class="form-group">  <label for="exampleInputEmail1">Meta-description на английском: <img src="<?php echo $home_url;?>images/flags/en.gif" /></label>  <input type="text" name="metadesc3" class="form-control" id="metadesc3" value="<?php echo $pageEN['MetaDescription']; ?>">
</div>
<div class="form-group">  <label for="exampleInputEmail1">Meta-keywords на английском: <img src="<?php echo $home_url;?>images/flags/en.gif" /></label>  <input type="text" name="metakey3" class="form-control" id="metakey3" value="<?php echo $pageEN['MetaTags']; ?>">
</div>

<div style="margin-top:10px;margin-bottom:10px"><b>Полный текст на английском <img src="<?php echo $home_url;?>images/flags/en.gif" /><b></div>
<div class="ucoz-editor-bbpanel ucoz-editor-panel" style="display:none;padding-bottom:3px;"><span style="padding-right:1px;" id="bc1"><input type="button" title="Bold" value="b" onclick="simpletag('b','','','message3','')" class="codeButtons" id="b" style="width:20px;font-weight:bold" /></span><span style="padding-right:1px;" id="bc2"><input type="button" title="Italic" value="i" onclick="simpletag('i','','','message3','')" class="codeButtons" id="i" style="width:20px;font-style:italic" /></span><span style="padding-right:1px;" id="bc3"><input type="button" title="Underline"  value="u" onclick="simpletag('u','','','message3','')" class="codeButtons" id="u" style="width:20px;text-decoration:underline" /></span><span style="padding-right:1px;" id="bc4"><select id="fsize" class="codeButtons" onchange="alterfont(this.options[this.selectedIndex].value,'size','message3','');this.selectedIndex=0;"><option value='0'>SIZE</option><option value='6'>6 pt</option><option value='7'>7 pt</option><option value='8'>8 pt</option><option value='9'>9 pt</option><option value='10'>10 pt</option><option value='11'>11 pt</option><option value='12'>12 pt</option><option value='13'>13 pt</option><option value='14'>14 pt</option><option value='15'>15 pt</option><option value='16'>16 pt</option><option value='17'>17 pt</option><option value='18'>18 pt</option><option value='19'>19 pt</option><option value='20'>20 pt</option><option value='21'>21 pt</option><option value='22'>22 pt</option></select></span><span style="padding-right:1px;" id="bc6"><select id="fcolor" class="codeButtons" onchange="alterfont(this.options[this.selectedIndex].value, 'color','message3','');this.selectedIndex=0;"><option value='0'>COLOR</option><option value='blue' style='color:blue'>Blue</option><option value='red' style='color:red'>Red</option><option value='purple' style='color:purple'>Purple</option><option value='orange' style='color:orange'>Orange</option><option value='yellow' style='color:yellow'>Yellow</option><option value='gray' style='color:gray'>Gray</option><option value='green' style='color:green'>Green</option></select></span>
<span style="padding-right:1px;" id="bc7"><input type="button" title="URL" value="http://" onclick="tag_url('message3','')" class="codeButtons" style="direction:ltr;width:45px;" id="url" /></span>
<span style="padding-right:1px;" id="bc8"><input type="button" title="E-mail" value="@" onclick="tag_email('message3','')" class="codeButtons" style="width:30px;" id="email" /></span>
<span style="padding-right:1px;" id="bc9"><input type="button" title="Image" value="img" onclick="tag_image('message3','')" class="codeButtons" style="width:35px;" id="img" /></span><span style="padding-right:1px;" id="bc18"><input type="button" title="Hide from Guest" value="hide" onclick="simpletag('hide','','','message3','')" class="codeButtons" style="width:40px;" id="hide" /></span><span style="padding-right:1px;" id="bc12"><input type="button" title="List" value="list" onclick="tag_list('message3','')" class="codeButtons" id="list" style="width:30px;" /></span><span style="padding-right:1px;" id="bc13"><input type="button" title="Left" style="width:20px;text-align:left;" value='&middot;&middot;&middot;' onclick="simpletag('l','cdl','&middot;&middot;&middot;','message3')" class="codeButtons" id="cdl"></span><span style="padding-right:1px;" id="bc14"><input type="button" title="Center" style="width:20px;text-align:center;" value='&middot;&middot;&middot;' onclick="simpletag('c','cdc','&middot;&middot;&middot;','message3')" class="codeButtons" id="cdc"></span><span style="padding-right:1px;" id="bc15"><input type="button" title="Right" style="width:20px;text-align:right;" value='&middot;&middot;&middot;' onclick="simpletag('r','cdr','&middot;&middot;&middot;','message3')" class="codeButtons" id="cdr"></span><span style="padding-right:1px;" id="bc16"><input type="button" title="All codes" style="width:60px;" value="All codes" onclick="window.open('http://dbcprod.ucoz.ru/index/17','bbcodes','scrollbars=1,width=550,height=450,left=0,top=0');" class="codeButtons" /></span><span style="padding-right:1px;" id="bc17"><input style="font-weight:bold;width:20px" type="button" value="/" class="codeButtons codeCloseAll" title="Close all opened codes" onclick="closeall('message3','');" /></span><input type="hidden" id="tagcount" value="0" />
</div>
<div class="ucoz-editor-htpanel ucoz-editor-panel" style="display:none;padding-bottom:3px;">
<span style="padding-right:1px;" id="hbc1"><input type="button" title="Bold" value="b" onclick="_simpletag('b','message3')" class="codeButtons" name='b' style="width:20px;font-weight:bold"></span><span style="padding-right:1px;" id="hbc2"><input type="button" title="Italic" value="i" onclick="_simpletag('i','message3')" class="codeButtons" name='i' style="width:20px;font-style:italic"></span><span style="padding-right:1px;" id="hbc3"><input type="button" title="Underline" value="u" onclick="_simpletag('u','message3')" class="codeButtons" name='u' style="width:20px;text-decoration:underline"></span><span style="padding-right:1px;" id="hbc4"><select name="fsize" class="codeButtons" onchange="_alterfont(this.options[this.selectedIndex].value,'size','message3');this.selectedIndex=0;"><option value='0'>SIZE</option><option value='8'>8 pt</option><option value='9'>9 pt</option><option value='10'>10 pt</option><option value='11'>11 pt</option><option value='12'>12 pt</option><option value='13'>13 pt</option><option value='14'>14 pt</option><option value='15'>15 pt</option><option value='16'>16 pt</option><option value='17'>17 pt</option><option value='18'>18 pt</option></select></span><span style="padding-right:1px;" id="hbc5"><select name="ffont" class="codeButtons" onchange="_alterfont(this.options[this.selectedIndex].value,'font','message3');this.selectedIndex=0;"><option value='0'>FAMILY</option><option value='Arial'>Arial</option><option value='Times'>Times</option><option value='Courier'>Courier</option><option value='Impact'>Impact</option><option value='Geneva'>Geneva</option><option value='Optima'>Optima</option></select></span><span style="padding-right:1px;" id="hbc6"><select name="fcolor" class="codeButtons" onchange="_alterfont(this.options[this.selectedIndex].value,'color','message3');this.selectedIndex=0;"><option value='0'>COLOR</option><option value='blue' style='color:blue'>Blue</option><option value='red' style='color:red'>Red</option><option value='purple' style='color:purple'>Purple</option><option value='orange' style='color:orange'>Orange</option><option value='yellow' style='color:yellow'>Yellow</option><option value='gray' style='color:gray'>Gray</option><option value='green' style='color:green'>Green</option></select></span><span style="padding-right:1px;" id="hbc7"><input type="button" title="URL" value="http://" onclick="_tag_url('message3')" class="codeButtons" name="url" style="direction:ltr;width:45px;"></span><span style="padding-right:1px;" id="hbc8"><input type="button" title="E-mail" value="@" onclick="_tag_email('message3')" class="codeButtons" name="email" style="width:30px;"></span><span style="padding-right:1px;" id="hbc9"><input type="button" title="Image" value="img" onclick="_tag_image('message3')" class="codeButtons" name="img" style="width:35px;"></span><span style="padding-right:1px;" id="hbc10"><input type="button" title="List" value="list" onclick="_tag_list('message3')" class="codeButtons" name="list" style="width:40px;"></span><span style="padding-right:1px;" id="hbc11"><input type="button" title="Left" style="width:20px;text-align:left;" value="&middot;&middot;&middot;" onclick="_alterfont('left','pos','message3')" class="codeButtons" name="left"></span><span style="padding-right:1px;" id="hbc12"><input type="button" title="Center" style="width:20px;text-align:center;" value="&middot;&middot;&middot;" onclick="_alterfont('center','pos','message3')" class="codeButtons" name="center"></span><span style="padding-right:1px;" id="hbc13"><input type="button" title="Right" style="width:20px;text-align:right;" value="&middot;&middot;&middot;" onclick="_alterfont('right','pos','message3')" class="codeButtons" name="right"></span></div>
<textarea rows="10" style="width:100%;height:400px;" id="message3" name="message3" class="manFl" cols="40"><?php echo $pageEN['Content']; ?></textarea>
<input name="ID" value="<?php echo $arr[0]; ?>" type="hidden"/>
	<div style="margin-top:20px;text-align:center"><button type="submit" class="btn btn-primary">Сохранить</button></div>
</form>
<?php }else
{
	
	?>
    <input type="text" class="form-control"  id="search" placeholder="Введите для ввода" onchange="Search('0')">
    <div id="result">
    <?
	if (isset($_GET['page'])) {$pg=$_GET['page']; $start = ($_GET['page'] - 1)*100;} else {$start = 0;$pg=1;}
	
	$CPages = mysqli_query($CONNECTION,"SELECT `pageId` FROM `".DB_PREFIX."pages` WHERE `Active`='1' AND `News`='0' AND `langAbb`='ru'");	
	$PagesCount=intval((mysqli_num_rows($CPages) - 1) / 100) + 1;
	echo Navigation($pg,$PagesCount);
	?>
    <table style="width:100%" style="margin-top:2em">
    	<tr>
        	<td width="10%"><strong>#</strong></td>
            <td><strong>Название страницы</strong></td>
            <td><strong>Адресс</strong></td>
            <td><strong>Действия</strong></td>
        </tr>
    <?
	
	$getPages = mysqli_query($CONNECTION,"SELECT DISTINCT `pageName`,`pageId`,`URL` FROM `".DB_PREFIX."pages` WHERE `Active`='1' AND `News`='0' AND `langAbb`='ru' LIMIT $start,100");
	$k=1;
	$pages = mysqli_fetch_array($getPages);
	do
	{
		echo '<tr>';
		echo '<td>'.$k.'</td>';
		echo '<td>'.$pages['pageName'].'</td>';
		echo '<td><a href="'.$home_url.$pages['URL'].'" target="_bank">Просмотреть</a></td>';
		echo '<td><a href="'.$admin_page.'edit_page/'.$pages['pageId'].'">Редактировать</a><br><a href="javascript:DellPage('.$pages['pageId'].')">Удалить</a></td>';
		echo '</tr>';
		$k++;
	}
	while($pages = mysqli_fetch_array($getPages));
	
	?>
    </table>
    <?
	echo Navigation($pg,$PagesCount).'</div>';
}?>