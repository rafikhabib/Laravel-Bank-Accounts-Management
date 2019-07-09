@extends('layouts.app')
@section('content')
<a href="/dsibank/public/comptes" class="btn btn-default">Go Back</a>
<h1>Modifier compte</h1>
{!! Form::open(['action' => ['comptesController@update',$compte->id],'method' => 'POST']) !!}
 <div class="form-group">
        {{ Form::label('codeBanq', 'Code Banque') }} 
        {{ Form::text('codeBanq', $compte->codeBanq, ['class'=>'form-control','placeholder'=>'Saisir le codeBanq ici']) }}
        {{ Form::label('codeGuichet', 'Code Guichet') }} 
        {{ Form::text('codeGuichet', $compte->codeGuichet, ['class'=>'form-control','placeholder'=>'Saisir le codeGuichet ici']) }}
        {{ Form::label('rib', 'RIB') }} 
        {{ Form::text('rib',$compte->rib, ['class'=>'form-control','placeholder'=>'Saisir le rib ici']) }} 
        {{ Form::label('clerib', 'Cle Rib') }} 
        {{ Form::text('clerib', $compte->clerib, ['class'=>'form-control']) }}
        {{ Form::label('titulaire', 'Titulaire') }}
        <select class="form-control" name="item_id">
          @foreach($clients as $client)
            <option value="{{$client->id}}">{{$client->id}} - {{$client->nom}}</option>
          @endforeach
        </select>
        {{ Form::label('solde', 'Solde') }} 
        {{ Form::text('solde', $compte->solde, ['class'=>'form-control','placeholder'=>'Saisir le solde ici']) }}
        {{ Form::label('devise', 'Devise') }} 
        {{ Form::text('devise', $compte->devise, ['class'=>'form-control','placeholder'=>'Saisir le devise ici']) }}
     </div>
     {{Form::hidden('_method','PUT')}}
     {{ Form::submit('Modifier',['class' => 'btn btn-primary']) }} 
{!! Form::close() !!} 
@endsection