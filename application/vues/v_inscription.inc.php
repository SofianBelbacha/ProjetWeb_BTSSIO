
    <section class="banner-area-contact organic-breadcrumb">
        <div class="container-contact">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Inscription</h1>
                    <nav class="d-flex align-items-center">
                        <a href="../index.php">Accueil<span class="lnr lnr-arrow-right"></span></a>
                        <a href="<?php echo Chemins::VUES .'inscription.php'; ?>">inscription</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="login_box_area section_gap">
        <div class="container-connexion">
            <div class="row-justifysdf">
                <div class="placement">
                    <div class="registration_form_inner">
                        <span class="h1_registration" style="text-decoration: underline;">
                            <h1>Inscription</h1>                        
                        </span>
                        <form class="row-justifys register_form" action="index.php?controleur=Identification&action=incriptionUtilisateur" method="post" id="contactForm" novalidate="novalidate">
                            <h3>Civilité</h3>
                            <div class="placement5 placement form-group flex-input">
                                <div style="display: flex; flex-direction: column; margin-right: 33px; margin-bottom: 25px;" class="placement7">
                                    <input type="text" class="form-control" id="nom" name="name" placeholder="Nom" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nom'"><span></span>
                                </div>
                                <div style="display: flex; flex-direction: column; margin-right: 33px; margin-bottom: 25px;" class="placement7">
                                    <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prenom" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Prenom'"><span></span>
                                </div>
                            </div>
                            <div class="placement5 placement form-group flex-input">
                                <div style="display: flex; flex-direction: column; margin-right: 33px; margin-bottom: 25px;" class="placement8">
                                    <input type="text" class="form-control" id="codePostal" name="codePostal" placeholder="codePostal" onfocus="this.placeholder = ''" onblur="this.placeholder = 'CodePostal'"><span></span>
                                </div>

                                <div style="display: flex; flex-direction: column; margin-right: 33px; margin-bottom: 25px;" class="placement4">
                                    <input type="text" class="form-control" id="Rue" name="Rue" placeholder="Rue" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Rue'"><span></span>
                                </div>
                            </div>
                            <div class="placement5 placement form-group flex-input">
                                <div style="display: flex; flex-direction: column; margin-right: 33px; margin-bottom: 25px;" class="placement7">
                                    <input type="text" class="form-control" id="ville" name="ville" placeholder="Ville" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Ville'"><span></span>
                                </div>
                                <div style="display: flex; flex-direction: column; margin-right: 33px; margin-bottom: 25px;" class="placement7">
                                    <input type="text" class="form-control" id="telephone" name="telephone" placeholder="Telephone" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Telephone'"><span></span>
                                </div>
                            </div>

                            <h3>Information de connexion</h3>
                            <div class="placement5 placement form-group flex-input info-connect">
                                <div style="display: flex; flex-direction: column; margin-right: 33px; margin-bottom: 25px;" class="placement7 ">
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'"><span class="re"></span>
                                </div>
                                <div style="display: flex; flex-direction: column; margin-right: 33px; margin-bottom: 25px;" class="placement7 ">
                                    <input type="text" class="form-control" id="Mail" name="Mail" placeholder="Mail" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Mail'"><span class="re"></span>
                                </div>
                            </div>
                            <div class="placement5 placement form-group info-connect">
                                <input type="text" class="form-control Password-input" id="mdp" name="mdp" placeholder="Mot de passe" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Mot de passe'"><span class="re"></span>
                                <input type="password" class="form-control Password-input" id="mdp2" name="mdp2" placeholder="Confirmation du mot de passe" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Confirmation du mot de passe'"><span class="re"></span>
                            </div>
                            <div class="placement5 placement form-group">
                                <div class="creat_account">
                                    <input name='conditions' id='f-option2' type='checkbox'/><label for="conditions" class="enligne"> J'accepte les <a href='/' style="display: inline-block; color: blue; text-decoration: underline;">conditions générales</a></label>
                                </div>
                            </div>
                            <div class="placement5 placement form-group inscription_area">
                                <button type="submit" id="valider" value="submit" class="primary-btn">Log In</button>
                            </div>
                            <span id='erreurConditions'> </span><br />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>        
    <script src="../../public/js/jquery-3.7.1.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            var formValide;
            $("#valider").click(function(){
                formValide = true;
                $("#contactForm input[type=text], #contactForm input[type=password], #valider input[type=password] ").each(function() {
                    controleSaisie($(this).prop('id'));
                });
                if (!$("#f-option2").prop('checked')){
                    $("#erreurConditions").addClass("message-erreur").text("Acceptation obligatoire !").fadeIn();
                    formValide = false;
                }
                else $("#erreurConditions").fadeOut();
                    return formValide;
                $("#valider input[type=text], #contactForm input[type=password], #valider input[type=password]").keypress(function() {
                    $(this).next().fadeOut();
                });
                $("#f-option2").click(function() {
                    if ($(this).prop('checked')) $("#erreurConditions").fadeOut();
                    else $("#erreurConditions").addClass("message-erreur").text("Acceptation obligatoire !").fadeIn();
                });
                $("#valider input[type=text], #valider input[type=password] ").blur(function() {
                    controleSaisie($(this).prop('id'));
                });
            });
            function controleSaisie(idchamp) {
                if ($("#"+idchamp).val()=="") {
                $("#"+idchamp).next().removeClass("message-ok").addClass("message-erreur").text("Le champ est vide !").fadeIn();
                    formValide = false;
                }
                else {
                    var regex, messageErreur;
                    switch (idchamp) { 
                        case 'username' : pseudoExistant = false; cherchePseudoBD(); if (pseudoExistant) return; regex = /^[a-z]+$/i;messageErreur="Pseudo non valide !";break;
                        case 'Mail' : regex = /^\S+@\S+$/;messageErreur="mail non valide !";break;
                        case 'nom' : regex = /^[a-z]+$/i;messageErreur="nom non valide !";break;
                        case 'prenom' : regex = /^[a-z]+$/i;messageErreur="Prenom non valide !";break;
                        case 'Rue' : regex = /^[a-z]+$/i;messageErreur="Rue non valide !";break;
                        case 'codePostal' : regex = /^\d{5}$/;messageErreur="CP non valide !";break;
                        case 'telephone' : regex = /^\d{10}$/;messageErreur="telephone non valide !";break;
                        case 'mdp' : regex = /^[0-9a-zA-Z]{6,20}$/;messageErreur="password non valide !";break;
                        case 'mdp2' : regex = /^[0-9a-zA-Z]{6,20}$/;messageErreur="password non valide !";break;
                        default : regex="";
                    }
                    traiterRegex(idchamp, regex, messageErreur);
                    if (idchamp === "mdp2") {
                        if ($("#mdp").val() !== $("#mdp2").val()) {
                            $("#mdp2").next().removeClass("message-ok").addClass("message-erreur").text("Les mots de passe ne correspondent pas !").fadeIn();
                            formValide = false;
                        }
                    }
                }


            }
            function traiterRegex(idchamp, regex, messageErreur) {
                if (!$("#"+idchamp).val().match(regex)) {
                    $("#"+idchamp).next().removeClass("message-ok").addClass("message-erreur").text(messageErreur).show();
                    formValide = false;
                }
                else $("#"+idchamp).next().removeClass("message-erreur").addClass("message-ok").text("OK").show().fadeOut();
            }
            function cherchePseudoBD(){
                $.ajax({
                    async:false,
                    type: "POST",
                    url: "libs/ajax/chercherPseudo.php",
                    data: "username="+$("#username").val(),
                    success: function(reponse){
                        if (reponse==1) {
                            $("#username").next().removeClass("message-ok").addClass("message-erreur").text("Et non ! Le pseudo existe déjà").show();formValide = false;pseudoExistant=true;
                        }
                    }
                });
            }       
        });
    </script>
</body>
</html>