<?php 

require 'function.php';

if ( !isset($_SESSION["kodeKerusakan"]) && !isset($_SESSION["namaKerusakan"]) ) {
    header("Location: userPage.php");
    exit;
}else if( isset($_SESSION["kodeKerusakan"]) ){

    $kodeKerusakan = $_SESSION["kodeKerusakan"];
    $namaKerusakan = $_SESSION["namaKerusakan"];
}

$kerusakanData = query("SELECT * FROM rule WHERE kodeKerusakan = '$kodeKerusakan'");

// Buat array untuk menyimpan semua kode gejala yang berhubungan dengan kode kerusakan
$kodeGejalaList = [];
foreach ($kerusakanData as $rule) {
    $kodeGejalaList[] = $rule['kodeGejala'];
}

// Konversi array ke string untuk digunakan dalam query SQL (format 'k001', 'k002', 'k003', ...)
$kodeGejalaListStr = implode("', '", $kodeGejalaList);

// Ambil data gejala yang sesuai dengan kode gejala dari array
$gejalaData = query("SELECT * FROM gejala 
                        WHERE 
                    kodeGejala IN ('$kodeGejalaListStr')");


if ( empty($gejalaData) ) {
    // If no data is found, redirect back to userPage.php
    header("Location: userPage.php");
    echo " 
    <script>
        alert('Data tidak ada');
    </script> 
    ";
    exit;
}

if (isset($_POST["submit"])) {
    
    $gejala = [];
    $gejalaList = $_POST["gejala"];
    foreach($gejalaList as $gjl) {
        if (!empty($gjl)) {
            $gejala[] = $gjl;
        }       
    }

    $_SESSION["gejala"] = $gejala;  

    if (isset($_SESSION["gejala"]) && !empty($_SESSION["gejala"])) {
        header("Location: result.php");
        exit;
    }else{
        echo"
        <script>
            alert('PLEASE CHOOSE ONE!');
        </script>
        ";
    }
}elseif(isset($_POST["back"])){
    
    echo"
    <script>
        if(confirm('back?') === true ){
            document.location.href= 'userPage.php';
        }
    </script>
    ";

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User | PHP</title>
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
    <link rel="stylesheet" href="css/question.css">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

    <!-- Navbar Start -->
    <nav class="navbar navbar-dark bg-dark navbar-expand-lg">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <a href=""><h5>INTELEGENT</h5></a>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="homeUser.php">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="login.php" onclick="return confirm('Want To Logout?');"><i data-feather="log-out" width="20"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Table -->
    <section class="container-content" id="container">
        <div class="content mt-4">
            <form action="" method="post">
                <table class="table table-hover">
                    <thead class="table-info">
                        <tr>
                            <th colspan="2">Pertanyaan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($gejalaData as $gejala): ?>
                        <tr class="table">
                            <td>Apakah <?= $gejala["namaGejala"]; ?> ? </td>
                            <td>
                                <select class="form-select form-select-sm gejala-select" aria-label="Small select example" data-gejala="<?= $gejala["namaGejala"]; ?>">
                                    <option value="" selected disabled>Open</option>
                                    <option value="YES">Yes</option>
                                    <option value="NO">No</option>
                                </select>
                                <input type="hidden" name="gejala[]" value="">
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="row">
                    <div class="col">
                        <button type="submit" name="back" class="btn btn-outline-success">Kembali</button>
                        <button type="submit" name="submit" class="btn btn-outline-success">Submit</button>
                    </div>
                </div>
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
<script src="jsc/index.js"></script>
<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
<!-- * *                               SB Forms JS                               * *-->
<!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>    
</body>
</html>
