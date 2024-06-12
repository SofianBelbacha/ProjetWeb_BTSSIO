<?php
require_once '../../application/modeles/gestion_boutique.class.php';
require_once "../../configs/mysql_config.class.php";

    $username = $_POST['username'];
    echo GestionBoutique::getLesPseudos($username);
?>
