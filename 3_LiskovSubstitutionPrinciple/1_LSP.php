<?php
/**
 * Liskov Substitution Principle (LSP)
 *
 * This principle declares that - 
 * Derived classes must be substitutable for their base classes.
 * 
 * 
 */



/**
 * LSP Violation:
 *
 * Let's assume that the Rectangle object is used in the application. 
 * We extend the application and add the Square class. 
 * The square class is returned by a factory pattern, based on some conditions 
 * and we don't know the exect what type of object will be returned.
 * 
 */

class Rectangle
{
	protected $width;
	protected $height;

	//setters and getters...
	public function setWidth($width){$this->width = $width;}
	public function getWidth(){return $this->width;}

	public function setHeight($height){$this->height = $height;}
	public function getHeight(){return $this->height;}


	public function getArea()
	{
      return $this->height * $this->width;
	}

}

class Square extends Rectangle
{
	public function setWidth($width)
	{
		$this->width  = $width;
		$this->height = $width;
	}

	public function setHeight($height)
	{
		$this->height = $height;
		$this->width  = $height;
	}

}



/*$rectangle = new Rectangle();
$rectangle->setWidth(5);
$rectangle->setHeight(10);
echo "<br/>Area= ". $rectangle->getArea();*/

/*$square = new Square();
$square->setWidth(5);
$square->setHeight(10);
echo "<br/>Area= ". $square->getArea();*/








/**
 * Refactor:
 * 
 * we must make sure that new derived classes are extending the base classes without changing their behavior.
 * 
 */
class Shape
{
	protected $width;
	protected $height;

	//setters and getters...
	public function setWidth($width){$this->width = $width;}
	public function getWidth(){return $this->width;}

	public function setHeight($height){$this->height = $height;}
	public function getHeight(){return $this->height;}

	public function getArea()
	{
      return $this->height * $this->width;
	}

}

class Rectangle extends Shape
{


}


class Square extends Shape
{
	public function setWidth($width)
	{
		$this->width  = $width;
		$this->height = $width;
	}

	public function setHeight($height)
	{
		$this->height = $height;
		$this->width  = $height;
	}

}


class Area
{
	public function calculate(Shape $shape)
	{
		return $shape->getArea();
	}
}




// Rectangle object
$rectangle = new Rectangle();
$rectangle->setWidth(5);
$rectangle->setHeight(10);


//square object
$square = new Square();
$square->setWidth(10);
$square->setHeight(10);



$area = new Area();
echo "Rectangle area= ".$area->calculate($rectangle);
echo "<br/>Square area= ".$area->calculate($square);