<?php
    include("config.php");

    if( isset($_GET['no']) ){
        
        // ambil np dari query string
        $no = $_GET['no'];
        
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