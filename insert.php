<?php 

require 'function.php';

if (isset($_POST["submit"])) {

    if ( insertData($_POST) > 0 ) {

        echo "
            <script>
                alert('Success');
                document.location.href = 'dataKerusakan.php';
            </script>
        ";

    }else{

        echo "
            <script>
                alert('Failed!');
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
    <title>Insert Data</title>
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
    <link rel="stylesheet" href="css/insert.css">
</head>
<body>

    <div class="container border">
        <div class="content border">
            <div class="row text-center">
                <h2>INSERT DATA KERUSAKAN</h2>
            </div>
            <div class="row">
                <form action="" method="post">
                    <div class="row mb-3">
                        <label for="kode" class="col-sm-2 col-form-label">Kode Kerusakan</label>
                        <div class="col-sm-2">
                        <input type="text" class="form-control" name="kodeKerusakan" id="kode" placeholder="TYPE HERE">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="nama" class="col-sm-2 col-form-label">Nama Kerusakan</label>
                        <div class="col-sm-3">
                        <input type="text" class="form-control" id="nama" name="namaKerusakan" placeholder="TYPE HERE">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="rule" class="col-sm-2 col-form-label">Rule</label>
                        <div class="col-sm-3">
                        <textarea class="txt" name="rule" id="rule"></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="solusi" class="col-sm-2 col-form-label">Solusi</label>
                        <div class="col-sm-3">
                        <textarea class="txt" name="solusi" id="solusi"></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <a href="dataKerusakan.php">Back</a>
                        <div class="col-sm justify-content-end">
                            <button type="submit" class="btn btn-success" name="submit">Push</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

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