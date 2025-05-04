<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" >
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script> 
    <script src="https://kit.fontawesome.com/0f8f5e7590.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style_localisation.css">
    <title>SCS Express</title>
    <?php  
    session_start();
    ?>
</head>
<body>
    <header style="background-color: #f6D238;text-decoration-color: #fff;">
        <div class="container"  >
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
                    
                <div class="col-md-3" style="margin-top: 20px;width: 10%;margin-left: 10px; height: 3%;">
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
                <div class="col-md-3" style="margin-top: 20px;">
                    <a href="panier.php" class="btn_con" href="panier.php"><i class="fa-solid fa-cart-shopping" style="margin-right: 5px;margin-top:5px;"></i><span>panier</span></a>
                </div>
                <div class="col-md-3" style="margin-top: 20px;">
                    <a href="dashdord.php#boutique"class="btn_con" href="dashbord.php#boutique"><i class="fa-solid fa-house" style="margin-right: 5px;margin-top:5px;"></i><span>boutique</span></a>
                </div>
                <div class="chariot"></div>
                
            </div>
        </div>
        <hr>
        <div class="container" style="margin-top: 20px;">
            <nav class="navbar col-md-6" style="background-color:#f6D238;transition: 0.5s;">
                <a href="dashdord.php"  style="text-decoration: none;color:#999;font-weight: bold;">Home</a>
                <a href="panier.php"  style="text-decoration: none;color:#f6D238;font-weight: bold;">Achat</a>
                <a href="dashdord.php#boutique"  style="text-decoration: none;color:#f6D238;font-weight: bold;">boutique</a>
                <a href="suivie.php"  style="text-decoration: none;color:#f6D238;font-weight: bold;">suivie</a>
              </nav>
            <div class="col-md-6"></div>
        </div> <hr>
    </header>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <form action="" method="POST">
                    <div class="form-group" style="margin-top: 20px;">
                        <label for="">votre numeros</label>
                        <input name="numeros" id="numeros" type="telephone" class="form-control">
                    </div>
                    <div style="margin-top: 20px;">
                        <label for="">votre nom</label>
                        <input name="nom" id="nom" type="text" class="form-control">
                    </div>
                    <div style="margin-top: 20px;">
                        <label for="">votre address</label>
                        <input type="address" name="address" id="address" class="form-control">
                    </div>
                    <div style="margin-top: 20px;">
                        <label for="">date de naissance</label>
                        <input type="date" name="date_naiss" id="date_naiss" class="form-control">
                    </div>
                        <input type="checkbox" class="btn_con" style="margin-top: 9%" type="submit" name="orange" id="orange" values="1"><label for="">Orange money</label>
                        <input type="checkbox" class="btn_con" style="margin-top: 9%;margin: left 10%;" type="submit" name="MTN" id="MTN"values="2"><label for="">MTN MoMo</label>
                        <button class="btn btn-primary form-control" style="margin-top: 9%" type="submit" name="valider" id="valider">valider</button>
                    <div>
                    </div>
                </form>

               <?php 

               require 'config.php';
               $db = $connexion;
                $id_user= $_SESSION['id_user'];
                $montant=$_SESSION['montant_total'];
                $ids = implode(',', array_map('intval', $_SESSION['panier']));
                

                $statemen= $db->prepare("INSERT INTO commandes (id,user_id,total) VALUES (NULL,?,?)");
                $statemen->execute([$id_user,$ids]);
                
                $statement=$db->query("SELECT * FROM commandes");
                $stmt1= $statement->fetch();
                $idss = $stmt1['id'];
     
                $statement4=$db->query("SELECT * FROM produits WHERE id_produit IN ($ids)");
                $stmt4= $statement4->fetch();
                $prix = $stmt4['prix'];

            
                $statement2= $db->prepare("INSERT INTO commande_details(id,commande_id, produit_id,quantite,prix_unitaire) VALUES (NULL,?,?,?,?)");
                $statement2->execute([$idss,3,3,$prix]);

                $statement3= $db->prepare('INSERT INTO factures(id,commande_id,montant_total) VALUES (NULL,?,?)');
                $statement3->execute([$idss,$montant]);
                $statemen3=$db->query("SELECT * FROM factures WHERE commande_id=$idss");
                $item = $statemen3->fetch();
                $id_fact= $item['id'];

                $statemen2=$db->query("SELECT * FROM commande_details");
                $stmt2= $statemen2->fetch();
                $idsss= $stmt2['id'];
                if(!empty($_POST['orange'])){
                    }
               if(!empty($_POST['valider'])){
                $numeros=$_POST['numeros'];
                $orange=$_POST['orange'];
                $numeros=$_POST['numeros'];
                $nom=$_POST['nom'];
                $address=$_POST['address'];
                $date_naiss=$_POST['date_naiss'];
                $statement2= $db->query('UPDATE commandes SET numeros_com= $numeros,nom_com=$nom,address= $address,date_naiss=$date_naiss WHERE id=$idss');

                $statement2= $db->query('UPDATE factures SET statut_paiement= payée,mode_paiement= Orange Money  WHERE id=$id_fact');
                
                
                 }
           
            echo'</div>
            <div class="info col-md-4" style="margin-top: 60px;">';
              

            
                $item = $db->query('SELECT commande_details.id, produits.nom,produits.prix FROM commande_details JOIN produits ON commande_details.id = produits.id_produit ');
                echo'<div style="border: 2px solid rgba(0, 0, 0, 0.2);border-radius: 20px;margin-top: 30px;padding: 9px;">';
                echo'<h2>Facturation</h2>';
                echo'<label for=""class="form-control">Numeros facture           N°'.$id_fact.'</label>';
                echo'<label for="" class="form-control">montant total:                    '.$montant.'</label>';
                if (!empty($_SESSION['panier'])){
                    $ids = implode(',', array_map('intval', $_SESSION['panier']));
                    $stmt = $db->query("SELECT * FROM produits WHERE id_produit IN ($ids)");

                }
              while($produit = $stmt->fetch()){
            
                 echo'<label for="" class="form-control" style="border:none;font-weigth:bold"> '.$produit['nom'].'.....................'.$produit['prix'].'XAF</label>';
                 
              }
   
                ?>
            </div>
                
               
        </div>
           
        </div> 
        
    </div>
    
</body>
</html>