<?php

namespace App\Livewire\Sensor;

use App\Models\Ambiente;
use App\Models\Sensor;
use Livewire\Component;

class SensorCreate extends Component
{
    public $ambiente_id;
    public $codigo;
    public $tipo;
    public $descricao;
    public $status;


    protected $rules = [
        'ambiente_id' => 'required',
        'codigo' => 'unique:sensors,codigo|required',
        'tipo' => 'required',
        'descricao' => 'required',
        'status' => 'required'
    ];

    protected $messages = [
        'ambiente_id.required' => 'Este campo é obrigatorio',
        'codigo.unique' => 'Este campo é único',
        'codigo.required' => 'Este campo é obrigatorio',
        'descricao.required' => ' A descricao é obrigatoria',
        'status.required' => 'O status é necessario'
    ];



    public function store()
    {
        $this->validate();
        Sensor::create([
            'ambiente_id' => $this->ambiente_id,
            'codigo' => $this->codigo,
            'tipo' => $this->tipo,
            'descricao' => $this->descricao,
            'status' => $this->status
        ]);
        session()->flash('success', 'Cadastro Realizado');
         return redirect()->route('sensor.index');

    }





    public function render()
    {
        $ambientes = Ambiente::all();
        return view('livewire.sensor.sensor-create', compact('ambientes'));
    }
}
