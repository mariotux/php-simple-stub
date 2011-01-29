<?php
class SimpleStubTest extends PHPUnit_Framework_TestCase {

    private $stub;

    public function setUp(){
        $this->stub = new SimpleStub(new DemoClass());
    }

    /**
     * @test
     */
    public function invokeOriginalMethod(){
        $this->assertEquals(5,$this->stub->demo());
    }
    /**
     * @test
     */
    public function invokeOneMethodInStub(){
        $this->stub->method('demo')->returnValue(4);
        $this->assertEquals(4,$this->stub->demo());
    }
    /**
     * @test
     */
    public function invokeMoreMethodsInStub(){
        $this->stub->method('demo1')->returnValue(3);
        $this->stub->method('demo2')->returnValue(4);
        $this->assertEquals(3,$this->stub->demo1());
        $this->assertEquals(4,$this->stub->demo2());
    }
    /**
     * @test
     * @expectedException Exception
     */
    public function whenMethodNotExists(){
        $this->stub->oneMethod();
    }


}

?>
