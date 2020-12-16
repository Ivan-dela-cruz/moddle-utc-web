<div class="form-group">
    <label for="exampleFormControlInput1">Nombre</label>
    <input type="text" id="exampleFormControlInput1" class="form-control"  placeholder="" wire:model="name" />
    @error('name')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    <label for="exampleFormControlInput2">Apellidos</label>
    <input type="text" id="exampleFormControlInput2" class="form-control" placeholder="" wire:model="last_name" />
    @error('last_name')<span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    <label for="exampleFormControlInput2">DNI</label>
    <input type="text" id="exampleFormControlInput2" class="form-control" placeholder="" wire:model="dni" />
    @error('dni')<span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    <label for="exampleFormControlInput2">Email</label>
    <input type="text" id="exampleFormControlInput2" class="form-control" placeholder="" wire:model="email" />
    @error('email')<span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    <label for="exampleFormControlInput2">Imagen</label>
    <input type="text" id="exampleFormControlInput2" class="form-control" placeholder="" wire:model="url_image" />
    @error('url_image')<span class="text-danger">{{ $message }}</span>
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