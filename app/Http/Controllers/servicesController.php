<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\compte;
use App\client;
use DB;
class servicesController extends Controller
{
    public function index(){
        return view('pages.services');
    }
    public function fetch_data(Request $request){
        if($request->ajax()){
            $data = DB::table('comptes')->get();
            echo json_encode($data);
        }
    }
    
    public function verser(Request $request){
        $compte = compte::find($request->id);
        $compte->solde += $request->mont;
        $compte->save();

    }
    public function retrait(Request $request){
        $compte = compte::find($request->id);
        $compte->solde -= $request->mont;
        $compte->save();
    }
    public function tranfert(Request $request){
        $compte = compte::find($request->id);
        $ncompte = compte::find($request->idn);
        $compte->solde -= $request->mont;
        $compte->save();
        $ncompte->solde += $request->mont;       
        $ncompte2->save();
    }












    public function modal(){
        return view('modal');
    }
    
}
