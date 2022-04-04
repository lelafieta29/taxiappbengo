<?php

namespace App\Http\Controllers;

use App\Models\Motorista;
use Illuminate\Http\Request;
use App\Http\Requests\MotoristaRequest;

class MotoristaController extends Controller
{
    public function index()
    {
        $motoristas = Motorista::orderBy('created_at', 'desc')->with('user')->get();
        return response([
            'motoristas' => $motoristas,
        ], 200);
    }

    public function create()
    {
        //
    }

    public function store(MotoristaRequest $request)
    {
        Motorista::create($request->all());

        return response([
            'message' => 'Motorista criado com sucesso.',

        ], 200);
    }

    public function show($id)
    {
        $motorista = Motorista::find($id);

        if (!$motorista) {
            return response([
                'message' => 'Motorista não existe.',
            ], 403);
        }

        $motorista = Motorista::where('id', $id)->with('user')->get();

        return response([
            'motorista' => $motorista,
        ], 200);
    }

    public function edit($id)
    {
        //
    }

    public function update(MotoristaRequest $request, $id)
    {
        $motorista = Motorista::find($id);

        if (!$motorista) {
            return response([
                'message' => 'Motorista não existe.',
            ], 403);
        }

        $motorista->update($request->all());

        return response([
            'message' => 'Motorista actualizada com sucesso.',
            'motorista' => $motorista,
        ], 200);
    }

    public function destroy($id)
    {
        $motorista = Motorista::find($id);

        if (!$motorista) {
            return response([
                'message' => 'Motorista não existe.',
            ], 403);
        }

        $motorista->delete();

        return response([
            'message' => 'Motorista eliminado com sucesso.',
        ], 200);
    }
}
