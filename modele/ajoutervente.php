<?php
include  "connexion.php";
include_once  "function.php";

if (
     !empty($_POST["id_article"])
  && !empty($_POST["id_client"])
  && !empty($_POST["quantite"])
  && !empty($_POST["prix"]))
{
   
$article = getArticle($_POST["id_article"]);
if (!empty($article) && is_array($article)){    

if ($_POST["quantite"]>$article["quantite"]) {
        
    $_SESSION["message"]["text"]="la quantite de vente n'est pas disponiple";
    $_SESSION["message"]["type"]="danger";

}else{
    $sql = "INSERT INTO $dbname.vente(id_article,id_client,quantite,prix) VALUES (?,?,?,?)";
    $req = $pdo->prepare($sql);
    $req->execute(array(
        $_POST["id_article"],
        $_POST["id_client"],
        $_POST["quantite"],
        $_POST["prix"]));
        if ($req->rowCount()!=0) {
        $sql= "UPDATE article SET quantite=quantite-? WHERE id_article=?";
            
        $req = $pdo->prepare($sql);
        
        $req->execute(array(
        $_POST["quantite"],
        $_POST["id_article"]));
    
        if ($req->rowCount()!=0) {
            $_SESSION["message"]["text"]="vente effectuer avec succes";
            $_SESSION["message"]["type"]="success";
        }else {
            $_SESSION["message"]["text"]="imposible de faire cette vente";
            $_SESSION["message"]["type"]="danger";
        }}
        else {
            $_SESSION["message"]["text"]="une erreur s'est produit l'ors de la vente";
            $_SESSION["message"]["type"]="danger";
        }                                         
    }
}
}else {
    $_SESSION["message"]["text"]="une information obligatoire non rensigne";
    $_SESSION["message"]["type"]="danger";
} 
    
header("location: ../vue/vente.php");
     
?>