<?php

// Class induk
class manusia {
    // Property class manusia
    public $nama_saya;

    // Method pada class manusia
    function berinama($saya) {
        $this->nama_saya = $saya;
    }
}

// Class turunan atau sub class dari class manusia
// Kita menghubungkan class dengan syntax extends
class teman extends manusia {
    // Property class teman
    public $nama_teman;

    // Method pada class teman
    function berinamateman($teman) {
        $this->nama_teman = $teman;
    }
}

// Instansiasi class teman
$objectteman = new teman();

// Method berinama() adalah method pada class manusia, tapi kita bisa
// mengaksesnya karena telah menghubungkan class teman dengan class manusia
$objectteman->berinama("Dika");
$objectteman->berinamateman("Andra");

// Menampilkan isi property
echo "Nama Saya : " . $objectteman->nama_saya . "<br/>";
echo "Nama Teman Saya : " . $objectteman->nama_teman;

?>