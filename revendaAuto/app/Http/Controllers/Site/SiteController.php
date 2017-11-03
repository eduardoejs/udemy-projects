<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Carro;
use App\Slide;

class SiteController extends Controller
{
    public function home()
    {
      $slides = Slide::where('deletado','=','N')->orderBy('ordem')->get();
      $carros = Carro::orderBy('updated_at', 'desc')->get();

      return view('site.home',compact('slides','carros'));
    }

    public function detalhe($id, $titulo = null)
    {
      $carro = Carro::find($id);
      if(str_slug($carro->titulo) == $titulo){
        return view('site.detalhe', compact('carro'));
      }else{
        return redirect()->route('site.home');
      }
    }
}
