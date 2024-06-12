<?php
require_once 'configs/chemins.class.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <link rel="stylesheet" href="<?php echo Chemins::STYLES .'style.css'; ?>">
    <link rel="stylesheet" href="<?php echo Chemins::STYLES .'responsive.style.css'; ?>">
    <link rel="stylesheet" href="<?php echo Chemins::STYLES .'panier.css'; ?>">
    <link rel="stylesheet" href="<?php echo Chemins::LIBS .'font-awesome-4.7.0/css/font-awesome.min.css'; ?>">
    <link rel="stylesheet" href="<?php echo Chemins::LIBS .'themify-icons/themify-icons.css'; ?>">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <?php $_SESSION['load_bootstrap'] = false; ?>
    <title>Site web AP</title>
</head>
<body>
    <div id="undefined-sticky-wrapper" class="sticky-wrapper" style="height: 60px;">
        <header class="header_area sticky-header">
            <div class="main_menu exclude-bootstrap-navbar ">
                <nav id="main_box" class="navbar navbar-expand-lg navbar-light main_box exclude-bootstrap-body">
                    <div class="container" id="containenav" style="height: 80px;">
                        <div class="container-secure">
                            <h1>.Logo</h1>
                            <button class="navbar-toggler collapsed" id="toggleButton" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>    
                        </div>
                        <div class="navbar-collapse offset collapse" id="navbarSupportedContent" >
                            <nav class="header-nav">
                                <ul class="navbar-nav">
                                    <li class="nav-item submenu dropdown"><a href="index.php" class="a-contact-orange">Accueil</a></li>
                                    <li class="nav-item submenu dropdown"><a href="#" class="a-contact-orange">Shop</a>
                                        <ul class="dropdown-menu" style="display: none;">
                                            <li class="nav-item"><a class="nav-link" href=index.php?controleur=Produits&action=afficher>Nos produits</a></li>
                                            <li class="nav-item"><a class="nav-link" href=index.php?controleur=AfficherPages&action=afficherProduitsDeails>Details</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item submenu dropdown"><a href="#" class="a-contact-orange">Page</a>
                                        <ul class="dropdown-menu" style="display: none;">
                                            <li class="nav-item"><a class="nav-link" href=index.php?controleur=AfficherPages&action=afficherPageConnexion>Connexion</a></li>
                                            <li class="nav-item"><a class="nav-link" href=index.php?controleur=AfficherPages&action=afficherPageInscription>Inscription</a></li>
                                            <li class="nav-item"><a class="nav-link" href=index.php?controleur=AfficherPages&action=afficherPageChatbox>ChatBot</a></li>
                                            <li class="nav-item"><a class="nav-link" href=index.php?controleur=AfficherPages&action=afficherPageReglementation>Reglementation</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item submenu dropdown"><a href="#" class="a-contact-orange">porfolio</a>
                                    </li>
                                <?php
                                $sessionValue = $_SESSION['login_admin'] ?? $_SESSION['login_user'] ?? null;
                                $cookieValue = $_COOKIE['login_admin'] ?? $_COOKIE['login_user'] ?? null;
                                $style = ($sessionValue !== null || $cookieValue !== null) ? 'style="margin-right: 35px;"' : '';
                                ?>

                                    <li class="nav-item submenu dropdown" <?php echo $style; ?> ><a href=index.php?controleur=AfficherPages&action=afficherPageContact class="a-contact-orange">Contact</a></li>
                                    <?php if(isset($_SESSION['username'])) : ?>
                                    <li class="nav-item submenu dropdown">
                                        <a href="#" class="user">
                                            <span class="lnr lnr-user account" style="font-size: initial;">
                                                <?php echo $_SESSION["username"]; ?>
                                            </span>
                                        </a>
                                        <ul class="dropdown-menu" style="display: none;">
                                            <li class="nav-item"><a class="nav-link" href=index.php?controleur=Identification&action=seDeconnecter>se Deconnecter</a></li>
                                            <li class="nav-item"><a class="nav-link" href=index.php?controleur=AfficherPages&action=afficherPageProfile>Profil</a></li>
                                            <?php if(isset($_SESSION['isAdmin'])) : ?>
                                            <li class="nav-item"><a class="nav-link" href=indexAdmin.php?controleur=Admin&action=afficherPageAccueilAdmin>Administration</a></li>
                                            <?php endif; ?>                                
                                        </ul>
                                    </li>
                                <?php endif; ?>                                
                                </ul>
                            </nav>
                            <ul class="nav navbar-nav navbar-right">
                                <li class="nav-item"><a href="index.php?controleur=AfficherPages&action=afficherPagePanier" class="cart"><span class="ti-bag"></span></a></li>
                                <li class="nav-item">
                                    <button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="search_input" id="search_input_box" style="display: none; max-height: 48px;">
                <div class="container-search">
                    <form class="d-flex justify-content-between">
                        <input type="text" class="form-control" id="search_input" placeholder="Search Here">
                        <button type="submit" class="btn"></button>
                        <span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
                    </form>
                </div>
            </div>
        </header>
    </div>

