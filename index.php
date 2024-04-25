<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Kelompok 5 Remangy Kharafi Dwi Andika</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="container-fluid">
            <div class="container">
                <h1 class="text-center">Anggota Kelompok Remangy</h1>
                <h5 class="text-center">Kharafi Dwi Andika - Latihan PHP dan MySQL</h5>
                <a href="form_tambah.php" class="btn btn-primary mb-3">Tambah Baru</a>
                <?php
                    session_start();
                    include "config.php";
                    $sql = "SELECT * FROM kelompok";
                    $result = mysqli_query($conn, $sql); 

                    if(isset($_SESSION['message'])) {
                        ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?php echo $_SESSION['message']; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php
                        unset($_SESSION['message']);
                    } elseif (isset($_SESSION['delete'])) {
                        ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?php echo $_SESSION['delete']; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php
                        unset($_SESSION['delete']);
                    }
                ?>
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered text-center">
                        <thead>
                            <th scope="No">No</th>
                            <th scope="Gambar">Gambar</th></th>
                            <th scope="Nama">Nama</th>
                            <th scope="Alamat">Alamat</th>
                            <th scope="Jenis Kelamin">Jenis Kelamin</th>
                            <th scope="Agama">Agama</th>
                            <th scope="Kampus">Kampus</th>
                            <th scope="Jurusan">Jurusan</th>
                            <th scope="Aksi">Aksi</th>
                        </thead>
                        <tbody> <?php
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <td><?php echo $row["no"]; ?></td>
                                <td><img src="img/<?php echo $row["gambar"]; ?>" width="120" class="img-thumbnail"></td>
                                <td><?php echo $row["nama"]; ?></td>
                                <td><?php echo $row["alamat"]; ?></td>
                                <td><?php echo $row["jenis_kelamin"]; ?></td>
                                <td><?php echo $row["agama"]; ?></td>
                                <td><?php echo $row["kampus"]; ?></td>
                                <td><?php echo $row["jurusan"]; ?></td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="form_edit.php?no=<?php echo htmlspecialchars($row['no']); ?>" class='btn btn-primary'>Edit</a>
                                        <a href="proses_hapus.php?no=<?php echo htmlspecialchars($row['no']); ?>" class='btn btn-danger'>Hapus</a>
                                    </div>
                                </td>
                            </tr> <?php
                        }
                    } else { ?>
                            <tr>
                                <td colspan="8">
                                    <p class="text-center">Tidak ada data</p>
                                </td>
                            </tr> <?php 
                    } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>