LimeUnit
========

ver.1.0.0

PHPの単体テストライブラリであるLimeをベースに、
テスト前後の共通処理やテストの自動実行を実現し、テスト同士が疎結合で、テストを見通しよくすることを目指したライブラリです。

本ライブラリで利用しているLime
------------------------------
ver.1.0.9
http://trac.symfony-project.org/browser/tools/lime/tags

Limeでテストを書く場合
----------------------

    <?php

    $lime = new lime_test(3);

    $testCount = 0;

    $t->diag('testNumber100');

    $num = 0;
    $ary = array();

    $num   = 100;
    $ary[] = $num;
    $lime->ok($num === $ary[0]);

    $testCount++;

    $t->diag('testNumber1000');

    $num = 0;
    $ary = array();

    $num   = 1000;
    $ary[] = $num;
    $lime->ok($num === $ary[0]);

    $testCount++;

    $t->diag('testNumber10000');

    $num = 0;
    $ary = array();

    $num   = 10000;
    $ary[] = $num;
    $lime->ok($num === $ary[0]);

    $testCount++;

LimeUnitで書く場合
------------------

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

更新
----

2012/07/11 ver1.0.0 リリース