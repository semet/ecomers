<div class="row">
    <div class="col-md-12" wire:ignore>
        <h5>Short Detail</h5>
        <textarea id="editor1" wire:model.lazy="product.description"></textarea>
    </div>
    <div class="col-md-12 mt-4" wire:ignore>
        <h5>Detail</h5>
        <textarea id="editor2" wire:model.lazy="product.details"></textarea>
    </div>

    <div class="text-center mt-3">
        <button type="button" class="btn btn-primary waves-effect waves-light" wire:click.prevent="handleSubmit">Save Description</button>
    </div>
</div>


@push('scripts')
    <!--tinymce js-->
    <script src="{{ asset('assets/admin/libs/tinymce/tinymce.min.js') }}"></script>

    <!-- init js -->
    <script>
        $(document).ready(() => {

            const editor1 = tinymce.init({
                selector: "textarea#editor1",
                height: 200,
                setup: function(editor) {
                    editor.on('change', function(e) {
                        @this.set('product.description', editor.getContent());
                    });
                },
            });

            const editor2 = tinymce.init({
                selector: "textarea#editor2",
                height: 200,
                setup: function(editor) {
                    editor.on('change', function(e) {
                        @this.set('product.details', editor.getContent());
                    });
                },
            });
        });

        window.addEventListener('validationErrorDetected', (event) => {
            Swal.fire({
                title: "Opps!",
                text: event.detail.message,
                icon: 'error',
                confirmButtonColor: '#556ee6'
            });
        })
        window.addEventListener('productUpdated', (event) => {
            Swal.fire({
                title: "Success!",
                text: event.detail.message,
                icon: 'success',
                confirmButtonColor: '#556ee6'
            });
        })
    </script>
@endpush
