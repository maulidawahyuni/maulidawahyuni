<?php
class Dog {
    // Satu method bark dengan parameter opsional
    public function bark($num = null) {
        if ($num === null) {
            echo "woof<br>";
        } else {
            echo "woof " . $num . "<br>";
        }
    }
}

// Simulasi Main
$myDog = new Dog();
$myDog->bark();      // Output: woof
$myDog->bark(3);     // Output: woof 3
?>
