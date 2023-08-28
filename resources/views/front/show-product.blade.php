@extends("layouts.index")
@section("title")
    {{$productData->name}} | HoldBell
@endsection
@section("css")
@endsection
@section("content")
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card bg-success" style="margin-top: 40px">
                    <div class="card-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="img-magnifier-container">
                                        <img alt="featured-image"
                                             style="width: 600px; height: 700px; border-radius: 10px" id="myimage"
                                             src="{{asset($productData->featured_image)}}">
                                    </div>
                                    <div class="product_image">
                                        <div class="row">
                                        @foreach($productData->images as $item)
                                            <div class="col-lg-3">
                                                <img style="width: 100px; height: 150px" src="{{asset($item->path)}}" class="clickable-image">
                                            </div>
                                        @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    @if($errors->any())
                                        @foreach($errors->all() as $error)
                                            <div class="alert alert-danger">{{$error}}</div>
                                        @endforeach
                                    @endif
                                    <div class="product_title h1 text-white"
                                         style="text-align: center">{{ $productData->name }}</div>
                                    <div class="col-lg-12 mt-5" style="text-align: center">
                                        <span itemprop="price" style="color: black"
                                              class="price-badge main-page-price h5">{{ $productData->price }} ₺</span>
                                    </div>
                                    <div class="col-lg-12"><div class="product_desc text-white mt-5" style="text-align: center">
                                            {!! $productData->description !!}
                                        </div>

                                    </div>
                                    <div class="col-lg-12">
                                        @if(\Illuminate\Support\Facades\Auth::check())
                                        <form method="POST" action="{{route("cart.store")}}">
                                            @csrf
                                            @method("POST")
                                            <div class="mb-3">
                                                <label class="form-label" for="tags">Beden Seçiniz</label>
                                                <select name="product_variation" class="form-select mb-3"
                                                        aria-label="Default select example">
                                                    <option selected disabled>Lütfen Bedeninizi Seçin</option>
                                                    @foreach($productData->variations as $item)
                                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                                    @endforeach
                                                </select>
                                                <label class="form-label" for="quantity">Kaç Adet Sepete Ekleyelim?</label>
                                                <input class="form-control" id="product_quantity" name="product_quantity" type="number" min="1" >
                                                <input type="hidden" name="product_id" value="{{$productData->id}}">
                                            </div>
                                            <button type="submit" class="btn btn-warning mb-3">Sepete Ekle</button>
                                        </form>
                                        @else
                                            <div class="mb-5">
                                            <a href="{{route("user.create")}}"><button class="btn byshirts-cart" style="width: 100%"><i class="bi bi-bag"></i> Sepete ürün eklemek için üye olun veya giriş yapın!</button></a>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-lg-12">
                                        <div
                                            class="stock_quantity text-white mb-3">{{"Stok Adedi: ". $productData->stock_quantity}}</div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="product_tag text-white">@foreach($productData->tags as $item)
                                                {{"Ürün Etiketleri: ". $item->name}}
                                            @endforeach</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section("js")
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 </script>
    <script>
        $(document).ready(function () {
            var previousFeaturedImage = "{{ asset($productData->featured_image) }}"; // Önceki ana resmin kaynağını sakla

            $(".clickable-image").click(function () {
                var newImageSrc = $(this).attr("src");
                var currentFeaturedImageSrc = $("#myimage").attr("src");

                $("#myimage").attr("src", newImageSrc); // Ana resmin kaynağını tıklanan resmin kaynağıyla değiştir
                $(this).attr("src", currentFeaturedImageSrc); // Tıklanan resmin kaynağını önceki ana resmin kaynağıyla değiştir
                previousFeaturedImage = newImageSrc; // Önceki ana resmin kaynağını güncelle
                magnify("myimage", 3); // Büyüteci güncel resimle tekrar başlat
            });
        });

        function magnify(imgID, zoom) {
            var img, glass, w, h, bw;
            img = document.getElementById(imgID);
            glass = document.querySelector(".img-magnifier-glass");

            // Büyüteç kodunu burada düzenleyin
            // ...

            // Büyüteçi güncellenen resimle başlat
            glass.style.backgroundImage = "url('" + img.src + "')";
            glass.style.backgroundSize = (img.width * zoom) + "px " + (img.height * zoom) + "px";

            glass.style.display = "none"; // Önce gizle
            img.addEventListener("mouseenter", function () {
                glass.style.display = "block"; // Fare resmin üstüne geldiğinde görüntülenir
            });
            img.addEventListener("mousemove", moveMagnifier);
            img.addEventListener("mouseleave", function () {
                glass.style.display = "none"; // Fare resmin dışına çıktığında gizlenir
            });

            // Büyüteç kodunu burada başlat
            // ...
        }

        magnify("myimage", 3); // Sayfa yüklendiğinde büyüteci başlat
    </script>
    <script>
        function magnify(imgID, zoom) {
            var img, glass, w, h, bw;
            img = document.getElementById(imgID);
            /*create magnifier glass:*/
            glass = document.createElement("DIV");
            glass.setAttribute("class", "img-magnifier-glass");
            /*insert magnifier glass:*/
            img.parentElement.insertBefore(glass, img);
            /*set background properties for the magnifier glass:*/
            glass.style.backgroundImage = "url('" + img.src + "')";
            glass.style.backgroundRepeat = "no-repeat";
            glass.style.backgroundSize = (img.width * zoom) + "px " + (img.height * zoom) + "px";
            bw = 3;
            w = glass.offsetWidth / 2;
            h = glass.offsetHeight / 2;
            /*execute a function when someone moves the magnifier glass over the image:*/
            img.addEventListener("mouseenter", function () {
                glass.style.display = "block"; // Fare resmin üstüne geldiğinde görüntülenir
            });

            img.addEventListener("mousemove", moveMagnifier);
            img.addEventListener("mouseleave", function () {
                glass.style.display = "none"; // Fare resmin dışına çıktığında gizlenir
            });

            function moveMagnifier(e) {
                var pos, x, y;
                /*prevent any other actions that may occur when moving over the image*/
                e.preventDefault();
                /*get the cursor's x and y positions:*/
                pos = getCursorPos(e);
                x = pos.x;
                y = pos.y;
                /*prevent the magnifier glass from being positioned outside the image:*/
                if (x > img.width - (w / zoom)) {
                    x = img.width - (w / zoom);
                }
                if (x < w / zoom) {
                    x = w / zoom;
                }
                if (y > img.height - (h / zoom)) {
                    y = img.height - (h / zoom);
                }
                if (y < h / zoom) {
                    y = h / zoom;
                }
                /*set the position of the magnifier glass:*/
                glass.style.left = (x - w) + "px";
                glass.style.top = (y - h) + "px";
                /*display what the magnifier glass "sees":*/
                glass.style.backgroundPosition = "-" + ((x * zoom) - w + bw) + "px -" + ((y * zoom) - h + bw) + "px";
            }

            function getCursorPos(e) {
                var a, x = 0, y = 0;
                e = e || window.event;
                /*get the x and y positions of the image:*/
                a = img.getBoundingClientRect();
                /*calculate the cursor's x and y coordinates, relative to the image:*/
                x = e.pageX - a.left;
                y = e.pageY - a.top;
                /*consider any page scrolling:*/
                x = x - window.pageXOffset;
                y = y - window.pageYOffset;
                return {x: x, y: y};
            }
        }

        magnify("myimage", 3);
    </script>
    <script>
        document.getElementById("product_quantity").defaultValue = "1";
    </script>
@endsection
