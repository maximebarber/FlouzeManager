<!-- Bouton affichage modal -->
<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModalCenterCat">
    Ajouter une catégorie
</button><br><br>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenterCat" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Ajouter une catégorie</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <!-- Formulaire ajout type -->
                <form method="POST" id="formCategorie"></form>

                <!-- Champ addType -->
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Libellé de la catégorie" name="addCategorie" form="formCategorie">
                </div>


            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-info btn-sm" form="formCategorie">Valider</button>
            </div>
        </div>
    </div>
</div>


