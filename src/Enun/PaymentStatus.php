<?php

namespace App\Enun;


use MyCLabs\Enum\Enum;

class PaymentStatus extends Enum
{
    const PAYMENT_FAIL = 1;
    const PAYMENT_OK = 2;
}
