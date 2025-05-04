<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" >
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script> 
    <script src="https://kit.fontawesome.com/0f8f5e7590.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style_connexion.css">
    <title>SCS Express</title>
</head>
<body>
    <header>

    </header>
    <div class="container">
        <div class="zone">
             <div class="row">
                <div>
                    <h1 style="display: flex;justify-content: center;font-weight: bold;margin-top: 20px;">connexion</h1>
                </div>
                <div>
                    <form action="connexion.php" method="POST" style="margin: 50px;">
                        <div class="form-group">
                            <label for="name"> Name
                            </label>
                            <div class="input-box">
                                <input type="text" name="nom" id="nom" class="form-control input-lg" placeholder="username" style="width: 100%;" required>
                                <i class="fa-solid fa-user" style="position: absolute;transform: translateY(-150%) translateX(3300%)"></i>
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <label for="email"> Email
                            </label>
                            <div class="input-box">
                                <input type="text" name="email" id="email" class="form-control" placeholder="email" style="width: 100%;" required>
                                <i class="fa-solid fa-envelope" style="position: absolute;transform: translateY(-150%) translateX(2900%)"></i>
                            </div>
                            <?php 

                            include 'config.php';
                            session_start();

                            $db = $connexion;

                            if(ISSET($_POST['connexion'])){
                                if(!empty($_POST['nom']) && !empty($_POST['email'])){

                                    $nom = $_POST['nom'];
                                $email = $_POST['email'];
                                                
                                $statement = $db->query("SELECT * FROM `users` WHERE `name` = '$nom' && `email` = '$email'");
                                $fetch = $statement->fetch();
                                $row = $statement->rowCount();

                                if($row > 0){
                                    $_SESSION['id_user'] = $fetch['id_user'];
                                    
                                    header("location:dashbord.php");
                                }else{
                                    echo "<center><label class='text-danger'>Invalid username or email</label></center>";
                                }

                                }else{
                                    echo "<center><label class='text-danger'>entrer le nom et l'email</label></center>";
                                }
                                }

                            ?>
                         </div>
                        <div class="container">
                            <div class="form-group" style="margin-top:30px;">
                            <button type="submit" name="connexion" id="connexion"  class="btn_con" style="margin: 10px;">connexion</button>
                            <a href="con_google.php" class="btn_con1" style="margin: 10px;"><i class="fa-brands fa-google" style="margin-top: 5px;margin-right: 5px;"></i>se connecter via google</a>
                            <button type="submit" class="btn_con1" style="margin: 10px;"><i class="fa-solid fa-phone" style="margin-top: 5px;margin-right: 5px;"></i>se connecter via numeros</button>
                            <br>
                            <p> je ne possede pas de compte<a href="inscription.php"> s'inscrire</a></p>
                            </div>

                        </div>
                       
                     </form>
                
                </div>
            </div>
        </div>
       
    </div>
    
</body>
</html>