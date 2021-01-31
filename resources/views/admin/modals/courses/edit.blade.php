

<div wire:ignore.self id="updateModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="updateModalLabel">Editar Curso </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    @include('admin.modals.courses.form')
                    <div class="text-right">
                        @can('update_course')
                            <button wire:click.prevent="update()" class="btn btn-sm btn-info">Actualizar</button>
                        @endcan
                        <button wire:click.prevent="resetInputFields()" type="button" class="btn btn-sm btn-danger close-btn bl-3" data-dismiss="modal">Cancelar</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
