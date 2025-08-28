
<div class="container mt-5">

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-8">


            <!-- Título com Fonte, Cor e Negrito -->
            <h2 class="text-center mb-4" style="font-family: 'Arial', sans-serif; color: #c11111; font-weight: bold;">Editar
            </h2>

            <div class="card shadow-lg border-0">
                <div class="card-body">
                    <form wire:submit.prevent="salvar">


                        <!-- Campo ambiente -->

                        <div class="mb-3">
                            <label for="ambiente_id" class="form-label fw-bold">Nome</label>

                            <select class="form-select form-select-sm" aria-label="Small select example" wire:model.defer="nome">
                                @foreach ($ambientes as $a)
                                    <option value="{{ $a->id }}">{{ $a->nome }}</option>
                                @endforeach
                            </select>
                            @error('ambiente_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>

                        <div class="mb-3">
                            <label for="descricao" class="form-label fw-bold" >DESCRIÇÃO</label>
                            <textarea class="form-control" id="descricao" wire:model.defer="descricao" rows="3"></textarea>
                            @error('descricao')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="status"
                                wire:model.defer="status">
                            <label class="form-check-label fw-bold" for="status">STATUS</label>
                            @error('status')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <!-- Botões Centralizados -->

                                <a href="{{ route('ambiente.index') }}"><input class="btn btn-success" type="submit" value="Cadastrar"></a>
                                <a href="{{ route('ambiente.index') }}" class="btn btn-danger ">Voltar</a>
            
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
