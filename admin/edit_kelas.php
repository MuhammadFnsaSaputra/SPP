<?php
include_once "../src/koneksi.php";

# SKRIP TOMBOL SIMPAN DIKLIK
if(isset($_POST['btnSimpan'])){
    $id_kelas                = $_POST['id_kelas'];
    $nama_kelas              = $_POST['nama_kelas'];
    $kompetensi_keahlian     = $_POST['kompetensi_keahlian'];
    
    // Validasi Form Inputs
    $pesanEror = array();
    if (trim($id_kelas)=="") {
        $pesanEror[] = "Data <b>ID KELAS</b> tidak boleh kosong !";
    }
    if (trim($nama_kelas)=="") {
        $pesanEror[] = "Data <b>nama kelas</b> tidak boleh kosong !";
    }
    if (trim($kompetensi_keahlian)=="") {
        $pesanEror[] = "Data <b>kompetensi keahlian</b> tidak boleh kosong !";
    }

    //Menampilkan Pesan Eror dari Form
    if (count($pesanEror)>=1 ){
        $noPesan=0;
            foreach ($pesanEror as $indeks=>$pesan_tampil) {
            $noPesan++;
                echo "&snbp; $noPesan. $pesan_tampil<br>";
            }
        echo "</div> <br>";
    }
    else {

        //Skrip Simpan data ke Database
        $id_kelas= $_POST['id_kelas'];
        $sqlEdit = mysqli_query($koneksi, "UPDATE kelas SET nama_kelas='$nama_kelas',
        kompetensi_keahlian='$kompetensi_keahlian' WHERE id_kelas ='$id_kelas'");
        if($sqlEdit){
            echo " <center> <b> <font color = 'red' size = '4'> <p> Data Berhasil disimpan </p>
                    </center> </b> </font> </br>
            <meta http-equiv='refresh' content='2; url=?open=data_kelas'>";
        }
        else{
            echo " <center> <b> <font color = 'red' size = '4'> <p> D </p>
                    </center> </b> </font> </br>
            <meta http-equiv='refresh' content='2; url=?open=data_kelas'>";
        }
        exit;
    }
}

# MEMBACA DATA DARI DATABASE UNTUK DIEDIT
$id_kelas   = $_GET['id_kelas'];
$sql    = mysqli_query($koneksi, "SELECT * FROM kelas WHERE id_kelas ='$id_kelas'");
$data   = mysqli_fetch_array($sql);

?>
<from action="<?php $_SERVER['PHP_SELF']; ?>" method="post" name="form1" target="_self" >
    <table class="table-list" width="650" border="0" cellspacing="1" cellpadding="3">
        <tr>
            <td bgcolor="#CCCCCC"><strong>UBAH DATA KELAS </strong></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td width="182"><strong>ID KELAS </strong></td>
            <td width="6">:</td>
            <td width="440"><input name="id_kelas" type="text" value="<?php echo $data['id_kelas']; ?> "
                readonly = "true"   /></td>
        </tr>
        <tr>
            <td><strong>Kompetensi Keahlian </strong></td>
            <td>:</td>
            <td><input name="kompetensi_keahlian" type="text" value="<?php echo $data['kompetensi_keahlian']; ?>"
                    size="60" maxlength="100" /></td>
        </tr>

        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><input name="btnSimpan" type="submit" id="btnSimpan" value="Simpan" /></td>
        </tr>
    </table>
</form>

    