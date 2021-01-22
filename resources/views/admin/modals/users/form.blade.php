<div class="row p-l-20 p-r-20">
    <div class="col-md-6 form-group">
        <small class="text-primary" for="name">Nombres</small>
        <input type="text" id="name" class="form-control" placeholder="" wire:model="name"/>
        @error('name')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-6 form-group">
        <small class="text-primary" for="last_name">Apellidos</small>
        <input type="text" id="last_name" class="form-control" placeholder="" wire:model="last_name"/>
        @error('last_name')<span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-6 form-group">
        <small class="text-primary" for="email">Correo</small>
        <input type="text" id="email" class="form-control" placeholder="" wire:model="email"/>
        @error('email')<span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-6 form-group">
        <small class="text-primary">Imagen</small>
        <div class="input-group">
            <div class="input-group-prepend">
                @if($url_image == '')
                    <img src="{{asset('img/user.jpg')}}" alt="user image" class="img-radius align-top m-r-15"
                         style="width:40px; height: 40px;">
                @else
                    <img src="{{asset($url_image)}}" alt="user image" class="img-radius align-top m-r-15"
                         style="width:40px; height: 40px;">
                @endif
            </div>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="inputGroupFile01" wire:model="url_image"
                       accept="image/x-png,image/jpg,image/jpeg">
                <label class="custom-file-label" for="inputGroupFile01">Subir imagen</label>
            </div>
        </div>
        @error('url_image')<span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-6 form-group">
        <small class="text-primary" for="password">Contraseña</small>
        <input type="password" id="password" class="form-control" placeholder="" wire:model="password"/>
        @error('password')<span class="text-danger">{{ $message }}</span>
        @else
            <small class="form-control-feedback text-muted">Mínimo 8 caracteres.
            </small>
            @enderror

    </div>
    <div class="col-md-6 form-group">
        <small class="text-primary" for="password_confirmation">Confirmar Contraseña</small>
        <input type="password" id="password_confirmation" class="form-control" placeholder=""
               wire:model="password_confirmation"/>
        @error('password_confirmation')<span class="text-danger">{{ $message }}</span>
        @else
            <small class="form-control-feedback text-muted">Vuelva a escribir la
                contraseña.
            </small>
            @enderror

    </div>
    <div class="col-md-6 form-group" wire:ignore>
        <small class="text-primary" for="password_confirmation">Roles</small>
        <select id="role" class="select2 form-control" multiple data-placeholder="{{__('Seleccione...')}}" >
            @foreach($roles as $role)
                <option value="{{$role->id}}">{{$role->name}}</option>
            @endforeach
        </select>
        @error('roles')<span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="col-md-6 form-group">
        <small style="margin-left: 0px;" class="mr-3 text-primary">Estado</small>
        <div class="switch switch-info m-r-10">
            <input wire:model="status" type="checkbox" id="switch-i-1" checked>
            <label for="switch-i-1" class="cr"></label>
        </div>
    </div>
</div>
