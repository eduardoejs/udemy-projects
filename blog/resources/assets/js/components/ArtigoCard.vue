<template>
  <div v-bind:class="'col-sm-' + (sm || '6') + ' col-md-' + (md || '4')">
    <div class="thumbnail">
      <img v-bind:src="'imagens/'+imagem" alt="img">
      <div class="caption">
        <small>{{data | formataData}} - {{autor}}</small>
        <h3>{{titulo}}</h3>
        <p style="height:100px" class="text-justify">{{descricao}}</p>
        <p><a v-bind:href="link" class="btn btn-primary" style="margin-top:5px" role="button">Leia mais</a></p>
      </div>
    </div>
  </div>
</template>

<script>
    export default {
      props: ['titulo', 'descricao', 'link', 'imagem', 'data', 'autor', 'sm', 'md'],
      filters:{
        formataData: function(value){
          if(!value) return '';
          value = value.toString();
          value = value.split('-');
          return value[2] +'/' + value[1] + '/' + value[0];
        }
      }
    }
</script>
