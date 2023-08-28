@extends("layouts.index")
@section("title")
    Alışveriş Yapmak İçin Üye Ol | By Shirts Collection
@endsection
@section("css")
@endsection
@section("content")
    <div class="container">
        <div class="row">
            <div class="card mt-5 bg-success">
                <div class="card-header text-center h1 bg-success text-white">
                    Alışveriş Yapmak İçin Üye Ol
                </div>
                <div class="card-body ">
                    @if($errors->any())
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger">{{$error}}</div>
                        @endforeach
                    @endif
                    <form method="POST" action="{{route("user.store")}}">
                        @csrf
                        @method("POST")
                        <div class="mb-3">
                            <label class="form-label">İsminiz</label>
                            <input name="register_name" placeholder="isminizi girer misiniz?" type="text" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Soyadınız</label>
                            <input name="register_surname" placeholder="soyadınızı girer misiniz?" type="text" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kullanıcı Adı</label>
                            <input name="register_username" placeholder="kullanıcı adınızı girer misiniz?" type="text" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">E-Posta</label>
                            <input name="register_email" placeholder="e-posta adresinizi girer misiniz?" type="text" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Telefon Numarası</label>
                            <input name="register_phone" placeholder="telefon numaranızı girer misiniz?" type="text" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tam Adres</label>
                            <textarea name="register_address" placeholder="yaşadığınız tam adresi girer misiniz?" type="text" class="form-control"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Şifre</label>
                            <input name="register_password" placeholder="şifrenizi oluşturur musunuz?" type="password" class="form-control">
                        </div>
                        <center><button type="submit" class="btn btn-warning">Üye Ol!</button></center>
                    </form>
                </div>
                <div class="card-footer text-white" style="text-align: center">By Shirts Collection | We Are Shirt Designers</div>
            </div>
        </div>
    </div>
@endsection
@section("js")
@endsection
