@extends("layouts.index")
@section("css")
@endsection
@section("content")
    <div class="container">
        <div class="row">
            @foreach($getBlogData as $item)
            <div class="col-lg-6">
                <div class="product">
                    <div class="product_card card">
                        <div class="card-header bg-success">
                            <a class="product_title h3 text-white text-decoration-none">{{$item->title}}</a>
                        </div>
                        <div class="card-body">
                            <div class="product-img">
                                <img src="{{asset($item->featured_image)}}" width="300" height="400">
                            </div>
                            <center>
                                <span itemprop="price" style="color: black" class="price-badge main-page-price">Blog</span>
                            </center>
                            <div class="product_desc text-muted mt-4 align-items-center">{{\Illuminate\Support\Str::limit(strip_tags($item->content), "200", "...")}}</div>
                        </div>
                        <div class="card-footer">
                            <a href ="{{route("blog.show", ["slug" => $item->slug])}}">
                                <button class="product-button btn btn-warning" role="button">Blog Yazısını Görüntüle!</button></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <section class="deneb_cta">
                <div class="cta_wrapper">
                    <div class="row align-items-center">
                        <div class="col-lg-7">
                            <div class="cta_content">
                                <h3>Biz Kimiz?</h3>
                                <p>2021 yılında kendi tasarımımız ve üretimimiz olan gömleklerimizi satışa sunmaya başladık. İleri ki yıllarımızda da en iyi tasarımlarımızla ve üretimlerimizle sizlerin karşısına çıkmaktan onur duyuyoruz.</p>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="button_box">
                                <a href="https://byshirtscollection.com/iletisim/" class="btn btn-success">Bizimle iletişim kur</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
@section("js")
@endsection
