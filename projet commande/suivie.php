<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" >
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script> 
    <script src="https://kit.fontawesome.com/0f8f5e7590.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style_suivie.css">
    <title>SCS Express</title>
</head>
<body>
    <header style="background-color:#f6D238;">
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
                    <div class="col-md-6">
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

                <div class="chariot"></div>
                
            </div>
        </div>
        <hr>
        <div class="container" style="margin-top: 20px;">
            <nav class="navbar col-md-6" style="background-color:#f6D238; ;transition: 0.5s;">
                <a href="dashbord.php"  style="text-decoration: none;color:#999;font-weight: bold;">Home</a>
                <a href="panier.php"  style="text-decoration: none;color:#f6D238;font-weight: bold;">Achat</a>
                <a href="dashbord.php#boutique"  style="text-decoration: none;color:#999;font-weight: bold;">boutique</a>
                <a href="suivie.php"  style="text-decoration: none;color:#999;font-weight: bold;">suivie</a>
              </nav>
            <div class="col-md-6"></div>
        </div> <hr>
    </header>
    <div class="container">
        <div class="row">
            <div class="zone">
                <div  class="main">
                    <div>
                        <h1> suivre mon achats</h1>
                    </div>
                    <div style="border: 2px solid rgba(0, 0, 0, 0.2);border-radius: 20px;margin-top: 30px;padding: 9px;">
                <div class="container-progress">
                    <div class="progress-bar">
                        <div class="progress" id="progress"></div>
                        <div class="step active" style="transform: translateX(-30%)">
                            <div class="icon">🛒</div>
                            <p>Add To Cart</p>
                        </div>
                        <div class="step active" style="transform: translateX(-30%)">
                            <div class="icon">📝</div>
                            <p>Fill Details</p>
                        </div>
                        <div class="step active">
                            <div class="icon">💳</div>
                            <p>Make Payment</p>
                        </div>
                        <div class="step active"style="transform: translateX(30%)">
                            <div class="icon">⚙</div>
                            <p>Order in Progress</p>
                        </div>
                        <div class="step" style="transform: translateX(30%)">
                            <div class="icon">📍</div>
                            <p>Order Arrived</p>
                        </div>
                    </div>
                        <div class="buttons">
                        <button id="prev">Prev</button>
                        <button id="next">Next</button>
                        </div>
                    </div>
            


                    </div>

                 </div>
                <div>
            
            </div>
        </div>
    </div>
    <div class="container" style="color: #fff;font-size: 20px; marging-top: 20%;">
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
    <script src="script.js">
</script>
</body>


</html>