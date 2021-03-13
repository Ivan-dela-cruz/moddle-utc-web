@extends('admin.init.index')
@section('title')
    Dashboard
@endsection
@section('content')
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <x-content title="Profesores" position="Lista de profesores"></x-content>
            <div class="row">
                @livewire('teachers')

            </div>
        </div>
    </div>
@endsection
