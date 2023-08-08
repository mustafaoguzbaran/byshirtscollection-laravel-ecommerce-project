@extends("layouts.index")
@section("css")
@endsection
@section("content")
    <div class="container">
        <div class="col-lg-12">
            <div class="card bg-success text-white" style="margin-top: 40px">
                <div class="card-header bg-success h1" style="text-align: center">Tüm Blog İçerikleri</div>
                <div class="card-body"> <table style="text-align: center;">
                        <tr>
                            <th>Blog ID</th>
                            <th>Blog Başlığı</th>
                            <th>Blog İçeriği</th>
                            <th>Blog Öne Çıkarılan Resim</th>
                            <th>Blog Etiketleri</th>
                            <th>Blog Slug</th>
                            <th>Oluşturulma Tarihi</th>
                            <th>Güncellenme Tarihi</th>
                            <th>İşlem</th>
                        </tr>
                        @foreach($blogData as $blog)
                            <tr>
                                <td>{{$blog->id}}</td>
                                <td>{{$blog->title}}</td>
                                <td>{!! htmlspecialchars_decode($blog->content) !!}</td>
                                <td><img width="100" src="{{asset($blog->featured_image)}}"></td>
                                <td>@foreach($blog->tags as $tag) {{$tag->name}}@endforeach</td>
                                <td>{{$blog->slug}}</td>
                                <td>{{$blog->created_at}}</td>
                                <td>{{$blog->updated_at}}</td>
                                <td>
                                    <form action="#" method="GET">
                                        @csrf
                                        <button type="submit" class="btn btn-warning" style="margin-top:5px;">
                                            Düzenle
                                        </button>
                                    </form>
                                    <form action="{{route("blog.destroy", ["id" => $blog->id])}}" method="POST">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" class="btn btn-danger" style="margin-top:5px; margin-bottom: 5px;">
                                            Sil
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <div class="card-footer" style="text-align: center">By Shirts Collection | We Are Shirt Designers</div>
            </div>
        </div>
    </div>
@endsection
@section("js")
@endsection
