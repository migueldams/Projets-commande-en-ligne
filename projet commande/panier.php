
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" >
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script> 
    <script src="https://kit.fontawesome.com/0f8f5e7590.js" crossorigin="anonymous"></script>
    <script>
                        function supprimerElement(id) {
                            var element = document.getElementById(id);
                            if (element) {
                                element.remove(); }
                        }
    </script>
    <link rel="stylesheet" href="css/style_panier.css">
    <title>SCS Express</title>
</head>
<?php
         session_start();
?>
</head>
<body>
    <header>
    </header>
    <div class="container">
        <div class="row">
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
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">XAF<i class="flag flag-cameroon"></i><span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <li><a href="#">USD</a></li>
                            <li><a href="#">EURO</a></li>
                            <li><a href="#"></a></li>
                            <li><a href="#"></a></li>
                        </ul>
                        </div>
                </div>
                <div class="col-md-1" style="margin-top: 20px;">
                    <button class="btn_con" type="submit" style="background-color: #f1f1f1;"><i class="fa-solid fa-cart-shopping" style="margin-right: 5px;margin-top:5px;"></i><span>panier</span></button>
                </div>
                <div class="col-md-1" style="margin-top: 20px;">
                    <a class="btn_con" type="submit" href="dashbord.php#boutique" style="text-decoration: none;"><i class="fa-solid fa-house" style="margin-right: 5px;margin-top:5px;"></i><span>boutique</span></a>
                </div>
                <div class="chariot"></div>
                
            </div>
        </div>
        <hr>
        <div class="container" style="margin-top: 20px;">
            <nav class="navbar col-md-6" style="background-color: #fff;transition: 0.5s;">
                <a href="dashbord.php"  style="text-decoration: none;color:#999;font-weight: bold;">Home</a>
                <a href="#"  style="text-decoration: none;color:#f6D238;font-weight: bold;">Achat</a>
                <a href="dashbord.php#boutique"  style="text-decoration: none;color:#999;font-weight: bold;">boutique</a>
                <a href="suivie.php"  style="text-decoration: none;color:#999;font-weight: bold;">suivie</a>
              </nav>
            <div class="col-md-6"></div>
        </div> <hr>
        <div class="container">
            <div class="row">
                <div class="articl col-sm-7">
                    <div>
                        <div class="title">
                            <h1>vos Articles</h1>
                        </div>
                        <hr>
                        <div class="article1">
                        <?php
                        
                        include 'config.php';

                        $db = $connexion;

                        
                    
                        if (!empty($_SESSION['panier'])){
                            if (isset($_GET['delete_id'])) {
                                $id = $_GET['delete_id'];
                            
                                $sql = "DELETE FROM panier WHERE id_panier = $id";
                                $stmt = $db->prepare($sql);
                                $stmt->execute();
                                
                            }
                            echo $_SESSION['id_panier'];
                            $id_panier = $_SESSION['id_panier'];
                            $ids = implode(',', array_map('intval', $_SESSION['panier']));
                            // $stmt = $db->query("SELECT * FROM produits WHERE id_produit IN ($ids)");
                            $stmt = $db->query("SELECT panier.id_panier,produits.id_produit,produits.image,produits.nom,produits.description,produits.prix FROM panier INNER JOIN produits ON panier.id_produit=produits.id_produit");
                            
        
                        }
                        
                        while($produit = $stmt->fetch()){
                            echo'<div class="galerie" id="element'.$produit['id_produit'].'">';
                            echo'<div class="image">';
                            echo'<div class="col-md-4" style="margin-right: 20px;"><img src=img/'.$produit['image'].' alt=""></div>';
                            echo'<div class="description col-md-4">';
                            echo'<h1>'.$produit['nom'].'</h1>';
                            echo'<p>'.$produit['description'].'</p>';
                            echo'<p>'.$produit['prix'].'XAF</p>';
                            echo'<a class="btn_con"  href="panier.php?delete_id='.$produit['id_panier'].'" onclick="supprimerElement("element'.$produit['id_produit'].'");" style="display: flex; left: 80%;"><i class="fa-solid fa-cart-shopping" style="margin-right: 5px;margin-top:5px;"></i> <span>Retirer</span></a>';
                            echo'</div>';
                            echo'</div>';
                            echo'</div>';

                        }                
                        ?>
                            <button class="btn btn-success" style="margin-top: 20px;display: flex;justify-content: center;">Ajouter</button>
                        </div>
                    </div>
                </div>
                <div class="info col-sm-5" style="margin-top: 60px;">
                    <div style="border: 2px solid rgba(0, 0, 0, 0.2);border-radius: 20px;margin: 9px;padding: 9px;">
                        <h2>coupon de reduction</h2>
                        <input type="text" class="form-control" id="">
                        <button class="btn btn-primary" style="margin-top: 20px;">reclamer</button>
                    </div>
                    <div style="border: 2px solid rgba(0, 0, 0, 0.2);border-radius: 20px;margin-top: 30px;padding: 9px;">
                        <h2>Facturation</h2>
                        <?php 
                            $total = 0;
                            if (!empty($_SESSION['panier'])){
                                // $ids = implode(',', array_map('intval', $_SESSION['panier']));
                                // $stmt = $db->query("SELECT * FROM produits WHERE id_produit IN ($ids)");
                                $stmt = $db->query("SELECT panier.id_panier,produits.id_produit,produits.image,produits.nom,produits.description,produits.prix FROM panier INNER JOIN produits ON panier.id_produit=produits.id_produit");
                           
                            }
                          while($produit = $stmt->fetch()){
                        
                             echo'<label for="" class="form-control" style="border:none;font-weigth:bold"> '.$produit['nom'].'.....................'.$produit['prix'].'XAF</label>';
                             $total += $produit['prix'];
                             
                          }
                          echo'<label for="" class="form-control">montant total:         '.$total.'</label>';
                          $_SESSION['montant_total'] = $total;
                       
                        ?>
                        <a class="btn btn-success" href="localisation.php" style="margin-top: 20px;display: flex;justify-content: center;">payer</a>
                    </div>
                    
                </div>
            </div>
        
        </div>
   
    </div>
    <div class="container-fluid" style="color: #fff;font-size: 20px;margin-top: 100px;">
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