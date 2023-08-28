@extends("layouts.index")
@section("title")
    Tüm Siparişler | By Shirts Collection
@endsection
@section("css")
@endsection
@section("content")
    <div class="card bg-success" style="margin-top: 40px">
        <div class="card-header h1 bg-success text-white">Tüm Siparişler</div>
        <div class="card-body text-white">
            <table>
                <tr>
                    <th>Sipariş Numarası</th>
                    <th>Müşteri Adı Soyadı</th>
                    <th>Müşteri E-Posta</th>
                    <th>Müşteri Telefon Numarası</th>
                    <th>Müşteri Adresi</th>
                    <th>Toplam Tutar</th>
                    <th>Ürünler</th>
                    <th>Durum</th>
                    <th>Kargo Şirketi</th>
                    <th>Kargo Takip No</th>
                    <th>İşlem</th>

                </tr>
                @foreach ($ordersData as $order)
                    <tr>
                        <td>{{ $order->merchant_oid }}</td>
                        <td>{{ $order->user->name . " " . $order->user->surname }}</td>
                        <td>{{ $order->user->email}}</td>
                        <td>{{ $order->user->phone}}</td>
                        <td>{{ $order->user->address}}</td>
                        <td>{{ $order->total_amount }}</td>
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
                        <td>
                            <form action="{{route("orders.edit", ["id" => $order->id])}}" method="GET">
                                @csrf
                                <button type="submit" class="btn btn-warning" style="margin-top:5px;">
                                    Düzenle
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>


@endsection
@section("js")
@endsection
