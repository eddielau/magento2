<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Sales\Controller\Adminhtml\Order;

class Index extends \Magento\Sales\Controller\Adminhtml\Order
{
    /**
     * Orders grid
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function executeInternal()
    {
        $resultPage = $this->_initAction();
        $resultPage->getConfig()->getTitle()->prepend(__('Orders'));
        return $resultPage;
    }
}
