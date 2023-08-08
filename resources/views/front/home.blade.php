@extends("layouts.index")
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
                    <h5 style="background: #198754; padding: 20px; border-radius: 10px; transform: rotate(-2deg); opacity: 0.8; border: 2px solid #ffc107;">
                        Erkek Gömlek Modellerimiz İçin;</h5>
                    <center><a style="text-decoration: none" href="https://byshirtscollection.com/urun-kategori/erkek/">
                            <button class="button-53" role="button">TIKLAYIN!</button>
                        </a></center>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{asset($settingsData->slider_two_img)}}" class="d-block w-100" alt="...">
                <div class="carousel-caption">
                    <h5 style="background: #198754; padding: 20px; border-radius: 10px; transform: rotate(-2deg); opacity: 0.8; border: 2px solid #ffc107;">
                        Kadın Gömlek Modellerimiz İçin;</h5>
                    <center><a style="text-decoration: none" href="https://byshirtscollection.com/urun-kategori/kadin/">
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
            <div class="col-lg-6">
                <div class="product">
                    <div class="product_card card">
                        <div class="card-header bg-success">
                            <a class="product_title h3 text-white text-decoration-none">Erkek Siyah Pamuk-Saten Gece Gömlek</a>
                        </div>
                        <div class="card-body">
                            <div class="product-img">
                            <img src="https://byshirtscollection.com/wp-content/uploads/2022/08/siyah-sifir-kol-kadin-gomlek.webp" width="300" height="400">
                            </div>
                            <center>
                            <span itemprop="price" style="color: black" class="price-badge main-page-price">1000,00 ₺</span>
                            </center>
                            <div class="product_desc text-muted mt-4">Oranj sıfır kol kadın gömleğimizde materyal olarak Pamuk kullanıyoruz. Bu kumaş türü, Nemi iyi emer, kışın kendinizi sıcak hissetmenizi yazın ise serin hissetmenizi sağlar. Ayrıca statik elektrik oluşturmaz. Yoğun iş temposunda ve yoğun hayat temposunda Pamuk materyalinden üretilmiş olan gömleklerimizi sizlere sunmaktan memnuniyet duyuyoruz.

                            </div>
                        </div>
                        <div class="card-footer">
                            <a href ="#">
                                <button class="product-button btn btn-warning" role="button">Ürüne Göz Gezdir!</button></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="product">
                    <div class="product_card card">
                        <div class="card-header bg-success">
                            <a class="product_title h3 text-white text-decoration-none">Erkek Siyah Pamuk-Saten Gece Gömlek</a>
                        </div>
                        <div class="card-body">
                            <div class="product-img">
                                <img src="https://byshirtscollection.com/wp-content/uploads/2022/08/siyah-sifir-kol-kadin-gomlek.webp" width="300" height="400">
                            </div>
                            <center>
                                <span itemprop="price" style="color: black" class="price-badge main-page-price">1000,00 ₺</span>
                            </center>
                            <div class="product_desc text-muted mt-4">Oranj sıfır kol kadın gömleğimizde materyal olarak Pamuk kullanıyoruz. Bu kumaş türü, Nemi iyi emer, kışın kendinizi sıcak hissetmenizi yazın ise serin hissetmenizi sağlar. Ayrıca statik elektrik oluşturmaz. Yoğun iş temposunda ve yoğun hayat temposunda Pamuk materyalinden üretilmiş olan gömleklerimizi sizlere sunmaktan memnuniyet duyuyoruz.

                            </div>
                        </div>
                        <div class="card-footer">
                            <a href ="#">
                                <button class="product-button btn btn-warning" role="button">Ürüne Göz Gezdir!</button></a>
                        </div>
                    </div>
                </div>
            </div>

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
