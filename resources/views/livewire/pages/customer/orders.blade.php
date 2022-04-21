<div class="mb-0">
    <div class="table-responsive">
        <table class="table table-hover mb-0">

            <thead>
            <tr>
                <th>#</th>
                <th>Order Number</th>
                <th>Total Price</th>
                <th>Payment Status</th>
                <th>Placed At</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $order->order_number }}</td>
                <td>{{ $order->total_price }}</td>
                <td>{{ $order->payment_status }}</td>
                <td>{{ $order->created_at }}</td>
            </tr>
            @endforeach

            </tbody>
        </table>
    </div>
</div>
