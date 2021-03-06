<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\CatalogSearch\Model\Indexer\Fulltext\Plugin;

class Product extends AbstractPlugin
{
    /**
     * Reindex on product save
     *
     * @param \Magento\Catalog\Model\ResourceModel\Product $productResource
     * @param \Closure $proceed
     * @param \Magento\Framework\Model\AbstractModel $product
     * @return \Magento\Catalog\Model\ResourceModel\Product
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function aroundSave(
        \Magento\Catalog\Model\ResourceModel\Product $productResource,
        \Closure $proceed,
        \Magento\Framework\Model\AbstractModel $product
    ) {
        $result = $proceed($product);
        $this->reindexRow($product->getId());
        return $result;
    }

    /**
     * Reindex on product delete
     *
     * @param \Magento\Catalog\Model\ResourceModel\Product $productResource
     * @param \Closure $proceed
     * @param \Magento\Framework\Model\AbstractModel $product
     * @return \Magento\Catalog\Model\ResourceModel\Product
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function aroundDelete(
        \Magento\Catalog\Model\ResourceModel\Product $productResource,
        \Closure $proceed,
        \Magento\Framework\Model\AbstractModel $product
    ) {
        $result = $proceed($product);
        $this->reindexRow($product->getId());
        return $result;
    }
}
