<?php
/**
 *
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Paypal\Controller\Billing\Agreement;

class Index extends \Magento\Paypal\Controller\Billing\Agreement
{
    /**
     * View billing agreements
     *
     * @return void
     */
    public function executeInternal()
    {
        $this->_view->loadLayout();
        $this->_view->getPage()->getConfig()->getTitle()->prepend(__('Billing Agreements'));
        $this->_view->renderLayout();
    }
}
