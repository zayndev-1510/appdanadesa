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
                                        <option ng-repeat="row in anggaran_tahun" value="@{{ row.id }}">
                                            @{{ row.tahun }}</option>
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
                                        <th>Rincian</th>
                                        <th>Kegiatan</th>
                                        <td>Paket Kegiatan</td>
                                        <th>Anggaran</th>
                                    </tr>
                                </thead>
                                <tbody style="font-size: 12px">
                                    <tr class="text-center" ng-repeat="row in datarab">
                                        <td>@{{ row.kode_kelompok }} @{{ row.kode_jenis }} @{{ row.kode_objek }}</td>
                                        <td>@{{ row.rincian }}</td>
                                        <td>@{{ row.kegiatan }}</td>
                                        <td>@{{ row.nama_paket }}</td>
                                        <td>@{{ row.anggaran }}</td>
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
    <script src="{{ asset('assets/js/admin/belanja/rab/laporan.js') }}"></script>
    <script src="{{ asset('assets/js/admin/belanja/rab/service.js') }}"></script>
@endsection
