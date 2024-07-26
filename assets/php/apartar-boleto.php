<?php
include('../php/constants.php');
//unset($ids);
$ids = $_POST['ids'];
$numeros = $_POST['ids'];
$oportunidades = $_POST['oportunidades'];
$ids = explode(',', $ids);
$cantidad = $_POST['cantidad'];
$nombre = $_POST['nombre'];
$nombre = strtoupper($nombre);
$apellido = $_POST['apellido'];
$apellido = strtoupper($apellido);
$telefono = $_POST['telefono'];
$estado = $_POST['estado'];
$referido = $_POST['referido'];
$fecha = date('Y/m/d');
$hora = date("H:i:s");
$folio = strtoupper(substr($nombre, 0, 2) . substr($apellido, 0, 2)) . $telefono;
$sql3 = "INSERT INTO clientes (nombre, apellido, telefono, estado) VALUES ('$nombre', '$apellido', '$telefono', '$estado')";
$res3 = mysqli_query($conn, $sql3) or die(mysqli_error($conn));
foreach ($ids as $valor) {
  $fecha_hora = $fecha . " " . $hora;
  $sql = "SELECT * FROM boletos WHERE id_boleto = $valor AND vendido = '1'";
  $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
  if (mysqli_num_rows($res) > 0) {
    $_SESSION['error'] = "<div class='alert alert-danger mt-3'>El boleto ".$valor." ya se encuetra apartado/vendido</div>";
    header("location:" . SITEURL . 'lista-boletos#seleccionBoletos');
    die();
  }
  $sql1 = "UPDATE boletos SET vendido = '1' WHERE id_boleto = $valor";
  $sql2 = "INSERT INTO apartados (fecha_hora, boleto_id, nombre, apellidos, telefono, estado,referido) VALUES ('$fecha_hora', '$valor', '$nombre', '$apellido', '$telefono', '$estado', '$referido')";
  $res = mysqli_query($conn, $sql1) or die(mysqli_error($conn));
  $res2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));
}
if ($res == TRUE && $res2 == TRUE) {
  header("Location:" . 'https://api.whatsapp.com/send?phone=5216951733341&text=%C2%A1%C2%A1Hola,%20Aparte%20boletos%20de%20la%20rifa!!%20%C2%A1%C2%A1PC%20GAMER!!%0A%0A*FOLIO:%20' . $folio . '*%20%EE%84%90%20%0A%0A*' . $cantidad . '%20BOLETO(s)*%0A%0A*NUMERO(s):%20' . $numeros . '*%0A%0A*OPORTUNIDADES:%20' . $oportunidades . '*%0A%0A*NOMBRE:%20' . $nombre . '%20' . $apellido . '*%0A%0APOR%20FAVOR%20MANDE%20SU%20COMPROBANTE%20DE%20PAGO%20UNICAMENTE%20A%20ESTA%20LINEA%20Y%20ESPERE%20SU%20TURNO%20PARA%20SER%20ATENDIDO.%0A%0A%20%EE%84%A51%20BOLETO%20POR%20$150%20%EE%88%AF%0A%20%EE%84%A52%20BOLETOS%20POR%20$300%20%EE%88%AF%0A%20%EE%84%A53%20BOLETOS%20POR%20$435%20%EE%88%AF%0A%20%EE%84%A54%20BOLETOS%20POR%20$560%20%EE%88%AF%0A%20%EE%84%A55%20BOLETOS%20POR%20$700%20%EE%88%AF%0A%0A*CUENTAS%20DE%20PAGO%20AQU%C3%8D:*%20www.rifasgamer.com/pagos%0A%0A*CELULAR:%20' . $telefono . '*%0A%0AEl%20siguiente%20paso%20es%20enviar%20foto%20del%20comprobante%20de%20pago%20por%20aqu%C3%AD');
  die();
}
