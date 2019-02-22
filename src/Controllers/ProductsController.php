<?php

namespace App\Controllers;

class ProductsController
{

    private $id;
    /**
     * @var string
     */
    private $name;
    private $type;

    /**
     * @var float
     */
    private $value;

    /**
     * Product constructor.
     * @param string $name
     * @param string $type
     * @param float $value
     */
    public function __construct(string $name, string $type, float $value)
    {
        $this->name = $name;
        $this->type = $type;
        $this->value = $value;
    }

    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    public function getValue(): float
    {
        return $this->value;
    }
}
