@section('title', 'Dashboard')

<section>
    <div class="row p-5">
        <div class="card border-0">
            <div class="card-body">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item waves-effect waves-light">
                        <a class="nav-link active" data-bs-toggle="tab" href="#dashboard" role="tab">
                            <span class="d-none d-md-block">Dashboard</span><span class="d-block d-md-none"><i class="mdi mdi-home-variant h5"></i></span>
                        </a>
                    </li>
                    <li class="nav-item waves-effect waves-light">
                        <a class="nav-link" data-bs-toggle="tab" href="#orders" role="tab">
                            <span class="d-none d-md-block">Orders</span><span class="d-block d-md-none"><i class="mdi mdi-account h5"></i></span>
                        </a>
                    </li>
                    <li class="nav-item waves-effect waves-light">
                        <a class="nav-link" data-bs-toggle="tab" href="#wishlists" role="tab">
                            <span class="d-none d-md-block">Wishlists</span><span class="d-block d-md-none"><i class="mdi mdi-email h5"></i></span>
                        </a>
                    </li>
                    <li class="nav-item waves-effect waves-light">
                        <a class="nav-link" data-bs-toggle="tab" href="#settings" role="tab">
                            <span class="d-none d-md-block">Settings</span><span class="d-block d-md-none"><i class="mdi mdi-cog h5"></i></span>
                        </a>
                    </li>
                </ul>


                <!-- Tab panes -->
                <div class="tab-content border-start border-end border-bottom">
                    <div class="tab-pane active p-3" id="dashboard" role="tabpanel">
                        <livewire:pages.customer.dashboard/>
                    </div>
                    <div class="tab-pane p-3" id="orders" role="tabpanel">
                        <livewire:pages.customer.orders/>
                    </div>
                    <div class="tab-pane p-3" id="wishlists" role="tabpanel">
                        <livewire:pages.customer.wishlists/>
                    </div>
                    <div class="tab-pane p-3" id="settings" role="tabpanel">
                        <livewire:pages.customer.settings/>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
