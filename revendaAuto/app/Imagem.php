<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagem extends Model
{
  protected $table = 'imagens';//como a classe está no singular tenho que informar o nome da tabela no banco que deve ser no plural
  protected $fillable = ['titulo', 'descricao', 'deletado'];

  public function arquivos()
  {
    return $this->hasMany(Arquivo::class);
  }

  public function galeriaUrl()
  {
    $url = asset($this->arquivos()->where('tamanho', '=', 'P')->first()->url);
    return $url;
  }

  public function pequenaUrl()
  {
    $url = asset($this->arquivos()->where('tamanho','=','P')->first()->url);
    return $url;
  }

  public function slideUrl()
  {
    $url = asset($this->arquivos()->where('tamanho','=','S')->first()->url);
    return $url;
  }
}
