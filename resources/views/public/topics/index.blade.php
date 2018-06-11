@extends('public.layouts.app')

@section('content')
    @foreach($topics as $topic)
        <div class="container">
            <div class="row">
                <div class="mx-auto">
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
    <div>
        <ul class="pagination justify-content-center">
            {{ $topics->links() }}
        </ul>
    </div>
@endsection