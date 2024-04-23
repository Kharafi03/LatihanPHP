<?php 
    include("config.php");

    if (!isset($_GET['no'])) {
        // jika no tidak ada dalam query string
        header('Location: index.php');
    }

    // Ambil data no dari query string
    $no = $_GET['no'];

    // Cek apakah no ada dalam database
    $sql = "SELECT * FROM kelompok WHERE no='$no'";
    $result = mysqli_query($conn, $sql);
    $anggota = mysqli_fetch_assoc($result);

    // Jika no tidak ada dalam database
    if( mysqli_num_rows($result) < 1 ){
        die("data tidak ditemukan...");
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Anggota</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="container-fluid">
            <div class="container mt-5">
                <h2>Edit Anggota</h2>
                <form id="form" action="proses_edit.php" method="post">
                    <div class="form-group">
                        <label for="no">No</label>
                        <input type="text" class="form-control" id="no" name="no" value="<?= $anggota['no'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $anggota['nama'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $anggota['alamat'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <div class="form-check-group">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="Laki-laki" value="Laki-laki" <?php if ($anggota['jenis_kelamin'] == "Laki-laki") echo "checked"; ?> required>
                                <label class="form-check-label" for="Laki-laki">Laki-laki</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="Perempuan" value="Perempuan" <?php if ($anggota['jenis_kelamin'] == "Perempuan") echo "checked"; ?> required>
                                <label class="form-check-label" for="Perempuan">Perempuan</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="agama">Agama</label>
                        <select class="form-control" id="agama" name="agama" required>
                            <option value="Islam" <?php if ($anggota['agama'] == "Islam") echo "selected"; ?>>Islam</option>
                            <option value="Kristen" <?php if ($anggota['agama'] == "Kristen") echo "selected"; ?>>Kristen</option>
                            <option value="Katolik" <?php if ($anggota['agama'] == "Katolik") echo "selected"; ?>>Katolik</option>
                            <option value="Hindu" <?php if ($anggota['agama'] == "Hindu") echo "selected"; ?>>Hindu</option>
                            <option value="Budha" <?php if ($anggota['agama'] == "Budha") echo "selected"; ?>>Budha</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="kampus">Kampus</label>
                        <input type="text" class="form-control" id="kampus" name="kampus" value="<?= $anggota['kampus'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        <input type="text" class="form-control" id="jurusan" name="jurusan" value="<?= $anggota['jurusan'] ?>" required>
                    </div>    
                    <button type="submit" id="simpan" name="simpan" class="btn btn-primary">Edit Anggota</button>
                    <a href="index.php" class="btn btn-danger btn-kembali">Kembali</a>
                </form>
            </div>
        </div>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>        
</html>