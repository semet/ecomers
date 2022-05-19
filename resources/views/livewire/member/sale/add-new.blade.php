<div id="addNewDiscount" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Add Discount
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if ($product !== null)
                    <div class="mb-3">
                        <label class="form-label" for="latestPrice">Latest Price</label>
                        <input type="text" class="form-control" id="latestPrice" wire:model="product.latest_price" disabled />
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="newPrice">New Price</label>
                        <input type="text" class="form-control @error('newPrice') is-invalid @enderror" id="newPrice" wire:model="newPrice" />
                        @error('newPrice')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <strong>
                        Total Discount: {{ $discount }}%
                    </strong>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary waves-effect waves-light" wire:click.prevent="handleSave">Save
                    changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

@push('styles')
    <link href="{{ asset('assets/admin/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('scripts')
    <script src="{{ asset('assets/admin/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script>
        window.addEventListener('productPriceUpdated', (product) => {
            Swal.fire({
                title: 'Product Price Updated',
                text: 'Product Price Updated Successfully',
                icon: 'success',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
            }).then(async (result) => {
                if (result.value) {
                    await $('#addNewDiscount').modal('hide');
                    await window.location.reload();
                }
            });
        });
    </script>
@endpush
