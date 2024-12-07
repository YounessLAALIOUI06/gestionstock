<?php

include  "connexion.php";

if (
     !empty($_POST["nom"])
  && !empty($_POST["prenom"])
  && !empty($_POST["telephone"])
  && !empty($_POST["address"])
  && !empty($_POST["id_fournisseur"])
  ) {

$sql = "UPDATE $dbname.fournisseur SET nom=?,prenom=?,
telephone=?,address=? WHERE id_fournisseur=?";


$req = $pdo->prepare($sql);
$req->execute(array(
    $_POST["nom"],
    $_POST["prenom"],
    $_POST["telephone"],
    $_POST["address"],
    $_POST["id_fournisseur"]))  
;

if ($req->rowCount()!=0) {
    $_SESSION["message"]["text"]="article modifier avec succes";
    $_SESSION["message"]["type"]="success";
}else {
    $_SESSION["message"]["text"]="une error s'est produit lors la modification de l'article";
    $_SESSION["message"]["type"]="warning";
}
}else {
    $_SESSION["message"]["text"]="une information obligatoire non rensigne";
    $_SESSION["message"]["type"]="danger";
}

header("location: ../vue/fournisseur.php");
?>