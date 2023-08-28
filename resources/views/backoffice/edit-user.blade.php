@extends("layouts.index")
@section("title")
    Kullanıcıyı Düzenle | By Shirts Collection
@endsection
@section("css")
    @endsection
@section("content")
    <div class="container">
        <div class="row">
            <div class="card mt-5 bg-success">
                <div class="card-header text-center h1 bg-success text-white">
                    Kullanıcıyı Düzenle
                </div>
                <div class="card-body ">
                    @if($errors->any())
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger">{{$error}}</div>
                        @endforeach
                    @endif
                    <form method="POST" action="{{route("backoffice.user.update", ['id' => $backofficeUserData->id])}}">
                        @csrf
                        @method("PATCH")
                        <div class="mb-3">
                            <label class="form-label">İsminiz</label>
                            <input name="update_backoffice_user_name" value="{{$backofficeUserData->name}}"  type="text" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Soyadınız</label>
                            <input name="update_backoffice_user_surname" value="{{$backofficeUserData->surname}}" type="text" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kullanıcı Adı</label>
                            <input name="update_backoffice_user_username" value="{{$backofficeUserData->username}}" type="text" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">E-Posta</label>
                            <input name="update_backoffice_user_email" value="{{$backofficeUserData->email}}" type="text" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Telefon Numarası</label>
                            <input name="update_backoffice_user_phone" value="{{$backofficeUserData->phone}}" type="text" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tam Adres</label>
                            <textarea name="update_backoffice_user_address" type="text" class="form-control">{{$backofficeUserData->address}}</textarea>
                        </div>
                        <label class="form-label">Yetki Ver</label>
                        <select name="update_backoffice_user_role" class="form-select" aria-label="Default select example">
                            <option value="{{$backofficeUserData->roles[0]['id']}}" selected>{{$backofficeUserData->getRoleNames()->implode(",")}}</option>
                            @foreach($roleData as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                        <div class="mb-3">
                            <label class="form-label">Şifre</label>
                            <input name="update_backoffice_user_password" placeholder="şifrenizi yenilemek isterseniz bu kısmı doldurun..." type="password" class="form-control">
                        </div>
                        <center><button type="submit" class="btn btn-warning">Kullanıcıyı Düzenle!</button></center>
                    </form>
                </div>
                <div class="card-footer text-white" style="text-align: center">By Shirts Collection | We Are Shirt Designers</div>
            </div>
        </div>
    </div>
@endsection
@section("js")
@endsection
