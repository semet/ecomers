@section('title', 'Create Product')
@section('subtitle', 'Create Product')

<main>
    <div class="row">
        <div class="col-md-12">
            {{-- Product Details --}}
            <div class="card">
                <h4 class="card-header">Product Details</h4>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    {{-- Category --}}
                                    <div class="mb-3">
                                        <label class="form-label" for="category">Category <span class="text-danger">*</span></label>
                                        <select class="form-select @error('categoryId') is-invalid @enderror" id="category" aria-label="Select Category" wire:model="categoryId">
                                            <option value="">Select Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('categoryId')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    {{-- Artist --}}
                                    <div class="mb-3">
                                        <label class="form-label" for="artist">Artist <span class="text-danger">*</span></label>
                                        <select class="form-select @error('artistId') is-invalid @enderror" id="artist" aria-label="Select Artist" wire:model="artistId">
                                            <option value="">Select Artist</option>
                                            @foreach ($artists as $artist)
                                                <option value="{{ $artist->id }}">{{ $artist->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('artistId')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    {{-- Code Number --}}
                                    <label class="form-label" for="codeNumber">Code Number <span class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control @error('codeNumber') is-invalid @enderror" id="codeNumber" readonly disabled
                                            wire:model="codeNumber" />
                                        <button class="btn btn-secondary" type="button" id="button-addon2" wire:click.prevent="generateCodeNumber">Genrate</button>
                                        @error('codeNumber')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    {{-- Brand --}}
                                    <div class="mb-3">
                                        <label class="form-label" for="brand">Brand</label>
                                        <input type="text" class="form-control" id="brand" wire:model="brand" />
                                    </div>
                                </div>
                            </div>

                            {{-- Name --}}
                            <div class="mb-3">
                                <label class="form-label" for="name">Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" wire:model="name" />
                                @error('name')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-4">
                                    {{-- Latest Price --}}
                                    <div class="mb-3">
                                        <label class="form-label" for="price">Price (Rp.) <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('latest_price') is-invalid @enderror" id="price" placeholder="Rp."
                                            wire:model="latest_price" />
                                        @error('latest_price')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="amount">Availability <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('amount') is-invalid @enderror" id="amount" wire:model="amount" />
                                        @error('amount')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="weight">Weight (Gram) <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('weight') is-invalid @enderror" id="weight" wire:model="weight" />
                                        @error('weight')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="length">Length (cm)</label>
                                        <input type="text" class="form-control" id="length" wire:model="length" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="width">Width (cm)</label>
                                        <input type="text" class="form-control" id="width" wire:model="width" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="height">Height (cm)</label>
                                        <input type="text" class="form-control" id="height" wire:model="height" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="colorFamily">Color Family</label>
                                        <select class="form-select" id="colorFamily" aria-label="Select Color Family" wire:model="colorFamily">
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
                                        <select class="form-select" id="size" aria-label="Select Size" wire:model="size">
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
                    </div>

                </div>
            </div>
            {{-- Product Descriptions --}}
            <div class="card">
                <h4 class="card-header">Product Descriptions</h4>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12" wire:ignore>
                            <h5>Short Detail</h5>
                            <textarea id="editor1"></textarea>
                        </div>
                        <div class="col-md-12 mt-4" wire:ignore>
                            <h5>Detail</h5>
                            <textarea id="editor2"></textarea>
                        </div>
                    </div>
                    <div class="text-center mt-3">
                        <button type="button" class="btn btn-primary waves-effect waves-light" wire:click.prevent="handleSubmit">Save Product</button>
                    </div>

                </div>
            </div>
            {{-- Product Images --}}
            <div class="card">
                <h4 class="card-header">Product Images</h4>
                <div class="card-body">
                    <div class="row">
                        <form action="{{ route('member.product.image-upload') }}" class="dropzone" enctype="multipart/form-data" method="POST">
                            <div class="mb-5">
                                @csrf
                                <div class="fallback">
                                    <input name="file[]" type="file" multiple="multiple">
                                </div>

                                <div class="dz-message needsclick">
                                    <div class="mb-3">
                                        <i class="mdi mdi-cloud-upload display-4 text-muted"></i>
                                    </div>

                                    <h4>Drop files here or click to upload.</h4>
                                </div>
                            </div>


                            <div class="text-center mt-3">
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Upload Images</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@push('styles')
    <link href="{{ asset('assets/admin/libs/dropzone/min/dropzone.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/admin/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('scripts')
    <!--tinymce js-->
    <script src="{{ asset('assets/admin/libs/tinymce/tinymce.min.js') }}"></script>

    <script src="{{ asset('assets/admin/libs/dropzone/min/dropzone.min.js') }}"></script>

    <script src="{{ asset('assets/admin/libs/sweetalert2/sweetalert2.min.js') }}"></script>

    <!-- init js -->
    <script>
        $(document).ready(() => {
            const editor1 = tinymce.init({
                selector: "textarea#editor1",
                height: 200,
                setup: function(editor) {
                    editor.on('change', function(e) {
                        @this.set('description', editor.getContent());
                    });
                }
            });

            const editor2 = tinymce.init({
                selector: "textarea#editor2",
                height: 400,
                setup: function(editor) {
                    editor.on('change', function(e) {
                        @this.set('details', editor.getContent());
                    });
                }
            });


        });

        Dropzone.autoDiscover = false;
        let myDropzone = new Dropzone(".dropzone", {
            maxFilesize: 10,
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            autoProcessQueue: false,
            uploadMultiple: true,
            parallelUploads: 100,
            addRemoveLinks: true,
            maxFiles: 100,
            init: function() {
                var myDropzone = this;
                this.on("sendingmultiple", (file, xhr, formData) => {
                    formData.append('productId', @this.newProductId);
                    formData.append('productSlug', @this.newProductSlug);
                });

                this.element.querySelector("button[type=submit]").addEventListener("click", function(e) {
                    // Make sure that the form isn't actually being sent.
                    e.preventDefault();
                    e.stopPropagation();
                    myDropzone.processQueue();
                });

                this.on("successmultiple", function(files, response) {
                    Swal.fire({
                        title: "Success",
                        text: 'Images Uploaded successfully',
                        icon: 'success',
                        confirmButtonColor: '#556ee6'
                    }).then(() => {
                        myDropzone.removeAllFiles(true);
                    })

                });
                this.on("errormultiple", function(files, response) {
                    Swal.fire({
                        title: "Error",
                        text: 'Images upload failed. Please try again',
                        icon: 'error',
                        confirmButtonColor: '#556ee6'
                    })
                });
            },
        });

        window.addEventListener('validationErrorDetected', (event) => {
            Swal.fire({
                title: "Opps!",
                text: event.detail.message,
                icon: 'error',
                confirmButtonColor: '#556ee6'
            });
        });

        window.addEventListener('errorSavingProduct', (event) => {
            Swal.fire({
                title: "Opps!",
                text: event.detail.message,
                icon: 'error',
                confirmButtonColor: '#556ee6'
            });
        });

        window.addEventListener('productCreated', (event) => {
            Swal.fire({
                title: "Success!",
                text: event.detail.message,
                icon: 'success',
                confirmButtonColor: '#556ee6'
            });
        })
    </script>
@endpush
