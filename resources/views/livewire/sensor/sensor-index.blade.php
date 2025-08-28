<div class="container mt-4">
    <div class="row mb-3">
        <div class="col-md-6">
            <!-- Título com Novo Ícone e Cor -->
            <h2 class="text-center mb-4" style="font-family: 'Poppins', sans-serif; color: #9a2424; font-weight: 600;">
            SENSORES
            </h2>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('sensor.create') }}" class="btn btn-primary btn-lg">NOVO SENSOR </a>
        </div>
    </div>

        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-6">
                    <input class="form-control" type="search" name="search" placeholder="Buscar Sensores"
                        aria-label="search" wire:model.live="search">
                </div>
            </div>
        
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Tipo</th>
                        <th>Descrição</th>
                        <th></th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach ($sensor as $a)
                            <td> {{ $a->codigo}}</td>
                            <td> {{ $a->tipo }}</td>
                            <td> {{ $a->descricao }}</td>
                            <td> {{ $a->status }}</td>

                            <td>

                                <a href="{{ route('sensor.edit', $a->id) }}" class="btn btn-sm btn-warning"
                                    title="Editar Sensor">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <button wire:click="delete({{ $a->id }})" class="btn btn-sm btn-danger"
                                    title="Excluir Sensor"
                                    onclick="return confirm('Tem certeza que deseja excluir este sensor?')">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        </div>
        {{ $sensor->links() }}
   
</div>


</div>
