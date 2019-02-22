<?php

namespace App\Models;


class OrderItem
{
    /**
     * @param Order $order
     * @return string|OrderItem[]
     */
    public function getItems(Order $order): OrderItem
    {
        return "All items for Order";
    }
}
