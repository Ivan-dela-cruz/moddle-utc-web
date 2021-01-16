<div>
    @if(session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{session('message')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @include('admin.modals.periods.create')
    @include('admin.modals.periods.edit')
    <br />
    <table class="table nowrap mb-2 dataTable">
        <thead>
            <tr>
                <th>Periodo</th>
                <th>Inico</th>
                <th>Fin</th>
                <th>Image</th>
                <th>Estado</th>
            </tr>
        </thead>

        <tbody>
        	@foreach($periods as $data)
        	<tr>	
        		<td>{{ $data->name }}</td>
                <td>{{ $data->start_date }}</td>
                <td>{{ $data->end_date }}</td>
                <td>   <img src="{{asset($data->url_image)}}" alt="user image" class="img-radius align-top m-r-15" style="width:40px;"> </td>
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
                        @can('update_ac_period')
                            <button 
                                class="btn btn-icon btn-warning" 
                                wire:click="edit({{ $data->id }})"
                                type="button" 
                                data-toggle="modal" data-target="#updateModal">
                                <i class="feather icon-edit-2"></i>
                            </button>
                         @endcan
                        @can('destroy_ac_period')    
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
