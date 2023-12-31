@extends("layouts.index")
@section("title")
    Blog Yazısını Düzenle | By Shirts Collection
@endsection
@section("css")
@endsection
@section("content")
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card bg-success" style="margin-top: 40px;">
                    <div class="card-header bg-success text-white h1">
                        Blog Yazısını Düzenle
                    </div>
                    <div class="card-body bg-success">
                        <form method="post" action="{{route("blog.update", ["id" => $blogData->id])}}" enctype="multipart/form-data">
                            @csrf
                            @method("PATCH")
                            <label class="form-label">Başlık</label>
                            <input name="edit_post_title" value="{{$blogData->title}}" type="text" class="form-control">
                            <label class="form-label">İçerik</label>
                            <textarea name="edit_post_content" id="editor">{{$blogData->content}}</textarea>
                            <label class="form-label" for="featured_image">Öne Çıkarılan Resim</label>
                            <input type="file" name="edit_post_featured_image" id="featured_image" class="form-control" accept="image/*">
                            <label class="form-label" for="tags">Etiketler</label>
                            <input type="text" name="edit_post_tags" id="tags" class="form-control" placeholder="Etiketleri virgülle ayırarak girin...">
                            <button type="submit" class="btn">İçeriği Düzenle</button>
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
