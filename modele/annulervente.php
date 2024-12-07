<?php
include 'connexion.php';

if (
!empty($_GET["id_vente"])&&
!empty($_GET["id_article"])&&
!empty($_GET["quantite"])
){
    $sql = "UPDATE vente SET etat=? WHERE id_vente=?";
    $reqe = $GLOBALS['pdo']->prepare($sql);
    $reqe->execute(array(0,$_GET["id_vente"]));
        if ($reqe->rowCount()!=0) {
            $sql = "UPDATE article SET quantite=quantite+? WHERE id_article=?";
            $reqe = $GLOBALS['pdo']->prepare($sql);
            $reqe->execute(array($_GET["quantite"],$_GET["id_article"]));

}}

header('Location: ../vue/vente.php');