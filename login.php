<?php 

require 'function.php';
// for showing paragraf under title
$error = false;

// if button submit was click
if ( isset($_POST["submit"]) ) {
    // Memeriksa apakah hasil query mengembalikan baris data
    if ( login($_POST)> 0) {
        // Login berhasil
        echo"
        <script>
            document.location.href = 'home.php';
        </script>
        ";
        exit; // Pastikan untuk keluar setelah melakukan redireksi
    } else {
        // Login gagal
        echo "
        <script>
            alert('Failed');
        </script>
        ".$error = true;
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Pages</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- My Css -->
    <link rel="stylesheet" href="css/login.css">
</head>
<body>

    <!-- Nav -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Intele<span class="text-success">gent</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="about.php">About us</a>
                </li>
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="signUp.php">Sign Up</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>

    <!-- Hero -->
    <section class="hero">
        <main class="content">
            <div class="row text-center">
                <h1 class="text-center">Halaman <span class="text-success">Masuk</span></h1>
                <?php if($error) : ?>
                    <p style="font-style: italic; color: red;">please valid input</p>
                <?php endif; ?>
            </div>
            <div class="row ms-auto justify-content-center">
                <div class="col-md-10">
                    <form action=" " method="post">.
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="username" aria-describedby="username" name="username">
                                </div>
                                <div class="-mb-4">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control mb-4" id="password" name="password">
                                    <button type="submit" class="btn btn-success" name="submit">Login</button>
                                    <!-- Tambahkan ikon putar di bawah -->
                                    <div class="spinner-border text-light d-none" role="status" id="loginSpinner">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="role" class="form-label">Who's?</label>
                                    <input type="text" class="form-control" id="role" name="role" placeholder="Ex ADMIN">
                                </div>
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="Check">
                                    <label class="form-check-label" for="Check" name="check">Check me out</label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div> 
        </main>
    </section>
    <!-- End Hero -->

<!-- Feather Icons -->
<script>
    feather.replace();
</script>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>
<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
<!-- * *                               SB Forms JS                               * *-->
<!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    
</body>
</html>