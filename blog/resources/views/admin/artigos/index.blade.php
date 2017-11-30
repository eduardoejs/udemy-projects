@extends('layouts.app')

@section('content')

  <pagina tamanho="12">

    @if ($errors->all())
      <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        @foreach ($errors->all() as $key => $value)
          <li><strong>{{$value}}</strong></li>
        @endforeach
      </div>
    @endif

    <painel titulo="Lista de Artigos">

      <migalhas v-bind:lista="{{$listaMigalhas}}"></migalhas>

      <tabela-lista
        v-bind:titulos="['#', 'Título', 'Descrição', 'Autor', 'Data']"
        v-bind:itens="{{json_encode($listaArtigos)}}"
        criar="#novo" editar="/admin/artigos/" deletar="/admin/artigos/" detalhe="/admin/artigos/" token="{{ csrf_token() }}"
        ordem="desc" ordemcol="2"
        modal="sim"
        >
      </tabela-lista>

      {{-- Paginacao no laravel 5.5 nao preciso chamar o metodo "$lista->links()" --}}
      <div align="center" class="">
        {{$listaArtigos}}
      </div>
    </painel>

  </pagina>

  <modal nome="modalAdd" titulo="Adicionar novo artigo">
    <formulario id="formAdd" css="" action="{{ route('artigos.store') }}" method="post" enctype="" token="{{ csrf_token() }}">
      <div class="form-group">
        <label for="titulo">Título</label>
        <input type="text" class="form-control" id="titulo" name="titulo" placeHolder="Título" value="{{old('titulo')}}">
      </div>
      <div class="form-group">
        <label for="descricao">Descrição</label>
        <input type="text" class="form-control" id="descricao" name="descricao" placeHolder="Descrição" value="{{old('descricao')}}">
      </div>
      <div class="form-group">
        <label for="conteudo">Conteúdo</label>
        <textarea id="conteudo" name="conteudo" class="form-control">{{old('conteudo')}}</textarea>
      </div>
      <div class="form-group">
        <label for="autor">Autor</label>
        <input type="text" class="form-control" id="autor" name="autor" placeHolder="Autor" value="{{old('autor')}}">
      </div>
      <div class="form-group">
        <label for="data">Data</label>
        <input type="datetime-local" class="form-control" id="data" name="data" value="{{old('data')}}">
      </div>
    </formulario>
    <span slot="botoes">
      <button form="formAdd" class="btn btn-primary">Adicionar</button>
    </span>
  </modal>

  <modal nome="modalEdit" titulo="Alterar artigo">
      <formulario id="formEdit" css="" v-bind:action="'/admin/artigos/' + $store.state.item.id" method="put" enctype="" token="{{ csrf_token() }}">
        <div class="form-group">
          <label for="titulo">Título</label>
          <input type="text" class="form-control" id="titulo" name="titulo" v-model="$store.state.item.titulo" placeHolder="Título">
        </div>
        <div class="form-group">
          <label for="descricao">Descrição</label>
          <input type="text" class="form-control" id="descricao" name="descricao" v-model="$store.state.item.descricao" placeHolder="Descrição">
        </div>
        <div class="form-group">
          <label for="conteudo">Conteúdo</label>
          <textarea id="conteudo" name="conteudo" class="form-control" v-model="$store.state.item.conteudo"></textarea>
        </div>
        <div class="form-group">
          <label for="autor">Autor</label>
          <input type="text" class="form-control" id="autor" name="autor" placeHolder="Autor" v-model="$store.state.item.autor">
        </div>
        <div class="form-group">
          <label for="data">Data</label>
          <input type="datetime-local" class="form-control" id="data" name="data" v-model="$store.state.item.data">
        </div>
      </formulario>
      <span slot="botoes">
        <button form="formEdit" class="btn btn-primary">Alterar</button>
      </span>
  </modal>

  <modal nome="modalDetail" v-bind:titulo="$store.state.item.titulo">
      <p>@{{$store.state.item.descricao}}</p><hr>
      <p>@{{$store.state.item.conteudo}}</p>
  </modal>
@endsection
