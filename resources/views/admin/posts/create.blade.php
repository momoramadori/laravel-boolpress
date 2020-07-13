@extends('layouts.dashboard')
@section('content')
<form action="{{ route('admin.posts.store') }}" method="POST">
    @csrf
    <div class="form-group">
      <label for="titolo">TITOLO:</label>
      <input type="text"  name='title' class="form-control" id="titolo">
    </div>
    <div class="form-group">
      <label for="contenuto">CONTENUTO:</label>
      <textarea name="content" type="text" class="form-control" id="contenuto" placeholder="Inserire contenuto articolo..."></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Salva</button>
  </form>
@endsection