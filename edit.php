<?php
require 'config.php';

$id=0;
session_start();

// Verifying if there is a session logged
if(isset($_SESSION['id']) && empty($_SESSION['id']) == false){
    //Putting the id to be edited in the variable
    if(isset($_GET['id']) && empty($_GET['id']) == false){
        $id = $_GET['id'];
    }
    //Sending edited datas
    if(isset($_POST['nome']) && empty($_POST['nome']) == false){
        $nome = addslashes($_POST['nome']);
        $email = addslashes($_POST['email']);
    
        $sql = "UPDATE usuarios SET nome = '$nome', email='$email' WHERE id='$id'";
        $pdo->query($sql);
    
        header("Location: index.php");
    }
    
    //Geting the data to be edited
    $sql = "SELECT * FROM usuarios WHERE id= '$id'";
    $sql = $pdo->query($sql);
    
    if($sql->rowCount()> 0){
        $data = $sql->fetch();
    } else{
        header("Location: index.php");
    }
    

} else{
    header("Location: login.php");
}
?>


<html>
    <head>
        <meta charset="UTF-8"/>
         <meta name="viewport" content="width=device-width, initial-scale=1"/>

         <title>Edit</title>
         
         <link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
         <link rel="stylesheet" href="assets/css/style.css">

         <script type="text/javascript" src="assets/js/jquery-3.5.1.min.js"></script>
         <script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"></script>

    </head>
    <body>
        
        <form method="POST">
            <input type="text" name="nome" placeholder="Name" value="<?php echo $data['nome'];?>"/> <br/><br/>
            <input type="email" name="email" placeholder="example@gmail.com"  value="<?php echo $data['email'];?>"/> <br/><br/>
            <input class="btn btn-warning"type="submit" value="Edit"/>
        </form>
    
        
    </body>
</html>
