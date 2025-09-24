<?php
class KonversiSuhu {
    private $celsius;

    // Constructor untuk inisialisasi nilai suhu
    public function __construct($celsius) {
        $this->celsius = $celsius;
    }

    // Method konversi ke berbagai satuan
    public function tampilkanKonversi() {
        echo "<h2>Konversi Suhu dari Celcius</h2>";
        echo "Suhu dalam celcius = {$this->celsius} derajat<br><br>";

        // Array tujuan konversi
        $satuan = ["reamur", "fahrenheit", "kelvin"];

        // Perulangan array
        foreach ($satuan as $s) {
            // Percabangan konversi
            if ($s == "reamur") {
                $hasil = (4/5) * $this->celsius;
            } elseif ($s == "fahrenheit") {
                $hasil = (9/5) * $this->celsius + 32;
            } elseif ($s == "kelvin") {
                $hasil = $this->celsius + 273.15;
            }

            echo "<b>Suhu dalam $s = $hasil derajat</b><br><br>";
        }

        echo "<i>Sekian konversi suhu yang bisa dilakukan</i>";
    }
}

$c = isset($_GET['c']) ? $_GET['c'] : 36;

// Panggil class dengan constructor
$konversi = new KonversiSuhu($c);
$konversi->tampilkanKonversi();
?>
