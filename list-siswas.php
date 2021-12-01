<?php
    require ("config.php");
    $sql="SELECT * FROM calon_siswa";
    $siswas = mysqli_query($db,$sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <!-- SweetAlert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <title>PPDB Jawa Timur</title>
    <link rel="shortcut icon" href="/logo-big.png" type="image/x-icon">
</head>

<body>
    <header class="sticky-top">
        <nav class="navbar shadow d-flex justify-content-between pt-3" style="background-color: #0275d8;">
            <div class="container align-items-center">
                <a href="index.php" style="color:white; text-decoration:none">
                    <i class="bi bi-arrow-left-circle-fill me-2"></i>
                    Kembali ke menu utama
                </a>
                <div class="content d-flex align-items-center">
                    <img src="/logo-big.png" alt="" width="60px" height="60px">
                    <h4 class="me-2">PPDB Jatim | </h4>
                    <h5 style="color:white;"> List Pendaftar SMA</h5>
                </div>
            </div>
        </nav>
    </header>

    <div class="container">
        <?php if(isset($_GET['status'])): ?>
            <p>
                <?php
                    if($_GET['status'] == 'sukses') {
                        echo "<div class=\"alert alert-success mt-4\" role=\"alert\">";
                        echo "Pendaftaran siswa baru berhasil!";
                        echo "</div>";
                    } else {
                        echo "<div class=\"alert alert-danger mt-4\" role=\"alert\">";
                        echo "Pendaftaran gagal";
                        echo "</div>";
                    }
                ?>
            </p>
        <?php endif; ?>
    </div>

    <div class="container shadow my-3 py-5 px-5 border rounded-3">
        <div style="background: #0275d8; height: 6rem" class="px-3 d-flex align-items-center mb-3">
            <h2 class="fs-1" style="color:white;font-weight: bold;">
                Data Pendaftar Jenjang SMA <span style="font-size: 1.2rem; font-weight: lighter">Tahun Ajaran 2021/2022</span>
            </h2> 
        </div>
        <div class="mb-3 d-flex justify-content-end">
            <a href="form-daftar.php">
                <button class="btn btn-success">[+] Tambah Baru</button>
            </a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Agama</th>
                    <th scope="col">Sekolah Asal</th>
                    <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $counter=1;?>
                    <?php foreach( $siswas as $siswa) :?>
                        <tr>
                            <th scope="row"><?= $counter++ ?></th>
                            <td><?= $siswa["nama"]?></td>
                            <td><?= $siswa["alamat"]?></td>
                            <td><?= $siswa["jenis_kelamin"]?></td>
                            <td><?= $siswa["agama"]?></td>
                            <td><?= $siswa["sekolah_asal"]?></td>
                            <td>
                                <a href="form-edit.php?id=<?= $siswa["id"] ?>">
                                    <button type="button" name="edit" class="btn btn-warning">Edit</button>
                                </a>
                                <a href="hapus.php?id=<?= $siswa["id"]?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data?')">
                                    <button type="button" class="btn btn-danger">Hapus</button>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <p>Total: <?php echo mysqli_num_rows($siswas) ?></p>
    </div>
</body>
</html>