<?php

namespace App\Livewire\Sensor;

use App\Models\Ambiente;
use App\Models\Sensor;
use Livewire\Component;

class SensorEdit extends Component
{

    public function rules(){
        return[ 
            'codigo' =>'unique:sensors,codigo' . $this->sensorId
        ];
    }


    protected $messages = [
        'codigo.unique' => ' O campo é unico',
    ];

    public $ambiente_id;
    public $codigo;
    public $tipo;
    public $descricao;
    public $status;
    public $sensor_Id;


public function mount($id){
    $sensor = Sensor::find($id);

if ($sensor == null) {
    return redirect()->route('sensor.index');
}

    $this->sensor_Id = $sensor->id ;
    $this->ambiente_id = $sensor->ambiente_id;
    $this->codigo = $sensor->codigo;
    $this->tipo = $sensor->tipo;
    $this->descricao = $sensor->descricao;
    $this->status = $sensor->status;
}
public function salvar()
    {
        $sensor = Sensor::findOrFail($this->sensor_Id);
        


        $sensor->ambiente_id = $this->ambiente_id;
        $sensor->codigo = $this->codigo;
        $sensor->tipo = $this->tipo;
        $sensor->descricao = $this->descricao;
        $sensor->status = $this->status;        
        $sensor->save();
        session()->flash('succes', 'Cadastro Atualizado');

        return redirect()->route('sensor.index');
    }



    public function render()
    {
        $ambientes= Ambiente::all();
        return view('livewire.sensor.sensor-edit', compact('ambientes'));
    }
}
