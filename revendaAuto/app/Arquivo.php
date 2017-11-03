<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Arquivo extends Model
{
  //nao preciso informar a tabela no banco de dados pois será adicionado um "s" no final de arquivo(s)
  protected $fillable = ['imagem_id', 'url', 'tamanho'];

  public function imagem()
  {
    return $this->belongsTo(Imagem::class);
  }
}
