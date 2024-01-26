<?php
// panggil file "database.php" untuk koneksi ke database
require_once "../config/database.php";

// fungsi untuk mereset antrian
function resetAntrian($mysqli)
{
    $tanggal = gmdate("Y-m-d", time() + 60 * 60 * 7);

    // Lakukan operasi reset di tabel "tbl_antrian"
    $resetQuery = mysqli_query($mysqli, "DELETE FROM tbl_antrian WHERE tanggal='$tanggal'")
        or die('Ada kesalahan pada query reset antrian: ' . mysqli_error($mysqli));

    if ($resetQuery) {
        // Berhasil melakukan reset, berikan respons sukses
        echo "success";
    } else {
        // Gagal melakukan reset, berikan respons error
        echo "error";
    }
}

// cek apakah ada ajax request
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) {
    // panggil fungsi reset antrian
    resetAntrian($mysqli);
}
?>
