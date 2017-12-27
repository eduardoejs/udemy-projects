@extends('layouts.app')

@section('content')

  <pagina tamanho="12">

    <painel titulo="Artigos">
      <div class="row">
        @foreach ($lista as $key => $artigo)
          <artigocard
          titulo="{{$artigo->titulo}}"
          descricao="{{$artigo->descricao}}"
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
