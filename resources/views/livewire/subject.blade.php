<div>
    @if(session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{session('message')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @include('admin.modals.subjects.create')

    @include('admin.modals.subjects.edit')
    <br />
    <table class="table  nowrap mb-2 dataTable">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Ciclo</th>
                <th>Estado</th>
            </tr>
        </thead>

        <tbody>
        	@foreach($subjects as $data)
        	<tr>	
        		<td>{{ $data->name }}</td>
                <td>{{ $data->description }}</td>
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
                        <button 
                            class="btn btn-icon btn-warning" 
                            wire:click="edit({{ $data->id }})"
                            type="button" 
                            data-toggle="modal" data-target="#updateModal">
                            <i class="feather icon-edit-2"></i></button>
                             
                        <button
                            wire:click="delete({{ $data->id }})"
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
