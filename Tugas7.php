<?php
// Class Induk Tabungan
class Tabungan {
    private $saldo;

    public function __construct($saldo_awal) {
        $this->saldo = $saldo_awal;
    }

    // Setter 
    protected function setSaldo($jumlah) {
        $this->saldo = $jumlah;
    }

    // Getter
    protected function getSaldo() {
        return $this->saldo;
    }

    // Method untuk menambah saldo (setor tunai)
    public function setor($jumlah) {
        $this->saldo += $jumlah;
    }

    // Method untuk mengurangi saldo (tarik tunai)
    public function tarik($jumlah) {
        if ($jumlah > $this->saldo) {
            // Jika saldo tidak cukup, tampilkan pesan
            echo "Saldo tidak cukup!\n";
        } else {
            $this->saldo -= $jumlah;
        }
    }

    // Method menampilkan saldo saat ini
    public function tampilkanSaldo() {
        return $this->saldo;
    }
}

// Class Siswa
class Siswa extends Tabungan {
    private $nama;

    // Constructor: menerima nama siswa dan saldo awal
    public function __construct($nama, $saldo_awal) {
        parent::__construct($saldo_awal); // Memanggil constructor class induk
        $this->nama = $nama;
    }

    // Getter nama siswa
    public function getNama() {
        return $this->nama;
    }

    // Menampilkan info lengkap saldo siswa
    public function tampilkanInfo() {
        echo "Saldo tabungan {$this->nama} = Rp " . $this->tampilkanSaldo() . "\n";
    }
}

// Program Utama
// Membuat array siswa beserta saldo awal
$siswa = [
    new Siswa("Siswa 1", 50000),
    new Siswa("Siswa 2", 75000),
    new Siswa("Siswa 3", 100000)
];

// Menampilkan saldo awal semua siswa
echo "=== Saldo Awal Siswa ===\n";
foreach ($siswa as $s) {
    $s->tampilkanInfo();
}

// Loop Menu Utama
// Program akan terus berjalan hingga user memilih keluar
while (true) {
    echo "\n=== Menu Tabungan ===\n";
    echo "1. Setor Tabungan\n";
    echo "2. Tarik Tabungan\n";
    echo "3. Keluar\n";
    echo "Pilih menu: ";
    $menu = trim(fgets(STDIN)); 

    if ($menu == 3) {
        echo "Terima kasih! Program selesai.\n";
        break;
    }

    echo "Pilih siswa (1/2/3): ";
    $pilih = trim(fgets(STDIN));
    $index = $pilih - 1;

    // Validasi apakah siswa ada
    if (isset($siswa[$index])) {
        // Masukkan jumlah uang untuk setor/tarik
        echo "Masukkan jumlah uang: ";
        $jumlah = trim(fgets(STDIN));

        // Percabangan menu
        if ($menu == 1) {
            $siswa[$index]->setor($jumlah); // Panggil method setor
            echo "Setor berhasil!\n";
        } elseif ($menu == 2) {
            $siswa[$index]->tarik($jumlah); // Panggil method tarik
            echo "Tarik berhasil!\n";
        } else {
            echo "Menu tidak valid!\n";
        }
    } else {
        echo "Siswa tidak ditemukan!\n"; // Validasi jika input siswa salah
    }

    echo "\n=== Saldo Saat Ini ===\n";
    foreach ($siswa as $s) {
        $s->tampilkanInfo();
    }
}
?>
