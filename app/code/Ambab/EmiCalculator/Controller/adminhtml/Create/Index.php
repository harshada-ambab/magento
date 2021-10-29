<?php
namespace Ambab\EmiCalculator\Controller\adminhtml\Create;
class Index extends \Magento\Backend\App\Action
{
         protected $resultPageFactory = false;      
         public function __construct(
                 \Magento\Backend\App\Action\Context $context,
                 \Magento\Framework\View\Result\PageFactory $resultPageFactory
         ) {
                 parent::__construct($context);
                 $this->resultPageFactory = $resultPageFactory;
         } 
         public function execute()
         {
                 $resultPage = $this->resultPageFactory->create();
                 $resultPage->setActiveMenu('Bss_CreateMenuBackend::menu');
                 $resultPage->getConfig()->getTitle()->prepend(__('Bank Details'));
                 return $resultPage;
         }
         protected function _isAllowed()
         {
                 return $this->_authorization->isAllowed('Bss_CreateMenuBackend::menu');
         }
}