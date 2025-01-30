<?php

/**
 * @package     ${package}
 * @subpackage  ${subpackage}
 *
 * @copyright   Copyright (C) ${build.year} ${copyrights},  All rights reserved.
 * @license     ${license.name}; see ${license.url}
 * @author      ${author.name}
 */

namespace BPExtensions\Module\BPIcon\Site\Helper;

use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;
use Joomla\Component\Content\Site\Helper\RouteHelper;
use Joomla\Registry\Registry;
use Joomla\Utilities\ArrayHelper;

defined('_JEXEC') or die;

/**
 * Helper for BP Icon module.
 */
class BPIconHelper
{

    /**
     * Get list of icons to display.
     *
     * @param   Registry  $params
     *
     * @return array
     */
    public static function getItems(Registry $params): array
    {
        return (array)$params->get('items', []);
    }

    /**
     * Get button text.
     *
     * @param   object  $item
     *
     * @return string
     */
    public static function getButtonText(object $item): string
    {
        if ($item->button_title !== '') {
            return $item->button_title;
        }

        return Text::_('MOD_BPICON_READMORE');
    }

    /**
     * Get item linking attributes if item has linking set to all.
     *
     * @param   object  $item
     *
     * @return string
     */
    public static function getLinkingAttribute(object $item): string
    {
        $attributes = '';
        $url = self::getUrl($item);
        if ($item->linking_type === 'all' && $url!=='') {
            $attributes = ArrayHelper::toString([
                'role' => 'link',
                'tabindex' => '0',
                'data-bpicon-url' => $url,
            ]);
        }

        return $attributes;
    }

    public static function getUrl(object $item): string
    {
        $url = '';

        if( $item->url_type==='external' && $item->url_external!=='' ) {
            $url = $item->url_external;
        }

        if( $item->url_type==='article' && $item->url_article>0 ) {
            return Route::_(RouteHelper::getArticleRoute($item->url_article));
        }

        if( $item->url_type==='menu' && $item->url_menu>0 ) {
            return Route::_('index.php?Itemid='.$item->url_menu);
        }

        return $url;
    }

}