    <section class="banner-area-contact organic-breadcrumb">
        <div class="container-contact">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Nos Produits</h1>
                    <nav class="d-flex align-items-center">
                        <a href="../index.php">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="<?php echo Chemins::VUES .'produits.php'; ?>">produits</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="product-area">
        <div class="filter-area">
            <div class="filter-header">
                <div class="flex-item-header-filter">
                    <img src="<?php echo Chemins::IMAGES . 'filtre.png'; ?>" alt="" srcset="">
                    <p>Filtres</p>
                </div>
                <div class="filter-all">
                    <div class="common-filter">
                        <div class="first-head head">Marque</div>
                        <form action="#">
                            <ul>
                                <li class="filter-list"><input class="pixel-radio" type="radio" id="apple" name="brand"><label for="apple">Apple<span>(29)</span></label></li>
                                <li class="filter-list"><input class="pixel-radio" type="radio" id="asus" name="brand"><label for="asus">Asus<span>(29)</span></label></li>
                                <li class="filter-list"><input class="pixel-radio" type="radio" id="gionee" name="brand"><label for="gionee">Gionee<span>(19)</span></label></li>
                                <li class="filter-list"><input class="pixel-radio" type="radio" id="micromax" name="brand"><label for="micromax">Micromax<span>(19)</span></label></li>
                                <li class="filter-list"><input class="pixel-radio" type="radio" id="samsung" name="brand"><label for="samsung">Samsung<span>(19)</span></label></li>
                            </ul>
                        </form>
                    </div>
                    <div class="common-filter">
                        <div class="head">Categorie</div>
                        <form action="#">
                            <?php foreach (VariablesGlobales::$lesCategories as $uneCategorie) { ?>
                                <ul>
                                    <li class="filter-list">
                                        <input class="pixel-radio" type="radio" id="<?php echo $uneCategorie['categorie']; ?>" name="categorie" 
                                        data-categorie="<?php echo $uneCategorie['categorie']; ?>"
                                        <?php if (isset($_GET['categorie']) && $_GET['categorie'] === $uneCategorie['categorie']) {
                                            echo 'checked="checked"';
                                        } ?>>
                                        <label for="<?php echo $uneCategorie['categorie']; ?>">
                                            <a href="index.php?controleur=Produits&action=afficher&categorie=<?php echo $uneCategorie['categorie']; ?>" style="color: inherit;">
                                                <?php echo $uneCategorie['categorie']?>
                                                <span>(<?php echo $uneCategorie['count_produits']?>)</span>
                                            </a>
                                        </label>
                                    </li>
                                </ul>
                            <?php } ?>
                        </form>
                    </div>                        
                    <div class="common-filter">
                        <div class="head">Couleur</div>
                        <form action="#">
                            <ul>
                                <li class="filter-list"><input class="pixel-radio" type="radio" id="apple" name="brand"><label for="apple">Noir<span>(29)</span></label></li>
                                <li class="filter-list"><input class="pixel-radio" type="radio" id="asus"  name="brand"><label for="asus">Blanc<span>(29)</span></label></li>
                                <li class="filter-list"><input class="pixel-radio" type="radio" id="gionee" name="brand"><label for="gionee">Rouge<span>(19)</span></label></li>
                                <li class="filter-list"><input class="pixel-radio" type="radio" id="micromax" name="brand"><label for="micromax">Vert<span>(19)</span></label></li>
                                <li class="filter-list"><input class="pixel-radio" type="radio" id="samsung" name="brand"><label for="samsung">Bleu<span>(19)</span></label></li>
                            </ul>
                        </form>
                    </div>
                    <div class="common-filter">
                        <div class="head">Prix</div>
                        <div class="price-range-area">
                            <div id="price-range" class="noUi-target noUi-ltr noUi-horizontal">
                                <div class="noUi-base">
                                    <div class="noUi-origin" style="left: 10%;">
                                        <div class="noUi-handle noUi-handle-lower" data-handle="0" tabindex="0"
                                            role="slider" aria-orientation="horizontal" style="z-index: 5;"
                                            aria-valuemin="0.0" aria-valuemax="50.0" aria-valuenow="10.0"
                                            aria-valuetext="500.00"></div>
                                    </div>
                                    <div class="noUi-connect" style="left: 10%; right: 50%;"></div>
                                    <div class="noUi-origin" style="left: 50%;">
                                        <div class="noUi-handle noUi-handle-upper" data-handle="1" tabindex="0"
                                            role="slider" aria-orientation="horizontal" style="z-index: 6;"
                                            aria-valuemin="10.0" aria-valuemax="100.0" aria-valuenow="50.0"
                                            aria-valuetext="4000.00"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="value-wrapper d-flex">
                                <div class="price">Prix :</div>
                                <span>$</span>
                                <div id="lower-value">500.00</div>
                                <div class="to">à</div>
                                <span>$</span>
                                <div id="upper-value">4000.00</div>
                            </div>
                        </div>
                    </div>
                    <button type="button" id="clearSelection" style="display:none;">Clear selection</button>
                </div>
            </div>
        </div>
        <div class="carroussel">
            <div class="product-info-details">
                <div class="info-produit">
                    <p>Affichage des produit 1-12 sur 31</p>
                </div>
                <div class="selectdiv">
                    <label>
                        <select>
                            <option selected> Trier par  </option>
                            <option>Plus récent</option>
                            <option>Prix (bas à élevé)</option>
                            <option>Prix (élevé à bas)</option>
                            <option>Nom (A-Z)</option>
                            <option>Prix (Z-A)</option>
                        </select>
                    </label>
                </div>
            </div>
            <div class="row-justify" style="align-items: baseline;">
            <?php if (isset($_GET['categorie'])) {                                 
                foreach (VariablesGlobales::$lesProduitsByCat as $produitByCat) { 
                    $avantDernierPrix = 0; 
                foreach (VariablesGlobales::$beforeLastPrice as $prix) {
                    if ($prix['idProduit'] === $produitByCat['idProduit']) {
                        $avantDernierPrix = $prix['prix'];
                        break;
                    }
                }
            ?>                
                <div class="placement2 placement">
                    <div class="single-product">
                        <img class="img-fluid" src="<?php echo Chemins::IMAGES . $produitByCat['image']; ?>" alt="">
                        <div class="product-details">
                            <h6><?php echo $produitByCat['nom']; ?></h6>
                            <div class="price">
                                <h6>€<?php echo $produitByCat['prix']; ?></h6>
                                <h6 class="l-through">€<?php echo $avantDernierPrix; ?></h6>
                            </div>
                            <div class="prd-bottom">
                                <a href="index.php?controleur=Panier&action=afficher&idProduit=<?php echo $produitByCat['idProduit']; ?>" class="social-info">
                                    <span class="ti-bag"></span>
                                    <p class="hover-text">add to bag</p>
                                </a>
                                <a href="" class="social-info">
                                    <span class="lnr lnr-heart"></span>
                                    <p class="hover-text">Wishlist</p>
                                </a>
                                <a href="" class="social-info">
                                    <span class="lnr lnr-sync"></span>
                                    <p class="hover-text">comparer</p>
                                </a>
                                <a href="index.php?controleur=AfficherPages&action=afficherPagesProduitsDeails&idProduit=<?php echo $produitByCat['idProduit']; ?>" class="social-info">
                                    <span class="lnr lnr-move"></span>
                                    <p class="hover-text">voir plus</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div> 
            <?php }} elseif (isset(VariablesGlobales::$lesProduits) && isset(VariablesGlobales::$beforeLastPrice)) {
                foreach (VariablesGlobales::$lesProduits as $produit) {
                $avantDernierPrix = 0; 
                foreach (VariablesGlobales::$beforeLastPrice as $prix) {
                    if ($prix['idProduit'] === $produit['idProduit']) {
                        $avantDernierPrix = $prix['prix'];
                        break;
                    }
                }
            ?>                
                <div class="placement2 placement">
                    <div class="single-product">
                        <img class="img-fluid" src="<?php echo Chemins::IMAGES . $produit['image']; ?>" alt="">
                        <div class="product-details">
                            <h6><?php echo $produit['nom']; ?></h6>
                            <div class="price">
                                <h6>€<?php echo $produit['prix']; ?></h6>
                                <h6 class="l-through">€<?php echo $avantDernierPrix; ?></h6>
                            </div>
                            <div class="prd-bottom">
                                <a href="index.php?controleur=Panier&action=afficher&idProduit=<?php echo $produit['idProduit']; ?>" class="social-info">
                                    <span class="ti-bag"></span>
                                    <p class="hover-text">add to bag</p>
                                </a>
                                <a href="" class="social-info">
                                    <span class="lnr lnr-heart"></span>
                                    <p class="hover-text">Wishlist</p>
                                </a>
                                <a href="" class="social-info">
                                    <span class="lnr lnr-sync"></span>
                                    <p class="hover-text">comparer</p>
                                </a>
                                <a href="index.php?controleur=AfficherPages&action=afficherPagesProduitsDeails&idProduit=<?php echo $produit['idProduit']; ?>" class="social-info">
                                    <span class="lnr lnr-move"></span>
                                    <p class="hover-text">voir plus</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }
                    } else {
                        echo "<p>Aucun produit trouvé.</p>";
                    }
                        ?>
            </div>
            <div class="pagination">
                <a href="#" class="prev-arrow"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
                <a href="#" class="active">1</a>
                <a href="#">2</a>
                <a href="#">3</a>
                <a href="#" class="dot-dot"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>
                <a href="#">6</a>
                <a href="#" class="next-arrow"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
            </div>
        </div>
    </section>
    
</body>
</html>
<script>
    function toggleCheckboxAppearance(radio) {
    // Permet de décocher la radio box si elle est déjà cochée
    if (!radio.checked) {
        radio.checked = false;
    } else {
        radio.checked = false;
    }
}</script>