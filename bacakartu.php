<?php 
    include "koneksi.php";
    $sql = mysqli_query($konek, "select * from status");
    $data = mysqli_fetch_array($sql);
    $mode_absen = $data['mode'];
    $mode ="";
    if ($mode_absen == 1) {
        $mode = "masuk";
    }
    elseif ($mode_absen == 2) {
        $mode = "jam istirahat";
    }
    elseif ($mode_absen == 3) {
        $mode = "jam kembali";
    }
    elseif ($mode_absen == 4) {
        $mode = "pulang";
    }
    
    $baca_kartu = mysqli_query($konek, "select * from tmprfid where id = 1");
    $data_kartu = mysqli_fetch_array($baca_kartu);
    $nokartu = $data_kartu['nokartu'];
?>

<div class= "container-fluid" style="text-align: center;">
    <?php if($nokartu =="0") {?>
    
        <h3>Absen : <?php echo $mode;?></h3>
        <h3>silahkan tempelkan kartu RFID anda</h3>
        <img src="images/rfid.png" style="width: 200px"> <br>
        <img src="images/animasi2.gif">
    <?php
        }
        else {
            $cari_karyawan = mysqli_query($konek, "select * from karyawan where nokartu='$nokartu'");
            $jumlah_karyawan = mysqli_num_rows($cari_karyawan);
            if ($jumlah_karyawan == 0) {
                echo "<h1>Maaf Kartu Tidak Dikenali</h1>";
            }
        else {
            $data_karyawan = mysqli_fetch_array($cari_karyawan);
            $nama = $data_karyawan['nama'];

            date_default_timezone_set('Asia/Jakarta');
            $tanggal = date('Y-m-d');
            $jam = date('H:i:s');

            $cari_absen = mysqli_query($konek, "Select *from absensi where nokartu = '$nokartu' and tanggal = '$tanggal'");
            $jumlah_absen = mysqli_num_rows($cari_absen);
            if ($jumlah_absen == 0) {
                echo "<h1>Selamat Datang <br> $nama </h1>";
                mysqli_query($konek, "insert into absensi (nokartu, tanggal, jam_masuk) value('$nokartu', '$tanggal', '$jam')");
            }

            else {
                if ($mode_absen == 2) {
                    echo "<h1>Selamat istirahat <br> $nama </h1>";
                    mysqli_query($konek, "update absensi set jam_istirahat = '$jam' where nokartu = '$nokartu' and tanggal = '$tanggal'");
                }
                elseif ($mode_absen == 3) {
                    echo "<h1>Selamat Datang kembali <br> $nama </h1>";
                    mysqli_query($konek, "update absensi set jam_kembali = '$jam' where nokartu = '$nokartu' and tanggal = '$tanggal'");
                }
                elseif ($mode_absen == 4) {
                    echo "<h1>Selamat pulang <br> $nama </h1>";
                    mysqli_query($konek, "update absensi set jam_pulang = '$jam' where nokartu = '$nokartu' and tanggal = '$tanggal'");
                }
            }
        }
        mysqli_query($konek, "update tmprfid set nokartu = 0 where id =1");
    }?>
</div>