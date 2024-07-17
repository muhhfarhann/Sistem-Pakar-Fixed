<?php 
require 'function.php';

$id = htmlspecialchars($_GET["idKonsultasi"]);
$sql = "SELECT * FROM dataKonsultasi WHERE idKonsultasi='$id'";
$result = query($sql)[0];
$error = false;

if (isset($_POST["submit"])) {

    if (!isset($_POST["check"])) {
        $error = true;
    } elseif (updateUser($_POST) > 0) {
        echo "
        <script>
            alert('Successfully Updated');
            document.location.href='dataUser.php';
        </script>
        ";
        exit;
    } else {
        echo "
        <script>
            alert('Fail!');
        </script>
        ";
    }
} elseif (isset($_POST["back"])) {
    header('Location: dataUser.php');
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data</title>
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
    <link rel="stylesheet" href="css/updateData.css">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <main class="main" id="main">
        <h2 class="text-center text-success">Update Konsultasi User</h2>
        <?php if ($error) : ?>
            <p style="color:red;font-style:italic;" class="text-center">Please click the check button!</p>
        <?php endif; ?>
        <div class="container border shadow-lg w-50 p-4">
            <div class="row">
                <form action="" method="post" class="row g-3" data-sb-form-api-token="your-token-here">
                    <input type="hidden" name="idKonsultasi" value="<?= $result["idKonsultasi"]; ?>">
                    <div class="col-md-12">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="username" id="nama" value="<?= $result["username"]; ?>" autocomplete="off" required>
                    </div>
                    <div class="col-md-12">
                        <label for="nk" class="form-label">Nama Kerusakan</label>
                        <input type="text" class="form-control" name="namaKerusakan" id="nk" value="<?= $result["namaKerusakan"]; ?>" autocomplete="off" required>
                    </div>
                    <div class="col-md-12">
                        <label for="gejala" class="form-label">Gejala</label>
                        <input type="text" class="form-control" name="gejala" id="gejala" value="<?= $result["gejala"]; ?>" autocomplete="off" required>
                    </div>
                    <div class="col-12 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1" name="check">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-secondary" name="back">Back</button>
                        <button type="submit" class="btn btn-success" name="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <!-- Feather Icons -->
    <script>
        feather.replace();
    </script>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script> <!-- Ensure this path is correct -->
    <!-- SB Forms JS-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script> <!-- Ensure this path is correct -->
</body>
</html>
