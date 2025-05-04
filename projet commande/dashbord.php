<?php  
session_start();
include 'config.php';
                
$db = $connexion;

$id_user =$_SESSION['id_user'];

if(!isset($_SESSION['panier'])){
    $_SESSION['panier']=[];

}

if(isset($_GET['ajouter'])){
    $idproduit = intval($_GET['ajouter']);
    $idProduit = intval($_GET['ajouter']);
    $_SESSION['panier'][] = $idProduit;
    $stat=$db->prepare("INSERT INTO `panier`(`id_panier`, `id_utilisateur`, `id_produit`) VALUES (NULL,?,?)");
    $stat->execute([$id_user,$idProduit]);

    $statement=$db->query("SELECT * FROM panier WHERE id_produit=$idProduit ");
    $stat=$statement->fetch();
    $id_panier = $stat['id_panier'];
    $_SESSION['id_panier']=$id_panier;


    $stat2= $db->prepare('UPDATE panier SET quantite= ("SELECT count(id_produit) FROM panier") WHERE id_panier= ?');
    $stat2->execute([$id_panier]);            
                                   
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" >
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script> 
    <link rel="stylesheet" href="css/style_Acceuil.css">
    <script src="js/main.js" type="module"></script>
    <title>SCS Express</title>
</head>
<body>
    <header>
        <div class="container" >
            <span  class="navbar" >
                <a href="" class="fw-light col-md-3" style="text-decoration: none;color:#999;font-weight: bold;">langue</a>
                <a href="" class="fw-light col-md-3" style="text-decoration: none;color:#999;font-weight: bold;">support</a>
                <a href="" class="fw-light col-md-3" style="text-decoration: none;color:#999;font-weight: bold;">infos</a>
                <a href="" class="fw-light col-md-3" style="text-decoration: none;color:#999;font-weight: bold;">licence</a>
            </span>
        </div>
        <div class="container" style="margin-top: 50px;">
            <div class="row">
                <div class="col-md-3">
                    <div class="row">
                        <span class="fw-bold" style="font-size: 20px;"><p class="log" >SCS</p>Express</span>
                    </div>
                </div>
                    <div class="col-md-4">
                        <div class="input-group" style="margin-top: 30px; border-radius: 40%;">
                            <input type="text" name="" id="" class="form-control glyphicon glyphicon-search ">
                            <button class="btn_con" style="display: flex; left: 80%;"> <i class="fa-solid fa-magnifying-glass" style="margin-top: 5px;margin-right: 5px;"></i><span>Search</span></button>
                        </div>
                    </div>
                <div class="col-md-1" style="margin-top: 20px;width: 10%;margin-left: 10px; height: 3%;">
                    <div class="dropdown">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">XAF<p <svg class="w-12 h-12" enable-background="new 0 0 512 512" viewBox="0 0 512 512" ></p> <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <li><a href="#">USD</a></li>
                            <li><a href="#">EURO</a></li>
                            <li><a href="#"></a></li>
                            <li><a href="#"></a></li>
                        </ul>
                        </div>
                </div>
                <div class="col-md-1" style="margin-top: 20px;">
                    <a class="btn_con" type="submit" style="text-decoration: none;" href="panier.php"><i class="fa-solid fa-cart-shopping" style="margin-right: 5px;margin-top:5px;"></i><span>panier</span></a>
                </div>
                <div class="col-md-1" style="margin-top: 20px;">
                    <a class="btn_con" type="submit" style="text-decoration: none;" href="#boutique"><i class="fa-solid fa-house" style="margin-right: 5px;margin-top:5px;"></i><span>boutique</span></a>
                </div>
                <div class="chariot"></div>
                
            </div>
        </div>
        <hr>
        <div class="container" style="margin-top: 20px;">
            <nav class="navbar col-md-6" style="background-color: #fff;transition: 0.5s;">
                <a href=""  style="text-decoration: none;color:#f6D238;font-weight: bold;">Home</a>
                <a href="panier.php"  style="text-decoration: none;color:#999;font-weight: bold;">Achat</a>
                <a href="#boutique"  style="text-decoration: none;color:#999;font-weight: bold;">boutique</a>
                <a href="suivie.php"  style="text-decoration: none;color:#999;font-weight: bold;">suivie</a>
              </nav>
            <div class="col-md-6"></div>

        </div> <hr>
    </header>
    
    <div class="container" style="height: 10%;width: 100% ;margin-top: 20px;">
        <div class="row">
        <div class="article col-md-12 col-sm-6" >
            <div class="img col-md-8 col-sm-4">
            <img class="image-1" src="img/bg1.jpg"  alt="">
            <img class="image-2" src="img/bg3.jpg" alt="">
            </div>
        </div>
        </div>
    </div>
    <div class="container" id="boutique" style="margin-top: 100px;" >
        <hr>
        <div class="row">
                <h1 class="col-md-7" style="display: inline; font-weight: bold;margin-top: 50px;">nos produits</h1>
                <button class="btn btn-primary col-md-2" style="height: 50px;margin-top: 50px;margin-right: 5px;"> vue liste</button>
                <button class="btn btn-primary col-md-2" style="height: 50px;margin-top: 50px;"> commandé</button>
        </div>
        <div class="row">
            <?php 
                
                $statement = $db->query('SELECT produits.id_produit,produits.nom,produits.description,produits.prix,produits.image,categories.name_categorie 
                                    FROM produits INNER JOIN categories ON produits.categorie_id = categories.id_categorie');
                while($item = $statement->fetch()){
                
                echo'<div class="galerie col-md-3">';
                echo'<div class="image">';
                echo'<img style="height:40%" src= img/'.$item['image'].' alt="">';
                echo'<hr>';
                echo'<div class="description">';
                echo'<h2 id="nameproduit" name="nameproduit">'.$item['nom'].'</h2>';
                echo'<p>'.$item['description'].'</p>';
                echo'<p  style="width: 30%;">'.$item['name_categorie'].'</p>';
                echo'<p  style="width: 30%;">'.$item['prix'].'</p>';
                echo'<a class="btn_con" onclick="stat(event)" style="display: flex; left: 80%;" href="dashbord.php?ajouter='.$item['id_produit'].'"><i class="fa-solid fa-cart-shopping" style="margin-right: 5px;margin-top:5px;"></i> <span>buy now</span></a>';
                 echo'</div>';
            echo'</div>';
            echo'</div>';
                }

            ?>
            <!-- <script>
                function stat(event){
                    event.preventDefault();
                    document.body.style.cursor = 'wait';

                     // Simule une action (ex: chargement AJAX)
            setTimeout(() => {
                // Action terminée, on remet le curseur normal
                document.body.style.cursor = 'default';
                alert("produit ajouter au panier !");
            }, 2000); // 2 secondes de simulation
        }

            </script> -->
            
        </div> 
        <hr>
    </div>
   <div class="container-fluid" style="color: #fff;font-size: 20px;">
          <div class="row" style="background-color: #f6D238;">
            <div class="info">
                <div class="col-md-6">
                    <p>
                    <img src="img/4F6D2239-6E83-4505-B794-0688D0872506.jpeg" style="width: 80px;object-fit: cover;margin-top: 20px;">
                    <br>SCS
                <p >SCS est une entreprise passionnée par la production d'huile de palme raffinée de qualité supérieure et de savons ménagers efficaces. Engagés envers la durabilité et l'innovation, nos produits allient excellence et respect de l'environnement. Découvrez no</p>
                    🇫🇷
                    <br>
                    Français
                </p>
                </div>
                <hr>
                <div class="col-md-6"></div>
                
            </div>
            <div style="display: flex;justify-content: center;">
                <p>699456734</p>
                <br>
            </div>
            <div style="display: flex;justify-content: center;">
                <p>IAI-CAMEROUN</p>
            </div>
          </div>  
    </div>
</body>
</html>