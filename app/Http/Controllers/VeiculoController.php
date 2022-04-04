<?php

namespace App\Http\Controllers;

use App\Models\Veiculo;
use Illuminate\Http\Request;
use App\Http\Requests\VeiculoRequest;

class VeiculoController extends Controller
{
    public function index()
    {                                                          // ->where('empresa_transportes_id', auth()->user()->motorista->empresa_transportes_id)
        $veiculos = Veiculo::orderBy('created_at', 'desc')->with('empresa_transportes.user')->get();
        return response([
            'veiculos' => $veiculos,
        ], 200);
    }

    public function veiculosEmpresa($empresa_id)
    {
        $veiculos = Veiculo::orderBy('created_at', 'desc')->with('motorista')->where('empresa_transportes_id', $empresa_id)->get();
        return response([
            'veiculos' => $veiculos,
        ], 200);
    }

    public function create()
    {
        //
    }

    public function store(VeiculoRequest $request)
    {
        Veiculo::create($request->all());

        return response([
            'message' => 'Veículo criada com sucesso.',

        ], 200);
    }

    public function show($id)
    {
        $veiculos = Veiculo::orderBy('created_at', 'desc')->with('empresaTransportes')->where('empresa_transportes_id', $id)->get();
        return response([
            'veiculos' => $veiculos,
        ], 200);
    }

    public function edit($id)
    {
        //
    }

    public function update(VeiculoRequest $request, $id)
    {
        $veiculo = Veiculo::find($id);

        if (!$veiculo) {
            return response([
                'message' => 'Veículo não existe.',
            ], 403);
        }

        $veiculo->update($request->all());

        return response([
            'veiculo' => $veiculo,
            'message' => 'Veículo actualizado com sucesso.',
        ], 200);
    }

    public function destroy($id)
    {
        $veiculo = Veiculo::find($id);

        if (!$veiculo) {
            return response([
                'message' => 'Veículo não existe.',
            ], 403);
        }

        $veiculo->delete();

        return response([
            'message' => 'Vículo eliminada com sucesso.',
        ], 200);
    }
}
