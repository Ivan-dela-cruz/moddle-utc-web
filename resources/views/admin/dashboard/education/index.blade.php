@extends('admin.init.index')
@section('title')
    Educación Continua
@endsection
@section('content')
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <x-content title="Educación Continua" position="Educación Continua"></x-content>
                @livewire('education')
        </div>
    </div>
@endsection
