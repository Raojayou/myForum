@extends('layouts.app')

@section('content')
    @foreach($topics as $topic)
        <div class="container">
            <div class="row">
                <div class="card border-dark mb-3" style="max-width: 18rem;">
                    <div class="card-header text-center"><a href="/topics/{{ $topic['id'] }}">{{ $topic['title'] }}</a></div>
                </div>
            </div>
        </div>
    @endforeach
@endsection