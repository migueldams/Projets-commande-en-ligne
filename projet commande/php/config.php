<?php

class Database{
$dbhost="localhost";
$dbname="client_scs";
$dbuser="root";
$dbpassword="";
$connection=null;

public function connect(){
    try{
        $connection = new PDO("mysql:host=".$dbhost.";dbname=".$dbname.;$dbuser;$dbpassword);
    }
    catch(PDOException $e)
    {
        die($e->getMessage());
    }
    return $connection
    
}

public function disconnect(){
    $connection= null;
}
   
}

Database::connect();

?>

