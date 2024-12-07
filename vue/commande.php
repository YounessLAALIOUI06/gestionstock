<?php

include "entete.php";
include_once "../modele/connexion.php";
/*
if (!empty($_GET["id_commande"])){
  $commande = getCommande($_GET["id_commande"]);  
}


?>

<div class="home-content">
    <div class="overview-boxes">
        <div class="box">
              
<form action=" <?= !empty($_GET["id_commande"]) ?  " ../modele/modifiercommande.php" :    " ../modele/ajoutercommande.php"  ?>" method="post">
<input value=" <?= !empty($_GET["id_commande"]) ? $commande["id_commande"] : "" ?>" type="hidden" name="id_commande" id="id_commande" >
                                       
        <label for="id_article">Produit</label>
        <select name="id_article" id="id_article">

        <option value="0" selected>autre servive</option> <!-- Option par défaut -->

    <?php
        $article = getArticle();
        if (!empty($article) && is_array($article)) {
            foreach ($article as $key => $value) { 
                ?>
                <option value="<?= $value["id_article"] ?>"><?= $value["nomArticle"] . " - " . $value["quantite"] . " disponible" ?></option>
                <?php  
            }
        }  
    ?>


<?php 
            $article=getArticle();
            if (!empty($article) && is_array($article)){
                foreach ($article as $key  => $value){ 
                ?>
                <option value="<?= $value["id_article"]?>"><?= $value["nomArticle"]." - ". $value["quantite"]."disponible" ?></option>
             <?php  }}  ?>


        
        </select>

        <label for="id_fournisseur">Fournisseur</label>
        <select name="id_fournisseur" id="id_fournisseur">
        <?php 
            $Clients=getFournisseur();
            if (!empty($Clients) && is_array($Clients)){
                foreach ($Clients as $key  => $value){
                ?>
                <option value="<?= $value["id_fournisseur"]?>"><?= $value["nom"]." - ". $value["prenom"] ?></option>
             <?php   }} ?>
        </select>

        <label for="quantite">Quantite </label>
        <input value="<?= !empty($_GET["id_article"]) ? $article["quantite"] : "0" ?>" type="number" name="quantite" id="quantite" placeholder="veuillez saisir la quantite">


        <label for="prix">Prix </label>
        <input value="<?= !empty($_GET["id_article"]) ? $article["prix"] : "" ?>" type="number" name="prix" id="prix" placeholder="veuillez saisir le prix">



        
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
                    <th>Produit</th>
                  
                    <th>Fournisseur</th>
                    <th>Qauntite</th>
                    <th>Prix</th>
                    <th>Date</th>
                    <th>Action</th>                    
                </tr>

<?php
$commande = getCommande();

if (!empty($commande) && is_array($commande) ){
      

foreach ($commande as $key  => $value)  { 

?>
        <tr> 
             <td> <?= $value["nomArticle"]?> </td>
       
             <td> <?= $value["nom"]. " " . $value["prenom"]?> </td>
             <td> <?= $value["quantite"]?> </td>
             <td> <?= $value["prix"]?> </td>
             <td> <?= date("d/m/y",strtotime($value["date_commande"]))?> </td>
             <td> 
                <a href="recuCommande.php?id_commande=<?= $value["id_commande"] ?>"><i class="bx bx-receipt"></i></a>
                <a onclick="annulercommande(<?= $value['id_commande'] ?>,<?= $value['id_article']?>,<?= $value['quantite'] ?>)" style="color:red;"><i class="bx bx-stop-circle"></i></a>
        </td> 
        </tr>    

<?php
}}
?>
</table>
      </div>

<?php

include "pied.php";
*/



if (!empty($_GET["id_commande"])){
    $commande = getCommande($_GET["id_commande"]);  
  }
  
  
  ?>
  
  <div class="home-content">
      <div class="overview-boxes">
          <div class="box">
                
  <form action=" <?= !empty($_GET["id_commande"]) ?  " ../modele/modifiercommande.php" :    " ../modele/ajoutercommande.php"  ?>" method="post">
  <input value=" <?= !empty($_GET["id_commande"]) ? $commande["id_commande"] : "" ?>" type="hidden" name="id_commande" id="id_commande" >
                                         
          <label for="prod">Produit</label>
          
  
          <input value="<?= !empty($_GET["id_commande"]) ? $article["prod"] : "" ?>" type="text" name="prod" id="prod" placeholder="veuillez saisir le service">
  
  

  
                     
  
  
          
          </select>
  
          <label for="id_fournisseur">Fournisseur</label>
          <select name="id_fournisseur" id="id_fournisseur">
          <?php 
              $Clients=getFournisseur();
              if (!empty($Clients) && is_array($Clients)){
                  foreach ($Clients as $key  => $value){
                  ?>
                  <option value="<?= $value["id_fournisseur"]?>"><?= $value["nom"]." - ". $value["prenom"] ?></option>
               <?php   }} ?>
          </select>
  
          <label for="quantite">Quantite </label>
          <input value="<?= !empty($_GET["id_commande"]) ? $article["quantite"] : "" ?>" type="number" name="quantite" id="quantite" placeholder="veuillez saisir la quantite">
  
  
          <label for="prix">Prix </label>
          <input value="<?= !empty($_GET["id_commande"]) ? $article["prix"] : "" ?>" type="number" name="prix" id="prix" placeholder="veuillez saisir le prix">
          <?php  // if (empty($article["id_article"] )) {

//$article["id_article"] = 200;  }?>
  
  
          
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
                      <th>Produit</th>
                    
                      <th>Fournisseur</th>
                      <th>Qauntite</th>
                      <th>Prix</th>
                      <th>Date</th>
                      <th>Action</th>                    
                  </tr>
  
  <?php
  $commande = getCommande();
  
  if (!empty($commande) && is_array($commande) ){
        
  
  foreach ($commande as $key  => $value)  { 
  
  ?>
          <tr> 
               <td> <?= $value["prod"]?> </td>
         
               <td> <?= $value["nom"]. " " . $value["prenom"]?> </td>
               <td> <?= $value["quantite"]?> </td>
               <td> <?= $value["prix"]?> </td>
               <td> <?= date("d/m/y",strtotime($value["date_commande"]))?> </td>
               <td> 
                  <a href="recuCommande.php?id_commande=<?= $value["id_commande"] ?>"><i class="bx bx-receipt"></i></a>
                  <a onclick="annulercommande(<?= $value['id_commande'] ?>,<?= $value['id_article']?>,<?= $value['quantite'] ?>)" style="color:red;"><i class="bx bx-stop-circle"></i></a>
          </td> 
          </tr>    
  
  <?php
  }}
  ?>
  </table>
        </div>
  
  <?php
  
  include "pied.php";











?>
<script>
        function annulervente(id_vente,id_article,quantite){
            if(confirm("Voulez-vous vraiment annuler cette vente ?")){
                window.location.href="../modele/annulervente.php?id_vente="+id_vente+"&id_article="+id_article+"&quantite="+quantite;
            }
        }

        function setPrix() {
            var article= document.querySelector('#id_article');
            var quantite= document.querySelector('#quantite');
            var prix= document.querySelector('#prix');
            var prixUnitaire= article.options[article.selectedIndex].getAttribute('data-prix');
            prix.value=Number(quantite.value) * Number(prixUnitaire);
        }

</script>
