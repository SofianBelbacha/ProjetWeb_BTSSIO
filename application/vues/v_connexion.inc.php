
    <section class="banner-area-contact organic-breadcrumb">
        <div class="container-contact">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Connexion</h1>
                    <nav class="d-flex align-items-center">
                        <a href="../index.php">Accueil<span class="lnr lnr-arrow-right"></span></a>
                        <a href="<?php echo Chemins::VUES .'connexion.php'; ?>">Connexion</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>

<section class="login_box_area section_gap">
        <div class="container-connexion">
            <div class="row-justifys">
                <div class="placement3 placement">
                    <div class="login_box_img">
                        <img class="img-fluid" src="<?php echo Chemins::IMAGES .'pexels-sora-shimazaki-5926383.jpg'; ?>" alt="">
                        <div class="hover">
                            <h4>Nouveau sur notre site Web ?</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae</p>
                            <a class="primary-btn" href="<?php echo Chemins::VUES .'inscription.php'; ?>">Créer un compte</a>
                        </div>
                    </div>
                </div>
                <div class="placement3 placement">
                    <div class="login_form_inner">
                        <h3>Connectez vous pour enter</h3>
                        <form class="row-justifys login_form" action="index.php?controleur=Identification&action=verifierConnexion" method="post" id="contactForm" novalidate="novalidate">
                            <div class="placement5 placement form-group">
                                <input type="text" class="form-control" id="user" name="user" placeholder="Username" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'">
                            </div>
                            <div class="placement5 placement form-group">
                                <input type="password" class="form-control" id="pass" name="passe" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
                            </div>
                            <div class="placement5 placement form-group">
                                <div class="creat_account">
                                    <input type="checkbox" id="f-option2"  name="connexion_auto">
                                    <label for="f-option2">se souvenir de moi</label>
                                </div>
                            </div>
                            <div class="placement5 placement form-group">
                                <button type="submit" value="submit" class="primary-btn" name='valider' id='valider'>Se connecter</button>
                                <a href="#">Password oublié?</a>
                            </div>
                            <?php if (isset($_SESSION['erreur_message']) && !empty($_SESSION['erreur_message'])) {
                                echo '<div class="placement5 placement form-group">';
                                echo '<p class="error-message">' . $_SESSION['erreur_message'] . '</p>';
                                echo '</div>';
                                $_SESSION['erreur_message'] = '';
                            } ?>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>