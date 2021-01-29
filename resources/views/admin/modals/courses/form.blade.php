<div class="form-group">
    <small style="margin-left: 0px;"  class="mr-3 text-primary">Título</small>
    <input type="text" id="exampleFormControlInput1" class="form-control"  placeholder="" wire:model.defer="name" />
    @error('name')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    <small style="margin-left: 0px;"  class="mr-3 text-primary">Descripción</small>
    <textarea type="text" id="exampleFormControlInput2" class="form-control" placeholder="" wire:model.defer="description">
    </textarea>
    @error('description')<span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <small style="margin-left: 0px;"  class="mr-3 text-primary">Imagen</small>                   
    <div class="input-group mb-3">
                                                
        <div class="input-group-prepend">
            
            @if($url_image =='')
                <img src="{{asset('img/user.jpg')}}" alt="user image" class="img-radius align-top m-r-15" style="width:40px;">
            @else
                <img src="{{asset($url_image_t)}}" alt="user image" class="img-radius align-top m-r-15" style="width:40px;">
            @endif
        </div>
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="inputGroupFile01" wire:model.defer="url_image">
            <label class="custom-file-label" for="inputGroupFile01" >Subir imagen</label>
        </div>
    
    </div>
    @error('url_image')<span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    <small style="margin-left: 0px;"  class="mr-3 text-primary">Contenido</small>
    <div   wire:key="MyKey">
        <textarea id="classic-editor">
            {!! $content !!}
        </textarea>
    </div>
   
    <textarea hidden wire:model.defer="content"  id="content">   
        {!! $content !!}   
    </textarea>
  
</div>
<div class="form-group">
    @error('content')<span class="text-danger">{{ $message }}</span>
</div>
@enderror
<div class="form-group">
    <small style="margin-left: 0px;"  class="mr-3 text-primary">Estado</small>
    <div class="switch switch-info d-inline m-r-10">
        <input  wire:model.defer="status"  type="checkbox" id="switch-i-1" checked>
        <label for="switch-i-1" class="cr"></label>
    </div>
</div>
<div class="form-group">
    @error('period_id')<span class="text-danger">{{ $message }}</span><br>@enderror
    @error('teacher_id')<span class="text-danger">{{ $message }}</span><br>@enderror
    @error('teacher_id')<span class="text-danger">{{ $message }}</span><br>@enderror
    @error('subject_id')<span class="text-danger">{{ $message }}</span><br>@enderror
    @error('level_id')<span class="text-danger">{{ $message }}</span><br>@enderror
</div>