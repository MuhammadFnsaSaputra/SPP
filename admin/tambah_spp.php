<?php
include_once "../src/koneksi.php";

#SKRIP TOMBOL SIMPAN DIKLIK
if(isset($_POST['btnSimpan'])){
    $id_spp         =$_POST['id_spp'];
    $tahun          =$_POST['tahun'];
    $nominal        =$_POST['nominal'];

    // Validasi From Inputs
    $pesanEror = array();
    if (trim($id_spp)=="") {
        $pesanEror[] = "Data <b>ID SPP</b> tidak boleh kosong !";
    }
    if (trim($tahun)=="") {
        $pesanEror[] = "Data <b>Tahun</b> tidak boleh kosong !";
    }
    if (trim($nominal)=="") {
        $pesanEror[] = "Data <b>Nominal</b> tidak boleh kosong !";
    }

// Menampilkan Pesan Eror dari From
    if (count($pesanEror)>=1 ){
        $noPesan=0;
        foreach ($pesanEror as $indeks=>$pesan_tampil) {
        $noPesan++;
            echo "&nbsp; $noPesan. $pesan_tampil<br>";
        }
    echo "<br>";
    }
    else {
        // Skrip Simpan data ke Database
        $sql = mysqli_query($koneksi, "INSERT INTO spp (id_spp, tahun, nominal)
        VALUES('$id_spp', '$tahun', '$nominal' )");
    if($sql){
        echo " <center> <b> <font color = 'red' size = '4'> <p> Data Berhasil disimpan </ p>
                </center> </b> </font> </br>
        <meta http-equiv='refresh' content='2; url=?open=data_spp'>";
    }
    else{
        echo "<center> <b> <font color = 'red' size = '4'> <p> Data Gagal Disimpan !
        <meta http-equiv= 'refresh' content='2; url=?open=data_spp'>";
    }
    exit;
    }
}

?>
<Form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" >
    <table cellspacing="1" cellpadding="3">
        <tr>
            <td bgcolor="#CCCCCC"><strong>TAMBAHAN DATA SPP </strong></td>
        </tr>

        <tr>
            <td>ID SPP</td>
            <td>:</td>
            <td><input name="id_spp" type="text" size="10" maxlength="4" /></td>
        </tr>
        <tr>
            <td>Tahun</td>
            <td>:</td>
            <td><input name="tahun" type="year" size="4" maxlength="4" /></td>
        </tr>
        <tr>
            <td>Nominal</td>
            <td>:</td>
            <td><input name="nominal" type="number" size="10" maxlength="10" /></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><input name="btnSimpan" type="submit" value="Simpan" /></td>
        </tr>
</table>
</form>