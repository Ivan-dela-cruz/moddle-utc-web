<div class="row p-l-20 p-r-20">
    <div class="col-md-6 form-group">
        <small  class="text-primary" for="name">Nombre</small>
        <input  type="text" id="name" class="form-control"  placeholder="" wire:model="name" />
        @error('name')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    
    <div class="col-md-6 form-group">
        <small style="margin-left: 0px;"  class="mr-3 text-primary">Estado</small>
        <div class="switch switch-info d-inline m-r-10">
            <input  wire:model="status"  type="checkbox" id="switch-i-1" checked>
            <label for="switch-i-1" class="cr"></label>
        </div>
    
    </div>
</div>