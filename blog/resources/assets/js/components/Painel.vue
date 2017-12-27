<template>
  <div v-bind:class="defineCor">
      <div v-if="titulo" class="panel-heading">{{ titulo }}</div>

      <div class="panel-body">
          <slot></slot>
      </div>
  </div>
</template>

<script>
    export default {
        props:['titulo','cor'],
        computed:{
          defineCor:function(){
            return "panel "+ (this.cor || "panel-default");
          }
        }
    }
</script>

<style media="screen">
  .blue {
    border-color: #0d4a96;
  }

  .blue > .panel-heading {
    color: #c2c5c2;
    background-color: #0d4a96;
    border-color: #0d4a96;
  }

  .orange {
    border-color: #ec6414;
  }

  .orange > .panel-heading {
    color: #f7f7f7;
    background-color: #ec6414;
    border-color: #ec6414;
  }
</style>
