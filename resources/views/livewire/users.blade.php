<div class="col-sm-12">
        @include('admin.modals.users.'.$view)


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
                        @can('create_user')
                            <button wire:click="create()"
                                    class="btn btn-success btn-sm btn-round has-ripple float-lg-right">
                                <i class="feather icon-plus"></i>
                                Agregar
                            </button>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class=" card user-profile-list">
        <div class="card-body">
            <div class="dt-responsive table-responsive">
                <table id="user-list-table" class="table nowrap dataTable">
                    <thead>
                    <tr>
                        <th>Nombres</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th>Registrado</th>
                        <th>Estado</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>
                                <div class="d-inline-block align-middle">

                                    <img src="{{asset($user->url_image)}}" alt="user image"
                                         class="img-radius align-top m-r-15" style="width:40px;">
                                    <div class="d-inline-block">
                                        <h6 class="m-b-0">{{$user->name}} {{$user->last_name}}</h6>
                                        <p class="m-b-0">{{$user->email}}</p>
                                    </div>
                                </div>
                            </td>
                            <td>{{$user->email}}</td>
                            <td>
                                @foreach($user->roles as $rol)
                                    <span class="badge badge-info"> {{$rol->name}}</span>
                                @endforeach
                            </td>
                            <td>{{$user->created_at->format('Y-m-d')}}</td>
                            <td>
                                @if ($user->status === 1)
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
                                    @can('update_user')
                                        <button
                                            class="btn btn-icon btn-warning"
                                            wire:click="edit({{ $user->id }})"
                                            type="button">
                                            <i class="feather icon-edit-2"></i></button>
                                    @endcan
                                    @can('destroy_user')
                                        <button
                                            wire:click="delete({{ $user->id }})"
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

            {{$users->links()}}
        </div>

    </div>
    @section('scripts')
        <script>
            $('#role').each(function () {
                $(this).select2({
                    placeholder: "{{__('Seleccione...')}}",
                    dropdownParent: $(this).parent()
                });
            });
            $('#role').on('change', function (e) {
                var data = $(this).select2("val");
            @this.set('roles_selected', data);
            });
            document.addEventListener("livewire:load", () => {
                Livewire.hook('message.processed', (message, component) => {
                    $('#role').each(function () {
                        $(this).select2({dropdownParent: $(this).parent()});
                    })
                });
            });
            window.livewire.on('showUpdate', () => {
                $('#updateModal').modal('show');
            });
            window.livewire.on('showCreate', () => {
                $('#createModal').modal('show');
            });
            window.livewire.on('modal', () => {
                $('#updateModal').modal('hide');
              //  $('#createModal').remove();
                //data-dismiss="modal"
            });
        </script>
    @endsection
</div>


