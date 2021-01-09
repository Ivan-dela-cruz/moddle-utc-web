<div>
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
    <br />

    <table id="user-list-table" class="table nowrap">
        <thead>
            <tr>
                <th>Nombres</th>
                <th>DNI</th>
                <th>Email</th>
                <th>Usuario</th>
                <th>Profesiòn</th>
                <th>Registrado</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach($teachers as $teacher)
                <tr>
                    <td>
                        <div class="d-inline-block align-middle">
                            <img src="{{$teacher->url_image}}" alt="user image" class="img-radius align-top m-r-15" style="width:40px;">
                            <div class="d-inline-block">
                                <h6 class="m-b-0">{{$teacher->name}} {{$teacher->last_name}}</h6>
                                <p class="m-b-0">{{$teacher->email}}</p>
                            </div>
                        </div>
                    </td>
                    <td>{{$teacher->dni}}</td>
                    <td>{{$teacher->profession}}</td>
                    <td>{{$teacher->email}}</td>
                    <td>{{$teacher->user->name}}</td>
                    <td>{{$teacher->created_at}}</td>
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
                                wire:click="delete({{ $teacher->id }})"
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
