<?php
    $conn = mysqli_connect("localhost", "root", "", "userword");
?>

<?php
    $server = "localhost";
    $user = "root";
    $password = "";
    $database ="userword";

    $koneksi = mysqli_connect($server, $user, $password, $database) or die(mysqli_error($koneksi));
?>