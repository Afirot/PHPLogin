<?php
try {
    session_start();
    if (isset($_SESSION['islogged'])) {
        header('location: home.php');
    }
} catch (Throwable $ex) {
    error_log("Error: " . $ex->getMessage());
    header('Location: error500.php');
}
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <!--<link rel="stylesheet" href="css/styles.css">-->
        <link rel="stylesheet" href="css/styles_login.css">
        <title></title>
    </head>
    <body>
        <form class="login" action="login.php" method="post">
            <h1>Login</h1>
            <label class="form-label">Usuario</label>
            <div class="form-group mar-bot-5">
                <svg width="14" height="14" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>
                <input type="text" name="nombre" value="" placeholder="Username"/>
            </div>
            <label class="form-label">Contraseña</label>
            <div class="form-group mar-bot-5">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M144 144v48H304V144c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192V144C80 64.5 144.5 0 224 0s144 64.5 144 144v48h16c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V256c0-35.3 28.7-64 64-64H80z"/></svg>
                <input type="password" name="pass" value="" placeholder="Password"/>
            </div>
            <button class="btn blue" type="submit">Login</button>
        </form>
    </body>
</html>
