<?php
include('constants.php');
 if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $sql = "SELECT * FROM boletin WHERE correo = '$email'";
    $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    if (mysqli_num_rows($res) > 0) {
        header("location:" . SITEURL . 'suscrito-fail.php?email='.$email);
        die();
    }
    $sql1 = "INSERT INTO boletin (correo,activo) VALUES ('$email', 1)";
    $res = mysqli_query($conn, $sql1) or die(mysqli_error($conn));
    if ($res == TRUE) {
      header("location:" . SITEURL . 'suscrito.php?email='.$email);
      die();
    }
}
?>