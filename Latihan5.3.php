<?php
// Class induk
class BangunDatar {
    public function luas() {
        return 0;
    }

    public function keliling() {
        return 0;
    }
}

// Class Persegi
class Persegi extends BangunDatar {
    public $sisi;

    public function __construct($sisi) {
        $this->sisi = $sisi;
    }

    public function luas() {
        return $this->sisi * $this->sisi;
    }

    public function keliling() {
        return 4 * $this->sisi;
    }
}

// Class Lingkaran
class Lingkaran extends BangunDatar {
    public $r;

    public function __construct($r) {
        $this->r = $r;
    }

    public function luas() {
        return pi() * $this->r * $this->r;
    }

    public function keliling() {
        return 2 * pi() * $this->r;
    }
}

// Class Persegi Panjang
class PersegiPanjang extends BangunDatar {
    public $panjang, $lebar;

    public function __construct($panjang, $lebar) {
        $this->panjang = $panjang;
        $this->lebar = $lebar;
    }

    public function luas() {
        return $this->panjang * $this->lebar;
    }

    public function keliling() {
        return 2 * ($this->panjang + $this->lebar);
    }
}

// Class Segitiga
class Segitiga extends BangunDatar {
    public $alas, $tinggi;

    public function __construct($alas, $tinggi) {
        $this->alas = $alas;
        $this->tinggi = $tinggi;
    }

    public function luas() {
        return 0.5 * $this->alas * $this->tinggi;
    }

    public function keliling() {
        // Asumsi segitiga sama kaki
        $sisi_miring = sqrt(pow($this->tinggi, 2) + pow($this->alas / 2, 2));
        return $this->alas + 2 * $sisi_miring;
    }
}

// Main class untuk menampilkan output
class Main {
    public static function main() {
        $persegi = new Persegi(5);
        $lingkaran = new Lingkaran(7);
        $persegiPanjang = new PersegiPanjang(4, 6);
        $segitiga = new Segitiga(10, 8);

        echo "<b>PERSEGI</b>" . "<br>";
        echo "Luas: " . $persegi->luas() . "<br>";
        echo "Keliling: " . $persegi->keliling() . "<br>";

        echo "<b>LINGKARAN</b>" . "<br>";
        echo "Luas: " . number_format($lingkaran->luas(), 2) . "<br>";
        echo "Keliling: " . number_format($lingkaran->keliling(), 2) . "<br>";

        echo "<b>PERSEGI PANJANG</b>" . "<br>";"<br>";
        echo "Luas: " . $persegiPanjang->luas() . "<br>";
        echo "Keliling: " . $persegiPanjang->keliling() . "<br>";

        echo "<b>SEGITIGA</b>" . "<br>";
        echo "Luas: " . $segitiga->luas() . "<br>";
        echo "Keliling: " . number_format($segitiga->keliling(), 2) . "<br>";
    }
}

// Jalankan program
Main::main();
?>
