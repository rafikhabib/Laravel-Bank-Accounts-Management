@extends('layouts.app')
@section('content')
    <h1> Liste Des Clients</h1>
    @if(count($clients)>0)
    <table class="table table-dark">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Nom</th>
            <th scope="col">Prenom</th>
            <th scope="col">Date de Naissance</th>
            <th scope="col">Adresse</th>
            <th scope="col">Tel</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($clients as $client )
            
        <tr  onclick="window.location='/dsibank/public/clients/{{$client->id}}';">
                <th scope="row">{{$client->id}}</th>
                <td><!--a href="/dsibank/public/clients/{{$client->id}}"></a-->{{$client->nom}}</td>
                <td>{{$client->prenom}}</td>
                <td>{{$client->dateNaissance}}</td>
                <td>{{$client->adresse}}</td>
                <td>{{$client->tel}}</td>
            </tr>
            
        @endforeach
      
    </tbody>
    </table>
    {{$clients->links()}}
    @else
        <p> No clients found </p>
    @endif
@endsection