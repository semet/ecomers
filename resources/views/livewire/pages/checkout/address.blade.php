<div class="col-lg-6">
    <div class="card card-body">
        <div class="checkbox-form">
            <h3>Customer Detail</h3>
            <div class="row">
                <div class="col-md-12">
                    <div class="checkout-form-list">
                        <label for="name">Name</label>
                        <input type="text" id="name" readonly value="{{ $customer->name }}">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="checkout-form-list">
                        <label for="email">Email</label>
                        <input type="text" id="email" readonly value="{{ $customer->email }}">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="checkout-form-list">
                        <label for="phone">Phone</label>
                        <input type="text" id="phone" readonly value="{{ $customer->phone }}">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card card-body mt-4">
        <div class="checkbox-form">
            <h3>Address</h3>
            <div class="row">
                <div class="col-md-12">
                    @if(empty($addressLine))
                        <h4>You dint have any address</h4>
                        <p>Please add one</p>
                    @endif
                    <div class="country-select">
                        <label for="province">Province <span class="required">*</span></label>
                        <select class="form-control" wire:model="addressLine">
                            <option value="">Select Address</option>
                            @foreach($addresses as $address)
                                <option value="{{ $address->id }}">{{ $address->address_line_1 }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <a href="#" class="tp-in-btn" data-bs-toggle="modal" data-bs-target="#newAddressModal">Add New Address</a>
                </div>
            </div>

        </div>
    </div>

    <div class="card card-body mt-4">
        <div class="checkbox-form">
            <h3>Shipping</h3>
            <div class="row">
                <div class="col-md-12">
                    <div class="country-select">
                        <label for="deliveryService">Delivery Service <span class="required">*</span></label>
                        <select class="form-control" id="deliveryService">
                            <option value="">Select Delivery Service</option>
                            @foreach($couriers as $courier)
                                <option value="{{ $courier->id }}">{{ $courier->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="d-flex gap-2">
                    <div>
                        <input type="checkbox" class="btn-check" id="btn-check" autocomplete="off">
                        <label class="btn btn-primary" for="btn-check">Single toggle</label>
                    </div>
                    <div>
                        <input type="checkbox" class="btn-check" id="btn-check" autocomplete="off">
                        <label class="btn btn-primary" for="btn-check">Single toggle</label>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <livewire:pages.checkout.new-address/>

</div>

@push('scripts')
    <script>
        window.addEventListener('newAddressAdded', () => {
            $('#newAddressModal').modal('hide');
            @this.updateComponent()
        })
    </script>
@endpush
