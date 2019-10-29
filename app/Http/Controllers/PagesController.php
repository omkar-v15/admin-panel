<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home(){
        return view('pages.home');
    }

    public function about(){
        return view('pages.about');
    }

    public function users(){
        return view('pages.users');
    }

    public function transaction(){
        return view('pages.transaction');
    }
}
