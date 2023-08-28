@extends("layouts.index")
@section("title")
    Siparişlerim | By Shirts Collection
@endsection
@section("css")
@endsection
@section("content")
    <div class="card bg-success" style="margin-top: 40px">
        <div class="card-header h1 bg-success text-white">Siparişlerim</div>
        <div class="card-body text-white">
                <table>
                    <tr>
                        <th>Sipariş Numarası</th>
                        <th>Toplam Tutar</th>
                        <th>Ürünler</th>
                        <th>Durum</th>
                        <th>Kargo Şirketi</th>
                        <th>Kargo Takip No</th>

                    </tr>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->merchant_oid }}</td>
                            <td>{{ $order->total_amount }} ₺</td>
                            <td>
                                <ul>
                                    @foreach ($order->orderItems as $orderItem)

                                        <li><img src="{{asset($orderItem->product->featured_image)}}" width="100"> {{ $orderItem->product->name }} - {{ $orderItem->quantity }} adet - {{ $orderItem->price }} ₺ - {{$orderItem->variations->name}} beden</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>{{ $order->status->name }}</td>
                            <td>{{ $order->cargo_company }}</td>
                            <td>{{ $order->cargo_tracking_number }}</td>
                        </tr>
                    @endforeach
                </table>
        </div>
    </div>


@endsection
@section("js")
@endsection
