@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>SINGOLO POST</h1>
                <h1>{{$post->title}}</h1>
                @if ($post->cover_image)
                <img src="{{ asset('storage/' . $post->cover_image)}}" alt="{{$post->title}}">
                @endif
                <p>{{$post->content}}</p>
                <p>CATEGORIA :
                    @if ($post->category) 
                    <a href='{{route('categories.show', ['slug' => $post->category->slug])}}'>
                        {{($post->category->name) ?? ''}}</a>
                    @else
                    - 
                    @endif
                </p>
                <p> TAG:
                   @forelse ($post->tags as $tag)
                        <a href="{{route('tags.show', ['slug'=> $tag->slug])}}">
                           {{$tag->name}}{{$loop->last ? '':','}}
                        </a>
                   @empty
                       -
                   @endforelse
                </p>
            </div>
        </div>
    </div>
@endsection