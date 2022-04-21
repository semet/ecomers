<div class="modal fade" tabindex="-1" id="loginModal" wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#login-tab" role="tab">
                            <span class="d-none d-md-block">Login</span><span class="d-block d-md-none"><i class="mdi mdi-home-variant h5"></i></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#register-tab" role="tab">
                            <span class="d-none d-md-block">Register</span><span class="d-block d-md-none"><i class="mdi mdi-account h5"></i></span>
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active p-3" id="login-tab" role="tabpanel">
                        <livewire:partials.login-popup/>
                    </div>
                    <div class="tab-pane p-3" id="register-tab" role="tabpanel">
                        <livewire:partials.register-popup/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
