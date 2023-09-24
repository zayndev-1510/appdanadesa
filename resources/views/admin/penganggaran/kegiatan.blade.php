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
                                        <th>Kegiatan</th>
                                        <th>Lokasi</th>
                                        <th>Waktu</th>
                                        <th>Keluaran</th>
                                        <th>Volume</th>
                                        <th>Pelaksana</th>
                                        <th>Pagu</th>
                                        <th>
                                            Aksi
                                        </th>
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
                                        <td>
                                            <span class="fa fa-edit" style="font-size: 20px;color: yellow;cursor: pointer;"
                                                ng-click="edit(row)" data-toggle="modal" data-target="#myModal"></span>
                                            <span class="fa fa-trash" style="font-size: 20px;color:red;cursor: pointer;"
                                                ng-click="delete(row)"></span>
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
                                <div class="col-12">
                                    <div class="alert alert-info poppins">@{{ket_input}}</div>
                                </div>

                                <div class="col-6" style="margin-top: 10px;">
                                    <div class="row" style="margin-bottom: 20px;">
                                        <div class="col-4">
                                            <select class="form-control" ng-change="get_sub_bidang(id_bidang)"
                                                ng-model="id_bidang">
                                                <option value="">Pilih Bidang</option>
                                                <option ng-repeat="row in databidang" value="@{{ row.id }}">
                                                    @{{ row.keterangan }}</option>
                                            </select>
                                        </div>
                                        <div class="col-4">
                                            <select class="form-control" ng-model="id_sub_bidang">
                                                <option value="">Pilih Sub Bidang</option>
                                                <option ng-repeat="row in data_sub_bidang" value="@{{ row.id }}">
                                                    @{{ row.sub_bidang }}</option>
                                            </select>
                                        </div>
                                        <div class="col-4">
                                            <button class="btn btn-success" ng-click="filter_data(id_sub_bidang)">Filter
                                                Data</button>
                                        </div>
                                    </div>
                                    <table datatable="ng" class="table table-bordered table-jabatan">
                                        <thead class="bg-light" style="font-size: 12px;">
                                            <tr class="text-center">
                                                <th>Kode</th>
                                                <th>Kegiatan</th>
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
                                                <td>
                                                    <button class="btn btn-primary"
                                                        ng-click="pilih_kegiatan(row)">Pilih</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="col-6">
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
                                                <td>Lokasi</td>
                                                <td>
                                                    <input type="text" class="form-control anggaran-kegiatan"
                                                        name="lokasi" id="lokasi" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Waktu</td>
                                                <td>
                                                    <select class="form-control anggaran-kegiatan" name="waktu"
                                                        id="waktu">
                                                        <option value="">Pilih Waktu Pengerjaan</option>
                                                        <option ng-repeat="row in datatahun"
                                                            value="@{{ row.id }}">@{{ row.keterangan }}</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Nama Pelaksana</td>
                                                <td>
                                                    <select class="form-control anggaran-kegiatan" ng-model="id_perangkat"
                                                        ng-change="get_jabatan()" name="id_perangkat_desa"
                                                        id="id_perangkat_desa">
                                                        <option value="">Pilih Perangkat Desa</option>
                                                        <option ng-repeat="row in dataperangkat"
                                                            value="@{{ row.id }}">@{{ row.namalengkap }}
                                                        </option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Jabatan</td>
                                                <td>
                                                    <p class="poppins">@{{ jabatan }}</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Keluaran</td>
                                                <td>
                                                    <input type="text" class="form-control anggaran-kegiatan"
                                                        name="keluaran" id="keluaran" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Volume</td>
                                                <td>
                                                    <input type="text" class="form-control anggaran-kegiatan"
                                                        name="volume" id="volume" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Pagu</td>
                                                <td>
                                                    <input type="text" class="form-control anggaran-kegiatan"
                                                        name="pagu" id="pagu" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <button type="button" class="btn btn-success" ng-hide="aksi"
                                                        ng-click="save()"><i class="ti-save"></i> SIMPAN</button>
                                                    <button type="button" class="btn btn-success" ng-show="aksi"
                                                        ng-click="update()"><i class="ti-save"></i> PERBARUI</button>
                                                    <button type="button" class="btn btn-danger"data-dismiss="modal"><i
                                                            class="ti-close"></i>
                                                        BATAL</button>
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
    <script src="{{ asset('assets/js/admin/anggaran/kegiatan/app.js') }}"></script>
    <script src="{{ asset('assets/js/admin/anggaran/kegiatan/service.js') }}"></script>
@endsection
