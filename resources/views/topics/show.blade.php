@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="card border-success mb-3 mx-auto" style="max-width: 18rem;">
                <div class="card-header">
                    <p class="title">{{ $topic['title'] }}</p>
                </div>

                <div class="card-body">
                    <p class="content">{{ $topic['content'] }}</p>
                </div>

                <div class="card-footer">
                    <p class="category">{{ $topic['category'] }}</p>
                </div>

                <p class="created_at">{{ $topic->created_at->toFormattedDateString() }}</p>
            </div>
        </div>
    </div>
@endsection