@extends("layouts.index")
@section("css")
    @endsection
@section("content")
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card" style="margin-top: 40px">
                    <div class="card-header bg-success text-white h1">Hoşgeldin, {{auth()->user()->name}}</div>
                    <div class="card-body bg-success text-white" style="text-align: center"><a><b>Time Zone: </b>{{date('d.m.Y H:i:s')}}</a></div>
                    <div class="card-footer bg-success text-white" style="text-align: center">By Shirts Collection | We Are Shirt Designers</div>
                </div>
            </div>
            <div class="col-lg-6">
                <div id="usersChart" style="margin-top: 90px; margin-bottom: 90px"></div>
            </div>
        </div>
    </div>
@endsection
@section("js")
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        // Kullanıcı verilerini PHP'den alın
        var userCounts = @json($getUsersData);

        // Ay ve kullanıcı sayıları için dizi oluştur
        var months = [];
        var counts = [];

        userCounts.forEach(function (user) {
            months.push(user.users_month + ". ay");
            counts.push(user.total_user);
        });

        // Grafik ayarlarını yapılandır
        var options = {
            chart: {
                type: 'bar',
                height: 350
            },
            title: {
                text: 'Aylara göre kayıtlı kullancı sayısı',
                align: 'left'
            },
            series: [{
                name: 'Kullanıcı Sayısı',
                data: counts,
                color: '#198754'
            }],
            xaxis: {
                categories: months
            }
        };

        // Grafik nesnesini oluştur
        var chart = new ApexCharts(document.querySelector("#usersChart"), options);

        // Grafik nesnesini render et
        chart.render();
    </script>
@endsection
