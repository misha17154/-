<?php

class Technique
{
    public $articul;

    public $technic;

    public $typeTechnic;

    public $color;

    public $brand;

    public $header;

    public $description;

    public $cost;

    function __construct($articul,$technic, $typeTechnic, $color, $brand, $header, $description, $cost)
    {
        $this->articul = $articul;
        $this->technic = $technic;
        $this->typeTechnic = $typeTechnic;
        $this->color = $color;
        $this->brand = $brand;
        $this->header = $header;
        $this->description = $description;
        $this->cost = $cost;
    }
}
