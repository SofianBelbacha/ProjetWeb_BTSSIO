    <div class="modal fade" id="EditProduitModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form method="POST" action="indexAdmin.php?controleur=Admin&action=modifierProduit" enctype="multipart/form-data">
                    <div class="modal-header bg-dark">
                        <h5 class="modal-title font-weight-normal text-light">Éditer un produit</h5>
                        <div class="btn-windows close-btn-windows mt-2" data-bs-dismiss="modal" aria-label="Close"></div>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <div class="text-center">
                                <label class="card-label text-uppercase">Identifiant du produit</label>
                            </div>
                            <input type="text" class="form-control" name="id_produit_Edit" id="id_produit_Edit" readonly required>
                        </div>
                        <div class="mb-3">
                            <div class="text-center">
                                <label class="card-label text-uppercase">Nom de l'offre</label>
                            </div>
                            <input type="text" class="form-control" name="produit_nom_Edit" id="produit_nom_Edit" required>
                        </div>
                        <div class="mb-3">
                            <div class="text-center">
                                <label class="card-label text-uppercase">Description du produit</label>
                            </div>
                            <textarea class="form-control" id="produit_description_Edit" name="produit_description_Edit" rows="4" required></textarea>
                        </div>
                        <div class="mb-3">
                            <div class="text-center">
                                <label for="recipient-name" class="card-label text-uppercase">Image</label>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="produit_file_Edit" name="produit_file_Edit" accept="image/png, image/jpeg, image/jpg">
                                <label class="custom-file-label" for="validatedCustomFile">Choisir un fichier...</label>
                                <small id="article_file_help" class="form-text text-muted text-left">Format image accepté : JPG, JPEG, PNG</small>

                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="text-center">
                                <label for="recipient-name" class="card-label text-uppercase">Couleur</label>
                            </div>
                            <input type="text" class="form-control" id="produit_couleur_Edit" name="produit_couleur_Edit" placeholder="Exemple : Noire" required>
                        </div>
                        <div class="mb-3">
                            <div class="text-center">
                                <label for="recipient-name" class="card-label text-uppercase">Catégorie</label>
                            </div>
                            <select class="form-control mt-2" id="produit_categorie_Edit" name="produit_categorie_Edit" required>
                                <?php foreach (VariablesGlobales::$lesCategories as $categorie) { ?>
                                    <option value="<?php echo $categorie->idCategorie; ?>"><?php echo $categorie->libelle; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <div class="text-center">
                                <label for="recipient-name" class="card-label text-uppercase">Prix Produit</label>
                            </div>
                            <input type="number" step="0.01" class="form-control" id="produit_prixProduit_Edit" name="produit_prixProduit_Edit" placeholder="Exemple : 1345,23" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-block btn-success">Enregistrer les modifications</button>
                        <button type="button" class="btn btn-block btn-danger" data-bs-dismiss="modal">Fermer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
<div class="modal fade" id="addProduitModal" tabindex="-1" aria-labelledby="addProduitModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form method="POST" action="indexAdmin.php?controleur=Admin&action=ajouterProduit" enctype="multipart/form-data">
                    <div class="modal-header bg-dark">
                        <h5 class="modal-title font-weight-normal text-light" id="addProduitModal">Ajouter un produit</h5>
                        <div class="btn-windows close-btn-windows mt-2" data-bs-dismiss="modal" aria-label="Close"></div>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <div class="text-center">
                                <label for="recipient-name" class="card-label text-uppercase">Nom</label>
                            </div>
                            <input type="text" class="form-control" id="produit_nom" name="produit_nom" placeholder="Exemple : MSI GeForce RTX 4060 Ti VENTUS 2X BLACK OC" required>
                        </div>
                        <div class="mb-3">
                            <div class="text-center">
                                <label for="recipient-name" class="card-label text-uppercase">Description</label>
                            </div>
                            <textarea class="form-control mt-2" id="produit_description" name="produit_description" rows="4" placeholder="Description du produit" required></textarea>
                        </div>
                        <div class="mb-3">
                            <div class="text-center">
                                <label for="recipient-name" class="card-label text-uppercase">Couleur</label>
                            </div>
                            <input type="text" class="form-control" id="produit_couleur" name="produit_couleur" placeholder="Exemple : Noire" required>
                        </div>
                        <div class="mb-3">
                            <div class="text-center">
                                <label for="recipient-name" class="card-label text-uppercase">Catégorie</label>
                            </div>
                            <select class="form-control mt-2" id="produit_categorie" name="produit_categorie" required>
                                <?php foreach (VariablesGlobales::$lesCategories as $categorie) { ?>
                                    <option value="<?php echo $categorie->idCategorie; ?>"><?php echo $categorie->libelle; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <div class="text-center">
                                <label for="recipient-name" class="card-label text-uppercase">Fournisseur</label>
                            </div>
                            <select class="form-control mt-2" id="produit_fournisseur" name="produit_fournisseur" required>
                                <?php foreach (VariablesGlobales::$lesFournisseurs as $fournisseur) { ?>
                                    <option value="<?php echo $fournisseur->idFournisseur; ?>"><?php echo $fournisseur->nomSociete; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <div class="text-center">
                                <label for="recipient-name" class="card-label text-uppercase">Quantité livré</label>
                            </div>
                            <input type="number" class="form-control" id="produit_qteLivrer" name="produit_qteLivrer" placeholder="Exemple : 12" required>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="mb-3 mr-3">
                                <div class="text-center">
                                    <label for="recipient-name" class="card-label text-uppercase">Prix Fournisseur</label>
                                </div>
                                <input type="number" step="0.01" class="form-control" id="produit_prixFournisseur" name="produit_prixFournisseur" placeholder="Exemple : Jean" required>
                            </div>
                            <div class="mb-3">
                                <div class="text-center">
                                    <label for="recipient-name" class="card-label text-uppercase">Prix Produit</label>
                                </div>
                                <input type="number" step="0.01" class="form-control" id="produit_prixProduit" name="produit_prixProduit" placeholder="Exemple : 1345,23" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="text-center">
                                <label for="recipient-name" class="card-label text-uppercase">Image</label>
                            </div>
                            <div class="form-group mb-3 ">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="produit_file" name="produit_file" accept="image/png, image/jpeg, image/jpg"required>
                                    <label class="custom-file-label" for="validatedCustomFile">Choisir un fichier...</label>
                                    <small id="article_file_help" class="form-text text-muted text-left">Format image accepté : JPG, JPEG, PNG</small>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-block btn-success">Ajouter le nouveau produit</button>
                        <button type="button" class="btn btn-block btn-danger" data-bs-dismiss="modal">Fermer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<div class="row my-5">
    <div class="table-section-produit">
          <div class="col-12">
            <div class="card shadow-lg border-dark">
                <div class="card-header bg-dark">
                    <div class="d-flex align-items-center">
                        <h5 class="mr-auto mt-2 font-weight-normal text-light text-center">Table | Produit<button type="button" class="btn btn-sm btn-success rounded-pill mr-auto ml-3" data-bs-toggle="modal" data-bs-target="#addProduitModal">Ajouter</button></h5>
                        <a href="" target="_blank">
                            <div class="btn-windows close-btn-windows mr-1"></div>
                        </a>
                        <a href="" target="_blank">
                            <div class="btn-windows min-btn-windows mr-1"></div>
                        </a>
                        <a href="" target="_blank">
                            <div class="btn-windows max-btn-windows"></div>
                        </a>
                    </div>
                </div>
                <div class="card-body m-2 p-5">
                    <div class="table">
                        <table class="table table-striped table-bordered table-responsive" id="myTable">
                            <thead class="table-dark">
                                <tr>
                                    <th></th>
                                    <?php foreach (VariablesGlobales::$lesChamps as $leChamp) { ?>
                                        <th><?php echo $leChamp->Field; ?></th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach (VariablesGlobales::$lesProduits as $leProduit) { ?>
                                    <tr>
                                        <td><a data-bs-toggle="modal" data-bs-target="#EditProduitModal" data-bs-whatever="<?php echo $leProduit->idProduit; ?>" class="text-info"><i class="fas fa-pen"></i></a>
                                        <a href="indexAdmin.php?controleur=Admin&action=supprimerProduit&id=<?php echo $leProduit->idProduit; ?>" class="text-danger ml-3"><i class="fas fa-trash"></i></a>
                                        </td>
                                        <?php foreach ($leProduit as $unAttribut) { ?>
                                            <td><?php echo $unAttribut; ?>
                                            <?php
                                        }
                                            ?>
                                            </td>
                                        <?php
                                    }
                                        ?>
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
