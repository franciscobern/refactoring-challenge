<?php

namespace App\Controllers;

use App\Enun\PaymentMethods;
use App\Enun\PaymentStatus;
use App\Models\Order;
use App\Models\Payment;

class PaymentsController
{
    /**
     * @var Order
     */
    private $modelOrder;
    /**
     * @var array
     */
    private $paymentMethod;

    /**
     * PaymentsController constructor.
     * @param Order $modelOrder
     * @param array $paymentMethod
     */
    public function __construct(Order $modelOrder, array $paymentMethod)
    {
        $this->modelOrder = $modelOrder;
        $this->paymentMethod = $paymentMethod;
    }

    /**
     * @return bool
     */
    public function pay():bool
    {
        $payment = [];
        if($this->paymentMethod['type'] == PaymentMethods::PAYMENT_METHOD_CREDIT_CARD){
            $payment = $this->validateCreditCardPayment($this->paymentMethod);
        }

        // Here we can include other methods to validate the other payments

        Payment::create($payment);

        if($payment['payment_status'] == PaymentStatus::PAYMENT_OK){
            return true;
        }

        return false;
    }

    /**
     * @param array $methodPayment
     * @return array
     */
    protected function validateCreditCardPayment(array $methodPayment): array
    {
        // In this method we receive the data from the credit card.
        // At this point we can access a payment gateway and validate the
        // data received and already receive the response from the
        // administrator if the payment could be completed.

        $response = ['status' => 2];

        $data['order_id'] = $this->modelOrder->getId();

        $data['payment_status'] = $response['status'] == PaymentStatus::PAYMENT_OK ? PaymentStatus::PAYMENT_OK : PaymentStatus::PAYMENT_FAIL;

        return $data;
    }
}
