<?php
 
include "entete.php";
include_once "../modele/connexion.php";
 
if (!empty($_GET["id_fournisseur"])){
    $fournisseur = getFournisseur($_GET["id_fournisseur"]);
}
?>

<div class="home-content">
    <div class="overview-boxes">
        <div class="box"> 

<form action=" <?= !empty($_GET["id_fournisseur"]) ?  " ../modele/modifierfournisseur.php" :    " ../modele/ajouterfournisseur.php"  ?>" method="post">
    
        <label for="nom">Nom </label>
        <input value="<?= !empty($_GET["id_fournisseur"]) ? $fournisseur["nom"] : "" ?>" type="text" name="nom" id="nom" placeholder="veuillez saisir le nom">
        <input value="<?= !empty($_GET["id_fournisseur"]) ? $fournisseur["id_fournisseur"] : "" ?>" type="hidden" name="id_fournisseur" id="id_fournisseur" >
    
        <label for="prenom">Prenom </label>
        <input value="<?= !empty($_GET["id_fournisseur"]) ? $fournisseur["prenom"] : "" ?>" type="text" name="prenom" id="prenom" placeholder="veuillez saisir le prenom">

        <label for="telephone">telephone</label>
        <input value="<?= !empty($_GET["id_fournisseur"]) ? $fournisseur["telephone"] : "" ?>" type="text" name="telephone" id="telephone" placeholder="veuillez saisir la telephone">

        <label for="address">Address</label>
        <input value="<?= !empty($_GET["id_fournisseur"]) ? $fournisseur["address"] : "" ?>" type="text" name="address" id="address" placeholder="veuillez saisir l'address">
        
        


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
$fournisseur = getFournisseur();
if (!empty($fournisseur) && is_array($fournisseur)){
foreach ($fournisseur as $key  => $value){
?>   
         <tr>
             <td> <?= $value["nom"]?> </td>
             <td> <?= $value["prenom"]?> </td>
             <td> <?= $value["telephone"]?> </td>
             <td> <?= $value["address"]?> </td>
             <td> <a href="?id_fournisseur=<?= $value["id_fournisseur"] ?>"><i class="bx bx-edit-alt"></i></a></td>
        </tr>
<?php
}}   
?>   
</table>
    </div>
     
<?php
include "pied.php";
?>