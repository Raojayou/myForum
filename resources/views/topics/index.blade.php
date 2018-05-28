@extends('layouts.app')

@section('content')
    @foreach($topics as $topic)
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="card" style="width: 35rem;">
                            <div class="card-body">
                                <a href="/topics/{{ $topic['id'] }}">{{ $topic['title'] }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection