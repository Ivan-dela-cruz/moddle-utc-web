<div class="col-lg-12">
    @if(session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{session('message')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @include('admin.modals.teachers.create')

    @include('admin.modals.teachers.edit')

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
                        <div class="form-group">
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
                    <div class="col-sm-2">
                        <div class="form-group">

                            @can('create_techier')
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
                <table id="user-list-table" class="table nowrap dataTable">
                    <thead>
                    <tr>
                        <th>Profesor</th>
                        <th>DNI</th>
                        <th>Email</th>
                        <th>Dirección</th>
                        <th>Registrado</th>
                        <th>Estado</th>
                    </tr>
                    </thead>
                    <tbody>
                       <p hidden> {{\Carbon\Carbon::setLocale('es')}}</p>
                    @foreach($teachers as $teacher)
                        <tr>
                            <td>
                                <div class="d-inline-block align-middle">
                                    <img src="{{asset($teacher->url_image)}}" alt="user image" class="img-radius align-top m-r-15" style="width:40px;">
                                    <div class="d-inline-block">
                                        <h6 class="m-b-0">{{$teacher->name}} {{$teacher->last_name}}</h6>
                                        <p class="m-b-0">{{$teacher->profession}}</p>
                                    </div>
                                </div>
                            </td>
                            <td>{{$teacher->dni}}</td>
                            <td>{{$teacher->email}}</td>
                            <td>
                                <div class="d-inline-block">
                                    <p class="m-b-0">
                                        {{$teacher->user->address->parish->canton->province->name_province}} - 
                                        {{$teacher->user->address->parish->canton->name_canton}}
                                    </p>
                                    <small class="m-b-0">{{$teacher->user->address->address}}</small>
                                </div>
                                
                            </td>
                            <td>{{\Carbon\Carbon::parse($teacher->created_at)->diffForHumans()}}</td>
                            <td>
                                @if ($teacher->status === 1)
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
                                    @can('update_techier')
                                        <button
                                            class="btn btn-icon btn-warning"
                                            wire:click="edit({{ $teacher->id }})"
                                            type="button"
                                            data-toggle="modal" data-target="#updateModal">
                                            <i class="feather icon-edit-2"></i></button>
                                    @endcan
                                    @can('destroy_techier')
                                        <button
                                            wire:click="delete({{ $teacher->id}},{{$teacher->user->id}})"
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
            {{$teachers->links()}}
        </div>
    </div>
</div>

<div>

    <br />


</div>
