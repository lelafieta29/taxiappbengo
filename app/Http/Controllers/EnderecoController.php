<?php

namespace App\Http\Controllers;

use App\Models\Distrito;
use App\Models\Endereco;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EnderecoController extends Controller
{
    public function index()
    {
        $enderecos = Endereco::orderBy('created_at', 'desc')->with('distrito.municipio.provincia')->get();

        return response([
            'enderecos' => $enderecos
        ]);
    }

    public function show($id)
    {
        $enderecos = Endereco::where('id', $id)->orderBy('created_at', 'desc')->with('distrito.municipio.provincia')->first()->get();

        return response([
            'enderecos' => $enderecos
        ]);
    }

    public function pesquisar($value)
    {
        /*$enderecos = DB::table('enderecos')
            ->join('distritos', 'enderecos.distrito_id', '=', 'distritos.id')
            ->join('municipios', 'distritos.municipio_id', '=', 'municipios.id')
            ->join('provincias', 'municipios.provincia_id', '=', 'provincias.id')
            ->where('distritos.nome', 'like', '%' . $request->nome . '%')
            ->get();
        */

        $enderecos = Endereco::where('nome', 'like', '%' . $value . '%')->with('distrito.municipio.provincia')->get();

        return response(['enderecos' => $enderecos]);
    }
}
