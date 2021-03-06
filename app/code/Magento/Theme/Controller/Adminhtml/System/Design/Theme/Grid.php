<?php
/**
 *
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Theme\Controller\Adminhtml\System\Design\Theme;

class Grid extends \Magento\Theme\Controller\Adminhtml\System\Design\Theme
{
    /**
     * Grid ajax action
     *
     * @return void
     */
    public function executeInternal()
    {
        $this->_view->loadLayout(false);
        $this->_view->renderLayout();
    }
}
