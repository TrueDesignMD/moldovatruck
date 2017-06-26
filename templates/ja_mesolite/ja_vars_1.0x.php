<?php
/**
 * @copyright	Copyright (C) 2005 - 2007 Open Source Matters. All rights reserved.
 * @license		GNU/GPL, see LICENSE.php
 * Joomla! is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * See COPYRIGHT.php for copyright notices and details.
 */

// no direct access
defined( '_VALID_MOS' ) or die( 'Restricted access' );
include_once (dirname(__FILE__).DS.'/ja_templatetools_1.0x.php');

# BEGIN: TEMPLATE CONFIGURATIONS ##########
####################################
$_params = new mosParameters('');
# Joomla menutype used in main navigation
# Show user tools
$_params->set(JA_TOOL_USER, 3); //0: disabled; 2: enabled 
 
# LOGO TYPE DESCRIPTION
$_params->set('logoType','image');//image: Image; text: Text
#LOGO TEXT DESCRIPTION
$_params->set('logoText','JA Mesolite');
#SLOGAN DESCRIPTION
$_params->set('sloganText','2nd July JA Template');
#FONT SIZE DESCRIPTION
$_params->set('ja_font','3');//value from 1 to 6
#TEMPLATE WIDTH DESCRIPTION
$_params->set('ja_screen','wide');//narrow:Narrow Screen; wide:Wide Screen;
#Color variation to use
$_params->set('ja_color','green');//default:Default; red:Red; green:Green;
#MENU TYPE DESCRIPTION
$_params->set('menutype','mainmenu');
#MENU'S TYPE
$_params->set('ja_menu','css');//split:Split Menu; css:CSS Menu; moo:Moo Menu;
#Show/hide default frontpage 
$_params->set('showFrontPage',1); //0:No; 1:Yes;
#Show Screen tools" description="Display screen tools
//$_params->set('usertool_color','0');//0:No; 4:Yes;


# END: TEMPLATE CONFIGURATIONS ##########

$tmpTools = new JA_Tools('ja_mesolite', $_params);

$tmpTools->setScreenSizes (array('wide','narrow'));
$tmpTools->setColorThemes (array('default','red','red'));
$tmpTools->setBodyThemes (array('dark','light'));
$tmpTools->setLayouts (array('leftlayout','rightlayout'));
# Auto Collapse Divs Functions ##########
$ja_col = mosCountModules( 'left' ) || mosCssountModules( 'right' );
if ( $ja_col ) {
	$divid = '';
} else {
	$divid = '-f';
}

//Main navigation
$ja_menutype = $tmpTools->getParam(JA_TOOL_MENU);
include_once( dirname(__FILE__).DS.'ja_menus/Base.class.php' );
$japarams = JA_Base::createParameterObject('');
$japarams->set( 'menutype', $tmpTools->getParam('menutype', 'mainmenu') );
$japarams->set( 'menu_images_align', 'left' );
$japarams->set( 'menupath', $tmpTools->templateurl() .'/ja_menus');
$japarams->set('menu_title', 0);
switch ($ja_menutype) {
	case 'css':
		$menu = "CSSmenu";
		include_once( dirname(__FILE__).DS.'ja_menus/'.$menu.'.class.php' );
		break;
	case 'moo':
		$menu = "Moomenu";
		include_once( dirname(__FILE__).DS.'ja_menus/'.$menu.'.class.php' );
		break;
	case 'split':
	default:
    $japarams->set('menu_title', 0);
		$menu = "Splitmenu";
		include_once( dirname(__FILE__).DS.'ja_menus/'.$menu.'.class.php' );
		break;
}
$menuclass = "JA_$menu";
$jamenu = new $menuclass ($japarams);

$hasSubnav = false;
if ($jamenu->hasSubMenu (1) && $jamenu->showSeparatedSub ) 
	$hasSubnav = true;
//End for main navigation

?>
