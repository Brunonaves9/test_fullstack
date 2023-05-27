<?php
/**
 * Interface responsável pelos metodos obrigatórios
 */
namespace App\Contracts;

interface Contract {

    public function get_all();

    public function find($id);

    public function paginate($number_register);

    public function insert($request);

    public function update($id, $request);

    public function delete($id);

}