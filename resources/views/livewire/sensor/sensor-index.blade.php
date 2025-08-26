<div class="container mt-4">
    <div class="row mb-3">
        <div class="col-md-6">
            <!-- Título com Novo Ícone e Cor -->
            <h2 class="text-center mb-4" style="font-family: 'Poppins', sans-serif; color: #9a248e; font-weight: 600;">
                <i class="bi bi-box"></i> Sensores
            </h2>
        </div>
        <div class="col-md-6 text-end">
            <a class="btn btn-primary btn-lg">
                <i class="bi bi-plus-circle"></i>Novo Sensor
            </a>
        </div>
    </div>

    <div class="card shadow-lg">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-6">
                    <input type="text" wire:model.debounce.300ms="search" 
                        class="form-control" placeholder="Buscar Sensores...">
                </div>
                <div class="col-md-3">
                    <select wire:model="perPage" class="form-select">
                        <option value="10">10 por página</option>
                        <option value="25">25 por página</option>
                        <option value="50">50 por página</option>
                        <option value="100">100 por página</option>
                    </select>
                </div>
            </div>

            @if(session()->has('message'))
                <div class="alert alert-success text-center">
                    {{ session('message') }}
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Imagem</th>
                            <th>ambiente</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                
            </div>
        </div>
    </div>
</div>