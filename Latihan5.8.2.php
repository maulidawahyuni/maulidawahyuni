<?php
class testParent
{
    public function f1()
    {
        echo 1;
    }

    public function f2()
    {
        echo 2;
    }
}

class testChild extends testParent
{
    function f2()
    {
        echo "ankur";
    }
}

$a = new testChild();
$a->f2(); // Output: ankur
?>