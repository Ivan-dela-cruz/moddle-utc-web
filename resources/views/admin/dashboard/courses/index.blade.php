@extends('admin.init.index')
@section('title')
    Cursos
@endsection
@section('content')
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <x-content title="Cursos" position="Cursos"></x-content>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card user-profile-list">
                        <div class="card-header">
                            <h5> Listado de cursos</h5>
                            @can('create_course')
                            <button class="btn btn-success btn-sm btn-round has-ripple float-lg-right"
                                 data-toggle="modal" data-target="#createModal">
                                <i class="feather icon-plus"></i>
                                Agregar
                            </button>
                            @endcan
                        </div>
                        <div class="card-body">
                            <div class="dt-responsive table-responsive">
                                @livewire('courses')
                            </div>
                        </div>
                    </div>
                </div>
            </div
        </div>
    </div>
@endsection