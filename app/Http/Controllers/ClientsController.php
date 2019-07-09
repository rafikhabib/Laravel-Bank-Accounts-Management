<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\client;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$clients = client::orderBy('prenom','asc')->get();
        $clients = client::orderBy('prenom','asc')->paginate(9);
        return view('clients.index')->with('clients',$clients);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nom' => 'required',
            'prenom'=>'required',
            'dateNaissance'=>'required|date',
            'adresse'=>'required',
            'tel'=>'required|digits:8',
            
        ]);
        $client = new client;
        $client->nom = $request->input('nom');
        $client->prenom = $request->input('prenom');
        $client->dateNaissance = $request->input('dateNaissance');
        $client->adresse = $request->input('adresse');
        $client->tel = $request->input('tel');
        $client->save();
        return redirect('/clients')->with('success','Client ajouté'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = client::find($id);
        return view('clients.show')->with('client',$client);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = client::find($id);
        return view('clients.edit')->with('client',$client);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nom' => 'required',
            'prenom'=>'required',
            'dateNaissance'=>'required|date',
            'adresse'=>'required',
            'tel'=>'required|digits:8',
            
        ]);
        $client = client::find($id);
        $client->nom = $request->input('nom');
        $client->prenom = $request->input('prenom');
        $client->dateNaissance = $request->input('dateNaissance');
        $client->adresse = $request->input('adresse');
        $client->tel = $request->input('tel');
        $client->save();
        //return view('clients.show')->with('client',$client); 
        return redirect("/clients/$client->id")->with('success','Client Modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = client::find($id);
        $client->delete();
        return redirect("/clients")->with('success','Client Supprimé');
    }
}
