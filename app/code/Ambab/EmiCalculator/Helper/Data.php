<?php
namespace Ambab\EmiCalculator\Helper;

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
   const MODULE_ENABLE = "module/general/enable";

   public function getDefaultConfig($path)
   {
       return $this->scopeConfig->getValue($path, \Magento\Framework\App\Config\ScopeConfigInterface::SCOPE_TYPE_DEFAULT);
   }

   public function isModuleEnabled()
   {
       return (bool) $this->getDefaultConfig(self::MODULE_ENABLE);
   }


   
 }