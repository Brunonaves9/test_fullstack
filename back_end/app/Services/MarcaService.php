<?php

namespace App\Services;
use App\Repositories\MarcaRepository;
use Exception;

class MarcaService {

    private $marca;

    public function __construct()
    {
        $this->marca = new MarcaRepository();
    }

    public function get_marcas()
    {
        try {
        $marcas = $this->marca->get_all_marcas();

        if ( !empty($marcas) ) {
            return (object) [
                'status'   => TRUE,
                'mensagem' => NULL,
                'dados'    => $marcas
            ];
        }

        return (object) [
            'status'   => TRUE,
            'mensagem' => 'Não há marcas cadastradas',
            'dados'    => NULL
        ];

        } catch (Exception $e) {
            return (object) [
                'status' => FALSE,
                'mensagem' => 'Falha na busca de marcas, contate o suporte.'
            ];
        }

    }

}