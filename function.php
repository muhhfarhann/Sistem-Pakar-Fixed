<?php

// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "analisaLan");

error_reporting(E_ALL);
ini_set('display_errors', 1);

function query($query){
    global $conn;

    // get data
    $result = mysqli_query($conn, $query);
    // prepare empty array
    $rows = [];

    // get data from table
    while ( $row = mysqli_fetch_assoc($result) ) {
        // put a data in array a type of array is associative
        $rows [] = $row;
    }

    return $rows;

}

// Login
session_start();

function login($log) {
    global $conn;

    $username = $log["username"];
    $password = $log["password"];

    // Protect against SQL Injection
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Get user information from database without checking password in the query
    $query = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        
        // Verify password
        if (password_verify($password, $user['password'])) {
            $_SESSION['idUser'] = $user['idUser'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];

            if ($_SESSION['role'] === 'admin') {
                echo "
                <script>
                    alert('Successfully!');
                </script>
                ";
            } else {
                echo "
                <script>
                    alert('Success!');
                    document.location.href = 'homeUser.php';
                </script>
                ";
            }

            return mysqli_affected_rows($conn);
        } else {
            echo "
            <script>
                alert('Login failed, please check your username and password.');
            </script>
            ";
            return 0;
        }
    } else {
        echo "
        <script>
            alert('Login failed, please check your username and password.');
        </script>
        ";
        return 0;
    }
}   

// Signup
function signUp($data){
    global $conn;

    // Escape and sanitize input data
    $username = htmlspecialchars($data["username"]);
    $password = htmlspecialchars($data["password"]);

    $username = mysqli_real_escape_string($conn, $username);

    // Check if username already exists
    $query = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        echo "
        <script>
            alert('Username sudah digunakan, silakan pilih username lain');
        </script>
        ";
        return 0; // Username sudah ada, kembalikan 0 untuk menandakan error
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Determine user role based on username
    if (strtolower(substr($username, 0, 5)) === 'admin') {
        $role = 'admin';
    } else {
        $role = 'user';
    }

    // Insert user into the database using prepared statement
    $stmt = $conn->prepare("INSERT INTO users (username, password, role) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $hashed_password, $role);

    if ($stmt->execute()) {
        echo "
        <script>
            alert('Registrasi berhasil!');
            document.location.href = 'login.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Registrasi gagal. Silakan coba lagi.');
            window.history.back();
        </script>
        ";
    }

    $stmt->close();
    $conn->close();

    return mysqli_affected_rows($conn);
}

// insert
function insertData($data){
    global $conn;

    $kodeKerusakan = htmlspecialchars($data["kodeKerusakan"]);
    $namaKerusakan = htmlspecialchars($data["namaKerusakan"]);
    $rule = htmlspecialchars($data["rule"]);
    $solusi = htmlspecialchars($data["solusi"]);

    $query = "INSERT INTO dataKerusakan 
                VALUES(
                    NULL,
                    '$kodeKerusakan',
                    '$namaKerusakan',
                    '$rule',
                    '$solusi'
                )
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}

// insertKerusakan
function insertKerusakan( $data ){

    global $conn;

    $kodeKerusakan = htmlspecialchars($data["kodeKerusakan"]);
    $namaKerusakan = htmlspecialchars($data["namaKerusakan"]);

    $sql = "SELECT * FROM kerusakan WHERE kodeKerusakan='$kodeKerusakan'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "
        <script>
            alert('Kode sudah digunakan, silakan pilih kode lain');
        </script>
        ";
        return 0; // Username sudah ada, kembalikan 0 untuk menandakan error
    }

    $query = "INSERT INTO kerusakan 
                VALUES (
                '$kodeKerusakan',
                '$namaKerusakan'
                )
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}

function updateKerusakan($data) {
    global $conn;

    // Sanitize inputs
    $kodeKerusakan = htmlspecialchars($data["kodeKerusakan"]);
    $namaKerusakan = htmlspecialchars($data["namaKerusakan"]);
    

    try {

        // Update table kerusakan
        $query1 = "UPDATE kerusakan SET 
                    namaKerusakan = '$namaKerusakan'
                    WHERE kodeKerusakan = '$kodeKerusakan'";
        mysqli_query($conn, $query1);

        return mysqli_affected_rows($conn);
    } catch (Exception $e) {
        // Rollback transaction
        mysqli_rollback($conn);

        // Log the error message for debugging
        error_log($e->getMessage());

        return 0;
    }
}

// cek jika ada action yang keynya kodeKerusakan dan valuenya kodeKerusakan
if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    if (isset($_GET['kodeKerusakan'])) {
        $kodeKerusakan = $_GET['kodeKerusakan'];
        if(delete($kodeKerusakan) > 0){
            echo"
            <script>
                alert('Successfully Deleted!');
                document.location.href= 'dataKerusakan.php';
            </script>
            ";
            exit;
        }
    }
}

// deleteKerusakan
function delete($kodeKerusakan) {
    global $conn;
    $kode = $kodeKerusakan;
    $sql = "DELETE FROM kerusakan WHERE kodeKerusakan = '$kode'";
    mysqli_query($conn, $sql);

    return mysqli_affected_rows($conn);
}

// update gejala
function updateGejala($data) {
    global $conn;

    // Sanitize inputs
    $kodeGejala = htmlspecialchars($data["kodeGejala"]);
    $namaGejala = htmlspecialchars($data["namaGejala"]);
    

    try {

        // Update table kerusakan
        $query1 = "UPDATE gejala SET 
                    namaGejala = '$namaGejala'
                    WHERE kodeGejala = '$kodeGejala'";
        mysqli_query($conn, $query1);

        return mysqli_affected_rows($conn);
    } catch (Exception $e) {
        // Rollback transaction
        mysqli_rollback($conn);

        // Log the error message for debugging
        error_log($e->getMessage());

        return 0;
    }
}

// insert gejala
function insertGejala($data){
    global $conn;

    $kodeKerusakan = htmlspecialchars($data["kodeKerusakan"]);
    $kodeGejala = htmlspecialchars($data["kodeGejala"]);
    $namaGejala = htmlspecialchars($data["namaGejala"]);

    $query = "SELECT * FROM gejala WHERE kodeGejala='$kodeGejala'";

    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        echo "
        <script>
            alert('Kode sudah digunakan, silakan pilih kode lain');
        </script>
        ";
        return 0; // Username sudah ada, kembalikan 0 untuk menandakan error
    }

    $sql = "INSERT INTO gejala 
            VALUES
            (
                '$kodeGejala',
                '$namaGejala'
            )
            ";

    $exe =  mysqli_query($conn, $sql);

    if(!$exe){
        echo "error!".mysqli_error($conn);
    }

    $queryRule = "INSERT INTO rule 
                VALUES( 
                    NULL,
                    '$kodeKerusakan',
                    '$kodeGejala'
                )";
    $exe = mysqli_query($conn, $queryRule);

    if(!$exe){
        echo "
        <script>
            alert('Error!');
        </script>
        ";
    }else{
        echo  "
        <script>
            alert('Succesfully Insert Gejala And Connect To Rule!');
        </script>
        ";
    }


    return mysqli_affected_rows($conn);exit;

}

// jika ada action
if (isset($_GET['action']) && $_GET['action'] == 'deleteGejala') {
    if (isset($_GET['kodeGejala'])) {
        if(deleteGejala($_GET) > 0){
            echo"
            <script>
                alert('Successfully Deleted!');
                document.location.href= 'dataGejala.php';
            </script>
            ";
            exit;
        }
    }
}

// delete gejala
function deleteGejala($kodeGejala){
    global $conn;

    $kode = htmlspecialchars($kodeGejala["kodeGejala"]);

    // First, delete related rows from the rule table
    $sqlRule = "DELETE FROM rule WHERE kodeGejala='$kode'";
    mysqli_query($conn, $sqlRule);

    $sql = "DELETE FROM gejala WHERE kodeGejala='$kode'";
    mysqli_query($conn, $sql);

    return mysqli_affected_rows($conn);

}

// insert solusi
function insertSolusi($data){
    global $conn;

    $kodeKerusakan = htmlspecialchars($data["kodeKerusakan"]);
    $solusi = htmlspecialchars($data["solusi"]);

    $sql = "INSERT INTO solusi
            VALUES(
                NULL,
                '$kodeKerusakan',
                '$solusi'
            )";
    $exe =  mysqli_query($conn, $sql);

    if(!$exe){

        echo "
        <script>
            alert('error!');
        </script>
        ";

    }

    return mysqli_affected_rows($conn);

}

// update solusi
function updateSolusi($dataSolusi){
    global $conn;

    $kodeKerusakan = htmlspecialchars($dataSolusi["kodeKerusakan"]);
    $solusi = htmlspecialchars($dataSolusi["solusi"]);

    try {

        // Update table kerusakan
        $query = "UPDATE solusi SET 
                    solusi = '$solusi'
                    WHERE kodeKerusakan='$kodeKerusakan' AND solusi='$solusi'";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    } catch (Exception $e) {
        // Rollback transaction
        mysqli_rollback($conn);

        // Log the error message for debugging
        error_log($e->getMessage());

        return 0;
    }

}

// jika add action lakukan kondisi di bawah
if(isset($_GET['action']) && isset($_GET['action']) == 'deleteSolusi'){

    if (isset($_GET['kodeKerusakan']) && isset($_GET['solusi'])) {
        if(deleteSolusi($_GET) > 0){
            echo"
            <script>
                alert('Successfully Deleted!');
                document.location.href= 'solusi.php';
            </script>
            ";
            exit;
        }
    }

}

// delete solusi
function deleteSolusi($dataSolusi){
    global $conn;

    $kode = htmlspecialchars($dataSolusi["kodeKerusakan"]);
    $solusi = htmlspecialchars($dataSolusi["solusi"]);

    $sql = "DELETE FROM solusi WHERE kodeKerusakan='$kode' AND solusi='$solusi' ";
    $exe = mysqli_query($conn, $sql);

    return mysqli_affected_rows($conn);
}

// insert data konsultasi
function insertKonsultasi($dataKonsultasi){
    global $conn;

    $idUser = $dataKonsultasi["idUser"];
    $username = $dataKonsultasi["username"];
    $kodeKerusakan = $dataKonsultasi["kodeKerusakan"];
    $namaKerusakan = $dataKonsultasi["namaKerusakan"];
    $gejala = $dataKonsultasi["gejala"];

    if(count($gejala) > 0){
        // Gabungkan elemen-elemen array menjadi satu string, dipisahkan dengan koma
        $data = implode(", ", $gejala);

    }

    $sql = "INSERT INTO dataKonsultasi 
            VALUES(
                NULL, 
                $idUser,
                '$username',
                '$kodeKerusakan',
                '$namaKerusakan',
                '$data'
            )
            ";
    $result = mysqli_query($conn, $sql);

    if(!$result){
        echo "
        <script>
            alert('Error!');
        </script>
        ";
    }

    return mysqli_affected_rows($conn);

}

// update konsultasi user
function updateUser($dataUser){
    global $conn;

    $idKonsultasi = $dataUser["idKonsultasi"];
    $username = $dataUser["username"];
    $namaKerusakan = $dataUser["namaKerusakan"];
    $gejala = $dataUser["gejala"];

    $sql = "UPDATE dataKonsultasi 
                SET 
            username='$username',
            namaKerusakan='$namaKerusakan',
            gejala='$gejala'
                WHERE 
                idKonsultasi='$idKonsultasi'";

    mysqli_query($conn, $sql);

    return mysqli_affected_rows($conn);

}

// check if action set
if( isset($_GET["action"]) && isset($_GET["action"]) == 'deleteUser' ){

    if(isset($_GET["idKonsultasi"])){

        if(deleteUser($_GET) > 0){
            echo "
            <script>
                alert('Successfully!');
                document.location.href= 'dataUser.php';
            </script>
            ";exit;
        }
    }

}

// delete konsultasi user
function deleteUser($dataKonsultasi){
    global $conn;

    $idKonsultasi = $dataKonsultasi["idKonsultasi"];

    $sql = "DELETE FROM dataKonsultasi WHERE idKonsultasi='$idKonsultasi'";

    mysqli_query($conn, $sql);

    return mysqli_affected_rows($conn);

}

?>
