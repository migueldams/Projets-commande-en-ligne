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
                    <h1 style="display: flex;justify-content: center;font-weight: bold;margin-top: 20px;">inscription</h1>
                </div>
                <div>
                    <form action="inscription.php" method="POST" style="margin: 50px;">
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

                           

                            if(ISSET($_POST['inscription'])){
                                echo "bonjour ca marche jusqu'ici";

                                if(!empty($_POST['nom']) && !empty($_POST['email'])){

                                $nom = $_POST['nom'];
                                $email = $_POST['email'];

                                $statement = $db->query("SELECT * FROM `users` WHERE  `email` = '$email'");
                                $fetch = $statement->fetch();
                                $row = $statement->rowCount();

                                if($row > 0){
                                    echo "<center><label class='text-danger'>votre email existe deja</label></center>";
                                   
                                }else{
                                     $statement1=$db->prepare("INSERT INTO `users`(`id_user`, `name`, `email`, `role`) VALUES (NULL,?,?,?)");
                                    $statement1->execute([$nom,$email,"client"]);
                                    $_SESSION['id_user'] = $db->lastInsertId();
                                    
                                    header("location: connexion.php");
                                }

                                }else{
                                    echo "<center><label class='text-danger'>entrer votre nom et email</label></center>";
                                }
                                }

                            ?>
                             <script>
        //         function stat(event){
        //             event.preventDefault();
        //             document.body.style.cursor = 'wait';

        //              // Simule une action (ex: chargement AJAX)
        //     setTimeout(() => {
        //         // Action terminée, on remet le curseur normal
        //         document.body.style.cursor = 'default';
        //         alert("inscription reusie !");
        //     }, 2000); // 2 secondes de simulation
        //     window.loction.href("connexion.php");
            
        // }

            </script>
                         </div>
                        <div class="container">
                            <div class="form-group" style="margin-top:30px;">
                            <button type="submit" onclick="stat(event)" name="inscription" id="inscription"  class="btn_con" style="margin: 10px;">s'inscrire</button>
                            <a href="con_google.php"  class="btn_con1" style="margin: 10px;"><i class="fa-brands fa-google" style="margin-top: 5px;margin-right: 5px;"></i>se connecter via google</a>
                            <br>
                            <p> je deja possede un compte<a href="connexion.php"> se connecter</a></p>
                            </div>

                        </div>
                       
                     </form>
                
                </div>
            </div>
        </div>
       
    </div>
    
</body>
</html>