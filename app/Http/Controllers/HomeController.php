<?php

namespace App\Http\Controllers;

use App\Models\Rehber;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $liste = Rehber::orderBy('id', 'desc')->get();
        return view('frontend.index', compact('liste'));
    }
    public function logout()
    {

        Auth::logout();
        return redirect('/');
    }




}
