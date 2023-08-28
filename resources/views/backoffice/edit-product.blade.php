@extends("layouts.index")
@section("title")
   Ürünü Düzenle | By Shirts Collection
@endsection
@section("css")
    @endsection
@section("content")
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card bg-success" style="margin-top: 40px;">
                    <div class="card-header bg-success text-white h1">
                        Ürünü Düzenle
                    </div>
                    <div class="card-body bg-success">
                        <form method="post" action="{{route("product.update", ['id' => $productData->id])}}" enctype="multipart/form-data">
                            @csrf
                            @method("PATCH")
                            <div class="mb-3">
                                <label class="form-label">Ürün Başlığı</label>
                                <input name="edit_product_title" value="{{$productData->name}}" type="text"
                                       class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Ürün Açıklaması</label>
                                <textarea name="edit_product_content" id="editor">{{$productData->description}}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="product_featured_image">Ürün Öne Çıkarılan Resim</label>
                                <input type="file" name="edit_product_featured_image" value="{{$productData->featured_image}}" id="product_featured_image"
                                       class="form-control" accept="image/*">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="images">Ürün Resimleri</label>
                                <input type="file" name="edit_product_images[]" id="images" class="form-control"
                                       multiple>
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Fiyat</label>
                                <input type="text" name="edit_product_price" placeholder="ürün fiyatını giriniz..." value="{{$productData->price}}"
                                       id="price" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="stock_quantity" class="form-label">Stok Sayısı</label>
                                <input type="number" name="edit_product_stock_quantity"
                                       placeholder="stok miktarı giriniz..." value="{{$productData->stock_quantity}}" id="stock_quantity" class="form-control"
                                       required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="tags">Ürün Kategorisi</label>
                                <select name="edit_product_category" class="form-select" aria-label="Default select example">
                                    <option selected disabled>{{$productData->category->name}}</option>
                                    @foreach($categoryData as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="tags">Renk Seç</label>
                                <select name="edit_product_color" class="form-select" aria-label="Default select example">
                                    <option selected disabled>{{$productData->color->name}}</option>
                                    @foreach($colorData as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="tags">Ürün Etiketleri</label>
                                <input type="text" name="edit_product_tags" id="tags" class="form-control" value="@foreach($productData->tags as $item) {{$item->name}} @endforeach">
                            </div>
                            <div class="mb-3">
                                <div class="form-check text-white">
                                    <input class="form-check-input" type="radio" name="edit_is_featured"
                                           id="flexRadioDefault1" value="1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Ürünü Öne Çıkar
                                    </label>
                                </div>
                                <div class="form-check text-white">
                                    <input class="form-check-input" type="radio" name="edit_is_featured"
                                           id="flexRadioDefault2" value="0" checked>
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Ürünü Öne Çıkarma
                                    </label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Ürün Varyasyonları</label>
                                <input name="edit_product_variations" placeholder="varyasyonları virgülle ayırarak giriniz..." type="text"
                                       class="form-control">
                            </div>
                            <button type="submit" class="btn btn-warning">Ürünü Güncelle</button>
                        </form>
                    </div>
                    <div class="card-footer bg-success text-white" style="text-align: center">By Shirts Collection | We
                        Are Shirt Designers
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section("js")
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('editor');
    </script>
@endsection
