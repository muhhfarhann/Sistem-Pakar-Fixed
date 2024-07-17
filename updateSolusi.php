<?php 
require 'function.php';

$kodeKerusakan = $_GET["kodeKerusakan"];
$solusi = $_GET["solusi"];

$sql = "SELECT * FROM solusi WHERE kodeKerusakan='$kodeKerusakan' AND solusi='$solusi' ";

$result = query($sql)[0];


$error = false;

if (isset($_POST["submit"])) {

    if (!isset($_POST["check"]) AND !isset($_POST["kodeKerusakan"]) ) {
        $error = true;
    } elseif (updateSolusi($_POST) > 0) {
        echo "
        <script>
            alert('Successfully updated');
            document.location.href='solusi.php';
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
    header('Location: solusi.php');
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
        <h2 class="text-center text-success">Update Solusi</h2>
        <?php if ($error) : ?>
            <p style="color:red;font-style:italic;" class="text-center">Please click the check button!</p>
        <?php endif; ?>
        <div class="container border border-dark shadow-lg w-50">
            <div class="row">
                <form action="" method="post" class="row" data-sb-form-api-token="your-token-here">
                    <input type="hidden" name="kodeKerusakan" value="<?= $result["kodeKerusakan"]; ?>">
                    <div class="col-md">
                        <label for="solusi" class="form-label">Nama Solusi</label>
                        <textarea name="solusi" id="solusi" cols="50" autocomplete="off" required><?= $result["solusi"]; ?></textarea>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1" name="check">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div>
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
