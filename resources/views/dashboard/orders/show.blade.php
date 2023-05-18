<div>
    <table>
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Product Name</th>
                <th>Quantity</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
    @if ($order)
        @foreach ($order->products as $product)
            <tr>
                <td>{{ $order->fullname }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->pivot->quantity }}</td>
            </tr>
        @endforeach
    @endif
@endforeach
        </tbody>
    </table>
</div>
