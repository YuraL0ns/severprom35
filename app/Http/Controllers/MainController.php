<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

class MainController extends Controller
{
    public function homePage() {
       return view('theme.page.home', [
        'categories' => Category::all()
       ]);
    }

}
