@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card-columns">
                        @foreach ($news as $new)
                            <div class="card">
                                <img class="card-img-top" src="{{ $new->urlToImage }}" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $new->title }}</h5>
                                    <p class="card-text">{{ $new->description }}</p>
                                    <p class="card-text"><small class="text-muted">{{ $new->publishedAt }}</small></p>
                                  </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
