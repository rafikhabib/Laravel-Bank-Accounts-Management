<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Compte;
use Yajra\DataTables\DataTables;

class compteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('compte.allcompte');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=[
            'codeBanq'=>$request['codebanq'],
            'codeGuichet'=>$request['codebanq'],
            'rib'=>$request['rib'],
            'clerib'=>$request['clerib'],
            'titulaire'=>$request['titulaire'],
            'solde'=>$request['solde'],
            'devise'=>$request['devise'],
        ];
        return Compte::create($data);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $compte=Compte::find($id);
        return $compte;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $compte=Compte::find($id);
        return $compte;
        //return response()->json($compte);
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
        
        $compte=Compte::find($id);
        $compte->codeBanq = $request['codeBanq'];
        $compte->codeGuichet = $request['codeGuichet'];
        $compte->rib = $request['rib'];
        $compte->clerib = $request['clerib'];
        $compte->solde = $request['solde'];
        $compte->titulaire = $request['item_id'];
        $compte->devise = $request['devise'];
        $compte->update();
        return $compte;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Compte::destroy($id);
    }

    public function allcompte()
    {
        $compte=Compte::all();
        return Datatables::of($compte)
          ->addColumn('action', function($compte){
             return '<a onclick="showData('.$compte->id.')" class="btn btn-sm btn-success">Show</a>'.' '. 
                    '<a onclick="editForm('.$compte->id.')" class="btn btn-sm btn-info">Edit</a>'.' '. 
                    '<a onclick="deleteData('.$compte->id.')" class="btn btn-sm btn-danger">Delete</a>';

        })->make(true);
    }
}

