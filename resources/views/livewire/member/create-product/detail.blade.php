<div class="row">
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-6">
                {{-- Category --}}
                <div class="mb-3">
                    <label class="form-label" for="category">Category <span class="text-danger">*</span></label>
                    <select class="form-select" id="category" aria-label="Select Category">
                        <option value="">Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    {{-- @error('product.category_id')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror --}}
                </div>
            </div>
            <div class="col-md-6">
                {{-- Artist --}}
                <div class="mb-3">
                    <label class="form-label" for="artist">Artist <span class="text-danger">*</span></label>
                    <select class="form-select" id="artist" aria-label="Select Artist">
                        <option value="">Select Artist</option>
                        @foreach ($artists as $artist)
                            <option value="{{ $artist->id }}">{{ $artist->name }}</option>
                        @endforeach
                    </select>
                    {{-- @error('product.artist_id')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror --}}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                {{-- Code Number --}}
                <label class="form-label" for="codeNumber">Code Number <span class="text-danger">*</span></label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="codeNumber" readonly disabled />
                    <button class="btn btn-secondary" type="button" id="button-addon2" wire:click.prevent="generateCodeNumber">Genrate</button>
                    {{-- @error('product.code_number')
                        <span class="invalid-feedback">{{ $message }}</span>
                     @enderror --}}
                </div>
            </div>
            <div class="col-md-6">
                {{-- Brand --}}
                <div class="mb-3">
                    <label class="form-label" for="brand">Brand</label>
                    <input type="text" class="form-control" id="brand" />
                </div>
            </div>
        </div>

        {{-- Name --}}
        <div class="mb-3">
            <label class="form-label" for="name">Name <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="name" />
            {{-- @error('product.name')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror --}}
        </div>
    </div>

    <div class="col-md-6">
        <div class="row">
            <div class="col-md-4">
                {{-- Latest Price --}}
                <div class="mb-3">
                    <label class="form-label" for="price">Price (Rp.) <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="price" placeholder="Rp." />
                    {{-- @error('product.latest_price')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror --}}
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label" for="amount">Availability <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="amount" />
                    {{-- @error('product.amount')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror --}}
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label" for="weight">Weight (Gram) <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="weight" />
                    {{-- @error('product.weight')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror --}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label" for="length">Length (cm)</label>
                    <input type="text" class="form-control" id="length" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label" for="width">Width (cm)</label>
                    <input type="text" class="form-control" id="width" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label" for="height">Height (cm)</label>
                    <input type="text" class="form-control" id="height" />
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label" for="colorFamily">Color Family</label>
                    <select class="form-select" id="colorFamily" aria-label="Select Color Family">
                        <option value="">Select Color Family</option>
                        <option value="red">Red</option>
                        <option value="yellow">Yellow</option>
                        <option value="green">Green</option>
                        <option value="black">Black</option>
                        <option value="white">White</option>
                        <option value="grey">Grey</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label" for="size">Size</label>
                    <select class="form-select" id="size" aria-label="Select Size">
                        <option value="">Select Size</option>
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                        <option value="XL">XL</option>
                        <option value="XXL">XXL</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-2">
        <span class="text-danger">*</span> required fields and MUST not be empty
    </div>
    <div class="text-center mt-3">
        <button type="button" class="btn btn-primary waves-effect waves-light" wire:click.prevent="handleSubmit">Save Details</button>
    </div>
</div>
