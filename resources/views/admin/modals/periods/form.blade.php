<div class="row p-l-20 p-r-20">
    <div class="col-md-6 form-group">
        <small  class="text-primary" for="name">Nombre</small>
        <input  type="text" id="name" class="form-control"  placeholder="" wire:model="name" />
        @error('name')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-6 form-group">
        <small  class="text-primary" for="start_date">Inicio</small>
        <input  type="date" id="start_date" class="form-control"  placeholder="" wire:model="start_date" />
        @error('start_date')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-6 form-group">
        <small  class="text-primary" for="end_date">Fin</small>
        <input  type="date" id="end_date" class="form-control"  placeholder="" wire:model="end_date" />
        @error('end_date')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-6 form-group">
        <div class="input-group mb-3">
                                                    
            <div class="input-group-prepend">
                
                @if($url_image =='')
                    <img src="{{asset('img/user.jpg')}}" alt="user image" class="img-radius align-top m-r-15" style="width:40px;">
                @else
                    <img src="{{asset($url_image)}}" alt="user image" class="img-radius align-top m-r-15" style="width:40px;">
                @endif
            </div>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="inputGroupFile01" wire:model="url_image">
                <label class="custom-file-label" for="inputGroupFile01" >Subir imagen</label>
            </div>
        
        </div>
        @error('url_image')<span class="text-danger">{{ $message }}</span>
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