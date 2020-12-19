<div class="form-group">
    <label for="exampleFormControlInput1">Nombre</label>
    <input type="text" id="exampleFormControlInput1" class="form-control"  placeholder="" wire:model="name" />
    @error('name')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    <label for="exampleFormControlInput2">Description</label>
    <input type="text" id="exampleFormControlInput2" class="form-control" placeholder="" wire:model="description" />
    @error('description')<span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    <label for="exampleFormControlInput2">Inicio de Entrega</label>
    <input type="date" id="exampleFormControlInput2" class="form-control" placeholder="" wire:model="start_date" />
    @error('start_date')<span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    <label for="exampleFormControlInput2">Fin de Entrega</label>
    <input type="date" id="exampleFormControlInput2" class="form-control" placeholder="" wire:model="end_date" />
    @error('end_date')<span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    <label for="exampleFormControlInput2">Archivo</label>
    <input type="text" id="exampleFormControlInput2" class="form-control" placeholder="" wire:model="url_file" />
    @error('url_file')<span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    <label for="exampleFormControlInput2">Tiempo de Entrega</label>
    <input type="time" id="exampleFormControlInput2" class="form-control" placeholder="" wire:model="end_time" />
    @error('end_time')<span class="text-danger">{{ $message }}</span>
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

