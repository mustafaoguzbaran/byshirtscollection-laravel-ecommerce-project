@extends("layouts.index")
@section("title")
    Blog Yazısı Ekle | By Shirts Collection
@endsection
@section("css")
    @endsection
@section("content")
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card bg-success" style="margin-top: 40px;">
                    <div class="card-header bg-success text-white h1">
                        Blog Yazısı Ekle
                    </div>
                    <div class="card-body bg-success">
                        @if($errors->any())
                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger">{{$error}}</div>
                            @endforeach
                        @endif
                        <form method="post" action="{{route("blog.store")}}" enctype="multipart/form-data">
                            @csrf
                            @method("POST")
                            <label class="form-label">Başlık</label>
                            <input name="create_post_title" placeholder="İçerik Başlığınızı Giriniz..." type="text" class="form-control">
                            <label class="form-label">İçerik</label>
                            <textarea name="create_post_content" id="editor"></textarea>
                            <label class="form-label" for="featured_image">Öne Çıkarılan Resim</label>
                            <input type="file" name="create_post_featured_image" id="featured_image" class="form-control" accept="image/*">
                            <label class="form-label" for="tags">Etiketler</label>
                            <input type="text" name="create_post_tags" id="tags" class="form-control" placeholder="Etiketleri virgülle ayırarak girin...">
                            <button type="submit" class="btn btn-warning">İçeriği Yayımla</button>
                        </form>
                    </div>
                    <div class="card-footer bg-success text-white" style="text-align: center">By Shirts Collection | We Are Shirt Designers</div>
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
