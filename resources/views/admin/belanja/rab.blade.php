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
                        <div class="row" style="margin-bottom: 10px;">
                            <div class="col-10">
                                <p style="font-size: 17px;font-weight: 800" class="poppins">{{ $data->keterangan }}</p>
                            </div>
                            <div class="col-2">
                                <button class="btn btn-primary poppins" ng-click="add_form()" style="width: 100%;"><i
                                        class="ti-plus"></i> Tambah Data</button>
                            </div>
                        </div>
                        <div class="data-tab">
                            <table datatable="ng" class="table table-bordered table-jabatan">
                                <thead class="bg-light" style="font-size: 12px;">
                                    <tr class="text-center">
                                        <th>Kode</th>
                                        <th>Rincian</th>
                                        <th>Kegiatan</th>
                                        <td>Paket Kegiatan</td>
                                        <th>Anggaran</th>
                                        <th>
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody style="font-size: 12px">
                                    <tr class="text-center" ng-repeat="row in datarab">
                                        <td>@{{ row.kode_kelompok }} @{{ row.kode_jenis }} @{{ row.kode_objek }}</td>
                                        <td>@{{ row.rincian }}</td>
                                        <td>@{{ row.kegiatan }}</td>
                                        <td>@{{row.nama_paket}}</td>
                                        <td>@{{ row.anggaran }}</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-6">
                                                    <button class="alert alert-info" ng-click="edit(row)"> Edit</button>
                                                </div>
                                                <div class="col-6">
                                                    <button class="alert alert-danger" ng-click="delete(row)">
                                                        Hapus</button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-5" ng-show="form">
                <div class="card">
                    <div class="card-body">
                        <div class="data-tab">
                            <div class="row">

                                <div class="col-8" style="margin-top: 10px;">
                                    <table datatable="ng" class="table table-bordered table-jabatan">
                                        <thead class="bg-light" style="font-size: 12px;">
                                            <tr class="text-center">
                                                <th>Kode</th>
                                                <th>Kegiatan</th>
                                                <th>Keluaran</th>
                                                <th>Pagu</th>
                                                <th>
                                                    Aksi
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody style="font-size: 12px">
                                            <tr class="text-center" ng-repeat="row in datakegiatan">
                                                <td>@{{ row.kode_bidang }} . @{{ row.kode_sub_bidang }} .
                                                    @{{ row.kode_kegiatan }}</td>
                                                <td>@{{ row.kegiatan }}</td>
                                                <td>@{{ row.keluaran }}</td>
                                                <td>@{{ formatRupiah(row.pagu) }}</td>
                                                <td>
                                                    <button class="btn btn-primary" ng-click="pilih_kegiatan(row,0)"
                                                        ng-hide="row.action">Pilih</button>
                                                    <button class="btn btn-danger" ng-click="pilih_kegiatan(row,1)"
                                                        ng-show="row.action">Batal</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="col-4">
                                    <div class="alert alert-info poppins">@{{ ket }}</div>
                                    <table class="table table-bordered" style="margin-top: 25px;">
                                        <tbody>
                                            <tr>
                                                <td>Kode Kegiatan</td>
                                                <td>
                                                    <p>@{{ kode_kegiatan }}</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Kegiatan</td>
                                                <td>
                                                    <p>@{{ kegiatan }}</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Paket Kegiatan</td>
                                                <td>
                                                    <select class="form-control form-rab" ng-model="id_paket"
                                                        ng-change="get_nilai_paket(id_paket)">
                                                        <option value="">Pilih Paket Kegiatan</option>
                                                        <option ng-repeat="row in paketkegiatan"
                                                            value="@{{ row.id }}">@{{ row.paket }}</option>
                                                    </select>
                                            </tr>
                                            <tr>
                                                <td>Nilai</td>
                                                <td>
                                                    <p>@{{ nilai }}</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Kelompok</td>
                                                <td>
                                                    <select class="form-control form-rab" ng-model="id_kelompok"
                                                        ng-change="get_jenis_data(id_kelompok)">
                                                        <option value="">Pilih Kelompok</option>
                                                        <option ng-repeat="row in datakelompok"
                                                            value="@{{ row.id }}">@{{ row.keterangan }}</option>
                                                    </select>
                                            </tr>
                                            <tr>
                                                <td>Jenis</td>
                                                <td>
                                                    <select class="form-control form-rab" ng-model="id_jenis"
                                                        ng-change="get_objek_data(id_jenis)">
                                                        <option value="">Pilih Jenis</option>
                                                        <option ng-repeat="row in datajenis"
                                                            value="@{{ row.id }}">@{{ row.keterangan }}</option>
                                                    </select>
                                            </tr>
                                            <tr>
                                                <td>Objek</td>
                                                <td>
                                                    <select class="form-control form-rab">
                                                        <option value="">Pilih Objek</option>
                                                        <option ng-repeat="row in dataobjek"
                                                            value="@{{ row.id }}">@{{ row.keterangan }}</option>
                                                    </select>
                                            </tr>
                                            <tr>
                                                <td>Tahun Anggaran</td>
                                                <td>
                                                    <select class="form-control form-rab">
                                                        <option value="">Pilih Tahun Anggaran</option>
                                                        <option ng-repeat="row in anggarantahun"
                                                            value="@{{ row.id }}">@{{ row.tahun }}</option>
                                                    </select>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <button type="button" class="btn btn-success" ng-hide="aksi"
                                                        ng-click="save()"><i class="ti-save"></i> SIMPAN</button>
                                                    <button type="button" class="btn btn-success" ng-show="aksi"
                                                        ng-click="update()"><i class="ti-save"></i> PERBARUI</button>
                                                    <button type="button" class="btn btn-danger" ng-click="batal()"><i
                                                            class="ti-close"></i>
                                                        KEMBALI</button>
                                                </td>
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
    <script src="{{ asset('assets/js/admin/belanja/rab/app.js') }}"></script>
    <script src="{{ asset('assets/js/admin/belanja/rab/service.js') }}"></script>
@endsection
