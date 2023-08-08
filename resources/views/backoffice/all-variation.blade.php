@extends("layouts.index")
@section("css")
    @endsection
@section("content")
    <div class="container">
        <div class="col-lg-12">
            <div class="card bg-success text-white" style="margin-top: 40px">
                <div class="card-header bg-success h1" style="text-align: center">Tüm Varyasyonlar</div>
                <div class="card-body"> <table style="text-align: center;">
                        <tr>
                            <th>Varyasyon ID</th>
                            <th>Varyasyon Adı</th>
                            <th>Varyasyon Slug</th>
                            <th>Oluşturulma Tarihi</th>
                            <th>Güncellenme Tarihi</th>
                            <th>İşlem</th>
                        </tr>
                        @foreach($variationData as $variation)
                            <tr>
                                <td>{{$variation->id}}</td>
                                <td>{{$variation->name}}</td>
                                <td>{{$variation->slug}}</td>
                                <td>{{$variation->created_at}}</td>
                                <td>{{$variation->updated_at}}</td>
                                <td>
                                    <form action="{{route("product.category.edit", ['id' => $category->id])}}" method="GET">
                                        @csrf
                                        <button type="submit" class="btn btn-warning" style="margin-top:5px;">
                                            Düzenle
                                        </button>
                                    </form>
                                    <form action="{{route("product.category.delete", ['id' => $category->id])}}" method="POST">
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
