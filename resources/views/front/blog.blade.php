@extends("layouts.index")
@section("title")
    Blog | By Shirts Collection
@endsection
@section("css")
@endsection
@section("content")
    <div class="container">
        <div class="row">
            @if($getBlogData->isEmpty() == true)
                <div class="text-success h1 text-center" style="margin-top: 240px">Burada hiç bir ürün bulunamadı!</div>
            @else
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
            @endif
        </div>
    </div>
@endsection
@section("js")
@endsection
