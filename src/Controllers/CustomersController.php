<?php

namespace App\Controllers;


class CustomersController
{
    public function getName(): string
    {
        return "Francisco";
    }

    public function getAddress(): string
    {
        return "Rua Benvenuto Cellini";
    }

    public function getCepCode(): int
    {
        return 05541240;
    }
}
