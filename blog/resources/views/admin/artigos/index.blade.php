@extends('layouts.app')

@section('content')

  <pagina tamanho="12">

    <painel titulo="Lista de Artigos">

      <migalhas v-bind:lista="{{$listaMigalhas}}"></migalhas>

      <modallink tipo='button' nome='modalAdd' titulo='Add' css='btn btn-success' icon='glyphicon glyphicon-plus'></modallink>

      <tabela-lista
        v-bind:titulos="['#', 'Título', 'Descrição', 'Autor']"
        v-bind:itens="{{$dados}}"
        criar="#novo" editar="#edit" deletar="#deletar" detalhe="#detail" token="13234564"
        ordem="desc" ordemcol="2"
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
@endsection
