@extends("layouts.index")
@section("css")
    @endsection
@section("content")
    <div class="container">
        <div class="row">
            @if($products->isEmpty() == true)
                <div class="text-success h1 text-center" style="margin-top: 240px">Burada hiç bir ürün bulunamadı!</div>
            @else
            @foreach($products as $product)
                    @section("title")
                        {{$product->category->name}} | We are Shirt Designers!
                    @endsection
                <div class="col-lg-4">
                    <div class="product">
                        <div class="product_card card">
                            <div class="card-header bg-success">
                                <a href="{{route("product.show", ["slug" => $product->slug."-".$product->id])}}" class="product_title h5 text-white text-decoration-none">{{$product->name}}</a>
                            </div>
                            <div class="card-body">
                                <div class="product-img">
                                    <a href="{{route("product.show", ["slug" => $product->slug."-".$product->id])}}"><img src="{{asset($product->featured_image)}}" width="300" height="400"></a>
                                </div>
                                <center>
                                    <span itemprop="price" style="color: black" class="price-badge main-page-price">{{$product->price}} ₺</span>
                                </center>
                                <div class="product_desc text-muted mt-5" style="height: 140px">
                                    {{ Illuminate\Support\Str::limit(strip_tags(html_entity_decode($product->description)), 200, '...') }}
                                </div>

                            </div>
                            <div class="card-footer">
                                <a href ="{{route("product.show", ["slug" => $product->slug."-".$product->id])}}">
                                    <button class="product-button btn" role="button">Ürüne Göz Gezdir!</button></a>
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
   <script> ScrollReveal().reveal('.product_card', {
    delay: 200, // Animasyon gecikmesi (ms)
    distance: '50px', // Animasyon mesafesi
    easing: 'ease-in-out', // Animasyon eğrisi
    origin: 'bottom', // Animasyonun başlama yeri
    interval: 150 // Elemanlar arasındaki gecikme (ms)
    });
   </script>
@endsection
