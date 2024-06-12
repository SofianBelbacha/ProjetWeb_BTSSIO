<?php

/**
 * Contrôleur incluant principalement des méthodes ayant pour contrat de require les pages demandés.
 */
class controleurAfficherPages {

    public function __construct()
    {
    }

    public function afficherAccueil() {
        require Chemins::VUES . "v_accueil.php";
    }

    public function afficherPageConnexion() {
        require Chemins::VUES . "v_connexion.inc.php";
    }

    public function afficherPageProduits() {
        VariablesGlobales::$lesProduits = GestionBoutique::getLesProduits();
        VariablesGlobales::$lesCategories = GestionBoutique::getLesCategoriesProduit();
        VariablesGlobales::$beforeLastPrice = GestionBoutique::getbeforeLastPrixProduit();
        require Chemins::VUES . "v_produits.inc.php";
    }

    public function afficherPageInscription() {
        require Chemins::VUES . "v_inscription.inc.php";
    }

    public function afficherPageReglementation() {
        require Chemins::VUES . "v_reglementation.inc.php";
    }

    public function afficherPageChatbox() {
        require Chemins::VUES . "v_chatbot.inc.php";
    }
    
    public function afficherPageContact() {
        require Chemins::VUES . "v_contact.inc.php";
    }
    
    public function afficherPagePanier() {
        require Chemins::CONTROLEURS . 'controleurPanier.class.php';
        $ContoleurProduits = new ControleurPanier();
        $ContoleurProduits->afficher();
    }

    public function afficherPagesIndexAdmin() {
        require "indexAdmin.php";
    }
    
    public function afficherPagesProduitsDeails(){
        if (isset($_GET['idProduit'])) {
            require_once Chemins::CONTROLEURS . 'controleurProduitDetails.class.php';
            $ContoleurProduitsDetails = new ContoleurProduitsDetails();
            $ContoleurProduitsDetails->afficher();
        } else {
            require Chemins::VUES_PERMANENTES . 'erreur404.inc.php';
        }

    }


#endregion

}

?>