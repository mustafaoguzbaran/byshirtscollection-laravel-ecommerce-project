@extends("layouts.index")
@section("title")
    Toplu Fiyat Ekleme veya Çıkarma | By Shirts Collection
@endsection
@section("css")
    @endsection
@section("content")
    <div class="container">
        <div class="col-lg-12">
            <div class="card bg-success text-white" style="margin-top: 40px">
                <div class="card-header bg-success h1">Toplu Fiyat Ekleme veya Çıkarma</div>
                <div class="card-body">
                    @if($errors->any())
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger">{{$error}}</div>
                        @endforeach
                    @endif
                    <form method="post" action="{{route("product.price.update")}}">
                        @csrf
                        @method("PATCH")
                        <div class="mb-3">
                            <label class="form-label">Ne Kadar Ekleyelim veya Çıkaralım?</label>
                            <input name="bulk_product_price_update" placeholder="lütfen eklemek veya çıkarmak istediğiniz fiyatı giriniz..." type="text"
                                   class="form-control">
                        </div>
                        <button type="submit" class="btn btn-warning">Fiyatları Toplu Olarak Güncelle</button>
                    </form>
                </div>
                <div class="card-footer">By Shirts Collection | We Are Shirt Designers</div>
            </div>
        </div>
    </div>
@endsection
@section("js")
@endsection
