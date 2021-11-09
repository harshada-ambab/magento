<?php
namespace Ambab\EmiCalculator\Block\Catalog\Product;
class Price extends \Magento\Framework\View\Element\Template
{
    /**
     * @var \Magento\Framework\Registry
     */
    protected $registry;

    /**
     * @var \Magento\Framework\Pricing\Helper\Data
     */
    protected $priceHelper;

    /**
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Magento\Framework\Registry                      $registry
     * @param \Magento\Framework\Pricing\Helper\Data           $priceHelper
     * @param array                                            $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Pricing\Helper\Data $priceHelper,
        array $data = []
    ) {
        $this->registry = $registry;
        $this->priceHelper = $priceHelper;
        parent::__construct($context, $data);
    }

    public function getProductPrice()
    {
        $product = $this->registry->registry('current_product');
        return $product->getFinalPrice();
    }

   
}