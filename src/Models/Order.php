<?php

namespace App\Models;

class Order
{
    public static function create()
    {
        return "Created order";
    }

    /**
     * @param Order $id
     * @return string|Order
     */
    public function byId(Order $id): Order
    {
        return "Order with $id send.";
    }

    /**
     * @param OrderItem $orderItemId
     * @return string|OrderItem
     */
    public function byIdOrderItem(OrderItem $orderItemId): OrderItem
    {
        return "Order Item with $orderItemId.";
    }

    /**
     * @return string|Order
     */
    public function getId(): Order
    {
        return "Get ID order";
    }

    /**
     * @return string|Customer
     */
    public function getCustomer(): Customer
    {
        return "Infos for customer";
    }
}
