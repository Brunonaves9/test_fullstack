<?php
namespace App\Services;

use App\Repositories\EletrodomesticoRepository;
use Exception;

class EletrodomesticoService {

    private $eletroRepository;
    private $data;

    public function __construct()
    {
        $this->eletroRepository = new EletrodomesticoRepository();
    }

    public function get()
    {
        try {
            $this->data = $this->eletroRepository->get_all();

            if ( !empty($this->data) ) {
                return response()->json([
                    'status'   => TRUE,
                    'mensagem' => NULL,
                    'dados'    => $this->data
                ]);
            }

            return response()->json([
                'status'   => TRUE,
                'mensagem' => 'Sem registros.',
                'dados'    => NULL
            ]);

        } catch (Exception $e) {
            return response()->json([
                'status'   => FALSE,
                'mensagem' => $e->getMessage(),
                'dados'    => NULL
            ]);
        }
        
    }

    public function paginate($number_register) {
        try {

            $this->data = $this->eletroRepository->paginate($number_register);

            if ( !empty($this->data) ) {
                return response()->json([
                    'status'   => TRUE,
                    'mensagem' => NULL,
                    'dados'    => $this->data
                ]);
            }

            return response()->json([
                'status'   => TRUE,
                'mensagem' => 'Sem registros.',
                'dados'    => NULL
            ]);

        } catch (Exception $e) {
            return response()->json([
                'status'   => FALSE,
                'mensagem' => 'Erro ao ao buscar registros, contate o suporte.',
                'dados'    => NULL
            ]);
        }
        
    }

    public function get_eletrodomestico_by_id($id)
    {
        try {

            $this->data = $this->eletroRepository->find($id);

            if ( !empty($this->data) ) {
                return response()->json([
                    'status'   => TRUE,
                    'mensagem' => NULL,
                    'dados'    => $this->data
                ]);
            }

            return response()->json([
                'status'   => TRUE,
                'mensagem' => 'Não foi encontrato o registro',
                'dados'    => NULL
            ]);

        } catch (Exception $e) {
            return response()->json([
                'status'   => FALSE,
                'mensagem' => 'Erro ao ao buscar registro, contate o suporte.',
                'dados'    => NULL
            ]);
        }
    }

    public function salvar_registro($dados)
    {
        try {
            
            $this->eletroRepository->insert($dados);

            return response()->json([
                'status'   => TRUE,
                'mensagem' => 'Eletrodoméstico cadastrado com sucesso!'
            ]);

        } catch (Exception $e) {
            return response()->json([
                'status'   => FALSE,
                'mensagem' => 'Erro ao cadastrar Eletrodoméstico, contate o suporte.'
            ]);
        }
    }

    public function update($id, $dados)
    {
        try {
            
            $this->eletroRepository->update($id, $dados);

            return response()->json([
                'status'   => TRUE,
                'mensagem' => 'Eletrodoméstico alterado com sucesso!'
            ]);

        } catch (Exception $e) {
            return response()->json([
                'status'   => FALSE,
                'mensagem' => 'Erro ao alterar Eletrodoméstico, contate o suporte.'
            ]);
        }
    }

    public function delete($id)
    {
        try {

            $this->eletroRepository->delete($id);

            return response()->json([
                'status'   => TRUE,
                'mensagem' => 'Eletrodoméstico removido com sucesso!'
            ]);

        } catch (Exception $e) {
            return response()->json([
                'status'   => FALSE,
                'mensagem' => 'Erro ao remover Eletrodoméstico, contate o suporte.'
            ]);
        }
    }


    public function buscar($dados)
    {
        try {

            $this->data = $this->eletroRepository->search($dados);

            if ( !empty($this->data) ) {
                return response()->json([
                    'status'   => TRUE,
                    'mensagem' => NULL,
                    'dados'    => $this->data
                ]);
            }

            return response()->json([
                'status'   => TRUE,
                'mensagem' => 'Não foi encontrato o registro',
                'dados'    => NULL
            ]);

        } catch (Exception $e) {
            return response()->json([
                'status'   => FALSE,
                'mensagem' => $e->getMessage()
            ]);
        }
    }

}