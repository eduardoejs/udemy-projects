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

    <painel titulo="Lista de Usuários">

      <migalhas v-bind:lista="{{$listaMigalhas}}"></migalhas>

      <tabela-lista
        v-bind:titulos="['#', 'Nome', 'E-Mail']"
        v-bind:itens="{{json_encode($listaModelo)}}"
        criar="#novo" editar="/admin/usuarios/" deletar="/admin/usuarios/" detalhe="/admin/usuarios/" token="{{ csrf_token() }}"
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

  <modal nome="modalAdd" titulo="Adicionar novo usuario">
    <formulario id="formAdd" css="" action="{{ route('usuarios.store') }}" method="post" enctype="" token="{{ csrf_token() }}">
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
    </formulario>
    <span slot="botoes">
      <button form="formAdd" class="btn btn-primary">Adicionar</button>
    </span>
  </modal>

  <modal nome="modalEdit" titulo="Alterar usuário">
      <formulario id="formEdit" css="" v-bind:action="'/admin/usuarios/' + $store.state.item.id" method="put" enctype="" token="{{ csrf_token() }}">
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
      </formulario>
      <span slot="botoes">
        <button form="formEdit" class="btn btn-primary">Alterar</button>
      </span>
  </modal>

  <modal nome="modalDetail" v-bind:titulo="$store.state.item.name">
      <p>@{{$store.state.item.email}}</p><hr>
  </modal>
@endsection
