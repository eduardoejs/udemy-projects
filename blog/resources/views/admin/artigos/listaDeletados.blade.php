@extends('layouts.app')

@section('content')

  <pagina tamanho="12">

    <painel titulo="Lista de Artigos">

      <migalhas v-bind:lista="{{$listaMigalhas}}"></migalhas>

      <tabela-lista
        v-bind:titulos="['#', 'Título', 'Descrição', 'Autor', 'Data']"
        v-bind:itens="{{json_encode($listaArtigos)}}"
        criar="" editar="" deletar="/admin/trashed/artigos/delete/" detalhe="" token="{{ csrf_token() }}"
        ordem="asc" ordemcol="0"
        modal=""
        >
      </tabela-lista>

      {{-- Paginacao no laravel 5.5 nao preciso chamar o metodo "$lista->links()" --}}
      <div align="center" class="">
        {{$listaArtigos}}
      </div>
    </painel>

  </pagina>


@endsection
