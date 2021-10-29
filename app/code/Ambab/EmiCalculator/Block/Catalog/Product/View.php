<?php
// namespace Ambab\EmiCalc\Block\Catalog\Product;
// use Magento\Catalog\Block\Product\Context;
// use Magento\Catalog\Block\Product\AbstractProduct;

// class View extends AbstractProduct
// {
//     public function __construct(Context $context, array $data)
//     {
//         parent::__construct($context, $data);
//     }
// }

namespace Ambab\EmiCalculator\Block\Catalog\Product;
use Magento\Catalog\Block\Product\Context;
use Magento\Catalog\Block\Product\AbstractProduct;

class View extends \Magento\Framework\View\Element\Template
{
   /**
     * @var \Ambab\EmiCalc\Helper\Data
   */
   protected $_dataHelper;

 /**
 * @param \Magento\Framework\View\Element\Template\Context $context
 * @param \Ambab\EmiCalculator\Helper\Data $dataHelper
 * @param array $data
 */
public function __construct(
    \Magento\Framework\View\Element\Template\Context $context,
    \Ambab\EmiCalculator\Helper\Data $dataHelper,
    array $data = []
) {
    $this->_dataHelper = $dataHelper;
    parent::__construct($context, $data);
}

public function canShowBlock()
{
    return $this->_dataHelper->isModuleEnabled();
}
}