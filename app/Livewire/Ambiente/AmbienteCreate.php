<?php

namespace App\Livewire\Ambiente;

use App\Models\Ambiente;
use Livewire\Component;

class AmbienteCreate extends Component
{
    public $nome;
    public $descricao;
    public $status;

    public function store()
    {
        $this->validate();

        Ambiente::create([
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            'status' => $this->status
        ]); 
        session()->flash('success', 'Cadastro Realizado');
         return redirect()->route('ambiente.index');
    }

    protected $rules = [
        'nome' => 'required',
        'descricao' => 'required',
        'status' => 'required',

    ];

    protected $messages = [
 'nome.required' => 'Este campo é obrigatorio',
 'descricao.required' => 'Este campo é obrigatorio',
 'status.required'=> 'Este campo é obrigatorio'
    ];




    public function render()
    {
        $ambientes = Ambiente::all();
        return view('livewire.ambiente.ambiente-create',compact('ambientes'));
    }
}
