<?php

defined('_JEXEC') or die;

/**
 * @package     ${package}
 *
 * @copyright   Copyright (C) ${build.year} ${copyrights},  All rights reserved.
 * @license     ${license.name}; see ${license.url}
 * @author      ${author.name}
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

$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));

require JModuleHelper::getLayoutPath('mod_bpicon', $params->get('layout', 'top'));
