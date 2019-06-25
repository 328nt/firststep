<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class TestController extends Controller
{
    public function contact($nameR, $emailR, $mobileR){
        // return view('page/contact') -> with('nameV', $nameR);
        return view('page/contact', compact('nameR', 'emailR', 'mobileR'));
    }
}
