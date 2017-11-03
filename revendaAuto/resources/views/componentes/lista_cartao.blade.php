<div class="row">
  @foreach($lista as $key => $value)
    <div class="col s12 m{{$tamanho}}">
      @component('componentes.cartao',[
        'titulo'=>$value->titulo,
        'descricao'=>$value->descricao,
        'imagem'=>$value->imagens()->where('deletado','=','N')->orderBy('ordem')->first()->imagem->pequenaUrl(),
        'valor'=>$value->textoValor,
        'url'=> route('site.detalhe', ['id' => $value->id, 'titulo' => str_slug($value->titulo)])]
        )

      @endcomponent
    </div>
  @endforeach

</div>
