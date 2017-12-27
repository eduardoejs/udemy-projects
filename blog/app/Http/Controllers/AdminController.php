<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Artigo;

class AdminController extends Controller
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
          ['titulo' => 'Admin', 'url' => ''],
        ]);

        $totalUsuarios = User::count();
        $totalAutores = User::where('autor', '=', 'S')->count();
        $totalAdmins = User::where('admin', '=', 'S')->count();
        $totalArtigos = Artigo::count();
        $totalArtigosDeletados = Artigo::onlyTrashed()->whereNotNull('deleted_at')->count();

        return view('admin', compact('listaMigalhas', 'totalUsuarios', 'totalArtigos', 'totalAutores', 'totalAdmins', 'totalArtigosDeletados'));
    }
}
