<?php

/**
 * @package     ${package}
 *
 * @copyright   Copyright (C) ${build.year} ${copyrights},  All rights reserved.
 * @license     ${license.name}; see ${license.url}
 * @author      ${author.name}
 */
defined('_JEXEC') or die;

/**
 * Helper for mod_bpicon
 */
class ModBPIconHelper
{
	private static $articles = array();

	public static function getURL($params)
	{

		$url_type = $params->get('url_type', 'none');

		if ($url_type === 'article') {

			require_once JPATH_ROOT.'/components/com_content/helpers/route.php';

			$article = self::getArticle($params->get('url_article'));

			return ContentHelperRoute::getArticleRoute($article->id, $article->catid);
		} elseif ($url_type === 'menu') {

			return 'index.php?Itemid='.$params->get('url_menu');
		} elseif ($url_type == 'external') {

			return $params->get('url_external', '');
		}

		return '';
	}

	public static function getArticle($id)
	{


		// Article was cached before
		if (isset(self::$articles[(int) $id])) {

			// return cached article
			return self::$articles[(int) $id];

			// New article so find it
		} else {

			// Article table object
			$article = JTable::getInstance('Content');

			if ($article->load($id)) {

				// Get article data
				$data = $article->getProperties();

				// cache it
				self::$articles[(int) $id] = \Joomla\Utilities\ArrayHelper::toObject($data);

				// Return data
				return self::$articles[(int) $id];
			} else {

				null;
			}
		}
	}
}