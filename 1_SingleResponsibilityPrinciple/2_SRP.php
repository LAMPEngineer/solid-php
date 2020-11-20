<?php
/**
 * Single-Responsibility Principle (SRP)
 *
 * The principle states that the only responsibility - 
 * A class should have one, and only one, reason to change.
 * 
 */


/**
 * SRP Violation:
 * 
 * Lets consider we have a Modem class encapsulating the concept of a modem and its functionalities.
 * 
 */

class Modem
{
    public function dial($pno){/*...*/}
    public function hangup(){/*...*/}
    
    public function send($c){/*...*/}
    public function receive(){/*...*/}
    
}



/**
 * This class has 2 responsabilities: 
 * 
 * a. Data chanel & 
 * b. Connection
 *
 * This class is mixing business logic with presentation which is against 
 * the Single Responsibility Principle (SRP) rule. 
 *  
 */




/**
 * Refactor:
 *
 * 
 * To solve this problem, separating presentation from business logic
 * gives great advantages in our design's flexibility:
 * 
 */
interface DataChannel
{
    public function send($c);

    public function receive();
}


interface Connection
{
    public function dial($pno);

    public function hangup();
}


class Modem implements DataChannel, Connection
{
    public function send($c){/*...*/}

    public function receive(){/*...*/}

    public function dial(){/*...*/}

    public function hangup(){/*...*/}

}


