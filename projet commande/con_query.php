<?php 

include 'config.php';
session_start();

$nom = $_POST['nom'];
$email = $_POST['email'];
                
$db = $connexion;

if(ISSET($_POST['connexion'])){
    $statement = $db->query("SELECT * FROM `users` WHERE `name` = '$nom' && `email` = '$email'");
    $fetch = $statement->fetch();
    $row = $statement->rowCount();

    if($row > 0){
        $_SESSION['id_user'] = $fetch['id_user'];
        
        header("location:dashbord.php");
    }else{
        echo "<center><label class='text-danger'>Invalid username or email</label></center>";
    }

}

?>