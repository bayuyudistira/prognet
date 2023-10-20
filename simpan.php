<?php
require 'control.php';

$nama_mhs = $_POST['nama'];
$tgl_lahir = $_POST['lahir'];
$alamat = $_POST['alamat'];
$agama = $_POST['agama'];
$universitas = $_POST['univ'];
$fakultas = $_POST['fakultas'];
$prodi = $_POST['prodi'];
$nim_mhs = $_POST['nim'];

// Membuat pernyataan SQL untuk menyimpan data
$sql = "INSERT INTO tb_data_mhs(nama_mhs, tgl_lahir, alamat, agama, universitas, fakultas, prodi, nim_mhs) 
        VALUES ('$nama_mhs', '$tgl_lahir', '$alamat', '$agama', '$universitas', '$fakultas', '$prodi', '$nim_mhs')";

if ($db_konek->query($sql) === TRUE) {
    echo "
        <script>
            document.location.href='index.html';
        </script>
    ";
} else {
    echo "Error: " . $sql . "<br>" . $db_konek->error;
}

// Tutup koneksi
$db_konek->close();
?>

