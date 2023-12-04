<?php

use Joomla\CMS\Helper\ModuleHelper;
use Joomla\CMS\WebAsset\WebAssetManager;

defined('_JEXEC') or die;

/**
 * @package     ${package}
 *
 * @copyright   Copyright (C) ${build.year} ${copyrights},  All rights reserved.
 * @license     ${license.name}; see ${license.url}
 * @author      ${author.name}
 */

/**
 * @var array $items
 * @var Joomla\Registry\Registry $params
 * @var WebAssetManager $wa
 */
$column_width = floor(12/(int)$params->get('columns',1));
$has_columns = count($items)>1;
$column_class = '';
if( $has_columns ) {
    $column_class.= " col-12 col-lg-$column_width";
}

$wa->useScript('jquery');
$wa->addInlineScript('
    (function($){
        $(function(){
            $("[data-bpicon-url]").each(function(idx, el){
                var $el = $(el);
                var url = $el.attr("data-bpicon-url");
                $el.on("focus.bpicon",function(){
                    $(document).on("keypress.bpicon",function(e) {
                        if(e.which == 13) {
                            window.location.href=url;
                        }
                    });
                })
                .on("blur",function(){
                    $(document).unbind("keypress.bpicon");
                })
                .click(function(){
                    window.location.href=url;
                })
            });
        })
    })(jQuery);
');
$wa->addInlineStyle('[data-bpicon-url] {cursor:pointer;}')

?>
<div class="modbpicon<?php echo $moduleclass_sfx ?>">
    <?php if( $has_columns ): ?>
    <div class="row">
    <?php endif ?>

    <?php foreach( $items as $icon ): ?>
        <?php require ModuleHelper::getLayoutPath('mod_bpicon', $params->get('layout', 'default') . "_{$icon->layout}"); ?>
    <?php endforeach ?>

    <?php if( $has_columns ): ?>
    </div>
    <?php endif ?>
</div>
