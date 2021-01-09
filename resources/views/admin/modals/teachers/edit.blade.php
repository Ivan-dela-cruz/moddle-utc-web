<div wire:ignore.self id="updateModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel"> Editar profesor </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    @include('admin.modals.teachers.form')
                    @can('update_techier')
                    <button wire:click.prevent="update()" class="btn btn-success">Editar</button>
                    @endcan
                    <button wire:click.prevent="resetInputFields()" type="button" class="btn btn-danger close-btn" data-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
    </div>
</div>