@extends("layouts.index")
@section("title")
    Siparişi Düzenle | By Shirts Collection
@endsection
@section("css")
@endsection
@section("content")
    <div class="container">
        <div class="col-lg-12">
            <div class="card bg-success text-white" style="margin-top: 40px">
                <div class="card-header bg-success h1">Siparişi Düzenle</div>
                <div class="card-body">
                    @if($errors->any())
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger">{{$error}}</div>
                        @endforeach
                    @endif
                    <form method="post" action="{{route("orders.update", ['id' => $orderData->id])}}">
                        @csrf
                        @method("PATCH")
                        <div class="mb-3">
                            <label class="form-label" for="tags">Ürün Kategorisi</label>
                            <select name="edit_orders_status" class="form-select" aria-label="Default select example">
                                <option selected disabled>Lütfen Statü Seçiniz</option>
                                @foreach($statusData as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kargo Firması</label>
                            <input name="edit_orders_cargo_company" value="{{$orderData->cargo_company}}" type="text"
                                   class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kargo Takip Numarası</label>
                            <input name="edit_orders_cargo_tracking_number" value="{{$orderData->	cargo_tracking_number}}" type="text"
                                   class="form-control">
                        </div>
                        <button type="submit" class="btn btn-warning">Statü Güncelle</button>
                    </form>
                </div>
                <div class="card-footer">By Shirts Collection | We Are Shirt Designers</div>
            </div>
        </div>
    </div>
@endsection
@section("js")
@endsection
