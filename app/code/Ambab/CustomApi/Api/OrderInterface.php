<?php
namespace Ambab\CustomApi\Api;
interface OrderInterface
{
    /**
     * GET for Post api
     * @param string $value
     * @return string
     */
    public function OrderDetails($orderId);
}