<?php
include_once "../src/koneksi.php";

#SKRIP TOMBOL SIMPAN DIKLIK
if(isset($_POST['btnSimpan'])){
    $id_kelas               = $_POST['id_kelas'];
    $nama_kelas                 = $_POST['nama_kelas'];
    $kompetensi_keahlian        = $_POST['kompetensi_keahlian'];

    //Validasi Form Inputs
    $pesanEror = array();
    if (trim($id_kelas)=="") {
        $pesanEror[] = "Data <b>ID KELAS</b> tidak boleh kosong !";
    }
    if (trim($nama_kelas)=="") {
        $pesanEror[] = "Data <b>NAMA KELAS</b> tidak boleh kosong !";
    }
    if (trim($kompetensi_keahlian)=="") {
        $pesanEror[] = "Data <b>KOMPETENSI KEAHLIAN</b> tidak boleh kosong !"
    }

//Menampilkan Pesan Eror dari Form
    if (count($pesanEror)>=1 ){
            $noPesan=0;
            foreach ($pesanEror as $indeks=>$pesan_tampil) {
            $noPesan++;
                echo "&snbp; $noPesan. $pesan_tampil<br>";
            }
        echo "<br>";
    }
    else {
        //Skrip Simpan data ke Database
        $sql = mysqli_query($koneksi, "INSERT INTO kelas (id_kelas, nama_kelas, kompetensi_keahlian)
            VALUES('$id_kelas', '$nama_kelas', '$kompetensi_keahlian' )");
        if($sql){
            echo " <center> <b> <font color = 'red' size = '4'> <p> Data Berhasil disimpan </p>
                    </center> </b> </font> </br>
            <meta http-equiv='refresh' content='2; url=?open=data_kelas'>";
        }
        exit;
    }
}

?>
<from action="<?php $_SERVER['PHP_SELF']; ?>" method="post" >
    <table cellspacing="1" cellpadding="3">
        <tr>
            <td bgcolor="#CCCCCC"><strong>TAMBAH DATA KELAS</strong></td>
        </tr>
        <tr>
            <td>ID KELAS</td>
            <td>:</td>
            <td><input name="id_kelas" type="text" size="20" maxlength="20" /></td>
        </tr>
        <tr>
            <td>NAMA KELAS</td>
            <td>:</td>
            <td><input name="nama_kelas" type="text" size="30" maxlength="30" /></td>
        </tr>
        <tr>
            <td>KOMPETENSI KEAHLIAN</td>
            <td>:</td>
            <td><input name="kompetensi_keahlian" type="text" size="50" maxlength="50" /></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><input name="btnSimpan" type="submit" value="Simpan" /></td>
        </tr>
    </table>
</from>