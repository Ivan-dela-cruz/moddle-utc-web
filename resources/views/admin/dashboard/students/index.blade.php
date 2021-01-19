@extends('admin.init.index')
@section('title')
    Estudiantes
@endsection
@section('content')
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <x-content title="Estudiantes" position="Lista de estudiates"></x-content>
            <div class="row">
                @livewire('students')
            </div>
        </div>
    </div>
@endsection
