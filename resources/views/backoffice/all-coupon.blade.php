@extends("layouts.index")
@section("title")
    Tüm Kuponlar | By Shirts Collection
@endsection
@section("css")
@endsection
@section("content")
    <div class="container">
        <div class="col-lg-12">
            <div class="card bg-success text-white" style="margin-top: 40px">
                <div class="card-header bg-success h1" style="text-align: center">Tüm Kuponlar</div>
                <div class="card-body"> <table style="text-align: center;">
                        <tr>
                            <th>Kupon ID</th>
                            <th>Kupon Kodu</th>
                            <th>İndirim Miktarı</th>
                            <th>Aktif mi?</th>
                            <th>Oluşturulma Tarihi</th>
                            <th>Güncellenme Tarihi</th>
                            <th>İşlem</th>
                        </tr>
                        @foreach($couponData as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->code}}</td>
                                <td>{{$item->discount_amount}}</td>
                                <td>{{$item->is_active}}</td>
                                <td>{{$item->created_at}}</td>
                                <td>{{$item->updated_at}}</td>
                                <td>
                                    <form action="{{route("product.coupon.edit", ["id" => $item->id])}}" method="GET">
                                        @csrf
                                        <button type="submit" class="btn btn-warning" style="margin-top:5px;">
                                            Düzenle
                                        </button>
                                    </form>
                                    <form action="{{route("product.coupon.destroy", ["id" => $item->id])}}" method="POST">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" class="btn btn-danger" style="margin-top:5px; margin-bottom: 5px;">
                                            Sil
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <div class="card-footer" style="text-align: center">By Shirts Collection | We Are Shirt Designers</div>
            </div>
        </div>
    </div>
@endsection
@section("js")
@endsection
