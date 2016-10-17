<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Words;


class DefaultController extends Controller
{
    public function ____construct()
    {

    }
    public function index()
    {
        $words = new Words();
        return view('home', ['words' => $words->get()]);
    }
    public function getHash(Request $request)
    {
        $words = new Words();
        $hashResult = $words->getHash($request);
        return view('home', ['words' => $words->get(), 'hashResult' => $hashResult]);
    }
}
