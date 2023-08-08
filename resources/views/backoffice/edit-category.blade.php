@extends("layouts.index")
@section("css")
@endsection
@section("content")
    <div class="container">
        <div class="col-lg-12">
            <div class="card bg-success text-white" style="margin-top: 40px">
                <div class="card-header bg-success h1">Kategoriyi Düzenle</div>
                <div class="card-body">
                    @if($errors->any())
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger">{{$error}}</div>
                        @endforeach
                    @endif
                    <form method="post" action="{{route("product.category.update", ['id' => $categoryData->id])}}">
                        @csrf
                        @method("PATCH")
                        <div class="mb-3">
                            <label class="form-label">Kategori Adı</label>
                            <input name="edit_product_category_name" value="{{$categoryData->name}}" type="text"
                                   class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kategori Slug</label>
                            <input name="edit_product_category_slug" value="{{$categoryData->slug}}" type="text" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-warning">Kategoriyi Güncelle</button>
                    </form>
                </div>
                <div class="card-footer">By Shirts Collection | We Are Shirt Designers</div>
            </div>
        </div>
    </div>
@endsection
@section("js")
@endsection
