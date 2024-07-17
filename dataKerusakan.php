<?php 

require 'function.php';

$sql= "SELECT * FROM kerusakan";

$result = query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Kerusakan</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- My CSS -->
    <link rel="stylesheet" href="css/dataKerusakan.css">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
    <?php
    // Ambil halaman saat ini
    $current_page = basename($_SERVER['PHP_SELF']);

    // Definisikan apakah halaman saat ini adalah halaman Home
    $is_home_page = ($current_page == 'dataKerusakan.php');
    ?>

    <!-- Navbar Start -->
    <nav class="navbar">
        <div class="container">
            <div class="navbar-brand">
                Intellegent.
            </div>
            <div class="navbar-nav">
                <a href="home.php">Home</a>
                <a href="dataUser.php">User</a>
                <a href="#table" class="nav-link <?php if ($is_home_page) echo 'disabled'; ?>">Data Kerusakan</a>
                <a href="dataGejala.php">Data Gejala</a>
                <a href="solusi.php">Solusi</a>
                <a href="insertKerusakan.php" title="ADD DATA">
                    <i data-feather="plus"></i>
                </a>
                <a href="login.php" onclick="return confirm('Want to logout?');">
                    <i data-feather="log-out" width="20" height="20"></i>
                </a>
            </div>
        </div>
    </nav>


    <!-- Table -->
    <div class="table" id="table">
        <h3>Data Kerusakan</h3>
        <div class="table-content">
            <table border="1" cellpadding="10" cellspacing="0" style="width:90%";>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Kerusakan</th>
                        <th>Nama Kerusakan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <?php if(count($result) > 0 ) : ?>
                    <?php $i = 1; ?>
                    <?php foreach( $result as $data ) : ?>
                        <tbody>
                            <tr>
                                <td align="center"><?= $i; ?></td>
                                <td><?= $data["kodeKerusakan"]; ?></td>
                                <td><?= $data["namaKerusakan"]; ?></td>
                                <td class="btn">
                                    <a href="update.php?kodeKerusakan=<?= $data["kodeKerusakan"]; ?>">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <a href="function.php?action=delete&kodeKerusakan=<?= $data["kodeKerusakan"]; ?>" onclick="return confirm('Yakin Ingin Menghapus?');">
                                        <i class="bi bi-trash3"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan='5'>Tidak ada data</td>
                    </tr>
                <?php endif; ?>
            </table>
        </div>
    </div>


<!-- Feather Icons -->
<script>
feather.replace();
</script>
<!-- My Js -->
<script src="jsc/index.js"></script>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>
<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
<!-- * *                               SB Forms JS                               * *-->
<!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>    
</body>
</html>