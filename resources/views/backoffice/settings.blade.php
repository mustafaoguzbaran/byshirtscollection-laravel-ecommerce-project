@extends("layouts.index")
@section("css")
    @endsection
@section("content")
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card bg-success" style="margin-top: 40px;">
                    <div class="card-header bg-success text-white h1">
                        Genel Ayarlar
                    </div>
                    <div class="card-body bg-success">
                        <form method="post" action="{{route("settings.update")}}" enctype="multipart/form-data">
                            @csrf
                            @method("PATCH")
                            <label class="form-label">Duyuru Alanı</label>
                            <input name="update_settings_notification" value="{{$settingsData->notification_text}}" type="text" class="form-control">
                            <label class="form-label">Footer Alanı</label>
                            <input name="update_settings_footer" value="{{$settingsData->footer_text}}" type="text" class="form-control">
                            <label class="form-label" for="logo">Logo</label>
                            <input type="file" value="{{$settingsData->logo_img}}" name="update_settings_logo" id="logo" class="form-control" accept="image/*">
                            <label class="form-label" for="logo">1. Slider Resimi</label>
                            <input type="file" value="{{$settingsData->slider_one_img}}" name="update_settings_slider_one_img" id="logo" class="form-control" accept="image/*">
                            <label class="form-label" for="logo">2. Slider Resimi</label>
                            <input type="file" value="{{$settingsData->slider_two_img}}" name="update_settings_slider_two_img" id="logo" class="form-control" accept="image/*">
                            <button type="submit" class="btn btn-warning">Ayarları Güncelle</button>
                        </form>
                    </div>
                    <div class="card-footer bg-success text-white" style="text-align: center">By Shirts Collection | We Are Shirt Designers</div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section("js")
@endsection
