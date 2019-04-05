@extends('layouts.app')
@section('content')
<div class="container justify-content-center">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="php-tab" data-toggle="tab" href="#php" role="tab" aria-controls="php" aria-selected="true">PHP</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="vue-tab" data-toggle="tab" href="#vue" role="tab" aria-controls="vue" aria-selected="false">Vue.js</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade show active" id="php" role="tabpanel" aria-labelledby="php-tab">
            @include('index-php')
        </div>
        <div class="tab-pane fade" id="vue" role="tabpanel" aria-labelledby="vue-tab">page vue.js</div>
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
    </div>
</div>
@endsection
