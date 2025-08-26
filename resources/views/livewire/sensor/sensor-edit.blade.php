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
            <h2 class="text-center mb-4" style="font-family: 'Arial', sans-serif; color: #a016a0; font-weight: bold;">
                <i class="bi bi-pencil"></i> Cadastro
            </h2>

            <div class="card shadow-lg border-0">
                <div class="card-body">
                    <form wire:submit.prevent="store">


                        <!-- Campo ambiente -->

                        <div class="mb-3">
                            <label for="ambiente_id" class="form-label fw-bold">AMBIENTE</label>

                            <select class="form-select form-select-sm" aria-label="Small select example">
                                @foreach ($ambientes as $a)
                                    <option value="{{ $a->id }}">{{ $a->nome }}</option>
                                @endforeach
                            </select>
                            @error('ambiente_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>


                        <div class="form-group mb-3">
                            <label for="password" class="form-label fw-bold"> CODIGO</label>
                            <input type="text" id="codigo" class="form-control">
                            @error('codigo')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="tipo" class="form-label fw-bold">TIPO</label>
                            <input type="text" wire:model="tipo" id="tipo" class="form-control">
                            @error('tipo')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="descricao" class="form-label fw-bold">DESCRIÇÃO</label>
                            <textarea class="form-control" id="descricao" rows="3"></textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label for="status" class="form-label fw-bold">TIPO</label>
                            <input type="text" wire:model="status" id="status" class="form-control">
                            @error('status')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <!-- Botões Centralizados -->


                        <div class="d-flex justify-content-center mt-4">
                            <div class="d-flex justify-content-center mt-4">
                                <button type="submit" class="btn btn-success ">Cadastrar</button>
                                <a class="btn btn-danger mx-2">Cancelar</a>
                            </div>
                            {{-- <a href="{{ route('admin.index') }}" class="btn btn-secondary btn-lg w-48 mx-2">
                                <i class="bi bi-arrow-left-circle"></i> Voltar
                            </a> --}}
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

