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
        <small  class="text-primary" for="profession">Profesiòn</small>
        <input type="text" id="profession" class="form-control" placeholder="" wire:model="profession" />
        @error('profession')<span class="text-danger">{{ $message }}</span>
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
                    <img wire:ignore src="{{asset('img/user.jpg')}}" alt="user image" class="img-radius align-top m-r-15" style="width:40px;">
                @else
                    <img wire:ignore src="{{asset($url_image)}}" alt="user image" class="img-radius align-top m-r-15" style="width:40px;">
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
        <small  class="text-primary" for="province">Provincia</small>
        <select name="province" id="province" class="form-control" wire:model="province_id">
            <option value="">Seleccione...</option>
            @foreach($provinces as $province)
                <option value="{{$province->id}}">{{$province->name_province}}</option>
            @endforeach
        </select>
        @error('province_id')<span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-6 form-group">
        <small  class="text-primary" for="canton">Cantón</small>
        <select name="canton" id="canton" class="form-control" wire:model="canton_id">
            <option value="">Seleccione...</option>
            @foreach($cantons as $canton)
                <option value="{{$canton->id}}">{{$canton->name_canton}}</option>
            @endforeach
        </select>
        @error('canton_id')<span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-6 form-group">
        <small  class="text-primary" for="province">Parroquia</small>
        <select name="parish" id="parish" class="form-control" wire:model="parish_id">
            <option value="">Seleccione...</option>
            @foreach($parishes as $parish)
                <option value="{{$parish->id}}">{{$parish->name_parish}}</option>
            @endforeach
        </select>
        @error('parish_id')<span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-6 form-group">
        <small  class="text-primary" for="canton">Dirección</small>
        <input type="text" id="address" class="form-control" placeholder="" wire:model="address" />
        @error('address')<span class="text-danger">{{ $message }}</span>
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
