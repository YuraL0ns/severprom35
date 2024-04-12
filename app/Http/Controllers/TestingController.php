<?php

namespace App\Http\Controllers;

class TestingController extends Controller
{
    public function home(){
        return view('templa.home.home');
    }
    public function cats(){}
    public function fullCard(){
        return view('templa.card.card');
    }
    public function user(){}
    public function basket(){}
    public function pages(){}
}
