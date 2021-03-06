<?php
/**
 *
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Multishipping\Controller\Checkout\Address;

class EditShippingPost extends \Magento\Multishipping\Controller\Checkout\Address
{
    /**
     * @return void
     */
    public function executeInternal()
    {
        if ($addressId = $this->getRequest()->getParam('id')) {
            $this->_objectManager->create(
                'Magento\Multishipping\Model\Checkout\Type\Multishipping'
            )->updateQuoteCustomerShippingAddress(
                $addressId
            );
        }
        $this->_redirect('*/checkout/shipping');
    }
}
