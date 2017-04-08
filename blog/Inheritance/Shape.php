<?php

/**
 * Created by PhpStorm.
 * User: leelanarasimha
 * Date: 08/04/17
 * Time: 8:48 PM
 */

abstract class Shape
{

    public $color;
    public function __construct($color)
    {
        $this->color = $color;
    }

    public function getColor() {
        return $this->color;
    }

    public abstract function getArea();

}