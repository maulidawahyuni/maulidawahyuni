<?php
// buat class komputer
class komputer {
    // property dengan hak akses berbeda
    private $jenis_processor = "Intel Core i7-4790 3.6GHz";
    protected $jenis_RAM = "DDR 4";
    public $jenis_VGA = "PCI Express";

    public function tampilkan_processor() {
        return $this->jenis_processor;
    }

    // method ini duplikat dari tampilkan_processor(), bisa dihapus atau dipakai
    public function tampilkan_jenisprocessor() {
        return $this->jenis_processor;
    }

    // ubah jadi protected agar bisa diakses oleh turunan
    protected function tampilkan_ram() {
        return $this->jenis_RAM;
    }

    // method protected (tidak bisa diakses langsung dari objek)
    protected function tampilkan_vga() {
        return $this->jenis_VGA;
    }

    // method public untuk akses VGA
    public function tampilkan_vga2() {
        return $this->jenis_VGA;
    }
}

// buat class laptop
class laptop extends komputer {
    // ERROR sebelumnya: mencoba akses private property
    // solusinya: akses via method public dari parent
    public function display_processor() {
        return $this->tampilkan_processor();
    }

    public function display_processor2() {
        return $this->tampilkan_jenisprocessor();
    }

    public function display_ram() {
        return $this->jenis_RAM; // bisa, karena protected
    }

    public function display_ram2() {
        return $this->tampilkan_ram(); // sekarang bisa, karena protected
    }

    public function display_vga() {
        return $this->tampilkan_vga2(); // benar, method public parent
    }
}

// buat objek dari class laptop (instansiasi)
$komputer = new komputer();
$laptop = new laptop();

// jalankan method dari class komputer
echo "Line 61 : " . $komputer->tampilkan_processor() . "<br />";
echo "Line 62 : " . $laptop->display_processor() . "<br />";
echo "Line 63 : " . $laptop->display_processor2() . "<br />";
echo "Line 64 : " . $laptop->tampilkan_jenisprocessor() . "<br />";
echo "Line 65 : " . $laptop->display_ram() . "<br />";
echo "Line 66 : " . $laptop->display_ram2() . "<br />";
echo "Line 67 : " . $laptop->display_vga() . "<br />"; // sudah aman
?>
