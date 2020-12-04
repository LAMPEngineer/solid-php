<?php
/**
 * Interface Segregation Principle (ISP)
 *
 * This principle declares that - 
 * 
 * Many specialized interfaces are better than one universal.
 * 
 */

/**
 * ISP Violation:
 *
 * Let's take an example with an online store. 
 * Suppose our products can have a promotional code, a discount, they have some price, condition, etc. 
 * If this is clothing, then for it it is determined from what material is made, color and size.  
 *
 * 
 */

interface IItem
{
	public function applyDiscount($discount);
	public function applyPromocode($promocode);

	public function setColor($color);
	public function setSize($size);

	public function setCondition($condition);
	public function setPrice($price);
}

/**
 * This interface involves too many methods. And what if 
 * our class of goods can not have discounts or promotional codes
 *
 * or for it there is no sence in installing the material from which it is made(i.e. books)
 *
 * 
 */





/**
 * Refactor: 
 * 
 * Splitting the IItem interface into several interfaces.
 *
 * In order not to implement methods that are not used in each class, 
 * it is better to break the interface into several smaller ones. 
 *
 * 
 */

interface IItem
{
	public function setCondition($condition);
	public function setPrice($price);
}


interface IClothes
{
	public function setColor($color);
	public function setSize($size);
	public function setMaterial($material);
}


interface IDiscountable
{
	public function applyDiscount($discount);
	public function applyPromocode($promocode);
}



class Book implements IItem, IDiscountable
{
	public function setCondition($condition){/*...*/}
	public function setPrice($price){/*...*/}
	public function applyDiscount($discount){/*...*/}
	public function applyPromocode($promocode){/*...*/}

}



class KidsClothes implements IItem, IClothes
{
	public function setCondition($condition){/*...*/}
	public function setPrice($price){/*...*/}
	public function setColor($color){/*...*/}
	public function setSize($size){/*...*/}
	public function setMaterial($material){/*...*/}
}
