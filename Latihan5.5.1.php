<?php
class Dog {
    public function bark() {
        echo "woof<br>";
    }
}

class Hound extends Dog {
    public function sniff() {
        echo "sniff<br>";
    }

    public function bark() {
        echo "bowl<br>";
    }
}

// Simulasi "Main"
$myDog = new Hound(); // Polymorphism
$myDog->bark();       // Output: bowl

$myHound = new Hound();
$myHound->sniff();    // Output: sniff
$myHound->bark();     // Output: bowl
?>
