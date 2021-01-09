@extends('admin.init.index')
@section('title')
    Dashboard
@endsection
@section('content')
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <x-content title="Materias" position="Lista de materias"></x-content>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card user-profile-list">
                        <div class="card-header">
                            <h5> Lista de materias</h5>
                            @can('create_task')
                            <button class="btn btn-success btn-sm btn-round has-ripple float-lg-right"
                                 data-toggle="modal" data-target="#createModal">
                                <i class="feather icon-plus"></i>
                                Agregar
                            </button>
                            @endcan
                        </div>
                        <div class="card-body">
                            <div class="dt-responsive table-responsive">
                                @livewire('tasks')
                            </div>
                        </div>
                    </div>
                </div>
            </div
        </div>
    </div>
@endsection