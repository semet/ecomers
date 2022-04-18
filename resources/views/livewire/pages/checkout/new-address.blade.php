<div class="modal fade" id="newAddressModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <label for="province">Province</label>
                        <select name="province" id="province" class="form-control @error('provinceId') is-invalid @enderror" wire:model="provinceId">
                            <option value="">Select Province</option>
                            @foreach($provinces as $province)
                                <option value="{{ $province->province_id }}">{{ $province->title }}</option>
                            @endforeach
                        </select>
                        @error('provinceId')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-12 mt-2">
                        <label for="city">City</label>
                        <select name="city" id="city" class="form-control @error('cityId') is-invalid @enderror" wire:model="cityId">
                            <option value="">Select City</option>
                            @foreach($cities as $city)
                                <option value="{{ $city->city_id }}">{{ $city->title }}</option>
                            @endforeach
                        </select>
                        @error('cityId')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-12 mt-2">
                        <label for="addressLine">Address Line 1</label>
                        <textarea name="addressLine" id="addressLine" class="form-control @error('addressLine') is-invalid @enderror" cols="30" rows="3" wire:model="addressLine"></textarea>
                        @error('addressLine')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-12 mt-2">
                        <label for="addressLine2">Address Line 2</label>
                        <textarea name="addressLine2" id="addressLine2" class="form-control" cols="30" rows="3" wire:model="addressLine2"></textarea>
                    </div>

                    <div class="col-md-12 mt-2">
                        <label for="zipCode">ZIP Code</label>
                        <input type="text" name="zipCode" id="zipCode" class="form-control @error('zipCode') is-invalid @enderror" wire:model="zipCode"/>
                        @error('zipCode')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" wire:click.prevent="handleSave">Save</button>
            </div>
        </div>
    </div>
</div>


