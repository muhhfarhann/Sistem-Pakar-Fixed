<?php 

require 'function.php';

$id = $_GET["idKerusakan"];

if ( delete($id) > 0 ) {

    echo "
    <script>
        alert('Data Deleted');
        document.location.href = 'dataKerusakan.php';
    </script>
    ";

}else{

    echo "
    <script>
        alert('Failled!');
        document.location.href = 'dataKerusakan.php';
    </script>
    ";

}

?>