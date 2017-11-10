@extends('layouts.app')

@section('content')

  <pagina tamanho="12">

    <painel titulo="Lista de Artigos">

      <migalhas v-bind:lista="{{$listaMigalhas}}"></migalhas>

      <tabela-lista
        v-bind:titulos="['#', 'Título', 'Descrição', 'Autor']"
        v-bind:itens="{{$listaArtigos}}"
        criar="#novo" editar="#edit" deletar="#deletar" detalhe="#detail" token=""
        ordem="desc" ordemcol="2"
        modal="sim"
        >
      </tabela-lista>

    </painel>

  </pagina>

  <modal nome="modalAdd">

    <painel titulo="Adicionar novo artigo" cor="">

      <formulario css="" action="#" method="post" ectype="multpart/form-data" token="1234567890">

        <div class="form-group">
          <label for="titulo">Título</label>
          <input type="text" class="form-control" id="titulo" name="titulo" placeHolder="Título">
        </div>
        <div class="form-group">
          <label for="descricao">Descrição</label>
          <input type="text" class="form-control" id="descricao" name="descricao" placeHolder="Descrição">
        </div>

        <button type="button" class="btn btn-info">Adicionar</button>

      </formulario>

    </painel>

  </modal>

  <modal nome="modalEdit">

    <painel titulo="Editar novo artigo" cor="">

      <formulario css="" action="#" method="post" ectype="multpart/form-data" token="1234567890">

        <div class="form-group">
          <label for="titulo">Título</label>
          <input type="text" class="form-control" id="titulo" name="titulo" placeHolder="Título">
        </div>
        <div class="form-group">
          <label for="descricao">Descrição</label>
          <input type="text" class="form-control" id="descricao" name="descricao" placeHolder="Descrição">
        </div>

        <button type="button" class="btn btn-info">Alterar</button>

      </formulario>

    </painel>

  </modal>

  <modal nome="modalDetail">

    <painel titulo="Detalhes do artigo" cor="">

      <formulario css="" action="#" method="post" ectype="multpart/form-data" token="1234567890">

        <div class="form-group">
          <label for="titulo">Título</label>
          <input type="text" class="form-control" id="titulo" name="titulo" placeHolder="Título">
        </div>
        <div class="form-group">
          <label for="descricao">Descrição</label>
          <input type="text" class="form-control" id="descricao" name="descricao" placeHolder="Descrição">
        </div>

        <button type="button" class="btn btn-info">Fechar</button>

      </formulario>

    </painel>

  </modal>
@endsection
