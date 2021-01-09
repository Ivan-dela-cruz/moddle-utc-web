<div>
    {{-- Success is as dangerous as failure. --}}
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
<br />
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
