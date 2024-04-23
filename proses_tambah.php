<?php
    // proses_tambah_agents.php

    include 'config.php'; // Memastikan koneksi database sudah ada

    if(isset($_POST['simpan'])){
        // $no = $_POST['no'];
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

        // SQL untuk menambahkan data
        $sql = "INSERT INTO kelompok (no, nama, alamat, jenis_kelamin, agama, kampus, jurusan) VALUES ('$no', '$nama', '$alamat', '$jenis_kelamin', '$agama', '$kampus', '$jurusan')";
        $query = mysqli_query($conn, $sql);

        // apakah query update berhasil?
        if( $query ) {
            // kalau berhasil alihkan ke halaman list-daftar-anggota.php
            header("Location: index.php"); // Redirect kembali ke form jika sukses
        } else {
            // kalau gagal tampilkan pesan
            header("Location: index.php"); // Redirect kembali ke form jika sukses
        }
    } else {
        die("Akses dilarang...");
    }
?>