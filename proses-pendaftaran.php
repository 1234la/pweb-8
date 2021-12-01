<?php
//Note :
// - "include" akan memproduksi error warning, yang mana kode program selanjutnya masih akan tetap dieksekusi.
// - "require" akan memproduksi fatal error yang akan memberhentikan alur kerja program yang artinya kode program selanjutnya tidak akan pernah dieksekusi.
// - dianjurakan menggunakan "require" krn akan memudahkan kita mendeteksi error jika terjadi error, dan mengurangi celah keamanan dari projek yang kita bangun.

require("config.php");
    //isset -> mengecek apakah variable tersebut tlah dibuat belum?
    // cek apakah tombol daftar sudah diklik atau blum?
    if(isset($_POST['submit'])){

    // ambil data dari formulir
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jk = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $sekolah = $_POST['sekolah_asal'];

    // buat query
    $sql = "INSERT INTO calon_siswa (nama, alamat, jenis_kelamin, agama, sekolah_asal) VALUE ('$nama', '$alamat', '$jk', '$agama', '$sekolah')";
    $query = mysqli_query($db, $sql);

    // apakah query simpan berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location: list-siswas.php?status=sukses');
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        header('Location: list-siswas.php?status=gagal');
    }

} else {
    die("Akses dilarang...");
}

?>