<div class="row">
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-6">
                {{-- Category --}}
                <div class="mb-3">
                    <label class="form-label" for="category">Category <span class="text-danger">*</span></label>
                    <select class="form-select @error('product.category_id') is-invalid @enderror" id="category" aria-label="Select Category" wire:model="product.category_id">
                        <option value="">Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @if ($category->id === $product['category_id']) selected @endif>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('product.category_id')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                {{-- Artist --}}
                <div class="mb-3">
                    <label class="form-label" for="artist">Artist <span class="text-danger">*</span></label>
                    <select class="form-select @error('product.artist_id') is-invalid @enderror" id="artist" aria-label="Select Artist" wire:model="product.artist_id">
                        <option value="">Select Artist</option>
                        @foreach ($artists as $artist)
                            <option value="{{ $artist->id }}" @if ($artist->id === $product['artist_id']) selected @endif>{{ $artist->name }}</option>
                        @endforeach
                    </select>
                    @error('product.artist_id')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>


        {{-- Code Number --}}
        <div class="mb-3">
            <label class="form-label" for="codeNumber">Code Number <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('product.code_number') is-invalid @enderror" id="codeNumber" wire:model="product.code_number" readonly disabled />
            @error('product.code_number')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        {{-- Brand --}}
        <div class="mb-3">
            <label class="form-label" for="brand">Brand</label>
            <input type="text" class="form-control" id="brand" wire:model="product.brand" />
        </div>
        {{-- Name --}}
        <div class="mb-3">
            <label class="form-label" for="name">Name <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('product.name') is-invalid @enderror" id="name" wire:model="product.name" />
            @error('product.name')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="row">
            <div class="col-md-6">
                {{-- Old Price --}}
                <div class="mb-3">
                    <label class="form-label" for="oldPrice">Old Price (Rp.) </label>
                    <input type="text" class="form-control" id="oldPrice" wire:model="product.old_price" placeholder="Rp." />
                </div>
            </div>

            <div class="col-md-6">
                {{-- Latest Price --}}
                <div class="mb-3">
                    <label class="form-label" for="latestPrice">Latest Price (Rp.) <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('product.latest_price') is-invalid @enderror" id="latestPrice" wire:model="product.latest_price"
                        placeholder="Rp." />
                    @error('product.latest_price')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label" for="amount">Availability <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('product.amount') is-invalid @enderror" id="amount" wire:model="product.amount" />
                    @error('product.amount')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label" for="weight">Weight (Gram) <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('product.weight') is-invalid @enderror" id="weight" wire:model="product.weight" />
                    @error('product.weight')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label" for="length">Length (cm)</label>
                    <input type="text" class="form-control" id="length" wire:model="product.length" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label" for="width">Width (cm)</label>
                    <input type="text" class="form-control" id="width" wire:model="product.width" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label" for="high">High (cm)</label>
                    <input type="text" class="form-control" id="length" wire:model="product.high" />
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label" for="colorFamily">Color Family</label>
                    <select class="form-select" id="colorFamily" aria-label="Select Color Family" wire:model="product.color_family">
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
                    <select class="form-select" id="size" aria-label="Select Size" wire:model="product.size">
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

@push('styles')
    <link href="{{ asset('assets/admin/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('scripts')
    <script src="{{ asset('assets/admin/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script>
        window.addEventListener('productUpdated', () => {
            Swal.fire({
                title: "Product Detail Updted",
                icon: 'success',
                confirmButtonColor: '#556ee6'
            })
        });
    </script>
@endpush
