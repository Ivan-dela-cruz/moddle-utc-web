@extends('admin.init.index')
@section('title')
    P.P.P
@endsection
@section('content')
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <x-content title="Vinculación" position="Prácticas Pre Profesionales"></x-content>
            <div class="row">
                @livewire('practices')
            </div>
        </div>
    </div>
@endsection
