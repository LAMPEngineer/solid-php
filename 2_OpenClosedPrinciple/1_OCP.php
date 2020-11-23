<?php
/**
 * Open-Closed Principle (OCP)
 *
 * This principle declares that - 
 * "software entities should be open for extension, but closed for modification." 
 * 
 * In more simple words it can be described as - 
 * all classes, functions, etc. should be designed so that to change their  behavior, we do not need to modify their source code. 
 * 
 */



/**
 * OCP Violation:
 * 
 * Lets consider example of GasStation the modality to put gas in vehicles. 
 * The code works but the problem will apear if we would like to put gas for another type of vehicle, 
 * for that we should update "putGasInVehicle()" method, that violate OPC 
 * 
 */

class GasStation
{
	public function putGasInVehicle(Vehicle $vehicle)
	{
		if ($vehicle->getType() == 1) 
			$this->putGasInCar($vehicle);
		elseif ($vehicle->getType() == 2) 
			$this->putGasInMotorcycle($vehicle);		

	}


	public function putGasInCar(Car $car)
	{
		$car->setTank(50);
	}


	public function putGasInMotorcycle(Motorcycle $motorcycle)
	{
		$motorcycle->setTank(20);
	}

}


class Vehicle
{
	protected $type;
	protected $tank;

	public function getType(){return $this->type;}
	public function setTank($tank){$this->tank = $tank;}

}


class Car extends Vehicle
{
	protected $type = 1;
}


class Motorcycle extends Vehicle
{
	protected $type = 2;
}




/**
 * Refactor:
 *
 * 
 * Refactoring using Abstract class - We could inherit from abstract Vehicle class and override abstrat method putGasIn in each child classes. 
 * 
 */

class GasStation
{
	public function putGasInVehicle(Vehicle $vehicle)
	{
		$vehicle->putGasIn();
	}
}


abstract class Vehicle 
{
	protected $tank;
	public function setTank($tank){$this->tank = $tank;}
	abstract public function putGasIn();
}


class Car extends Vehicle
{
	public function putGasIn(){$this->setTank(50);}
}


class Motorcycle extends Vehicle
{
	public function putGasIn(){$this->setTank(20);}
}

