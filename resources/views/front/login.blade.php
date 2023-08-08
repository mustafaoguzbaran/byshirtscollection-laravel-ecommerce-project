@extends("layouts.index")
@section("css")
@endsection
@section("content")
    <div class="container">
        <div class="row">
            <div class="card mt-5 bg-success">
                <div class="card-header text-center h1 bg-success text-white">
                    Alışveriş Yapmak İçin Giriş Yap
                </div>
                <div class="card-body ">
                    @if($errors->any())
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger">{{$error}}</div>
                        @endforeach
                    @endif
                    <form method="POST" action="{{route("user.loginCheck")}}">
                        @csrf
                        @method("POST")
                        <div class="mb-3">
                            <label class="form-label">Kullanıcı Adı</label>
                            <input name="login_username" placeholder="kullanıcı adınızı girer misiniz?" type="text" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Şifre</label>
                            <input name="login_password" placeholder="şifrenizi girer misiniz?" type="password" class="form-control">
                        </div>
                        <center><button type="submit" class="btn btn-warning">Giriş Yap!</button></center>
                    </form>
                </div>
                <div class="card-footer text-white" style="text-align: center">By Shirts Collection | We Are Shirt Designers</div>
            </div>
        </div>
    </div>
@endsection
@section("js")
@endsection
