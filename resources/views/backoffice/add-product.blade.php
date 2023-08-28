@extends("layouts.index")
@section("title")
    Yeni Ürün Ekle | By Shirts Collection
@endsection
@section("css")
@endsection
@section("content")
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card bg-success" style="margin-top: 40px;">
                    <div class="card-header bg-success text-white h1">
                        Yeni Ürün Ekle
                    </div>
                    <div class="card-body bg-success">
                        <form method="post" action="{{route("product.store")}}" enctype="multipart/form-data">
                            @csrf
                            @method("POST")
                            <div class="mb-3">
                                <label class="form-label">Ürün Başlığı</label>
                                <input name="create_product_title" placeholder="Ürün Başlığınızı Giriniz..." type="text"
                                       class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Ürün Açıklaması</label>
                                <textarea name="create_product_content" id="editor"></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="product_featured_image">Ürün Öne Çıkarılan Resim</label>
                                <input type="file" name="create_product_featured_image" id="product_featured_image"
                                       class="form-control" accept="image/*">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="images">Ürün Resimleri</label>
                                <input type="file" name="create_product_images[]" id="images" class="form-control"
                                       multiple>
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Fiyat</label>
                                <input type="text" name="create_product_price" placeholder="ürün fiyatını giriniz..."
                                       id="price" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="stock_quantity" class="form-label">Stok Sayısı</label>
                                <input type="number" name="create_product_stock_quantity"
                                       placeholder="stok miktarı giriniz..." id="stock_quantity" class="form-control"
                                       required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="tags">Ürün Kategorisi</label>
                                <select name="create_product_category" class="form-select" aria-label="Default select example">
                                    <option selected disabled>Lütfen Kategori Seçin</option>
                                    @foreach($categoryData as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="tags">Renk Seç</label>
                                <select name="create_product_color" class="form-select" aria-label="Default select example">
                                    <option selected disabled>Lütfen Renk Seçin</option>
                                    @foreach($colorData as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="tags">Ürün Etiketleri</label>
                                <input type="text" name="create_product_tags" id="tags" class="form-control"
                                       placeholder="Etiketleri virgülle ayırarak girin...">
                            </div>
                            <div class="mb-3">
                                <div class="form-check text-white">
                                    <input class="form-check-input" type="radio" name="is_featured"
                                           id="flexRadioDefault1" value="1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Ürünü Öne Çıkar
                                    </label>
                                </div>
                                <div class="form-check text-white">
                                    <input class="form-check-input" type="radio" name="is_featured"
                                           id="flexRadioDefault2" value="0" checked>
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Ürünü Öne Çıkarma
                                    </label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Ürün Varyasyonları</label>
                                <input name="create_product_variations" placeholder="ürün varyasyonlarını virgülle ayırarak girin..." type="text"
                                       class="form-control">
                            </div>
                            <button type="submit" class="btn btn-warning">Ürünü Yayımla</button>
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
