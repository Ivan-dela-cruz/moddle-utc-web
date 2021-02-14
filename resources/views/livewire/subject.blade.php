<div class="col-lg-12">
   
    @include('admin.modals.subjects.create')

    @include('admin.modals.subjects.edit')

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-7">
                    <div class="form-group">
                        <input
                            wire:model="search"
                            class="form-control my-border"
                            type="text"
                            placeholder="Buscar...">
                    </div>
                </div>
                <div class="col-sm-3">
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
                <div class="col-sm-2">
                    <div class="form-group">
                        @can('create_subject')
                            <button class="btn btn-success btn-sm btn-round has-ripple float-lg-right"
                                    data-toggle="modal" data-target="#createModal">
                                <i class="feather icon-plus"></i>
                                Agregar
                            </button>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card user-profile-list">
        <div class="card-body">
            <div class="dt-responsive table-responsive">
                <table class="table  nowrap mb-2 dataTable">
                    <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Slug</th>
                        <th>Ciclo</th>
                        <th>Estado</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($subjects as $data)
                        <tr>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->description }}</td>
                            <td>{{ $data->slug }}</td>
                            <td>{{ $data->level->name}}</td>
                            <td>
                                @if ($data->status === 1)
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
                                    @can('update_subject')
                                        <button
                                            class="btn btn-icon btn-warning"
                                            wire:click="edit({{ $data->id }})"
                                            type="button"
                                            data-toggle="modal" data-target="#updateModal">
                                            <i class="feather icon-edit-2"></i></button>
                                    @endcan
                                    @can('destroy_subject')
                                        <button
                                            wire:click="delete({{ $data->id }})"
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
            {{$subjects->links()}}

        </div>
    </div>
</div>


