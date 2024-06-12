<?php

require_once "../../configs/mysql_config.class.php";

// Connexion à la base de données.
try{
    $pdoCnxBase=new PDO('mysql:host=' . MySqlConfig::SERVEUR . ';dbname='. MySqlConfig::BASE, MySqlConfig::UTILISATEUR, MySqlConfig::MOT_DE_PASSE);
    $pdoCnxBase->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $pdoCnxBase->query("SET CHARACTER SET utf8");
} catch (Exception $ex) {
    echo $ex->getMessage();
}

// Récupération de l'id posté.
$enteredId = $_POST['idProduit'];
$requete = "SELECT nom, description, couleur, image, idCategorie, prix FROM produit
        JOIN prixproduit ON produit.idProduit = prixproduit.idProduit
        WHERE produit.idProduit = " . $enteredId . "
        AND prixproduit.JJMMAAAA = (SELECT MAX(JJMMAAAA) FROM prixproduit WHERE idProduit = produit.idProduit)
        GROUP BY produit.idProduit;";
// Recherche du nom d'utilisateur dans la BDD.
$pdoStResults = $pdoCnxBase->prepare($requete);
$pdoStResults->execute();
$resultat = $pdoStResults->fetch();

$pdoStResults->closeCursor();

echo json_encode($resultat);

?>