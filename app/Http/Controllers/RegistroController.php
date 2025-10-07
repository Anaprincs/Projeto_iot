<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistroRequest;
use App\Models\Registro;
use App\Models\Sensor;
use Illuminate\Http\Request;

class RegistroController extends Controller
{

    // public function store(RegistroRequest $request)
    // {

    //    $registro =  Registro::create([
    //         'sensor_id' => $request->sensor_id,
    //         'valor' => $request->valor,
    //         'unidade' => $request->unidade,
    //         'data_hora' => $request->data_hora
    //     ]);

    //      return $registro;

    // }


    public function store(RegistroRequest $request)
    {
        $sensor = Sensor::where('codigo', $request->cod_sensor)->first(); //pega primeiro registro
        if (!$sensor) {
            return response()->json(['error' => 'sensor não encontrado '], 404);
        }
        $registro = Registro::create([
            'sensor_id' => $sensor->id,
            'valor' => $request->valor,
            'unidade' => $request->unidade,
            'data_hora' => now()
        ]);
        return response()->json([
            'success' => 'registro salvo com sucesso',
            'data' => $registro
        ], 201);
    }
}
