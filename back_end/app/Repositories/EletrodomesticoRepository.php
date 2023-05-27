<?php

namespace App\Repositories;
use App\Models\Eletrodomestico;
use App\Contracts\Contract;
use Exception;

class EletrodomesticoRepository implements Contract {

    private $eletro;

    public function __construct()
    {
        $this->eletro = new Eletrodomestico();
    }

    public function get_all()
    {
        return $this->eletro->get();        
    }

    public function paginate($num_registers)
    {
        return $this->eletro->paginate($num_registers);
    }

    public function find($id)
    {
        return $this->eletro->find($id);
    }

    public function insert($dados)
    {

        $this->eletro->nome = $dados->nome;
        $this->eletro->descricao = $dados->descricao;
        $this->eletro->tensao = $dados->tensao;
        $this->eletro->marca_id = $dados->marca_id;
        return $this->eletro->save();

    }

    public function update($id, $dados)
    {

        $update = $this->find($id);

        $update->nome = $dados->nome;
        $update->descricao = $dados->descricao;
        $update->tensao = $dados->tensao;
        $update->marca_id = $dados->marca_id;

        return $update->save();
    }

    public function delete($id)
    {
        $delete = $this->find($id);

        return $delete->delete();
    }

    // Métodos especiais da classe

    /**
     * Busca de produto por marca ou produto
     */
    public function search($filtro)
    {

        $query = $this->eletro->select('eletrodomesticos.*', 'marcas.nome_marca')
                 ->join('marcas', 'marcas.id', '=', 'eletrodomesticos.marca_id');
            
        if ( !empty($filtro->marca) ) {
             $query->where('marcas.nome_marca', '=', $filtro->marca);
        }

        if ( !empty($filtro->nome_produto) ) {
            $query->where('eletrodomesticos.nome', 'like', "%$filtro->nome_produto%");
        } 

        return $query->get();
    }
}