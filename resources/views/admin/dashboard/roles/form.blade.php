<form>
    <div class="row">

        <div class="col-sm-12">
            <div class="form-group fill">
                <label class="floating-label" for="Name">Nombre</label>
                <input type="text"  class="form-control" id="Name" wire:model="name" placeholder="">
                @error('name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group fill">
                <label class="floating-label" for="description">Descripción</label>
                <input type="text"  class="form-control" id="description" wire:model="description" placeholder="">
                @error('description')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        
        <div class="col-sm-12">
            <div class="form-group fill">
               
                <div class="form-group">
                    <small style="margin-left: 0px;"  class="mr-3 text-primary">Estado</small>
                    <div class="switch switch-info d-inline m-r-10">
                        <input  wire:model="status"  type="checkbox" id="switch-i-1" checked>
                        <label for="switch-i-1" class="cr"></label>
                    </div>
                
                </div> 
                @error('status')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-sm-12 table-responsive">
             <div class="form-group">
                <h6>Permisos</h6>
             </div>
           <table class="table table-hover table-striped text-center">
                <thead>
                    <tr>
                        <th class="text-left">Módulo</th>
                        <th>Crear</th>
                        <th>Leer</th>
                        <th>Modificar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                   
                    @foreach($permissions->groupBy('modulo') as $k => $v)
                        <tr>
                            <td class="text-left">{{$k}}</td>
                            @foreach($v as $p)
                                @if($action=='PUT')
                                    <td>
                                        <input wire:model='select_permissions.{{ $p->id}}' type="checkbox" 
                                            @if ($role->id==1 || $p->id <= 4) onclick="this.checked=!this.checked;"@endif
                                            name="select_permissions[]" 
                                            value="{{$p->id}}">
                                    </td>
                                @else
                                    <td>
                                        <input wire:model='select_permissions.{{ $p->id}}' 
                                        @if ($p->id<=4) onclick="this.checked=!this.checked;"@endif
                                        type="checkbox" name="select_permissions[]" 
                                        value="{{$p->id}}">
                                    </td>
                                @endif
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
           </table>
        </div>
        <div class="col-sm-12">
         
            @if($action=='POST')
                @can('create_role')
                <button  wire:click.prevent="store()" class="btn btn-primary ">Guardar</button>
                @endcan
            @else
                 @can('update_role')
                <button  wire:click.prevent="update()" class="btn btn-success ">Update</button>
                @endcan
            @endif
            <button wire:click.prevent="resetInputFields()" class="btn btn-danger">Cancelar</button>
        </div>
    </div>
</form>