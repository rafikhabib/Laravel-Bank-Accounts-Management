@extends('layouts.app')
@section('content')
<a href="/dsibank/public/comptes" class="btn btn-default">Go Back</a>
<h1>{{$compte->id}} - {{$compte->rib}}</h1>
<ul class="list-group">
    <li class="list-group-item">Code Banque : {{$compte->codeBanq}}</li>
    <li class="list-group-item">Code Guichet : {{$compte->codeGuichet}}</li>
    <li class="list-group-item">RIB : {{$compte->rib}}</li>
    <li class="list-group-item">Cle RIB : {{$compte->clerib}}</li>
    <li class="list-group-item">Titulaire : {{$compte->titulaire}}</li>
    <li class="list-group-item">Solde : {{$compte->solde}}</li>
    <li class="list-group-item">Devise : {{$compte->devise}}</li>
    <hr>
  </ul>
  <a href="/dsibank/public/comptes/{{$compte->id}}/edit", class="btn btn-primary">Modifier</a>

  {{Form::open(['action'=>['comptesController@destroy', $compte->id], 'method'=> 'POST','class'=>'float-right'])}}
    {{Form::hidden('_method','DELETE')}}
    {{Form::submit('Supprimer',['class'=> 'btn btn-danger'])}}
  {{Form::close()}}
@endsection