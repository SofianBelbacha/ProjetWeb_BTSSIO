$(document).ready(function () {

    //---------------------------------------------------------------------
    // PERMET D'ACTIVER LES DATABLES.JS DANS TOUTES LES PAGES
    // https://datatables.net/
    //---------------------------------------------------------------------
    $('#myTable').DataTable({
        // responsive: true,
        pageLength: 5
    });
    
    //---------------------------------------------------------------------
    // TRAITEMENT SUR L'APPARITION DE LA MODAL POUR ÉDITER LA TABLE OFFRE
    //---------------------------------------------------------------------
    $(document).on('show.bs.modal', '#EditProduitModal', function (event) {
        // Récupère la valeur de l'attribut du bouton ayant déclencher la modal
        var idProduitTarget = event.relatedTarget.getAttribute('data-bs-whatever')
        // Récupère le nom de la catégorie (Ajax)
        $.ajax({
            async: true,
            type: "POST",
            url: "libs/ajax/getDataProduit.php",
            data: {
                idProduit: idProduitTarget
            },
            dataType: "json",
            success: function (response) {
                $("#id_produit_Edit").val(idProduitTarget);
                $("#produit_nom_Edit").val(response["nom"]);
                $("#produit_description_Edit").val(response["description"]);
                $("#produit_couleur_Edit").val(response["couleur"]);
                $("#img_Produit_Edit").val(response["image"]);
                $("#produit_categorie_Edit").val(response["idCategorie"]);
                $("#produit_prixProduit_Edit").val(response["prix"]);
            }
        });
    });


});


