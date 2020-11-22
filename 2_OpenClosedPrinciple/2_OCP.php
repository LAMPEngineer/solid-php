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
 * Lets consider example of OrderRepository class. 
 * 
 */

class OrderRepository
{
    public function load($orderID)
    {
        $pdo = new PDO(
            $this->config->getDsn(),
            $this->config->getDBUser(),
            $this->config->getDBPassword()
        );
        $statement = $pdo->prepare("SELECT * FROM `orders` WHERE id=:id");
        $statement->execute(array(":id" => $orderID));
        return $query->fetchObject("Order");
    }
    
    public function save($order){/*...*/}
    public function update($order){/*...*/}
    public function delete($order){/*...*/}
}


/**
 * We have a repository database, for example: MySQL. But suddenly we want to
 * load our data on orders via API of the third-party server. 
 *
 *
 * Option 1:
 * We could directly modify class methods OrderRepository, but this does not comply principle of Open-Close principle.
 *
 *
 * Option 2:
 * We could inherit from OrderRepository class and override all methods. 
 * But this solution is also not the best because when we add a method to OrderRepository we have to add similar methods to all his successors. 
 *
 * 
 * Option 3:
 * It is better to establishe interface IOderSource, which will be implemented by the respective classes MySQLOrderSource, ApiOrderSource and so on. 
 *
 * 
 */



/**
 * Refactor:
 *
 * 
 * To solve this problem, - (Interface impletation) - IOrderSource interface and its implementation and use
 *  
 */
class OrderRepository
{
	private $source;

	public function setSource(IOrderSource $source)
	{
		$this->source = $source;
	}

	public function load($orderID)
	{
		return $this->source->load($orderID);
	}

	public function save($order){/*...*/}
	public function update($order){/*...*/}

}



interface IOrderSource
{
	public function load($orderID);
	public function save($order);
	public function update($order);
	public function delete($order);
}



class MySQLOrderSource implements IOrderSource
{
	public function load($orderID);
	public function save($order){/*...*/};
	public function update($order){/*...*/};
	public function delete($order){/*...*/};
}


class ApiOrderSource implements IOrderSource
{
	public function load($orderID);
	public function save($order){/*...*/};
	public function update($order){/*...*/};
	public function delete($order){/*...*/};

}

/**
 * Now we could change behavior of the source and accordingly to OrderRepository class, 
 * setting right class implementations IOSource, without changing OrderRepository class.
 */