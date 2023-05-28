import { http } from './config'

export default {

    listar: () => {
        return http.get('eletrodomestico')
    },

    ver: (id) => {
        return http.get('eletrodomestico/view/'+id)
    },

    insert: (produto) => {
        return http.post('eletrodomestico/salvar', produto)
    },

    editar: (id) => {
        return http.get('eletrodomestico/edit/'+id)
    },

    update: (produto) => {
        return http.post('eletrodomestico/update', produto)
    },

    listarMarcas: () => {
        return http.get('marcas')
    },

    deletar: (id) => {
        return http.post('eletrodomestico/delete', id)
    }

}