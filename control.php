<?php 

//koneksi
$db_konek = mysqli_connect("prognet.localnet", "2205551106", "2205551106", "db_2205551106");

//function membaca database
function read($query) {
    global $db_konek; 

    $hasil = mysqli_query($db_konek, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($hasil)) {
        $rows[] = $row;
    }

    return $rows;
}
?>