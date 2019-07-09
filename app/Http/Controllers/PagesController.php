<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\compte;
use App\client;
class PagesController extends Controller
{
    public function index()
        {
            $title ='Welcome to laravel';
            //return view('pages.index',compact('title'));
            return view('pages.index')->with('title',$title);

        }
    public function about()
        {
            $title ='About page';
            return view('pages.about')->with('title',$title);
        }
    public function services()
        {
            
            /*$data = array(
                'title' => 'page de services ',
                'services' => ['creation compte','versement','retrait','transfert d argent']
            );*/
            $comptes = compte::all();
            return view('pages.services')->with('comptes',$comptes);//->with($data);
        }
}
