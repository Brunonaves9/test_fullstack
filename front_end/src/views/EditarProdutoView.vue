<template>
    <div class="container">
        <h3 class="titulo">Editar Produtos</h3>
        <form @submit.prevent="salvar">
            <div class="row margin_bottom">
                <div class="col-sm-4">
                    <label>Marca</label>
                    <select class="form-control" id="marca" v-model="produto.marca_id">
                        <option value="">Selecione</option>
                        <option v-for="marca in marcas" :key="marca.id" :value="marca.id">{{ marca.nome_marca }}</option>
                    </select>
                </div>
                <div class="col-sm-4">
                    <label>Produto</label>
                    <input type="text" id="nome_produto" class="form-control" v-model="produto.nome">
                </div>                
                <div class="col-sm-4">
                    <label>Tensão</label>
                    <select class="form-control" id="tensao" v-model="produto.tensao">
                        <option value="">Selecione</option>
                        <option value="110V">110V</option>
                        <option value="220V">220V</option>
                    </select>
                </div>                
            </div>
            <div class="row margin_bottom">
                <div class="col">
                    <label>Descrição</label>
                    <input type="text" class="form-control" id="descricao" v-model="produto.descricao">
                </div>
            </div>
            <div class="row">
                <div class="col btn_center">
                    <input type="hidden" v-model="produto.id">
                    <button type="submit" id="salvar" class="btn btn-success salvar">Salvar</button>
                </div>
            </div>
        </form>

    </div>
</template>
<script>
import Produtos from '../services/produtos'
import Swal from 'sweetalert2'


export default {
    data(){
        return {
            produto: {
                id: '',
                nome: '',
                marca_id: '',
                tensao: '',
                descricao: ''
            },
            marcas: [],

        }
    },
    mounted(){
        Produtos.listarMarcas().then(response => {
            this.marcas = response.data.dados
        }),

        Produtos.editar(this.$route.params.id).then(response => {
            this.produto.id = response.data.dados.id
            this.produto.nome = response.data.dados.nome
            this.produto.marca_id = response.data.dados.marca_id
            this.produto.tensao = response.data.dados.tensao
            this.produto.descricao = response.data.dados.descricao
        })
    },

    methods: {
        salvar(){
            Produtos.update(this.produto).then(response => {

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
    }
}

</script>