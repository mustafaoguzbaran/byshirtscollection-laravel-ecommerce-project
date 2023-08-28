@extends("layouts.index")
@section("title")
    Sepetim | By Shirts Collection
@endsection
@section("css")
@endsection
@section("content")
    <div class="container">
        <div class="row">
            <div class="card bg-success" style="margin-top: 40px">
                <div class="card-header bg-success h1 text-white">Sepet</div>
                <div class="card-body">
                    <table style="text-align: center;">
                        <tr>
                            <th>Ürün Görseli</th>
                            <th>Ürün Adı</th>
                            <th>Beden</th>
                            <th>Ürün Fiyatı</th>
                            <th>Miktar</th>
                            <th>İşlem</th>
                        </tr>
                        @foreach($cart->cartItems as $category)
                            <tr class="text-white">
                                <td><img src="{{asset($category->product->featured_image)}}" width="150"></td>
                                <td>{{$category->product->name}}</td>
                                <td>{{$category->variation->name}}</td>
                                <td>{{$category->product->price * $category->quantity. " ₺"}}</td>
                                <td>{{$category->quantity . " Adet"}}</td>
                                <td>
                                    <form action="{{route("cart.destroy", ['id' => $category->id])}}" method="POST">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" class="btn btn-warning"
                                                style="margin-top:5px; margin-bottom: 5px;">
                                            Ürünü Sepetten Sil
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>

                    <table style="text-align: center;">
                        <tr>
                            <th>Toplam Fiyat</th>
                            <th>Toplam Miktar</th>

                        </tr>

                        <tr class="text-white">
                            <td>{{$cart->total_amount . " ₺"}}</td>
                            <td>{{$totalQuantity . " Adet"}}</td>
                        </tr>
                    </table>
                    <div class="col-lg-2 mt-3">
                        <form action="{{route("coupon.apply")}}" method="post">
                            @method("post")
                            @csrf
                            <label class="form-label">Kupon Kodu</label>
                            <input class="form-control" name="coupon_code" placeholder="kupon kodu...">
                            <button class="btn btn-warning" type="submit">Kupon Kodunu Uygula</button>
                        </form>
                    </div>
                    <div class="col-lg-12 mt-3">
                        <a href="{{route("payment.index")}}"><div class="btn btn-warning" style="width: 100%">Sepeti Onayla</div></a>
                    </div>
                </div>
                <div class="card-footer text-white">By Shirts Collection | We Are Shirt Designers</div>
            </div>
        </div>
    </div>
@endsection
@section("js")
@endsection
