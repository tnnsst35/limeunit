<?php
require_once dirname(__FILE__) . '/../lime_unit.php';

class ArrayTest extends LimeUnit
{
    protected $class = __CLASS__;
    protected $plan  = 3;

    private $testCount = 0;

    private $num;
    private $ary;

    public function setUp()
    {
        $this->num = 0;
        $this->ary = array();
    }

    public function tearDown()
    {
        $this->testCount++;
    }

    public function testNumber100()
    {
        $this->num    = 100;
        $this->ary[0] = 100;
        $this->ok($this->num === $this->ary[0]);
    }

    public function testNumber1000()
    {
        $this->num    = 1000;
        $this->ary[0] = 1000;
        $this->ok($this->num === $this->ary[0]);
    }

    public function testNumber10000()
    {
        $this->num    = 10000;
        $this->ary[0] = 10000;
        $this->ok($this->num === $this->ary[0]);
    }
}

$test = new ArrayTest();
$test->run();
