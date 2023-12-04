<?php

use Joomla\CMS\Layout\LayoutHelper;
use BPExtensions\Module\BPIcon\Site\Helper\BPIconHelper;

defined('_JEXEC') or die;

/**
 * @package     ${package}
 *
 * @copyright   Copyright (C) ${build.year} ${copyrights},  All rights reserved.
 * @license     ${license.name}; see ${license.url}
 * @author      ${author.name}
 */

/**
 * @var object $icon
 * @var string $column_class
 */
$layoutAttr = [
    'src' => $icon->icon_image,
    'alt' => $icon->title,
    'class' => 'modbpicon__image',
];

$url = BPIconHelper::getUrl($icon);
?>
<div class="modbpicon__item d-flex flex-column justify-content-start align-items-center <?php echo $column_class ?>" <?php echo BPIconHelper::getLinkingAttribute($icon) ?>>
    <div class="row">
        <div class="col-6 col-md-8">
            <?php if( $icon->title!=='' ): ?>
                <strong class="modbpicon__title mt-3"><?php echo $icon->title ?></strong>
            <?php endif ?>

            <?php if( trim($icon->text)!=='' ): ?>
                <div class="modbpicon__text mt-3"><?php echo $icon->text ?></div>
            <?php endif ?>

            <?php if( $icon->linking_type==='button' && $url!=='' ): ?>
                <a href="<?php echo $url ?>" class="btn btn-outline-primary">
                    <?php echo BPIconHelper::getButtonText($icon) ?>
                </a>
            <?php endif ?>
        </div>
        <div class="col-6 col-md-4">
            <?php echo LayoutHelper::render('joomla.html.image', array_merge($layoutAttr, ['loading' => 'lazy'])); ?>
        </div>
    </div>

</div>
