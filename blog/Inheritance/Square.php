<?php
require ('Shape.php');
class Square extends Shape
{
public $length = 4;

public function getArea()
{
return pow($this->length, 2);
}
}