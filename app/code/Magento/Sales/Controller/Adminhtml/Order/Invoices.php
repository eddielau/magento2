<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Sales\Controller\Adminhtml\Order;

class Invoices extends \Magento\Sales\Controller\Adminhtml\Order
{
    /**
     * Generate invoices grid for ajax request
     *
     * @return \Magento\Framework\View\Result\Layout
     */
    public function executeInternal()
    {
        $this->_initOrder();
        $resultLayout = $this->resultLayoutFactory->create();
        return $resultLayout;
    }
}
