<table>
    <thead>
    <tr>
        <th>#</th>
        <th>User</th>
        <th>Address</th>
        <th>Phone</th>
        <th>Order Date</th>
        <th>Description</th>
        <th>Total Order</th>
        <th>Total Price</th>
        <th>Status</th>
    </tr>
    </thead>
    <tbody>
    @foreach($orders as $order)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $order->user->email }}</td>
            <td>{{ $order->address }}</td>
            <td>{{ $order->phone }}</td>
            <td>{{ $order->created_at->format('d/m/Y') }}</td>
            <td>
                @php
                    $orderdetails = \App\OrderDetail::where('order_id',$order->id)->get();
                    $total_order = $orderdetails->sum('total_order');
                @endphp
                @foreach ($orderdetails as $orderdetail)
                    {{ $orderdetail->jersey->name }}<b>(x{{ $orderdetail->total_order }})</b>
                    <br>
                @endforeach
            </td>
            <td>
               {{ $total_order }}
            </td>
            <td><strong>Rp. {{ number_format($order->total_price) }}</strong></td>
            <td>
                @if ($order->status == 1)
                    Payment is waiting to be confirmed
                @elseif($order->status == 2)
                    Payment was confirmed successfully
                @elseif($order->status == 3)
                    Payment failed to be confirmed
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
