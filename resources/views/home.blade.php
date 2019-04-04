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
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#blade" role="tab" aria-controls="blade" aria-selected="true">Blade</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="vue-tab" data-toggle="tab" href="#vue" role="tab" aria-controls="vue" aria-selected="false">Vue.js</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade show active" id="blade" role="tabpanel" aria-labelledby="blade-tab">
            <nav class="navbar navbar-light bg-light pr-0">
                <form method="get" action="{{ route('home') }}" class="ml-auto form-inline">
                    <input class="form-control mr-2 col" type="search" placeholder="Search" aria-label="Search" name="search">
                    <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
                </form>
            </nav>
            <div class="card-columns">
                @foreach ($news as $new)
                    <a href="{{ $new->url }}" target="new_blank">
                        <div class="card  card-news mb-4">
                            <img class="card-img-top" src="@if($new->urlToImage) {{ $new->urlToImage }} @else https://www.unesale.com/ProductImages/Large/notfound.png @endif" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">{{ $new->title }}</h5>
                                <p class="card-text">{{ $new->description }}</p>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">{{ mb_strtoupper( date('d-M', strtotime($new->publishedAt))) }}</small>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
            <nav class="mt-4" aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    <li class="page-item @if($page == 1) disabled @endif">
                        <a class="page-link" href=" @if($page == 1) # @else {{ $search ? route('home', [$page - 1]).'?search='.$search : route('home', [$page - 1]) }} @endif " aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                    @if($page != 1)
                        <li class="page-item"><a class="page-link" href="{{ $search ? route('home', [$page - 1]).'?search='.$search : route('home', [$page - 1]) }}">{{ $page - 1 }}</a></li>
                    @endif
                    <li class="page-item active"><a class="page-link" href="#">{{ $page }}</a></li>
                    <li class="page-item"><a class="page-link" href="{{ $search ? route('home', [$page + 1]).'?search='.$search : route('home', [$page + 1]) }}">{{ $page + 1 }}</a></li>
                    @if($page == 1)
                        <li class="page-item"><a class="page-link" href="{{ $search ? route('home', [$page + 2]).'?search='.$search : route('home', [$page + 2]) }}">{{ $page + 2 }}</a></li>
                    @endif
                    <li class="page-item">
                    <a class="page-link" href="{{ $search ? route('home', [$page + 1]).'?search='.$search : route('home', [$page + 1]) }}" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                    </a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="tab-pane fade" id="vue" role="tabpanel" aria-labelledby="vue-tab">page vue.js</div>
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
    </div>
</div>
@endsection
