@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <div class="h1">Laravel - Livewire CRUD</div>

        <div class="row">
            <div class="col-md-8">
                @livewire('contact-form')
                <hr>
                @livewire('contact-lists')
            </div>
        </div>
    </div>
@endsection
