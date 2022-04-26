@section('title', 'Member Login')

<div class="p-2">
    <div class="text-center mt-4">
        <a href="index.html">
            <img src="{{ asset('assets/admin/images/logo-dark.png') }}" height="22" alt="logo">
        </a>
    </div>

    <h4 class="font-size-18 mt-5 text-center">Welcome Back !</h4>
    <p class="text-muted text-center">Signin to Manage Your Store</p>

    <form class="mt-4" action="#">

        <div class="mb-3">
            <label class="form-label" for="username">Email</label>
            <input type="text" class="form-control @error('email') is-invalid @enderror" id="username" placeholder="example@email.com" wire:model="email">
            @error('email')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>


        <div class="mb-3">
            <label class="form-label" for="userpassword">Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="userpassword" placeholder="Enter password" wire:model="password">
            @error('password')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3 row">
            <div class="col-sm-6">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="customControlInline" wire:model="remember">
                    <label class="form-check-label" for="customControlInline">Remember me</label>
                </div>
            </div>
            <div class="col-sm-6 text-end">
                <button class="btn btn-primary w-md waves-effect waves-light" type="submit" wire:click.prevent="handleLogin">Log In</button>
            </div>
        </div>

        <div class="mb-3 mt-2 mb-0 row">
            <div class="col-12 mt-3">
                <a href="pages-recoverpw-2.html">
                    <i class="mdi mdi-lock"></i> Forgot your password?
                </a>
            </div>
        </div>

    </form>

    <div class="mt-5 pt-4 text-center">
        <p>Don't have an account ? <a href="pages-register-2.html" class="fw-medium text-primary"> Signup now </a> </p>
        <p>© <script>document.write(new Date().getFullYear())</script> Veltrix. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand</p>
    </div>

</div>
