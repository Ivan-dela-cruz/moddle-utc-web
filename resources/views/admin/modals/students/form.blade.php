<div class="row p-l-20 p-r-20">
    <div class="col-md-6 form-group">
        <small  class="text-primary" for="name">Nombre</small>
        <input  type="text" id="name" class="form-control"  placeholder="" wire:model="name" />
        @error('name')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-6 form-group">
        <small  class="text-primary" for="last_name">Apellidos</small>
        <input type="text" id="last_name" class="form-control" placeholder="" wire:model="last_name" />
        @error('last_name')<span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-6 form-group">
        <small  class="text-primary" for="dni">DNI</small>
        <input type="text" id="dni" class="form-control" placeholder="" wire:model="dni" />
        @error('dni')<span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-6 form-group">
        <small  class="text-primary" for="passport">Pasaporte</small>
        <input type="text" id="passport" class="form-control" placeholder="" wire:model="passport" />
        @error('passport')<span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-6 form-group">
        <small  class="text-primary" for="instruction">Instrucción</small>
        <input type="text" id="instruction" class="form-control" placeholder="" wire:model="instruction" />
        @error('instruction')<span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-6 form-group">
        <small  class="text-primary" for="marital_status">Estado cívil</small>
        <select  class="form-control" name="marital_status" id="marital_status" wire:model="marital_status">
            <option value="">Selecciona</option>
            <option value="casado">Casado</option>
            <option value="unio">Unión libre</option>
            <option value="soltero">Soltero</option>
            <option value="viudo">Viudo</option>
            <option value="otros">Otros</option>
        </select>
        @error('marital_status')<span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-6 form-group">
        <small  class="text-primary" for="birth_date">Fecha de nacimiento</small>
        <input type="date" id="birth_date" class="form-control" placeholder="" wire:model="birth_date" />
        @error('birth_date')<span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-6 form-group">
        <small  class="text-primary" for="phone">Télefono</small>
        <input type="text" id="phone" class="form-control" placeholder="" wire:model="phone" />
        @error('phone')<span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-6 form-group">
        <small  class="text-primary" for="email">Email</small>
        <input type="text" id="email" class="form-control" placeholder="" wire:model="email" />
        @error('email')<span class="text-danger">{{ $message }}</span>
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