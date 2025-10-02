<?php

namespace App\Livewire\Sensor;

use App\Models\Sensor;
use Livewire\Component;
use Livewire\WithPagination;

class SensorIndex extends Component
{ 
    
    public $ambiente_id;
    public $codigo;
    public $tipo;
    public $descricao;
    public $status;

    use WithPagination;

    public $search = '';
    public $perPage = 15;

    protected $queryString =[
        'search' => ['except' => ''],
        'perPage' => ['except' => 15],
    ];

    public function delete($id)
    {
        $sensor = Sensor::find($id);
        if($sensor != null){
            $ambiente_id =$sensor->ambiente->id;
            $sensor->delete();
            Sensor::find($ambiente_id)->delete();
        }
        session()->flash('message', 'Aluno deletado com sucesso.');
    }


    public function render()
    {
        $sensor = Sensor::where('ambiente_id', 'like', "%{$this->search}%")
            ->orWhere('codigo', 'like', "%{$this->search}%")
            ->orWhere('tipo', 'like', "%{$this->search}%")
            ->orWhere('descricao', 'like', "%{$this->search}%")
            ->orWhere('status', 'like', "%{$this->search}%")
            ->paginate($this->perPage);
        return view('livewire.sensor.sensor-index',compact('sensor'));
    }

    public function index(){
        $sensores = Sensor::find();
        $this->ambiente_id = $sensores->ambiente_id;
        $this->codigo = $sensores->codigo;
        $this->tipo = $sensores->tipo;
        $this->descricao = $sensores->desscricao;
        $this-> status = $sensores->status;
    }

    

}
