<?php
    session_start();
    include("config.php");

    // cek apakah tombol sudah diklik atau belum?
    if(isset($_POST['simpan'])){
        
        // ambil data dari formulir edit
        $no = $_POST['no'];
        $gambar_old = $_POST['gambar_old']; // Mengambil nama file gambar lama\
        $gambar_new = $_FILES['gambar']['name']; // Mengambil nama file gambar baru
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $agama = $_POST['agama'];
        $kampus = $_POST['kampus'];
        $jurusan = $_POST['jurusan'];

        // Jika tidak ada file gambar baru yang di-upload atau nama file baru sama dengan nama file lama
        if (empty($gambar_new) || $gambar_new == $gambar_old) {
            $update_gambar = $gambar_old; // Gunakan nama file gambar lama
        } else {
            // Jika ada file gambar baru yang di-upload sudah ada di folder img
            if(file_exists("img/$gambar_new")){
                $_SESSION['pesan'] ='Gambar ' .$gambar_new.' sudah ada';
                header("Location: form_edit.php?no=$no");
                exit;
            }
            $update_gambar = $gambar_new; // Gunakan nama file gambar baru
        }
        // buat query update
        $sql = "UPDATE kelompok SET no='$no', gambar='$update_gambar', nama='$nama', alamat='$alamat', jenis_kelamin='$jenis_kelamin', agama='$agama', kampus='$kampus', jurusan='$jurusan' WHERE no='$no'";
        $query = mysqli_query($conn, $sql);
    
        // apakah query update berhasil?
        if( $query ) {
            if ($gambar_new != $gambar_old) { // Jika gambar lama tidak sama dengan gambar baru
                move_uploaded_file($_FILES['gambar']['tmp_name'], 'img/'.$update_gambar); // Upload gambar baru
                unlink("img/$gambar_old"); // Hapus gambar lama
            }
            $_SESSION['message'] = 'Anggota ' .$nama.' berhasil diedit'; // Tampilkan pesan
            // kalau berhasil alihkan ke halaman index.php
            header("Location: index.php"); // Redirect kembali ke form jika sukses
        } else {
            // kalau gagal tampilkan pesan
            $_SESSION['message'] = 'Error: ' . mysqli_error($conn);
            header("Location: index.php"); // Redirect kembali ke form jika sukses
        }
        // }
    } else { // jika tidak ada no di query string
        die("Akses dilarang...");
    }
?>