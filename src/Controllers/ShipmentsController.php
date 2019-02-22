<?php

namespace App\Controllers;


use App\Enun\ProductsType;
use App\Models\Order;
use App\Models\OrderItem;

class ShipmentsController
{
    /**
     * @var Order
     */
    private $modelOrder;

    /**
     * ShipmentsController constructor.
     * @param Order $modelOrder
     */
    public function __construct(Order $modelOrder)
    {
        $this->modelOrder = $modelOrder;
    }

    public function checkPaymentAndSendCustomer(bool $payment)
    {
        if(!$payment) {
            return "Can not submit order before payment is finalized";
        }

        $modelOrderItems = new OrderItem();
        $items = $modelOrderItems->getItems($this->modelOrder);

        $firstProduct = reset($items)['type'];
        if($firstProduct == ProductsType::PHYSICAL) {
            $methodSendClient = $this->printLabel($this->modelOrder->getCustomer());
        } elseif ($firstProduct == ProductsType::SERVICE){
            $methodSendClient = $this->enableSignInAndSendEmail($this->modelOrder->getCustomer());
        } elseif ($firstProduct == ProductsType::BOOK) {
            $methodSendClient = $this->printLabelWithoutTax($this->modelOrder->getCustomer());
        } else {
            $methodSendClient = $this->sendEmailAndVoucher($this->modelOrder->getCustomer());
        }

        return $methodSendClient;
    }

    protected function printLabel(Customer $customer)
    {
        return "Print label and send to address";
    }

    protected function enableSignInAndSendEmail(Customer $customer)
    {
        return "Enable sign and send email for customer";
    }

    protected function printLabelWithoutTax(Customer $customer)
    {
        return "Print label and add notification: It is a tax-exempt item as provided in the Constitution Art. 150, VI, d";
    }

    protected function sendEmailAndVoucher(Customer $customer)
    {
        return "Send message for customer and Voucher U$10";
    }
}
