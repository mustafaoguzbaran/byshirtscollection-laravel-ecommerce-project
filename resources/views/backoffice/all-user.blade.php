@extends("layouts.index")
@section("title")
    Tüm Kullanıcılar | By Shirts Collection
@endsection
@section("css")
    @endsection
@section("content")
    <div class="container">
        <div class="row">
            <div class="card bg-success" style="margin-top: 40px">
                <div class="card-header text-white h1 bg-success ">Tüm Kullanıcılar</div>
                <div class="card-body text-white">
                    <table style="text-align: center;">
                        <tr>
                            <th>ID</th>
                            <th>İsim</th>
                            <th>Soyisim</th>
                            <th>Kullanıcı Adı</th>
                            <th>E-Posta</th>
                            <th>Telefon Numarası</th>
                            <th>Adres</th>
                            <th>Kayıt Tarihi</th>
                            <th>Güncellenme Tarihi</th>
                            <th>İşlem</th>
                        </tr>
                        @foreach($userData as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->surname}}</td>
                                <td>{{$item->username}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->phone}}</td>
                                <td>{{$item->address}}</td>
                                <td>{{$item->created_at}}</td>
                                <td>{{$item->updated_at}}</td>
                                <td>
                                    <form action="{{route("backoffice.user.edit", ["id" => $item->id])}}" method="GET">
                                        @csrf
                                        <button type="submit" class="btn btn-warning" style="margin-top:5px;">
                                            Düzenle
                                        </button>
                                    </form>
                                    <form action="{{route("backoffice.user.destroy", ["id" => $item->id])}}" method="POST">
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
