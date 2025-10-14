<?php
try{
    include 'functions.php';

    //Creamos la conexion usando la funcion definida en functions.php con el usuario
    //login_user
    $conexion = db_conection('<db_host>', '<db_user>', "<db_password>", '<db_table>');

    $consulta = 'SELECT id, username, hash FROM operarios WHERE username = :nombre';

    $preparado = $conexion->prepare($consulta);
    $preparado->bindParam(':nombre', $_POST['nombre']);

    $preparado->execute();

    $datos = $preparado->fetch();

    if ($datos && password_verify($_POST['pass'], $datos['hash'])){
        session_start();
        session_regenerate_id(true);
        $_SESSION['islogged'] = True;
        $_SESSION['id_user'] = $datos['id'];

        header('location: home.php');
        exit;
    }else{
        header('location: index.php');
        exit;
    }
} catch (Exception $ex){
    error_log("Error: " . $ex->getMessage());
    header('Location: error500.php');
    exit;
}
?>
