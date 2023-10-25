@extends('admin.layout.template')
@section('header-lvl-1')
    <div class="col-sm-6">
        <div class="breadcrumbs-area clearfix">
            <h4 class="page-title pull-left">Dashboard</h4>
            <ul class="breadcrumbs pull-left">
                <li><a href="index.html">Home</a></li>
                <li class="poppins"><span>{{ $data->keterangan }}</span></li>
            </ul>
        </div>
    </div>
@endsection
@section('content')
    <div class="main-content-inner" ng-app="homeApp" ng-controller="homeController">
        <div class="row">
            <div class="col-12 mt-5" ng-show="table">
                <div class="card">
                    <div class="card-body" id="tabel-toko">

                        <div class="data-tab">
                            <div class="row">
                                <div class="col-6">
                                    <select class="form-control" name="tahun_anggaran" id="tahun_anggaran">
                                        <option value="">Pilih Tanu Anggaran</option>
                                        <option ng-repeat="row in anggaran_tahun" value="@{{row.id}}">@{{row.tahun}}</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <button class="btn btn-success" ng-click="cetak()">Cetak Data</button>
                                </div>
                            </div>
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
                                        <td>@{{ row.kode_bidang }} @{{ row.kode_sub_bidang }} @{{ row.kode_kegiatan }}</td>
                                        <td>@{{ row.kegiatan }}</td>
                                        <td>@{{ row.lokasi }}</td>
                                        <td>@{{ row.waktu }}</td>
                                        <td>@{{ row.keluaran }}</td>
                                        <td>@{{ row.volume }}</td>
                                        <td>@{{ row.nama_lengkap }}</td>
                                        <td>@{{ row.pagu }}</td>
                                    </tr>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>

    <div id="cover-spin">
        <div class="modal-message">
            <h2 class="animate">Loading</h2>
        </div>
    </div>
@endsection
@section('javascript')
    <script src="{{ asset('assets/angularjs/angular.min.js') }}"></script>
    <script src="{{ asset('assets/angularjs/angular-route.min.js') }}"></script>
    <script src="{{ asset('assets/angularjs/angular-datatables.min.js') }}"></script>
    <script src="{{ asset('assets/angularjs/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/js/admin/anggaran/kegiatan/laporan.js') }}"></script>
    <script src="{{ asset('assets/js/admin/anggaran/kegiatan/service.js') }}"></script>
@endsection
