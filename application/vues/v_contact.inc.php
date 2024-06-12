
    <section class="banner-area-contact organic-breadcrumb">
        <div class="container-contact">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Contactez-nous</h1>
                    <nav class="d-flex align-items-center">
                        <a href="../index.php">Accueil<span class="lnr lnr-arrow-right"></span></a>
                        <a href="<?php echo Chemins::VUES .'contact.php'; ?>">Contact</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>

<section class="contact_area section_gap_bottom">
        <div class="container-contact">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2905.3474399897323!2d3.2834153753299264!3d43.26509647744706!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12b11a930e31872d%3A0xe8fc33e08a0f4834!2sLyc%C3%A9e%20Marc%20Bloch!5e0!3m2!1sfr!2sfr!4v1698225773785!5m2!1sfr!2sfr" class="mapBox" width="1110" height="420" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <div class="row">
                <div class="placement2 placement">
                    <div class="contact_info">
                        <div class="info_item">
                            <i class="lnr lnr-home"></i>
                            <h6>Béziers, France</h6>
                            <p>rue Saint Vincent de Paul</p>
                        </div>
                        <div class="info_item">
                            <i class="lnr lnr-phone-handset"></i>
                            <h6><a href="#">33 7 58 97 96 16</a></h6>
                            <p>Mon to Fri 9am to 6 pm</p>
                        </div>
                        <div class="info_item">
                            <i class="lnr lnr-envelope"></i>
                            <h6><a href="#">sofianbelbacha@gmail.com</a></h6>
                            <p>Envoyez-nous votre requête à tout moment!</p>
                        </div>
                    </div>
                </div>
                <div class="placement4 placement">
                    <form class="row contact_form" action="index.php?controleur=Contact&action=sendMessageContact" method="post" id="contactForm"
                        novalidate="novalidate">
                        <div class="placement3 placement">
                            <div class="form-group">
                                <input type="text" class="form-control" id="name" name="contact_nom" placeholder="Entrez votre nom" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Entrez votre nom'" required>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" id="email" name="contact_mail" placeholder="Entrez votre adresse" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Entrez votre adresse'" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="subject" name="contact_objet" placeholder="Entrez lobjet" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Entrer lobjet du mail'" required>
                            </div>
                        </div>
                        <div class="placement3 placement">
                            <div class="form-group">
                                <textarea class="form-control" name="contact_message" id="message" rows="1" placeholder="Entez le Message" onfocus="this.placeholder = ''"  onblur="this.placeholder = 'Entrer votre message'" required></textarea>
                            </div>
                        </div>
                        <div class="placement5 placement text-right">
                            <button type="submit" value="submit" class="primary-btn">Envoyer Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>