<?php

//require_once '../../configs/mysql_config.class.php';
require_once 'ModelePDO.class.php';
class GestionBoutique extends ModelePDO {

    public static function isAdminOK($login,$passe) {
        self::seConnecter();
        self::$requete = "SELECT * FROM utilisateur where login=:login and passe=:passe";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->bindValue('login', $login);
        self::$pdoStResults->bindValue('passe', sha1($passe));
        self::$pdoStResults->execute();
        self::$resultat = self::$pdoStResults->fetch();
        self::$pdoStResults->closeCursor();
        if ((self::$resultat!=null) and (self::$resultat->isAdmin))
            return true;
        else
            return false;
    }

    public static function estConnecte($login,$passe)
    {
        self::seConnecter();
        self::$requete = "SELECT * FROM utilisateur WHERE login = :login AND passe = :passe";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->bindValue(":login", $login);
        self::$pdoStResults->bindValue(":passe", sha1($passe));
        self::$pdoStResults->execute();
        self::$resultat = self::$pdoStResults->fetch();
        self::$pdoStResults->closeCursor();
        return (self::$resultat != null);
    }
    
    public static function getUser($login,$passe)
    {
        self::seConnecter();
        self::$requete = "SELECT * FROM utilisateur 
        WHERE login = :login 
        AND passe = :passe";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->bindValue(":login", $login);
        self::$pdoStResults->bindValue(":passe", sha1($passe));
        self::$pdoStResults->execute();
        self::$resultat = self::$pdoStResults->fetch();
        self::$pdoStResults->closeCursor();
        return self::$resultat;
    }    
    
    public static function getLesCategoriesProduit() {
        return self::select("c.libelle AS categorie, COUNT(p.idProduit) AS count_produits", "categorie c LEFT JOIN produit p ON c.idCategorie = p.idCategorie GROUP BY c.libelle;");
    }
    public static function getesProduits() {
        return self::select("c.libelle AS categorie, COUNT(p.idProduit) AS count_produits", "categorie c LEFT JOIN produit p ON c.idCategorie = p.idCategorie GROUP BY c.libelle;");
    }
    public static function getMaxIdProduit() {
        return self::select("max(idProduit)", "produit;");
    }
    public static function getPrimaryKeyProduit() {
        return self::select("MAX(produit.idProduit)+1 AS idProduit", "produit;");
    }
    public static function getPrimaryKeyClient() {
        return self::select("MAX(client.idClient)+1 AS idClient", "client;");
    }
    public static function getPrimaryKeyUser() {
        return self::select("MAX(produit.idProduit)+1 AS idUtilisateur", "utilisateur;");
    }
    
    public static function getLesFournisseurs() {
        return self::select("nomSociete AS nomFourni", "fournisseur;");
    }
    public static function getIdByFournisseurs($nom) {
        return self::select("idFournisseur", "fournisseur", "nomSociete = '$nom';");
    }
    public static function getIdByCategorie($libelle) {
        return self::select("categorie.idCategorie", "categorie", "libelle = '$libelle';");
    }

    public static function getLesFornisseurs() {
        return self::getLesTuplesByTable("fournisseur");
    }
    
    public static function getLesClients() {
        return self::getLesTuplesByTable("client");
    }
    
    public static function getLesCategories() {
        return self::getLesTuplesByTable("categorie");
    }
    
//    public static function getLesProduitsAdmin(){
//        return self::select("p.idProduit, p.nom, p.description, p.image, p.couleur, pp.prix, u.nom AS nom_utilisateur, c.libelle AS libelle_categorie", " produit AS p INNER JOIN (SELECT idProduit, MAX(JJMMAAAA) AS derniere_date FROM prixproduit GROUP BY idProduit) AS dernier_date_prix ON p.idProduit = dernier_date_prix.idProduit INNER JOIN prixproduit AS pp ON dernier_date_prix.idProduit = pp.idProduit AND dernier_date_prix.derniere_date = pp.JJMMAAAA INNER JOIN fournisseur AS f ON p.idFournisseur = f.idFournisseur INNER JOIN utilisateur AS u ON f.idUtilisateur = u.idUtilisateur INNER JOIN categorie AS c ON p.idCategorie = c.idCategorie;");
//    }
    
    public static function getLesProduitsAdmin(){
        return self::select("p.idProduit, p.nom, p.description, p.image, p.couleur, pp.prix, f.nomSociete AS nomFournisseur, c.libelle AS libelle_categorie 
,l.qteLivrer AS Stock", " fournisseur f, produit p, prixproduit pp, categorie c, livrer l ","p.idProduit = pp.idProduit
AND c.idCategorie = p.idCategorie
AND f.idFournisseur = l.idFournisseur
AND p.idProduit = l.idProduit;");
    }
    
    public static function getLesProduits(){
        return self::select("produit.idProduit, nom, description, image, couleur, dernier_prix.prix", "produit  INNER JOIN (SELECT idProduit, MAX(JJMMAAAA) AS derniere_date FROM prixproduit GROUP BY idProduit  ) AS dernier_date_prix ON produit.idProduit = dernier_date_prix.idProduit
                INNER JOIN prixproduit AS dernier_prix ON dernier_date_prix.idProduit = dernier_prix.idProduit AND dernier_date_prix.derniere_date = dernier_prix.JJMMAAAA");
    }
    
    public static function getLesPseudos($pseudoSaisi){
        return self::getNbTuples("utilisateur", "$pseudoSaisi");
    }
    
    public static function getLesProduitsById($idProduit){
        return self::select("produit.idProduit, nom, description, image, couleur, dernier_prix.prix", "produit  INNER JOIN (SELECT idProduit, MAX(JJMMAAAA) AS derniere_date FROM prixproduit GROUP BY idProduit  ) AS dernier_date_prix ON produit.idProduit = dernier_date_prix.idProduit
                INNER JOIN prixproduit AS dernier_prix ON dernier_date_prix.idProduit = dernier_prix.idProduit AND dernier_date_prix.derniere_date = dernier_prix.JJMMAAAA", "produit.idProduit = $idProduit");
    }
    
    public static function getLaCategorieProduitById($idProduit){
        return self::executeQuery("CALL _requeteConsultation('libelle', 'categorie, produit', 'categorie.idCategorie = produit.idCategorie AND produit.idProduit = $idProduit')");
    }
    public static function getQuantiteTotaleProduit($idProduit){
        return self::executeQuery("SELECT _GetQuantiteTotaleProduit($idProduit)AS qteTotale");
    }
    
//    public static function getLesProduitsByCategorie($libelleCategorie) {
//        return self::select("p.idProduit, p.nom, p.description, p.image, p.couleur, p.stock, dernier_prix.prix ", "produit p INNER JOIN ( SELECT idProduit, MAX(JJMMAAAA) AS derniere_date FROM prixproduit GROUP BY idProduit
//                ) AS dernier_date_prix ON p.idProduit = dernier_date_prix.idProduit
//                INNER JOIN prixproduit AS dernier_prix ON dernier_date_prix.idProduit = dernier_prix.idProduit AND dernier_date_prix.derniere_date = dernier_prix.JJMMAAAA
//                INNER JOIN categorie c ON p.idCategorie = c.idCategorie", "c.libelle = '$libelleCategorie';");
//    }
    
    public static function getLesProduitsByCategorie($libelleCategorie) {
        return self::select(" p.idProduit, p.nom, p.description, p.image, p.couleur, dernier_prix.prix, COALESCE(SUM(l.qteLivrer), 0) AS quantite_en_stock"," produit p INNER JOIN ( SELECT idProduit, MAX(JJMMAAAA) AS derniere_date FROM PrixProduit GROUP BY idProduit ) AS dernier_date_prix ON p.idProduit = dernier_date_prix.idProduit INNER JOIN PrixProduit AS dernier_prix ON dernier_date_prix.idProduit = dernier_prix.idProduit AND dernier_date_prix.derniere_date = dernier_prix.JJMMAAAA INNER JOIN categorie c ON p.idCategorie = c.idCategorie LEFT JOIN livrer l ON p.idProduit = l.idProduit",
                "c.libelle = '$libelleCategorie' GROUP BY p.idProduit, p.nom, p.description, p.image, p.couleur, dernier_prix.prix;");
    }
    
    public static function getbeforeLastPrixProduit() {
        return self::select("idProduit, MAX(JJMMAAAA) AS avant_dernier_date, prix", " prixproduit p1 "," JJMMAAAA < ( SELECT MAX(p2.JJMMAAAA) 
                FROM prixproduit p2 WHERE p2.idProduit = p1.idProduit ) GROUP BY idProduit ORDER BY avant_dernier_date DESC;");
        }
        
    public static function supprimerProduitById($idProduit) {
        return self::requeteDelete("produit", "idProduit = " . $idProduit);
        }

    
    public static function getProduitById($idProduit){
        return self:: getLeTupleTableById("produit", $idProduit);
    }
    public static function getCategorieById($idCategorie){
        return self:: getLeTupleTableById("categorie", $idCategorie);

    }
    
    public static function getNbProduits() {
        self::seConnecter();
        self::$requete = "SELECT Count(*) AS nbProduits FROM Produit";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->execute();
        self::$resultat = self::$pdoStResults->fetch();
        self::$pdoStResults->closeCursor();
        return self::$resultat->nbProduits;
    }
    
    public static function ajouterCategorie($libelleCateg) {
        self::seConnecter();
        self::$requete = "insert into Categorie(libelle) values(:libelle)";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->bindValue('libelle', $libelleCateg);
        self::$pdoStResults->execute();
    }
    public static function ajouterProduit($nomProduits, $description, $image, $couleur, $idcategorie) {
        self::seConnecter();
        self::$requete = "insert into Produit(nom, description, image, couleur, idCategorie) values(:nom, :description, :image, :couleur, :idCategorie)";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->bindValue('nom', $nomProduits);
        self::$pdoStResults->bindValue('description', $description);
        self::$pdoStResults->bindValue('image', $image);
        self::$pdoStResults->bindValue('couleur', $couleur);
        self::$pdoStResults->bindValue('idCategorie', $idcategorie);
        self::$pdoStResults->execute();
    }
    public static function modifierProduit($idProduit, $nomProduits, $description, $image, $couleur, $idcategorie) {
        self::seConnecter();
        self::$requete = "update Produit set nom = :nom, description = :description, image = :image, couleur = :couleur, idCategorie = :idCategorie where idProduit = :idProduit";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->bindValue('idProduit', $idProduit);
        self::$pdoStResults->bindValue('nom', $nomProduits);
        self::$pdoStResults->bindValue('description', $description);
        self::$pdoStResults->bindValue('image', $image);
        self::$pdoStResults->bindValue('couleur', $couleur);
        self::$pdoStResults->bindValue('idCategorie', $idcategorie);
        self::$pdoStResults->execute();
    }
    
    public static function modifierPrixProduit($idProduit, $prixProduits) {
        self::seConnecter();
        $dateActuelle = date('Y-m-d H:i:s');
        self::$requete = "update prixproduit set JJMMAAAA = :JJMMAAAA, prix = :prix  where idProduit = :idProduit";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->bindValue(':idProduit', $idProduit);
        self::$pdoStResults->bindValue(':JJMMAAAA', $dateActuelle); // Utilisation de la date actuelle
        self::$pdoStResults->bindValue(':prix', $prixProduits);
        self::$pdoStResults->execute();
    }
    
    public static function ajouterUtilisateur($login, $email, $passe) {
        self::seConnecter();
        self::$requete = "INSERT INTO utilisateur(login, email, passe, isAdmin) VALUES (:login, :email, :passe, 0 )";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->bindValue('login', $login);
        self::$pdoStResults->bindValue('email', $email);
        self::$pdoStResults->bindValue('passe', sha1($passe));
        self::$pdoStResults->execute();
    }
    
    public static function ajouterClient($nom, $prenom, $rue, $codePostal, $ville, $telephone ) {
        self::seConnecter();
        self::$requete = "INSERT INTO client(nom, prenom, rue, codePostal, ville, telephone) VALUES (:nom, :prenom, :rue, :codePostal, :ville, :telephone)";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->bindValue('nom', $nom);
        self::$pdoStResults->bindValue('prenom', $prenom);
        self::$pdoStResults->bindValue('rue', $rue);
        self::$pdoStResults->bindValue('codePostal', $codePostal);
        self::$pdoStResults->bindValue('ville', $ville);
        self::$pdoStResults->bindValue('telephone', $telephone);
        self::$pdoStResults->execute();

    }

    
    
    public static function ajouterPrixProduit($idProduit, $prixProduits) {
        self::seConnecter();
        // Obtenir la date et l'heure actuelles au format MySQL (YYYY-MM-DD HH:MM:SS)
        $dateActuelle = date('Y-m-d H:i:s');
        // Préparer et exécuter la requête SQL
        self::$requete = "INSERT INTO prixproduit (idProduit, JJMMAAAA, prix) VALUES (:idProduit, :JJMMAAAA, :prix)";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->bindValue(':idProduit', $idProduit);
        self::$pdoStResults->bindValue(':JJMMAAAA', $dateActuelle); // Utilisation de la date actuelle
        self::$pdoStResults->bindValue(':prix', $prixProduits);
        self::$pdoStResults->execute();
    }
    
    public static function ajouterLivraisonProduit($idProduit, $idFournisseur, $qteLivrer, $prix) {
        self::seConnecter();
        // Obtenir la date et l'heure actuelles au format MySQL (YYYY-MM-DD HH:MM:SS)
        $dateActuelle = date('Y-m-d H:i:s');
        // Préparer et exécuter la requête SQL
        self::$requete = "INSERT INTO livrer(idProduit, idFournisseur, dateLivraison, qteLivrer, prix) VALUES (:idProduit, :idFournisseur, :dateLivraison, :qteLivrer, :prix)";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->bindValue(':idProduit', $idProduit);
        self::$pdoStResults->bindValue(':idFournisseur', $idFournisseur);
        self::$pdoStResults->bindValue(':dateLivraison', $dateActuelle); // Utilisation de la date actuelle
        self::$pdoStResults->bindValue(':qteLivrer', $qteLivrer);
        self::$pdoStResults->bindValue(':prix', $prix);
        self::$pdoStResults->execute();
    }

    public static function mdifierPrixProduit($idProduit, $dateProduit, $prixProduits) {
        self::seConnecter();
        self::$requete = "update prixproduit set JJMMAAAA = :JJMMAAAA, prix = :prix where idProduit = :idProduit";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->bindValue('idProduit', $idProduit);
        self::$pdoStResults->bindValue('JJMMAAAA', $dateProduit);
        self::$pdoStResults->bindValue('prix', $prixProduits);
        self::$pdoStResults->execute();

    }
    public static function SupprimerCategorie($id) {
        self::seConnecter();
        self::$requete = "delete from categorie where id = :IDCat";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->bindValue('IDCat', $id);

        self::$pdoStResults->closeCursor();        
        self::$pdoStResults->execute();
        
    }
    
    public static function SupprimerProduit($id) {
        self::seConnecter();
        self::$requete = "delete from produit where idProduit = :PrdId";
        
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->bindValue('PrdId', $id);

        self::$pdoStResults->closeCursor();        
        self::$pdoStResults->execute();
    }
    public static function SupprimerPrixProduit($id) {
        self::seConnecter();
        self::$requete = "delete from prixproduit where idProduit = :PrdId";
        
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->bindValue('PrdId', $id);

        self::$pdoStResults->closeCursor();        
        self::$pdoStResults->execute();
    }

    public static function ModifierCategorie($id, $libelle) {
        self::seConnecter();
        self::$requete = "update categorie SET libelle = :libelle where id= :IDCat  ";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->bindValue('IDCat', $id);
        self::$pdoStResults->bindValue('libelle', $libelle);
  

        self::$pdoStResults->closeCursor();        
        self::$pdoStResults->execute();
        
    }



}

?>

<?php


//$lesProduits = GestionBoutique::getLesProduitsById(1);
//var_dump($lesProduits);
//$lesCategorie = GestionBoutique::getLesCategories();
//var_dump($lesCategorie);
//
//$lesProduits = GestionBoutique::getLesProduits();
//var_dump($lesProduits);
//
//$lesProduitsByCat = GestionBoutique::getLesPseudos("johndoe");
//var_dump($lesProduitsByCat);
//

?>
