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

session_start();
function login($log){
    // Get variable $conn
    global $conn;

    $username = $log["username"];
    $password = $log["password"];
    $role = $log["role"];

    // Lindungi dari serangan SQL Injection
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);
    $role = mysqli_real_escape_string($conn, $role);
    
    // Memeriksa koneksi
    if (!$conn) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    // Ambil informasi pengguna dari database
    $query = "SELECT * FROM users 
                WHERE 
                username='$username' AND password='$password' AND role='$role'";
    $result = mysqli_query($conn, $query);

    // Cek apakah hasil query mengembalikan baris
    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $user['username']; // Simpan username ke dalam sesi
        $_SESSION['role'] = $user['role']; // Simpan role ke dalam sesi jika diperlukan


        // Cek role dan arahkan ke halaman yang sesuai
        if ($user["role"] === 'admin') {
            echo "
            <script>
                alert('Succes, Thank You!');
            </script>
            ";return $user['username'];
        } else {
            echo "
            <script>
                document.location.href = 'homeUser.php';
            </script>
            ";
            return false;
        }

        return mysqli_affected_rows($conn); // Login berhasil
    } else {
        // Jika tidak ada hasil yang cocok, login gagal
        echo "
        <script>
            alert('Login gagal, periksa username, password, dan role Anda');
        </script>
        ";
        return mysqli_affected_rows($conn); // Login gagal
    }
    return mysqli_affected_rows($conn);
}


function signUp($data){
    global $conn;

    // get data from $data
    $username = htmlspecialchars($data["username"]);
    $password = htmlspecialchars($data["password"]);
    $role = htmlspecialchars($data["role"]);

    $query = "INSERT INTO users
                VALUES(
                    NULL,
                    '$username',
                    '$password',
                    '$role'
                )
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

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

function insertKerusakan( $data ){

    global $conn;

    $kodeKerusakan = $data["kodeKerusakan"];

    $query = "INSERT INTO dataKonsultasi 
                VALUES
                kodeKerusakan = $kodeKerusakan
            ";

}

function update($data){
    global $conn;

    $kodeKerusakan = htmlspecialchars($data["kodeKerusakan"]);
    $namaKerusakan = htmlspecialchars($data["namaKerusakan"]);
    $rule = htmlspecialchars($data["rule"]);
    $solusi = htmlspecialchars($data["solusi"]);
    $id = $data["idKerusakan"];

    $query = "UPDATE dataKerusakan SET 
                kodeKerusakan = '$kodeKerusakan',
                namaKerusakan = '$namaKerusakan',
                rule = '$rule',
                solusi = '$solusi'
                 WHERE idKerusakan=$id
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}

function delete($data){
global $conn;

    $query = "DELETE FROM dataKerusakan WHERE idKerusakan=$data";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}

function getKerusakan($data){

}


?>
