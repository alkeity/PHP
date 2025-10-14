<?php
    class Test
    {
        public $value = 13;

        public function &getValueRef() {
            return $this -> value;
        }
    }

    function func(&$var) {
        ++$var;
    }

    $var = 23;

    // 1) присваивание по ссылке
    $var_ref =& $var;
    echo "1. $var_ref <br>";

    // 2) передача по ссылке
    func($var);
    echo "2. $var_ref <br>";

    // 3) возврат по ссылке
    $test = new Test();
    $obj_ref = &$test -> getValueRef();
    echo "3. before: $obj_ref <br>";
    $test -> value = 44;
    echo "3. after: $obj_ref <br>";
?>
