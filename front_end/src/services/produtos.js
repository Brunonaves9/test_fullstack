import { http } from './config'

export default {

    listar: () => {
        return http.get('eletrodomestico')
    },

    ver: (id) => {
        return http.get('eletrodomestico/view/'+id)
    },

    create: () => {

    },

    insert: (produto) => {
        return http.post('eletrodomestico/salvar', produto)
    },

    editar: () => {

    },

    update: () => {

    },

    listarMarcas: () => {
        return http.get('marcas')
    }

}