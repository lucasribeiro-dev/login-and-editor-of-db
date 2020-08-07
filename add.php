<?php
require 'config.php';

session_start();

// Confirmar se a pessoa ta logada
if(isset($_SESSION['id']) && empty($_SESSION['id']) == false){

} else{
    header("Location: login.php");
}

//Pegar os dados do formularios e adicionar no banco de dados
if(isset($_POST['nome']) && empty($_POST['nome']) == false){
    $nome = addslashes($_POST['nome']);
    $email = addslashes($_POST['email']);
    $senha = md5(addslashes($_POST['senha']));

    $sql = "INSERT INTO usuarios SET nome = '$nome', email = '$email', senha = '$senha' ";
    $pdo->query($sql);

    header("Location: index.php");
}
?>



<html>
    <head>
        <meta charset="UTF-8"/>
         <meta name="viewport" content="width=device-width, initial-scale=1"/>

         <title>Adicionar</title>
         
         <link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
         <link rel="stylesheet" href="assets/css/style.css">

         <script type="text/javascript" src="assets/js/jquery-3.5.1.min.js"></script>
         <script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"></script>

    </head>
    <body>        
        <form method="POST">
            <input type="text" name="nome" placeholder="Nome"/> <br/><br/>
            <input type="email" name="email" placeholder="example@gmail.com"/> <br/><br/>
            <input type="password" name="senha" placeholder="Senha"/> <br/><br/>
            <input class="btn btn-success"type="submit" value="Cadastrar"/>
        </form>
    
        
    </body>
</html>