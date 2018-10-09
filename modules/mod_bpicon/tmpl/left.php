<?php

defined('_JEXEC') or die;

/**
 * @package     ${package}
 *
 * @copyright   Copyright (C) ${build.year} ${copyrights},  All rights reserved.
 * @license     ${license.name}; see ${license.url}
 * @author      ${author.name}
 */

// Route URL if this is internal URL
$url = substr($url,0,9)=='index.php' ? JRoute::_($url) : $url;

?>
<div class="modbpicon<?php echo $moduleclass_sfx ?>">
	<div class="row">
		
		<div class="col-xs-4 text-center icon">
			<?php require JModuleHelper::getLayoutPath('mod_bpicon', 'icon'); ?>
		</div>
		
		<div class="col-xs-8">
			<?php if( $title!='' ): ?>
				<?php if( $url_type!='none' AND in_array($linking_type, array('all','title')) ): ?>
					<h4 class="title"><a href="<?php echo $url ?>"><?php echo $title ?></a></h4>
				<?php else: ?>
					<h4 class="title"><?php echo $title ?></h4>
				<?php endif ?>
			<?php endif ?>

			<?php if( $text!='' ): ?>
				<?php if( $url_type!='none' AND in_array($linking_type, array('all')) ): ?>
					<div class="text"><a href="<?php echo $url ?>"><?php echo strip_tags($text) ?></a></div>
				<?php else: ?>
					<div class="text"><?php echo $text ?></div>
				<?php endif ?>
			<?php endif ?>

			<?php if( $url_type!='none' AND in_array($linking_type, array('button')) ): ?>
				<a href="<?php echo $url ?>" class="btn btn-default"><?php echo JText::_($button_title) ?></a>
			<?php endif ?>

			<?php if( $url_type!='none' AND in_array($linking_type, array('anchor')) ): ?>
				<a href="<?php echo $url ?>"><?php echo JText::_($button_title) ?></a>
			<?php endif ?>
		</div>
	</div>
</div>
