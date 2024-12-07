<?php

 include "entete.php";
 include_once "../modele/connexion.php";

if (!empty($_GET["id_article"])){
  $article = getArticle($_GET["id_article"]);
}
?>

<div class="home-content">
    <div class="overview-boxes">
        <div class="box">

<form action=" <?= !empty($_GET["id_article"]) ?  " ../modele/modifierarticle.php" :    " ../modele/ajouterarticle.php"  ?>" method="post">

        <label for="nomArticle">Nom de produit</label>
        <input value="<?= !empty($_GET["id_article"]) ? $article["nomArticle"] : "" ?>" type="text" name="nomArticle" id="nomArticle" placeholder="veuillez saisir le nom">
        <input value="<?= !empty($_GET["id_article"]) ? $article["id_article"] : "" ?>" type="hidden" name="id_article" id="id_article" >



        <label for="quantite">Quantite des produit</label>
        <input value="<?= !empty($_GET["id_article"]) ? $article["quantite"] : "" ?>" type="number" name="quantite" id="quantite" placeholder="veuillez saisir la quantite">


        <label for="prix_unitaire">Prix de produit</label>
        <input value="<?= !empty($_GET["id_article"]) ? $article["prix_unitaire"] : "" ?>" type="number" name="prix_unitaire" id="prix_unitaire" placeholder="veuillez saisir le prix">


        <label for="date_fabrication">Date de fabrication de produit</label>
        <input value="<?= !empty($_GET["id_article"]) ? $article["date_fabrication"] : "" ?>" type="datetime-local" name="date_fabrication" id="date_fabrication">


        <label for="date_expiration">Date d'expiration de produit</label>
        <input value="<?= !empty($_GET["id_article"]) ? $article["date_expiration"] : "" ?>" type="datetime-local" name="date_expiration" id="date_expiration">
    
        
    <button type="submit">valider</button>


<?php
      if (!empty($_SESSION["message"]["text"])){
?>


        <div class="alert <?= $_SESSION["message"]["type"]?>"> <?= $_SESSION["message"]["text"]?></div>

<?php
}
?>
</form>
    </div>
        <div class="box">
             <table class="mtable">
                <tr>
                    <th>Nom produit</th>
               <!--     <th>Categorie</th>-->
                    <th>Qauntite</th>
                    <th>Prix unitaire</th>
                    <th>Date fabrication</th>
                    <th>Date expiration</th>
                     <th>Action</th>
                </tr>

<?php
$articles = getArticle();
if (!empty($articles) && is_array($articles)){
foreach ($articles as $key  => $value){
?>
        <tr>
             <td> <?= $value["nomArticle"]?> </td>
             <td> <?= $value["quantite"]?> </td>
             <td> <?= $value["prix_unitaire"]?> </td>
             <td> <?= date("d/m/y m:i:s",strtotime($value["date_fabrication"]))?> </td>
             <td> <?= date("d/m/y m:i:s",strtotime($value["date_expiration"]))?> </td>
             <td> <a href="?id_article=<?= $value["id_article"] ?>"><i class="bx bx-edit-alt"></i></a></td>
        </tr>    

<?php
}}
?>
</table>
</div>

<?php
include "pied.php";
?>