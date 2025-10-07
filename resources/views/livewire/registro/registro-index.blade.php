<div class="container mt-4">
    <div class="row mb-3">
        <div class="col-md-6">
            <!-- Título com Novo Ícone e Cor -->
            <h2 class="text-center mb-4" style="font-family: 'Poppins', sans-serif; color: #9a2424; font-weight: 600;">
            REGISTROS
            </h2>
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
                        <th>Id</th>
                        <th>Id Sensor</th>
                        <th>valor</th>
                        <th>unidade</th>
                        <th>data hora</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach ($registros as $a)
                           <td> {{ $a->id }}</td>
                            <td> {{ $a->sensor_id}}</td>
                            <td> {{ $a->valor }}</td>
                            <td> {{ $a->unidade }}</td>
                            <td> {{ $a->data_hora }}</td>

                            <td>

                                
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
        
       {{ $registros->links() }}
</div>


</div>
