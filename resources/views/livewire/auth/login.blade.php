<div>
    <div class="d-flex align-items-center justify-content-center vh-100 bg-light">
        <div class="card shadow-sm p-4" style="width: 400px">
            @if (@session()->has('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <form wire:submit.prevent='login'>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" wire:model='email' class="form-control" id="email"
                        aria-describedby="emailHelp">
                    @error('email')
                        <span class="text danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" wire:model='password'class="form-control" id="password">
                    @error('password')
                        <span class="text danger">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
