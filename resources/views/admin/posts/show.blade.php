@extends('layouts.dashboard')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>POST CON ID {{$post->id}}</h1>
                <p>
                    <span class="font-weight-bold"> TITOLO: </span>
                    {{$post->title}}
                </p>
                @if ($post->cover_image)
                <img src="{{ asset('storage/' . $post->cover_image)}}" alt="{{$post->title}}">
                @endif
                <p>
                    <span class="font-weight-bold"> CONTENUTO: </span>
                    {{$post->content}}
                </p>
                <p> 
                    <span class="font-weight-bold"> SLUG: </span>
                    {{$post->slug}}
                </p>
                <p>
                    <p> 
                        <span class="font-weight-bold"> TAG: </span>
                        @forelse ($post->tags as $tag)
                            {{$tag->name}}{{$loop->last ? '':','}}
                        @empty
                            -
                        @endforelse
                     </p>
                </p>
                <p> 
                    <span class="font-weight-bold"> CATEGORIA: </span>
                    {{($post->category->name ?? '')}}
                </p>
                <p>
                    <span class="font-weight-bold"> DATA CREAZIONE: </span>
                    {{$post->created_at}}
                </p>
                <p>
                    <span class="font-weight-bold"> DATA ULTIMO AGGIORNAMENTO: </span>
                    {{$post->updated_at}}
                </p>
            </div>
        </div>
    </div>
@endsection