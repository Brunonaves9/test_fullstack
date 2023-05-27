<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MarcaService;

class MarcaController extends Controller
{

    private $marcaService;

    public function __construct()
    {
        $this->marcaService = new MarcaService();
    }

    public function get_marcas() {
        $marcas = $this->marcaService->get_marcas();

        if ($marcas->status == TRUE) {
            return $marcas;
        }

        return response()->json($marcas);

    }
}
