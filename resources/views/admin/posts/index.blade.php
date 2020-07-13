@extends('layouts.dashboard')
@section('content')
<div class='d-flex justify-content-between align-items-center'>
    <h1>Tabella Post</h1>
    <a class='btn btn-primary' href="{{route('admin.posts.create')}}"> Nuovo Post</a>
</div>
<table class="table table-dark">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Titolo</th>
        <th scope="col">Contenuto</th>
        <th class='text-right' scope="col">Azioni</th>
      </tr>
    </thead>
    <tbody>
        @forelse ($posts as $post)
        <tr>
            <th scope="row">{{$post->id}}</th>
            <td>{{$post->title}}</td>
            <td>{{$post->content}}</td>
            <td class='text-right'>
                <a class='btn btn-success' href="{{ route('admin.posts.show',['post' => $post->id])}}">Dettagli</a>
                <a class='btn btn-warning' href="">Modifica</a>
                <a class='btn btn-danger' href="">Elimina</a>
            </td>
        </tr>
        @empty
        <tr>
            <td>Non ci sono post!</td>
        </tr>
        @endforelse
    </tbody>
  </table>
@endsection

