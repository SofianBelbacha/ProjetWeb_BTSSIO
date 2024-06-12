<?php
class ControleurPanier {

    public function afficher() {
        Panier::initialiser(); // Initialisation du panier

        if (isset($_GET['idProduit'])) {
            $leProduit = $_GET['idProduit'];
            $qteProduit = isset($_GET['quantite']) ? $_GET['quantite'] : 1;
            Panier::ajouterProduit($leProduit, $qteProduit);// ... (ajout de produit au panier)
        }

        // Récupérer tous les produits dans le panier
        $lesProduitsPanier = Panier::getProduits();

        $detailsProduits = array();
        foreach ($lesProduitsPanier as $idProduit => $qte) {
            // Récupérer les détails du produit par son ID
            $detailsProduits[$idProduit] = GestionBoutique::getLesProduitsById($idProduit);
        }

        // Passer les détails des produits à la vue
        VariablesGlobales::$lesProduits = $detailsProduits; // Mettre à jour la variable globale
        require Chemins::VUES . 'v_panier.inc.php';
    }
    
    public function deleteProduit() {
        if (isset($_GET['idProduit'])) {
            $leProduit = $_GET['idProduit'];
            Panier::retirerProduit($leProduit); // Retirer le produit du panier
        }

        // Récupérer tous les produits dans le panier
        $lesProduitsPanier = Panier::getProduits();

        $detailsProduits = array();
        foreach ($lesProduitsPanier as $idProduit => $qte) {
            // Récupérer les détails du produit par son ID
            $detailsProduits[$idProduit] = GestionBoutique::getLesProduitsById($idProduit);
        }

        // Passer les détails des produits à la vue
        VariablesGlobales::$lesProduits = $detailsProduits; // Mettre à jour la variable globale
        require Chemins::VUES . 'v_panier.inc.php';
    }
    
    public function modifierQteProduit(){
        $idProduit = $_GET['idProduit'];
        $qte = $_GET['quantite'];
        Panier::modifierQteProduit($idProduit, $qte); // Retirer le produit du panier
        
        $lesProduitsPanier = Panier::getProduits();

        $detailsProduits = array();
        foreach ($lesProduitsPanier as $idProduit => $qte) {
            // Récupérer les détails du produit par son ID
            $detailsProduits[$idProduit] = GestionBoutique::getLesProduitsById($idProduit);
        }

        // Passer les détails des produits à la vue
        VariablesGlobales::$lesProduits = $detailsProduits; // Mettre à jour la variable globale
        require Chemins::VUES . 'v_panier.inc.php';

    }
    
    public function viderPanier(){
        Panier::vider(); // Vider le panier
        
        $lesProduitsPanier = Panier::getProduits();

        $detailsProduits = array();
        foreach ($lesProduitsPanier as $idProduit => $qte) {
            // Récupérer les détails du produit par son ID
            $detailsProduits[$idProduit] = GestionBoutique::getLesProduitsById($idProduit);
        }

        // Passer les détails des produits à la vue
        VariablesGlobales::$lesProduits = $detailsProduits; // Mettre à jour la variable globale
        require Chemins::VUES . 'v_panier.inc.php';



    }
        
    

}

?>