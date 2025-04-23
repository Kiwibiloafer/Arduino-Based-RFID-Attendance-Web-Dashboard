<?php
    include "koneksi.php";
    //jika tombol simpan diklik
    if(isset($_POST['btnSimpan']))
    {
        //baca isi inputan form
        $nokartu = $_POST['nokartu'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $status = $_POST['status'];
        //simpan ke tabel karyawan
        $simpan = mysqli_query($konek, "insert into karyawan (nokartu, nama, alamat, status)values('$nokartu', '$nama', '$alamat', '$status')");
        if($simpan)
        {
            echo 
                "<script>
                    alert('Tersimpan');
                    location.replace('datakaryawan.php');
                </script>";
            mysqli_query($konek, "update tmprfid set nokartu = 0 where id = 1");
        }
        else
        {
            echo 
                "<script>
                    alert('Gagal Tersimpan');
                    location.replace('datakaryawan.php');
                </script>";
            mysqli_query($konek, "update tmprfid set nokartu = 0 where id = 1");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "header.php" ?>
    <title>Tambah Data Karyawan</title>

    <script type="text/javascript">
        $(document).ready(function(){
            setInterval(function(){
                $("#norfid").load('nokartu.php')
            }, 0);
        });
    </script>

</head>
<body>
<?php include "menu.php"; ?>

    <div class="container-fluid">
        <h3>Tambah Data Karyawan</h3>
        <form method="POST">

            <div id="norfid"></div>

            <div class="form-group">
                <label>Nama Karyawan</label>
                <input type="text" name="nama" id="nama" placeholder ="nomor karyawan" class="form-control" style="width: 400px">
            </div>

            <div class="form-group">
                <label>Alamat</label>
                <textarea class="form-control" name="alamat" id="alamat" placeholder ="alamat karyawan" style="width: 400px"></textarea>
            </div>

            <div class="form-group">
                <label>Status</label>
                <input type="text" name="status" id="status" placeholder ="status" class="form-control" style="width: 400px">
            </div>
            
            <button class="btn btn-primary" name="btnSimpan" id="btnSimpan">Simpan </button>
        </form>
    </div>
<?php include "footer.php"; ?>
</body>
</html>