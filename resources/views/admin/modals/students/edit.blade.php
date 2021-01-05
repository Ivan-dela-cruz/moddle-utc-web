<div wire:ignore.self id="updateModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="createModalLabel">Editar estudiante</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    @include('admin.modals.students.form')
                    <div class="text-center p-r-20">
                        <button wire:click.prevent="update()" class="btn btn-info float-right ml-3">Actualizar</button>
                        <button wire:click.prevent="resetInputFields()" type="button" class="btn btn-danger close-btn float-right" data-dismiss="modal">Cancelar</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>