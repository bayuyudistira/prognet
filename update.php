<?php
    require 'control.php';
    
    $id = $_GET["id"];

    function update($update) {
        global $db_konek;
    
        $id = $_GET["id"];
        $nama_mhs = mysqli_real_escape_string($db_konek, $update["nama"]);
        $tgl_lahir = mysqli_real_escape_string($db_konek, $update["lahir"]);
        $alamat = mysqli_real_escape_string($db_konek, $update["alamat"]);
        $agama = mysqli_real_escape_string($db_konek, $update["agama"]);
        $universitas = mysqli_real_escape_string($db_konek, $update["univ"]);
        $fakultas = mysqli_real_escape_string($db_konek, $update["fakultas"]);
        $prodi = mysqli_real_escape_string($db_konek, $update["prodi"]);
        $nim = mysqli_real_escape_string($db_konek, $update["nim"]);
    
        $query = "UPDATE tb_data_mhs SET
            nama_mhs = '$nama_mhs',
            tgl_lahir = '$tgl_lahir',
            alamat = '$alamat',
            agama = '$agama',
            universitas = '$universitas',
            fakultas = '$fakultas',
            prodi = '$prodi',
            nim_mhs = '$nim'
            WHERE id_data = '$id'";
    
        mysqli_query($db_konek, $query);
    
        return mysqli_affected_rows($db_konek);
    }

    $query = read("SELECT * FROM tb_data_mhs WHERE id_data = $id") [0];

    if (isset($_POST["submit"])) {
        if (update($_POST) > 0) {
            echo "
                <script>
                    alert('Data berhasil di update');
                    document.location.href = 'database.php';
                </script>
            ";
        } else {
            echo "
            <script>
                alert('Data gagal di update');
            </script>
            ";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

    <title>Edit Form Data</title>
  </head>
  <body>
    <div class="container mt-5 mb-5">
      <div class="row justify-content-center text-center">
        <div class="col-5">
          <fieldset class="form-group border p-1" style="color: #fff; background-color: black">
            <legend>Form Biodata</legend>
          </fieldset>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-5">
          <form name="form" method="POST" action="" onsubmit="return validateForm();">
            <!-- action attribute now points to "simpan.php" to handle form submission -->
            <fieldset class="form-group border p-3">
              <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control" id="nama" value="<?=$query['nama_mhs']?>">
              </div>

              <div class="mb-3">
                <label for="lahir" class="form-label">Tanggal Lahir</label>
                <input type="date" name="lahir" class="form-control" id="lahir" value="<?=$query['tgl_lahir']?>">
              </div>

              <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label> <br />
                <textarea name="alamat" id="alamat" class="form-control" cols="30" rows="2"><?=$query['alamat']?></textarea>
              </div>

              <div class="mb-3">
                <label for="agama" class="form-label">Agama</label>
                <select name="agama" id="agama" class="form-control">
                  <option value=""></option>
                  <option value="Islam" <?php if ($query['agama'] == 'Islam') echo 'selected'; ?>>Islam</option>
                  <option value="Hindu" <?php if ($query['agama'] == 'Hindu') echo 'selected'; ?>>Hindu</option>
                  <option value="Katolik" <?php if ($query['agama'] == 'Katolik') echo 'selected'; ?>>Katolik</option>
                  <option value="Kristen" <?php if ($query['agama'] == 'Kristen') echo 'selected'; ?>>Protestan</option>
                  <option value="Buddha" <?php if ($query['agama'] == 'Buddha') echo 'selected'; ?>>Buddha</option>
                </select>
              </div>

              <div class="mb-3">
                <label for="univ" class="form-label">Universitas</label>
                <input type="text" name="univ" class="form-control" id="univ" value="<?=$query['universitas']?>">
              </div>

              <div class="mb-3">
                <label for="fakultas" class="form-label">Fakultas</label>
                <select name="fakultas" id="fakultas" class="form-control">
                  <option value=""></option>
                  <option value="Teknik" <?php if ($query['fakultas'] == 'Teknik') echo 'selected'; ?>>Teknik</option>
                </select>
              </div>

              <div class="mb-3">
                <label for="prodi" class="form-label">Program Studi</label>
                <select name="prodi" id="prodi" class="form-control">
                  <option value=""></option>
                  <option value="Arsitektur" <?php if ($query['prodi'] == 'Arsitektur') echo 'selected'; ?>>Arsitektur</option>
                  <option value="Teknik Sipil" <?php if ($query['prodi'] == 'Teknik Sipil') echo 'selected'; ?>>Teknik Sipil</option>
                  <option value="Teknik Elektro" <?php if ($query['prodi'] == 'Teknik Elektro') echo 'selected'; ?>>Teknik Elektro</option>
                  <option value="Teknik Mesin" <?php if ($query['prodi'] == 'Teknik Mesin') echo 'selected'; ?>>Teknik Mesin</option>
                  <option value="Teknologi Informasi" <?php if ($query['prodi'] == 'Teknologi Informasi') echo 'selected'; ?>>Teknologi Informasi</option>
                  <option value="Teknik Industri" <?php if ($query['prodi'] == 'Teknik Industri') echo 'selected'; ?>>Teknik Industri</option>
                  <option value="Teknik Lingkungan" <?php if ($query['prodi'] == 'Teknik Lingkungan') echo 'selected'; ?>>Teknik Lingkungan</option>
                </select>
              </div>

              <div class="mb-3">
                <label for="nim" class="form-label">NIM</label>
                <input type="text" name="nim" class="form-control" id="nim" value="<?=$query['nim_mhs']?>">
              </div>

              <div class="d-grid gap-2 text-center">
                <a class="btn btn-danger" href="database.php" role="button">Cancel</a>
                <button type="submit" name="submit" class="btn btn-primary">Save Changes</button>
              </div>
            </fieldset>
          </form>
        </div>
      </div>
    </div>

    <script>
      function validateForm() {
        var nama = document.getElementById('nama').value;
        var tahunLahir = document.getElementById('lahir').value;
        var alamat = document.getElementById('alamat').value;
        var agama = document.getElementById('agama').value;
        var universitas = document.getElementById('univ').value;
        var fakultas = document.getElementById('fakultas').value;
        var prodi = document.getElementById('prodi').value;
        var nim = document.getElementById('nim').value;

        var namaRegex = /^[a-zA-Z\s]+$/;

        if (!nama.match(namaRegex)) {
          alert('Nama hanya boleh berisi huruf dan spasi.');
          return false;
        }

        if (tahunLahir === '') {
          alert('Tahun lahir kosong.');
          return false;
        }

        if (alamat.trim() === '') {
          alert('Alamat harus diisi.');
          return false;
        }

        if (agama === '') {
          alert('Pilih Agama.');
          return false;
        }

        if (universitas.trim() === '') {
          alert('Universitas harus diisi.');
          return false;
        }

        if (fakultas === '') {
          alert('Pilih Fakultas.');
          return false;
        }

        if (prodi === '') {
          alert('Pilih Program Studi.');
          return false;
        }

        if (nim.length !== 10 || isNaN(nim)) {
          alert('NIM harus terdiri dari 10 digit angka.');
          return false;
        }

        alert('Data anda berhasil disimpan');
        return true;
      }
    </script>
  </body>
</html>