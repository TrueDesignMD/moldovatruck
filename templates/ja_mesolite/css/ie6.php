<?php header("Content-type: text/css"); ?>
/*------------------------------------------------------------------------
# JA Iolite 1.0 - May, 2008
# ------------------------------------------------------------------------
# Copyright (C) 2004-2008 J.O.O.M Solutions Co., Ltd. All Rights Reserved.
# @license - Copyrighted Commercial Software
# Author: J.O.O.M Solutions Co., Ltd
# Websites:  http://www.joomlart.com -  http://www.joomlancers.com
-------------------------------------------------------------------------*/
<?php
$template_path = dirname( dirname( $_SERVER['REQUEST_URI'] ) );
?>

#ja-search{
 	filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $template_path;?>/images/icon-search.png', sizingMethod='crop');
 	background-image: none;
}

#moveObj{
 	filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $template_path;?>/images/circle.png', sizingMethod='crop');
 	background-image: none;
}

#ja-slidebar ul li a {
 	filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $template_path;?>/images/circle.png', sizingMethod='crop');
 	background-image: none;
}

#ja-slidebar a.active {
 	filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $template_path;?>/images/circle-active.png', sizingMethod='crop');
 	background-image: none;
}

.ja-slideshow-mask {
 	filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $template_path;?>/images/topsl-mask.png', sizingMethod='crop');
 	background-image: none;
}
