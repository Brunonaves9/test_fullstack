<template>
    <div class="container">
        <h3 style="padding: 10px; text-align: center; margin: 10px">Lista de Produtos</h3>
        <button class="btn btn-success"><router-link to="novo">Novo Produto</router-link></button>
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
                    <button type="button" class="btn btn-sm btn-primary">Editar</button>
                    <button type="button" class="btn btn-sm btn-danger">Remover</button>
                </td>
              </tr>              
            </tbody>
          </table>
    </div>
    <div id="app"></div>
</template>
<script>
import Produtos from '../services/produtos'

export default {

    data(){
        return {
            produtos: []
        }
    },
    mounted(){
        Produtos.listar().then(response => {
            console.log(response)
            this.produtos = response.data.dados
        })
    }
}    

</script>