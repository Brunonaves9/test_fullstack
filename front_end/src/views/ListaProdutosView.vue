<template>
    <div class="container" rel="preload">
        <h3 class="titulo">Lista de Produtos</h3>
        <button class="btn btn-success novo"><router-link to="novo">Novo Produto</router-link></button>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Produto</th>
                <th scope="col">Marca</th>
                <th scope="col">Tensão</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="produto of produtos" :key="produto.id">
                <th scope="row">{{ produto.id }}</th>
                <td>{{ produto.nome }}</td>
                <td>{{ produto.nome_marca }}</td>
                <td>{{ produto.tensao }}</td>
                <td style="display: flex; justify-content: space-around;">
                    <button type="button" class="btn btn-sm btn-success">
                        <router-link :to="{name: 'ver', params: {id: produto.id} }">Ver</router-link>
                    </button>                    
                    <button type="button" class="btn btn-sm btn-primary">
                      <router-link :to="{name: 'editar', params: {id: produto.id} }">Editar</router-link>
                    </button>
                    <form @submit.prevent="deletar(produto.id)">
                      <input type="hidden" id="delete" v-model="produto.id">
                      <button type="submit" class="btn btn-sm btn-danger">Remover</button>
                    </form>
                </td>
              </tr>              
            </tbody>
          </table>
    </div>
    <div id="app"></div>
</template>
<script>
import Swal from 'sweetalert2'
import Produtos from '../services/produtos'

export default {

    data(){
        return {
            produtos: [],
            mensagem: '',
            delete: {
              id: ''
            }
        }
    },
    mounted(){
        Produtos.listar().then(response => {

            if (response.data.status == true) {
              if (response.data.dados === null) {
                Swal.fire({
                icon: 'warning',
                title: 'Sem Registros',
                text: response.data.mensagem
              }); 
              } else {
                this.produtos = response.data.dados
              }              
            } else  {
              Swal.fire({
                icon: 'warning',
                title: 'Erro ao buscar os registros.',
                text: response.data.mensagem
              }); 
            }
        })
    },
    methods: {
        deletar(id){
          console.log(id);
          this.delete.id = id

          Swal.fire({
            icon: 'warning',
            title: 'Remoção',
            text: 'Deseja Remover este registro?',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sim, remover!' 
          }).then((result) => {
            if (result.isConfirmed) {
              Produtos.deletar(this.delete).then(response => {

              if (response.data.status == true) {
                  Swal.fire({
                      icon: 'success',
                      title: 'Sucesso',
                      text: response.data.mensagem
                  }).then(function() {
                      window.location.href = '/lista'
                  });                   
                  
              } else {
                  Swal.fire({
                      icon: 'warning',
                      title: 'Erro',
                      text: response.data.mensagem
                  }); 
              }
              })
            }
          })            
        }
    }
}    

</script>