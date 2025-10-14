<?php
session_start();

try {
    include 'functions.php';

    $conexion = db_conection('<db_host>', '<db_user>', "<db_password>", '<db_table');
    if (!isset($_SESSION['islogged']) || !$_SESSION['islogged'] === true) {
        header('Location: index.php');
        exit;
    }
    $idUsuario = $_SESSION['userid'];

    $consulta = 'SELECT username FROM users WHERE userid = :id LIMIT 1';
    $resultado = $conexion->prepare($consulta);
    $resultado->bindParam(':id', $idUsuario);
    $resultado->execute();
    $conexion = '';
} catch (Throwable $ex) {
    error_log("Error: " . $ex->getMessage());
    header('Location: error500.php');
    exit();
}
?>
<!--Your code-->
