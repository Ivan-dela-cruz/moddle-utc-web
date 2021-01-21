@extends('admin.init.index')
@section('title')
    A.S.C
@endsection
@section('content')
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <x-content title="Vinculación" position="Actividades de Servicio a la Comunidad"></x-content>
            <div class="row">
                @livewire('cs-activities')
            </div>
        </div>
    </div>
@endsection
