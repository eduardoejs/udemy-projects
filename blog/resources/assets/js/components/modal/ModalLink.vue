<template>
  <span>
    <button v-if="!tipo || (tipo != 'button' && tipo != 'link')" type="button" v-bind:class="css || 'btn btn-primary'" data-toggle="modal" v-bind:data-target="'#' + nome"><span v-if="icon" v-bind:class="icon" aria-hidden="true"></span> {{titulo}}</button>
    <button v-if="tipo == 'button'" type="button" v-bind:class="css || 'btn btn-primary'" data-toggle="modal" v-bind:data-target="'#' + nome"><span v-if="icon" v-bind:class="icon" aria-hidden="true"></span> {{titulo}}</button>
    <a v-if="tipo == 'link'" href="#" v-bind:class="css || ''" data-toggle="modal" v-bind:data-target="'#' + nome"><span v-if="icon" v-bind:class="icon" aria-hidden="true"></span> {{titulo}}</a>
  </span>
</template>

<script>
    export default {
      props:['tipo','nome','titulo','css', 'icon']
    }
</script>
