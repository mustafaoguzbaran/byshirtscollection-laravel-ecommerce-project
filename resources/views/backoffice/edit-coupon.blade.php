@extends("layouts.index")
@section("title")
    Kupon Kodunu Düzenle | By Shirts Collection
@endsection
@section("css")
@endsection
@section("content")
    <div class="container">
        <div class="col-lg-12">
            <div class="card bg-success text-white" style="margin-top: 40px">
                <div class="card-header bg-success h1">Kupon Kodunu Düzenle</div>
                <div class="card-body">
                    @if($errors->any())
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger">{{$error}}</div>
                        @endforeach
                    @endif
                    <form method="post" action="{{route("product.coupon.update", ["id" => $couponData->id])}}">
                        @csrf
                        @method("PATCH")
                        <div class="mb-3">
                            <label class="form-label">Kodu Düzenle</label>
                            <input name="edit_product_coupon_code" value="{{$couponData->code}}" type="text"
                                   class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">İndirim Miktarını Düzenle</label>
                            <input name="edit_product_coupon_discount_amount" value="{{$couponData->discount_amount}}"
                                   type="text"
                                   class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Aktif veya Pasif Et</label>
                            <select name="edit_product_coupon_is_active" class="form-select"
                                    aria-label="Default select example">
                                <option selected disabled>Lütfen Aktiflik veya Pasiflik Seçiniz</option>
                                <option value="1">Aktif</option>
                                <option value="0">Pasif</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-warning">Kupon Kodunu Düzenle</button>
                    </form>
                </div>
                <div class="card-footer">By Shirts Collection | We Are Shirt Designers</div>
            </div>
        </div>
    </div>
@endsection
@section("js")
@endsection
