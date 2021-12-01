<?php
namespace Ambab\CustomApi\Model\Api;
use Psr\Log\LoggerInterface;
class OrderDetails
{
    protected $orderRepository;
    protected $_storeManager; 
    protected $productrepository;
    
    public function __construct(
        \Magento\Sales\Api\OrderRepositoryInterface $orderRepository,
        \Magento\Store\Model\StoreManagerInterface $storemanager,
        \Magento\Catalog\Api\ProductRepositoryInterface $productrepository
    ){
        $this->orderRepository = $orderRepository;
        $this->_storeManager =  $storemanager;
        $this->productrepository = $productrepository;
    }
     
    public function OrderDetails($orderId) 
    {
      // $orderId = 2;
       $order = $this->orderRepository->get($orderId);
       $orderItems = $order->getAllItems();
       echo $orderNo = $order->getEntityId();

       $itemsData = array();
        foreach ($orderItems as $item) {
            if ($item->getData()) {

                $store = $this->_storeManager->getStore();
                $product = $this->productrepository->getById($item->getProductId());
                $productImageUrl = $store->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA) . 'catalog/product' .$product->getImage();

                $itemsData[] = [
                    'Name' => $item->getName(),
                    'Image Url' =>$productImageUrl,
                    'Qty' => $item->getQtyOrdered(),
                    'Price' => $item->getOriginalPrice(),
                    'Special Price' => $item->getPrice(),
                    'Discount' =>$item->getDiscountAmount(),
                    

                ];                   

                $shippingInformation[] =[
                    'Payment Method' =>$order->getPayment()->getMethod(),
                    'Shipping Method'=>$order->getShippingMethod(),
                    'Shipping Charges'=>$order->getShippingAmount(),
                    
                ];
                $shippingAddress[]=[
                    'Shipping Address'=>$order->getShippingAddress()->getData(),
                ];

            $response = [$itemsData,$shippingInformation,$shippingAddress];
            } 
            else{
                $response = ['success' => false, 'message' => $e->getMessage()];
                $this->logger->info($e->getMessage());
            }
        } 
        return $response;


}
   
}