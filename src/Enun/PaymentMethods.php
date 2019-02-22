<?php

namespace App\Enun;


use MyCLabs\Enum\Enum;

class PaymentMethods extends Enum
{
    const PAYMENT_METHOD_CREDIT_CARD = 'credit card';
    const PAYMENT_METHOD_MONEY = 'money';
    const PAYMENT_METHOD_TICKET = 'ticket';
}
