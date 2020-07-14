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
        <th scope="col">Categoria</th>
        <th class='text-right' scope="col">Azioni</th>
      </tr>
    </thead>
    <tbody>
        @forelse ($posts as $post)
        <tr>
            <th scope="row">{{$post->id}}</th>
            <td>{{$post->title}}</td>
            <td>{{$post->content}}</td>
            <td>{{($post->category->name ?? '')}}</td>
            <td class='text-right'>
                <a class='btn btn-success' href="{{ route('admin.posts.show',['post' => $post->id])}}">Dettagli</a>
                <a class='btn btn-warning' href="{{route('admin.posts.edit',['post' => $post->id])}}">Modifica</a>
                <form class= 'd-inline' action="{{route('admin.posts.destroy', ['post'=> $post->id])}}" method='POST'>
                    @csrf
                    @method('DELETE')
                    <input type='submit' class='btn btn-danger' value='Elimina'>
                </form>
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

