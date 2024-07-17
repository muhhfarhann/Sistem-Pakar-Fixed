<?php 

require 'function.php';

$query = "SELECT * FROM kerusakan";

$result = query($query);

$error = false;

if (isset($_POST["submit"])) {

    if( !isset($_POST["check"]) AND !isset($_POST["kodeKerusakan"]) ){
        $error = true;
    }elseif ( insertGejala($_POST) > 0 ) {

        echo "
            <script>
                document.location.href = 'dataGejala.php';
            </script>
        ";exit;

    }else{

        echo "
            <script>
                alert('Failed!');
            </script>
        ";

    }

}elseif( isset($_POST["back"]) ){

    header("Location: dataGejala.php");exit;

}

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
    <link rel="stylesheet" href="css/insertK.css">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>

    <?php
        // Ambil halaman saat ini
        $current_page = basename($_SERVER['PHP_SELF']);

        // Definisikan apakah halaman saat ini adalah halaman Home
        $is_home_page = ($current_page == 'insertGejala.php');
    ?>

    <!-- Navbar Start -->
    <nav class="navbar">
        <div class="container">
            <div class="navbar-brand">
                Intellegent.
            </div>
            <div class="navbar-nav">
                <a href="home.php">Home</a>
                <a href="dataKerusakan.php">Data Kerusakan</a>
                <a href="dataGejala.php" class="nav-link">Data Gejala</a>
                <a href="solusi.php">Solusi</a>
                <a href="" class="nav-link <?php if($is_home_page){ echo"disabled"; } ?>" title="ADD DATA">
                    <i data-feather="plus"></i>
                </a>
                <a href="login.php" onclick="return confirm('Want to logout?');">
                    <i data-feather="log-out" width="20" height="20"></i>
                </a>
            </div>
        </div>
    </nav>

    <!-- Form Start -->
    <section class="form" id="form">
        <div class="container">
            <h4>INSERT DATA GEJALA</h4>
            <?php if($error) : ?>
                <p style="font-style: italic; color: red; text-align: center;">Please push checkbox and Please Choose Kode Kerusakan</p>
            <?php endif; ?>
            <form action="" method="post">
                <div class="row">
                    <select name="kodeKerusakan" id="kerusakan">
                        <option value="" selected disabled>Pilih Kerusakan Untuk Gejala</option>
                        <?php foreach($result as $data) : ?>
                            <option value="<?= $data['kodeKerusakan']; ?>"><?= $data["kodeKerusakan"]." - ".$data["namaKerusakan"]; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="row">
                    <label for="kode">Kode Gejala</label>
                    <input type="text" name="kodeGejala" id="kode" autocomplete="off">
                </div>
                <div class="row">
                    <label for="gejala">Nama Gejala</label>
                    <input type="text" name="namaGejala" id="gejala" autocomplete="off">
                </div>
                <div class="row check">
                    <input type="checkbox" name="check" id="check" class="checkbox">
                    <label for="check">Check Me Out</label>
                </div>
                <button type="submit" name="back" class="btn-back">Back</button>
                <button type="submit" name="submit">Submit</button>
            </form>
        </div>
    </section>
    <!-- Form End -->
    

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