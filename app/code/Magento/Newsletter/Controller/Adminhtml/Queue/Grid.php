<?php
/**
 *
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Newsletter\Controller\Adminhtml\Queue;

class Grid extends \Magento\Newsletter\Controller\Adminhtml\Queue
{
    /**
     * Queue list Ajax action
     *
     * @return void
     */
    public function executeInternal()
    {
        $this->_view->loadLayout(false);
        $this->_view->renderLayout();
    }
}
