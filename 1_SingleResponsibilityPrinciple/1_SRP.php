<?php

/**
 * Single-Responsibility Principle (SRP)
 *
 * 
 * The principle states that the only responsibility - 
 * "one single duty should be imposed on each object." 
 * In other words - a specific class must solve a specific task - no more and no less. 
 * 
 */


/**
 * SRP Violation:
 * 
 * Lets consider the following description of the class to represent the order in the online store: 
 */
class Order
{

    public function calculateTotalSum(){/*...*/}
    public function getItems(){/*...*/}
    public function getItemCount(){/*...*/}
    public function addItem($item){/*...*/}
    public function deleteItem($item){/*...*/}


    public function printOrder(){/*...*/}
    public function showOrder(){/*...*/}


    public function load(){/*...*/}
    public function save(){/*...*/}
    public function update(){/*...*/}
    public function delete(){/*...*/}

}


/**
 *  This class performs the operation for 3 different types of tasks: 
 *  
 *  a. work with every order (calculateTotalSum, getItems, getItemsCount, addItem, deleteItem)
 *  b. display order (printOrder, showOrder) 
 *  c. data handeling (load, save, update, delete). 
 *
 *
 * This leads to the case that if we want to make changes to the print job, 
 * or storage techniques, we change the order class itself, which may lead to inoperability. 
 *   
 * 
 */



/**
 * Refactor:
 *
 * 
 * To solve this problem is the division of the class into 3 classes, each of 
 * which will be to carry out their task:
 * 
 */
class Order
{
    public function calculateTotalSum(){/*...*/}
    public function getItems(){/*...*/}
    public function getItemCount(){/*...*/}
    public function addItem($item){/*...*/}
    public function deleteItem($item){/*...*/}
}


class OrderRepository
{
    public function load($orderID){/*...*/}
    public function save($order){/*...*/}
    public function update($order){/*...*/}
    public function delete($order){/*...*/}
}


class OrderViewer
{
    public function printOrder($order){/*...*/}
    public function showOrder($order){/*...*/}
}


/**
 * Now each class is engaged in the specific task and for each class there is only one reason to change it.
 */
