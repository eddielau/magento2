<?php
/**
 *
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Catalog\Controller\Adminhtml\Category;

class Move extends \Magento\Catalog\Controller\Adminhtml\Category
{
    /**
     * @var \Magento\Framework\Controller\Result\JsonFactory
     */
    protected $resultJsonFactory;

    /**
     * @var \Magento\Framework\View\LayoutFactory
     */
    protected $layoutFactory;

    /**
     * @var \Psr\Log\LoggerInterface $logger
     */
    protected $logger;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory
     * @param \Magento\Framework\View\LayoutFactory $layoutFactory,
     * @param \Psr\Log\LoggerInterface $logger,
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory,
        \Magento\Framework\View\LayoutFactory $layoutFactory,
        \Psr\Log\LoggerInterface $logger
    ) {
        parent::__construct($context);
        $this->resultJsonFactory = $resultJsonFactory;
        $this->layoutFactory = $layoutFactory;
        $this->logger = $logger;
    }

    /**
     * Move category action
     *
     * @return \Magento\Framework\Controller\Result\Raw
     */
    public function executeInternal()
    {
        /**
         * New parent category identifier
         */
        $parentNodeId = $this->getRequest()->getPost('pid', false);
        /**
         * Category id after which we have put our category
         */
        $prevNodeId = $this->getRequest()->getPost('aid', false);

        /** @var $block \Magento\Framework\View\Element\Messages */
        $block = $this->layoutFactory->create()->getMessagesBlock();
        $error = false;

        try {
            $category = $this->_initCategory();
            if ($category === false) {
                throw new \Exception(__('Category is not available for requested store.'));
            }
            $category->move($parentNodeId, $prevNodeId);
        } catch (\Magento\Framework\Exception\LocalizedException $e) {
            $error = true;
            $this->messageManager->addError(__('There was a category move error.'));
        } catch (\Magento\Framework\Exception\AlreadyExistsException $e) {
            $error = true;
            $this->messageManager->addError(__('There was a category move error. %1', $e->getMessage()));
        } catch (\Exception $e) {
            $error = true;
            $this->messageManager->addError(__('There was a category move error.'));
            $this->logger->critical($e);
        }

        if (!$error) {
            $this->messageManager->addSuccess(__('You moved the category'));
        }

        $block->setMessages($this->messageManager->getMessages(true));
        $resultJson = $this->resultJsonFactory->create();

        return $resultJson->setData([
            'messages' => $block->getGroupedHtml(),
            'error' => $error
        ]);
    }
}
