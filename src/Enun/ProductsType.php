<?php

namespace App\Enun;

use MyCLabs\Enum\Enum;

class ProductsType extends Enum
{
    const BOOK = 'book';
    const PHYSICAL = 'physical';
    const SERVICE = 'service';
    const DIGITAL_MIDIA = 'digital_midia';
}
