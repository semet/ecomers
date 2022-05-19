<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex gap-3 my-4">
                @foreach ($images as $image)
                    <div class="d-flex flex-column">
                        <img src="{{ asset('storage/products/' . $image->name) }}" alt="" class="rounded avatar-lg">
                        <a href="#" class="text-center text-danger mt-2" wire:click.prevent="deleteImage({{ $image->id }})">
                            <i class="fas fa-trash"></i> Delete
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
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

@push('styles')
    <link href="{{ asset('assets/admin/libs/dropzone/min/dropzone.min.css') }}" rel="stylesheet" type="text/css">
@endpush

@push('scripts')
    <script src="{{ asset('assets/admin/libs/dropzone/min/dropzone.min.js') }}"></script>

    <script>
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
                    formData.append('productId', @this.product['id']);
                    formData.append('productSlug', @this.product['slug']);
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

        window.addEventListener('imageDeleted', (event) => {
            window.location.reload();
        })
    </script>
@endpush
