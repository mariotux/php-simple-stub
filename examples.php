<?php
require_once __DIR__.'/SimpleStub.class.php';

/**
 * 1.- When we not have class created
 */

$anyObject = new SimpleStub();
$result = $anyObject->methodExampleName()->returnValue(4); // return = 4

/**
 * 2.- When we have a class, but we haven't implemented the method
 */
class MyClass1{

}
$myObject = new SimpleStub(new MyClass1());
$result = $myObject->methodExampleName()->returnValue(4); // return = 4

/**
 * 3.- When we have implemented the method
 */
class MyClass2{
    public function returnNumberSix(){
        return 6;
    }
}
$myObject = new SimpleStub(new MyClass2());
$result = $myObject->returnNumberSix()->returnValue(4); // return = 6

/**
 * 4.- When we have parameters for our method
 */
class MyClass3{
    public function sum($a,$b){
        return $a+$b;
    }
}
$myObject = new SimpleStub(new MyClass3());
$result = $myObject->sum(4,3)->returnValue(4); //return = 7
?>