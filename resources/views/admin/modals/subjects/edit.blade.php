<div wire:ignore.self id="updateModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Edit Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nombre</label>
                        <input type="text" id="exampleFormControlInput1" class="form-control"  placeholder="Ingrese" wire:model="name" />
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput2">Descripción</label>
                        <input type="text" id="exampleFormControlInput2" class="form-control" placeholder="Ingrese description" wire:model="description" />
                        @error('description')<span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                     <div class="form-group">
                        <label for="exampleFormControlInput2">Slug</label>
                        <input type="text" id="exampleFormControlInput2" class="form-control" placeholder="Slug" wire:model="slug" />
                        @error('slug')<span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput3">Ciclo</label>
                        <select class="form-control" id="exampleFormControlInput3" wire:model="level_id">
                            <option value="">Seleccione</option>
                            @foreach ($levels as $level)
                            <option value="{{ $level->id }}">{{$level->name}}</option>
                            @endforeach
                        </select>
                        @error('status')<span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput3">Estado</label>
                        <select class="form-control" id="exampleFormControlInput3" wire:model="status">
                            <option value="">Select</option>
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                        </select>
                        @error('status')<span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    @can('update_subject')
                    <button wire:click.prevent="update()" class="btn btn-dark">Update</button>
                    @endcan
                    <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
    </div>
</div>