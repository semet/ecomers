@section('title', 'Product Runout')
@section('subtitle', 'Manage Product Runout')

<main>
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
                                        <a href="#" class="text-dark" data-bs-toggle="modal" data-bs-target="#addNewDiscount"
                                            wire:click="setCurrentProduct('{{ $product->id }}')">
                                            <i class="fas fa-money-bill"></i>
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
</main>
