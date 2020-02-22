@extends('layouts.app', ["current" => "home"])

@section('body')

<div class="jumbotron bg-light border border-secondary">
    <div class="row">
        <div class="card-deck">
            <div class="card border border-primary">
                <div class="card-body">
                    <h5 class="card-title">Tech Test</h5>
                    <p class="card=text">
                        Build an MVC application using PHP and a popular framework  
                        which will use the YouTube API on the server side to return a list of YouTube search results by an ajax call.
                    </p>
                    <a href="/search" class="btn btn-primary">Search</a>
                </div>
            </div>          
        </div>
    </div>
</div>

@endsection