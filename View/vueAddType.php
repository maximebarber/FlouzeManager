<!-- Button trigger modal -->
<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModalCenter">
    Ajouter un type
</button><br><br>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Ajouter un type</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                <form method="POST" id="formType"></form>

                <!-- Champ addType -->
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Libellé du type" name="addType" form="formType">
                </div>


            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-info" form="formType">Valider</button>
            </div>
        </div>
    </div>
</div>


