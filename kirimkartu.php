<?php
    include "koneksi.php";

    $nokartu = $_GET['nokartu'];
    mysqli_query($konek, "update tmprfid set nokartu = 0 where id = 1");

    $simpan = mysqli_query($konek, "update tmprfid set nokartu = '$nokartu' where id = 1");
    if ($simpan) {
        echo "Berhasil mengirim";
    }
    else {
        echo "Gagal Mengirim";
    }
?>