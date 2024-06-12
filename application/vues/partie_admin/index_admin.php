<link href="<?php echo Chemins::STYLES . 'font-face.css'?>" rel="stylesheet" media="all">
<link href="<?php echo Chemins::JS . 'vendor/font-awesome-4.7/css/font-awesome.min.css'?>" rel="stylesheet" media="all">
<link href="<?php echo Chemins::JS . 'vendor/font-awesome-5/css/fontawesome-all.min.css'?>" rel="stylesheet" media="all">
<link href="<?php echo Chemins::JS . 'vendor/mdi-font/css/material-design-iconic-font.min.css'?>" rel="stylesheet" media="all">
    
<section class="banner-area-contact organic-breadcrumb">
        <div class="container-contact">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Administration</h1>
                    <nav class="d-flex align-items-center">
                        <a href="../index.php">Accueil<span class="lnr lnr-arrow-right"></span></a>
                        <a href="<?php echo Chemins::VUES .'connexion.php'; ?>">Espace Admin</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>

<!-- Main CSS-->
<link href="public/style/theme.css" rel="stylesheet" media="all">
<div class="col-lg-9">
    <h2 class="title-1 m-b-25">Nos Produits</h2>
    <div class="table-responsive table--no-card m-b-40">
        <table class="table table-borderless table-striped table-earning">
            <thead>
                <tr>
                    <th>nom</th>
                    <th>description</th>
                    <th>categorie</th>
                    <th class="text-right">fournisseur</th>
                    <th class="text-right">quantité</th>
                    <th class="text-right">prix</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach (VariablesGlobales::$lesProduitsAdmin as $produit) { ?>
                <tr>
                    <td><?php echo $produit['nom']; ?></td>
                    <td><?php echo $produit['description']; ?></td>
                    <td><?php echo $produit['libelle_categorie']; ?></td>
                    <td class="text-right"><?php echo $produit['nomFournisseur']; ?></td>
                    <td class="text-right"><?php echo $produit['Stock']; ?></td>
                    <td class="text-right">€<?php echo $produit['prix']; ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

    <section class="login_box_area section_gap">
        <div class="container-connexion">
            <div class="row-justifysdf">
                <div class="placement">
                    <div class="registration_form_inner">
                        <span class="h1_registration" style="text-decoration: underline;">
                            <h1>Ajout d'un Produit</h1>                        
                        </span>
                        <form class="row-justifys register_form" action="index.php?cas=ajoutProduit" method="post" id="contactForm" novalidate="novalidate" enctype="multipart/form-data">
                            <h3>Externe</h3>
                            <div class="placement5 placement form-group flex-input">
                                <div style="display: flex; flex-direction: column; margin-right: 33px; margin-bottom: 25px;" class="placement7">
                                    <select name="categorie" id="categorie" style='height: 50px; padding-left: 8px;'>
                                      <option value="">--Choissisez une catégorie--</option>
                                      <?php foreach (VariablesGlobales::$lesCategories as $uneCategorie) { ?>
                                      <option value="<?php echo $uneCategorie['categorie']; ?>"><?php echo $uneCategorie['categorie']; ?></option>
                                      <?php } ?>
                                    </select>
                                </div>
                                <div style="display: flex; flex-direction: column; margin-right: 33px; margin-bottom: 25px;" class="placement7">
                                    <select name="fournisseur" id="fournisseur" style='height: 50px; padding-left: 8px;'>
                                      <option value="">--Choissisez un fournisseur--</option>
                                      <?php foreach (VariablesGlobales::$lesFournisseurs as $unFournisseur) { ?>
                                      <option value="<?php echo $unFournisseur['nomFourni'] ?>"><?php echo  $unFournisseur['nomFourni'] ?></option>
                                      <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <h3>Information Produit</h3>
                            <div class="placement5 placement form-group flex-input info-connect">
                                <div style="display: flex; flex-direction: column; margin-right: 33px; margin-bottom: 25px;" class="placement7 ">
                                    <input type="text" class="form-control" id="nom" name="nom" placeholder="nom" onfocus="this.placeholder = ''" onblur="this.placeholder = 'nom'"><span class="re"></span>
                                </div>
                                <div style="display: flex; flex-direction: column; margin-right: 33px; margin-bottom: 25px;" class="placement7 ">
                                    <input type="text" class="form-control" id="Quantité" name="Quantité" placeholder="Quantité" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Quantité'"><span class="re"></span>
                                </div>
                            </div>
                            <div class="placement5 placement form-group info-connect">
                                <textarea  class="form-control Password-input"  style="box-shadow:  0px 2px 5px 0px rgba(0, 0, 0, 0.1); height: 160px;" id="description" name="description" placeholder="description" onfocus="this.placeholder = ''" onblur="this.placeholder = 'description'"> </textarea><span class="re"></span>
                            </div>
                            <div class="placement5 placement form-group flex-input">
                                <div style="display: flex; flex-direction: column; margin-right: 33px; margin-bottom: 25px;" class="placement7">
                                <input type="file" id="avatar" name="avatar" accept="image/png, image/jpeg" />
                                </div>
                                <div style="display: flex; flex-direction: column; margin-right: 33px; margin-bottom: 25px;" class="placement7">
                                    <input type="text" class="form-control" id="couleur" name="couleur" placeholder="couleur" onfocus="this.placeholder = ''" onblur="this.placeholder = 'couleur'"><span></span>
                                </div>
                            </div>
                            <div class="placement5 placement form-group flex-input">
                                <div style="display: flex; flex-direction: column; margin-right: 33px; margin-bottom: 25px; " class="placement7">
                                    <input type="text" class="form-control" style="margin-left: 50%;" id="prix" name="prix" placeholder="prix" onfocus="this.placeholder = ''" onblur="this.placeholder = 'prix'"><span></span>
                                </div>
                            </div>

                            <div class="placement5 placement form-group inscription_area">
                                <button type="submit" id="valider" value="submit" class="primary-btn">Ajouter</button>
                            </div>
                            <span id='erreurConditions'> </span><br />
                        </form>
                    </div>
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
                            <h1>Modifier un Produit</h1>                        
                        </span>
                        <form class="row-justifys register_form" action="index.php?cas=modifierProduit" method="post" id="contactForm" novalidate="novalidate" enctype="multipart/form-data">
                            <div class="placement5 placement form-group flex-input info-connect">
                                <div style="display: flex; flex-direction: column; margin-right: 33px; margin-left: 25%; margin-bottom: 25px; " class="placement7 ">
                                    <select name="leProduit" id="leProduit" style='height: 50px; padding-left: 8px; align-items: center;'>
                                      <option value="">--Choissisez un produit--</option>
                                      <?php foreach (VariablesGlobales::$lesProduitsAdmin as $leProduit) { ?>
                                      <option value="<?php echo $leProduit['idProduit'] . ' - ' . $leProduit['nom']; ?>"><?php echo $leProduit['idProduit'] . ' - ' . $leProduit['nom']; ?></option>
                                      <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <h3>Externe</h3>
                            <div class="placement5 placement form-group flex-input">
                                <div style="display: flex; flex-direction: column; margin-right: 33px; margin-bottom: 25px; " class="placement7">
                                    <select name="categorie" id="categorie" style='height: 50px; padding-left: 8px;'>
                                      <option value="">--Choissisez une catégorie--</option>
                                      <?php foreach (VariablesGlobales::$lesCategories as $uneCategorie) { ?>
                                      <option value="<?php echo $uneCategorie['categorie']; ?>"><?php echo $uneCategorie['categorie']; ?></option>
                                      <?php } ?>
                                    </select>
                                </div>
                                <div style="display: flex; flex-direction: column; margin-right: 33px; margin-bottom: 25px;" class="placement7">
                                    <select name="fournisseur" id="fournisseur" style='height: 50px; padding-left: 8px;'>
                                      <option value="">--Choissisez un fournisseur--</option>
                                      <?php foreach (VariablesGlobales::$lesFournisseurs as $unFournisseur) { ?>
                                      <option value="<?php echo $unFournisseur['nomFourni'] ?>"><?php echo  $unFournisseur['nomFourni'] ?></option>
                                      <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <h3>Information Produit</h3>
                            <div class="placement5 placement form-group flex-input info-connect">
                                <div style="display: flex; flex-direction: column; margin-right: 33px; margin-bottom: 25px;" class="placement7 ">
                                    <input type="text" class="form-control" id="nom" name="nom" placeholder="nom" onfocus="this.placeholder = ''" onblur="this.placeholder = 'nom'"><span class="re"></span>
                                </div>
                                <div style="display: flex; flex-direction: column; margin-right: 33px; margin-bottom: 25px;" class="placement7 ">
                                    <input type="text" class="form-control" id="Quantité" name="Quantité" placeholder="Quantité" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Quantité'"><span class="re"></span>
                                </div>
                            </div>
                            <div class="placement5 placement form-group info-connect">
                                <textarea  class="form-control Password-input"  style="box-shadow:  0px 2px 5px 0px rgba(0, 0, 0, 0.1); height: 160px;" id="description" name="description" placeholder="description" onfocus="this.placeholder = ''" onblur="this.placeholder = 'description'"> </textarea><span class="re"></span>
                            </div>
                            <div class="placement5 placement form-group flex-input">
                                <div style="display: flex; flex-direction: column; margin-right: 33px; margin-bottom: 25px;" class="placement7">
                                <input type="file" id="avatar" name="avatar" accept="image/png, image/jpeg" />
                                </div>
                                <div style="display: flex; flex-direction: column; margin-right: 33px; margin-bottom: 25px;" class="placement7">
                                    <input type="text" class="form-control" id="couleur" name="couleur" placeholder="couleur" onfocus="this.placeholder = ''" onblur="this.placeholder = 'couleur'"><span></span>
                                </div>
                            </div>
                            <div class="placement5 placement form-group flex-input">
                                <div style="display: flex; flex-direction: column; margin-right: 33px; margin-bottom: 25px; " class="placement7">
                                    <input type="text" class="form-control" style="margin-left: 50%;" id="prix" name="prix" placeholder="prix" onfocus="this.placeholder = ''" onblur="this.placeholder = 'prix'"><span></span>
                                </div>
                            </div>

                            <div class="placement5 placement form-group inscription_area">
                                <button type="submit" id="valider" value="submit" class="primary-btn">Modifier</button>
                            </div>
                            <span id='erreurConditions'> </span><br />
                        </form>
                    </div>
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
                            <h1>Supprimer un Produit</h1>                        
                        </span>
                        <form class="row-justifys register_form" action="index.php?cas=supprimerProduit" method="post" id="contactForm" novalidate="novalidate" enctype="multipart/form-data">
                            <div class="placement5 placement form-group flex-input info-connect">
                                <div style="display: flex; flex-direction: column; margin-right: 33px; margin-left: 25%; margin-bottom: 25px; " class="placement7 ">
                                    <select name="leProduit" id="leProduit" style='height: 50px; padding-left: 8px; align-items: center;'>
                                      <option value="">--choisissez un produit--</option>
                                      <?php foreach (VariablesGlobales::$lesProduitsAdmin as $leProduit) { ?>
                                      <option value="<?php echo $leProduit['idProduit'] . ' - ' . $leProduit['nom']; ?>"><?php echo $leProduit['idProduit'] . ' - ' . $leProduit['nom']; ?></option>
                                      <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="placement5 placement form-group inscription_area">
                                <button type="submit" id="valider" value="submit" class="primary-btn">Supprimer</button>
                            </div>
                            <span id='erreurConditions'> </span><br />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>        


    <!-- Jquery JS-->
    <script src="<?php echo Chemins::JS . 'vendor/jquery-3.2.1.min.js';?>"></script>
    <!-- Bootstrap JS-->
    <script src="<?php echo Chemins::JS . 'vendor/bootstrap-4.1/popper.min.js'?>"></script>
    <script src="<?php echo Chemins::JS . 'vendor/bootstrap-4.1/bootstrap.min.js'?>"></script>
    <!-- Vendor JS       -->
    <script src="<?php echo Chemins::JS . 'vendor/slick/slick.min.js'?>">
    </script>
    <script src="<?php echo Chemins::JS . 'vendor/wow/wow.min.js'?>"></script>
    <script src="<?php echo Chemins::JS . 'vendor/animsition/animsition.min.js'?>"></script>
    <script src="<?php echo Chemins::JS . 'vendor/bootstrap-progressbar/bootstrap-progressbar.min.js'?>">
    </script>
    <script src="<?php echo Chemins::JS . 'vendor/counter-up/jquery.waypoints.min.js'?>"></script>
    <script src="<?php echo Chemins::JS . 'vendor/counter-up/jquery.counterup.min.js'?>">
    </script>
    <script src="<?php echo Chemins::JS . 'vendor/circle-progress/circle-progress.min.js'?>"></script>
    <script src="<?php echo Chemins::JS . 'vendor/perfect-scrollbar/perfect-scrollbar.js'?>"></script>
    <script src="<?php echo Chemins::JS . 'vendor/chartjs/Chart.bundle.min.js'?>"></script>
    <script src="<?php echo Chemins::JS . 'vendor/select2/select2.min.js'?>">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>
