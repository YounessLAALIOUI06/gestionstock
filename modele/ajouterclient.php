<?php
include  "connexion.php";

if (
     !empty($_POST["nom"])
  && !empty($_POST["prenom"])
  && !empty($_POST["telephone"])
  && !empty($_POST["address"])
 ) {

$sql = "INSERT INTO $dbname.client(nom,prenom,telephone,address) VALUES (?,?,?,?)";
$req = $pdo->prepare($sql);
$req->execute(array(
    $_POST["nom"],
    $_POST["prenom"],
    $_POST["telephone"],
    $_POST["address"]))     
;

if ($req->rowCount()!=0) {
    $_SESSION["message"]["text"]="aproduit ajouter avec succes";
    $_SESSION["message"]["type"]="success";
}else {
    $_SESSION["message"]["text"]="une error s'est produit lors l'ajout";
    $_SESSION["message"]["type"]="danger";
}
}else {
    $_SESSION["message"]["text"]="une information obligatoire non rensigne";
    $_SESSION["message"]["type"]="danger";
}

header("location: ../vue/client.php");

?>