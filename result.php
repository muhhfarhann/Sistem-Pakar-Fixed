<?php
require 'function.php';

// Check if nothing session in key gejala
if (!isset($_SESSION["gejala"]) && empty($_SESSION["gejala"])) {
    header('Location: question.php');
    echo "
    <script>
        alert('Sorry not available to access!');
    </script>";
    exit;
}

$kodeKerusakan = $_SESSION["kodeKerusakan"];
$gejalaData = query("
    SELECT g.namaGejala
    FROM rule r
    JOIN gejala g ON r.kodeGejala = g.kodeGejala
    WHERE r.kodeKerusakan = '$kodeKerusakan'
");

// Menggabungkan semua nama gejala menjadi satu string
$namaGejalaList = array_column($gejalaData, 'namaGejala');
$namaGejalaString = implode(', ', $namaGejalaList);  // Pisahkan dengan koma

// fetch solusi matched with kodeKerusakan
$solusi = query("SELECT solusi FROM solusi WHERE kodeKerusakan = '$kodeKerusakan'")[0];

if(isset($_POST["submit"])) {
    if(insertKonsultasi($_SESSION) > 0) {
        echo "
        <script>
            alert('Successfully!');
        </script>
        ";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Diagnosa</title>
    
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
    <!-- Print CSS -->
    <style>
        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
</head>
<body>

    <!-- Navbar Start -->
    <nav class="navbar navbar-dark bg-dark navbar-expand-lg">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <a href=""><h5>INTELE<span class="text-success">GENT</span></h5></a>
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

    <section class="main" id="main">
        <div class="container">
            <h2>Hasil<span class="text-success"> Diagnosa</span></h2>
            <p><?= $_SESSION["namaKerusakan"]; ?></p>
            <div class="row">
                <table class="table table-hover">
                    <thead class="table-info">
                        <tr>
                            <th>NO.</th>
                            <th>Gejala Yang Dialami</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                            <?php foreach($_SESSION['gejala'] as $gejala) : ?>
                                <tr class="table">
                                    <td><?= $no; ?></td>
                                    <td><?= $gejala; ?></td>
                                </tr>
                                <?php $no++; ?>
                            <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="row">
                <table class="table table-hover">
                    <thead class="table-info">
                        <tr>
                            <th>Penyebab</th>
                            <th>Solusi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="table">
                            <td><?php echo htmlspecialchars($namaGejalaString); ?></td>
                            <td><?= htmlspecialchars($solusi["solusi"]); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="row no-print">
                <div class="col-md-2">
                    <a href="userPage.php" class="btn btn-outline-success" onclick="return confirm('Want To Back?');">Consult Again</a>
                </div>
                <div class="col-md-2">
                    <form action="" method="post">
                        <input type="hidden" name="data" value="<?= $_SESSION; ?>">
                        <button type="submit" class="btn btn-outline-success" name="submit">SAVE</button>
                    </form>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-outline-success" onclick="window.print()">Print</button>
                </div>
            </div>
        </div>
    </section>

    <!-- local js -->
    <script src="jsc/index.js"></script>
    <!-- Feather Icons -->
    <script>
        feather.replace();
    </script>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- Core theme JS-->
    <script src="jsc/index.js"></script>
    <!-- SB Forms JS -->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>    
</body>
</html>
