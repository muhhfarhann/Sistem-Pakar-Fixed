<?php 

require 'function.php';
$data1 = query("SELECT * FROM dataKerusakan");
$data2 = query("SELECT * FROM dataGejala");

if ( isset($_POST["submit"]) ) {

    var_dump($_POST);die;

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pengetahuan</title>
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
    <link rel="stylesheet" href="css/dataP.css">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php
    // Ambil halaman saat ini
    $current_page = basename($_SERVER['PHP_SELF']);

    // Definisikan apakah halaman saat ini adalah halaman Home
    $is_home_page = ($current_page == 'dataPengetahuan.php');
    ?>

    <!-- Navbar Start -->
    <nav class="navbar navbar-dark bg-dark navbar-expand-lg">
        <div class="container-sm">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#dataKerusakan.php">Data Kerusakan</a>
                </li>
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="dataGejala.php">Data Gejala</a>
                </li>
                <li class="nav-item">
                <a class="nav-link disabled" aria-current="page" href="dataGejala.php" aria-disabled="true">Data Pengetahuan</a>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Other
                </a>
                <ul class="dropdown-menu bg-primary">
                    <li><a class="dropdown-item" href="login.php" onclick="
                    return confirm('Want to logout?'); ">Logout</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
                </li>
            </ul>
            </div>
        </div>
    </nav>

    <!-- form -->
    <section class="form mt-5">
        <div class="container-sm">
            <form action="" method="post">
                <div class="row">
                    <h5>Data Pengetahuan</h5>
                </div>
                <div class="row justify-content-center pb-3">
                    <div class="col-2">
                        <label for="DataKerusakan">Kerusakan</label>
                    </div>
                    <div class="col">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownKerusakan" data-bs-toggle="dropdown" aria-expanded="false">
                            -Pilih Kerusakan Jaringan LAN-
                        </button>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownKerusakan">
                            <?php foreach($data1 as $dt) : ?>
                                <li><a class="dropdown-item" href="#" onclick="selectKerusakan('<?= $dt["kodeKerusakan"] ?>', '<?= $dt["namaKerusakan"] ?>')"><?= $dt["kodeKerusakan"]." ".$dt["namaKerusakan"]; ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                        <input type="hidden" name="kodeKerusakan" id="selectedKerusakan">
                    </div>
                </div>
                <div class="row justify-content-center pb-3">
                    <div class="col-2">
                        <label for="DataKerusakan">Gejala</label>
                    </div>
                    <div class="col">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownGejala" data-bs-toggle="dropdown" aria-expanded="false">
                            -Pilih Gejala Kerusakan Jaringan LAN-
                        </button>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownGejala">
                            <?php foreach($data2 as $dt) : ?>
                                <li><a class="dropdown-item" href="#" onclick="selectGejala('<?= $dt["kodeGejala"] ?>', '<?= $dt["namaGejala"] ?>')"><?= $dt["kodeGejala"]." ".$dt["namaGejala"]; ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                        <input type="hidden" name="kodeGejala" id="selectedGejala">
                    </div>
                </div>
                <div class="row justify-content-center pb-3">
                    <div class="col-2">
                        <label for="DataKerusakan">Pertanyaan</label>
                    </div>
                    <div class="col">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownPertanyaan" data-bs-toggle="dropdown" aria-expanded="false">
                            -Pilih Pertanyaan Kerusakan Jaringan LAN-
                        </button>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownPertanyaan">
                            <?php foreach($data1 as $dt) : ?>
                                
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <button class="btn btn-success" type="submit" name="submit">SAVE</button>
            </form>
        </div>
    </section>

<!-- Feather Icons -->
<script>
feather.replace();
</script>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>
<!-- My js -->
<script src="jsc/index.js"></script>
<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
<!-- * *                               SB Forms JS                               * *-->
<!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>    
</body>
</html>