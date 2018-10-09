<?php

defined('_JEXEC') or die;

/**
 * @package     ${package}
 *
 * @copyright   Copyright (C) ${build.year} ${copyrights},  All rights reserved.
 * @license     ${license.name}; see ${license.url}
 * @author      ${author.name}
 */

// Add icon font from FontAwesome CDN
$provider = $params->get('provider','fontawesomne');
if( $provider==='fontawesomne' ){
	JFactory::getDocument()->addStyleSheet('https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css');

// Add icon font from Google Fonts CDN
} elseif( $provider==='materialicons' ) {
	JFactory::getDocument()->addStyleSheet('https://fonts.googleapis.com/icon?family=Material+Icons');
}

?>
<?php if( $url_type!='none' AND in_array($linking_type, array('all','icon')) ): ?>
	<a href="<?php echo $url ?>">
<?php endif ?>

	<?php if( $provider==='fontawesome' ): ?>
		<i class="fa fa-<?php echo $icon_fontawesome ?>" style="font-size:<?php echo $iconsize ?>px;line-height:<?php echo $iconsize ?>px"></i>
	<?php elseif( $provider==='materialicons' ): ?>
		<i class="material-icons" style="font-size:<?php echo $iconsize ?>px;line-height:<?php echo $iconsize ?>px"><?php echo $icon_materialicons ?></i>
	<?php else: ?>
		<img src="<?php echo $icon_image ?>" alt="<?php echo $module->title ?>" />
	<?php endif ?>

<?php if( $url_type!='none' AND in_array($linking_type, array('all','icon')) ): ?>
	</a>
<?php endif;
