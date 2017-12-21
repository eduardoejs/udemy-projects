<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Artigo extends Model
{
    use SoftDeletes;

    protected $fillable = ['titulo', 'descricao', 'conteudo', 'autor', 'data'];

    protected $dates = ['deleted_at'];

    public function user()
    {
      return $this->belongsTo('App\User');
    }

    public static function listaArtigos($paginate)
    {
      /*$listaArtigos = Artigo::select('id', 'titulo', 'descricao', 'user_id', 'data')->paginate($paginate);

      //resgato o nome do usuario relacionado ao artigo
      foreach ($listaArtigos as $key => $artigo) {
        $artigo->user_id = User::find($artigo->user_id)->name;
        //ou
        //$artigo->user_id = $artigo->user->name;
        //unset($artigo->user);
      }*/

      $listaArtigos = DB::table('artigos')
                      ->join('users', 'users.id', '=', 'artigos.user_id')
                      ->select('artigos.id', 'artigos.titulo', 'artigos.descricao', 'users.name', 'artigos.data')
                      ->whereNull('deleted_at')
                      ->paginate($paginate);

      return $listaArtigos;
    }

    public static function listaArtigosDeletados($paginate)
    {
      /*$listaArtigos = DB::table('artigos')
                          ->select('id', 'titulo', 'descricao', 'autor', 'data')
                          ->whereNotNull('deleted_at')
                          ->paginate($paginate);
      */
      $listaArtigos = Artigo::onlyTrashed()
                        ->select('id', 'titulo', 'descricao', 'autor', 'data')
                        ->whereNotNull('deleted_at')
                        ->paginate($paginate);
      return $listaArtigos;
    }
}
