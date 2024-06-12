<?php
error_reporting(E_ALL);
ob_start(); // Démarre la mémoire tampon
session_start();
require_once 'configs/chemins.class.php';
require_once Chemins::CONFIGS . 'mysql_config.class.php';
require_once Chemins::CONFIGS.'variables_globales.class.php';
require_once Chemins::CONFIGS.'Panier.class.php';
require_once Chemins::MODELES . 'gestion_boutique.class.php';
require Chemins::VUES_PERMANENTES . 'v_entete.inc.php';

//<editor-fold defaultstate="collapsed" desc="région Ancien code">

//$cas = (!isset($_REQUEST['cas'])) ? 'afficherAccueil' : $_REQUEST['cas'];
//if (isset($_REQUEST['categorie'])) {
//    $categorie = $_REQUEST['categorie'];
//}
//if (isset($_REQUEST['idProduit'])) {
//    $idProduit = $_REQUEST['idProduit'];
//}
//
//if (isset($_COOKIE['login_admin']))
// $_SESSION['login_admin'] = $_COOKIE['login_admin'];
//
//if (isset($_COOKIE['login_user']))
// $_SESSION['login_user'] = $_COOKIE['login_user'];
////// </editor-fold>
//<editor-fold defaultstate="collapsed" desc="région Ancien code">
//Aiguillage vers le bon corps de page
//switch ($cas) {
//    case 'afficherAccueil': {
//            require Chemins::VUES . 'v_accueil.php';
//            break;
//        }
//    case 'afficherPageContact': {
//            require Chemins::VUES . 'contact.php';
//            break;
//        }
//    case 'afficherPageDetails': {
//            require Chemins::VUES . 'details.php';
//            break;
//        }    
//    case 'afficherPageConnexion': {
//            require Chemins::VUES . 'connexion.php';
//            break;
//        }
//
//    case 'afficherPageInscription': {
//            require Chemins::VUES . 'inscription.php';
//            break;
//        }
//    case 'afficherPageProduit': {
//            require Chemins::VUES . 'produits.php';
//            break;
//        }
//    case 'afficherPageReglementation': {
//            require Chemins::VUES . 'reglementation.php';
//            break;
//        }
//}
////// </editor-fold>
//<editor-fold defaultstate="collapsed" desc="région Ancien code">
//switch ($cas) {
//    case 'afficherAccueil': {
//            require Chemins::VUES . 'v_accueil.php';
//            break;
//        }
//    case 'afficherPanier': {
//        if (isset($_GET['idProduit']) && isset($_SESSION['login_user'])) {
//            require Chemins::CONTROLEURS . 'controleur_panier.class.php';
//            $ContoleurProduits = new ControleurPanier();
//            $ContoleurProduits->afficher();
//        }else {
//            require Chemins::VUES_PERMANENTES . 'erreur404.inc.php';
//        }
//        break;
//
//    }
//    case 'deletePanier': {
//        if (isset($_GET['idProduit'])) {
//            require Chemins::CONTROLEURS . 'controleur_panier.class.php';
//            $ContoleurProduits = new ControleurPanier();
//            $ContoleurProduits->deleteProduit();
//        }
//        break;
//    }
//    case 'modifierQuantite': {
//        if (isset($_GET['idProduit']) && isset($_GET['quantite'])) {
//            $idProduit = $_GET['idProduit'];
//            $qte = $_GET['quantite'];
//            require Chemins::CONTROLEURS . 'controleur_panier.class.php';
//            $ContoleurProduits = new ControleurPanier();
//            $ContoleurProduits->modifierQteProduit();
//        }
//        break;
//    }
//    case 'modifierQuantite': {
//        if (isset($_GET['idProduit']) && isset($_GET['quantite'])) {
//            $idProduit = $_GET['idProduit'];
//            $qte = $_GET['quantite'];
//            require Chemins::CONTROLEURS . 'controleur_panier.class.php';
//            $ContoleurProduits = new ControleurPanier();
//            $ContoleurProduits->modifierQteProduit();
//        }
//        break;
//    }
//    case 'clearPanier': {
//        require Chemins::CONTROLEURS . 'controleur_panier.class.php';
//        $ContoleurProduits = new ControleurPanier();
//        $ContoleurProduits->viderPanier();
//        
//        break;
//    }
//    case 'verifierConnexion': {
//        if (GestionBoutique::isAdminOK($_POST['user'], $_POST['passe']))
//        { 
//            $_SESSION['login_admin'] = $_POST['user'];
//            require Chemins::CONTROLEURS . 'controleur_admin.class.php';
//            $ContoleurProduits = new ContoleurProduitsAdmin();
//            $ContoleurProduits->afficher();
//        }
//        elseif (GestionBoutique::isUserOK($_POST['user'], $_POST['passe'])) {
//            $_SESSION['login_user'] = $_POST['user'];
//            require Chemins::CONTROLEURS . 'controleur_admin.class.php';
//            $ContoleurProduits = new ContoleurProduitsAdmin();
//            $ContoleurProduits->afficherVueUser();
//        }
//        else{
//            $_SESSION['erreur_message'] = 'Identifiant ou mot de passe incorrect';
//            require Chemins::VUES . 'connexion.php';
//        }
//        break;
//    }
//    case 'verifierInscription': {
//        require Chemins::CONTROLEURS . 'controleur_admin.class.php';
//        $ContoleurProduits = new ContoleurProduitsAdmin();
//        $ContoleurProduits->incriptionUser();
//        break;
//    }
//    case 'seDeconnecter': {
//        if (isset($_COOKIE['login_admin'])){
//            $_SESSION = array();
//            session_destroy();
//            setcookie('login_admin', '');
//            header("Location: index.php");
//            break;
//        }
//        else{
//            $_SESSION = array();
//            session_destroy();
//            setcookie('login_user', '');
//            header("Location: index.php");
//            break;
//
//        }
//    }
//    case 'ajoutProduit': {
//        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//            $uploadDir = 'public/image/'; // Spécifiez le chemin absolu de votre dossier de destination
//            $uploadFile = $uploadDir . basename($_FILES['avatar']['name']);
//            $nomFichier = $_FILES['avatar']['name'];
//            if (move_uploaded_file($_FILES['avatar']['tmp_name'], $uploadFile)) {
//                echo "Le fichier est valide et a été téléchargé avec succès.";
//            } else {
//                echo "Une erreur s'est produite lors du téléchargement du fichier.";
//            }
//            $idFournisseur = GestionBoutique::getIdByFournisseurs($_POST['fournisseur'])[0]['idFournisseur'];
//            $idcategorie = GestionBoutique::getIdByCategorie($_POST['categorie'])[0]['idCategorie'];
//            $idProduitArray = GestionBoutique::getPrimaryKeyProduit(); // Récupérer le tableau de la clé primaire du produit
//            $idProduit = isset($idProduitArray[0]) ? $idProduitArray[0]['idProduit'] : null;
//            $dateAujourdhui = date("Y-m-d");
//            GestionBoutique::ajouterProduit($idProduit, $_POST['nom'], $_POST['description'], $nomFichier, $_POST['couleur'], $_POST['Quantité'], $idcategorie, $idFournisseur);
//            GestionBoutique::ajouterPrixProduit($idProduit, $dateAujourdhui, $_POST['prix']);
//            require Chemins::VUES . 'produits.php';
//            break;
//        }
//    }
//    case 'modifierProduit': {
//        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//            $uploadDir = 'public/image/'; // Spécifiez le chemin absolu de votre dossier de destination
//            $uploadFile = $uploadDir . basename($_FILES['avatar']['name']);
//            $nomFichier = $_FILES['avatar']['name'];
//            if (move_uploaded_file($_FILES['avatar']['tmp_name'], $uploadFile)) {
//                echo "Le fichier est valide et a été téléchargé avec succès.";
//            } else {
//                echo "Une erreur s'est produite lors du téléchargement du fichier.";
//            }
//            $idFournisseur = GestionBoutique::getIdByFournisseurs($_POST['fournisseur'])[0]['idFournisseur'];
//            $idcategorie = GestionBoutique::getIdByCategorie($_POST['categorie'])[0]['idCategorie'];
//            echo $_POST['leProduit'];
//            $produitSelectionne = $_POST['leProduit'];
//            $idProduit = explode(' - ', $produitSelectionne)[0]; // Récupération de l'ID
//            $dateAujourdhui = date("Y-m-d");
//            GestionBoutique::modifierProduit($idProduit, $_POST['nom'], $_POST['description'], $nomFichier, $_POST['couleur'], $_POST['Quantité'], $idcategorie, $idFournisseur);
//            GestionBoutique::ajouterPrixProduit($idProduit, $dateAujourdhui, $_POST['prix']);
//            require Chemins::VUES . 'produits.php';
//            break;
//        }
//    }
//    case 'modifierProduit': {
//        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//            $uploadDir = 'public/image/'; // Spécifiez le chemin absolu de votre dossier de destination
//            $uploadFile = $uploadDir . basename($_FILES['avatar']['name']);
//            $nomFichier = $_FILES['avatar']['name'];
//            if (move_uploaded_file($_FILES['avatar']['tmp_name'], $uploadFile)) {
//                echo "Le fichier est valide et a été téléchargé avec succès.";
//            } else {
//                echo "Une erreur s'est produite lors du téléchargement du fichier.";
//            }
//            $idFournisseur = GestionBoutique::getIdByFournisseurs($_POST['fournisseur'])[0]['idFournisseur'];
//            $idcategorie = GestionBoutique::getIdByCategorie($_POST['categorie'])[0]['idCategorie'];
//            $produitSelectionne = $_POST['leProduit'];
//            $idProduit = explode(' - ', $produitSelectionne)[0]; // Récupération de l'ID
//            $dateAujourdhui = date("Y-m-d");
//            GestionBoutique::modifierProduit($idProduit, $_POST['nom'], $_POST['description'], $nomFichier, $_POST['couleur'], $_POST['Quantité'], $idcategorie, $idFournisseur);
//            GestionBoutique::ajouterPrixProduit($idProduit, $dateAujourdhui, $_POST['prix']);
//            require Chemins::VUES . 'produits.php';
//            break;
//        }
//    }
//    case 'modifierProduit': {
//        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//            $uploadDir = 'public/image/'; // Spécifiez le chemin absolu de votre dossier de destination
//            $uploadFile = $uploadDir . basename($_FILES['avatar']['name']);
//            $nomFichier = $_FILES['avatar']['name'];
//            if (move_uploaded_file($_FILES['avatar']['tmp_name'], $uploadFile)) {
//                echo "Le fichier est valide et a été téléchargé avec succès.";
//            } else {
//                echo "Une erreur s'est produite lors du téléchargement du fichier.";
//            }
//            $idFournisseur = GestionBoutique::getIdByFournisseurs($_POST['fournisseur'])[0]['idFournisseur'];
//            $idcategorie = GestionBoutique::getIdByCategorie($_POST['categorie'])[0]['idCategorie'];
//            $produitSelectionne = $_POST['leProduit'];
//            $idProduit = explode(' - ', $produitSelectionne)[0]; // Récupération de l'ID
//            $dateAujourdhui = date("Y-m-d");
//            GestionBoutique::modifierProduit($idProduit, $_POST['nom'], $_POST['description'], $nomFichier, $_POST['couleur'], $_POST['Quantité'], $idcategorie, $idFournisseur);
//            GestionBoutique::ajouterPrixProduit($idProduit, $dateAujourdhui, $_POST['prix']);
//            require Chemins::VUES . 'produits.php';
//            break;
//        }
//    }
//    case 'supprimerProduit': {
//        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//            $produitSelectionne = $_POST['leProduit'];
//            $idProduit = explode(' - ', $produitSelectionne)[0]; // Récupération de l'ID
//            GestionBoutique::SupprimerPrixProduit($idProduit);
//            GestionBoutique::SupprimerProduit($idProduit);
//            require_once Chemins::CONTROLEURS . 'controleur_produit.class.php';
//            $ContoleurProduits = new ContoleurProduits();
//            $ContoleurProduits->afficher();
//            break;
//        }
//    }
//    case 'afficherIndexAdmin': {
//        if (isset($_SESSION['login_admin'])){
//            require Chemins::CONTROLEURS . 'controleur_admin.class.php';
//            $ContoleurProduits = new ContoleurProduitsAdmin();
//            $ContoleurProduits->afficher();}
//        elseif (isset($_SESSION['login_user'])) {
//            require Chemins::CONTROLEURS . 'controleur_admin.class.php';
//            $ContoleurProduits = new ContoleurProduitsAdmin();
//            $ContoleurProduits->afficherVueUser();}
//        else
//            require Chemins::VUES . 'connexion.php';
//            break;
//        }
//    case 'afficherPageContact': {
//            require Chemins::VUES . 'contact.php';
//            break;
//        }
//    case 'afficherProduits': {
//            require_once Chemins::CONTROLEURS . 'controleur_produit.class.php';
//            $ContoleurProduits = new ContoleurProduits();
//            $ContoleurProduits->afficher();
//
//            break;
//        }
//    case  'afficherProduitsByCat':{
//        if (isset($_GET['categorie'])) {
//            require_once Chemins::CONTROLEURS . 'controleur_produit.class.php';
//            $ContoleurProduits = new ContoleurProduits();
//            $ContoleurProduits->afficher();
//        } else {
//            require Chemins::VUES_PERMANENTES . 'erreur404.inc.php';
//        }
//        break;
//
//    }
//    case 'afficherProduitsDeails': {
//        if (isset($_GET['idProduit'])) {
//            require_once Chemins::CONTROLEURS . 'controleur_produit_details.class.php';
//            $ContoleurProduitsDetails = new ContoleurProduitsDetails();
//            $ContoleurProduitsDetails->afficher();
//        } else {
//            require Chemins::VUES_PERMANENTES . 'erreur404.inc.php';
//        }
//        break;
//    }    
//    case 'afficherShop': {
//            if (file_exists(Chemins::VUES . $categorie . '.php')) {
//                require Chemins::VUES . $categorie . '.php';
//                break;
//            } else {
//                require Chemins::VUES_PERMANENTES . 'erreur404.inc.php';
//                break;
//            }
//        }
//    case 'afficherPage': {
//            if (file_exists(Chemins::VUES . $categorie . '.php')) {
//                require Chemins::VUES . $categorie . '.php';
//                break;
//            } else {
//                require Chemins::VUES_PERMANENTES . 'erreur404.inc.php';
//                break;
//            }
//        }
//
//    default : {
//            require Chemins::VUES_PERMANENTES . 'erreur404.inc.php';
//            break;
//        }
//}
//// </editor-fold>

// Permet de vérifier si l'utilisateur c'est déjà connecté et si il a souhaité la connexion automatique.
if (isset($_COOKIE["username"]) &&  isset($_COOKIE["id"])) {
    if(isset($_COOKIE["isAdmin"])) {
        $_SESSION["isAdmin"] = true;
    }
    $_SESSION["username"] = $_COOKIE["username"];
    $_SESSION["id"] = $_COOKIE["id"];
}

if (!isset($_REQUEST["controleur"])) {
    require_once Chemins::VUES . "v_accueil.php";
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


require Chemins::VUES_PERMANENTES . 'footer.inc.php';
require Chemins::VUES_PERMANENTES . 'footer-js.inc.php';
?>
</body>
<html>