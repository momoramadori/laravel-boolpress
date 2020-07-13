@extends('layouts.dashboard')
@section('content')
<table class="table table-dark">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Titolo</th>
        <th scope="col">Contenuto</th>
        <th scope="col">Azioni</th>
      </tr>
    </thead>
    <tbody>
        @forelse ($posts as $post)
        <tr>
            <th scope="row">{{$post->id}}</th>
            <td>{{$post->title}}</td>
            <td>{{$post->content}}</td>
            <td>
                <a class='btn btn-default' href="">Dettagli</a>
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

