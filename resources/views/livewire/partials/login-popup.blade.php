<div class="basic-login mb-50">
    <form action="#">
        @if($errorMessage !== null)
            <x-alert type="danger" :message="$errorMessage"/>
        @endif
        <label for="email">Email <span>*</span></label>
        <input id="email" type="text" placeholder="Enter Username" class="form-control @error('email') is-invalid @enderror" wire:model="email">
        @error('email')
        <span class="invalid-feedback mb-2 mt-0">
            {{ $message }}
        </span>
        @enderror
        <label for="password">Password <span>*</span></label>
        <input id="password" type="password" placeholder="Enter password..." class="form-control @error('password') is-invalid @enderror" wire:model="password">
        @error('password')
        <span class="invalid-feedback mb-2 mt-0">
            {{ $message }}
        </span>
        @enderror
        <div class="login-action mb-10 fix">
            <span class="log-rem f-left">
               <input id="remember" type="checkbox" wire:model="remember">
               <label for="remember">Remember me</label>
            </span>
            <span class="forgot-login f-right">
                   <a href="#">Lost your password?</a>
            </span>
        </div>
        <div class="row">
            <div class="col-md-6">
                <button href="login.html" class="tp-in-btn w-100" wire:click.prevent="handleLogin">log in</button>
            </div>
            <div class="col-md-6">
                <button type="button" class="tp-in-btn bg-danger text-light w-100" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </form>
</div>

@push('scripts')
    <script>
        window.addEventListener('loginSuccessfully', () => {
            window.location.reload();
        });
    </script>
@endpush
