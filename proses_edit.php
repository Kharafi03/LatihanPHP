<?php
session_start();
    include("config.php");

    // cek apakah tombol sudah diklik atau belum?
    if(isset($_POST['simpan'])){
        
        // ambil data dari formulir edit
        $no = $_POST['no'];
        $gambar_old = $_POST['gambar_old'];
        $gambar_new = $_FILES['gambar']['name'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $agama = $_POST['agama'];
        $kampus = $_POST['kampus'];
        $jurusan = $_POST['jurusan'];

        if ($gambar_new != "") {
            $update_gambar = $gambar_new;
        } else {
            $update_gambar = $gambar_old;
        }

        if(file_exists("img/$gambar_new")){
            // $gambar_new = $_FILES['gambar']['name'];
            $_SESSION['message'] = $gambar_new.' File Gambar sudah ada';
            header("Location: form_edit.php");
        } else {
            // buat query update
            $sql = "UPDATE kelompok SET no='$no', gambar='$update_gambar', nama='$nama', alamat='$alamat', jenis_kelamin='$jenis_kelamin', agama='$agama', kampus='$kampus', jurusan='$jurusan' WHERE no='$no'";
            $query = mysqli_query($conn, $sql);
    
            // apakah query update berhasil?
            if( $query ) {
                move_uploaded_file($_FILES['gambar']['tmp_name'], 'img/'.$update_gambar);
                unlink("img/$gambar_old");
                $_SESSION['message'] = 'Data berhasil ditambahkan';
                // kalau berhasil alihkan ke halaman index.php
                header("Location: index.php"); // Redirect kembali ke form jika sukses
            } else {
                // kalau gagal tampilkan pesan
                header("Location: index.php"); // Redirect kembali ke form jika sukses
            }
        }
    } else { // jika tidak ada no di query string
        die("Akses dilarang...");
    }
?>