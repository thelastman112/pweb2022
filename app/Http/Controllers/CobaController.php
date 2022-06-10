<?php

namespace App\Http\Controllers;

use App\Models\Coba;
use Illuminate\Http\Request;

class CobaController extends Controller
{
    function index()
    {
        $coba = Coba::all();
        return view('coba', ['coba' => $coba]);
    }

    function store(Request $request)
    {
        // dd($request);
        // $coba = new Coba();
        // $coba->coba = $request->coba;
        // $coba->save();

        Coba::create($request->all());
        return redirect('/coba');
    }
}
