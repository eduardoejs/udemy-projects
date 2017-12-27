@extends('layouts.app')

@section('content')

  <pagina tamanho="10">

    <painel titulo="Dashboard" cor="">
      <migalhas v-bind:lista="{{$listaMigalhas}}"></migalhas>

      <div class="row">

        @can ('eAutor')
          <div class="col-md-4">
            <caixa qtde="{{$totalArtigos}}" titulo="Artigos" url="{{ route('artigos.index') }}" cor="orange" icone="ion ion-pie-graph"></caixa>
          </div>
        @endcan

        @can ('eAdmin')
          <div class="col-md-4">
            <caixa qtde="{{$totalUsuarios}}" titulo="Usuários" url="{{ route('usuarios.index') }}" cor="blue" icone="ion ion-person-stalker"></caixa>
          </div>

          <div class="col-md-4">
            <caixa qtde="{{$totalAutores}}" titulo="Autores" url="{{ route('autores.index') }}" cor="gray" icone="ion ion-person"></caixa>
          </div>

          <div class="col-md-4">
            <caixa qtde="{{$totalAdmins}}" titulo="Administradores" url="{{ route('adm.index') }}" cor="green" icone="ion ion-person"></caixa>
          </div>

          <div class="col-md-4">
            <caixa qtde="{{$totalArtigosDeletados}}" titulo="Artigos Excluídos" url="{{ route('artigos.excluidos') }}" cor="red" icone="ion ion-trash-a"></caixa>
          </div>
        @endcan

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
