<?php
/**
 *
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\CheckoutAgreements\Controller\Adminhtml\Agreement;

class NewAction extends \Magento\CheckoutAgreements\Controller\Adminhtml\Agreement
{
    /**
     * @return void
     * @codeCoverageIgnore
     */
    public function executeInternal()
    {
        $this->_forward('edit');
    }
}
