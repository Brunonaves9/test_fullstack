<?php

namespace App\Repositories;

use App\Models\Marca;

class MarcaRepository {

    private $marca;

    public function __construct()
    {
        $this->marca = new Marca();   
    }

    public function get_all_marcas()
    {
        return $this->marca->get();
    }


}