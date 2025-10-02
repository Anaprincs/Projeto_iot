<?php

namespace App\Livewire\Ambiente;

use App\Models\Ambiente;
use Livewire\Component;

class AmbienteEdit extends Component
{

    public $nome;
    public $descricao;
    public $status;
    public $ambiente_Id;

    public function mount($id)
    {
        $ambiente = Ambiente::find($id);

        if ($ambiente == null) {
            return redirect()->route('ambiente.index');
        }
        $this->ambiente_Id = $ambiente->id;
        $this->nome = $ambiente->nome;
        $this->descricao = $ambiente->descricao;
        $this->status = $ambiente->status;
    }

    public function salvar()
    {
        $ambiente = Ambiente::findOrFail($this->ambiente_Id);



        $ambiente->nome = $this->nome;
        $ambiente->descricao = $this->descricao;
        $ambiente->status = $this->status;
        $ambiente->save();
        session()->flash('succes', 'Cadastro Atualizado');

        return redirect()->route('ambiente.index');
    }




    public function render()
    {
        $ambientes = Ambiente::all();
        return view('livewire.ambiente.ambiente-edit', compact('ambientes'));
    }
}
