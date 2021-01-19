@extends('admin.init.index')
@section('title')
    Dashboard
@endsection
@section('content')
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <x-content title="Ciclos" position="Ciclos acadèmicos"></x-content>
            <div class="row">
                @livewire('levels')

            </div>
        </div>
    </div>
@endsection
