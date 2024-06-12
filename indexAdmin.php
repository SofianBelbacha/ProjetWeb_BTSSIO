<?php
error_reporting(E_ALL);
session_start();
ob_start(); // Démarre la mémoire tampon
require_once 'configs/chemins.class.php';
require_once Chemins::CONFIGS . 'mysql_config.class.php';
require_once Chemins::CONFIGS.'variables_globales.class.php';
require_once Chemins::MODELES . 'gestion_boutique.class.php';
require_once Chemins::VUES_ADMIN_PERMANENTES . 'v_admin_entete.inc.php';

if (!isset($_REQUEST["controleur"])) {
    require_once Chemins::VUES_ADMIN . "v_admin_accueil.inc.php";
} else {
    $action = $_REQUEST["action"];
    $controllerClass = "controleur" . $_REQUEST["controleur"];
    $fichierController = $controllerClass . ".class.php";
    // Permet de vérifié si la valeur écrit dans le paramètre "controller" est bien un nom de classe existant.
    if (file_exists(Chemins::CONTROLEURS . $fichierController)) {
        require_once Chemins::CONTROLEURS . $fichierController;
        $controllerObject = new $controllerClass;
        // Permet de vérifié que la valeur écrit dans le paramètre "action" est bien un nom de méthode existante.
        try {
            $controllerObject->$action();
        } catch (Error $err) {
            require Chemins::VUES_PERMANENTES . 'erreur404.inc.php';
        }
    } else {
        require Chemins::VUES_PERMANENTES . 'erreur404.inc.php';
    }    
}
require_once Chemins::VUES_ADMIN_PERMANENTES . 'v_admin_footer.inc.php';
?>


