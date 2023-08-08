@extends("layouts.index")
@section("css")
@endsection
@section("content")
    <div class="container">
        <div class="row">
            <div class="card mt-5 bg-success">
                <div class="card-header text-center h1 bg-success text-white">
                    Hesabım
                </div>
                <div class="card-body ">
                    @if($errors->any())
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger">{{$error}}</div>
                        @endforeach
                    @endif
                    <form method="POST" action="{{route("user.update")}}">
                        @csrf
                        @method("POST")
                        <div class="mb-3">
                            <label class="form-label">İsminiz</label>
                            <input name="update_name" value="{{$getUserData->name}}"  type="text" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Soyadınız</label>
                            <input name="update_surname" value="{{$getUserData->surname}}" type="text" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kullanıcı Adı</label>
                            <input name="update_username" value="{{$getUserData->username}}" type="text" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">E-Posta</label>
                            <input name="update_email" value="{{$getUserData->email}}" type="text" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Telefon Numarası</label>
                            <input name="update_phone" value="{{$getUserData->phone}}" type="text" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Yaşadığınız Şehir</label>
                            <input name="update_city" value="{{$getUserData->city}}" type="text" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Yaşadığınız İlçe</label>
                            <input name="update_district" value="{{$getUserData->district}}" type="text" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tam Adres</label>
                            <textarea name="update_address" type="text" class="form-control">{{$getUserData->address}}</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Şifre</label>
                            <input name="update_password" placeholder="şifrenizi yenilemek isterseniz bu kısmı doldurun..." type="password" class="form-control">
                        </div>
                        <center><button type="submit" class="btn btn-warning">Hesabımı Düzenle!</button></center>
                    </form>
                </div>
                <div class="card-footer text-white" style="text-align: center">By Shirts Collection | We Are Shirt Designers</div>
            </div>
        </div>
    </div>
@endsection
@section("js")
@endsection
