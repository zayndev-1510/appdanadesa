@extends('admin.layout.template')
@section('header-lvl-1')
    <div class="col-sm-6">
        <div class="breadcrumbs-area clearfix">
            <h4 class="page-title pull-left">Dashboard</h4>
            <ul class="breadcrumbs pull-left">
                <li><a href="index.html">Home</a></li>
                <li><span>Dashboard</span></li>
            </ul>
        </div>
    </div>
@endsection
@section('content')
    <div class="main-content-inner" ng-app="homeApp" ng-controller="homeController">
        <!-- sales report area start -->
        <div class="sales-report-area mt-5 mb-5">
            <div class="row">
                <div class="col-12">
                    <div class="row" style="margin-bottom: 10px;">
                        <div class="col-md-4" style="cursor: pointer"
                            onclick="window.location.href='{{ url('admin/page/ruangan') }}'">
                            <div class="single-report">
                                <div class="s-report-inner pr--10 pt--30 mb-3">
                                    <div class="icon"><i class="ti-room"></i></div>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Jabatan</h4>

                                    </div>
                                    <div class="d-flex justify-content-between pb-2">
                                        <h2>12</h2>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-4" style="cursor: pointer"
                            onclick="window.location.href='{{ url('admin/page/mapel') }}'">
                            <div class="single-report">
                                <div class="s-report-inner pr--10 pt--30 mb-3">
                                    <div class="icon"><i class="ti-book"></i></div>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Perangkat Desa</h4>

                                    </div>
                                    <div class="d-flex justify-content-between pb-2">
                                        <h2>12</h2>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-4" style="cursor: pointer"
                            onclick="window.location.href='{{ url('admin/page/orangtua') }}'">
                            <div class="single-report">
                                <div class="s-report-inner pr--10 pt--30 mb-3">
                                    <div class="icon"><i class="ti-user"></i></div>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Pengguna</h4>

                                    </div>
                                    <div class="d-flex justify-content-between pb-2">
                                        <h2>12</h2>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">

                    <div class="row">
                        <div class="col-12">
                            <div class="canvas-dashboard">
                                <h4 class="poppins alert alert-info">Data Rencana Anggaran Kegiatan Tahun
                                    @{{ tahun_aktif }}</h4>
                                <div class="row">
                                    <div class="col-12">
                                        <table datatable="ng" class="table table-bordered table-jabatan">
                                            <thead class="bg-light" style="font-size: 12px;">
                                                <tr class="text-center">
                                                    <th>Kode</th>
                                                    <th>Kegiatan</th>
                                                    <th>Lokasi</th>
                                                    <th>Waktu</th>
                                                    <th>Keluaran</th>
                                                    <th>Volume</th>
                                                    <th>Pelaksana</th>
                                                    <th>Pagu</th>
                                                </tr>
                                            </thead>
                                            <tbody style="font-size: 12px">
                                                <tr class="text-center" ng-repeat="row in anggaran_kegiatan">
                                                    <td>@{{ row.kode_bidang }} @{{ row.kode_sub_bidang }} @{{ row.kode_kegiatan }}
                                                    </td>
                                                    <td>@{{ row.kegiatan }}</td>
                                                    <td>@{{ row.lokasi }}</td>
                                                    <td>@{{ row.waktu }}</td>
                                                    <td>@{{ row.keluaran }}</td>
                                                    <td>@{{ row.volume }}</td>
                                                    <td>@{{ row.nama_lengkap }}</td>
                                                    <td>@{{ formatRupiah(row.pagu) }}</td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="6">Total Anggaran Kegiatan Tahun @{{tahun_aktif}}</td>
                                                    <td class="text-center">:</td>
                                                    <td class="text-center">@{{ formatRupiah(total) }}</td>
                                                </tr>
                                            </tfoot>

                                        </table>
                                    </div>
                                </div>
                                <h4 class="poppins alert alert-success"">Data Anggaran Pendapatan Tahun
                                    @{{ tahun_aktif }}</h4>
                                <div class="row">
                                    <div class="col-12">
                                        <table datatable="ng" class="table table-bordered table-jabatan">
                                            <thead class="bg-light" style="font-size: 12px;">
                                                <tr class="text-center">
                                                    <th>Kode Rincian</th>
                                                    <th>Nama Rincian</th>
                                                    <th>Anggaran</th>
                                                </tr>
                                            </thead>
                                            <tbody style="font-size: 12px">
                                                <tr class="text-center" ng-repeat="row in rap">
                                                    <td>
                                                        <p class="margin-table-top">@{{ row.kode_kelompok }}
                                                            @{{ row.kode_jenis }}
                                                            @{{ row.kode_objek }}</p>
                                                    </td>
                                                    <td>
                                                        <p class="margin-table-top">@{{ row.rincian }}</p>
                                                    </td>
                                                    <td>
                                                        <p class="margin-table-top">@{{ row.anggaran | currency: "Rp. ": 0 }} </p>
                                                    </td>

                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="1">Total Anggaran Pendapatan Tahun
                                                        @{{ tahun_aktif }}</td>
                                                    <td class="text-center">:</td>
                                                    <td class="text-center">@{{ formatRupiah(totalrap) }}</td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                                <h4 class="poppins alert alert-warning">Data Rencana Anggaran Belanjaan Tahun
                                    @{{ tahun_aktif }}</h4>
                                <div class="row">
                                    <div class="col-12">
                                        <table datatable="ng" class="table table-bordered table-jabatan">
                                            <thead class="bg-light" style="font-size: 12px;">
                                                <tr class="text-center">
                                                    <th>Kode</th>
                                                    <th>Rincian</th>
                                                    <th>Kegiatan</th>
                                                    <td>Paket Kegiatan</td>
                                                    <th>Anggaran</th>
                                                </tr>
                                            </thead>
                                            <tbody style="font-size: 12px">
                                                <tr class="text-center" ng-repeat="row in datarab">
                                                    <td>@{{ row.kode_kelompok }} @{{ row.kode_jenis }}
                                                        @{{ row.kode_objek }}</td>
                                                    <td>@{{ row.rincian }}</td>
                                                    <td>@{{ row.kegiatan }}</td>
                                                    <td>@{{ row.nama_paket }}</td>
                                                    <td>@{{ formatRupiah(row.anggaran) }}</td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="3">Total Rencana Anggaran Belanjaan Tahun
                                                        @{{ tahun_aktif }}</td>
                                                    <td class="text-center">:</td>
                                                    <td class="text-center">@{{ formatRupiah(totalrab) }}</td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- <div class="col-12">
                    <div class="row">
                        <div class="col-6">
                            <div class="white" style="padding: 10px;">
                                <h5 style="text-align: center;font-size: 15px;">GRAFIK DATA ALUMNI BERDASARKAN TAHUN KELULUSAN</h5>

                                <div style="width: 100%;margin: 0px auto;height:auto;">
                                    <canvas id="myChart"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="white" style="padding: 10px;">
                                <h5 style="text-align: center;font-size: 15px;">GRAFIK DATA MAHASISWA AKTIF BERDASARKAN TAHUN AKADEMIK</h5>

                                <div style="width: 100%;margin: 0px auto;"">
                                    <canvas id="myChart2"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>

        </div>

    </div>
    </div>
    </div>
    <!-- sales report area end -->
    <!-- overview area start -->
    <!-- row area start-->
    </div>
@endsection
@section('javascript')
    <script src="{{ asset('grafik/chart.min.js') }}"></script>
    <script src="{{ asset('assets/angularjs/angular.min.js') }}"></script>
    <script src="{{ asset('assets/angularjs/angular-route.min.js') }}"></script>
    <script src="{{ asset('assets/js/admin/dashboard/app.js') }}"></script>
    <script src="{{ asset('assets/js/admin/dashboard/service.js') }}"></script>
@endsection
