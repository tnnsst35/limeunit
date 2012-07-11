<?php
require_once dirname(__FILE__) . '/../lime_unit.php';

class SampleTest extends LimeUnit
{
    protected $class = __CLASS__;
    protected $plan  = 2;

    public function setUp()
    {
        $this->info('setUp');
    }

    public function tearDown()
    {
        $this->info('tearDown');
    }

    public function testSamle1()
    {
        $this->ok(1 === 1, 'Sample1 OK');
    }

    public function testSamle2()
    {
        $this->ok(1 === 2, 'Sample2 OK');
    }
}

$test = new SampleTest();
$test->run();
