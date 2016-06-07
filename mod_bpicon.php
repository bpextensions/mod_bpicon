<?php defined('_JEXEC') or die;
/**
* @package		mod_bpicon
* @date			2016-02-11
* @author		Artur Stępień
* @email		artur.stepien@bestproject.pl
* @copyright	(C) 2016 Bestproject. All rights reserved.
* @license		GNU General Public License version 3 or later; see http://www.gnu.org/licenses/gpl-3.0.txt
* @link			http://www.bestproject.pl
 */


// Include the syndicate functions only once
require_once __DIR__ . '/helper.php';

$type = trim($params->get('type','text'));
$icon_fontawesome = trim($params->get('icon_fontawesome','joomla'));
$icon_materialicons = trim($params->get('icon_materialdesign','local_florist'));
$icon_image = trim($params->get('icon_image','images/joomla_black.png'));
$iconsize = (int)$params->get('iconsize',64);
$title = trim($params->get('title',''));
$text = trim($params->get('text',''));
$article = trim($params->get('article',''));
$url_type = trim($params->get('url_type'));
$linking_type = trim($params->get('linking_type'));
$button_title = trim($params->get('button_title','MOD_BPICON_READMORE'));
$url = ModBPIconHelper::getURL($params);

if( $type=='article' AND $article = ModBPIconHelper::getArticle($article) ) {
	
	$title = $article->title;
	$text = $article->introtext;
	
} 

//$list = &ModBannersHelper::getList($params);
$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));

require JModuleHelper::getLayoutPath('mod_bpicon', $params->get('layout', 'top'));
