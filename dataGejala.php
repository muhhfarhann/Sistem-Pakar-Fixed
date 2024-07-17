<?php 

require 'function.php';
$data = query("SELECT * FROM gejala");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Gejala</title>
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
    <link rel="stylesheet" href="css/gejala.css">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>

    <?php
        // Ambil halaman saat ini
        $current_page = basename($_SERVER['PHP_SELF']);

        // Definisikan apakah halaman saat ini adalah halaman Home
        $is_home_page = ($current_page == 'dataGejala.php');
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
                <a href="dataKerusakan.php">Data Kerusakan</a>
                <a href="dataGejala.php" class="nav-link <?php if ($is_home_page) echo 'disabled'; ?>">Data Gejala</a>
                <a href="solusi.php">Solusi</a>
                <a href="insertGejala.php" onclick="return confirm('Add data?');" title="ADD DATA">
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
        <h3 class="text-center">Data Gejala</h3> 
        <div class="table-content">
            <table border="1" cellpadding="10" cellspacing="0" style="width:70%";>
                <tr>
                    <th>No</th>
                    <th>Kode Gejala</th>
                    <th>Nama Gejala</th>
                    <th>Aksi</th>
                </tr>
                <?php $i= 1; ?>
                <?php foreach( $data as $dt ) : ?>
                    <tr>
                        <td align="center"><?= $i; ?></td>
                        <td><?= $dt["kodeGejala"]; ?></td>
                        <td><?= $dt["namaGejala"]; ?></td>
                        <td>
                            <a href="updateGejala.php?kodeGejala=<?= $dt["kodeGejala"]; ?>">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <a href="function.php?action=deleteGejala&kodeGejala=<?= $dt["kodeGejala"]; ?>" class="red" onclick="return confirm('Yakin Hapus Data?');">
                                <i class="bi bi-x-lg"></i>
                            </a>
                        </td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
            </table>
        </div>
    </div>

<!-- Feather Icons -->
<script>
feather.replace();
</script>
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