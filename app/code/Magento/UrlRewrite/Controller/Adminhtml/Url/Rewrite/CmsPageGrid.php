<?php
/**
 *
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\UrlRewrite\Controller\Adminhtml\Url\Rewrite;

class CmsPageGrid extends \Magento\UrlRewrite\Controller\Adminhtml\Url\Rewrite
{
    /**
     * Ajax CMS pages grid action
     *
     * @return void
     */
    public function executeInternal()
    {
        $this->getResponse()->setBody(
            $this->_view->getLayout()->createBlock('Magento\UrlRewrite\Block\Cms\Page\Grid')->toHtml()
        );
    }
}
