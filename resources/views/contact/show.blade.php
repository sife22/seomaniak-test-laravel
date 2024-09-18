@extends('layout')
@section('content')
<div class="p-5">
    <h2>Nom : {{ $contact->nom }}</h2>    
    <h2>Téléphone : {{ $contact->gsm }}</h2>    
    <h2>Email : {{ $contact->email }}</h2>    
</div>
@endsection