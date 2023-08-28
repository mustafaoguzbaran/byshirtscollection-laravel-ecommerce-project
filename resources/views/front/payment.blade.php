@extends("layouts.index")
@section("title")
    Ödemenizi Güvenle Yapın | By Shirts Collection
@endsection
@section("css")
    @endsection
@section("content")
    <div class="container">
        <div class="row">
            <div class="card bg-success" style="margin-top: 40px;">
                <div class="card-header bg-success h1 text-white">Ödemenizi Güvenle Yapın</div>
                <div class="card-body bg-success" style="">
                    <!-- Ödeme formunun açılması için gereken HTML kodlar / Başlangıç -->
                    <script src="https://www.paytr.com/js/iframeResizer.min.js"></script>
                    <iframe src="https://www.paytr.com/odeme/guvenli/<?php echo $token;?>" id="paytriframe" frameborder="0" scrolling="no" style="width: 100%;"></iframe>
                    <script>iFrameResize({},'#paytriframe');</script>
                    <!-- Ödeme formunun açılması için gereken HTML kodlar / Bitiş -->
                </div>
            </div>
        </div>
    </div>
@endsection
@section("js")
@endsection
