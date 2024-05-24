<?php 

require 'function.php';
$data1 = query("SELECT * FROM dataKerusakan"); 

if (isset($_POST["submit"])) {
    $error = false;
    if (!empty($_POST["kodeKerusakan"])) {
        $kodeKerusakan = $_POST["kodeKerusakan"];

        $_SESSION["kodeKerusakan"] = $kodeKerusakan;
        header("Location: question.php");
        exit;

    }else{
        $error =true;
    }

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
    <link rel="stylesheet" href="css/userP.css">
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
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Features</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Pricing</a>
                </li>
                <li class="nav-item">
                <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>

    <!-- Table -->
    <section class="container-content" id="container">
        <div class="content">
            <form action="" method="post">
                <div class="row">
                    <h5>Start Consult</h5> 
                    <?php if(isset($error)) : ?>
                        <p style="color: red; font-style: italic;">data tidak boleh kosong</p>
                    <?php endif; ?>
                </div>
                <div class="row mb-2">
                    <div class="col">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownKerusakan" data-bs-toggle="dropdown" aria-expanded="false">
                            -Pilih Kerusakan Jaringan LAN-
                        </button>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownKerusakan">
                            <?php foreach($data1 as $dt) : ?>
                                <li><a class="dropdown-item" href="#" onclick="selectKerusakan('<?= $dt["kodeKerusakan"] ?>', '<?= $dt["namaKerusakan"] ?>')"><?= $dt["kodeKerusakan"]." ".$dt["namaKerusakan"]; ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                        <input type="hidden" name="kodeKerusakan" id="selectedKerusakan" required>
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
<script src="jsc/index.js"></script>
<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
<!-- * *                               SB Forms JS                               * *-->
<!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>    
</body>
</html>