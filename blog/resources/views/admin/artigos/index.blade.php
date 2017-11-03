@extends('layouts.app')

@section('content')

  <pagina tamanho="12">

    <painel titulo="Lista de Artigos">
      <tabela-lista
        v-bind:titulos="['#', 'Título', 'Descrição', 'Autor']"
        v-bind:itens="[
                       [1,'PHP Orientado à Objetos', 'Curso de PHP OO', 'Eduardo JS'],
                       [2,'Vue JS', 'Curso de Vue JS', 'Jose da Silva'],
                       [3,'Laravel 5.x', 'Curso de Laravel Framework', 'Fulano'],
                       [4,'Ionic Intro', 'Introdução ao Ionic', 'Beltrano'],
                       [5,'ABC do Java', 'Tudo sobre Java', 'Cicrano'],
                      ]"
        criar="#criar" editar="#edit" deletar="#deletar" detalhe="#detail" token="13234564"
        ordem="desc" ordemcol="2"
        ></tabela-lista>
    </painel>
  </pagina>
@endsection
