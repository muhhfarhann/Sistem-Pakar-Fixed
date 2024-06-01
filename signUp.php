<?php 
require 'function.php';

if ( isset($_POST["submit"]) ) {
    
    if( signUp($_POST) > 0){
        echo"
        <script>
            alert('Success');
            document.location.href = 'login.php';
        </script>
        ";
    }else{
        echo"
        <script>
            alert('Fail Insert Data');
            document.location.href = 'signup.php';
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
    <title>Sign Up</title>
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
    <link rel="stylesheet" href="css/signup.css">
</head>
<body>

    <div class="container">
        <h2>SIGNUP</h2>
        <div class="content">
            <form action="" method="post" autocomplete="off">
                <div class="row">
                    <div class="col-md-8 mb-3">
                        <label for="username" class="form-label">username</label>
                        <input type="text" class="form-control" id="username" aria-describedby="emailHelp" style="width:80%;" name="username" required>
                        <div id="emailHelp" class="form-text" style="font-style:italic;color:red;">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="col-md">
                        <input type="hidden" class="form-control" id="role" style="width:50%;" name="role" value="user" required>
                    </div>
                </div>
                <div class="row-md">
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" style="width:50%;" name="password" required>
                    </div>
                </div>
                <div class="row-md">
                    <div class="col-md-6 mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <div class="col-md">
                        <a href="login.php" style="text-decoration: none; color: green;">BACK</a>
                    </div>
                </div>
                <div class="row-md">
                    <button type="reset" class="btn btn-warning me-4" name="submit">Reset</button>
                    <button type="submit" class="btn btn-success" name="submit" required>Submit</button>
                </div>
            </form>
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