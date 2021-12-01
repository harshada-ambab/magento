<?php
namespace Ambab\EmiCalculator\Block;

use Magento\Framework\View\Element\Template;
use Magento\Backend\Block\Template\Context;
use Magento\CatalogInventory\Model\Stock\StockItemRepository;
use Magento\InventorySalesAdminUi\Model\GetSalableQuantityDataBySku; 
 
class Product extends Template
{    
    protected $stockItemRepository;
    protected $_registry;
    private $getSalableQuantityDataBySku;
        
    public function __construct(
        \Magento\Framework\Registry $registry,
        Context $context,  
        GetSalableQuantityDataBySku $getSalableQuantityDataBySku,      
        StockItemRepository $stockItemRepository,
        array $data = []
    )
    {
        $this->stockItemRepository = $stockItemRepository;
        $this->_registry = $registry;
        $this->getSalableQuantityDataBySku = $getSalableQuantityDataBySku;
        parent::__construct($context);
    }
    
    public function getStockItem($productId)
    {
        return $this->stockItemRepository->get($productId);
    }

    public function getCurrentProduct()
    {        
        return $this->_registry->registry('current_product');
    }   
    
    public function getProductSalableQty($sku)
    {
        $salable = $this->getSalableQuantityDataBySku->execute($sku);
        return $salable;
    }

    public function getGrandTotal(){
        return $this->grandTotal->getQuote()->getGrandTotal();
    }


    public function getMinimumValue(){
        return $this->scopeConfigInterface->getValue('sales/minimum_order/amount');
    }
}