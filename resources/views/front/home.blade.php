@extends("layouts.index")
@section("title")
    By Shirts Collection | We are Shirt Designers!
@endsection
@section("css")
@endsection
@section("content")
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{asset($settingsData->slider_one_img)}}" class="d-block w-100" alt="...">
                <div class="carousel-caption">
                    <h5 style="background: #198754; padding: 20px; border-radius: 10px;  opacity: 0.8; border: 2px solid #dadada;">
                        Erkek Gömlek Modellerimiz İçin;</h5>
                    <center><a style="text-decoration: none" href="https://byshirtscollection.com/category/erkek-gomlek-modellerimiz">
                            <button class="button-53" role="button">TIKLAYIN!</button>
                        </a></center>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{asset($settingsData->slider_two_img)}}" class="d-block w-100" alt="...">
                <div class="carousel-caption">
                    <h5 style="background: #198754; padding: 20px; border-radius: 10px; opacity: 0.8; border: 2px solid #dadada;">
                        Kadın Gömlek Modellerimiz İçin;</h5>
                    <center><a style="text-decoration: none" href="https://byshirtscollection.com/category/kadin-gomlek-modellerimiz">
                            <button class="button-53" role="button">TIKLAYIN!</button>
                        </a></center>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="look bg-success" style=" font-size: 20px; text-align: center; color:white; padding: 30px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div class="ads">
                        <i class="bi bi-patch-check"></i><br><a style="font-size: 15px">&nbsp;Kaliteli İşçilik</a>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="ads">
                        <i class="bi bi-hand-thumbs-up"></i><br><a style="font-size: 15px">&nbsp;Maksimum Güvenirlik</a>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="ads">
                        <i class="bi bi-heart"></i><br><a style="font-size: 15px">&nbsp;Özel Tasarımlar</a>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="ads">
                        <i class="bi bi-cash-stack"></i><br><a style="font-size: 15px">&nbsp;Uygun Fiyat Garantisi</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="card h1 bg-success text-white text-center featured_products"
                 style="margin-top: 30px; padding: 10px">Öne Çıkarılan
                Ürünler
            </div>
                @foreach($productData as $product)
                    <div class="col-lg-4">
                        <div class="product" style="margin-bottom: 40px;">
                            <div class="product_card card">
                                <div class="card-header bg-success">
                                    <a class="product_title h5 text-white text-decoration-none">{{$product->name}}</a>
                                </div>
                                <div class="card-body">
                                    <div class="product-img">
                                        <img src="{{asset($product->featured_image)}}" width="300" height="400">
                                    </div>
                                    <center>
                                        <span itemprop="price" style="color: black" class="price-badge main-page-price">{{$product->price}} ₺</span>
                                    </center>
                                    <div
                                        class="product_desc text-muted mt-5" style="height: 140px">{{\Illuminate\Support\Str::limit(strip_tags($product->description), "200", "...")}}</div>
                                </div>
                                <div class="card-footer">
                                    <a href="{{route("product.show", ["slug" => $product->slug."-".$product->id])}}">
                                        <button class="product-button btn" role="button">Ürüne Göz Gezdir!
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            <div class="col-lg-6">
                <div class="card maps">
                    <div class="card-header h1 text-black text-center" style="background-color: #dadada">Biz
                        Neredeyiz?
                    </div>
                    <div class="card-body text-black text-center" style="background-color: #dadada">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3005.9188002428637!2d28.852091075971376!3d41.11446441287978!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14caae26857cc65b%3A0xdda5c5677d3a8229!2zxLBzbWV0cGHFn2EsIE9yZHUgQ2QuIE5vOjMyOCwgMzQyNzAgU3VsdGFuZ2F6aS_EsHN0YW5idWw!5e0!3m2!1str!2str!4v1692949073415!5m2!1str!2str"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card contact" style="margin-bottom: 40px">
                    <div class="card-header bg-success h1 text-white">Bizimle İletişim Kur</div>
                    <div class="card-body bg-success text-white text-center">Telefon: +90 530 231 47 21<br>E-Posta:
                        hello@byshirtscollection.com
                    </div>
                </div>
            </div>
            <section class="deneb_cta">
                <div class="cta_wrapper">
                    <div class="row align-items-center">
                        <div class="col-lg-7">
                            <div class="cta_content">
                                <h3>Biz Kimiz?</h3>
                                <p>2021 yılında kendi tasarımımız ve üretimimiz olan gömleklerimizi satışa sunmaya
                                    başladık. İleri ki yıllarımızda da en iyi tasarımlarımızla ve üretimlerimizle
                                    sizlerin karşısına çıkmaktan onur duyuyoruz.</p>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="button_box">
                                <a href="{{route("contact")}}" class="btn btn-success">Bizimle
                                    iletişim kur</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
@section("js")
    <script>
        // Scroll Reveal konfigürasyonu
        ScrollReveal().reveal('.product_card', {
            delay: 200, // Animasyon gecikmesi (ms)
            distance: '50px', // Animasyon mesafesi
            easing: 'ease-in-out', // Animasyon eğrisi
            origin: 'bottom', // Animasyonun başlama yeri
            interval: 150 // Elemanlar arasındaki gecikme (ms)
        });

        ScrollReveal().reveal('.maps', {
            delay: 200, // Animasyon gecikmesi (ms)
            distance: '50px', // Animasyon mesafesi
            easing: 'ease-in-out', // Animasyon eğrisi
            origin: 'bottom', // Animasyonun başlama yeri
            interval: 150 // Elemanlar arasındaki gecikme (ms)
        });

        ScrollReveal().reveal('.contact', {
            delay: 200, // Animasyon gecikmesi (ms)
            distance: '50px', // Animasyon mesafesi
            easing: 'ease-in-out', // Animasyon eğrisi
            origin: 'bottom', // Animasyonun başlama yeri
            interval: 150 // Elemanlar arasındaki gecikme (ms)
        });

        ScrollReveal().reveal('.cta_wrapper, .cta_content, .button_box', {
            delay: 200,
            distance: '50px',
            easing: 'ease-in-out',
            origin: 'bottom',
            interval: 150
        });

        ScrollReveal().reveal('.look', {
            delay: 200,
            distance: '50px',
            easing: 'ease-in-out',
            origin: 'bottom',
            interval: 150
        });

        ScrollReveal().reveal('featured_products', {
            delay: 200,
            distance: '50px',
            easing: 'ease-in-out',
            origin: 'bottom',
            interval: 150
        });
    </script>

@endsection
