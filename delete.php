<?php 

require 'function.php';

$kodeKerusakan = $_GET["kodeKerusakan"];

if ( delete($kodeKerusakan) > 0 ) {

    echo "
    <script>
        alert('Data Deleted');
        document.location.href = 'dataKerusakan.php';
    </script>
    ";exit;

}else{

    echo "
    <script>
        alert('Failled!');
        document.location.href = 'dataKerusakan.php';
    </script>
    ";

}

?>