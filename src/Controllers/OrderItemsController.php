<?php

namespace App\Controllers;

use App\Models\Order;

class OrderItemsController
{
    /**
     * @var Order
     */
    private $modelOrder;
    /**
     * @var ProductsController
     */
    private $product;

    /**
     * OrderItemsController constructor.
     * @param Order $modelOrder
     * @param ProductsController $product
     */
    public function __construct(Order $modelOrder, ProductsController $product)
    {
        $this->modelOrder = $modelOrder;
        $this->product = $product;
    }

    /**
     * @return string
     *
     * This method in a normal stream would save
     * the data in the database and return a message
     * to the view indicating the end of the process.
     */
    public function createOrderItem()
    {
        // Create OrderItem with values get from Order
        // $data = $this->product;
        // $data['order_id'] = $this->modelOrder->getId();

        return "Message return!";
    }


}
