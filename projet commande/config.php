<?php

  $dbhost="localhost";
  $dbname="scs";
  $dbuser="root";
  $dbpassword="";
  $connection=null;


    try{
        $connexion = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpassword);
    }
    catch(PDOException $e)
    {
        echo" Erreur de connexion:".$e->getMessage();
    }
    

?>

