@extends('admin.init.index')
@section('title')
    Cursos
@endsection
@section('content')
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <x-content title="Archivos" position="Cursos"></x-content>
            <div class="row">
                <div class="col-lg-12">
                   
                    @livewire('files')
                            
                </div>
            </div
        </div>
    </div>
@endsection