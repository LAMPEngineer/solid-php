<?php
/**
 * Dependency Inversion Principle (DIP)
 *
 *  This principle declares that - 
 *  Dependencies within the system are built on the basis of abstractions. 
 *  The top-level modules do not depend on the lower-level modules. 
 *  Abstractions should not depend on details. Details must depend on 
 *  abstractions." 
 *  
 *  This definition can be shortened - "the dependencies 
 *  should be based on abstractions, not details.
 * 
 */


/**
 * ISP Violation:
 * 
 */
class Worker
{
	public function work(){/*...*/}
}


class Manager
{
	
	public function manage()
	{
		$worker = new Worker();
		$worker->work();
	}
}


/**
 * Issue here is the Manager class depends on the Worker class and it's tight coupled -
 * should not create object within a class.
 * 
 */



/**
 * Refactor: 
 * 
 * In order to get rid of the dependence on a particular class, 
 * we need to make sure that Manager depends on abstraction, 
 * ie. From the IWorker interface.
 *
 * 
 */


interface IWorker
{
	public function work();
}


class Worker implements IWorker
{
	public function work(){/*...*/}
}


class SuperWorker implements IWorker
{
	public function work(){/*...*/}
}


class Manager
{
	private $worker;

	public function setWorker(IWorker $worker)
	{
		$this->worker = $worker;
	}

	public function manage()
	{
		$this->worker->work();
	}
}
