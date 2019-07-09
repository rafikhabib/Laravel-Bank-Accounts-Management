@extends('layouts.app')
@section('content')
<a href="/dsibank/public/clients" class="btn btn-default">Go Back</a>
<h1>Modifier Client</h1>
{!! Form::open(['action' => ['ClientsController@update',$client->id],'method' => 'POST']) !!}
 <div class="form-group">
        {{ Form::label('nom', 'Nom') }} 
        {{ Form::text('nom', $client->nom, ['class'=>'form-control','placeholder'=>'Saisir le nom ici']) }}
        {{ Form::label('prenom', 'Prénom') }} 
        {{ Form::text('prenom',$client->prenom, ['class'=>'form-control','placeholder'=>'Saisir le prénom ici']) }} 
        {{ Form::label('dateNaissance', 'Date de Naissance') }} 
        {{ Form::date('dateNaissance', $client->dateNaissance, ['class'=>'form-control']) }}
        {{ Form::label('adresse', 'Adresse') }} 
        {{ Form::text('adresse', $client->adresse, ['class'=>'form-control','placeholder'=>'Saisir l\'adresse ici']) }}
        {{ Form::label('tel', 'Num Tel') }} 
        {{ Form::text('tel', $client->tel, ['class'=>'form-control','placeholder'=>'Saisir le num tel ici']) }}
     </div>
     {{Form::hidden('_method','PUT')}}
     {{ Form::submit('Modifier',['class' => 'btn btn-primary']) }} 
{!! Form::close() !!} 
@endsection