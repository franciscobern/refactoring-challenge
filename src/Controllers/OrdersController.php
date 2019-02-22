<?php

namespace App\Controllers;

use App\Enun\PaymentMethods;
use App\Models\Order;

class OrdersController
{
    /**
     * @param ProductsController $product
     * @return string
     */
    public function addProduct(ProductsController $product)
    {
        /** @var Order $newOrder */
        $newOrder = Order::create();

        /** @var OrderItemsController $orderItem */
        $orderItem = new OrderItemsController($newOrder->getId(), $product);

        return $orderItem->createOrderItem();
    }

    /**
     * @param Order $order
     * @param $paymentMethod
     * @return string
     */
    public function endPurchase(Order $order, $paymentMethod)
    {
        $paymentMethod = [
            'type' => PaymentMethods::PAYMENT_METHOD_CREDIT_CARD,
            'options' => [
                'credit_card_number' => '1234-5678-9012-3456',
            ]
        ];

        $payment = new PaymentsController($order, $paymentMethod);
        $pay = $payment->pay();

        if($pay) {
            $shipping = new ShipmentsController($order);
            $shipping->checkPaymentAndSendCustomer($pay);
        }

        return 'We were unable to complete your request';
    }

}
