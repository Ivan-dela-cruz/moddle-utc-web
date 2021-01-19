@extends('admin.init.index')
@section('title')
    Dashboard
@endsection
@section('content')
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <x-content title="Materias" position="Lista de materias"></x-content>
            <div class="row">
                @livewire('subject')
            </div>
        </div>
    </div>
@endsection
