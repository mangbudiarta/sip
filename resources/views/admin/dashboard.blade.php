@extends('admin.layouts.main')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-8 mb-4 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-7">
                            <div class="card-body">
                                <h5 class="card-title text-primary">Selamat Datang Petugas 🎉</h5>
                                <p class="mb-4">
                                    Selamat Datang di <span class="fw-bold">Sistem Informasi Desa Candikuning</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-5 text-center text-sm-left">
                            <div class="card-body pb-0 px-0 px-md-4">
                                <img src="{{ asset('backend/assets/img/illustrations/man-with-laptop-light.png') }}"
                                    height="140" alt="View Badge User"
                                    data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                    data-app-light-img="illustrations/man-with-laptop-light.png" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- daftar Rating -->
            <div class="col-12 order-2 order-md-3 order-lg-2 mb-4">
                <div class="card">
                    <div class="row row-bordered g-0">
                        <div class="col-md-12">
                            <h5 class="card-header m-0 me-2 pb-3">Daftar Rating Potensi Desa</h5>
                            <div id="totalRating" class="px-2" style="height: 250px;"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!--/ daftar Rating -->
        </div>
    </div>

    <!-- Vendors JS -->
    <script src="{{ asset('backend/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

    <script>
        // Api Chart
        // Fetch data from API 
        fetch('/api/getDataRatings')
            .then(response => response.json())
            .then(data => {
                // Process data and render chart
                renderChart(data);
            })
            .catch(error => console.error('Error fetching data:', error));

        // Function to render the chart
        function renderChart(data) {
            var options = {
                chart: {
                    type: 'bar',
                    height: 400,
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        stacked: true
                    },
                },
                dataLabels: {
                    enabled: true
                },
                xaxis: {
                    categories: data.map(item => item.namapotensi),
                },
                yaxis: {
                    title: {
                        text: 'Jumlah Rating'
                    },
                    labels: {
                        formatter: function(value) {
                            return parseInt(value); // Membuat angka tidak menggunakan koma
                        }
                    }
                },
            };

            var seriesData = [];

            for (var i = 5; i >= 1; i--) {
                var dataPoints = data.map(item => item['rating_' + i]);
                seriesData.push({
                    name: 'Rating ' + i,
                    data: dataPoints
                });
            }

            options.series = seriesData;

            var chart = new ApexCharts(document.querySelector("#totalRating"), options);
            chart.render();
        }
    </script>
@endsection
