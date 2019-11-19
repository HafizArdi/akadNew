<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\laporan;
use App\komen;

class HomeController extends Controller{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        return view('home');
    }

    public function dashboard(){
        if (Auth::User()->level=='1') {
            $view=laporan::orderBy('created_at','DESC')->get();
            $lihat=komen::orderBy('posttime','asc')->get();
  
            return view ('dashboardAdmin', compact('view','lihat'));

        }else if(Auth::User()->level=='2') {
            $view=laporan::orderBy('created_at','DESC')->get();
            $lihat=komen::orderBy('posttime','asc')->get();

            return view ('dashboardKades',compact('view','lihat'));

        }else if(Auth::User()->level=='3') {
            $view=laporan::WHERE('status',2)->orderBy('created_at','DESC')->get();
            $lihat=komen::orderBy('posttime','asc')->get();
     
            return view ('dashboardGuest',compact('view','lihat'));
        }
    }
}
