@extends("layouts.index")
@section("title")
    Statü Ekle | By Shirts Collection
@endsection
@section("css")
@endsection
@section("content")
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card bg-success" style="margin-top: 40px;">
                    <div class="card-header bg-success text-white h1">
                        Statü Ekle
                    </div>
                    <div class="card-body bg-success">
                        @if($errors->any())
                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger">{{$error}}</div>
                            @endforeach
                        @endif
                        <form method="post" action="{{route("status.store")}}" enctype="multipart/form-data">
                            @csrf
                            @method("POST")
                            <div class="mb-3">
                                <label class="form-label">Statü Başlığı</label>
                                <input name="create_product_status_name" placeholder="statü ismini giriniz..." type="text" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-warning">Statüyü Yayımla</button>
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
