<?php
/**
 *
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Contact\Controller\Index;

class Index extends \Magento\Contact\Controller\Index
{
    /**
     * Show Contact Us page
     *
     * @return void
     */
    public function executeInternal()
    {
        $this->_view->loadLayout();
        $this->_view->renderLayout();
    }
}
