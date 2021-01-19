<div class="col-lg-12">
    @if(session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{session('message')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @include('admin.modals.levels.create')
    @include('admin.modals.levels.edit')

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-7">
                        <div class="form-group">
                            <input
                                wire:model="search"
                                class="form-control my-border"
                                type="text"
                                placeholder="Buscar...">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <select wire:model="perPage" class="form-control text-gray-500 text-sm my-border">
                                <option value="5">5 por página</option>
                                <option value="10">10 por página</option>
                                <option value="15">15 por página</option>
                                <option value="20">20 por página</option>
                                <option value="50">50 por página</option>
                                <option value="100">100 por página</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            @if($search !='')
                                <button wire:click="clear" class="btn btn-outline-danger ml-6">X</button>
                            @endif
                            @can('create_level')
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
                <table class="table nowrap mb-2 dataTable">
                    <thead>
                    <tr>
                        <th>Ciclo</th>

                        <th>Estado</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($levels as $level)
                        <tr>
                            <td>{{ $level->name }}</td>
                            <td>
                                @if ($level->status === 1)
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
                                    @can('update_level')
                                        <button
                                            class="btn btn-icon btn-warning"
                                            wire:click="edit({{ $level->id }})"
                                            type="button"
                                            data-toggle="modal" data-target="#updateModal">
                                            <i class="feather icon-edit-2"></i></button>
                                    @endcan
                                    @can('destroy_level')
                                        <button
                                            wire:click="delete({{ $level->id }})"
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
            {{$levels->links()}}
        </div>
    </div>
</div>

<div>

