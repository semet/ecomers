<div>
    <div class="mb-5">
        <form action="#" class="dropzone">
            <div class="fallback">
                <input name="file" type="file" multiple="multiple">
            </div>

            <div class="dz-message needsclick">
                <div class="mb-3">
                    <i class="mdi mdi-cloud-upload display-4 text-muted"></i>
                </div>

                <h4>Drop files here or click to upload.</h4>
            </div>
        </form>
    </div>

    <div class="text-center mt-3">
        <button type="button" class="btn btn-primary waves-effect waves-light">Upload Images</button>
    </div>
</div>

@push('styles')
    <link href="{{ asset('assets/admin/libs/dropzone/min/dropzone.min.css') }}" rel="stylesheet" type="text/css">
@endpush

@push('scripts')
    <script src="{{ asset('assets/admin/libs/dropzone/min/dropzone.min.js') }}"></script>
@endpush
