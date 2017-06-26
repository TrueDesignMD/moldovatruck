<?php

define('HOME',$home_url);

if (isset($_GET['categoryforum'])) $_GET['categoryforum'] = htmlspecialchars($_GET['categoryforum'],ENT_QUOTES);
if (isset($_GET['topic'])) $_GET['topic'] = htmlspecialchars($_GET['topic'],ENT_QUOTES);

function GetTitleByCat2($cat,$array)
{
	global $CONNECTION;
	$URL = URL;
	if (isset($cat)&&!empty($cat))
	{
		$getTitleCategory = mysqli_query($CONNECTION,"SELECT `MetaTitle`,`MetaDescription`,`MetaTags`,`title`,`Parent` FROM `".DB_PREFIX."forum_category` WHERE `forumCatID`='$cat'");
		if (mysqli_num_rows($getTitleCategory)>0)
		{
			$TitleCategory = mysqli_fetch_array($getTitleCategory);
			if ($TitleCategory['Parent']>0) {
				GetTitleByCat2($TitleCategory['Parent'],$array);
				$array['metatitle']=$TitleCategory['title'].' - '.$array['metatitle'];
				$array['metadesc']=$TitleCategory['MetaDescription'].' - '.$array['metadesc'];
				$array['metakey']=$TitleCategory['MetaTags'].' - '.$array['metakey'];	
			
			}
			else
			{
				$array['metatitle']=$TitleCategory['title'].' - '.$array['metatitle'];
				$array['metadesc']=$TitleCategory['MetaDescription'].' - '.$array['metadesc'];
				$array['metakey']=$TitleCategory['MetaTags'].' - '.$array['metakey'];	
			
			}
			
		}
	}
	return $array;
}

function ForumTitle()
{
	global $CONNECTION;
	global $BROMS_;
	$URL = URL;
	
	$getTitleForum = mysqli_query($CONNECTION,"SELECT `MetaTitle`,`MetaDescription`,`MetaTags`,`pageName` FROM `".DB_PREFIX."pages` WHERE `URL`='$URL'");
	if (mysqli_num_rows($getTitleForum)>0) $titleForum = mysqli_fetch_array($getTitleForum);
	$META = array('metatitle'=>$titleForum['MetaTitle'],'metadesc'=>$titleForum['MetaDescription'],'metakey'=>$titleForum['MetaTags']);
	

	if (isset($_GET['category'])&&!empty($_GET['category']))
	{
		$getTitleCategory = mysqli_query($CONNECTION,"SELECT `MetaTitle`,`MetaDescription`,`MetaTags`,`title` FROM `".DB_PREFIX."forum_category` WHERE `forumCatID`='$_GET[category]'");
		if (mysqli_num_rows($getTitleCategory)>0)
		{
			$TitleCategory = mysqli_fetch_array($getTitleCategory);
			$META = GetTitleByCat2($_GET['category'],$META);
			
		}
	}
	
	if (isset($_GET['topic'])&&!empty($_GET['topic']))
	{
		$getTitleTopic = mysqli_query($CONNECTION,"SELECT `MetaTitle`,`MetaDescription`,`MetaTags`,`title`,`forumCatID` FROM `".DB_PREFIX."forum_topic` WHERE `forumID`='$_GET[topic]' ");
		if (mysqli_num_rows($getTitleTopic)>0)
		{
			$TitleTopic = mysqli_fetch_array($getTitleTopic);
			$META = GetTitleByCat2($TitleTopic['forumCatID'],$META);
			$META['metatitle']=$TitleTopic['MetaTitle'].' - '.$META['metatitle'];
			$META['metadesc']=$TitleTopic['MetaDescription'].' - '.$META['metadesc'];
			$META['metakey']=$TitleTopic['MetaTags'].' - '.$META['metakey'];
		}
	}
	return $META;
	
}

function metaTitle()
{
	global $CONNECTION;
	$URL = URL;
	if (!isset($_GET['id']))
	{
		$get = mysqli_query($CONNECTION,"SELECT `MetaTitle`,`MetaDescription`,`MetaTags` FROM `".DB_PREFIX."pages` WHERE `URL`='$URL'");
		$mt = mysqli_fetch_array($get);
		if (empty($mt['MetaTitle']))
		{
			$query = "SELECT `newurl` FROM `jos_redirection` WHERE `oldurl`='$URL'";
			$getRedirect = mysqli_query($CONNECTION,$query);
			if (mysqli_num_rows($getRedirect)>0)
			{

				$Redirect = mysqli_fetch_array($getRedirect);
				$explode= explode('id=',$Redirect['newurl']);
				$ex2 = explode('&',$explode[1]);

				$query = "SELECT `metakey`,`metadesc`,`attribs` FROM `jos_content` WHERE `id`='".$ex2[0]."'";
				$getMeta = mysqli_query($CONNECTION,$query);
				if (mysqli_num_rows($getMeta)>0)
				{
					$Meta = mysqli_fetch_array($getMeta);
					$mtitle = explode('no_site_name',$Meta['attribs']);
					$mtitle = explode('page_name=',$mtitle[0]);
					$mtitle = $mtitle[1];
					$insert = mysqli_query($CONNECTION,"UPDATE `".DB_PREFIX."pages` SET `MetaDescription`='$Meta[metadesc]', `MetaTags`='$Meta[metakey]',`MetaTitle`='$mtitle' WHERE `URL`='$URL'");
					return array('metatitle'=>$mtitle,'metadesc'=>$Meta['metadesc'],'metakey'=>$Meta['metakey']);
				}
			}
		

		}else {
			$Meta['metatitle'] = $mt['MetaTitle'];
			$Meta['metadesc'] = $mt['MetaDescription'];
			$Meta['metakey'] = $mt['MetaTags'];
			return $Meta;
		}
	}
	else
	{
		$query = "SELECT `metakey`,`metadesc`,`attribs` FROM `jos_content` WHERE `id`='".$_GET['id']."'";
		echo $query;
		$getMeta = mysqli_query($CONNECTION,$query);
		if (mysqli_num_rows($getMeta)>0)
		{
			$Meta = mysqli_fetch_array($getMeta);
			$mtitle = explode('no_site_name',$Meta['attribs']);
			$mtitle = explode('page_name=',$mtitle[0]);
			$mtitle = $mtitle[1];
			return array('metatitle'=>$mtitle,'metadesc'=>$Meta['metadesc'],'metakey'=>$Meta['metakey']);
		}
	}

}


function Lang($PHRASE,$Lang)
{
	global $CONNECTION;
	$sql = "SELECT `Content` FROM `".DB_PREFIX."translation` WHERE `langPhrase`='{$PHRASE}' AND `langAbb`='{$Lang}'";
	$Result = '';
	$getTranslation = mysqli_query($CONNECTION,$sql);
	if (mysqli_num_rows($getTranslation)==1)
	{
		$Translation = mysqli_fetch_array($getTranslation);
		$Result = htmlspecialchars_decode($Translation['Content']);
	}
	return $Result;

}

function LangList()
{
	global $CONNECTION;
	global $home_url;
	$Result = '';
	if (ID!=='homepage' and ID!=='ro')
	{
		$getB = mysqli_query($CONNECTION,"SELECT `Content`,`langAbb`,`URL` FROM `".DB_PREFIX."pages` WHERE `URL` LIKE '%".substr(URL,2)."%'  AND `Active`='1' ORDER BY `langAbb` DESC");
		if (mysqli_num_rows($getB)>0)
		{
			$content = '';
			$Arrs = array('ru'=>true,'ro'=>true,'eng'=>true);
			$B = mysqli_fetch_array($getB);
			do
			{
				if (!empty($content)) {if($B['Content']==$content) $Arrs[$B['langAbb']] = false; else {$Arrs['URL'.$B['langAbb']] = $B['URL'];} }  
				else 		{$content = $B['Content']; $Arrs['URL'.$B['langAbb']] = $B['URL'];}
			}
			while($B = mysqli_fetch_array($getB));
		}
	}else
	{
		$Arrs = array('ru'=>true,'ro'=>true,'eng'=>true,'URLru'=>'ru','URLro'=>'ro','URLen'=>'en');

	}

	$getLangs = mysqli_query($CONNECTION,"SELECT * FROM `".DB_PREFIX."languages`");
	if (mysqli_num_rows($getLangs)>0)
	{
		$Languages = mysqli_fetch_array($getLangs);
		do
		{
			if ($Arrs[$Languages['langAbb']])
			{
				$Result.='<li><a href="'.$home_url.htmlspecialchars_decode($Arrs['URL'.$Languages['langAbb']]).'"><img src="'.$home_url.'images/flags/'.htmlspecialchars_decode($Languages['langAbb']).'.gif" style="margin-right:1em">'.htmlspecialchars_decode($Languages['langTitle']).'</a></li>';
			}
			else
			{
			$getPage = mysqli_query($CONNECTION,"SELECT `newurl`,`oldurl`,`Itemid` FROM `jos_redirection` WHERE `oldurl`='$'");
			$Result.='<li><a href="'.$home_url.htmlspecialchars_decode($Languages['langAbb']).'/'.MODULE.'"><img src="'.$home_url.'images/flags/'.htmlspecialchars_decode($Languages['langAbb']).'.gif" style="margin-right:1em">'.htmlspecialchars_decode($Languages['langTitle']).'</a></li>';
			}

		}
		while($Languages = mysqli_fetch_array($getLangs));
	}
	return $Result;
}


function Lng($text)
{
	global $home_url;
	$mb = mb_substr($text,0,3,"UTF-8");
	if($mb!=='http' and $mb!=='java' and mb_substr($text,0,1,"UTF-8")!=='#'){
		if (LANG=='ru')	$newText=$home_url.$text;
		else {
			if (empty($_GET['id'])) $newText=$home_url.LANG.substr($text,2);
			else $newText=$home_url.$text.'&lang='.LANG;
			}
	}
	else $newText=urldecode($text);

	return $newText;
}

function Image($Text)
{
	global $home_url;
	$ex = explode('<img',$Text);
	if (count($ex)>1)
	{
		$newText = $ex[0];
		for($k=1;$k<count($ex);$k++)
		{
			$getSRC = explode('src=',$ex[$k]);
			if(mb_substr($getSRC[1],1,4,"UTF-8")!=='http') $newText.='<img'.$getSRC[0].'src='.mb_substr($getSRC[1],0,1,"UTF-8").$home_url.mb_substr($getSRC[1],1,mb_strlen($getSRC[1],"UTF-8")-1,"UTF-8");
			else $newText.='<img'.$ex[$k];
		}
		$Text=$newText;
	}
	$ex = explode('<a',$Text);
	if (count($ex)>1)
	{
		$newText = $ex[0];
		for($k=1;$k<count($ex);$k++)
		{
			$getSRC = explode('href=',$ex[$k]);
			$mb = mb_substr($getSRC[1],1,4,"UTF-8");
			if($mb!=='http' and $mb!=='java' and mb_substr($getSRC[1],1,1,"UTF-8")!=='#'){
			if (LANG=='ru')	$newText.='<a'.$getSRC[0].'href='.mb_substr($getSRC[1],0,1,"UTF-8").$home_url.mb_substr($getSRC[1],1,mb_strlen($getSRC[1],"UTF-8")-1,"UTF-8");
			else {
				if (empty($_GET['id'])) 
				{
					$newText.='<a'.$getSRC[0].'href='.mb_substr($getSRC[1],0,1,"UTF-8").$home_url.mb_substr($getSRC[1],1,mb_strlen($getSRC[1],"UTF-8")-1,"UTF-8");
				}
				else $newText.='<a'.$getSRC[0].'href='.mb_substr($getSRC[1],0,1,"UTF-8").$home_url.mb_substr($getSRC[1],1,mb_strlen($getSRC[1],"UTF-8")-1,"UTF-8").'&lang='.LANG;
			}
			}else $newText.='<a'.urldecode($ex[$k]);
		}
		$Text=$newText;
	}
	return $Text;
}

function getFunctions($Text)
{
	$explodeText = explode('$_',$Text);
	if (count($explodeText)>0)
	{
		$newText = '';
		for($k=0;$k<count($explodeText);$k++)
		{
			if($k%2==0)
			{
				$newText.=$explodeText[$k];
			}
			else {
				$getFunction = explode('(',$explodeText[$k]);
				$newText.=$getFunction[0](mb_substr($getFunction[1],0,mb_strlen($getFunction[1],"UTF-8"),"UTF-8"));
		}
		}		
		return $newText;
	}
	else return $Text;
}
function ViewForm($Id)
{
	global $CONNECTION;
	global $home_url;
	$getForm = mysqli_query($CONNECTION,"SELECT `Content` FROM `".DB_PREFIX."forms` WHERE `formId`='$Id'");
	if (mysqli_num_rows($getForm)>0)
	{
		$Form = mysqli_fetch_array($getForm);
		return getFunctions(htmlspecialchars_decode($Form['Content']));
	}
}
function MoreInfo($text)
{
	if (mb_strlen($text,"UTF-8")>1000) $text=mb_substr($text,0,1000,"UTF-8").'... <a href="#additioinal_info" id="InfButton" style="margin-left:1.2em">Читать далее</a> 
	<div style="text-align:center"><button href="#" data-toggle="modal" data-target="#ModalWindow" class="btn btn-info" type="button">Заказать транспорт</button></div>
	<font id="additioinal_info">'.mb_substr($text,1000,mb_strlen($text,"UTF-8")-1000,"UTF-8").' <a href="#content" onclick="CloseAdditional()" id="CloseButton" style="margin-left:1.2em;display:inline-block;float:right;margin-bottom:1em">Закрыть текст</a>
	<div style="text-align:center"><button href="#" data-toggle="modal" data-target="#ModalWindow" class="btn btn-info" type="button" id="lastButton">Заказать транспорт</button></div></font>';
	return $text;
}

function getIncludes($text)
{
	global $CONNECTION;
	$explodeText = explode('{jumi [',$text);
	if (count($explodeText)>1)
	{
		$newText = $explodeText[0];
		if (ID=='homepage' or ID=='ro') echo MoreInfo($newText);
		else echo $newText;
		for($k=1;$k<count($explodeText);$k++)
		{
			$getLink = explode(']',$explodeText[$k]);
			$LINK = $getLink[0];
			include dirname(__FILE__).'/../'.$LINK;
			$closeInclude = explode('}',$explodeText[$k]);
			if (ID=='homepage' or ID=='ro')echo MoreInfo($closeInclude[1]);
			else echo $closeInclude[1];
		}
	}
	else if (ID=='homepage' or ID=='ro') echo MoreInfo($text);
	else echo $text;
}
function ViewBlock($ID)
{
	global $CONNECTION;
	global $home_url;

	$ID = htmlspecialchars($ID,ENT_QUOTES);
	$getBlock = mysqli_query($CONNECTION,"SELECT `Content` FROM `".DB_PREFIX."blocks` WHERE `blockName`='$ID'");
	if (mysqli_num_rows($getBlock)>0)
	{
		$Block = mysqli_fetch_array($getBlock);
		return getIncludes(getFunctions(Image(htmlspecialchars_decode(urldecode($Block['Content'])))));
	}
}
function title_page()
{
	global $CONNECTION;
	global $home_url;
	global $URL;

	$result = '';
	if (isset($_GET['task'])&&empty($_GET['lang']))
	{
		$ID = htmlspecialchars($_GET['id'],ENT_QUOTES);
		$getPage = mysqli_query($CONNECTION,"SELECT `title` FROM `jos_content` WHERE `id`='$ID'");
		if (mysqli_num_rows($getPage)>0)
		{
			$title = mysqli_fetch_array($getPage);
			$result = htmlspecialchars_decode($title['title']);
		}
	}
	else
	{
		$getPage = mysqli_query($CONNECTION,"SELECT `pageName` FROM `".DB_PREFIX."pages` WHERE `URL`='$URL' AND `langAbb`='".LANG."'  AND `Active`='1'");
		if (mysqli_num_rows($getPage)>0)
		{
			$title = mysqli_fetch_array($getPage);
			$result = htmlspecialchars_decode($title['pageName']);
		}
		else
		{
			$getPage = mysqli_query($CONNECTION,"SELECT `newurl` FROM `jos_redirection` WHERE `oldurl`='$URL'");
			if (mysqli_num_rows($getPage)>0)
			{
				$title = mysqli_fetch_array($getPage);
				$explode= explode('id=',$title['newurl']);
				$ex2 = explode('&',$explode[1]);
				$getTitle = mysqli_query($CONNECTION,"SELECT `title` FROM `jos_content` WHERE `id`='$ex2[0]'");
				if (mysqli_num_rows($getTitle)>0)
				{
					$title = mysqli_fetch_array($getTitle);
					$result = htmlspecialchars_decode($title['title']);
				}
			}
		}
	}
	return $result;

}

function body()
{
	global $CONNECTION;
	global $home_url;
	global $URL;

	$result = '';
	if (isset($_GET['task'])&&empty($_GET['lang']))
	{
		$ID = htmlspecialchars($_GET['id'],ENT_QUOTES);
		$getPage = mysqli_query($CONNECTION,"SELECT `introtext` FROM `jos_content` WHERE `id`='$ID'");
		if (mysqli_num_rows($getPage)>0)
		{
			$title = mysqli_fetch_array($getPage);
			$result = getIncludes(getFunctions(Image(htmlspecialchars_decode(urldecode($title['introtext'])))));
		}
	}
	else
	{
		$get1 = mysqli_query($CONNECTION,"SELECT `Content` FROM `".DB_PREFIX."pages` WHERE `URL`='$URL'  AND `Active`='1'");
		if (mysqli_num_rows($get1)>0)
		{
			$title = mysqli_fetch_array($get1);
			if (empty($title['Content']))
			{
				$getPage = mysqli_query($CONNECTION,"SELECT `newurl` FROM `jos_redirection` WHERE `oldurl`='$URL'");
				if (mysqli_num_rows($getPage)>0)
				{
					$title = mysqli_fetch_array($getPage);
					$explode= explode('id=',$title['newurl']);
					$ex2 = explode('&',$explode[1]);
					$getCont = mysqli_query($CONNECTION,"SELECT `introtext`,`fulltext` FROM `jos_content` WHERE `id`='$ex2[0]'");
					if (mysqli_num_rows($getCont)>0)
					{
						$title = mysqli_fetch_array($getCont);
						if (empty($title['introtext'])) $title['Content'] = $title['fulltext'];
						else $title['Content'] = $title['introtext'];
						$result = getIncludes(getFunctions(Image(htmlspecialchars_decode(urldecode($title['Content'])))));
					}
				}
			}
			else $result = getIncludes(getFunctions(Image(htmlspecialchars_decode(urldecode($title['Content'])))));
		}
		else
		{
			$getPage = mysqli_query($CONNECTION,"SELECT `newurl` FROM `jos_redirection` WHERE `oldurl`='$URL'");
			if (mysqli_num_rows($getPage)>0)
			{
				$title = mysqli_fetch_array($getPage);
				$explode= explode('id=',$title['newurl']);
				$ex2 = explode('&',$explode[1]);
				$getCont = mysqli_query($CONNECTION,"SELECT `introtext`,`fulltext` FROM `jos_content` WHERE `id`='$ex2[0]'");
				if (mysqli_num_rows($getCont)>0)
				{
					$title = mysqli_fetch_array($getCont);
					if (empty($title['introtext'])) $title['Content'] = $title['fulltext'];
					else $title['Content'] = $title['introtext'];
					$result = getIncludes(getFunctions(Image(htmlspecialchars_decode(urldecode($title['Content'])))));
				}
			}

		}
	}
	echo $result;
}




function BirjaIndex()
{
    global $CONNECTION;
    global $home_url;

    if(LANG=='ru') $birja = 'Транспортная и грузовая биржа';
    if(LANG=='ro') $birja = 'Bursa de transport';
    if(LANG=='en') $birja = 'The Freigth exchange';

    if(LANG=='ru') $AutoCargo = 'Авто грузы';
    if(LANG=='ru') $SeaCargo = 'Морские грузы';
    if(LANG=='ru') $TrainCargo = 'Ж.Д. грузы';
    if(LANG=='ru') $PlainCargo = 'Авиа грузы';
    if(LANG=='ru') $PostCargo = 'Посылки';
    if(LANG=='ru') $PassengerCargo = 'Пассажиры';

    if(LANG=='ru') $AutoTransport = 'Авто транспорт';
    if(LANG=='ru') $SeaTransport = 'Морской транспорт';
    if(LANG=='ru') $TrainTransport = 'Ж.Д. транспорт';
    if(LANG=='ru') $PlainTransport = 'Авиа транспорт';
    if(LANG=='ru') $PostTransport = 'Доставка посылок';
    if(LANG=='ru') $PassengerTransport = 'Пассажирский транспорт';

    if(LANG=='ro') $categories_transport = 'Categoriile marfei';
    if(LANG=='ro') $categories_transport2 = 'Categoriile transportului';
    if(LANG=='ro') $AutoCargo = 'Auto de marfă';
    if(LANG=='ro') $SeaCargo = 'Marfă maritimă';
    if(LANG=='ro') $TrainCargo = 'Marfă feroviară';
    if(LANG=='ro') $PlainCargo = 'Marfă aeriană';
    if(LANG=='ro') $PostCargo = 'Livrarea de colete';
    if(LANG=='ro') $PassengerCargo = 'Marfă de pasageri';

    if(LANG=='ro') $AutoTransport = 'Transport internaţional de marfă';
    if(LANG=='ro') $SeaTransport = 'Transport maritim';
    if(LANG=='ro') $TrainTransport = 'Transport feroviar';
    if(LANG=='ro') $PlainTransport = 'Transport aerian';
    if(LANG=='ro') $PostTransport = 'Livrarea de colete';
    if(LANG=='ro') $PassengerTransport = 'Transport de pasageri';


    if(LANG=='en') $categories_transport = 'Cargo categories';
    if(LANG=='en') $categories_transport2 = 'Transport categories';
    if(LANG=='en') $AutoCargo = 'Auto cargo';
    if(LANG=='en') $SeaCargo = 'Marine cargo';
    if(LANG=='en') $TrainCargo = 'Railway cargo';
    if(LANG=='en') $PlainCargo = 'Air cargo';
    if(LANG=='en') $PostCargo = 'Parcels';
    if(LANG=='en') $PassengerCargo = 'Passengers';

    if(LANG=='en') $AutoTransport = 'Motor transport';
    if(LANG=='en') $SeaTransport = 'Sea transport';
    if(LANG=='en') $TrainTransport = 'Railway transport';
    if(LANG=='en') $PlainTransport = 'Air transport';
    if(LANG=='en') $PostTransport = 'Parcel delivery';
    if(LANG=='en') $PassengerTransport = 'Passenger transport';

    if (LANG=='ru') {
        $FindTransport = 'Показать транспорт';
        $FindCargo = 'Показать грузы';
        $AddCargo = 'Добавить авто груз';
        $AddTransport = 'Добавить авто транспорт';
    }
    if (LANG=='ro') {
        $FindCargo = 'Arată marfă';
        $FindTransport = 'Arată transport';
        $AddCargo = 'Adaugă marfă pentru auto';
        $AddTransport = 'Adaugă transport de marfă';
    }
    if (LANG=='en') {
        $FindCargo = 'Show cargo';
        $FindTransport = 'Show transport';
        $AddCargo = 'Add auto cargo';
        $AddTransport = 'Add auto transport';
    }
    echo '<div id="autoBirja" style=background-size:cover;background-image:url("'.$home_url.'images/a1.png")><font>
	<div class="container" style="padding-top:0.5em;text-align:center">
	<div style="text-align:center;margin-bottom:2em"><h2>'.$birja.'</h2>';
	    echo'<div id="cargoBirja"  style="display: none">';
    echo'<a href="'.$home_url.LANG.'/prosmotr-gruzov-nayti-gruz-poisk-poputnyih-gruzov-predlozheniya-gruzov-888.php" class="btn btn-warning"><h3>'.$AutoCargo.'</h3></a>';
    echo'<a href="'.$home_url.LANG.'/sea_cargo.php" class="btn btn-link"><h3>'.$SeaCargo.'</h3></a>';
    echo'<a href="'.$home_url.LANG.'/train_cargo.php" class="btn btn-link"><h3>'.$TrainCargo.'</h3></a>';
    echo'<a href="'.$home_url.LANG.'/plain_cargo.php" class="btn btn-link"><h3>'.$PlainCargo.'</h3></a>';
    echo'<a href="'.$home_url.LANG.'/post_cargo.php" class="btn btn-link"><h3>'.$PostCargo.'</h3></a>';
    echo'<a href="'.$home_url.LANG.'/passenger_cargo.php" class="btn btn-link"><h3>'.$PassengerCargo.'</h3></a>';
    echo'<p style="margin-top:2em;"><a href="'.$home_url.LANG.'/prosmotr-gruzov-nayti-gruz-poisk-poputnyih-gruzov-predlozheniya-gruzov-888.php?add=cargo" class="btn btn-info">'.$AddCargo.'</a> <a href="'.$home_url.LANG.'/prosmotr-gruzov-nayti-gruz-poisk-poputnyih-gruzov-predlozheniya-gruzov-888.php?add=transport" class="btn btn-info">'.$AddTransport.'</a></p>
	<p style="margin-top:1em;"><button class="btn btn-primary" onclick="ShowTransport()">'.$FindTransport.'</button></p>';
        echo'</div>';
    echo'<div id="transportBirja">';
    echo'<a href="'.$home_url.LANG.'/poisk-transporta-nayti-svobodnyiy-transport-poisk-poputnogo-transporta-577.php" class="btn btn-warning"><h3>'.$AutoTransport.'</h3></a>';
    echo'<a href="'.$home_url.LANG.'/sea_transport.php" class="btn btn-link"><h3>'.$SeaTransport.'</h3></a>';
    echo'<a href="'.$home_url.LANG.'/train_transport.php" class="btn btn-link"><h3>'.$TrainTransport.'</h3></a>';
    echo'<a href="'.$home_url.LANG.'/plain_transport.php" class="btn btn-link"><h3>'.$PlainTransport.'</h3></a>';
    echo'<a href="'.$home_url.LANG.'/post_transport.php" class="btn btn-link"><h3>'.$PostTransport.'</h3></a>';
    echo'<a href="'.$home_url.LANG.'/passenger_transport.php" class="btn btn-link"><h3>'.$PassengerTransport.'</h3></a>';
    echo'<p style="margin-top:2em;"><a href="'.$home_url.LANG.'/poisk-transporta-nayti-svobodnyiy-transport-poisk-poputnogo-transporta-577.php?add=cargo" class="btn btn-info">'.$AddCargo.'</a> <a href="'.$home_url.LANG.'/poisk-transporta-nayti-svobodnyiy-transport-poisk-poputnogo-transporta-577.php?add=transport" class="btn btn-info">'.$AddTransport.'</a></p>
	<p style="margin-top:1em;"><button class="btn btn-primary" onclick="ShowCargo()">'.$FindCargo.'</button></p>';
    echo'</div>';
	echo'</div>
	</div>';

    echo "
    <script>
    function ShowTransport()
    {
        $('#cargoBirja').fadeOut(500);
        $('#transportBirja').delay(400).fadeIn(500);
    }
     function ShowCargo()
    {
        $('#transportBirja').fadeOut(500);
        $('#cargoBirja').delay(400).fadeIn(500);
    }
    </script>
    ";
}

function Birja()
{

	global $CONNECTION;
	global $home_url;
	
	
	$expl = explode('/',URL);
	$expl = explode('.php',$expl[1]);
	
	if(LANG=='ru') $categories_transport = 'Грузы по категориям';
	if(LANG=='ru') $categories_transport2 = 'Транспорт по категориям';
	if(LANG=='ru') $AutoCargo = 'Авто грузы';
	if(LANG=='ru') $SeaCargo = 'Морские грузы';
	if(LANG=='ru') $TrainCargo = 'Ж.Д. грузы';
	if(LANG=='ru') $PlainCargo = 'Авиа грузы';
	if(LANG=='ru') $PostCargo = 'Посылки';
	if(LANG=='ru') $PassengerCargo = 'Пассажиры';
	
	if(LANG=='ru') $AutoTransport = 'Авто транспорт';
	if(LANG=='ru') $SeaTransport = 'Морской транспорт';
	if(LANG=='ru') $TrainTransport = 'Ж.Д. транспорт';
	if(LANG=='ru') $PlainTransport = 'Авиа транспорт';
	if(LANG=='ru') $PostTransport = 'Доставка посылок';
	if(LANG=='ru') $PassengerTransport = 'Пассажирский транспорт';
	
	if(LANG=='ro') $categories_transport = 'Categoriile marfei';
	if(LANG=='ro') $categories_transport2 = 'Categoriile transportului';
	if(LANG=='ro') $AutoCargo = 'Auto de marfă';
	if(LANG=='ro') $SeaCargo = 'Marfă maritimă';
	if(LANG=='ro') $TrainCargo = 'Marfă feroviară';
	if(LANG=='ro') $PlainCargo = 'Marfă aeriană';
	if(LANG=='ro') $PostCargo = 'Livrarea de colete';
	if(LANG=='ro') $PassengerCargo = 'Marfă de pasageri';
	
	if(LANG=='ro') $AutoTransport = 'Transport internaţional de marfă';
	if(LANG=='ro') $SeaTransport = 'Transport maritim';
	if(LANG=='ro') $TrainTransport = 'Transport feroviar';
	if(LANG=='ro') $PlainTransport = 'Transport aerian';
	if(LANG=='ro') $PostTransport = 'Livrarea de colete';
	if(LANG=='ro') $PassengerTransport = 'Transport de pasageri';
	
	
	if(LANG=='en') $categories_transport = 'Cargo categories';
	if(LANG=='en') $categories_transport2 = 'Transport categories';
	if(LANG=='en') $AutoCargo = 'Auto cargo';
	if(LANG=='en') $SeaCargo = 'Marine cargo';
	if(LANG=='en') $TrainCargo = 'Railway cargo';
	if(LANG=='en') $PlainCargo = 'Air cargo';
	if(LANG=='en') $PostCargo = 'Parcels';
	if(LANG=='en') $PassengerCargo = 'Passengers';
	
	if(LANG=='en') $AutoTransport = 'Motor transport';
	if(LANG=='en') $SeaTransport = 'Sea transport';
	if(LANG=='en') $TrainTransport = 'Railway transport';
	if(LANG=='en') $PlainTransport = 'Air transport';
	if(LANG=='en') $PostTransport = 'Parcel delivery';
	if(LANG=='en') $PassengerTransport = 'Passenger transport';
	
	if(LANG=='ru' and ($expl[0]=='prosmotr-gruzov-nayti-gruz-poisk-poputnyih-gruzov-predlozheniya-gruzov-888' or $expl[0]=='poisk-transporta-nayti-svobodnyiy-transport-poisk-poputnogo-transporta-577')) $AddCargo = 'Добавить авто груз';
	if(LANG=='ru' and ($expl[0]=='sea_cargo' or $expl[0]=='sea_transport')) $AddCargo = 'Добавить морской груз';
	if(LANG=='ru' and ($expl[0]=='train_cargo' or $expl[0]=='train_transport')) $AddCargo = 'Добавить ж.д. груз';
	if(LANG=='ru' and ($expl[0]=='plain_cargo' or $expl[0]=='plain_transport')) $AddCargo = 'Добавить авиа груз';
	if(LANG=='ru' and ($expl[0]=='post_cargo' or $expl[0]=='post_transport')) $AddCargo = 'Добавить посылку';
	if(LANG=='ru' and ($expl[0]=='passenger_cargo' or $expl[0]=='passenger_transport')) $AddCargo = 'Разместить заказы пассажиров';
	
	if(LANG=='ru' and ($expl[0]=='prosmotr-gruzov-nayti-gruz-poisk-poputnyih-gruzov-predlozheniya-gruzov-888' or $expl[0]=='poisk-transporta-nayti-svobodnyiy-transport-poisk-poputnogo-transporta-577')) $AddTransport = 'Добавить авто транспорт';
	if(LANG=='ru' and ($expl[0]=='sea_cargo' or $expl[0]=='sea_transport')) $AddTransport = 'Добавить морской транспорт';
	if(LANG=='ru' and ($expl[0]=='train_cargo' or $expl[0]=='train_transport')) $AddTransport = 'Добавить ж.д. транспорт';
	if(LANG=='ru' and ($expl[0]=='plain_cargo' or $expl[0]=='plain_transport')) $AddTransport = 'Добавить авиа транспорт';
	if(LANG=='ru' and ($expl[0]=='post_cargo' or $expl[0]=='post_transport')) $AddTransport = 'Добавить транспорт для посылок';
	if(LANG=='ru' and ($expl[0]=='passenger_cargo' or $expl[0]=='passenger_transport')) $AddTransport = 'Добавить пассажирский транспорт';
	
	if(LANG=='ro' and ($expl[0]=='prosmotr-gruzov-nayti-gruz-poisk-poputnyih-gruzov-predlozheniya-gruzov-888' or $expl[0]=='poisk-transporta-nayti-svobodnyiy-transport-poisk-poputnogo-transporta-577')) $AddCargo = 'Adaugă marfă pentru auto';
	if(LANG=='ro' and ($expl[0]=='sea_cargo' or $expl[0]=='sea_transport')) $AddCargo = 'Adaugă marfă maritimă';
	if(LANG=='ro' and ($expl[0]=='train_cargo' or $expl[0]=='train_transport')) $AddCargo = 'Adaugă marfă feroviară';
	if(LANG=='ro' and ($expl[0]=='plain_cargo' or $expl[0]=='plain_transport')) $AddCargo = 'Adaugă marfă aeriană';
	if(LANG=='ro' and ($expl[0]=='post_cargo' or $expl[0]=='post_transport')) $AddCargo = 'Adaugă coletă';
	if(LANG=='ro' and ($expl[0]=='passenger_cargo' or $expl[0]=='passenger_transport')) $AddCargo = 'Adaugă marfă de pasageri';
	
	if(LANG=='ro' and ($expl[0]=='prosmotr-gruzov-nayti-gruz-poisk-poputnyih-gruzov-predlozheniya-gruzov-888' or $expl[0]=='poisk-transporta-nayti-svobodnyiy-transport-poisk-poputnogo-transporta-577')) $AddTransport = 'Adaugă transport de marfă';
	if(LANG=='ro' and ($expl[0]=='sea_cargo' or $expl[0]=='sea_transport')) $AddTransport = 'Adaugă transport maritim';
	if(LANG=='ro' and ($expl[0]=='train_cargo' or $expl[0]=='train_transport')) $AddTransport = 'Adaugă transport feroviar';
	if(LANG=='ro' and ($expl[0]=='plain_cargo' or $expl[0]=='plain_transport')) $AddTransport = 'Adaugă transport aerian';
	if(LANG=='ro' and ($expl[0]=='post_cargo' or $expl[0]=='post_transport')) $AddTransport = 'Adaugă transport pentru livrări';
	if(LANG=='ro' and ($expl[0]=='passenger_cargo' or $expl[0]=='passenger_transport')) $AddTransport = 'Adaugă transport de pasageri';
	
	
	if(LANG=='en' and ($expl[0]=='prosmotr-gruzov-nayti-gruz-poisk-poputnyih-gruzov-predlozheniya-gruzov-888' or $expl[0]=='poisk-transporta-nayti-svobodnyiy-transport-poisk-poputnogo-transporta-577')) $AddCargo = 'Add auto cargo';
	if(LANG=='en' and ($expl[0]=='sea_cargo' or $expl[0]=='sea_transport')) $AddCargo = 'Add marine cargo';
	if(LANG=='en' and ($expl[0]=='train_cargo' or $expl[0]=='train_transport')) $AddCargo = 'Add railway cargo';
	if(LANG=='en' and ($expl[0]=='plain_cargo' or $expl[0]=='plain_transport')) $AddCargo = 'Add air cargo';
	if(LANG=='en' and ($expl[0]=='post_cargo' or $expl[0]=='post_transport')) $AddCargo = 'Add parcel';
	if(LANG=='en' and ($expl[0]=='passenger_cargo' or $expl[0]=='passenger_transport')) $AddCargo = 'Add passenger cargo';

	if(LANG=='en' and ($expl[0]=='prosmotr-gruzov-nayti-gruz-poisk-poputnyih-gruzov-predlozheniya-gruzov-888' or $expl[0]=='poisk-transporta-nayti-svobodnyiy-transport-poisk-poputnogo-transporta-577')) $AddTransport = 'Add auto transport';
	if(LANG=='en' and ($expl[0]=='sea_cargo' or $expl[0]=='sea_transport')) $AddTransport = 'Add sea transport';
	if(LANG=='en' and ($expl[0]=='train_cargo' or $expl[0]=='train_transport')) $AddTransport = 'Add railway transport';
	if(LANG=='en' and ($expl[0]=='plain_cargo' or $expl[0]=='plain_transport')) $AddTransport = 'Add air transport';
	if(LANG=='en' and ($expl[0]=='post_cargo' or $expl[0]=='post_transport')) $AddTransport = 'Add delivery transport';
	if(LANG=='en' and ($expl[0]=='passenger_cargo' or $expl[0]=='passenger_transport')) $AddTransport = 'Add passenger transport';
	
	
	if(LANG=='ru' and $expl[0]=='prosmotr-gruzov-nayti-gruz-poisk-poputnyih-gruzov-predlozheniya-gruzov-888') $Find = '<a href="'.$home_url.LANG.'/poisk-transporta-nayti-svobodnyiy-transport-poisk-poputnogo-transporta-577.php"class="btn btn-primary">Показать авто транспорт</a>';
	if(LANG=='ru' and $expl[0]=='poisk-transporta-nayti-svobodnyiy-transport-poisk-poputnogo-transporta-577') $Find = '<a href="'.$home_url.LANG.'/prosmotr-gruzov-nayti-gruz-poisk-poputnyih-gruzov-predlozheniya-gruzov-888.php"class="btn btn-primary">Показать грузы для автотранспорта</a>';
		
	if(LANG=='ru' and $expl[0]=='sea_cargo') $Find = '<a href="'.$home_url.LANG.'/sea_transport.php"class="btn btn-primary">Показать морской транспорт</a>';
	if(LANG=='ru' and $expl[0]=='sea_transport') $Find = '<a href="'.$home_url.LANG.'/sea_cargo.php"class="btn btn-primary">Показать морской груз</a>';
	
	if(LANG=='ru' and $expl[0]=='train_cargo') $Find = '<a href="'.$home_url.LANG.'/train_transport.php"class="btn btn-primary">Показать ж.д. транспорт</a>';
	if(LANG=='ru' and $expl[0]=='train_transport') $Find = '<a href="'.$home_url.LANG.'/train_cargo.php"class="btn btn-primary">Показать ж.д. груз</a>';
	
	if(LANG=='ru' and $expl[0]=='plain_cargo') $Find = '<a href="'.$home_url.LANG.'/plain_transport.php"class="btn btn-primary">Показать авиа транспорт</a>';
	if(LANG=='ru' and $expl[0]=='plain_transport') $Find = '<a href="'.$home_url.LANG.'/plain_cargo.php"class="btn btn-primary">Показать авиа груз</a>';
	
	if(LANG=='ru' and $expl[0]=='post_cargo') $Find = '<a href="'.$home_url.LANG.'/post_transport.php"class="btn btn-primary">Показать транспорт для посылок</a>';
	if(LANG=='ru' and $expl[0]=='post_transport') $Find = '<a href="'.$home_url.LANG.'/post_cargo.php"class="btn btn-primary">Показать грузы-посылки</a>';
	
	if(LANG=='ru' and $expl[0]=='passenger_cargo') $Find = '<a href="'.$home_url.LANG.'/passenger_transport.php"class="btn btn-primary">Показать пассажирский транспорт</a>';
	if(LANG=='ru' and $expl[0]=='passenger_transport') $Find = '<a href="'.$home_url.LANG.'/passenger_cargo.php"class="btn btn-primary">Показать заказы от пассажиров</a>';
	
	
	
	
	if(LANG=='ro' and $expl[0]=='prosmotr-gruzov-nayti-gruz-poisk-poputnyih-gruzov-predlozheniya-gruzov-888') $Find = '<a href="'.$home_url.LANG.'/poisk-transporta-nayti-svobodnyiy-transport-poisk-poputnogo-transporta-577.php" class="btn btn-primary">Arată transport internațional de marfă</a>';
	if(LANG=='ro' and $expl[0]=='poisk-transporta-nayti-svobodnyiy-transport-poisk-poputnogo-transporta-577') $Find = '<a href="'.$home_url.LANG.'/prosmotr-grozov-nayti-groz-poisk-poputnyih-grozov-predlozheniya-grozov-888.php"class="btn btn-primary">Arată auto marfă</a>';
		
	if(LANG=='ro' and $expl[0]=='sea_cargo') $Find = '<a href="'.$home_url.LANG.'/sea_transport.php"class="btn btn-primary">Arată transport măritim</a>';
	if(LANG=='ro' and $expl[0]=='sea_transport') $Find = '<a href="'.$home_url.LANG.'/sea_cargo.php"class="btn btn-primary">Arată marfa măritimă</a>';
	
	if(LANG=='ro' and $expl[0]=='train_cargo') $Find = '<a href="'.$home_url.LANG.'/train_transport.php"class="btn btn-primary">Arată transport feroviar</a>';
	if(LANG=='ro' and $expl[0]=='train_transport') $Find = '<a href="'.$home_url.LANG.'/train_cargo.php"class="btn btn-primary">Arată marfa feroviară</a>';
	
	if(LANG=='ro' and $expl[0]=='plain_cargo') $Find = '<a href="'.$home_url.LANG.'/plain_transport.php"class="btn btn-primary">Arată transport aerian</a>';
	if(LANG=='ro' and $expl[0]=='plain_transport') $Find = '<a href="'.$home_url.LANG.'/plain_cargo.php"class="btn btn-primary">Arată marfa aeriană</a>';
	
	if(LANG=='ro' and $expl[0]=='post_cargo') $Find = '<a href="'.$home_url.LANG.'/post_transport.php"class="btn btn-primary">Arată transport pentru livrări</a>';
	if(LANG=='ro' and $expl[0]=='post_transport') $Find = '<a href="'.$home_url.LANG.'/post_cargo.php"class="btn btn-primary">Arată marfa pentru livrări</a>';
	
	if(LANG=='ro' and $expl[0]=='passenger_cargo') $Find = '<a href="'.$home_url.LANG.'/passenger_transport.php"class="btn btn-primary">Arată transport de pasageri</a>';
	if(LANG=='ro' and $expl[0]=='passenger_transport') $Find = '<a href="'.$home_url.LANG.'/passenger_cargo.php"class="btn btn-primary">Arată marfa de pasageri</a>';
	
	
	
	
	if(LANG=='en' and $expl[0]=='prosmotr-gruzov-nayti-gruz-poisk-poputnyih-gruzov-predlozheniya-gruzov-888') $Find = '<a href="'.$home_url.LANG.'/poisk-transporta-nayti-svobodnyiy-transport-poisk-poputnogo-transporta-577.php"class="btn btn-primary">Show auto transport</a>';
	if(LANG=='en' and $expl[0]=='poisk-transporta-nayti-svobodnyiy-transport-poisk-poputnogo-transporta-577') $Find = '<a href="'.$home_url.LANG.'/prosmotr-genzov-nayti-genz-poisk-poputnyih-genzov-predlozheniya-genzov-888.php"class="btn btn-primary">Show auto cargo </a>';
		
	if(LANG=='en' and $expl[0]=='sea_cargo') $Find = '<a href="'.$home_url.LANG.'/sea_transport.php"class="btn btn-primary">Show sea transport</a>';
	if(LANG=='en' and $expl[0]=='sea_transport') $Find = '<a href="'.$home_url.LANG.'/sea_cargo.php"class="btn btn-primary">Show marine cargo</a>';
	
	if(LANG=='en' and $expl[0]=='train_cargo') $Find = '<a href="'.$home_url.LANG.'/train_transport.php"class="btn btn-primary">Show railway transport</a>';
	if(LANG=='en' and $expl[0]=='train_transport') $Find = '<a href="'.$home_url.LANG.'/train_cargo.php"class="btn btn-primary">Show railway cargo</a>';
	
	if(LANG=='en' and $expl[0]=='plain_cargo') $Find = '<a href="'.$home_url.LANG.'/plain_transport.php"class="btn btn-primary">Show air transport</a>';
	if(LANG=='en' and $expl[0]=='plain_transport') $Find = '<a href="'.$home_url.LANG.'/plain_cargo.php"class="btn btn-primary">Show air cargo</a>';
	
	if(LANG=='en' and $expl[0]=='post_cargo') $Find = '<a href="'.$home_url.LANG.'/post_transport.php"class="btn btn-primary">Show delivery transport</a>';
	if(LANG=='en' and $expl[0]=='post_transport') $Find = '<a href="'.$home_url.LANG.'/post_cargo.php"class="btn btn-primary">Show delivery cargo</a>';
	
	if(LANG=='en' and $expl[0]=='passenger_cargo') $Find = '<a href="'.$home_url.LANG.'/passenger_transport.php"class="btn btn-primary">Show passenger transport</a>';
	if(LANG=='en' and $expl[0]=='passenger_transport') $Find = '<a href="'.$home_url.LANG.'/passenger_cargo.php"class="btn btn-primary">Show pasenger cargo</a>';
	
	
	$transportPages = array('poisk-transporta-nayti-svobodnyiy-transport-poisk-poputnogo-transporta-577','sea_transport','train_transport','plain_transport','passenger_transport','post_transport');
	$cargoPages = array('prosmotr-gruzov-nayti-gruz-poisk-poputnyih-gruzov-predlozheniya-gruzov-888','sea_cargo','train_cargo','plain_cargo','passenger_cargo','post_cargo');
	echo '<div id="';
	if($expl[0]=='prosmotr-gruzov-nayti-gruz-poisk-poputnyih-gruzov-predlozheniya-gruzov-888' or $expl[0]=='poisk-transporta-nayti-svobodnyiy-transport-poisk-poputnogo-transporta-577') echo 'autoBirja';
	if($expl[0]=='sea_cargo' or $expl[0]=='sea_transport') echo 'seaBirja';	
	if($expl[0]=='train_cargo' or $expl[0]=='train_transport') echo 'trainBirja';	
	if($expl[0]=='plain_cargo' or $expl[0]=='plain_transport') echo 'plainBirja';	
	if($expl[0]=='post_cargo' or $expl[0]=='post_transport') echo 'postBirja';	
	if($expl[0]=='passenger_cargo' or $expl[0]=='passenger_transport') echo 'passengerBirja';	
	echo'">
	<font>
	<div class="container" style="padding-top:0.5em;text-align:center">
	<div style="text-align:center"><h2>';
	if (in_array($expl[0],$transportPages)) echo $categories_transport2; else echo $categories_transport;
	echo'</h2></div>';
	if(in_array($expl[0],$cargoPages))
	{
		echo'<a href="'.$home_url.LANG.'/prosmotr-gruzov-nayti-gruz-poisk-poputnyih-gruzov-predlozheniya-gruzov-888.php" class="btn btn-';
		if($expl[0]=='prosmotr-gruzov-nayti-gruz-poisk-poputnyih-gruzov-predlozheniya-gruzov-888') echo 'warning'; else echo 'link';
		echo'"><h3>'.$AutoCargo.'</h3></a>';
		
		echo'<a href="'.$home_url.LANG.'/sea_cargo.php" class="btn btn-';
		if($expl[0]=='sea_cargo') echo 'warning'; else echo 'link';
		echo'"><h3>'.$SeaCargo.'</h3></a>';
		
		echo'<a href="'.$home_url.LANG.'/train_cargo.php" class="btn btn-';
		if($expl[0]=='train_cargo') echo 'warning'; else echo 'link';
		echo'"><h3>'.$TrainCargo.'</h3></a>';
		
		echo'<a href="'.$home_url.LANG.'/plain_cargo.php" class="btn btn-';
		if($expl[0]=='plain_cargo') echo 'warning'; else echo 'link';
		echo'"><h3>'.$PlainCargo.'</h3></a>';
		
		echo'<a href="'.$home_url.LANG.'/post_cargo.php" class="btn btn-';
		if($expl[0]=='post_cargo') echo 'warning'; else echo 'link';
		echo'"><h3>'.$PostCargo.'</h3></a>';
		
		echo'<a href="'.$home_url.LANG.'/passenger_cargo.php" class="btn btn-';
		if($expl[0]=='passenger_cargo') echo 'warning'; else echo 'link';
		echo'"><h3>'.$PassengerCargo.'</h3></a>';
	}
	else
	{
		echo'<a href="'.$home_url.LANG.'/poisk-transporta-nayti-svobodnyiy-transport-poisk-poputnogo-transporta-577.php" class="btn btn-';
		if($expl[0]=='poisk-transporta-nayti-svobodnyiy-transport-poisk-poputnogo-transporta-577') echo 'warning'; else echo 'link';
		echo'"><h3>'.$AutoTransport.'</h3></a>';
		
		echo'<a href="'.$home_url.LANG.'/sea_transport.php" class="btn btn-';
		if($expl[0]=='sea_transport') echo 'warning'; else echo 'link';
		echo'"><h3>'.$SeaTransport.'</h3></a>';
		
		echo'<a href="'.$home_url.LANG.'/train_transport.php" class="btn btn-';
		if($expl[0]=='train_transport') echo 'warning'; else echo 'link';
		echo'"><h3>'.$TrainTransport.'</h3></a>';
		
		echo'<a href="'.$home_url.LANG.'/plain_transport.php" class="btn btn-';
		if($expl[0]=='plain_transport') echo 'warning'; else echo 'link';
		echo'"><h3>'.$PlainTransport.'</h3></a>';
		
		echo'<a href="'.$home_url.LANG.'/post_transport.php" class="btn btn-';
		if($expl[0]=='post_transport') echo 'warning'; else echo 'link';
		echo'"><h3>'.$PostTransport.'</h3></a>';
		
		echo'<a href="'.$home_url.LANG.'/passenger_transport.php" class="btn btn-';
		if($expl[0]=='passenger_transport') echo 'warning'; else echo 'link';
		echo'"><h3>'.$PassengerTransport.'</h3></a>';
	}
	echo'
	<p style="margin-top:2em;"><a href="#" data-toggle="modal" data-target="#AddCargo" class="btn btn-info">'.$AddCargo.'</a> <a href="#" data-toggle="modal" data-target="#AddTransport" class="btn btn-info">'.$AddTransport.'</a></p>
	<p style="margin-top:1em;">'.$Find.'</p>
	</div>
	</font>
	</div>';
}
function Slider()
{
	global $CONNECTION;
	global $home_url;
	
	$expl = explode('/',URL);
	$expl = explode('.php',$expl[1]);
	
	$BrijaPages = array('poisk-transporta-nayti-svobodnyiy-transport-poisk-poputnogo-transporta-577','sea_transport','train_transport','plain_transport','passenger_transport','post_transport','prosmotr-gruzov-nayti-gruz-poisk-poputnyih-gruzov-predlozheniya-gruzov-888','sea_cargo','train_cargo','plain_cargo','passenger_cargo','post_cargo');
	
	if (in_array($expl[0],$BrijaPages)) {if(!isset($_GET['topic'])) echo '<div id="marginTop" style="margin-top:60px"></div>'; Birja(0); return 0;}
	if ($expl[0]=='forum') {if(!isset($_GET['topic'])) echo '<div id="marginTop" style="margin-top:60px"></div>';return 0;}
	if (ID=='homepage' or ID=='ro') echo '<div class="ttl" style="margin-top:0.5em;margin-bttom:1.5em">Заказ международных перевозок</div>';
	else echo '<div class="ttl" style="margin-top:70px;margin-bottom:-1em;">Заказ международных перевозок</div>';
	$getSlider = mysqli_query($CONNECTION,"SELECT * FROM `".DB_PREFIX."truckIcons` LIMIT 6");
	if (mysqli_num_rows($getSlider)>0)
	{
		echo '<div id="carousel-example-captions"  class="carousel slide" data-ride="carousel" style="text-align:center"> <ol id="carousel" class="carousel-indicators" style="display:none"> ';
		for($i=0;$i<mysqli_num_rows($getSlider);$i++)
		{
			if ($i<6) echo'<li data-target="#carousel-example-captions" data-slide-to="'.$i.'" class="active"></li>';
			else echo '<li data-target="#carousel-example-captions" data-slide-to="'.$i.'" class=""></li>';
		}
		echo'</ol> 
   <div id="carousel-inner" class="carousel-inner" role="listbox">';
	$k=0;
		$Slider = mysqli_fetch_array($getSlider);
		do
		{
			echo' <div class="item';
			if ($k<6) echo' active';
			echo'" style="background-image:url('.htmlspecialchars_decode($Slider['Image']).');background-size:cover;    background-position: center;" onclick='."'".'$(location).attr("href", "'.Lng(htmlspecialchars_decode($Slider['truckIconLink'])).'")'."'".'><div class="carousel-caption" style="padding-top:0px;padding-left:2px;text-align:left">';
			echo $Slider['truckIconName'];
			echo'</div> </div> ';
			$k++;
		}
		while($Slider = mysqli_fetch_array($getSlider));
		echo '</div> <a id="nxt" class="right carousel-control" href="#carousel-example-captions" role="button" data-slide="next"> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> </div>';
		print_r("<script>
		if (parseInt($('html').width())<=767)
		{
			plus = 1;
			$('#carousel li').removeClass('active');
			$('#carousel-inner div').removeClass('active');
			$('#carousel li:eq(0)').addClass('active');
			$('#carousel-inner div.item:eq(0)').addClass('active');
		}
		if (parseInt($('html').width())>=768&&parseInt($('html').width())<1024)
		{
			plus = 2;
			$('#carousel li').removeClass('active');
			$('#carousel-inner div').removeClass('active');
			$('#carousel li:eq(0)').addClass('active');
			$('#carousel-inner div.item:eq(0)').addClass('active');
			$('#carousel li:eq(1)').addClass('active');
			$('#carousel-inner div.item:eq(1)').addClass('active');
		}
		if (parseInt($('html').width())>=1024&&parseInt($('html').width())<1360)
		{
			plus = 4;
			$('#carousel li').removeClass('active');
			$('#carousel-inner div').removeClass('active');	
			for(k=0;k<=3;k++)
			{
					console.log(k);
					$('#carousel li:eq('+k+')').addClass('active');
					$('#carousel-inner div.item:eq('+k+')').addClass('active').delay(1000);
			}
		}
		if (parseInt($('html').width())>=1360)
		{
			plus = 6;
			$('#nxt').css('display','none');
		}
			$('a.right').on('click', function () {
			number = parseInt(count($('#carousel').html().split('<li ')))-1;
			Active = parseInt($('#carousel .active').attr('data-slide-to'));
			if (plus==1){
				//console.log(Active);
				$('#carousel li').removeClass('active');
				$('#carousel-inner div').removeClass('active');
				$('#carousel li:eq('+Active+')').addClass('active');
				$('#carousel-inner div.item:eq('+Active+')').addClass('active').delay(1000);
				return 0;
			}
			Active+=plus;
			$('#carousel li').removeClass('active');
			$('#carousel-inner div').removeClass('active');
			if (Active>=number) Active = 0;
			for(k=Active;k<=(number-1)&&k<=(Active+plus-1);k++)
			{
					console.log(k);
					$('#carousel li:eq('+k+')').addClass('active');
					$('#carousel-inner div.item:eq('+k+')').addClass('active').delay(1000);
			}
			});
	</script>");
	}
}

function getMenu($menuTypeId)
{
	global $CONNECTION;
	global $home_url;

	$getType = mysqli_query($CONNECTION,"SELECT `Show`,`Class` FROM `".DB_PREFIX."menutypes` WHERE `menuTypeId`='{$menuTypeId}'");
	$Type = mysqli_fetch_array($getType);
	$Show = $Type['Show'];
	$sqlAllParent = "SELECT DISTINCT `Parent`,`menuName`,`menuId` FROM `".DB_PREFIX."menu` WHERE `menuTypeId`='{$menuTypeId}' AND `langAbb`='".LANG."' AND `Active`='1' GROUP BY `Parent` ORDER BY `Parent`";
	$sqlAllParentRu = "SELECT DISTINCT `Parent`,`menuName`,`menuId` FROM `".DB_PREFIX."menu` WHERE `menuTypeId`='{$menuTypeId}' AND `langAbb`='ru' AND `Active`='1' GROUP BY `Parent` ORDER BY `Parent`";
	$getAllParent = mysqli_query($CONNECTION,$sqlAllParent);
	
	if (mysqli_num_rows($getAllParent)>0)
	{
		$u=0;
		$MENU = '';
		$AllParent = mysqli_fetch_array($getAllParent);
		do
		{
			if ($Show=='list')
			{
				$MENU.= '<li class="has-sub"><a href=# class="list-group-item"><span>'.getFunctions(htmlspecialchars_decode($AllParent['menuName'])).'</span></a><ul>';
				$sqlAllItems = "SELECT `menuName`,`URL` FROM `".DB_PREFIX."menu` WHERE `menuTypeId`='{$menuTypeId}' AND `langAbb`='".LANG."' AND `Active`='1' AND `Parent`='".$AllParent['Parent']."' ORDER BY `Order`";
				$sqlAllItemsRu = "SELECT `menuName`,`URL` FROM `".DB_PREFIX."menu` WHERE `menuTypeId`='{$menuTypeId}' AND `langAbb`='ru' AND `Active`='1' AND `Parent`='".$AllParent['Parent']."' ORDER BY `Order`";
				$getAllItems = mysqli_query($CONNECTION,$sqlAllItems);
				if (LANG!=='ru')
				{
					$getAllItemsRu = mysqli_query($CONNECTION,$sqlAllItemsRu);
					if (mysqli_num_rows($getAllItems)!==mysqli_num_rows($getAllItemsRu)) $getAllItems = $getAllItemsRu;
				}
				if(mysqli_num_rows($getAllItems)>0)
				  {
					 $allItems = mysqli_fetch_array($getAllItems);
					 do
					 {
					if ($allItems['menuName']!==$AllParent['menuName']) $MENU.="<li><a class='list-group-item' href='".Lng(htmlspecialchars_decode($allItems['URL']))."'>".getFunctions(htmlspecialchars_decode($allItems['menuName']))."</a></li>\n";
					 }
					 while($allItems = mysqli_fetch_array($getAllItems));
				  }
			  	$MENU.= '</ul></li>';

			}
			if (($Show=='dropdown'&&$AllParent['menuId']<100) or($Show=='dropdown'&&$AllParent['menuId']>255) )
			{
				$MENU.=' <li class="dropdown">
				         <a class="';
			  if (!empty($Type['Class'])) $MENU.= 'btn btn-'.$Type['Class'].' ';
			  $MENU.='dropdown-toggle" data-toggle="dropdown" href="#" id="themes" aria-expanded="false">'.getFunctions(htmlspecialchars_decode($AllParent['menuName'])).' <span class="caret"></span></a>
             <ul class="dropdown-menu" aria-labelledby="themes">';
			  $sqlAllItems = "SELECT `menuName`,`URL` FROM `".DB_PREFIX."menu` WHERE `menuTypeId`='{$menuTypeId}' AND `langAbb`='".LANG."' AND `Active`='1' AND `Parent`='".$AllParent['Parent']."' ORDER BY `Order`";
	  //echo $sqlAllItems.'<br>';
		  $getAllItems = mysqli_query($CONNECTION,$sqlAllItems);
			$sqlAllItemsRu = "SELECT `menuName`,`URL` FROM `".DB_PREFIX."menu` WHERE `menuTypeId`='{$menuTypeId}' AND `langAbb`='ru' AND `Active`='1' AND `Parent`='".$AllParent['Parent']."' ORDER BY `Order`";
				$getAllItems = mysqli_query($CONNECTION,$sqlAllItems);
			  if(mysqli_num_rows($getAllItems)>0)
			  {
				 
				 				  
				 $allItems = mysqli_fetch_array($getAllItems);
				 do
				 {
					  if ($AllParent['Parent']==96 &&$u==0) $MENU.='<li><strong style="padding-left:5px;">Грузы</strong></li>';
				  	  if ($AllParent['Parent']==96 &&$u==7) $MENU.='<li style="border-top:1px solid #ecf0f1"><strong style="padding-left:5px;">Транспорт</strong></li>';
					  if ($AllParent['Parent']==96 &&$u==13) $MENU.='<li style="padding:0px;margin:0px"><hr></li>';
					  $u++;
					if ($allItems['menuName']!==$AllParent['menuName']) 
					{
						if (URL==htmlspecialchars_decode($allItems['URL']))
						{
							$MENU.="<li><a href='".$home_url.htmlspecialchars_decode($allItems['URL'])."' style='text-shadow:none;background-color:#1a242f;color:#fff;'><h5 style='margin-top:3px;margin-bottom:3px;'>".getFunctions(htmlspecialchars_decode($allItems['menuName']))."</h5></a></li>\n";
							define('PARENT',htmlspecialchars_decode($AllParent['menuName']));
							}
						else $MENU.="<li><a href='".$home_url.htmlspecialchars_decode($allItems['URL'])."' style='text-shadow:none'><h5 style='margin-top:3px;margin-bottom:3px;'>".getFunctions(htmlspecialchars_decode($allItems['menuName']))."</h5></a></li>\n";
					}
				 }
				 while($allItems = mysqli_fetch_array($getAllItems));
			  }
		 $MENU.='</ul>
           </li>';
		}
		}
		while($AllParent = mysqli_fetch_array($getAllParent));
		echo $MENU;
	}
}

function getTruckIcons()
{
	global $home_url;
	global $CONNECTION;

	$result='';
	$getAllIcons = mysqli_query($CONNECTION,"SELECT * FROM `".DB_PREFIX."truckIcons`");
	if (mysqli_num_rows($getAllIcons)>0)
	{
		$truckIcons = mysqli_fetch_array($getAllIcons);
		do
		{
			$result.='<a href="'.$home_url.$truckIcons['truckIconLink'].'"><div style="background-image:url('.$truckIcons['Image'].');"><font>';
			if (mb_strlen($truckIcons['truckIconName'],"UTF-8")>20)
			$result.=mb_substr($truckIcons['truckIconName'],0,20,"UTF-8").'...';
			else $result.=$truckIcons['truckIconName'];
			$result.='</font></div></a>'."\n";
		}
		while($truckIcons = mysqli_fetch_array($getAllIcons));
	}
	return $result;
}

function is_valid_data($data) {
		if (isset($data) and $data != "0" and $data != "") { return true;
		} else {return false;}
	}
	function is_valid_telefone($city, $code, $number) {
		$city = str_replace("-", "", $city);
		$code = str_replace("-", "", $code);
		$number = str_replace("-", "", $number);
		$join = "+".$city."-".$code."-".$number;
		return (preg_match('/^[+]\d{1,3}-\d{1,4}-\d{1,15}/', $join));
	}
	function isValidEmail ($email, $strict)
	{
		 if ( !strict ) $email = preg_replace('/^\s+|\s+$/g', '', $email);
	 return (preg_match('/^([a-z0-9_\-]+\.)*[a-z0-9_\-]+@([a-z0-9][a-z0-9\-]*[a-z0-9]\.)+[a-z]{2,4}$/i', $email));
	}

function CountryFrom($Country)
{
	if (mb_substr($Country,mb_strlen($Country,"UTF-8")-1,1,"UTF-8")=='я') $Country = mb_substr($Country,0,mb_strlen($Country,"UTF-8")-1,"UTF-8").'и';
	if (mb_substr($Country,mb_strlen($Country,"UTF-8")-1,1,"UTF-8")=='й') $Country = mb_substr($Country,0,mb_strlen($Country,"UTF-8")-1,"UTF-8").'я';
	if (mb_substr($Country,mb_strlen($Country,"UTF-8")-1,1,"UTF-8")=='а') $Country = mb_substr($Country,0,mb_strlen($Country,"UTF-8")-1,"UTF-8").'ы';
	if (mb_substr($Country,mb_strlen($Country,"UTF-8")-1,1,"UTF-8")=='р') $Country = mb_substr($Country,0,mb_strlen($Country,"UTF-8")-1,"UTF-8").'а';
	if (mb_substr($Country,mb_strlen($Country,"UTF-8")-1,1,"UTF-8")=='н') $Country.='а';
	return $Country;
}
function CountryTo($Country)
{
	if (mb_substr($Country,mb_strlen($Country,"UTF-8")-1,1,"UTF-8")=='я') $Country = mb_substr($Country,0,mb_strlen($Country,"UTF-8")-1,"UTF-8").'ю';
	if (mb_substr($Country,mb_strlen($Country,"UTF-8")-1,1,"UTF-8")=='а') $Country = mb_substr($Country,0,mb_strlen($Country,"UTF-8")-1,"UTF-8").'у';
	return $Country;
}

function send_mail($Host,$Port,$Secure,$Auth,$TitleMail,$Username,$Password,$ToName,$ToEmail,$Charset,$Subject,$Body)
{
	require_once dirname(__FILE__).'/../PHPMailer.php';
	$mail = new PHPMailer;
	$mail->isSMTP();
	$mail->SMTPDebug = 0;
	$mail->Debugoutput = 'html';
	$mail->Host = $Host;
	$mail->Port = $Port;
	$mail->SMTPSecure = $Secure;
	$mail->SMTPAuth = $Auth;
	$mail->Username = $Username;
	$mail->Password = $Password;
	$mail->setFrom($Username, $TitleMail);
	$mail->addReplyTo($Username,$TitleMail);
	$mail->addAddress($ToEmail,$ToName);
	$mail->CharSet = $Charset;
	$mail->Subject = $Subject;
	$body = mb_convert_encoding($Body, mb_detect_encoding($Body), 'UTF-8');
	$mail->msgHTML($body);
	$mail->AltBody = 'This is a plain-text message body';
	if (!$mail->send())
	$result = "Mailer Error: " . $mail->ErrorInfo.' '.$mymail;
	else $result = true;
	return $result;

}

?>