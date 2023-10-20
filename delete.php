<?php
    require 'control.php';

    function delete($id) {
        global $db_konek;
    
        $query = "DELETE FROM tb_data_mhs WHERE id_data = $id";
        if (mysqli_query($db_konek, $query)) {
            return mysqli_affected_rows($db_konek);
        } else {
            echo "Error: " . mysqli_error($db_konek);
            return -1; // Mengembalikan nilai negatif untuk menunjukkan adanya kesalahan
        }
    }

    $id = $_GET["id"];

    if (delete($id) > 0) {
        echo "
            <script>
                alert('Data Form Telah Dihapus');
                document.location.href='database.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Failed !!!');
            </script>
        ";
    }
?>