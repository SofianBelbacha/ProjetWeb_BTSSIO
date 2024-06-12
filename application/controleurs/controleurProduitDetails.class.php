<?php
class ContoleurProduitsDetails {
    public function afficher() {
        // Gestion du clic sur "voir plus"
        if (isset($_GET['idProduit'])) {
            $idProduit = $_GET['idProduit']; // Récupérer l'ID du produit sélectionné

            // Charger les données supplémentaires depuis le modèle
            VariablesGlobales::$lesDetailsProduits = GestionBoutique::getLesProduitsById($idProduit);
            VariablesGlobales::$lesCategories = GestionBoutique::getLaCategorieProduitById($idProduit);
            VariablesGlobales::$qteTotale = GestionBoutique::getQuantiteTotaleProduit($idProduit);

            if (VariablesGlobales::$lesDetailsProduits == null) {
                require Chemins::VUES_PERMANENTES . 'erreur404.inc.php';
            } else {
                require Chemins::VUES . 'v_details.inc.php'; // Assurez-vous que le chemin vers la vue est correct
            }
        }
    }
}

?>
    