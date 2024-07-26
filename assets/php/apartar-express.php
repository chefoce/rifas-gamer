<?php
include('../php/constants.php');
//unset($ids);
$id = $_POST['id'];
$numeros = $_POST['num'];
$oportunidades = $_POST['oportunidades'];
$cantidad = 1;
$nombre = $_POST['nombre'];
$nombre = strtoupper($nombre);
$apellido = $_POST['apellido'];
$apellido = strtoupper($apellido);
$telefono = $_POST['telefono'];
$estado = $_POST['estado'];
$usuario_facebook = $_POST['fb'];
$fecha = date('Y/m/d');
$hora = date("H:i:s");
$folio = strtoupper(substr($nombre, 0, 2) . substr($apellido, 0, 2)) . $telefono;
$fecha_hora = $fecha . " " . $hora;
$sql = "SELECT * FROM express WHERE id_express = $id AND apartado = '1'";
$res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
if (mysqli_num_rows($res) > 0) {
  $_SESSION['error'] = "<div class='alert alert-danger mt-3'>El boleto " . $numeros . " ya se encuentra apartado/vendido</div>";
  header("location:" . SITEURL . 'sorteo-express#seleccionBoletos');
  die();
}
$sql2 = "SELECT * FROM express WHERE telefono = '$telefono' OR folio = '$folio'";
$res = mysqli_query($conn, $sql2) or die(mysqli_error($conn));
if (mysqli_num_rows($res) > 0) {
  $_SESSION['error'] = "<div class='alert alert-danger mt-3'>Solo se permite un boleto por persona</div>";
  header("location:" . SITEURL . 'sorteo-express#seleccionBoletos');
  die();
}
$sql3 = "INSERT INTO clientes (nombre, apellido, telefono, estado) VALUES ('$nombre', '$apellido', '$telefono', '$estado')";
$res3 = mysqli_query($conn, $sql3) or die(mysqli_error($conn));
$sql1 = "UPDATE express SET 
                        apartado = '1', 
                        folio = '$folio', 
                        nombre = '$nombre',
                        apellido = '$apellido',
                        telefono = '$telefono',
                        estado = '$estado',
                        usuario_facebook = '$usuario_facebook',
                        fecha_hora = '$fecha_hora'
          WHERE id_express = $id";
$res = mysqli_query($conn, $sql1) or die(mysqli_error($conn));

if ($res == TRUE) {
  header("Location:" . 'https://api.whatsapp.com/send?phone=5216951733341&text=%C2%A1%C2%A1Hola,%20aparte%20un%20boleto%20para%20la%20rifa%20por%201%20boleto%20para%20la%20rifa%20de%20la%20PC%20GAMER%20%0A%0A*FOLIO:%20' . $folio . '*%0A%0A*NUMERO:%20' . $numeros . '*%0A%0A*OPORTUNIDADES:%20' . $oportunidades . '*%0A%0A*NOMBRE:%20' . $nombre . '%20' . $apellido . '*%0A%0A*CELULAR:%20' . $telefono . '*');
  die();
}
