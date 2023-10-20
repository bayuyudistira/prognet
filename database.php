<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

    <!-- MY CSS -->
    <link rel="stylesheet" href="styledb.css" />

    <title>Informasi Data Form Mahasiswa</title>
  </head>
  <body>
    <!-- NAVBAR -->

    <nav class="navbar navbar-expand-lg navbar-dark shadow-lg bg-dark navbar fixed-top">
      <div class="container-md">
        <a class="navbar-brand" href="#">Bayu Yudistira</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="index.html">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.html#about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="form.html">Form Data</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="database.php">Database</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- AKHIR NAVBAR -->

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h2 class="fs-3" style="font-family: cursive; margin-top: 5px; margin-bottom: 10px"><strong>Data Mahasiswa</strong></h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-11">
                <table class="table">
                    <thead>
                        <tr class="table-dark text-center">
                            <th scope="col">Nama</th>
                            <th scope="col">Universitas</th>
                            <th scope="col">NIM</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <?php
                    require 'control.php';
                    
                    $sql = "SELECT * FROM tb_data_mhs";
                    $hasil = $db_konek->query($sql);

                    if ($hasil->num_rows > 0) {
                        while ($row = $hasil->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["nama_mhs"] . "</td>";
                            echo "<td>" . $row["universitas"] . "</td>";
                            echo "<td class='text-center'>" . $row["nim_mhs"] . "</td>";
                            echo "<td>";
                            echo "<div class= 'text-center'>";
                            echo "<a href='detail.php?id=" . $row["id_data"] . "' class='btn btn-warning btn-sm col-3'>Detail</a> ";
                            echo "<a href='update.php?id=" . $row["id_data"] . "' class='btn btn-primary btn-sm col-3'>Edit</a> ";
                            echo "<a onClick=\"javascript: return confirm('Anda Yakin Ingin Menghapus Data Form?');\" href='delete.php?id=" . $row["id_data"] . "' class='btn btn-danger btn-sm col-3'>Delete</a>";
                            echo "</div>";
                            echo "</td>";
                            echo "</tr>";
                            
                        }

                    }

                    $db_konek->close();
                    ?>
                </table>
            </div>
        </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
