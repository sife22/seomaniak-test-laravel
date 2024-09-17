@extends('layout')
@section('content')
<div class="p-5">
    <form class="m-5">
        <div class="form-group mb-3">
            <label for="">Nom</label>
            <input type="name" class="form-control" id="" aria-describedby="nameHelp" placeholder="Entrer le nom :">
        </div>
        <div class="form-group mb-3">
            <label for="">Téléphone</label>
            <input type="number" class="form-control" id="" placeholder="Entrer le téléphone : ">
        </div>
        <div class="form-group mb-3">
            <label for="">Email</label>
            <input type="email" class="form-control" id="" placeholder="Entrer l'email : ">
        </div>
        <button type="button" class="btn btn-primary mb-3">Ajouter</button>
    </form>
</div>
@endsection