@extends('layouts.app')

@section('content')

  <pagina tamanho="12">

    <painel titulo="Artigos">
      <div class="row">

        <artigocard
        titulo="Thumbnail label"
        descricao="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque iaculis pulvinar tellus non eleifend. Mauris eu lacus ut libero sagittis scelerisque id vel arcu. Sed porttitor, ante tempor commodo euismod."
        link="#"
        imagem="img.jpg"
        data="21/12/2017"
        autor="Eduardo"
        sm="6"
        md="4"
        ></artigocard>

        <artigocard
        titulo="Título Teste"
        descricao="Lorem ipsum dolor sit amet."
        link="#"
        imagem="img.jpg"
        data="21/12/2017"
        autor="Eduardo"
        sm="6"
        md="4"
        ></artigocard>

      </div>
    </painel>

  </pagina>

@endsection
