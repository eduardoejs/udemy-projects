<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Artigo;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaMigalhas = json_encode([
          ['titulo' => 'Home', 'url' => ''],
        ]);

        $totalUsuarios = User::count();
        $totalAutores = User::where('autor', '=', 'S')->count();
        $totalArtigos = Artigo::count();

        return view('home', compact('listaMigalhas', 'totalUsuarios', 'totalArtigos', 'totalAutores'));
    }
}
