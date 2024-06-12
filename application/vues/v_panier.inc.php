<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<link rel="stylesheet" href="<?php echo Chemins::STYLES .'exclude_CSS.css'; ?>">
<section class="banner-area-contact organic-breadcrumb">
        <div class="container-contact">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Panier</h1>
                    <nav class="d-flex align-items-center">
                        <a href="../index.php">Accueil<span class="lnr lnr-arrow-right"></span></a>
                        <a href="<?php echo Chemins::VUES . 'inscription.php'; ?>">inscription</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <div class="bootstrap-content">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12">
                    <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                        <div class="card-body p-0">
                            <div class="row g-0">
                                <div class="col-lg-8">
                                    <div class="p-5">
                                        <div class="d-flex justify-content-between align-items-center mb-5">
                                            <h1 class="fw-bold mb-0 text-black">Votre Panier</h1>
                                            <h6 class="mb-0 text-muted"><?php echo Panier::getNbProduits(); ?> articles</h6>
                                        </div>
                                        <hr class="my-4">
                                        <?php $nombre = 0; ?>
                                        <?php foreach (VariablesGlobales::$lesProduits as $idProduit => $produits): ?>
                                            <?php foreach ($produits as $unProduit): 
                                                $nombre += $unProduit['prix'] * Panier::getQteByProduit($unProduit['idProduit']); ?>     
                                        <div class="row mb-4 d-flex justify-content-between align-items-center">
                                            <div class="col-md-2 col-lg-2 col-xl-2">
                                                <img
                                                    src="<?php echo Chemins::IMAGES . $unProduit['image'];?>"
                                                    class="img-fluid rounded-3" alt="Cotton T-shirt">
                                            </div>
                                            <div class="col-md-3 col-lg-3 col-xl-3">
                                                <h6 class="text-muted">Shirt</h6>
                                                <h6 class="text-black mb-0"><?php echo $unProduit['nom'];?></h6>
                                            </div>
                                            <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                                <a href="index.php?controleur=Panier&action=modifierQteProduit&idProduit=<?php echo $unProduit['idProduit']; ?>&quantite=<?php echo Panier::getQteByProduit($unProduit['idProduit']) - 1; ?>">
                                                    <button class="btn btn-link px-2">
                                                        <i class="fas fa-minus"></i>
                                                    </button>
                                                </a>
                                                <input id="form1" min="0" name="quantity" value="<?php echo Panier::getQteByProduit($unProduit['idProduit']); ?>" type="number"
                                                       class="form-control form-control-sm" style="width: 65px;" />

                                                <a href="index.php?controleur=Panier&action=modifierQteProduit&idProduit=<?php echo $unProduit['idProduit']; ?>&quantite=<?php echo Panier::getQteByProduit($unProduit['idProduit']) + 1; ?>">
                                                    <button class="btn btn-link px-2">
                                                        <i class="fas fa-plus"></i>
                                                    </button>
                                                </a>                                            
                                            </div>
                                            <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                                <h6 class="mb-0">€ <?php echo $unProduit['prix'] * Panier::getQteByProduit($unProduit['idProduit']);?></h6>
                                            </div>
                                            <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                                <a href="index.php?controleur=Panier&action=deleteProduit&idProduit=<?php echo $unProduit['idProduit']; ?>" class="text-muted"><i class="fas fa-times"></i></a>
                                            </div>
                                        </div>

                                        <hr class="my-4">
                                        <?php endforeach; ?>
                                    <?php endforeach; ?>                                        
                                        <div class="pt-5">
                                            <h6 class="mb-0"><a href="index.php?controleur=AfficherPages&action=afficherPageProduits" class="text-body"><i
                                                        class="fas fa-long-arrow-alt-left me-2"></i>Retourner au magasin</a></h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 bg-grey">
                                    <div class="p-5">
                                        <h3 class="fw-bold mb-5 mt-2 pt-1">Résumé</h3>
                                        <hr class="my-4">

                                        <div class="d-flex justify-content-between mb-4">
                                            <h5 class="text-uppercase"><?php echo Panier::getNbProduits(); ?> articles</h5>
                                            <h5>€ <?php echo $nombre ?></h5>
                                        </div>

                                        <h5 class="text-uppercase mb-3">expédition</h5>

                                        <div class="mb-4 pb-2">
                                            <select class="select">
                                                <option value="1">Standard-Delivery- €5.00</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                                <option value="4">Four</option>
                                            </select>
                                        </div>

                                        <h5 class="text-uppercase mb-3">Give code</h5>

                                        <div class="mb-5">
                                            <div class="form-outline">
                                                <input type="text" id="form3Examplea2" class="form-control form-control-lg" style="width: 65px;" />
                                                <label class="form-label" for="form3Examplea2">Enter your code</label>
                                            </div>
                                        </div>

                                        <hr class="my-4">

                                        <div class="d-flex justify-content-between mb-5">
                                            <h5 class="text-uppercase">Prix total</h5>
                                            <h5><?php echo $nombre ?> € </h5>
                                        </div>

                                        <button type="button" class="btn btn-dark btn-block btn-lg"
                                                data-mdb-ripple-color="dark">Enregistrer</button>
                                        <a href="index.php?controleur=Panier&action=viderPanier">
                                        <button type="button" class="btn btn-dark btn-block btn-lg"
                                                data-mdb-ripple-color="dark">Vider le panier</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--"this.parentNode.querySelector('input[type=number]').stepUp()"-->
<!--onclick="this.parentNode.querySelector('input[type=number]').stepDown()-->