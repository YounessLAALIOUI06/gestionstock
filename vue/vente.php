<?php

include "entete.php";
include_once "../modele/connexion.php";

if (!empty($_GET["id_vente"])){
  $article = getVente($_GET["id_vente"]);
}
?>

<div class="home-content">
    <div class="overview-boxes">
        <div class="box">
  
<form action=" <?= !empty($_GET["id_vente"]) ?  " ../modele/modifiervente.php" :    " ../modele/ajoutervente.php"  ?>" method="post">
<input value=" <?= !empty($_GET["id_vente"]) ? $article["id_vente"] : "" ?>" type="hidden" name="id_vente" id="id_vente" >

        <label for="id_article">Produit</label>
        <select name="id_article" id="id_article">
        <?php
            $articles=getArticle();
            if (!empty($articles) && is_array($articles)){
                foreach ($articles as $key  => $value){ 
                ?>
                <option value="<?= $value["id_article"]?>"><?= $value["nomArticle"]." - ". $value["quantite"]."disponible" ?></option>
             <?php  }}  ?>
        </select>

        <label for="id_client">Client</label>
        <select name="id_client" id="id_client">
        <?php 
            $Clients=getClient();
            if (!empty($Clients) && is_array($Clients)){
                foreach ($Clients as $key  => $value){
                ?>
                <option value="<?= $value["id_client"]?>"><?= $value["nom"]." - ". $value["prenom"] ?></option>
             <?php   }} ?>
        </select>

        <label for="quantite">Quantite </label>
        <input value="<?= !empty($_GET["id_article"]) ? $article["quantite"] : "" ?>" type="number" name="quantite" id="quantite" placeholder="veuillez saisir la quantite">


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
                    <th>Client</th>
                    <th>Qauntite</th>
                    <th>Prix</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>

<?php
$articles = getVente();

if (!empty($articles) && is_array($articles) ){    
foreach ($articles as $key  => $value){
?>
        <tr>
             <td> <?= $value["nomArticle"]?> </td>
             <td> <?= $value["nom"]. " " . $value["prenom"]?> </td>
             <td> <?= $value["quantite"]?> </td>
             <td> <?= $value["prix"]?> </td>
             <td> <?= date("d/m/y",strtotime($value["date_vente"]))?> </td>
             <td> 
                <a href="recuVente.php?id_vente=<?= $value["id_vente"] ?>"><i class="bx bx-receipt"></i></a>
                <a onclick="annulervente(<?= $value['id_vente'] ?>,<?= $value['id_article']?>,<?= $value['quantite'] ?>)" style="color:red;"><i class="bx bx-stop-circle"></i></a>
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
