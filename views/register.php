<?php
session_start(); 

if (isset($_SESSION['user_id'])) {
    header('Location: inicio.php');
    exit(); 
}

require_once '../controllers/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $error = "El correo electrónico ya está registrado";
    } else {
        $hashedPassword = md5($password);
        $query = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('sss', $name, $email, $hashedPassword);
        $stmt->execute();

        $user_id = $stmt->insert_id;
        $_SESSION['user_id'] = $user_id;
        $_SESSION['user_name'] = $name;

        header('Location: ../views/inicio.php');
        exit();
    }
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .error{
            color: white;
            text-align:center;
        }
        body{margin: 0;
            padding: 0;
            background: url(https://i.ibb.co/VQmtgjh/6845078.png) no-repeat;
            height: 100vh;
            font-family: sans-serif;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            overflow: hidden}@media screen and (max-width: 600px;){body{
                background-size: cover;: fixed}}#particles-js{
                    height: 100%}.loginBox{
                        position: absolute;
                        top: 50%;left: 50%;
                        transform: translate(-50%,-50%);
                        width: 350px;
                        min-height: 200px;
                        background: #000000;
                        border-radius: 10px;
                        padding: 40px;
                        box-sizing: border-box}.user{
                            margin: 0 auto;
                            display: block;
                            margin-bottom: 20px}h3{
                                margin: 0;
                                padding: 0 0 20px;
                                color: #59238F;
                                text-align: center}.loginBox input{
                                    width: 100%;
                                    margin-bottom: 20px}.loginBox input[type="text"], .loginBox input[type="password"]{
                                        border: none;
                                        border-bottom: 2px solid #262626;
                                        outline: none;
                                        height: 40px;
                                        color: #fff;
                                        background: transparent;
                                        font-size: 16px;
                                        padding-left: 20px;
                                        box-sizing: border-box}.loginBox input[type="text"]:hover, .loginBox input[type="password"]:hover{color: #42F3FA;
                                            border: 1px solid #42F3FA;
                                            box-shadow: 0 0 5px rgba(0,255,0,.3), 0 0 10px rgba(0,255,0,.2), 0 0 15px rgba(0,255,0,.1), 0 2px 0 black}.loginBox input[type="text"]:focus, .loginBox input[type="password"]:focus{
                                                border-bottom: 2px solid #42F3FA}.inputBox{
                                                    position: relative}.inputBox span{
                                                        position: absolute;
                                                        top: 10px;
                                                        color: #262626}.loginBox input[type="submit"]{
                                                            border: none;
                                                            outline: none;
                                                            height: 40px;
                                                            font-size: 16px;
                                                            background: #59238F;
                                                            color: #fff;
                                                            border-radius: 20px;
                                                            cursor: pointer}.loginBox a{
                                                                color: #262626;
                                                                font-size: 14px;
                                                                font-weight: bold;
                                                                text-decoration: none;
                                                                text-align: center;
                                                                display: block}a:hover{
                                                                    color: #00ffff}p{
                                                                        color: #0000ff}
    </style>
</head>
<body>
<div class="loginBox"> <img class="user" src="../imgs/cog.png" height="100px" width="100px">
        <h3>Registrarse</h3>
        <form action="" method="post">
            <div class="inputBox"> 
                <input id="uname" type="text" name="name" placeholder="Nombre">
                <input id="uname" type="text" name="email" placeholder="Correo"> 
                <input id="pass" type="password" name="password" placeholder="Contraseña"> 
            </div> 
            <input type="submit" name="" value="Registrar">
        </form> 
        <div class="text-center">
            <a href="login.php"><p style="color: #59238F;">Ya tienes una cuenta? Iniciar Sesion</p></a>
        </div>

        <?php 
        if (isset($error)) { 
        ?>
        <div class="error">
            <?php echo $error; ?>
        </div>
        <?php 
        } 
        ?>
        
    </div>
    
</body>
</html>
