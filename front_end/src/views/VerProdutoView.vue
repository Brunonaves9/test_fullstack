<template>

    <div class="container">
        <h3 style="padding: 10px; text-align: center; margin: 10px">Ver Produto</h3>
        <ul class="lista_ver">
            <li><b>Nome:</b> {{ produto.nome }}</li>
            <li><b>Marca:</b> {{ produto.nome_marca }}</li>
            <li><b>Descrição:</b> {{ produto.descricao }}</li>
            <li><b>Tensão:</b> {{ produto.tensao }}</li>
        </ul>
    </div>

</template>

<script>

import Produtos from '../services/produtos'

export default {


    data(){
        return {
            produto: []
        }
    },
    mounted(){
        Produtos.ver(this.$route.params.id).then(response => {
            this.produto = response.data.dados
        })
    }
}

</script>