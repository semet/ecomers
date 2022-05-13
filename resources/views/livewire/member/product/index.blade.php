@section('title', 'Manage Product')
@section('subtitle', 'Product List')

<main>
    <div class="row">
        <div class="col-8">
            <div class="row d-flex justify-content-start">
                <div class="col-sm-6">
                    <div class="input-group">
                        <input type="text" wire:model.debounce.500ms="codeNumber" class="form-control" placeholder="Code Number" aria-label="Code Number"
                            aria-describedby="button-addon2">
                        <button class="btn btn-secondary waves-effect waves-light" type="button" id="button-addon2">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
                <div class="col-sm-2">
                    <select class="form-select" wire:model.debounce.500ms="sortingType" aria-label="Default select example">
                        <option selected value="">Sort By</option>
                        <option value="featured">Featured</option>
                        <option value="top-sell">Top Sale</option>
                        <option value="price-low-to-high">Price (Low to High)</option>
                        <option value="price-high-to-low">Price (High to Low)</option>
                    </select>
                </div>
                <div class="col-sm-2">
                    <button class="btn btn-dark waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#create-admin">New</button>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
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
                                @foreach ($products as $product)
                                    <tr>
                                        <th scope="row">{{ strtoupper($product->code_number) }}</th>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->latest_price }}</td>
                                        <td>{{ $product->amount }}</td>
                                        <td>{{ $product->sold }}</td>
                                        <td>
                                            <a href="{{ url('http://ecomers.test/shop/product/' . $product->slug) }}" class="text-dark" target="_blank">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('member.product.edit', ['product' => $product]) }}" class="text-dark mx-2">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <a href="#" class="text-dark">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
