@extends("layouts.index")
@section("css")
@endsection
@section("content")
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card bg-success" style="margin-top: 40px;">
                    <div class="card-header bg-success text-white h1">
                        Yeni Renk Ekle
                    </div>
                    <div class="card-body bg-success">
                        <form method="post" action="{{route("product.color.store")}}" enctype="multipart/form-data">
                            @csrf
                            @method("POST")
                            <div class="mb-3">
                                <label class="form-label">Renk Başlığı</label>
                                <input name="create_product_color_name" placeholder="renk ismini giriniz..." type="text" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-warning">Rengi Yayımla</button>
                        </form>
                    </div>
                    <div class="card-footer bg-success text-white" style="text-align: center">By Shirts Collection | We Are Shirt Designers</div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section("js")
@endsection
