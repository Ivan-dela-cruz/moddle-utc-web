@extends('admin.init.index')
@section('title')
    Usuarios
@endsection
@section('content')
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <x-content title="Usuarios" position="Lista de usuarios"></x-content>
            <div class="row">
                @livewire('users')
            </div>
        </div>
    </div>
@endsection
