@extends('layouts.app')
@section('content')
<a href="/dsibank/public/comptes" class="btn btn-default">Go Back</a>
<h1>Ajouter Compte</h1>
<script>
   var rib=Math.floor(Math.random()*(99999999999 - 10000000000) + 10000000000);
   var codeg=Math.floor(Math.random()*(99999 - 10000) + 10000);
   var codeb=Math.floor(Math.random()*(99999 - 10000) + 10000);
   var cle_rib=Math.floor(Math.random()*(99 - 10) + 10);
   $(document).ready(function(){
      $("#rib").val(rib);
      $("#codeGuichet").val(codeg);
      $("#codeBanq").val(codeb);
      $("#clerib").val(cle_rib);
   });
</script>
{!! Form::open(['action' => 'comptesController@store','method' => 'POST']) !!}
 <div class="form-group">
        {{ Form::label('codeBanq', 'Code Banque') }} 
        {{ Form::text('codeBanq', '', ['class'=>'form-control','id'=>'codeBanq','placeholder'=>'Saisir le code Banque ici']) }}
        {{ Form::label('codeGuichet', 'Code Guichet') }} 
        {{ Form::text('codeGuichet', '', ['class'=>'form-control','id'=>'codeGuichet','placeholder'=>'Saisir le codeGuichet ici']) }} 
        {{ Form::label('rib', 'RIB') }} 
        {{ Form::text('rib', '', ['class'=>'form-control','id'=>'rib']) }}
        {{ Form::label('clerib', 'Cle Rib') }} 
        {{ Form::text('clerib', '', ['class'=>'form-control','id'=>'clerib','placeholder'=>'Saisir clerib ici']) }}
        {{ Form::label('titulaire', 'Titulaire') }}
            <select class="form-control" name="item_id">
              @foreach($clients as $client)
                <option value="{{$client->id}}">{{$client->id}} - {{$client->nom}}</option>
              @endforeach
            </select>
        {{ Form::label('solde', 'Solde') }} 
        {{ Form::text('solde', '', ['class'=>'form-control','placeholder'=>'Saisir le solde ici']) }}
        {{ Form::label('devise', 'Devise') }} 
        {{ Form::text('devise', '', ['class'=>'form-control','placeholder'=>'Saisir le devise ici']) }}
     </div>
     {{ Form::submit('Ajouter',['class' => 'btn btn-primary']) }} 
{!! Form::close() !!} 
@endsection