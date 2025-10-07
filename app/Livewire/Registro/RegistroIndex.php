<?php

namespace App\Livewire\Registro;

use App\Models\Registro;
use Livewire\Component;
use Livewire\WithPagination;

class RegistroIndex extends Component
{

    use WithPagination;

    public $search = '';
    public $perPage = 15;

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => 15],
    ];

    public function delete($id)
    {
        $registro = Registro::find($id);
        if ($registro != null) {
            $sensor_id = $registro->sensor->id;
            $registro->delete();
            Registro::find($sensor_id)->delete();
        }
        session()->flash('message', 'Aluno deletado com sucesso.');
    }


    public function render()
    {
        $registros = Registro::where('sensor_id', 'like', "%{$this->search}%")
            // ->orWhere('valor', 'like', "%{$this->search}%")
            // ->orWhere('unidade', 'like', "%{$this->search}%")
            // ->orWhere('data_hora', 'like', "%{$this->search}%")
            ->orderBy('id', 'desc')
            ->paginate($this->perPage);
        //->get();

        //dd($registros);
        return view('livewire.registro.registro-index', compact('registros'));
    }
}
