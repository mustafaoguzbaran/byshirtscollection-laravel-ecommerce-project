@extends("layouts.index")
@section("title")
    Ödeme Başarıyla Gerçekleşti | By Shirts Collection
@endsection
@section("css")
    @endsection
@section("content")
    <div class="container">
        <div class="row">
            <div class="card bg-success" style="margin-top: 40px">
                <div class="card-header bg-success text-white h1">Ödeme Durumunuz</div>
                <div class="card-body text-center text-white">Ödemeniz başarıyla gerçekleşmiştir. Sipariş detaylarınızı "siparişlerim" bölümünden görüntüleyebilirsiniz.<br>
               <a href="{{route("home")}}"><button class="btn btn-warning" style="margin-top: 20px">Anasayfaya Dön!</button></a>
                </div>
            </div>
        </div>
    </div>
@endsection
@section("js")
@endsection
