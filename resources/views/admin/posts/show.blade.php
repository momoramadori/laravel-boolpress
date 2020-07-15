@extends('layouts.dashboard')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>SINGOLO POST</h1>
                <p>
                    <span class="font-weight-bold"> ID: </span>
                    {{$post->id}}
                </p>
                <p>
                    <span class="font-weight-bold"> TITOLO: </span>
                    {{$post->title}}
                </p>
                <p>
                    <span class="font-weight-bold"> CONTENUTO: </span>
                    {{$post->content}}
                </p>
                <p> 
                    <span class="font-weight-bold"> SLUG: </span>
                    {{$post->slug}}
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