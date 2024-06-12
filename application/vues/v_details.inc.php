    <section class="banner-area-contact organic-breadcrumb">
        <div class="container-contact">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Details produits</h1>
                    <nav class="d-flex align-items-center">
                        <a href="../index.php">Accueil<span class="lnr lnr-arrow-right"></span></a>
                        <a href="<?php echo Chemins::VUES .'details.php'; ?>">Détails</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <div class="product_image_area">
        <div class="containers">
            <div class="row-justifys s_product_inner">
                <div class="placement3 placement" style="align-self: baseline;">
                    <div class="s_Product_carousel owl-carousel owl-theme owl-loaded">
                        <div class="owl-stage-outer">
                            <div class="owl-stage" style="transform: translate3d(-2160px, 0px, 0px); transition: all 0.25s ease 0s; width: 3780px;">
                                <?php foreach (VariablesGlobales::$lesDetailsProduits as $produit) { ?>
                                <div class="owl-item cloned" style="width: 540px; margin-right: 0px;">
                                    <div class="single-prd-item">
                                        <img class="img-fluid" src="<?php echo Chemins::IMAGES . $produit['image']; ?>" alt="">
                                    </div>
                                </div>
                                <div class="owl-item cloned" style="width: 540px; margin-right: 0px;">
                                    <div class="single-prd-item">
                                        <img class="img-fluid" src="<?php echo Chemins::IMAGES . $produit['image']; ?>" alt="">
                                    </div>
                                </div>
                                <div class="owl-item" style="width: 540px; margin-right: 0px;">
                                    <div class="single-prd-item">
                                        <img class="img-fluid" src="<?php echo Chemins::IMAGES . $produit['image']; ?>" alt="">
                                    </div>
                                </div>
                                <div class="owl-item" style="width: 540px; margin-right: 0px;">
                                    <div class="single-prd-item">
                                        <img class="img-fluid" src="<?php echo Chemins::IMAGES . $produit['image']; ?>" alt="">
                                    </div>
                                </div>
                                <div class="owl-item active" style="width: 540px; margin-right: 0px;">
                                    <div class="single-prd-item">
                                        <img class="img-fluid" src="<?php echo Chemins::IMAGES . $produit['image']; ?>" alt="">
                                    </div>
                                </div>
                                <div class="owl-item cloned" style="width: 540px; margin-right: 0px;">
                                    <div class="single-prd-item">
                                        <img class="img-fluid" src="<?php echo Chemins::IMAGES .'carteAsus.jpg'; ?>" alt="">
                                    </div>
                                </div>
                                <div class="owl-item cloned" style="width: 540px; margin-right: 0px;">
                                    <div class="single-prd-item">
                                        <img class="img-fluid" src="<?php echo Chemins::IMAGES .'carteAsus.jpg'; ?>" alt="">
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class=" owl-controls">
                            <div class="owl-nav" style="display: none;">
                                <div class="owl-prev" style="display: none;">prev</div>
                                <div class="owl-next" style="display: none;">next</div>
                            </div>
                            <div  class="owl-dots">
                                <div class="owl-dot active"><span></span></div>
                                <div class="owl-dot"><span></span></div>
                                <div class="owl-dot "><span></span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="placement6 placement offset-lg-1">
                    <div class="s_product_text">
                        <?php foreach (VariablesGlobales::$lesDetailsProduits as $produit) { ?>
                        <h3><?Php echo $produit['nom']; ?></h3>
                        <h2>€<?Php echo $produit['prix']; ?></h2>
                        <ul class="list">
                            <li><a class="active" href="#"><span>Categorie</span><?php echo VariablesGlobales::$lesCategories['libelle'] ?></a></li>
                            <li><a href="#"><span>Quantité</span> : en Stock (<?php echo VariablesGlobales::$qteTotale['qteTotale'] ?>)</a></li>
                        </ul>
                        <p><?php echo $produit['description']; ?></p>
                        <div class="product_count">
                            <label for="qty">Quantité :</label>
                            <input type="text" name="qty" id="sst" maxlength="12" value="1" title="Quantity:" class="input-text qty">
                            <button onclick="increaseQuantity()" class="increase items-count" type="button"><i class="lnr lnr-chevron-up"></i></button>
                            <button onclick="decreaseQuantity()" class="reduced items-count" type="button"><i class="lnr lnr-chevron-down"></i></button>
                        </div>
                        <div class="card_area d-flex align-items-center">
                            <a href="index.php?controleur=Panier&action=afficher&idProduit=<?php echo $produit['idProduit'] ?>&quantite=" class="primary-btn" id="addToCartLink">Add to Cart</a>
                            <a class="icon_btn" href="#"><i class="lnr lnr lnr-diamond"></i></a>
                            <a class="icon_btn" href="#"><i class="lnr lnr lnr-heart"></i></a>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="product_description_area">
        <div class="containers">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active show" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Description</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Specification</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade active show" id="home" role="tabpanel"  aria-labelledby="home-tab">
                    <p>Grâce à la RTX 2080 Ti découvrez la réalité virtuelle et une immersion dans vos jeux à 360 degrés !
                        Les RTX 2080 et leur architecture NVIDIA Turing ont été conçues pour la nouvelle génération de 
                        périphériques d’affichage, incluant les casques de réalité virtuelle (VR), les moniteurs Ultra HD 
                        (4K) et les configurations multi-écrans (jusqu'à 4 écrans supportés).
                        Elle prend en charge les technologies NVIDIA GameWorks pour proposer un gameplay extrêmement
                        fluide ainsi que des cinématiques époustouflantes dans tous vos jeux PC nouvelle génération ! 
                        Ressentez et vivez chaque moment de vos jeux avec des images plus nettes, fluides et éblouissantes !</p>
                    <p>Les gamers disposent d'une nouvelle "arme de jeu massive" avec cette toute dernière génération Nvidia
                        basée sur l'architecture Turing. Pour repousser les limites de la performance le fondeur de Santa
                        Clara a intégré 4352 coeurs pour des performances de calcul ahurissantes.  Cette carte ne craint 
                        pas la haute définition grâce à ses 11 Go de GDDR6 cadencé à 14000 MHz. Vous allez pouvoir profiter
                        dans tous vos jeux de la haute résolution jusqu'à 7680 x 4320 px à 60 Hz.</p>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel"  aria-labelledby="profile-tab">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>
                                        <h5>Largeur</h5>
                                    </td>
                                    <td>
                                        <h5>128mm</h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5>Hauteur</h5>
                                    </td>
                                    <td>
                                        <h5>508mm</h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5>Profondeur</h5>
                                    </td>
                                    <td>
                                        <h5>85mm</h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5>Poids</h5>
                                    </td>
                                    <td>
                                        <h5>52gm</h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5>Contrôle de qualité</h5>
                                    </td>
                                    <td>
                                        <h5>yes</h5>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
<script>
    function updateLink() {
        var qty = document.getElementById('sst').value;
        var link = document.getElementById('addToCartLink');
        link.href = "index.php?controleur=Panier&action=afficher&idProduit=<?php echo $produit['idProduit'] ?>&quantite=" + qty;
    }

    function increaseQuantity() {
        var qtyInput = document.getElementById('sst');
        var currentQty = parseInt(qtyInput.value);
        qtyInput.value = currentQty + 1;
        updateLink();
    }

    function decreaseQuantity() {
        var qtyInput = document.getElementById('sst');
        var currentQty = parseInt(qtyInput.value);
        if (currentQty > 1) {
            qtyInput.value = currentQty - 1;
            updateLink();
        }
    }

    // Mettre à jour le lien dès que la valeur de l'input change
    document.getElementById('sst').addEventListener('input', updateLink);
    window.onload = updateLink;
</script>

</body>
</html>