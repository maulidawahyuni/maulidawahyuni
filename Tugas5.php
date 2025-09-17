<?php
// Class Induk : Employee
// Class dasar untuk semua jenis pegawai, menyimpan data umum seperti nama, gaji pokok, dan lama kerja
class Employee {
    public $nama;
    public $gajiPokok;
    public $lamaKerja;

    // Constructor untuk mengisi data pegawai saat objek dibuat
    public function __construct($nama, $gajiPokok, $lamaKerja) {
        $this->nama = $nama;
        $this->gajiPokok = $gajiPokok;
        $this->lamaKerja = $lamaKerja;
    }

    // Menampilkan informasi dasar pegawai
    public function tampilInfo() {
        echo "Nama: $this->nama<br>";
        echo "Gaji Pokok: Rp. " . number_format($this->gajiPokok, 0, ',', '.') . "<br>";
        echo "Lama Kerja: $this->lamaKerja tahun<br>";
    }
}

// Class Programmer
class Programmer extends Employee {
    public function hitungGaji() {
        // <1 tahun → gaji pokok saja
        if ($this->lamaKerja < 1) {
            return $this->gajiPokok;

        // 1–10 tahun → bonus 1% × lama kerja
        } elseif ($this->lamaKerja <= 10) {
            $bonus = $this->gajiPokok * (0.01 * $this->lamaKerja);
            return $this->gajiPokok + $bonus;

        // >10 tahun → bonus 2% × lama kerja
        } else {
            $bonus = $this->gajiPokok * (0.02 * $this->lamaKerja);
            return $this->gajiPokok + $bonus;
        }
    }
    //overriding
    public function tampilGaji() {
        echo "Total Gaji Programmer: Rp. " . number_format($this->hitungGaji(), 0, ',', '.') . "<br><br>";
    }
}

// Class Direktur
class Direktur extends Employee {
    //overriding
    public function hitungGaji() {
        $bonus = 0.5 * $this->lamaKerja;
        $tunjangan = 0.1 * $this->lamaKerja;
        return $this->gajiPokok + $bonus + $tunjangan;
    }

    public function tampilGaji() {
        echo "Total Gaji Direktur: Rp. " . number_format($this->hitungGaji(), 0, ',', '.') . "<br><br>";
    }
}

// Class Pegawai Mingguan
class PegawaiMingguan extends Employee {
    public $hargaBarang;
    public $jumlahTerjual;
    public $stokTersedia;

    // Constructor tambahan untuk data penjualan
    public function __construct($nama, $gajiPokok, $lamaKerja, $hargaBarang, $jumlahTerjual, $stokTersedia) {
        parent::__construct($nama, $gajiPokok, $lamaKerja); 
        $this->hargaBarang = $hargaBarang;
        $this->jumlahTerjual = $jumlahTerjual;
        $this->stokTersedia = $stokTersedia;
    }

    public function hitungGaji() {
        $persentase = $this->jumlahTerjual / $this->stokTersedia;

        // Jika penjualan > 70% stok → bonus 20% gaji pokok + tunjangan 1 harga barang
        if ($persentase > 0.7) {
            $bonus = 0.2 * $this->gajiPokok;
            $tunjangan = $this->hargaBarang;
            return $this->gajiPokok + $bonus + $tunjangan;
        
        // Jika tidak → bonus 3% × harga barang × jumlah terjual
        } else {
            $bonus = 0.03 * $this->hargaBarang * $this->jumlahTerjual;
            return $this->gajiPokok + $bonus;
        }
    }

    public function tampilGaji() {
        echo "Total Gaji Pegawai Mingguan: Rp. " . number_format($this->hitungGaji(), 0, ',', '.') . "<br><br>";
    }
}

// Contoh Penggunaan
echo "<h3>Programmer</h3>";
$prog = new Programmer("Maulida", 5000000, 12); // Lama kerja 5 tahun
$prog->tampilInfo();
$prog->tampilGaji();

echo "<h3>Direktur</h3>";
$Direktur = new Direktur("Raka", 15000000, 10); // Lama kerja > 10 tahun
$Direktur->tampilInfo();
$Direktur->tampilGaji();

echo "<h3>Pegawai Mingguan</h3>";
$mingguan = new PegawaiMingguan("Dina", 3000000, 2, 100000, 80, 100); // Penjualan 80 dari 100 stok
$mingguan->tampilInfo();
$mingguan->tampilGaji();
?>
