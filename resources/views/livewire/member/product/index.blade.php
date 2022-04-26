@section('title', 'Manage Product')
@section('subtitle', 'Product List')

<main>
    <div class="row">
        <div class="col-8">
            <div class="row d-flex justify-content-start">
                <div class="col-sm-6">
                    <div class="input-group">
                        <input type="text" wire:model.debounce.500ms="keyword" class="form-control" placeholder="Ketik Nama / NIP / NUPTK" aria-label="Ketik Nama / NIP / NUPTK"
                            aria-describedby="button-addon2">
                        <button class="btn btn-secondary waves-effect waves-light" type="button" id="button-addon2">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
                <div class="col-sm-2">
                    <select wire:model.debounce.500ms="status" class="form-select" aria-label="Default select example">
                        <option selected value="">Status</option>
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>
                <div class="col-sm-2">
                    <button class="btn btn-dark waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#create-admin">New</button>
                </div>
            </div>
        </div>
    </div>
</main>
