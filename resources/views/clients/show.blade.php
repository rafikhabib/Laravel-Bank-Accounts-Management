@extends('layouts.app')
@section('content')
<a href="/dsibank/public/clients" class="btn btn-default">Go Back</a>
<h1>{{$client->nom}}</h1>
<ul class="list-group">
    <li class="list-group-item">Name : {{$client->nom}}</li>
    <li class="list-group-item">Prenom : {{$client->prenom}}</li>
    <li class="list-group-item">Date De Naissance : {{$client->dateNaissance}}</li>
    <li class="list-group-item">Adresse : {{$client->adresse}}</li>
    <li class="list-group-item">Tel : {{$client->tel}}</li>
    <hr>
  </ul>
  <a href="/dsibank/public/clients/{{$client->id}}/edit", class="btn btn-primary">Modifier</a>

  {{Form::open(['action'=>['ClientsController@destroy', $client->id], 'method'=> 'POST','class'=>'float-right'])}}
    {{Form::hidden('_method','DELETE')}}
    {{Form::submit('Supprimer',['class'=> 'btn btn-danger'])}}
  {{Form::close()}}
@endsection