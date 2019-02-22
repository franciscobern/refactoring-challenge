<?php

namespace App\Models;


class Payment
{
    public static function create(array $payment)
    {
        return "Payment created";
    }

    public function getLastPaymentCreated()
    {
        return "Last payment created";
    }
}
