@extends('layouts.app')

@section('content')

  <pagina tamanho="10">

    <painel titulo="Dashboard" cor="">
      <migalhas v-bind:lista="{{$listaMigalhas}}"></migalhas>

      <div class="row">

        <div class="col-md-4">
          <caixa qtde="{{$totalArtigos}}" titulo="Artigos" url="{{ route('artigos.index') }}" cor="orange" icone="ion ion-pie-graph"></caixa>
        </div>

        <div class="col-md-4">
          <caixa qtde="{{$totalUsuarios}}" titulo="Usuários" url="{{ route('usuarios.index') }}" cor="blue" icone="ion ion-person-stalker"></caixa>
        </div>

        <div class="col-md-4">
          <caixa qtde="{{$totalAutores}}" titulo="Autores" url="{{ route('autores.index') }}" cor="red" icone="ion ion-person"></caixa>
        </div>

      </div>

      <!--
      <painel titulo="Painel 1" cor="orange">
        Teste de Conteúdo ...
      </painel>

      <painel titulo="Painel 2" cor="blue">
        Teste de Conteúdo ...
      </painel>
    -->
    </painel>
  </pagina>

@endsection