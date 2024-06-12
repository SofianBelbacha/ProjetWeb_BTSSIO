<?php

class ControleurProduits {

    public function afficher() {
        VariablesGlobales::$lesProduits = GestionBoutique::getLesProduits();
        VariablesGlobales::$lesCategories = GestionBoutique::getLesCategoriesProduit();
        VariablesGlobales::$beforeLastPrice = GestionBoutique::getbeforeLastPrixProduit();

        $categorie = null; // Initialisez la variable catégorie pour éviter les problèmes si elle n'est pas définie

        if (isset($_GET['categorie'])) {
            $categorie = $_GET['categorie']; // Récupérer l'ID de la catégorie sélectionnée
            // Charger les données supplémentaires depuis le modèle
            VariablesGlobales::$lesProduitsByCat = GestionBoutique::getLesProduitsByCategorie($categorie);

            if (VariablesGlobales::$lesProduitsByCat == null) {
                require Chemins::VUES_PERMANENTES . 'erreur404.inc.php';
                return; // Arrêter l'exécution pour éviter d'afficher la vue produits.php
            }
        }

        // Inclure la vue produits.php une seule fois après avoir chargé les données
        require Chemins::VUES . 'v_produits.inc.php';
    }
    
}

?>
    