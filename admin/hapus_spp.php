<?php
include_once "../src/koneksi.php";

// Membaca variabel kode pada URL (alamat browser)
if(isset($_GET['id_spp'])){
    $id_spp = $_GET['id_spp'];

    // Hapus data sesuai Kode yang terbaca
    $sql = mysqli_query($koneksi, "DELETE FROM spp WHERE id_spp='$id_spp'");
    if($sql) {
        //Refresh halaman
        echo "<center> <b> <font color = 'red' size = '4'> <p> Data Berhasil dihapus </p>
                </center> </b> </font> </br>
        <meta http-equiv='refresh' content='2; url=?open=data_spp'>";
    }
}
else {
    // Jika tidak ada data Kode ditemukan di URL
    echo "<b>Data yang dihapus tidak ada</b>";
}
?>