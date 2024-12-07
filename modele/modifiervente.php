<?php

include  "connexion.php";

if (
     !empty($_POST["id_article"])
  && !empty($_POST["id_client"])
  && !empty($_POST["quantite"])
  && !empty($_POST["prix"])
  ) {

$sql = "UPDATE $dbname.vente SET id_article=?,id_client=?,
quantite=?,prix=? WHERE id_vente=?";

$req = $pdo->prepare($sql);
$req->execute(array(
    $_POST["id_article"],
    $_POST["id_client"],
    $_POST["quantite"],
    $_POST["prix"]))
;

if ($req->rowCount()!=0) {
    $sql = "UPDATE article SET quantite=quantite-? WHERE id_article=?";
    $req = $pdo->prepare($sql);    
    $req->execute(array(
    $_POST["quantite"],
    $_POST["id_article"])); }

if ($req->rowCount()!=0) {
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

header("location: ../vue/client.php");
?>