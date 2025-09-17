<?php

// Class Induk (Parent Class)
class manusia {
    public $nama;
    public $umur; // Di gambar tertulis $Sumur, ini adalah perbaikan agar logis
    public $gender;

    function bicara() {
        echo "Selamat Datang";
    }

    function getInfo() {
        echo "Nama: " . $this->nama . "<br/>";
        echo "Umur: " . $this->umur . "<br/>";
        echo "JK: " . $this->gender . "<br/>";
    }
}

// Class Turunan (Child Class)
class ayah extends manusia {
    function pekerjaan() {
        echo "Pekerjaan: Pegawai Negeri Sipil";
    }
}

// Class Turunan (Child Class)
class ibu extends manusia {
    function pekerjaan() {
        echo "Pekerjaan: Ibu Rumah Tangga";
    }
}

// Class Turunan (Child Class)
class anak extends manusia {
    function pekerjaan() {
        echo "Pekerjaan: Pelajar";
    }
}

// --- INSTANSIASI DAN EKSEKUSI ---

// Membuat objek Ayah
$objekAyah = new ayah();
$objekAyah->nama = "Budi";
$objekAyah->gender = "Laki-Laki";
$objekAyah->umur = "45";
echo "<b>Info Ayah</b><br/>";
$objekAyah->getInfo();
$objekAyah->pekerjaan();
echo "<hr>"; // Menambah garis pemisah

// Membuat objek Ibu
$objekIbu = new ibu();
$objekIbu->nama = "Dini";
$objekIbu->gender = "Perempuan";
$objekIbu->umur = "38";
echo "<b>Info Ibu</b><br/>";
$objekIbu->getInfo();
$objekIbu->pekerjaan();
echo "<hr>"; // Menambah garis pemisah

// Membuat objek Anak
$objekAnak = new anak();
$objekAnak->nama = "Ardi";
$objekAnak->gender = "Laki-Laki";
$objekAnak->umur = "15";
echo "<b>Info Anak</b><br/>";
$objekAnak->getInfo();
$objekAnak->pekerjaan();

?>