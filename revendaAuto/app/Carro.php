<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carro extends Model
{
    protected $fillable = [
        'titulo', 'descricao', 'ano', 'valor', 'marca_id'
    ];

    public function marca()
    {
      return $this->belongsTo('App\Marca');
    }

    public function categorias()
    {
      return $this->belongsToMany('App\Categoria');
    }

    public function usuarios()
    {
      return $this->belongsToMany('App\User');
    }

    public function imagens()
    {
      return $this->hasMany('App\Galeria');
    }

    //Mutator: formatando o campo valor
    public function getTextoValorAttribute($value)
    {
      //$valor = "R$ ".number_format($value, 2, ",", ".");
      $valor = "R$ ".number_format($this->valor, 2, ",", ".");
      return $valor;
    }

    public function getTextoCategoriasAttribute($value)
    {
      $categorias = $this->categorias;//busco as categorias atraves do relacionamento acima
      $texto = "";
      foreach ($categorias as $key => $value) {
        if($key == 0){ //primeiro elemento
          $texto .= $value->titulo;
        }else{ //para os demais valores coloco virgula e espaço para ir concatenando
          $texto .= ", ".$value->titulo;
        }
      }
      return $texto;
    }
}
