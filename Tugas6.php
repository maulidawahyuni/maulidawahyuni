<?php

$gaji_pokok_data = [
    "Ia"  => 1250000, "IIa" => 2000000, "IIIa" => 2400000, "IVa" => 2800000,
    "Ib"  => 1250000, "IIb" => 2100000, "IIIb" => 2500000, "IVb" => 2900000,
    "Ic"  => 1300000, "IIc" => 2200000, "IIIc" => 2600000, "IVc" => 3000000,
    "Id"  => 1350000, "IId" => 2300000, "IIId" => 2700000, "IVd" => 3100000,
];

class Karyawan {
    // Properties diubah menjadi public
    public $nama;
    public $golongan;
    public $totalJamLembur;
    public $gajiPokok;
    public $totalGaji;
    public $lemburPerJam = 15000;

    // Constructor
    public function __construct($nama, $golongan, $jamLembur, $gaji_data) {
        $this->nama = $nama;
        $this->golongan = $golongan;
        $this->totalJamLembur = $jamLembur;
        
        echo "Constructor: Data Karyawan '{$this->nama}' dibuat.\n";
        
        $this->setGajiPokok($gaji_data);
        $this->hitungTotalGaji();
    }

    // Getter methods tetap bisa digunakan
    public function getNama() { return $this->nama; }
    public function getGolongan() { return $this->golongan; }
    public function getTotalJamLembur() { return $this->totalJamLembur; }
    public function getTotalGaji() { return number_format($this->totalGaji, 2, ',', '.'); }

    // Methods internal
    private function setGajiPokok($gaji_data) {
        if (isset($gaji_data[$this->golongan])) {
            $this->gajiPokok = $gaji_data[$this->golongan];
        } else {
            $this->gajiPokok = 0;
        }
    }

    private function hitungTotalGaji() {
        $gajiLembur = $this->totalJamLembur * $this->lemburPerJam;
        $this->totalGaji = $this->gajiPokok + $gajiLembur;
    }

    // Destructor
    public function __destruct() {
        echo "Destructor: Objek Karyawan '{$this->nama}' dihapus.\n";
    }
}

// Fungsi input CLI
function read_cli_input($prompt, $is_int = false) {
    echo $prompt;
    $input = trim(fgets(STDIN));
    return $is_int ? (int)$input : $input;
}

// Array karyawan
$daftarKaryawan = [];

// Input jumlah karyawan
$jumlahKaryawan = read_cli_input("Masukkan jumlah karyawan yang akan diinput: ", true);

for ($i = 0; $i < $jumlahKaryawan; $i++) {
    echo "\n--- Input Karyawan ke-" . ($i + 1) . " ---\n";
    
    $nama = read_cli_input("Nama Karyawan: ");
    $golongan = read_cli_input("Golongan (ex: IIIb): ");
    $jamLembur = read_cli_input("Total Jam Lembur: ", true);
    
    $karyawan = new Karyawan($nama, $golongan, $jamLembur, $gaji_pokok_data);
    $daftarKaryawan[] = $karyawan;
}

// Output tabel
echo "\n=================================================================\n";
echo "                      TABEL GAJI KARYAWAN\n";
echo "=================================================================\n";
printf("| %-15s | %-10s | %-15s | %-15s |\n", 
       "Nama Karyawan", "Golongan", "Total Jam Lembur", "Total Gaji");
echo "-----------------------------------------------------------------\n";

foreach ($daftarKaryawan as $karyawan) {
    printf("| %-15s | %-10s | %-15d | %-15s |\n", 
           $karyawan->getNama(), 
           $karyawan->getGolongan(), 
           $karyawan->getTotalJamLembur(), 
           "Rp " . $karyawan->getTotalGaji());
}
echo "=================================================================\n";
?>
