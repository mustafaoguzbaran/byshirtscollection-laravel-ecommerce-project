<?php
   $categoryData = \App\Models\Category::all()
    ?>
<div class="card headbar bg-success">
    <div class="notice"><a><i class="bi bi-megaphone"></i> {{$settingsData->notification_text}}</a></div>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <div class="user bg-success">
                @if(\Illuminate\Support\Facades\Auth::user())
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                       data-bs-toggle="dropdown" aria-expanded="false">
                                        <button class="btn userbutton">{{'@'.auth()->user()->username}}</button>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        @hasrole('Admin')
                                        <li><a class="dropdown-item" href="{{route("orders.index")}}">Tüm Siparişler</a></li>
                                        @endhasrole
                                        @hasrole('Admin')
                                        <li><a class="dropdown-item" href="{{route("product.create")}}">Ürün Ekle</a></li>

                                        <li><a class="dropdown-item" href="{{route("product.index")}}">Tüm Ürünler</a></li>
                                        <li><a class="dropdown-item" href="{{route("product.category.create")}}">Ürün Kategorisi Ekle</a></li>
                                        <li><a class="dropdown-item" href="{{route("product.category.index")}}">Tüm Ürün Kategorileri</a></li>
                                        <li><a class="dropdown-item" href="{{route("product.color.create")}}">Ürün Rengi Ekle</a></li>
                                        <li><a class="dropdown-item" href="{{route("product.color.index")}}">Tüm Ürün Renkleri</a></li>
                                        <li><a class="dropdown-item" href="{{route("product.price.edit")}}">Toplu Fiyat Güncelle</a></li>
                                        <li><a class="dropdown-item" href="{{route("product.coupon.create")}}">Kupon Kodu Ekle</a></li>
                                        <li><a class="dropdown-item" href="{{route("product.coupon.index")}}">Tüm Ürün Kuponları</a></li>
                                        <li><a class="dropdown-item" href="{{route("blog.create")}}">Blog Ekle</a></li>
                                        <li><a class="dropdown-item" href="{{route("blog.index")}}">Tüm Bloglar</a></li>
                                        <li><a class="dropdown-item" href="{{route("backoffice.user.index")}}">Tüm Kullanıcılar</a></li>
                                        <li><a class="dropdown-item" href="{{route("settings.edit")}}">Genel Ayarlar</a></li>
                                        @endhasrole
                                        <li><a class="dropdown-item" href="{{route("order.index")}}">Siparişlerim</a></li>
                                        <li><a class="dropdown-item" href="{{route("user.edit")}}">Hesabım</a></li>
                                    </ul>

                            </div>
                            <div class="col-lg-6">
                                <form method="POST" action="{{route("user.logout")}}">
                                    @csrf
                                    @method("POST")
                                <button type="submit" class="btn userlogout">Çıkış Yap</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <a href="{{route("user.login")}}">
                                    <div class="btn login">Giriş Yap</div>
                                </a>
                            </div>
                            <div class="col-lg-6">
                                <a href="{{route("user.create")}}">
                                    <div class="btn register">Üye Ol!</div>
                                </a>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <div class="col-lg-4">
            <div class="logo">
                <center><a href="{{route("home")}}"><img  style="width: 250px; margin-top: 20px;"
                                                         src="{{asset($settingsData->logo_img)}}" class="d-block"
                                                         alt="..."></a></center>
            </div>
        </div>
        <div class="col-lg-4">
            @if(\Illuminate\Support\Facades\Auth::user())
                <a href="{{route("cart.index")}}"><button class="btn byshirts-cart" style="width: 100%"><i class="bi bi-bag"></i> Sepetinizde şuan {{$totalQuantity}} ürün var {{$totalAmount}}
                    TL</button></a>
            @else
                <a href="{{route("user.create")}}"><button class="btn byshirts-cart" style="width: 100%"><i class="bi bi-bag"></i> Sepete Ürün Eklemek İçin Üye Olun!</button></a>
            @endif
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <div class="container-fluid">

        <button class="navbar-toggler" style="border:none;" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
            <div class="menu-button text-black" style="padding: 20px; text-align: center"><a>MENU</a></div>
        </button>
        <div class="collapse navbar-collapse justify-content-center " id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{route("home")}}">Anasayfa</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        Gömlek Modellerimiz
                    </a>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach($categoryData as $item)
                        <li><a class="dropdown-item" href="{{route("product.category", ["slug" => $item->slug])}}">{{$item->name}}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route("blog.home")}}">Blog</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        Kurumsal
                    </a>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{route("privacyandsecurity")}}">Gizlilik ve Güvenlik</a>
                        </li>
                        <li><a class="dropdown-item" href="{{route("salescontract")}}">Satış Sözleşmesi</a></li>
                        <li><a class="dropdown-item" href="{{route("membershipagreement")}}">Üyelik Sözleşmesi</a></li>
                        <li><a class="dropdown-item" href="{{route("deliveryandreturnconditions")}}">Teslimat ve İade
                                Şartları</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route("aboutus")}}">Hakkımızda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route("contact")}}">İletişim</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
