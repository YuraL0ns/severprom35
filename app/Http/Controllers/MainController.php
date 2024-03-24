<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function homePage() {
       return view('theme.page.home');
    }


    public function getXmlTest()
    {
        $xmlContent = file_get_contents('https://cdn.wfp.org/iati/wfp.xml');

        $xml = simplexml_load_string($xmlContent);

        return view('test.xml', compact('xml'));

    }
}
