<?php

namespace Ambab\EmiCalculator\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Json\Helper\Data as JsonHelper;
use Magento\Framework\Controller\Result\JsonFactory;

class Content extends Action
{
    /**
     * @var JsonHelper
     */
    protected $jsonHelper;

    /**
     * @var JsonFactory
     */
    protected $jsonFactory;

    /**
     * Index constructor.
     *
     * @param Context $context
     * @param JsonHelper $jsonHelper
     * @param JsonFactory $jsonFactory
     */
    public function __construct(
        Context $context,
        JsonHelper $jsonHelper,
        JsonFactory $jsonFactory
    ) {
        $this->jsonHelper = $jsonHelper;
        $this->jsonFactory = $jsonFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $httpBadRequestCode = 400;
        //Check isXmlHttpRequest
        if (!$this->getRequest()->isXmlHttpRequest()) {
            return $this->jsonFactory->create()->setHttpResponseCode($httpBadRequestCode);
        }

        $html = $this->_view->getLayout()->createBlock(
            'Ambab\EmiCalculator\Block\Catalog\Product\View'
        )->toHtml();
        /** @var \Magento\Framework\Controller\Result\Json $resultJson */
        $resultJson = $this->jsonFactory->create();
        return $resultJson->setData(['html' => $html]);
    }
}