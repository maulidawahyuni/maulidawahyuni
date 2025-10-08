<?php
class CustomEmailException extends Exception {
    public function errorMessage() {
        // Pesan error detail seperti contoh
        $errorMsg = 'Error on line ' . $this->getLine() . ' in ' . $this->getFile() .
        ': <b>' . $this->getMessage() . '</b> tidak mengandung kata "kelasA/kelasB" dan tidak valid E-Mail address.<br>';
        return $errorMsg;
    }
}

$emails = [
    "maulida.kelasA@polsub.ac.id",
    "roni.kelasA@polsub.ac.id",
    "iqbal.kelasB@polsub.ac.id",
    "zayn.kelasB@polsub.ac.id",
    "putri.kelasB@polsub.ac.id",
    "lisa.kelasA@polsub.ac.id",
    "cici@randommail.com" // email salah, untuk contoh error
];

$validKelasA = 0;
$validKelasB = 0;
$invalid = 0;

echo "<h2>Hasil Validasi Email Mahasiswa Kelas</h2><hr>";

foreach ($emails as $email) {
    try {
        // Cek format email
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE) {
            throw new CustomEmailException($email);
        }

        // Cek apakah mengandung kelasA atau kelasB
        if (strpos($email, "kelasA") !== FALSE) {
            echo "$email mengandung kata 'kelasA' dan E-mail valid<br>";
            $validKelasA++;
        } elseif (strpos($email, "kelasB") !== FALSE) {
            echo "$email mengandung kata 'kelasB' dan E-mail valid<br>";
            $validKelasB++;
        } else {
            throw new CustomEmailException($email);
        }

    } catch (CustomEmailException $e) {
        echo $e->errorMessage();
        $invalid++;
    }
}

// Ringkasan hasil akhir
echo "<br><b>Rekapitulasi:</b><br>";
echo "Terdapat $validKelasA email kelasA dan $validKelasB email kelasB.<br>";
echo "Terdapat $invalid email yang tidak valid atau bukan kelasA/kelasB.<br>";
?>