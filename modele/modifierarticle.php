<?php

include  "connexion.php";

if (
     !empty($_POST["nomArticle"])
//  && !empty($_POST["categorie"])
  && !empty($_POST["quantite"])
  && !empty($_POST["prix_unitaire"])
  && !empty($_POST["date_fabrication"])
  && !empty($_POST["date_expiration"])
  && !empty($_POST["id_article"])
  ) {

$sql = "UPDATE $db.article SET nomArticle=?,/*categorie=?,*/
quantite=?,prix_unitaire=?,date_fabrication=?,date_expiration=? WHERE id_article=?";


$req = $pdo->prepare($sql);
$req->execute(array(
    $_POST["nomArticle"],
 //   $_POST["categorie"],
    $_POST["quantite"],
    $_POST["prix_unitaire"],
    $_POST["date_fabrication"],
    $_POST["date_expiration"],
    $_POST["id_article"]))     
;

if ($req->rowCount()!=0){
    $_SESSION["message"]["text"]="produit modifier avec succes";
    $_SESSION["message"]["type"]="success";
}else {
    $_SESSION["message"]["text"]="une error s'est produit lors la modification de l'article";
    $_SESSION["message"]["type"]="warning";
}
}else {
    $_SESSION["message"]["text"]="une information obligatoire non rensigne";
    $_SESSION["message"]["type"]="danger";
}
header("location: ../vue/Produit.php");
?>