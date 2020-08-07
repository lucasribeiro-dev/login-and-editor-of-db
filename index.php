<?php
require 'config.php';

session_start();

// Verifying if there is a session logged
if(isset($_SESSION['id']) && empty($_SESSION['id']) == false){
    //Verify if was sent the mode of exhibition per name or per id
    if(isset($_GET['ordem']) && !empty($_GET['ordem']) ){
        $ordem = addslashes($_GET['ordem']);
        $sql = "SELECT * FROM usuarios ORDER BY ".$ordem; 

    }else{
        $ordem ='';
        $sql = "SELECT * FROM usuarios";

    }

} else{
    header("Location: login.php");
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
         <meta name="viewport" content="width=device-width, initial-scale=1"/>

         <title>Login Form</title>
         
         <link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
         <link rel="stylesheet" href="assets/css/style.css">

         <script type="text/javascript" src="assets/js/jquery-3.5.1.min.js"></script>
         <script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"></script>

    </head>
    <body>
        <form method="GET">
            <select class="browser-default  mdb-select" name="ordem" onchange="this.form.submit()">
            <option></option>
            <option value="nome"<?php echo ($ordem== "nome")?'selected="selected"':'';?>>Name</option>
            <option value="id" <?php echo ($ordem== "id")?'selected="selected"':'';?>>Id</option>
        </select>
    </form>

    <div class="table-responsive">
        <table class="table table-dark table-bordered table-hover">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
            <?php
        
            $sql = $pdo->query($sql);
            //Getting all datas and print in table
            if($sql->rowCount()>0){
                foreach($sql->fetchAll() as $usuario){
                    echo '<tr>';
                    echo '<td>'.$usuario['id'].'</td>';
                    echo '<td>'.$usuario['nome'].'</td>';
                    echo '<td>'.$usuario['email'].'</td>';
                    echo '<td><a class="btn btn-warning" href="edit.php?id='.$usuario['id'].'"> Edit </a> <a class="btn btn-danger" href="delete.php?id='.$usuario['id'].'"> Delete </a></td>';
                    echo '</tr>';

                }
            }
            
            ?>

        </table>
        <br/>
        <a class="btn btn-primary"href="add.php">Add new user</a>

    </div>
    
        
    </body>
</html>



