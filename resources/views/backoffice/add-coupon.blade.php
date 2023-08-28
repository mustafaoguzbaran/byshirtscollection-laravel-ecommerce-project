@extends("layouts.index")
@section("title")
    Kupon Kodu Ekle | By Shirts Collection
@endsection
@section("css")
@endsection
@section("content")
    <div class="container">
        <div class="row">
            <div class="card bg-success" style="margin-top: 40px">
                <div class="card-header bg-success h1 text-white">Kupon Kodu Ekle</div>
                <div class="card-body">
                    @if($errors->any())
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger">{{$error}}</div>
                        @endforeach
                    @endif
                    <form method="post" action="{{route("product.coupon.store")}}" enctype="multipart/form-data">
                        @csrf
                        @method("POST")
                        <div class="mb-3">
                            <label class="form-label">Kupon Kodu</label>
                            <input name="create_product_code" placeholder="kupon kodu giriniz..." type="text" class="form-control">
                        </div>
                        <div class="mb-3">
                            <div class="form-check text-white">
                                <input class="form-check-input" type="radio" name="is_active"
                                       id="flexRadioDefault1" value="1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                   Yüzde Kupon
                                </label>
                            </div>
                            <div class="form-check text-white">
                                <input class="form-check-input" type="radio" name="is_active"
                                       id="flexRadioDefault2" value="0" checked>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Sabit Kupon
                                </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">İndirim Miktarı</label>
                            <input name="create_product_discount_amount" placeholder="indirim miktarını giriniz..." type="text" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-warning">Kupon Kodunu Yayımla</button>
                    </form>
                </div>
                <div class="card-footer text-white">By Shirts Collection | We Are Shirt Designers</div>
            </div>
        </div>
    </div>
@endsection
@section("js")
@endsection
