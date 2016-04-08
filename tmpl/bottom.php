<?php defined('_JEXEC') or die;
/**
* @package		mod_bpicon
* @date			2016-02-11
* @author		Artur Stępień
* @email		artur.stepien@bestproject.pl
* @copyright	(C) 20016 Bestproject. All rights reserved.
* @license		GNU General Public License version 3 or later; see http://www.gnu.org/licenses/gpl-3.0.txt
* @link			http://www.bestproject.pl
 */

JFactory::getDocument()->addStyleSheet('https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css');

// Route URL if this is internal URL
$url = substr($url,0,9)=='index.php' ? JRoute::_($url) : $url;

?>
<div class="modbpicon<?php echo $moduleclass_sfx ?> text-center">
		
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
		
	<div class="icon">
		<?php if( $url_type!='none' AND in_array($linking_type, array('all','icon')) ): ?>
			<a href="<?php echo $url ?>"><i class="fa fa-<?php echo $icon ?>" style="font-size:<?php echo $iconsize ?>px"></i></a>
		<?php else: ?>
			<i class="fa fa-<?php echo $icon ?>" style="font-size:<?php echo $iconsize ?>px"></i>
		<?php endif ?>
	</div>

</div>