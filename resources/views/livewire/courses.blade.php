<div>
    @if(session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{session('message')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @include('admin.modals.courses.create')
    @include('admin.modals.courses.edit')
    <br />
    <table class="table nowrap mb-2 dataTable">
        <thead>
            <tr>
                <th>Image</th>
                <th>Nombre</th>
                <th>Descripciòn</th>
                <th>Carrera</th>
                <th>content</th>
                <th>Profesor</th>
                <th>Periodo Acàdemico</th>
                <th>Ciclo</th>
                <th>Materia</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
        	@foreach($courses as $data)
        	<tr>	
                <td>
                    <div class="d-inline-block align-middle">
                        <img src="{{$data->url_image}}" alt="user image" class="img-radius align-top m-r-15" style="width:40px;">
                    </div>
                </td>
        		<td>{{ $data->name }}</td>
                <td>{{ $data->description }}</td>
                <td>{{ $data->career }}</td>
                <td>{{ $data->content }}</td>
                <td>{{ $data->teacher->name}}</td>
                <td>{{ $data->academic_period->name }}</td>
                <td>{{ $data->level->name }}</td>
                <td>{{ $data->subject->name}}</td>
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
                    @can('update_course')
                    <div class="overlay-edit">
                        <button 
                            class="btn btn-icon btn-warning" 
                            wire:click="edit({{ $data->id }})"
                            type="button" 
                            data-toggle="modal" data-target="#updateModal">
                            <i class="feather icon-edit-2"></i></button>
                             @endcan

                            @can('destroy_course')
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
