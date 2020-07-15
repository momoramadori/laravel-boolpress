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
  <h1>CREA POST</h1>
  <form action="{{ route('admin.posts.store') }}" method='POST'>
    @csrf
    <div class="form-group">
        <label for="titolo">TITOLO:</label>
        <input type="text" name='title' class='form-control' id='titolo' value="{{ old('title')}}">   
    </div>
    <div class="form-group">
        <label for="contenuto">CONTENUTO:</label>
        <textarea type="text" name='content' class='form-control' id='titolo' placeholder="Inserire contenuto articolo...">{{old('content')}}</textarea> 
    </div>
    <div class="form-group">
        <label for="categoria">CATEGORIA:</label>
        <select name="category_id" id="categoria">
        <option value="">Seleziona categoria</option>
            @foreach ($categories as $category)
            <option value="{{$category->id}}" {{old('category_id') == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
            @endforeach
        </select>
    </div>
    <button class='btn btn-primary' type='submit'>Salva</button>
</form>
@endsection