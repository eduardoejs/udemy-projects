<template>
  <div>

    <div class="form-inline">
      <a class="btn btn-primary" v-if="criar && !modal" v-bind:href="criar">Novo</a>

      <modallink v-if="criar && modal" tipo='button' nome='modalAdd' titulo='Add' css='btn btn-success' icon='glyphicon glyphicon-plus'></modallink>

      <div class="form-group pull-right">
        <input type="search" class="form-control" placeholder="Buscar" v-model="buscar">
      </div>
    </div>

    <table class="table table-striped table-hover">
      <thead>
        <tr>
          <th style="cursor:pointer" v-on:click="ordenaColuna(index)" v-for="(titulo,index) in titulos">{{titulo}}</th>
          <th v-if="detalhe || editar || deletar">Ação</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(item,index) in lista">
          <td v-for="i in item">{{i | formataData}}</td>

          <td v-if="detalhe || editar || deletar">

            <form v-bind:id="index" v-if="deletar && token" v-bind:action="deletar + item.id" method="post">
              <input type="hidden" name="_method" value="DELETE">
              <input type="hidden" name="_token" v-bind:value="token">

              <a v-if="detalhe && !modal" v-bind:href="detalhe">Detalhe |</a>
              <modallink v-if="detalhe && modal" v-bind:item="item" v-bind:url="detalhe" tipo='link' nome='modalDetail' titulo='Detalhe |' icon='glyphicon glyphicon-new-window'></modallink>

              <a v-if="editar && !modal" v-bind:href="editar"> Editar |</a>
              <modallink v-if="editar && modal" v-bind:item="item" v-bind:url="editar" tipo='link' nome='modalEdit' titulo='Editar |' icon='glyphicon glyphicon-edit'></modallink>

              <a href="#" v-on:click="executaForm(index)"><span v-if="modal" class="glyphicon glyphicon-trash" aria-hidden="true"></span> Deletar</a>
            </form>

            <span v-if="!token">
              <a v-if="detalhe && !modal" v-bind:href="detalhe">Detalhe |</a>
              <modallink v-if="detalhe && modal" v-bind:item="item" v-bind:url="detalhe" tipo='link' nome='modalDetail' titulo='Detalhe |' icon='glyphicon glyphicon-new-window'></modallink>

              <a v-if="editar && !modal" v-bind:href="editar"> Editar |</a>
              <modallink v-if="editar && modal" v-bind:item="item" v-bind:url="editar" tipo='link' nome='modalEdit' titulo='Editar |' icon='glyphicon glyphicon-edit'></modallink>

              <a v-if="deletar" v-bind:href="deletar"><span v-if="modal" class="glyphicon glyphicon-trash" aria-hidden="true"></span> Deletar</a>
            </span>

            <span v-if="token && !deletar">
              <a v-if="detalhe && !modal" v-bind:href="detalhe">Detalhe |</a>
              <modallink v-if="detalhe && modal" v-bind:item="item" v-bind:url="detalhe" tipo='link' nome='modalDetail' titulo='Detalhe |' icon='glyphicon glyphicon-new-window'></modallink>

              <a v-if="editar && !modal" v-bind:href="editar"> Editar</a>
              <modallink v-if="editar && modal" v-bind:item="item" v-bind:url="editar" tipo='link' nome='modalEdit' titulo='Editar' icon='glyphicon glyphicon-edit'></modallink>
            </span>

          </td>
        </tr>

      </tbody>

    </table>

  </div>

</template>

<script>
    export default {
      props:['titulos','itens','criar','detalhe','editar','deletar','token', 'ordem', 'ordemcol', 'modal'],
      data: function(){
        return{
            buscar:'',
            ordemAux: this.ordem || "asc",
            ordemAuxCol: this.ordemCol || 0
        }
      },
      methods:{
        executaForm: function(index){
          document.getElementById(index).submit();
        },
        ordenaColuna: function(coluna){
          this.ordemAuxCol = coluna;
          if(this.ordemAux.toLowerCase() == "asc"){
            this.ordemAux = 'desc';
          }else {
            this.ordemAux = 'asc';
          }
        }
      },
      filters:{
        formataData: function(value){

          if(!value) return '';

          value = value.toString();
          if(value.split('-').length == 3){
            value = value.split('-');
            return value[2] +'/' + value[1] + '/' + value[0];
          }

          return value;
        }
      },
      computed:{
        lista:function(){

          let lista = this.itens.data;
          let ordem = this.ordemAux;
          let ordemCol = this.ordemAuxCol;
          ordem = ordem.toLowerCase();
          ordemCol = parseInt(ordemCol);

          if(ordem == "asc"){
            lista.sort(function(a,b){
              if(Object.values(a)[ordemCol] > Object.values(b)[ordemCol]) { return 1; }
              if(Object.values(a)[ordemCol] < Object.values(b)[ordemCol]) { return -1; }
              return 0;
            });
          }else{
            lista.sort(function(a,b){
              if(Object.values(a)[ordemCol] < Object.values(b)[ordemCol]) { return 1; }
              if(Object.values(a)[ordemCol] > Object.values(b)[ordemCol]) { return -1; }
              return 0;
            });
          }

          if(this.buscar){
            return lista.filter(res => {
              res = Object.values(res);
              for(let k = 0; k < res.length; k++){
                if((res[k] + "").toLowerCase().indexOf(this.buscar.toLowerCase()) >= 0){
                  return true;
                }
              }
              return false;
            });
          }

          return lista;
        }
      }
    }
</script>
