<?php
require 'config.php';
session_start();

if(isset($_POST['email']) && empty($_POST['email']) == false){
    //Geting puser and password field
    $email = addslashes($_POST['email']); 
    $password = md5(addslashes($_POST['password'])); 

    //Verifiying user and password with db
    $sql = $pdo->query("SELECT * FROM usuarios WHERE email = '$email' AND senha = '$password'");

    if($sql->rowCount() > 0){
        $data = $sql->fetch();
        $_SESSION['id'] = $data['id'];
        header("Location: index.php");
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
         <meta name="viewport" content="width=device-width, initial-scale=1"/>

         <title>Formulário de login</title>
         
         <link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
         <link rel="stylesheet" href="assets/css/style.css">

         <script type="text/javascript" src="assets/js/jquery-3.5.1.min.js"></script>
         <script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"></script>

    </head>
    <body>
        <div id="particles-js" >
            <div class="area">
                <img class="logo" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg"/>
                <h3>Login</h3>
                <form method="POST">
                    <input type="email" name="email" placeholder="Type your e-email" class="form-control"/>
                    <input type="password" name="password" placeholder="Type your password" class="form-control"/>
                    
                    <label>
                        <input type="checkbox" name="remember" value="1"/>
                        <a>Remember my password</a>
    
                    </label>
                    <input type="submit" value="Login" class="btn btn-lg btn-primary btn-block"/>
                </form>
            </div>
        </div>
        <script type="text/javascript" src="assets/js/particles.min.js"></script>
        <script type="text/javascript" src="assets/js/app.js"></script>
       
    </body>
</html>