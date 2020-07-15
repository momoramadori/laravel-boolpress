@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>SINGOLO POST</h1>
                <h1>{{$post->title}}</h1>
                <p>{{$post->content}}</p>
                <p>CATEGORIA :
                    @if ($post->category) 
                    <a href='{{route('categories.show', ['slug' => $post->category->slug])}}'>
                        {{($post->category->name) ?? ''}}</a>
                    @else
                    - 
                    @endif
                </p>
            </div>
        </div>
    </div>
@endsection