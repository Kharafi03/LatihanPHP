<?php
    session_start();
    include("config.php");

    if( isset($_GET['no']) ){
        // ambil no dari query string
        $no = $_GET['no'];
        $data = mysqli_query($conn, "SELECT * FROM kelompok WHERE no = $no");
        $row = mysqli_fetch_array($data);

        // hapus gambar
        $gambar = $row['gambar'];
        $nama = $row['nama'];
        if (file_exists("img/$gambar")) {
            unlink("img/$gambar");
        }
        
        // buat query hapus
        $sql = "DELETE FROM kelompok WHERE no=$no";
        $query = mysqli_query($conn, $sql);

        // apakah query hapus berhasil?
        if( $query ){
            // Update nomor urut anggota setelah anggota yang dihapus
            $sql_update = "UPDATE kelompok SET no = no - 1 WHERE no > $no"; // 
            $query_update = mysqli_query($conn, $sql_update);
            // apakah query hapus berhasil?
            if ($query_update) {
                $_SESSION['delete'] = 'Anggota ' .$nama.' berhasil dihapus'; // Tampilkan pesan
                header('Location: index.php');
            } else { // jika gagal
                die("Gagal menghapus anggota...");
            }
        } else { // jika gagal
            die("Gagal menghapus anggota...");
        }
        
    } else { // jika tidak ada no di query string
        die("akses dilarang...");
    }
?>