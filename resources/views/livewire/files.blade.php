<div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-8">
                    <div class="form-group">
                        <input
                            wire:model="search"
                            class="form-control my-border"
                            type="text"
                            placeholder="Buscar...">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group d-flex justify-content-between">
                        <select wire:model="perPage" class="form-control text-gray-500 text-sm my-border mr-4">
                            <option value="5">5 por página</option>
                            <option value="10">10 por página</option>
                            <option value="15">15 por página</option>
                            <option value="20">20 por página</option>
                            <option value="50">50 por página</option>
                            <option value="100">100 por página</option>
                        </select>
                        @if($search !='')
                            <button wire:click="clear" class="btn btn-outline-danger ">X</button>
                        @endif
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <div class="card user-profile-list">
        <div class="card-header">
            <h5> Listado de archivos </h5>
        </div>
        <div class="card-body">
            <div class="dt-responsive table-responsive">
                <table class="table  nowrap mb-2 dataTable">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Tamaño</th>
                            <th>Ruta</th>
                            <th>Estado</th>

                        </tr>
                    </thead>

                    <tbody>
                        @foreach($files as $file)
                        <tr>	
                            <td>{{ $file->name }}</td>
                            <td>{{ $file->size_file }} bytes</td>
                            <td>{{ $file->url_file}}</td>
                            <td>
                                @if ($file->status === 1)
                                        <span
                                        class="badge badge-light-success">
                                        Activo
                                        </span>
                                @else
                                    <span
                                        class="badge badge-light-danger">
                                        Inactivo
                                        </span>
                                    
                                @endif
                                
                                <div class="overlay-edit">
                                   
                                    @can('destroy_file')    
                                        <button
                                            wire:click="delete({{ $file->id }})"
                                            data-toggle="tooltip" 
                                            title="Titulo"
                                            type="button"
                                            class="btn btn-icon btn-danger">
                                            <i class="feather icon-trash-2"></i>
                                        </button>
                                    @endcan
                                </div>
                                
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
            {{$files->links()}}
        </div>
    </div>
</div>
    
