<?php
require('Shape.php');

class Triangle extends Shape
{
public $base = 3;
public $height = 4;

public function getArea()
{
return 0.5 * $this->base * $this->height;
}

}