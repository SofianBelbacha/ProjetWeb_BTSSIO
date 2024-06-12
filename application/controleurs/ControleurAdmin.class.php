<?php

class ControleurAdmin {

    public function __construct()
    {
        VariablesGlobales::$lesCategories = GestionBoutique::getLesCategories();
        VariablesGlobales::$lesFournisseurs = GestionBoutique::getLesFornisseurs();
    }
    
    public function afficherPageAccueilAdmin() {
      //Vérification que l'utilisateur est administrateur.
      if (isset($_SESSION["isAdmin"])) {
          require Chemins::VUES_ADMIN . "v_admin_accueil.inc.php";
      }
      //L'utilisateur qui n'est pas admin ne peut naturellement pas accéder au panel, il est donc alerté et renvoyé à l'accueil.
      else {
          require Chemins::VUES_PERMANENTES . 'erreur404.inc.php';
      }
    }
    
    public function afficherPageProduitAdmin() {
      //Vérification que l'utilisateur est administrateur.
      if (isset($_SESSION["isAdmin"])) {
          VariablesGlobales::$lesChamps = ModelePDO::getNomChampsByTable("produit");
          VariablesGlobales::$lesProduits = ModelePDO::getLesTuplesByTable("produit");
          require Chemins::VUES_ADMIN . "v_admin_produit.inc.php";
      }
      //L'utilisateur qui n'est pas admin ne peut naturellement pas accéder au panel, il est donc alerté et renvoyé à l'accueil.
      else {
          require Chemins::VUES_PERMANENTES . 'erreur404.inc.php';
      }
    }
    
    // Supprime un utilisateur à partir de son id.
    public function supprimerProduit() {
      if (isset($_SESSION["isAdmin"])) {
          GestionBoutique::requeteDelete("produit", "(idProduit = " . $_REQUEST["id"] . ")");
          $this->afficherPageProduitAdmin();
      }
      //L'utilisateur qui n'est pas admin ne peut naturellement pas modifier les données, il est donc alerté et renvoyé à l'accueil.
      else {
          require Chemins::VUES_PERMANENTES . 'erreur404.inc.php';
      }
    }
    
    public function ajouterProduit() {
        if (isset($_SESSION["isAdmin"])) {
            $uploadDir = 'public/image/'; // Spécifiez le chemin absolu de votre dossier de destination
            $uploadFile = $uploadDir . basename($_FILES['produit_file']['name']);
            $nomFichier = $_FILES['produit_file']['name'];
            move_uploaded_file($_FILES['produit_file']['tmp_name'], $uploadFile);
            GestionBoutique::ajouterProduit(
              $_POST["produit_nom"], 
              $_POST["produit_description"], 
              $nomFichier,
              $_POST["produit_couleur"],
              $_POST["produit_categorie"], 
              
            );
            $idProduit = GestionBoutique::getMaxIdTable('produit', 'idProduit');
            GestionBoutique::ajouterPrixProduit($idProduit, $_POST["produit_prixProduit"]);
            GestionBoutique::ajouterLivraisonProduit($idProduit, $_POST["produit_fournisseur"], $_POST["produit_qteLivrer"], $_POST["produit_prixFournisseur"]);
            $this->afficherPageProduitAdmin();
        }
        //L'utilisateur qui n'est pas admin ne peut naturellement pas modifier les données, il est donc alerté et renvoyé à l'accueil.
        else {
          require Chemins::VUES_PERMANENTES . 'erreur404.inc.php';
        }
    }
    
    public function modifierProduit() {
        if (isset($_SESSION["isAdmin"])) {
            $uploadDir = 'public/image/'; // Spécifiez le chemin absolu de votre dossier de destination
            // Vérifier si un fichier a été téléchargé
            if(isset($_FILES["produit_file_Edit"]) && $_FILES["produit_file_Edit"]['error'] !== UPLOAD_ERR_NO_FILE) {
                $uploadFile = $uploadDir . basename($_FILES['produit_file_Edit']['name']);
                $nomFichier = $_FILES['produit_file_Edit']['name'];
                move_uploaded_file($_FILES['produit_file_Edit']['tmp_name'], $uploadFile);
            } else {
                $requeteNomFichier = ModelePDO::select("image","produit", "idProduit=" . $_POST["id_produit_Edit"]);
                $nomFichier = $requeteNomFichier[0]['image'];
            }
            GestionBoutique::modifierProduit(
                $_POST["id_produit_Edit"],
                $_POST["produit_nom_Edit"], 
                $_POST["produit_description_Edit"], 
                $nomFichier,
                $_POST["produit_couleur_Edit"],
                $_POST["produit_categorie_Edit"], 
            );

            GestionBoutique::ajouterPrixProduit($_POST['id_produit_Edit'], $_POST["produit_prixProduit_Edit"]);
            $this->afficherPageProduitAdmin();
        } else {
            //L'utilisateur qui n'est pas admin ne peut naturellement pas modifier les données, il est donc alerté et renvoyé à l'accueil.
            require Chemins::VUES_PERMANENTES . 'erreur404.inc.php';
        }
    }
//<editor-fold defaultstate="collapsed" desc="région Ancien code">
//    public function afficher() {
//        VariablesGlobales::$lesProduitsAdmin = GestionBoutique::getLesProduitsAdmin();
//        VariablesGlobales::$lesCategories = GestionBoutique::getLesCategories();
//        VariablesGlobales::$lesFournisseurs = GestionBoutique::getLesFournisseurs();
//        if (isset($_POST['connexion_auto'])) {
//        setcookie('login_admin', $_POST['user'], time() + 7*24*3600, null, null, false, true);}
//        // Le cookie sera valable dans ce cas 1 semaine (7 jours)
//        require Chemins::VUES_ADMIN . 'index_admin.php';
//         
//    }
//    
//    public function afficherVueUser() {
//            if (isset($_POST['connexion_auto'])) {
//                setcookie('login_user', $_POST['user'], time() + 7*24*3600, null, null, false, true);}
//            require Chemins::CONTROLEURS . 'controleur_panier.class.php';
//            $controleurPanier = new ControleurPanier();
//            $controleurPanier->afficher();
//    }
//    
//    public function incriptionUser() {
//        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//            $idUser = GestionBoutique::getPrimaryKeyUser()[0]['idUtilisateur'];
//            $idClient = GestionBoutique::getPrimaryKeyClient()[0]['idClient'];
//            GestionBoutique::ajouterUser($idUser, $_POST['name'], $_POST['prenom'], $_POST['username'], $_POST['Mail'], $_POST['mdp'], $_POST['telephone'], $_POST['Rue'], $_POST['codePostal'], $_POST['ville'], 0);
//            GestionBoutique::ajouterClient($idUser, $idClient);
//            $_SESSION['login_user'] = $_POST['username'];
//            self::afficherVueUser();
//        }
//
//    }
//// </editor-fold>
}

?>
    