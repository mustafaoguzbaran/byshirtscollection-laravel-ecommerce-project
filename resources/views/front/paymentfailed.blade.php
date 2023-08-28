@extends("layouts.index")
@section("title")
    Ödemede Bir Hata Oluştu | By Shirts Collection
@endsection
@section("css")
@endsection
@section("content")
    <div class="container">
        <div class="row">
            <div class="card bg-success" style="margin-top: 40px">
                <div class="card-header bg-success h1 text-white">Ödeme Durumunuz</div>
                <div class="card-body text-white text-center">Ödemenizi alırken bir sorun oluştu. Lütfen bizimle iletişime geçer misiniz?<br>
                    <a href="{{route("home")}}"><button class="btn btn-warning" style="margin-top: 20px">Anasayfaya Dön!</button></a>
                </div>
            </div>
        </div>
    </div>
@endsection
@section("js")
@endsection
