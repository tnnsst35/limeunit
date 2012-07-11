<?php
require_once dirname(__FILE__) . '/libs/lime.php';
/**
 * LimeUnit
 */
class LimeUnit
{
    private $lime;

    protected $class = __CLASS__; // 継承子クラスでも同様の記述が必要
    protected $plan  = null;      // lime_testの実行回数

    public function __construct()
    {
        $this->lime = new lime_test($this->plan, new lime_output_color());
    }

    public function __call($name, $args)
    {
      if (!method_exists($this->lime, $name)) {
        throw new Exception('FAILURE ' . $name . ' not found function.');
      }

      // lime_testの関数で、最も多くの引数の数は５つ
      $arg1 = isset($args[0]) ? $args[0] : null;
      $arg2 = isset($args[1]) ? $args[1] : null;
      $arg3 = isset($args[2]) ? $args[2] : null;
      $arg4 = isset($args[3]) ? $args[3] : null;
      $arg5 = isset($args[4]) ? $args[4] : null;

      $this->lime->{$name}($arg1, $arg2, $arg3, $arg4, $arg5);
    }

    /**
     * run : testから始まるメソッドを順番に実行していく
     *       TODO: 実行の順番はget_class_methodsの返り値に依存している
     */
    public function run()
    {
        $methods = get_class_methods($this->class);

        foreach ($methods as $method) {
           if (!preg_match('/^test/', $method)) {
              continue;
           }
           $this->diag($method);
           try {
              $this->setUp();
              $this->{$method}();
              $this->tearDown();
           } catch (Exception $e) {
              $this->diag('run method catch Exception => ' . $e);
           }
        }
    }

    /**
     * テストの実行直前に呼び出される
     * 必要な場合、子クラスでオーバーライドしてください
     */
    public function setUp()
    {
    }

    /**
     * テストの実行直前に呼び出される
     * 必要な場合、子クラスでオーバーライドしてください
     */
    public function tearDown()
    {
    }
}
