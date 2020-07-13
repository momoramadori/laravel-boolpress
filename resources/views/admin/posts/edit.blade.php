@extends('layouts.dashboard')
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('admin.posts.update',['post'=> $post->id]) }}" method='POST'>
    @csrf
    @method('PUT')
<input type="text" name='title' class='form-control' id='titolo' value='{{old('title', $post->title)}}'>
<input type="text" name='content' class='form-control' id='titolo' value='{{old('content', $post->content)}}'>
<button type='submit'>Salva</button>
</form>
{{-- <form action="{{ route('admin.posts.update',['post'=> $post->id]) }}">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label for="titolo">TITOLO:</label>
      <input type="text"  name='title' class="form-control" id="titolo" value={{old('title', $post->title)}}>
    </div>
    <div class="form-group">
      <label for="contenuto">CONTENUTO:</label>
      <textarea name="content" type="text" class="form-control" id="contenuto" placeholder="Inserire contenuto articolo...">
        {{old('content', $post->content) }}
      </textarea>
    </div>
    <button type="submit" class="btn btn-primary">Salva</button>
  </form>  --}}
@endsection