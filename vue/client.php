<?php
 
include "entete.php";
include_once "../modele/connexion.php";
 
if (!empty($_GET["id_client"])){
  $article = getClient($_GET["id_client"]);
}
?>

<div class="home-content">
    <div class="overview-boxes">
        <div class="box"> 

<form action=" <?= !empty($_GET["id_client"]) ?  " ../modele/modifierclient.php" :    " ../modele/ajouterclient.php"  ?>" method="post">

        <label for="nom">Nom </label>
        <input value="<?= !empty($_GET["id_client"]) ? $article["nom"] : "" ?>" type="text" name="nom" id="nom" placeholder="veuillez saisir le nom">
        <input value="<?= !empty($_GET["id_client"]) ? $article["id_client"] : "" ?>" type="hidden" name="id_client" id="id_client" >
    
        <label for="prenom">Prenom </label>
        <input value="<?= !empty($_GET["id_client"]) ? $article["prenom"] : "" ?>" type="text" name="prenom" id="prenom" placeholder="veuillez saisir le prenom">

        <label for="telephone">telephone</label>
        <input value="<?= !empty($_GET["id_client"]) ? $article["telephone"] : "" ?>" type="text" name="telephone" id="telephone" placeholder="veuillez saisir la telephone">

        <label for="address">Address</label>
        <input value="<?= !empty($_GET["id_client"]) ? $article["address"] : "" ?>" type="text" name="address" id="address" placeholder="veuillez saisir l'address">

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
             <table class="mtbl">
                <tr>
                    <th>Nom </th>
                    <th>Prenom </th>
                    <th>Telephone </th>
                    <th>Address </th>
                    <th>Action</th>
               </tr>
<?php
$articles = getClient();
if (!empty($articles) && is_array($articles)){
foreach ($articles as $key  => $value){
?>   
         <tr>
             <td> <?= $value["nom"]?> </td>
             <td> <?= $value["prenom"]?> </td>
             <td> <?= $value["telephone"]?> </td>
             <td> <?= $value["address"]?> </td>
             <td> <a href="?id_client=<?= $value["id_client"] ?>"><i class="bx bx-edit-alt"></i></a></td>
        </tr>
<?php
}}   
?>   
</table>
    </div>
     
<?php
include "pied.php";
?>