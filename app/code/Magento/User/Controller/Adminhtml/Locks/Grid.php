<?php
/**
 *
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\User\Controller\Adminhtml\Locks;

/**
 * Locked users grid
 */
class Grid extends \Magento\User\Controller\Adminhtml\Locks
{
    /**
     * Render AJAX-grid only
     *
     * @return void
     */
    public function executeInternal()
    {
        $this->_view->loadLayout(false);
        $this->_view->renderLayout();
    }
}
