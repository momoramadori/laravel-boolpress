@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>TAG: {{$tag->name}}</h1>
                <p>
                    <ul>
                        @foreach ($posts as $post)
                            <li><a href="{{route('posts.show', ['slug'=>$post->slug])}}">{{$post->title}}</a></li>
                        @endforeach
                    </ul>
                </p>
            </div>
        </div>
    </div>
@endsection