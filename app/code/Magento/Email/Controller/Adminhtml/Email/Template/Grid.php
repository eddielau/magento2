<?php
/**
 *
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Email\Controller\Adminhtml\Email\Template;

class Grid extends \Magento\Email\Controller\Adminhtml\Email\Template
{
    /**
     * Grid action
     *
     * @return void
     */
    public function executeInternal()
    {
        $this->_view->loadLayout(false);
        $this->_view->renderLayout();
    }
}
