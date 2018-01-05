@extends('layouts.app')

@section('content')

  <pagina tamanho="12">

    <painel titulo="Artigos">

      <p>
        <form class="form-inline text-center" action="{{route('site')}}" method="get">
          <input type="search" class="form-control" name="busca" placeHolder="Buscar" value="{{isset($busca) ? $busca : ''}}">
          <button class="btn btn-info">Buscar</button>
        </form>
      </p>

      <div class="row">
        @foreach ($lista as $key => $artigo)
          <artigocard
          titulo="{{$artigo->titulo}}"
          descricao="{{str_limit($artigo->descricao, 140, '...')}}"
          link="{{route('artigo', [$artigo->id, str_slug($artigo->titulo)])}}"
          imagem="img.jpg"
          data="{{$artigo->data}}"
          autor="{{$artigo->autor}}"
          sm="6"
          md="4"
          ></artigocard>
        @endforeach
      </div>
      <div align="center" class="">
        {{$lista}}
      </div>
    </painel>
  </pagina>
@endsection
