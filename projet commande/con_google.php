<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
  document.addEventListener("DOMContentLoaded", function () {
  const urlParams = new URLSearchParams(window.location.search);
  const codeSent = urlParams.get("code_sent");

  const emailModal = document.getElementById("emailModal");
  const codeModal = document.getElementById("codeModal");
  console.log(codeSent);
  
  if (codeSent == 1) {

    emailModal.style.display = "none";
    codeModal.style.display = "block";
  }
});
</script>
</head>
<body>
    <!-- Modal Email -->
<div id="emailModal" style="display:block;">
  <form method="POST" action="con_google.php">
    <label>Adresse email :</label>
    <input type="email" name="email" id="email" required>
    <button type="submit" name="envoyer" id="envoyer">Envoyer le code</button>
  </form>
</div>

<!-- Modal Code (s'affiche après) -->
<div id="codeModal" style="display:none;">
  <form method="POST" action="con_google.php">
    <label>Code reçu :</label>
    <input type="text" name="code" required>
    <button type="submit">Valider</button>
  </form>
</div>
    
<?php
include 'config.php';
session_start();

$db = $connexion;

if(!empty($_POST['envoyer'])){
  if (!empty($_POST['email'])) {
    $email = $_POST['email'];
    $code = rand(100000, 999999);

    // Stocker dans la session (ou base de données)
    $_SESSION['email_auth'] = $email;
    $_SESSION['code_auth'] = $code;


    $statement = $db->query("SELECT * FROM `users` WHERE `email` = '$email'");
    $fetch = $statement->fetch();
    $row = $statement->rowCount();

    if($row > 0){
    $_SESSION['id_user'] = $fetch['id_user'];
    
     // Envoyer le code par email (simplifié)
     mail($email, "Votre code de connexion", "Voici votre code : $code");

     // Rediriger pour afficher le modal de code
     header("Location:con_google.php?code_sent=1");
     exit;
  }else{
    echo "<center><label class='text-danger'>Invalid email</label></center>";
    }

}

}


if (!empty($_POST['code']) && $_SESSION['code_auth']) {
    if ($_POST['code'] == $_SESSION['code_auth']) {
        // Connexion réussie
     
        header("Location: dashboard.php");
        exit;
    } else {
        echo "Code incorrect.";
    }
}
?>





</body>
</html>

