@extends("layouts.index")
@section("title")
    Tüm Ürünler | By Shirts Collection
@endsection
@section("css")
    @endsection
@section("content")
    <div class="container">
        <div clasS="row">
            <div class="card bg-success" style="margin-top: 40px">
                <div class="card-header bg-success h1 text-white">Tüm Ürünler</div>
                <div class="card-body text-white">
                    <table style="text-align: center;">
                        <tr>
                            <th>Öne Çıkarılan Resim</th>
                            <th>Ürün ID</th>
                            <th>Ürün Adı</th>
                            <th>Ürün Açıklaması</th>
                            <th>Ürün Fiyatı</th>
                            <th>Ürün Slug</th>
                            <th>Oluşturulma Tarihi</th>
                            <th>Güncellenme Tarihi</th>
                            <th>İşlem</th>
                        </tr>
                        @foreach($productData as $item)
                            <tr>
                                <td><img src="{{asset($item->featured_image)}}" width="150"></td>
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{\Illuminate\Support\Str::limit(strip_tags($item->description), "200", "...")}}</td>
                                <td>{{$item->price . " ₺"}}</td>
                                <td>{{$item->slug}}</td>
                                <td>{{$item->created_at}}</td>
                                <td>{{$item->updated_at}}</td>
                                <td>
                                    <form action="{{route("product.edit", ["id" => $item->id])}}" method="GET">
                                        @csrf
                                        <button type="submit" class="btn btn-warning" style="margin-top:5px;">
                                            Düzenle
                                        </button>
                                    </form>
                                    <form action="{{route("product.destroy", ["id" => $item->id])}}" method="POST">
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
            </div>
        </div>
    </div>
@endsection
@section("js")
@endsection
