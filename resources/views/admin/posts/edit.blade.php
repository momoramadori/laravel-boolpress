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
<h1>MODIFICA POST</h1>
<form action="{{ route('admin.posts.update',['post'=> $post->id]) }}" method='POST' enctype='multipart/form-data'>
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="titolo">TITOLO:</label>
        <input type="text" name='title' class='form-control' id='titolo' value='{{ old('title', $post->title)}}'>   
    </div>
    <div class="form-group">
        <label for="contenuto">CONTENUTO:</label>
        <textarea type="text" name='content' class='form-control' id='titolo' >{{old('content', $post->content)}}</textarea> 
    </div>
    <div class="form-group">
        <label for="immagine">IMMAGINE:</label>
        <input type="file" name='image' id='immagine'>   
    </div>
    <div class="form-group">
        <label for="categoria">CATEGORIA:</label>
        <select name="category_id" id="categoria">
        <option value="">Seleziona categoria</option>
            @foreach ($categories as $category)
            <option value="{{$category->id}}" {{old('category_id',($post->category->id ?? '')) ==  $category->id ? 'selected' : ''}}>{{$category->name}}</option>
            @endforeach
        </select>
    </div>
    <div>
        <div class="row">
            @foreach ($tags as $tag)
            <div class="form-check">
            <input 
            @if ($errors->any() )
                {{in_array($tag->id,old('tags')) ? 'checked' :''}}
            @else
                {{$post->tags->contains($tag)? 'checked' : ''}}
            @endif
            id="checkbox" type="checkbox" value='{{$tag->id}}' name='tags[]' >
                <label for="checkbox">{{$tag->name}}</label>
            </div>
            @endforeach
        </div>
    </div>
    <button class='btn btn-primary' type='submit'>Salva</button>
</form>
@endsection