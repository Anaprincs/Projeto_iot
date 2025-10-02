<?php

namespace App\Livewire\Ambiente;

use App\Models\Ambiente;
use Livewire\Component;
use Livewire\WithPagination;

class Ambientelist extends Component
{


    public $nome;
    public $descricao;
    public $status;

    use WithPagination;

    public $search = '';
    public $perPage = 15;

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => 15],
    ];

    public function delete($id)
    {
        $ambiente = Ambiente::find($id);
        if ($ambiente != null) {
            $ambiente->delete();
            
        }
        session()->flash('message', 'Ambiente deletado com sucesso.');
    }

    public function render()
    {
        $ambientes = Ambiente::where('nome', 'like', "%{$this->search}%")
            ->orWhere('descricao', 'like', "%{$this->search}%")
            ->orWhere('status', 'like', "%{$this->search}%")
            ->paginate($this->perPage);
        return view('livewire.ambiente.ambientelist', compact('ambientes'));
    }

    public function index()
    {
        $ambientes = Ambiente::find();
        $this->nome = $ambientes->nome;
        $this->descricao = $ambientes->desscricao;
        $this->status = $ambientes->status;
    }
}
