<div>
    @if(session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{session('message')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @include('admin.modals.students.create')

    @include('admin.modals.students.edit')
    <br />

    <table id="user-list-table" class="table nowrap">
        <thead>
            <tr>
                <th>Nombres</th>
                <th>DNI</th>
                <th>Email</th>
                <th>Usuario</th>
                <th>Registrado</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
                <tr>
                    <td>
                        <div class="d-inline-block align-middle">
            
                            <img src="{{asset($student->url_image)}}" alt="user image" class="img-radius align-top m-r-15" style="width:40px;">
            
                    
                            <div class="d-inline-block">
                                <h6 class="m-b-0">{{$student->name}} {{$student->last_name}}</h6>
                                <p class="m-b-0">{{$student->email}}</p>
                            </div>
                        </div>
                    </td>
                    <td>{{$student->dni}}</td>
                    <td>{{$student->email}}</td>
                    <td>{{$student->user->name}}</td>
                    <td>{{$student->created_at}}</td>
                    <td>
                        @if ($student->status === 1)
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
                            <button 
                                class="btn btn-icon btn-warning" 
                                wire:click="edit({{ $student->id }})"
                                type="button" 
                                data-toggle="modal" data-target="#updateModal">
                                <i class="feather icon-edit-2"></i></button>
                                 
                            <button
                                wire:click="delete({{ $student->id }})"
                                data-toggle="tooltip" 
                                title="Titulo"
                                type="button"
                                class="btn btn-icon btn-danger">
                                <i class="feather icon-trash-2"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach
            
        </tbody>
        
    </table>
</div>
