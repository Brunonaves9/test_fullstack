<template>
    <div class="container">
        <h3 class="titulo">Cadastrar Produtos</h3>
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
                nome: '',
                marca_id: '',
                tensao: '',
                descricao: ''
            },
            marcas: []
        }
    },
    mounted(){
        Produtos.listarMarcas().then(response => {
            this.marcas = response.data.dados
        });
    },

    methods: {
        salvar(){
            Produtos.insert(this.produto).then(response => {

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