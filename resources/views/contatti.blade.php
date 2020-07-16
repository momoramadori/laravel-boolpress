@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Contattaci!</h1>
            <form action="{{route('contact.store')}}" method='POST' enctype='multipart/form-data'>
            @csrf
            <div class="form-group">
                <input type="text" class='form-control'  name='name' placeholder="Nome e Cognome">   
            </div>
            <div class="form-group">
                <input type="email" name='email' class='form-control' placeholder="Inserisci email"> 
            </div>
            <div class="form-group">
                <textarea type="email" name='message' class='form-control'  placeholder="Inserire contenuto messaggio..."></textarea> 
            </div>
            <button class='btn btn-success' type='submit'>Invia messaggio</button>
            </form>
        </div>
    </div>
</div>

@endsection