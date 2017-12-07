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

    <painel titulo="Lista de Autores">

      <migalhas v-bind:lista="{{$listaMigalhas}}"></migalhas>

      <tabela-lista
        v-bind:titulos="['#', 'Nome', 'E-Mail']"
        v-bind:itens="{{json_encode($listaModelo)}}"
        criar="#novo" editar="/admin/autores/" deletar="" detalhe="/admin/autores/" token=""
        ordem="desc" ordemcol="2"
        modal="sim"
        >
      </tabela-lista>

      {{-- Paginacao no laravel 5.5 nao preciso chamar o metodo "$lista->links()" --}}
      <div align="center" class="">
        {{$listaModelo}}
      </div>
    </painel>

  </pagina>

  <modal nome="modalAdd" titulo="Adicionar novo autor">
    <formulario id="formAdd" css="" action="{{ route('autores.store') }}" method="post" enctype="" token="{{ csrf_token() }}">
      <div class="form-group">
        <label for="name">Nome</label>
        <input type="text" class="form-control" id="name" name="name" placeHolder="Name" value="{{old('name')}}">
      </div>
      <div class="form-group">
        <label for="email">E-Mail</label>
        <input type="email" class="form-control" id="email" name="email" placeHolder="Email" value="{{old('email')}}">
      </div>
      <div class="form-group">
        <label for="password">Senha</label>
        <input type="password" class="form-control" id="password" name="password" value="{{old('password')}}">
      </div>
      <div class="form-group">
        <label for="autor">Autor</label>
        <select id="autor" name="autor" class="form-control">
          <option {{(old('autor') && old('autor') == 'N' ? 'selected' : '')}} value="N">Não</option>
          <option {{(old('autor') && old('autor') == 'S' ? 'selected' : '')}} {{(!old('autor') ? 'selected' : '' )}} value="S">Sim</option>
        </select>
      </div>
    </formulario>
    <span slot="botoes">
      <button form="formAdd" class="btn btn-primary">Adicionar</button>
    </span>
  </modal>

  <modal nome="modalEdit" titulo="Alterar autor">
      <formulario id="formEdit" css="" v-bind:action="'/admin/autores/' + $store.state.item.id" method="put" enctype="" token="{{ csrf_token() }}">
        <div class="form-group">
          <label for="name">Nome</label>
          <input type="text" class="form-control" id="name" name="name" v-model="$store.state.item.name" placeHolder="Nome">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" id="email" name="email" v-model="$store.state.item.email" placeHolder="Email">
        </div>
        <div class="form-group">
          <label for="password">Senha</label>
          <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="form-group">
          <label for="autor">Autor</label>
          <select id="autor" name="autor" class="form-control" v-model="$store.state.item.autor">
            <option value="N">Não</option>
            <option value="S">Sim</option>
          </select>
        </div>
      </formulario>
      <span slot="botoes">
        <button form="formEdit" class="btn btn-primary">Alterar</button>
      </span>
  </modal>

  <modal nome="modalDetail" v-bind:titulo="$store.state.item.name">
      <p>@{{$store.state.item.email}}</p><hr>
  </modal>
@endsection
