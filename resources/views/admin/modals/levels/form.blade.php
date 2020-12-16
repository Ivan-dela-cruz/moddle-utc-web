<div class="form-group">
    <label for="exampleFormControlInput1">Nombre</label>
    <input type="text" id="exampleFormControlInput1" class="form-control"  placeholder="" wire:model="name" />
    @error('name')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    <label for="exampleFormControlInput3">Estado</label>
    <select class="form-control" id="exampleFormControlInput3" wire:model="status">
        <option value="">Seleccionar</option>
        <option value="1">Activo</option>
        <option value="0">Inactivo</option>
    </select>
    @error('status')<span class="text-danger">{{ $message }}</span>
    @enderror
</div>