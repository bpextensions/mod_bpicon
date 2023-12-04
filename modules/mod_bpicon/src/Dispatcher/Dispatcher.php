<?php

/**
 * @package     ${package}
 * @subpackage  ${subpackage}
 *
 * @copyright   Copyright (C) ${build.year} ${copyrights}, All rights reserved.
 * @license     ${license.name}; see ${license.url}
 */

namespace BPExtensions\Module\BPIcon\Site\Dispatcher;

use BPExtensions\Module\BPIcon\Site\Helper\BPIconHelper;
use Joomla\CMS\Application\CMSApplication;
use Joomla\CMS\Dispatcher\AbstractModuleDispatcher;
use Joomla\CMS\Helper\HelperFactoryAwareInterface;
use Joomla\CMS\Helper\HelperFactoryAwareTrait;

// phpcs:disable PSR1.Files.SideEffects
\defined('_JEXEC') or die;
// phpcs:enable PSR1.Files.SideEffects

/**
 * Dispatcher class for mod_articles_news
 */
class Dispatcher extends AbstractModuleDispatcher implements HelperFactoryAwareInterface
{
    use HelperFactoryAwareTrait;

    /**
     * Returns the layout data.
     *
     * @return  array
     */
    protected function getLayoutData(): array
    {
        $data = parent::getLayoutData();

        /**
         * @var BPIconHelper $helper
         * @var CMSApplication $app
         */
        $helper = $this->getHelperFactory()->getHelper('BPIconHelper');
        $app = $this->getApplication();

        $data['items'] = $helper->getItems($data['params']);
        $data['moduleclass_sfx'] = htmlspecialchars($data['params']->get('moduleclass_sfx'));
        $data['wa'] = $app->getDocument()->getWebAssetManager();

        return $data;
    }
}
