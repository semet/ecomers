@section('title', 'Product On Sale')
@section('subtitle', 'Manage Product On Sale')

<main>
    <div class="row">
        <div class="col-6">
            <div class="input-group">
                <input type="text" wire:model.debounce.500ms="codeNumber" class="form-control" placeholder="Code Number" aria-label="Code Number" aria-describedby="button-addon2">
                <button class="btn btn-secondary waves-effect waves-light" type="button" id="button-addon2">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @if ($codeNumber !== '' && $errorMessage !== null)
                        <x-alert type="danger" :message="$errorMessage" />
                    @endif

                    @if ($product !== null)
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th>#CODE</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Availability</th>
                                        <th>Sold</th>
                                        <th>@</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">{{ strtoupper($product->code_number) }}</th>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->latest_price }}</td>
                                        <td>{{ $product->amount }}</td>
                                        <td>{{ $product->sold }}</td>
                                        <td>
                                            <a href="#" class="text-dark" data-bs-toggle="modal" data-bs-target="#addNewDiscount"
                                                wire:click="setCurrentProduct('{{ $product->id }}')">
                                                <i class="fas fa-money-bill"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    @else
                        <blockquote class="blockquote">
                            <h3>Please Enter the code number</h3>
                        </blockquote>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <livewire:member.sale.add-new />
</main>
