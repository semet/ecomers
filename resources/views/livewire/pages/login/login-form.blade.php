<div class="col-lg-6">
    <div class="basic-login mb-50">
        <h5>Login</h5>
        <form action="#">
            <label for="name">Email <span>*</span></label>
            <input id="name" type="text" placeholder="Enter Username" class="form-control @error('email') is-invalid @enderror" wire:model="email">
            @error('email')
                <span class="invalid-feedback mb-2">
                    {{ $message }}
                </span>
            @enderror
            <label for="pass">Password <span>*</span></label>
            <input id="pass" type="password" placeholder="Enter password..." class="form-control @error('password') is-invalid @enderror" wire:model="password">
            @error('password')
            <span class="invalid-feedback mb-2">
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
            <button type="submit" class="tp-in-btn w-100" wire:click.prevent="handleLogin">log in</button>
        </form>
    </div>
</div>
