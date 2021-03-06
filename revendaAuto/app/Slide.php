<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
  protected $fillable = [
      'titulo', 'descricao', 'link', 'ordem', 'imagem_id', 'deletado'
  ];

  public function imagem()
  {
    return $this->belongsTo('App\Imagem');
  }

  public function getUrlAttribute($value)
  {
    $imagem = $this->imagem;
    $url = $imagem->arquivos()->where('tamanho', '=', 'S')->first()->url;
    return asset($url);
  }
}
