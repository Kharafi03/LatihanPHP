<?php
    // proses_tambah_agents.php
    session_start();
    include 'config.php'; // Memastikan koneksi database sudah ada

    if(isset($_POST['simpan'])){
        // $no = $_POST['no'];
        $gambar = $_FILES['gambar']['name'];
        $gambarContent = $_FILES['gambar']['tmp_name'];

        // move_uploaded_file($gambarContent, 'img/'.$gambar);
        // $gambar = $_FILES['gambar']['name'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $agama = $_POST['agama'];
        $kampus = $_POST['kampus'];
        $jurusan = $_POST['jurusan'];

        $sqlno = "SELECT MAX(no) FROM kelompok";
        $queryno = mysqli_query($conn, $sqlno);
        $row = mysqli_fetch_array($queryno);
        $no = $row[0] + 1;

        // cek apakah user pilih gambar
        if(file_exists("img/$gambar")){
            $_SESSION['message'] = $gambar.' File Gambar sudah ada';
            header("Location: form_tambah.php");
        } else {
            // SQL untuk menambahkan data
            $sql = "INSERT INTO kelompok (no, gambar, nama, alamat, jenis_kelamin, agama, kampus, jurusan) VALUES ('$no', '$gambar', '$nama', '$alamat', '$jenis_kelamin', '$agama', '$kampus', '$jurusan')";
            $query = mysqli_query($conn, $sql);

            // apakah query update berhasil?
            if( $query ) {
                move_uploaded_file($gambarContent, 'img/'.$gambar);
                $_SESSION['message'] = 'Data berhasil ditambahkan';
                // kalau berhasil alihkan ke halaman list-daftar-anggota.php
                header("Location: index.php"); // Redirect kembali ke form jika sukses
            } else {
                // kalau gagal tampilkan pesan
                header("Location: index.php"); // Redirect kembali ke form jika sukses
            }
        }
    } else {
        die("Akses dilarang...");
    }
?>