<?php
    include("config.php");

    // cek apakah tombol sudah diklik atau belum?
    if(isset($_POST['simpan'])){
        
        // ambil data dari formulir edit
        $no = $_POST['no'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $agama = $_POST['agama'];
        $kampus = $_POST['kampus'];
        $jurusan = $_POST['jurusan'];
        
        // buat query update
        $sql = "UPDATE kelompok SET no='$no', nama='$nama', alamat='$alamat', jenis_kelamin='$jenis_kelamin', agama='$agama', kampus='$kampus', jurusan='$jurusan' WHERE no='$no'";
        $query = mysqli_query($conn, $sql);

        // apakah query update berhasil?
        if( $query ) {
            // kalau berhasil alihkan ke halaman index.php
            header("Location: index.php"); // Redirect kembali ke form jika sukses
        } else {
            // kalau gagal tampilkan pesan
            header("Location: index.php"); // Redirect kembali ke form jika sukses
        }
    } else { // jika tidak ada no di query string
        die("Akses dilarang...");
    }
?>