<div class="form-group">
    <label for="exampleFormControlInput1">Periodo</label>
    <input type="text" id="exampleFormControlInput1" class="form-control"  placeholder="" wire:model="name" />
    @error('name')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <label for="exampleFormControlInput2">Inicio</label>
    <input type="date" id="exampleFormControlInput2" class="form-control" placeholder="" wire:model="start_date" />
    @error('start_date')<span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    <label for="exampleFormControlInput2">Finalización</label>
    <input type="date" id="exampleFormControlInput2" class="form-control" placeholder="" wire:model="end_date" />
    @error('end_date')<span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    <label for="exampleFormControlInput2">Imagen</label>
    <input type="file" id="exampleFormControlInput2" class="form-control" placeholder="" wire:model="url_image" />
    @error('url_image')<span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <label for="exampleFormControlInput3">Estado</label>
    <select class="form-control" id="exampleFormControlInput3" wire:model="status">
        <option value="">Slecciona</option>
        <option value="1">Activo</option>
        <option value="0">Inactivo</option>
    </select>
    @error('status')<span class="text-danger">{{ $message }}</span>
    @enderror
</div>