<?php

/**
 * Contrôleur incluant principalement des méthodes/fonctions en rapport avec l'identification.
 */
class ControleurIdentification {

    public function __construct()
    {
    }

    /**
     * Méthode permettant de vérifier la connexion.
     * 
     */
    public function verifierConnexion() {
        if (GestionBoutique::estConnecte($_POST['username'], $_POST['mdp']))
        {
            $_SESSION["username"] = GestionBoutique::getUser($_POST["username"], $_POST["mdp"])->login;
            $_SESSION["id"] = GestionBoutique::getUser($_POST["username"], $_POST["mdp"])->idUtilisateur;
            // Vérification si l'utilisateur souhaite la connexion automatique.
            if(isset($_POST["connexion_auto"])) {
                setcookie("username", $_SESSION["username"], time() + 7*24*3600, "/");
                setcookie("id", $_SESSION["id"], time() + 7*24*3600, "/");
            }
            // Vérification que l'utilisateur est administrateur.
            if (GestionBoutique::isAdminOK($_POST["username"], $_POST["mdp"])) {
                $_SESSION["isAdmin"] = true;
                if(isset($_POST["connexion_auto"])) {
                    setcookie("isAdmin", true, time() + 7*24*3600, "/");
                }
            }
            header("Location: index.php");
        }
        else{
            $_SESSION['erreur_message'] = 'Identifiant ou mot de passe incorrect';
            require Chemins::VUES . 'v_connexion.inc.php';
        }
    }
    /**
     * Méthode permettant la déconnexion.
     * 
     */
    public function seDeconnecter() {
        // Suppression des variables de session et de la session.
        $_SESSION = array();
        session_destroy();+
        // Suppression des cookies de connexion automatique.
        setcookie("username", "", time() - 3600, "/");
        setcookie("id", "", time() - 3600, "/");
        setcookie("isAdmin", "", time() - 3600, "/");
        // Redirection vers la page d'accueil.
        header("Location: index.php");
    }
    
    public function incriptionUtilisateur() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            GestionBoutique::ajouterUtilisateur($_POST['username'], $_POST['Mail'], $_POST['mdp']);
            GestionBoutique::ajouterClient($_POST['name'], $_POST['prenom'], $_POST['Rue'], $_POST['codePostal'], $_POST['ville'], $_POST['telephone']);
            $this->verifierConnexion();
        }

    }
    
}