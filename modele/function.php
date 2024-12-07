<?php 
include "connexion.php";
     
function getArticle($id=null)
{   if (!empty($id)) {
    $sql = "SELECT * FROM article WHERE id_article=?";
        
    $reqe = $GLOBALS['pdo']->prepare($sql);
      
    $reqe ->execute(array($id));
      
    return $reqe ->fetch();

} else { 
      $sql = "SELECT * FROM article";
        
      $reqe = $GLOBALS['pdo']->prepare($sql);
        
      $reqe ->execute();
        
      return $reqe ->fetchAll();}
}


function getClient($id=null)
{   if (!empty($id)) {
    $sql = "SELECT * FROM client WHERE id_client=?";
        
    $reqe = $GLOBALS['pdo']->prepare($sql);
      
    $reqe ->execute(array($id));
      
    return $reqe ->fetch();

} else { 
      $sql = "SELECT * FROM client";
        
      $reqe = $GLOBALS['pdo']->prepare($sql);
        
      $reqe ->execute();
        
      return $reqe ->fetchAll();}
}

function getVente($id=null)
{   
    if (!empty($id)) {
    $sql = "SELECT 	nomArticle,nom,prenom,v.quantite,prix,date_vente,v.id_vente,prix_unitaire,address,telephone,
    date_vente FROM client AS c, vente AS v, article AS a WHERE v.id_article=a.id_article AND v.id_client=c.id_client AND v.id_vente=? AND etat=?";
        
    $reqe = $GLOBALS['pdo']->prepare($sql);
      
    $reqe ->execute(array($id,1));
      
    return $reqe ->fetch();
     
}

else {
      $sql = "SELECT nomArticle,nom,prenom,v.quantite,prix,
      date_vente,id_vente,v.id_vente,a.id_article AS id_article
      FROM client AS c, vente AS v, article AS a WHERE v.id_article=a.id_article AND v.id_client=c.id_client AND etat=?";
        


      $reqe = $GLOBALS['pdo']->prepare($sql);
        
      $reqe ->execute(array(1));
        
      return $reqe ->fetchAll();}

}


function getFournisseur($id=null)
{   if (!empty($id)) {
    $sql = "SELECT * FROM fournisseur WHERE id_fournisseur=?";
        
    $reqe = $GLOBALS['pdo']->prepare($sql);
      
    $reqe ->execute(array($id,1));
      
    return $reqe ->fetch();

} else { 
      $sql = "SELECT * FROM fournisseur";
        
      $reqe = $GLOBALS['pdo']->prepare($sql);
        
      $reqe ->execute();
        
      return $reqe ->fetchAll();}
}

/*
function getCommande($id=null)
{   if (!empty($id)) {
    $sql = "SELECT 	nomArticle,nom,prenom,co.quantite,prix,prix_unitaire,address,telephone,
    date_commande FROM fournisseur AS , commande AS co, article AS a WHERE co.id_article=a.id_article AND co.id_fournisseur=f.id_fournisseur AND co.id_commande=?";
        
    $reqe = $GLOBALS['pdo']->prepare($sql);
      
    $reqe ->execute(array($id));
      
    return $reqe ->fetch();

} else { 
      $sql = "SELECT nomArticle,nom,prenom,co.quantite,prix,
      date_commande,co.id_commande,a.id_article AS id_article
      FROM fournisseur AS f, commande AS co, article AS a WHERE co.id_article=a.id_article AND co.id_fournisseur=f.id_fournisseur";
        
      $reqe = $GLOBALS['pdo']->prepare($sql);
        
      $reqe ->execute();
        
      return $reqe ->fetchAll();}
}
*/
function getCommande($id=null)
{   if (!empty($id)) {
    $sql = "SELECT 	co.prod,nom,prenom,co.quantite,prix,address,telephone,
    date_commande FROM fournisseur AS , commande AS co WHERE  co.id_fournisseur=f.id_fournisseur AND co.id_commande=?";
        
    $reqe = $GLOBALS['pdo']->prepare($sql);
      
    $reqe ->execute(array($id));
      
    return $reqe ->fetch();

} else { 
      $sql = "SELECT co.prod,nom,prenom,co.quantite,prix,
      date_commande,co.id_commande
      FROM fournisseur AS f, commande AS co WHERE co.id_fournisseur=f.id_fournisseur";
        
      $reqe = $GLOBALS['pdo']->prepare($sql);
        
      $reqe ->execute();
        
      return $reqe ->fetchAll();}
}






function getlastVente($id=null){

      $sql = "SELECT nomArticle,nom,prenom,v.quantite,prix,
      date_vente,id_vente,v.id_vente,a.id_article AS id_article
      FROM client AS c, vente AS v, article AS a WHERE v.id_article=a.id_article AND v.id_client=c.id_client AND etat=? ORDER BY date_vente DESC LIMIT 10";
        
      $reqe = $GLOBALS['pdo']->prepare($sql);
        
      $reqe ->execute(array(1));
        
      return $reqe ->fetchAll();
}


function getmostVente(){

    $sql = "SELECT nomArticle,prix,
    date_vente,id_vente,v.id_vente,a.id_article AS id_article
    FROM client AS c, vente AS v, article AS a WHERE v.id_article=a.id_article AND v.id_client=c.id_client AND etat=? ORDER BY date_vente DESC LIMIT 10";
         
    $reqe = $GLOBALS['pdo']->prepare($sql);
      
    $reqe ->execute(array(1));
      
    return $reqe ->fetchAll();
}



function getallcommandes(){

      $sql="SELECT COUNT(*) AS nbre  FROM commande";
      $reqe = $GLOBALS['pdo']->prepare($sql);
      
    $reqe ->execute();
      
    return $reqe ->fetch();
}

function getallventes(){

    $sql="SELECT COUNT(*) AS nbre  FROM vente";
    $reqe = $GLOBALS['pdo']->prepare($sql);
    
  $reqe ->execute();
    
  return $reqe ->fetch();
}

function getallarticles(){

    $sql="SELECT COUNT(*) AS nbre  FROM article";
    $reqe = $GLOBALS['pdo']->prepare($sql);
    
  $reqe ->execute();
    
  return $reqe ->fetch();
}

function getca(){

    $sql="SELECT SUM(prix) AS prix  FROM vente";
    $reqe = $GLOBALS['pdo']->prepare($sql);
    
  $reqe ->execute();
    
  return $reqe ->fetch();
}


?>