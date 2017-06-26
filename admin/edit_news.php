<h1>Редактирование новости</h1>

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

if (!empty($_POST))

{

	$text = htmlspecialchars($_POST['text'],ENT_QUOTES);

	$ID = htmlspecialchars($_POST['ID'],ENT_QUOTES);

	$title = htmlspecialchars($_POST['title'],ENT_QUOTES);

	$message = htmlspecialchars($_POST['message'],ENT_QUOTES);

	$metakey = htmlspecialchars($_POST['metakey'],ENT_QUOTES);

	$metadesc = htmlspecialchars($_POST['metadesc'],ENT_QUOTES);

	

	$metakey2 = htmlspecialchars($_POST['metakey2'],ENT_QUOTES);

	$metadesc2 = htmlspecialchars($_POST['metadesc2'],ENT_QUOTES);

	$text2 = htmlspecialchars($_POST['text2'],ENT_QUOTES);

	$title2 = htmlspecialchars($_POST['title2'],ENT_QUOTES);

	$message2 = htmlspecialchars($_POST['message2'],ENT_QUOTES);

	

	$metakey3 = htmlspecialchars($_POST['metakey3'],ENT_QUOTES);

	$metadesc3 = htmlspecialchars($_POST['metadesc3'],ENT_QUOTES);

	$text3 = htmlspecialchars($_POST['text3'],ENT_QUOTES);

	$title3 = htmlspecialchars($_POST['title3'],ENT_QUOTES);

	$message3 = htmlspecialchars($_POST['message3'],ENT_QUOTES);

	

	if (!empty($title)&&!empty($message))

	{

		if(empty($metakey)) $metakey = join(',',explode(' ',$title));

		if(empty($metadesc)) $metadesc = $title.' Сайт транспортно-экспедиторских услуг,поиск транспорта для перевозок,поиск грузов для международных перевозок, международные грузоперевозки из и в молдову ,биржа транспорта и грузов,доставка грузов: Европа Россия, Молдова, перевозки из Турции и Румынии, грузоперевозки из и в Приднестровье,автоперевозки ,морские перевозки, перевозки контейнеров по морю.';

		

		$getURL = mysqli_query($CONNECTION,"SELECT `URL` FROM `".DB_PREFIX."pages` WHERE `pageId`='$ID'");

		$URL = mysqli_fetch_array($getURL);

		$insertRU = mysqli_query($CONNECTION,"UPDATE `".DB_PREFIX."pages` SET  `pageName`='$title',`Content`='$message',`shortText`='$text',`MetaDescription`='$metadesc',`MetaTags`='$metakey' WHERE `pageId`='$ID'");

		if (!$insertRU) echo mysqli_error($CONNECTION);

		$insertMAP = mysqli_query($CONNECTION,"UPDATE `".DB_PREFIX."sitemap` SET `Title`='$title' WHERE `Link`='".$URL['URL']."'");

		if (!$insertMAP) echo mysqli_error($CONNECTION);	else echo '<A href="'.$home_url.$URL['URL'].'">Измененно</a>';

		

		

	} else echo 'Заполните все поля на русском';

	if (!empty($title2)&&!empty($message2)&&$insertRU)

	{

		if(empty($metakey2)) $metakey2 = join(',',explode(' ',$title2));

		if(empty($metadesc2)) $metadesc2 = $title2.' Сайт транспортно-экспедиторских услуг,поиск транспорта для перевозок,поиск грузов для международных перевозок, международные грузоперевозки из и в молдову ,биржа транспорта и грузов,доставка грузов: Европа Россия, Молдова, перевозки из Турции и Румынии, грузоперевозки из и в Приднестровье,автоперевозки ,морские перевозки, перевозки контейнеров по морю.';

		$URLn = 'ro/'.substr($URL['URL'],3);

		$getURL = mysqli_query($CONNECTION,"SELECT `pageId` FROM `".DB_PREFIX."pages` WHERE `URL`='$URLn'");

		if (mysqli_num_rows($getURL)==0){

			$insertRO = mysqli_query($CONNECTION,"INSERT INTO `".DB_PREFIX."pages` (`pageName`,`URL`,`Content`,`Active`,`langAbb`,`News`,`shortText`,`MetaDescription`,`MetaTags`) VALUES ('$title2', '$URLn', '$message2','1','ro','1','$text2','$metadesc2','$metakey2')");

		}

		else{

				$URL = mysqli_fetch_array($getURL);

				$insertRO = mysqli_query($CONNECTION,"UPDATE `".DB_PREFIX."pages` SET `pageName`='$title2',`Content`='$message2',`shortText`='$text2', `MetaDescription`='$metadesc2',`MetaTags`='$metakey2' WHERE `pageId`='".$URL['pageId']."'");

			}

		if (!$insertRO) echo mysqli_error($CONNECTION);

	}

	if (!empty($title3)&&!empty($message3)&&$insertRU)

	{

		if(empty($metakey3)) $metakey3 = join(',',explode(' ',$title3));

		if(empty($metadesc3)) $metadesc3 = $title3.' Сайт транспортно-экспедиторских услуг,поиск транспорта для перевозок,поиск грузов для международных перевозок, международные грузоперевозки из и в молдову ,биржа транспорта и грузов,доставка грузов: Европа Россия, Молдова, перевозки из Турции и Румынии, грузоперевозки из и в Приднестровье,автоперевозки ,морские перевозки, перевозки контейнеров по морю.';

		$URLn = 'en/'.substr($URL['URL'],3);

		$getURLEN = mysqli_query($CONNECTION,"SELECT `pageId` FROM `".DB_PREFIX."pages` WHERE `URL`='$URLn'");

		if (mysqli_num_rows($getURLEN)==0){

			$insertRO = mysqli_query($CONNECTION,"INSERT INTO `".DB_PREFIX."pages` (`pageName`,`URL`,`Content`,`Active`,`langAbb`,`News`,`shortText`,`MetaDescription`,`MetaTags`) VALUES ('$title3', '$URLn', '$message3','1','en','1','$text3','$metadesc3','$metakey3')");

		}

		else{

				$URLEN = mysqli_fetch_array($getURLEN);

				$insertRO = mysqli_query($CONNECTION,"UPDATE `".DB_PREFIX."pages` SET  `pageName`='$title3',`Content`='$message3',`shortText`='$text3', `MetaDescription`='$metadesc3',`MetaTags`='$metakey3' WHERE `pageId`='".$URLEN['pageId']."'");

			}

		if (!$insertRO) echo mysqli_error($CONNECTION);

	}

	

}

elseif(is_numeric($arr[1]))

{

	

	$getPage = mysqli_query($CONNECTION,"SELECT *  FROM `buianov_pages` WHERE `pageId`='".$arr[1]."'");

	if (mysqli_num_rows($getPage)==0) exit("Not found");

	$page = mysqli_fetch_array($getPage);

	$getParent = mysqli_query($CONNECTION,"SELECT `Parent`  FROM `buianov_sitemap` WHERE `Link`='".$page['URL']."'");

	$sitemap = mysqli_fetch_array($getParent);

	$getPageRO = mysqli_query($CONNECTION,"SELECT *  FROM `buianov_pages` WHERE `URL`='ro".substr($page['URL'],2)."'");

	if (mysqli_num_rows($getPageRO)>0) $pageRO = mysqli_fetch_array($getPageRO);

	

	$getPageEN = mysqli_query($CONNECTION,"SELECT *  FROM `buianov_pages` WHERE `URL`='en".substr($page['URL'],2)."'");

	if (mysqli_num_rows($getPageEN)>0) $pageEN = mysqli_fetch_array($getPageEN);





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

			<script>$(function() { CKEDITOR.replace('text', { height: 400, language: 'ru' });CKEDITOR.replace('text2', { height: 400, language: 'ru' });CKEDITOR.replace('text3', { height: 400, language: 'ru' });CKEDITOR.replace('message', { height: 400, language: 'ru' });CKEDITOR.replace('message2', { height: 400, language: 'ru' }); CKEDITOR.replace('message3', { height: 400, language: 'ru' });})</script>

<form action="<?php echo $admin_page;?>edit_news" method="post" enctype="multipart/form-data">



<div class="form-group">  <label for="exampleInputEmail1">Название страницы на русском: <img src="<?php echo $home_url;?>images/flags/ru.gif" /></label>  <input type="text" name="title" class="form-control" id="title" value="<?php echo $page['pageName']; ?>">

</div>

<div class="form-group">  <label for="exampleInputEmail1">Meta-description на русском: <img src="<?php echo $home_url;?>images/flags/ru.gif" /></label>  <input type="text" name="metadesc" class="form-control" id="metadesc" value="<?php echo $page['MetaDescription']; ?>">

</div>

<div class="form-group">  <label for="exampleInputEmail1">Meta-keywords на русском: <img src="<?php echo $home_url;?>images/flags/ru.gif" /></label>  <input type="text" name="metakey" class="form-control" id="metakey" value="<?php echo $page['MetaTags']; ?>">

</div>



<div style="margin-top:10px;margin-bottom:10px"><b>Краткое описание на русском <img src="<?php echo $home_url;?>images/flags/ru.gif" /><b></div>

<div class="ucoz-editor-bbpanel ucoz-editor-panel" style="display:none;padding-bottom:3px;"><span style="padding-right:1px;" id="bc1"><input type="button" title="Bold" value="b" onclick="simpletag('b','','','text','')" class="codeButtons" id="b" style="width:20px;font-weight:bold" /></span><span style="padding-right:1px;" id="bc2"><input type="button" title="Italic" value="i" onclick="simpletag('i','','','text','')" class="codeButtons" id="i" style="width:20px;font-style:italic" /></span><span style="padding-right:1px;" id="bc3"><input type="button" title="Underline"  value="u" onclick="simpletag('u','','','text','')" class="codeButtons" id="u" style="width:20px;text-decoration:underline" /></span><span style="padding-right:1px;" id="bc4"><select id="fsize" class="codeButtons" onchange="alterfont(this.options[this.selectedIndex].value,'size','text','');this.selectedIndex=0;"><option value='0'>SIZE</option><option value='6'>6 pt</option><option value='7'>7 pt</option><option value='8'>8 pt</option><option value='9'>9 pt</option><option value='10'>10 pt</option><option value='11'>11 pt</option><option value='12'>12 pt</option><option value='13'>13 pt</option><option value='14'>14 pt</option><option value='15'>15 pt</option><option value='16'>16 pt</option><option value='17'>17 pt</option><option value='18'>18 pt</option><option value='19'>19 pt</option><option value='20'>20 pt</option><option value='21'>21 pt</option><option value='22'>22 pt</option></select></span><span style="padding-right:1px;" id="bc6"><select id="fcolor" class="codeButtons" onchange="alterfont(this.options[this.selectedIndex].value, 'color','text','');this.selectedIndex=0;"><option value='0'>COLOR</option><option value='blue' style='color:blue'>Blue</option><option value='red' style='color:red'>Red</option><option value='purple' style='color:purple'>Purple</option><option value='orange' style='color:orange'>Orange</option><option value='yellow' style='color:yellow'>Yellow</option><option value='gray' style='color:gray'>Gray</option><option value='green' style='color:green'>Green</option></select></span>

<span style="padding-right:1px;" id="bc7"><input type="button" title="URL" value="http://" onclick="tag_url('text','')" class="codeButtons" style="direction:ltr;width:45px;" id="url" /></span>

<span style="padding-right:1px;" id="bc8"><input type="button" title="E-mail" value="@" onclick="tag_email('text','')" class="codeButtons" style="width:30px;" id="email" /></span>

<span style="padding-right:1px;" id="bc9"><input type="button" title="Image" value="img" onclick="tag_image('text','')" class="codeButtons" style="width:35px;" id="img" /></span><span style="padding-right:1px;" id="bc18"><input type="button" title="Hide from Guest" value="hide" onclick="simpletag('hide','','','text','')" class="codeButtons" style="width:40px;" id="hide" /></span><span style="padding-right:1px;" id="bc12"><input type="button" title="List" value="list" onclick="tag_list('text','')" class="codeButtons" id="list" style="width:30px;" /></span><span style="padding-right:1px;" id="bc13"><input type="button" title="Left" style="width:20px;text-align:left;" value='&middot;&middot;&middot;' onclick="simpletag('l','cdl','&middot;&middot;&middot;','text')" class="codeButtons" id="cdl"></span><span style="padding-right:1px;" id="bc14"><input type="button" title="Center" style="width:20px;text-align:center;" value='&middot;&middot;&middot;' onclick="simpletag('c','cdc','&middot;&middot;&middot;','text')" class="codeButtons" id="cdc"></span><span style="padding-right:1px;" id="bc15"><input type="button" title="Right" style="width:20px;text-align:right;" value='&middot;&middot;&middot;' onclick="simpletag('r','cdr','&middot;&middot;&middot;','text')" class="codeButtons" id="cdr"></span><span style="padding-right:1px;" id="bc16"><input type="button" title="All codes" style="width:60px;" value="All codes" onclick="window.open('http://dbcprod.ucoz.ru/index/17','bbcodes','scrollbars=1,width=550,height=450,left=0,top=0');" class="codeButtons" /></span><span style="padding-right:1px;" id="bc17"><input style="font-weight:bold;width:20px" type="button" value="/" class="codeButtons codeCloseAll" title="Close all opened codes" onclick="closeall('text','');" /></span><input type="hidden" id="tagcount" value="0" />

</div>

<div class="ucoz-editor-htpanel ucoz-editor-panel" style="display:none;padding-bottom:3px;">

<span style="padding-right:1px;" id="hbc1"><input type="button" title="Bold" value="b" onclick="_simpletag('b','text')" class="codeButtons" name='b' style="width:20px;font-weight:bold"></span><span style="padding-right:1px;" id="hbc2"><input type="button" title="Italic" value="i" onclick="_simpletag('i','text')" class="codeButtons" name='i' style="width:20px;font-style:italic"></span><span style="padding-right:1px;" id="hbc3"><input type="button" title="Underline" value="u" onclick="_simpletag('u','text')" class="codeButtons" name='u' style="width:20px;text-decoration:underline"></span><span style="padding-right:1px;" id="hbc4"><select name="fsize" class="codeButtons" onchange="_alterfont(this.options[this.selectedIndex].value,'size','text');this.selectedIndex=0;"><option value='0'>SIZE</option><option value='8'>8 pt</option><option value='9'>9 pt</option><option value='10'>10 pt</option><option value='11'>11 pt</option><option value='12'>12 pt</option><option value='13'>13 pt</option><option value='14'>14 pt</option><option value='15'>15 pt</option><option value='16'>16 pt</option><option value='17'>17 pt</option><option value='18'>18 pt</option></select></span><span style="padding-right:1px;" id="hbc5"><select name="ffont" class="codeButtons" onchange="_alterfont(this.options[this.selectedIndex].value,'font','text');this.selectedIndex=0;"><option value='0'>FAMILY</option><option value='Arial'>Arial</option><option value='Times'>Times</option><option value='Courier'>Courier</option><option value='Impact'>Impact</option><option value='Geneva'>Geneva</option><option value='Optima'>Optima</option></select></span><span style="padding-right:1px;" id="hbc6"><select name="fcolor" class="codeButtons" onchange="_alterfont(this.options[this.selectedIndex].value,'color','text');this.selectedIndex=0;"><option value='0'>COLOR</option><option value='blue' style='color:blue'>Blue</option><option value='red' style='color:red'>Red</option><option value='purple' style='color:purple'>Purple</option><option value='orange' style='color:orange'>Orange</option><option value='yellow' style='color:yellow'>Yellow</option><option value='gray' style='color:gray'>Gray</option><option value='green' style='color:green'>Green</option></select></span><span style="padding-right:1px;" id="hbc7"><input type="button" title="URL" value="http://" onclick="_tag_url('text')" class="codeButtons" name="url" style="direction:ltr;width:45px;"></span><span style="padding-right:1px;" id="hbc8"><input type="button" title="E-mail" value="@" onclick="_tag_email('text')" class="codeButtons" name="email" style="width:30px;"></span><span style="padding-right:1px;" id="hbc9"><input type="button" title="Image" value="img" onclick="_tag_image('text')" class="codeButtons" name="img" style="width:35px;"></span><span style="padding-right:1px;" id="hbc10"><input type="button" title="List" value="list" onclick="_tag_list('text')" class="codeButtons" name="list" style="width:40px;"></span><span style="padding-right:1px;" id="hbc11"><input type="button" title="Left" style="width:20px;text-align:left;" value="&middot;&middot;&middot;" onclick="_alterfont('left','pos','text')" class="codeButtons" name="left"></span><span style="padding-right:1px;" id="hbc12"><input type="button" title="Center" style="width:20px;text-align:center;" value="&middot;&middot;&middot;" onclick="_alterfont('center','pos','text')" class="codeButtons" name="center"></span><span style="padding-right:1px;" id="hbc13"><input type="button" title="Right" style="width:20px;text-align:right;" value="&middot;&middot;&middot;" onclick="_alterfont('right','pos','text')" class="codeButtons" name="right"></span></div>

<textarea rows="10" style="width:100%;height:400px;" id="text" name="text" class="manFl" cols="40"><?php echo $page['shortText']; ?></textarea>



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

</div>

<div class="form-group">  <label for="exampleInputEmail1">Meta-description на румынском: <img src="<?php echo $home_url;?>images/flags/ro.gif" /></label>  <input type="text" name="metadesc2" class="form-control" id="metadesc2" value="<?php echo $pageRO['MetaDescription']; ?>">

</div>

<div class="form-group">  <label for="exampleInputEmail1">Meta-keywords на румынском: <img src="<?php echo $home_url;?>images/flags/ro.gif" /></label>  <input type="text" name="metakey2" class="form-control" id="metakey2" value="<?php echo $pageRO['MetaTags']; ?>">

</div>





<div style="margin-top:10px;margin-bottom:10px"><b>Краткое описание на румынском <img src="<?php echo $home_url;?>images/flags/ro.gif" /><b></div>

<div class="ucoz-editor-bbpanel ucoz-editor-panel" style="display:none;padding-bottom:3px;"><span style="padding-right:1px;" id="bc1"><input type="button" title="Bold" value="b" onclick="simpletag('b','','','text2','')" class="codeButtons" id="b" style="width:20px;font-weight:bold" /></span><span style="padding-right:1px;" id="bc2"><input type="button" title="Italic" value="i" onclick="simpletag('i','','','text2','')" class="codeButtons" id="i" style="width:20px;font-style:italic" /></span><span style="padding-right:1px;" id="bc3"><input type="button" title="Underline"  value="u" onclick="simpletag('u','','','text2','')" class="codeButtons" id="u" style="width:20px;text-decoration:underline" /></span><span style="padding-right:1px;" id="bc4"><select id="fsize" class="codeButtons" onchange="alterfont(this.options[this.selectedIndex].value,'size','text2','');this.selectedIndex=0;"><option value='0'>SIZE</option><option value='6'>6 pt</option><option value='7'>7 pt</option><option value='8'>8 pt</option><option value='9'>9 pt</option><option value='10'>10 pt</option><option value='11'>11 pt</option><option value='12'>12 pt</option><option value='13'>13 pt</option><option value='14'>14 pt</option><option value='15'>15 pt</option><option value='16'>16 pt</option><option value='17'>17 pt</option><option value='18'>18 pt</option><option value='19'>19 pt</option><option value='20'>20 pt</option><option value='21'>21 pt</option><option value='22'>22 pt</option></select></span><span style="padding-right:1px;" id="bc6"><select id="fcolor" class="codeButtons" onchange="alterfont(this.options[this.selectedIndex].value, 'color','text2','');this.selectedIndex=0;"><option value='0'>COLOR</option><option value='blue' style='color:blue'>Blue</option><option value='red' style='color:red'>Red</option><option value='purple' style='color:purple'>Purple</option><option value='orange' style='color:orange'>Orange</option><option value='yellow' style='color:yellow'>Yellow</option><option value='gray' style='color:gray'>Gray</option><option value='green' style='color:green'>Green</option></select></span>

<span style="padding-right:1px;" id="bc7"><input type="button" title="URL" value="http://" onclick="tag_url('text2','')" class="codeButtons" style="direction:ltr;width:45px;" id="url" /></span>

<span style="padding-right:1px;" id="bc8"><input type="button" title="E-mail" value="@" onclick="tag_email('text2','')" class="codeButtons" style="width:30px;" id="email" /></span>

<span style="padding-right:1px;" id="bc9"><input type="button" title="Image" value="img" onclick="tag_image('text2','')" class="codeButtons" style="width:35px;" id="img" /></span><span style="padding-right:1px;" id="bc18"><input type="button" title="Hide from Guest" value="hide" onclick="simpletag('hide','','','text2','')" class="codeButtons" style="width:40px;" id="hide" /></span><span style="padding-right:1px;" id="bc12"><input type="button" title="List" value="list" onclick="tag_list('text2','')" class="codeButtons" id="list" style="width:30px;" /></span><span style="padding-right:1px;" id="bc13"><input type="button" title="Left" style="width:20px;text-align:left;" value='&middot;&middot;&middot;' onclick="simpletag('l','cdl','&middot;&middot;&middot;','text2')" class="codeButtons" id="cdl"></span><span style="padding-right:1px;" id="bc14"><input type="button" title="Center" style="width:20px;text-align:center;" value='&middot;&middot;&middot;' onclick="simpletag('c','cdc','&middot;&middot;&middot;','text2')" class="codeButtons" id="cdc"></span><span style="padding-right:1px;" id="bc15"><input type="button" title="Right" style="width:20px;text-align:right;" value='&middot;&middot;&middot;' onclick="simpletag('r','cdr','&middot;&middot;&middot;','text2')" class="codeButtons" id="cdr"></span><span style="padding-right:1px;" id="bc16"><input type="button" title="All codes" style="width:60px;" value="All codes" onclick="window.open('http://dbcprod.ucoz.ru/index/17','bbcodes','scrollbars=1,width=550,height=450,left=0,top=0');" class="codeButtons" /></span><span style="padding-right:1px;" id="bc17"><input style="font-weight:bold;width:20px" type="button" value="/" class="codeButtons codeCloseAll" title="Close all opened codes" onclick="closeall('text2','');" /></span><input type="hidden" id="tagcount" value="0" />

</div>

<div class="ucoz-editor-htpanel ucoz-editor-panel" style="display:none;padding-bottom:3px;">

<span style="padding-right:1px;" id="hbc1"><input type="button" title="Bold" value="b" onclick="_simpletag('b','text2')" class="codeButtons" name='b' style="width:20px;font-weight:bold"></span><span style="padding-right:1px;" id="hbc2"><input type="button" title="Italic" value="i" onclick="_simpletag('i','text2')" class="codeButtons" name='i' style="width:20px;font-style:italic"></span><span style="padding-right:1px;" id="hbc3"><input type="button" title="Underline" value="u" onclick="_simpletag('u','text2')" class="codeButtons" name='u' style="width:20px;text-decoration:underline"></span><span style="padding-right:1px;" id="hbc4"><select name="fsize" class="codeButtons" onchange="_alterfont(this.options[this.selectedIndex].value,'size','text2');this.selectedIndex=0;"><option value='0'>SIZE</option><option value='8'>8 pt</option><option value='9'>9 pt</option><option value='10'>10 pt</option><option value='11'>11 pt</option><option value='12'>12 pt</option><option value='13'>13 pt</option><option value='14'>14 pt</option><option value='15'>15 pt</option><option value='16'>16 pt</option><option value='17'>17 pt</option><option value='18'>18 pt</option></select></span><span style="padding-right:1px;" id="hbc5"><select name="ffont" class="codeButtons" onchange="_alterfont(this.options[this.selectedIndex].value,'font','text2');this.selectedIndex=0;"><option value='0'>FAMILY</option><option value='Arial'>Arial</option><option value='Times'>Times</option><option value='Courier'>Courier</option><option value='Impact'>Impact</option><option value='Geneva'>Geneva</option><option value='Optima'>Optima</option></select></span><span style="padding-right:1px;" id="hbc6"><select name="fcolor" class="codeButtons" onchange="_alterfont(this.options[this.selectedIndex].value,'color','text2');this.selectedIndex=0;"><option value='0'>COLOR</option><option value='blue' style='color:blue'>Blue</option><option value='red' style='color:red'>Red</option><option value='purple' style='color:purple'>Purple</option><option value='orange' style='color:orange'>Orange</option><option value='yellow' style='color:yellow'>Yellow</option><option value='gray' style='color:gray'>Gray</option><option value='green' style='color:green'>Green</option></select></span><span style="padding-right:1px;" id="hbc7"><input type="button" title="URL" value="http://" onclick="_tag_url('text2')" class="codeButtons" name="url" style="direction:ltr;width:45px;"></span><span style="padding-right:1px;" id="hbc8"><input type="button" title="E-mail" value="@" onclick="_tag_email('text2')" class="codeButtons" name="email" style="width:30px;"></span><span style="padding-right:1px;" id="hbc9"><input type="button" title="Image" value="img" onclick="_tag_image('text2')" class="codeButtons" name="img" style="width:35px;"></span><span style="padding-right:1px;" id="hbc10"><input type="button" title="List" value="list" onclick="_tag_list('text2')" class="codeButtons" name="list" style="width:40px;"></span><span style="padding-right:1px;" id="hbc11"><input type="button" title="Left" style="width:20px;text-align:left;" value="&middot;&middot;&middot;" onclick="_alterfont('left','pos','text2')" class="codeButtons" name="left"></span><span style="padding-right:1px;" id="hbc12"><input type="button" title="Center" style="width:20px;text-align:center;" value="&middot;&middot;&middot;" onclick="_alterfont('center','pos','text2')" class="codeButtons" name="center"></span><span style="padding-right:1px;" id="hbc13"><input type="button" title="Right" style="width:20px;text-align:right;" value="&middot;&middot;&middot;" onclick="_alterfont('right','pos','text2')" class="codeButtons" name="right"></span></div>

<textarea rows="10" style="width:100%;height:400px;" id="text2" name="text2" class="manFl" cols="40"><?php echo $pageRO['shortText']; ?></textarea>



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

</div>

<div class="form-group">  <label for="exampleInputEmail1">Meta-description на английском: <img src="<?php echo $home_url;?>images/flags/en.gif" /></label>  <input type="text" name="metadesc3" class="form-control" id="metadesc3" value="<?php echo $pageEN['MetaDescription']; ?>">

</div>

<div class="form-group">  <label for="exampleInputEmail1">Meta-keywords на английском: <img src="<?php echo $home_url;?>images/flags/en.gif" /></label>  <input type="text" name="metakey3" class="form-control" id="metakey3" value="<?php echo $pageEN['MetaTags']; ?>">

</div>



<div style="margin-top:10px;margin-bottom:10px"><b>Краткое описание на английском <img src="<?php echo $home_url;?>images/flags/en.gif" /><b></div>

<div class="ucoz-editor-bbpanel ucoz-editor-panel" style="display:none;padding-bottom:3px;"><span style="padding-right:1px;" id="bc1"><input type="button" title="Bold" value="b" onclick="simpletag('b','','','text3','')" class="codeButtons" id="b" style="width:20px;font-weight:bold" /></span><span style="padding-right:1px;" id="bc2"><input type="button" title="Italic" value="i" onclick="simpletag('i','','','text3','')" class="codeButtons" id="i" style="width:20px;font-style:italic" /></span><span style="padding-right:1px;" id="bc3"><input type="button" title="Underline"  value="u" onclick="simpletag('u','','','text3','')" class="codeButtons" id="u" style="width:20px;text-decoration:underline" /></span><span style="padding-right:1px;" id="bc4"><select id="fsize" class="codeButtons" onchange="alterfont(this.options[this.selectedIndex].value,'size','text3','');this.selectedIndex=0;"><option value='0'>SIZE</option><option value='6'>6 pt</option><option value='7'>7 pt</option><option value='8'>8 pt</option><option value='9'>9 pt</option><option value='10'>10 pt</option><option value='11'>11 pt</option><option value='12'>12 pt</option><option value='13'>13 pt</option><option value='14'>14 pt</option><option value='15'>15 pt</option><option value='16'>16 pt</option><option value='17'>17 pt</option><option value='18'>18 pt</option><option value='19'>19 pt</option><option value='20'>20 pt</option><option value='21'>21 pt</option><option value='22'>22 pt</option></select></span><span style="padding-right:1px;" id="bc6"><select id="fcolor" class="codeButtons" onchange="alterfont(this.options[this.selectedIndex].value, 'color','text3','');this.selectedIndex=0;"><option value='0'>COLOR</option><option value='blue' style='color:blue'>Blue</option><option value='red' style='color:red'>Red</option><option value='purple' style='color:purple'>Purple</option><option value='orange' style='color:orange'>Orange</option><option value='yellow' style='color:yellow'>Yellow</option><option value='gray' style='color:gray'>Gray</option><option value='green' style='color:green'>Green</option></select></span>

<span style="padding-right:1px;" id="bc7"><input type="button" title="URL" value="http://" onclick="tag_url('text3','')" class="codeButtons" style="direction:ltr;width:45px;" id="url" /></span>

<span style="padding-right:1px;" id="bc8"><input type="button" title="E-mail" value="@" onclick="tag_email('text3','')" class="codeButtons" style="width:30px;" id="email" /></span>

<span style="padding-right:1px;" id="bc9"><input type="button" title="Image" value="img" onclick="tag_image('text3','')" class="codeButtons" style="width:35px;" id="img" /></span><span style="padding-right:1px;" id="bc18"><input type="button" title="Hide from Guest" value="hide" onclick="simpletag('hide','','','text3','')" class="codeButtons" style="width:40px;" id="hide" /></span><span style="padding-right:1px;" id="bc12"><input type="button" title="List" value="list" onclick="tag_list('text3','')" class="codeButtons" id="list" style="width:30px;" /></span><span style="padding-right:1px;" id="bc13"><input type="button" title="Left" style="width:20px;text-align:left;" value='&middot;&middot;&middot;' onclick="simpletag('l','cdl','&middot;&middot;&middot;','text3')" class="codeButtons" id="cdl"></span><span style="padding-right:1px;" id="bc14"><input type="button" title="Center" style="width:20px;text-align:center;" value='&middot;&middot;&middot;' onclick="simpletag('c','cdc','&middot;&middot;&middot;','text3')" class="codeButtons" id="cdc"></span><span style="padding-right:1px;" id="bc15"><input type="button" title="Right" style="width:20px;text-align:right;" value='&middot;&middot;&middot;' onclick="simpletag('r','cdr','&middot;&middot;&middot;','text3')" class="codeButtons" id="cdr"></span><span style="padding-right:1px;" id="bc16"><input type="button" title="All codes" style="width:60px;" value="All codes" onclick="window.open('http://dbcprod.ucoz.ru/index/17','bbcodes','scrollbars=1,width=550,height=450,left=0,top=0');" class="codeButtons" /></span><span style="padding-right:1px;" id="bc17"><input style="font-weight:bold;width:20px" type="button" value="/" class="codeButtons codeCloseAll" title="Close all opened codes" onclick="closeall('text3','');" /></span><input type="hidden" id="tagcount" value="0" />

</div>

<div class="ucoz-editor-htpanel ucoz-editor-panel" style="display:none;padding-bottom:3px;">

<span style="padding-right:1px;" id="hbc1"><input type="button" title="Bold" value="b" onclick="_simpletag('b','text3')" class="codeButtons" name='b' style="width:20px;font-weight:bold"></span><span style="padding-right:1px;" id="hbc2"><input type="button" title="Italic" value="i" onclick="_simpletag('i','text3')" class="codeButtons" name='i' style="width:20px;font-style:italic"></span><span style="padding-right:1px;" id="hbc3"><input type="button" title="Underline" value="u" onclick="_simpletag('u','text3')" class="codeButtons" name='u' style="width:20px;text-decoration:underline"></span><span style="padding-right:1px;" id="hbc4"><select name="fsize" class="codeButtons" onchange="_alterfont(this.options[this.selectedIndex].value,'size','text3');this.selectedIndex=0;"><option value='0'>SIZE</option><option value='8'>8 pt</option><option value='9'>9 pt</option><option value='10'>10 pt</option><option value='11'>11 pt</option><option value='12'>12 pt</option><option value='13'>13 pt</option><option value='14'>14 pt</option><option value='15'>15 pt</option><option value='16'>16 pt</option><option value='17'>17 pt</option><option value='18'>18 pt</option></select></span><span style="padding-right:1px;" id="hbc5"><select name="ffont" class="codeButtons" onchange="_alterfont(this.options[this.selectedIndex].value,'font','text3');this.selectedIndex=0;"><option value='0'>FAMILY</option><option value='Arial'>Arial</option><option value='Times'>Times</option><option value='Courier'>Courier</option><option value='Impact'>Impact</option><option value='Geneva'>Geneva</option><option value='Optima'>Optima</option></select></span><span style="padding-right:1px;" id="hbc6"><select name="fcolor" class="codeButtons" onchange="_alterfont(this.options[this.selectedIndex].value,'color','text3');this.selectedIndex=0;"><option value='0'>COLOR</option><option value='blue' style='color:blue'>Blue</option><option value='red' style='color:red'>Red</option><option value='purple' style='color:purple'>Purple</option><option value='orange' style='color:orange'>Orange</option><option value='yellow' style='color:yellow'>Yellow</option><option value='gray' style='color:gray'>Gray</option><option value='green' style='color:green'>Green</option></select></span><span style="padding-right:1px;" id="hbc7"><input type="button" title="URL" value="http://" onclick="_tag_url('text3')" class="codeButtons" name="url" style="direction:ltr;width:45px;"></span><span style="padding-right:1px;" id="hbc8"><input type="button" title="E-mail" value="@" onclick="_tag_email('text3')" class="codeButtons" name="email" style="width:30px;"></span><span style="padding-right:1px;" id="hbc9"><input type="button" title="Image" value="img" onclick="_tag_image('text3')" class="codeButtons" name="img" style="width:35px;"></span><span style="padding-right:1px;" id="hbc10"><input type="button" title="List" value="list" onclick="_tag_list('text3')" class="codeButtons" name="list" style="width:40px;"></span><span style="padding-right:1px;" id="hbc11"><input type="button" title="Left" style="width:20px;text-align:left;" value="&middot;&middot;&middot;" onclick="_alterfont('left','pos','text3')" class="codeButtons" name="left"></span><span style="padding-right:1px;" id="hbc12"><input type="button" title="Center" style="width:20px;text-align:center;" value="&middot;&middot;&middot;" onclick="_alterfont('center','pos','text3')" class="codeButtons" name="center"></span><span style="padding-right:1px;" id="hbc13"><input type="button" title="Right" style="width:20px;text-align:right;" value="&middot;&middot;&middot;" onclick="_alterfont('right','pos','text3')" class="codeButtons" name="right"></span></div>

<textarea rows="10" style="width:100%;height:400px;" id="text3" name="text3" class="manFl" cols="40"><?php echo $pageEN['shortText']; ?></textarea>



<div style="margin-top:10px;margin-bottom:10px"><b>Полный текст на английском <img src="<?php echo $home_url;?>images/flags/en.gif" /><b></div>

<div class="ucoz-editor-bbpanel ucoz-editor-panel" style="display:none;padding-bottom:3px;"><span style="padding-right:1px;" id="bc1"><input type="button" title="Bold" value="b" onclick="simpletag('b','','','message3','')" class="codeButtons" id="b" style="width:20px;font-weight:bold" /></span><span style="padding-right:1px;" id="bc2"><input type="button" title="Italic" value="i" onclick="simpletag('i','','','message3','')" class="codeButtons" id="i" style="width:20px;font-style:italic" /></span><span style="padding-right:1px;" id="bc3"><input type="button" title="Underline"  value="u" onclick="simpletag('u','','','message3','')" class="codeButtons" id="u" style="width:20px;text-decoration:underline" /></span><span style="padding-right:1px;" id="bc4"><select id="fsize" class="codeButtons" onchange="alterfont(this.options[this.selectedIndex].value,'size','message3','');this.selectedIndex=0;"><option value='0'>SIZE</option><option value='6'>6 pt</option><option value='7'>7 pt</option><option value='8'>8 pt</option><option value='9'>9 pt</option><option value='10'>10 pt</option><option value='11'>11 pt</option><option value='12'>12 pt</option><option value='13'>13 pt</option><option value='14'>14 pt</option><option value='15'>15 pt</option><option value='16'>16 pt</option><option value='17'>17 pt</option><option value='18'>18 pt</option><option value='19'>19 pt</option><option value='20'>20 pt</option><option value='21'>21 pt</option><option value='22'>22 pt</option></select></span><span style="padding-right:1px;" id="bc6"><select id="fcolor" class="codeButtons" onchange="alterfont(this.options[this.selectedIndex].value, 'color','message3','');this.selectedIndex=0;"><option value='0'>COLOR</option><option value='blue' style='color:blue'>Blue</option><option value='red' style='color:red'>Red</option><option value='purple' style='color:purple'>Purple</option><option value='orange' style='color:orange'>Orange</option><option value='yellow' style='color:yellow'>Yellow</option><option value='gray' style='color:gray'>Gray</option><option value='green' style='color:green'>Green</option></select></span>

<span style="padding-right:1px;" id="bc7"><input type="button" title="URL" value="http://" onclick="tag_url('message3','')" class="codeButtons" style="direction:ltr;width:45px;" id="url" /></span>

<span style="padding-right:1px;" id="bc8"><input type="button" title="E-mail" value="@" onclick="tag_email('message3','')" class="codeButtons" style="width:30px;" id="email" /></span>

<span style="padding-right:1px;" id="bc9"><input type="button" title="Image" value="img" onclick="tag_image('message3','')" class="codeButtons" style="width:35px;" id="img" /></span><span style="padding-right:1px;" id="bc18"><input type="button" title="Hide from Guest" value="hide" onclick="simpletag('hide','','','message3','')" class="codeButtons" style="width:40px;" id="hide" /></span><span style="padding-right:1px;" id="bc12"><input type="button" title="List" value="list" onclick="tag_list('message3','')" class="codeButtons" id="list" style="width:30px;" /></span><span style="padding-right:1px;" id="bc13"><input type="button" title="Left" style="width:20px;text-align:left;" value='&middot;&middot;&middot;' onclick="simpletag('l','cdl','&middot;&middot;&middot;','message3')" class="codeButtons" id="cdl"></span><span style="padding-right:1px;" id="bc14"><input type="button" title="Center" style="width:20px;text-align:center;" value='&middot;&middot;&middot;' onclick="simpletag('c','cdc','&middot;&middot;&middot;','message3')" class="codeButtons" id="cdc"></span><span style="padding-right:1px;" id="bc15"><input type="button" title="Right" style="width:20px;text-align:right;" value='&middot;&middot;&middot;' onclick="simpletag('r','cdr','&middot;&middot;&middot;','message3')" class="codeButtons" id="cdr"></span><span style="padding-right:1px;" id="bc16"><input type="button" title="All codes" style="width:60px;" value="All codes" onclick="window.open('http://dbcprod.ucoz.ru/index/17','bbcodes','scrollbars=1,width=550,height=450,left=0,top=0');" class="codeButtons" /></span><span style="padding-right:1px;" id="bc17"><input style="font-weight:bold;width:20px" type="button" value="/" class="codeButtons codeCloseAll" title="Close all opened codes" onclick="closeall('message3','');" /></span><input type="hidden" id="tagcount" value="0" />

</div>

<div class="ucoz-editor-htpanel ucoz-editor-panel" style="display:none;padding-bottom:3px;">

<span style="padding-right:1px;" id="hbc1"><input type="button" title="Bold" value="b" onclick="_simpletag('b','message3')" class="codeButtons" name='b' style="width:20px;font-weight:bold"></span><span style="padding-right:1px;" id="hbc2"><input type="button" title="Italic" value="i" onclick="_simpletag('i','message3')" class="codeButtons" name='i' style="width:20px;font-style:italic"></span><span style="padding-right:1px;" id="hbc3"><input type="button" title="Underline" value="u" onclick="_simpletag('u','message3')" class="codeButtons" name='u' style="width:20px;text-decoration:underline"></span><span style="padding-right:1px;" id="hbc4"><select name="fsize" class="codeButtons" onchange="_alterfont(this.options[this.selectedIndex].value,'size','message3');this.selectedIndex=0;"><option value='0'>SIZE</option><option value='8'>8 pt</option><option value='9'>9 pt</option><option value='10'>10 pt</option><option value='11'>11 pt</option><option value='12'>12 pt</option><option value='13'>13 pt</option><option value='14'>14 pt</option><option value='15'>15 pt</option><option value='16'>16 pt</option><option value='17'>17 pt</option><option value='18'>18 pt</option></select></span><span style="padding-right:1px;" id="hbc5"><select name="ffont" class="codeButtons" onchange="_alterfont(this.options[this.selectedIndex].value,'font','message3');this.selectedIndex=0;"><option value='0'>FAMILY</option><option value='Arial'>Arial</option><option value='Times'>Times</option><option value='Courier'>Courier</option><option value='Impact'>Impact</option><option value='Geneva'>Geneva</option><option value='Optima'>Optima</option></select></span><span style="padding-right:1px;" id="hbc6"><select name="fcolor" class="codeButtons" onchange="_alterfont(this.options[this.selectedIndex].value,'color','message3');this.selectedIndex=0;"><option value='0'>COLOR</option><option value='blue' style='color:blue'>Blue</option><option value='red' style='color:red'>Red</option><option value='purple' style='color:purple'>Purple</option><option value='orange' style='color:orange'>Orange</option><option value='yellow' style='color:yellow'>Yellow</option><option value='gray' style='color:gray'>Gray</option><option value='green' style='color:green'>Green</option></select></span><span style="padding-right:1px;" id="hbc7"><input type="button" title="URL" value="http://" onclick="_tag_url('message3')" class="codeButtons" name="url" style="direction:ltr;width:45px;"></span><span style="padding-right:1px;" id="hbc8"><input type="button" title="E-mail" value="@" onclick="_tag_email('message3')" class="codeButtons" name="email" style="width:30px;"></span><span style="padding-right:1px;" id="hbc9"><input type="button" title="Image" value="img" onclick="_tag_image('message3')" class="codeButtons" name="img" style="width:35px;"></span><span style="padding-right:1px;" id="hbc10"><input type="button" title="List" value="list" onclick="_tag_list('message3')" class="codeButtons" name="list" style="width:40px;"></span><span style="padding-right:1px;" id="hbc11"><input type="button" title="Left" style="width:20px;text-align:left;" value="&middot;&middot;&middot;" onclick="_alterfont('left','pos','message3')" class="codeButtons" name="left"></span><span style="padding-right:1px;" id="hbc12"><input type="button" title="Center" style="width:20px;text-align:center;" value="&middot;&middot;&middot;" onclick="_alterfont('center','pos','message3')" class="codeButtons" name="center"></span><span style="padding-right:1px;" id="hbc13"><input type="button" title="Right" style="width:20px;text-align:right;" value="&middot;&middot;&middot;" onclick="_alterfont('right','pos','message3')" class="codeButtons" name="right"></span></div>

<textarea rows="10" style="width:100%;height:400px;" id="message3" name="message3" class="manFl" cols="40"><?php echo $pageEN['Content']; ?></textarea>

<input name="ID" value="<?php echo $arr[1]; ?>" type="hidden"/>

	<div style="margin-top:20px;text-align:center"><button type="submit" class="btn btn-primary">Сохранить</button></div>

</form>

<?php }else

{

	

	?>

    <input type="text" class="form-control" placeholder="Введите для ввода" id="search" onchange="Search('1')">

     <div id="result">

    <?

	if (isset($_GET['page'])) {$pg=$_GET['page']; $start = ($_GET['page'] - 1)*20;} else {$start = 0;$pg=1;}

	

	$CPages = mysqli_query($CONNECTION,"SELECT `pageId` FROM `".DB_PREFIX."pages` WHERE `Active`='1' AND `News`='1' AND `langAbb`='ru'");	

	$PagesCount=intval((mysqli_num_rows($CPages) - 1) / 20) + 1;

	echo Navigation($pg,$PagesCount);

	?>

    <table style="width:100%" style="margin-top:2em">

    	<tr>

        	<td width="10%"><strong>#</strong></td>

            <td><strong>Название новости</strong></td>

            <td><strong>Адресс</strong></td>

            <td><strong>Действия</strong></td>

        </tr>

    <?

	

	$getPages = mysqli_query($CONNECTION,"SELECT DISTINCT `pageName`,`pageId`,`URL` FROM `".DB_PREFIX."pages` WHERE `Active`='1' AND `News`='1' AND `langAbb`='ru' LIMIT $start,20");

	$k=1;

	

	$pages = mysqli_fetch_array($getPages);

	do

	{

		echo '<tr>';

		echo '<td>'.$k.'</td>';

		echo '<td>'.$pages['pageName'].'</td>';

		echo '<td><a href="'.$home_url.$pages['URL'].'" target="_bank">Просмотреть</a></td>';

		echo '<td><a href="'.$admin_page.'edit_news/'.$pages['pageId'].'">Редактировать</a><br><a href="javascript:DellPage('.$pages['pageId'].')">Удалить</a></td>';

		echo '</tr>';

		$k++;

	}

	while($pages = mysqli_fetch_array($getPages));

	

	?>

    </table>

    <?

	echo Navigation($pg,$PagesCount).'</div>';

}?>