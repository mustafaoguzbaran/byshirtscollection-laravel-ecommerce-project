@extends("layouts.index")
@section("title")
    {{$productData->name}} | HoldBell
@endsection
@section("css")
    <style>
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            justify-content: center;
            align-items: center;
            z-index: 999;
        }

        .modal img {
            max-width: 80%;
            max-height: 80%;
        }

        .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 24px;
            color: white;
            cursor: pointer;
        }
    </style>
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
                                    <div class="mb-5">
                                        <div class="main-carousel">
                                            <div class="carousel-cell">
                                                <img src="{{ asset($productData->featured_image) }}" alt="{{$productData->name}}" style="max-height: 750px">
                                            </div>
                                            @foreach($productData->images as $index => $item)
                                                <div class="carousel-cell">
                                                    <img src="{{ asset($item->path) }}" style="max-height: 750px" alt="{{$productData->name}}">
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
                                    <div class="col-lg-12">
                                        <div class="product_desc text-white mt-5" style="text-align: center">
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
                                                    <label class="form-label" for="quantity">Kaç Adet Sepete
                                                        Ekleyelim?</label>
                                                    <input class="form-control" id="product_quantity"
                                                           name="product_quantity" type="number" min="1">
                                                    <input type="hidden" name="product_id"
                                                           value="{{$productData->id}}">
                                                </div>
                                                <button type="submit" class="btn btn-warning mb-3">Sepete Ekle
                                                </button>
                                            </form>
                                        @else
                                            <div class="mb-5">
                                                <a href="{{route("user.create")}}">
                                                    <button class="btn byshirts-cart" style="width: 100%"><i
                                                            class="bi bi-bag"></i> Sepete ürün eklemek için üye olun
                                                        veya giriş yapın!
                                                    </button>
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-lg-12">
                                        <div
                                            class="stock_quantity text-white mb-3">{{"Stok Adedi: ". $productData->stock_quantity}}</div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="product_tag text-white">Ürün
                                            Etiketleri: @foreach($productData->tags as $item)
                                                {{$item->name}}
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
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">

    <script>
        $(document).ready(function() {
            var flkty = new Flickity('.main-carousel', {
                imagesLoaded: true,
                percentPosition: false,
                cellAlign: 'center',
                contain: true
            });

            // Resimlere tıkladığınızda modalı açmak için
            $('.main-carousel').on('click', '.carousel-cell img', function() {
                var imageSrc = $(this).attr('src');
                var modalHtml = '<div class="modal">' +
                    '<img src="' + imageSrc + '">' +
                    '<span class="close-btn">&times;</span>' +
                    '</div>';

                $('body').append(modalHtml);
                $('.modal').fadeIn();
            });

            // Modal dışına tıklandığında veya kapatma butonuna tıklandığında modal kapatılır
            $('body').on('click', '.modal, .close-btn', function() {
                $('.modal').fadeOut(function() {
                    $(this).remove();
                });
            });
        });
    </script>

    <script>
        document.getElementById("product_quantity").defaultValue = "1";
    </script>
@endsection
