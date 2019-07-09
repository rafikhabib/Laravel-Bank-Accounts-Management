@extends('layouts.app')
@section('content')
    <h1> Liste Des Comptes</h1>
    @if(count($comptes)>0)
    <table class="table table-dark">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Code Banque</th>
            <th scope="col">Code Guichet</th>
            <th scope="col">RIB</th>
            <th scope="col">Cle Rib</th>
            <th scope="col">Titulaire</th>
            <th scope="col">Solde</th>
            <th scope="col">Devise</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($comptes as $compte )
        <!--a href="/dsibank/public/comptes/{{$compte->id}}"-->
        <tr onclick="window.location='/dsibank/public/comptes/{{$compte->id}}';">
                <th scope="row">{{$compte->id}}</th>
                <td>{{$compte->codeBanq}}</td>
                <td>{{$compte->codeGuichet}}</td>
                <td>{{$compte->rib}}</td>
                <td>{{$compte->clerib}}</td>
                <td>{{$compte->titulaire}}</td>
                <td>{{$compte->solde}}</td>
                <td>{{$compte->devise}}</td>
            </tr>
        <!--/a-->
        @endforeach
      
    </tbody>
    </table>
    {{$comptes->links()}}
    @else
        <p> No comptes found </p>
    @endif
@endsection