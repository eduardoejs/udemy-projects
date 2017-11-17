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

  <modal nome="modalAdd" titulo="Adicionar novo artigo">
    <formulario id="formAdd" css="" action="#" method="put" ectype="multpart/form-data" token="1234567890">
      <div class="form-group">
        <label for="titulo">Título</label>
        <input type="text" class="form-control" id="titulo" name="titulo" placeHolder="Título">
      </div>
      <div class="form-group">
        <label for="descricao">Descrição</label>
        <input type="text" class="form-control" id="descricao" name="descricao" placeHolder="Descrição">
      </div>
    </formulario>
    <span slot="botoes">
      <button form="formAdd" class="btn btn-primary">Adicionar</button>
    </span>
  </modal>

  <modal nome="modalEdit" titulo="Alterar artigo">
      <formulario id="formEdit" css="" action="#" method="post" ectype="multpart/form-data" token="1234567890">
        <div class="form-group">
          <label for="titulo">Título</label>
          <input type="text" class="form-control" id="titulo" name="titulo" v-model="$store.state.item.titulo" placeHolder="Título">
        </div>
        <div class="form-group">
          <label for="descricao">Descrição</label>
          <input type="text" class="form-control" id="descricao" name="descricao" v-model="$store.state.item.descricao" placeHolder="Descrição">
        </div>
      </formulario>
      <span slot="botoes">
        <button form="formEdit" class="btn btn-primary">Alterar</button>
      </span>
  </modal>

  <modal nome="modalDetail" v-bind:titulo="$store.state.item.titulo">
      <p>@{{$store.state.item.descricao}}</p>
  </modal>
@endsection
