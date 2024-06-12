<?php

/**
 * Contrôleur incluant principalement des méthodes/fonctions en rapport avec la communication.
 */
require_once "C:/wamp64/www/BelbachaBoutique/libs/email.class.php";
class ControleurContact {

    public function __construct()
    {
        
    }
    /**
     * Méthode permettant d'envoyer un e-mail à l'administrateur.
     *
     * @return void
     */
    public function sendMessageContact() {
        GestionEmail::envoie_mail($_POST["contact_nom"], $_POST["contact_mail"], $_POST["contact_objet"], $_POST["contact_message"]);
    }
}
