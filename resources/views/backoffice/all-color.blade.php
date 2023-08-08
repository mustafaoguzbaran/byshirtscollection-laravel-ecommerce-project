@extends("layouts.index")
@section("css")
@endsection
@section("content")
    <div class="container">
    <div class="col-lg-12">
        <div class="card bg-success text-white" style="margin-top: 40px">
            <div class="card-header bg-success h1" style="text-align: center">Tüm Renkler</div>
            <div class="card-body"> <table style="text-align: center;">
                    <tr>
                        <th>Renk ID</th>
                        <th>Renk Adı</th>
                        <th>Renk Slug</th>
                        <th>Oluşturulma Tarihi</th>
                        <th>Güncellenme Tarihi</th>
                        <th>İşlem</th>
                    </tr>
                    @foreach($colorData as $color)
                        <tr>
                            <td>{{$color->id}}</td>
                            <td>{{$color->name}}</td>
                            <td>{{$color->slug}}</td>
                            <td>{{$color->created_at}}</td>
                            <td>{{$color->updated_at}}</td>
                            <td>
                                <form action="{{route("product.color.edit", ["id" => $color->id])}}" method="GET">
                                    @csrf
                                    <button type="submit" class="btn btn-warning" style="margin-top:5px;">
                                        Düzenle
                                    </button>
                                </form>
                                <form action="{{route("product.color.destroy", ["id" => $color->id])}}" method="POST">
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
