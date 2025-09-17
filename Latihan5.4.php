<?php
// Class induk
class Kendaraan {
    public $merek;
    public $nama;
    public $harga;

    public function __construct($merek, $nama, $harga) {
        $this->merek = $merek;
        $this->nama = $nama;
        $this->harga = $harga;
    }

    public function tampilInfo() {
        echo "Merek: " . $this->merek . "<br>";
        echo "Nama: " . $this->nama . "<br>";
        echo "Harga: " . $this->harga . "<br>";
    }
}

class Pesawat extends Kendaraan {
    private $tipeMesin;
    private $kecepatanMaks;

    public function setTipeMesin($tipeMesin) {
        $this->tipeMesin = $tipeMesin;
    }

    public function setKecepatanMaks($kecepatanMaks) {
        $this->kecepatanMaks = $kecepatanMaks;
    }

    public function tampilTipeMesin() {
        echo "Tipe Mesin (Max): " . $this->tipeMesin . " feet<br>";
    }

    public function tampilKecepatanMaks() {
        echo "Kecepatan Maks: " . $this->kecepatanMaks . " km/jam<br>";
    }

    public function biayaOperasional() {
        if ($this->tipeMesin > 5000 && $this->kecepatanMaks > 800) {
            return 1000000;
        } elseif ($this->tipeMesin > 5000 && $this->kecepatanMaks <= 800) {
            return 750000;
        } elseif ($this->tipeMesin <= 5000 && $this->kecepatanMaks > 800) {
            return 800000;
        } else {
            return 500000;
        }
    }

    public function tampilBiayaOperasional() {
        echo "Biaya Operasional: Rp. " . number_format($this->biayaOperasional(), 0, ',', '.') . "<br><br>";
    }
}

// Data pesawat
$pesawat1 = new Pesawat("Boeing", "Boeing 737", "Rp. 800.000.000");
$pesawat1->setTipeMesin(6000);
$pesawat1->setKecepatanMaks(850);

$pesawat2 = new Pesawat("Boeing", "Boeing 787", "Rp. 1.500.000.000");
$pesawat2->setTipeMesin(7500);
$pesawat2->setKecepatanMaks(900);

$pesawat3 = new Pesawat("Cessa", "790", "Rp. 500.000.000");
$pesawat3->setTipeMesin(4500);
$pesawat3->setKecepatanMaks(700);

// Tampilkan semua
echo "<b>Pesawat 1</b><br>";
$pesawat1->tampilInfo();
$pesawat1->tampilTipeMesin();
$pesawat1->tampilKecepatanMaks();
$pesawat1->tampilBiayaOperasional();

echo "<b>Pesawat 2</b><br>";
$pesawat2->tampilInfo();
$pesawat2->tampilTipeMesin();
$pesawat2->tampilKecepatanMaks();
$pesawat2->tampilBiayaOperasional();

echo "<b>Pesawat 3</b><br>";
$pesawat3->tampilInfo();
$pesawat3->tampilTipeMesin();
$pesawat3->tampilKecepatanMaks();
$pesawat3->tampilBiayaOperasional();

?>
