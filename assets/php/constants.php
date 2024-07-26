<?php
ob_start();
session_start();
date_default_timezone_set('America/Mazatlan');

//Crear las constantes que almacenan los valores de NO cambian
define('LOCALHOST','localhost');
define('DB_USERNAME','kendraxv');
define('DB_PASSWORD','Molinos107');
define('DB_NAME','kendraxv_rifas_gamer');
define('SITEURL','http://rifasgamer.com/');


$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
mysqli_set_charset($conn, 'utf8');

if (!$conn) {
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
