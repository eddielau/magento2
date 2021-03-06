<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

// @codingStandardsIgnoreFile

namespace Magento\Backend\Test\Unit\Controller\Adminhtml\Dashboard;

/**
 * Test for \Magento\Backend\Controller\Adminhtml\Dashboard\ProductViewed
 */
class ProductsViewedTest extends AbstractTestCase
{
    public function testExecute()
    {
        $this->assertExecuteInternal(
            'Magento\Backend\Controller\Adminhtml\Dashboard\ProductsViewed',
            'Magento\Backend\Block\Dashboard\Tab\Products\Viewed'
        );
    }
}
