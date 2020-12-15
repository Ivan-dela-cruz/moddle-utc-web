<form>
    <div class="row">

        <div class="col-sm-12">
            <div class="form-group">
                <label class="floating-label" for="Name">Nombre</label>
                <input type="text" class="form-control" id="Name" placeholder="">
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group fill">
                <label class="floating-label" for="Email">Descripción</label>
                <input type="email" class="form-control" id="Email" placeholder="">
            </div>
        </div>
        
        <div class="col-sm-12">
            <div class="form-group">
                <label class="floating-label" for="Sex">Estado</label>
                <select class="form-control" id="Sex">
                    <option value="male">Activo</option>
                    <option value="female">Inactivo</option>
                </select>
            </div>
        </div>
        <div class="col-sm-12">
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
                                <td><input type="checkbox" name="permissions[]" value="{{$p->id}}"></td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
           </table>
        </div>
        <div class="col-sm-12">
            <button class="btn btn-primary">Guardar</button>
            <button class="btn btn-danger">Cancelar</button>
        </div>
    </div>
</form>