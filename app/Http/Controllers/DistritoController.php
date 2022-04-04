<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Distrito;
use App\Models\Endereco;

class DistritoController extends Controller
{
    public function pesquisar(Request $request)
    {
        return Endereco::pesquisar($request);
    }
}
