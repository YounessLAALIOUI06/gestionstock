<?php
include  "connexion.php";
include_once  "function.php";

if (
     !empty($_POST["prod"])
  //&& !empty($_POST["id_article"])
  && !empty($_POST["id_fournisseur"])
  && !empty($_POST["quantite"])
  && !empty($_POST["prix"]))
{
   


 
    $sql = "INSERT INTO $dbname.commande(id_fournisseur	,quantite,prix,prod) VALUES (?,?,?,?)";
    $req = $pdo->prepare($sql);
    $req->execute(array(
        $_POST["id_fournisseur"],
        $_POST["quantite"],
        $_POST["prix"],
        $_POST["prod"],
        
         ));
        if ($req->rowCount()!=0) {
        $sql= "UPDATE article SET quantite=quantite+? WHERE id_article=?";
            
        $req = $pdo->prepare($sql);
        
        $req->execute(array(
        $_POST["quantite"],
        $_POST["id_article"]));
    
        if ($req->rowCount()!=0) {
            $_SESSION["message"]["text"]="commande effectuer avec succes";
            $_SESSION["message"]["type"]="success";
        }else {
            $_SESSION["message"]["text"]="imposible de faire cette commande";
            $_SESSION["message"]["type"]="danger";
        }}
        else {
            $_SESSION["message"]["text"]="une erreur s'est produit l'ors de la commande";
            $_SESSION["message"]["type"]="danger";
        }                                         
  
}
else {
    $_SESSION["message"]["text"]="une information obligatoire non rensigne";
    $_SESSION["message"]["type"]="danger";
} 
    
header("location: ../vue/commande.php");
     

?>