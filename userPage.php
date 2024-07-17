<?php 

require 'function.php';
$data1 = query("SELECT * FROM kerusakan"); 

if ( isset($_POST["submit"]) ) {

    $error = false;
    if ( isset($_POST["namaKerusakan"]) && isset($_POST["kodeKerusakan"]) && !empty($_POST["namaKerusakan"]) ) {

        $kodeKerusakan = $_POST["kodeKerusakan"];
        $Kerusakan = $_POST["namaKerusakan"];

        $_SESSION["kodeKerusakan"] = $kodeKerusakan;
        $_SESSION["namaKerusakan"] = $Kerusakan;
        $_SESSION["username"];
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
            <a href="homeUser.php"><h5>INTELE<span class="text-success">GENT</span></h5></a>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="homeUser.php">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="login.php" onclick="return confirm('Want To Logout?');"><i data-feather="log-out" width="20"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- main start -->
    <main id="main" class="main mt-4">
        <div class="container">
            <div class="row row-first">
                <div class="col-md text-center">
                    <h4 class="text-success">Select Kerusakan!</h4>
                    <?php if( isset($error )) : ?>
                        <p class="text-center text-danger" style="font-style: italic;">Please input first</p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md">
                    <form action="" method="post"> 
                        <select id="selectKerusakan" class="form-select form-select-sm mt-4 mb-4" aria-label=".form-select-sm example" onchange="updateInputValue()">
                            <option selected disabled>Open this select menu</option>
                            <?php foreach($data1 as $dt): ?>
                                <option value="<?= $dt["kodeKerusakan"]."|".$dt["namaKerusakan"]; ?>"><?= $dt["namaKerusakan"]; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <input type="hidden" id="inputKerusakan" name="namaKerusakan" value="">
                        <input type="hidden" id="inputKodeKerusakan" name="kodeKerusakan" value="">
                        <button type="submit" class="btn btn-outline-success btn-sm" name="submit">Submit</button>
                    </form>
                </div>
                <div class="col-md">
                    <img class="" src="assets/img/s.png" alt="" width="150">
                </div>
            </div>
        </div>
    </main>
    <!-- main start -->

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