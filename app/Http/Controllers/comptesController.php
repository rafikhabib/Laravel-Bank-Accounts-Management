<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\compte;
use App\client;

class comptesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comptes = Compte::orderBy('id','asc')->paginate(9);
        return view('comptes.index')->with('comptes',$comptes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = client::all();
        return view('comptes.create')->with('clients',$clients);
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
            'codeBanq' => 'required|digits:5',
            'codeGuichet'=>'required|digits:5',
            'rib'=>'required|digits:11',
            'clerib'=>'required|digits:2',
            'solde'=>'required',
            'titulaire'=>'',
            'devise'=>'required|max:3',
            
        ]);
        $compte = new compte;
        $compte->codeBanq = $request->input('codeBanq');
        $compte->codeGuichet = $request->input('codeGuichet');
        $compte->rib = $request->input('rib');
        $compte->clerib = $request->input('clerib');
        $compte->solde = $request->input('solde');
        $compte->titulaire = $request->input('item_id');
        $compte->devise = $request->input('devise');

        $compte->save();
        return redirect('/comptes')->with('success','Compte ajouté'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $compte = compte::find($id);
        return view('comptes.show')->with('compte',$compte);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clients = client::all();
        $compte = compte::find($id);
        $data = [
            'compte'  => $compte,
            'clients'   => $clients,
        ];
        return view('comptes.edit')->with($data);
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
            'codeBanq' => 'required|digits:5',
            'codeGuichet'=>'required|digits:5',
            'rib'=>'required|digits:11',
            'clerib'=>'required|digits:2',
            'solde'=>'required',
            'titulaire'=>'',
            'devise'=>'required|max:3',
            
        ]);
        $compte = compte::find($id);
        $compte->codeBanq = $request->input('codeBanq');
        $compte->codeGuichet = $request->input('codeGuichet');
        $compte->rib = $request->input('rib');
        $compte->clerib = $request->input('clerib');
        $compte->solde = $request->input('solde');
        $compte->titulaire = $request->input('item_id');
        $compte->devise = $request->input('devise');
        $compte->save();
        //return view('clients.show')->with('client',$client); 
        return redirect("/comptes/$compte->id")->with('success','Compte Modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $compte = compte::find($id);
        $compte->delete();
        return redirect("/comptes")->with('success','compte Supprimé');
    }

}
