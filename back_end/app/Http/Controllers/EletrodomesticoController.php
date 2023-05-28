<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\EletrodomesticoService;

class EletrodomesticoController extends Controller
{

    private $eletrodomestico;
    private $data = array();

    public function __construct()
    {
        $this->eletrodomestico = new EletrodomesticoService();
    }

    /**
     * Busca os eletrodomesticos cadastrados
     */
    public function index()
    {
        return $this->eletrodomestico->get();
    }

    /**
     * Retorna o eletrodoméstico
     */
    public function show($id)
    {
        return $this->eletrodomestico->get_eletrodomestico_by_id($id);
    }


    /**
     * Realiza a inserção de um novo eletrodoméstico
     */
    public function store(Request $request)
    {

        $request->validate([
            'nome'      => 'required',
            'descricao' => 'required',
            'tensao'    => 'required',
            'marca_id'  => 'required'
        ]);

        $this->data = (object) [
            'nome'      => $request->nome,
            'descricao' => $request->descricao,
            'tensao'    => $request->tensao,
            'marca_id'  => $request->marca_id
        ];

        return $this->eletrodomestico->salvar_registro($this->data);

    }

    /**
     * Busca o Registro para a tela de edição
     */
    public function edit($id)
    {
        return $this->eletrodomestico->get_eletrodomestico_by_id($id);
    }

    /**
     * Realiza a alteração do eletrodomestico
     */
    public function update(Request $request)
    {
        $request->validate([
            'nome'      => 'required',
            'descricao' => 'required',
            'tensao'    => 'required',
            'marca_id'  => 'required'
        ]);

        $this->data = (object) [
            'nome'      => $request->nome,
            'descricao' => $request->descricao,
            'tensao'    => $request->tensao,
            'marca_id'  => $request->marca_id
        ];

        return $this->eletrodomestico->update($request->id, $this->data);

    }

    /**
     * Remove o Eletrodoméstico
     */
    public function delete(Request $request)
    {

        return $this->eletrodomestico->delete($request->id);

    }

    public function busca(Request $request)
    {
        $filtro = (object) [
            'marca'        => $request->marca,
            'nome_produto' => $request->nome_produto
        ];

        return $this->eletrodomestico->buscar($filtro);
    }
}
