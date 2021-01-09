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
                <label class="floating-label" for="status">Estado</label>
                <select class="form-control" name="status" id="exampleFormControlInput3" wire:model="status">
                    <option value="">Seleciona estado</option>
                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option>
                </select>
                
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
                                <td><input wire:model='select_permissions.{{ $p->id}}' type="checkbox" name="select_permissions[]" value="{{$p->id}}"></td>
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