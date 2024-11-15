<?php
class Shape
{
    protected $length;
    protected $width;

    public function __construct($length, $width)
    {
        $this->length = $length;
        $this->width = $width;
    }
}

class MyRectangle extends Shape
{
    public function __construct($length,$width)
    {
        parent::__construct($length,$width);
    }

    public function getPerimeter()
    {
        return (2* ($this->length + $this->width));
    }  
    public function getArea()
    {
        return $this->length * $this->width;
    }
    public function getInfo()
    {
          echo "The perimeter is: " . $this->getPerimeter(). "<br>";
          echo "The area is: " . $this->getArea(). "<br>";
    }

}

$obj = new MyRectangle(20,10);
$obj-> getInfo();
echo $obj->getPerimeter();

