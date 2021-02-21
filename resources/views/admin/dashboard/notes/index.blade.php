@extends('admin.init.index')
@section('title')
    Notas
@endsection
@section('content')
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <x-content title="Notas" position="Notas de por materias"></x-content>

             @livewire('notes')
        </div>
    </div>

@endsection
