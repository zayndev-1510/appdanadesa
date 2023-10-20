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
                                        <td>@{{ row.nama_paket }}</td>
                                        <td>@{{ row.anggaran }}</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-12">
                                                    <button class="alert alert-info" ng-click="rincian(row)">
                                                        Rincian</button>
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

                                <div class="col-6" style="margin-top: 10px;">
                                    <table datatable="ng" class="table table-bordered table-jabatan">
                                        <thead class="bg-light" style="font-size: 12px;">
                                            <tr class="text-center">
                                                <th>Nomor Urut</th>
                                                <th>Uraian</th>
                                                <th>Anggaran</th>
                                                <th>Sumber Dana</th>
                                                <th>
                                                    Aksi
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody style="font-size: 12px">
                                            <tr class="text-center" ng-repeat="row in rabrinci">
                                                <td>@{{ row.nomor_urut }}</td>
                                                <td>@{{ row.uraian }}</td>
                                                <td>@{{ row.harga }}</td>
                                                <td>@{{ row.jenis }}</td>
                                                <td>
                                                    <button class="btn btn-primary" ng-click="pilih_kegiatan(row,0)"
                                                      >Edit</button>
                                                    <button class="btn btn-danger" ng-click="pilih_kegiatan(row,1)"
                                                       >Hapus</button>
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
                                                <td>Nomor Urut</td>
                                                <td>
                                                    <p>@{{ nomor_urut }}</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Nama Rincian</td>
                                                <td>
                                                    <p>@{{ rincian }}</p>
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
                                                <td>@{{ nama_paket }}</td>
                                            </tr>
                                            <tr>
                                                <td>Pagu</td>
                                                <td>
                                                    <p>@{{ pagu }}</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Nilai Paket</td>
                                                <td>
                                                    <p>@{{ nilai }}</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Uraian</td>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <input type="text" id="uraian"
                                                                class="form-control form-rab-detail" placeholder="uraian" />
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Jumlah Satuan</td>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <input type="text" id="jumlah"
                                                                class="form-control form-rab-detail" placeholder="jumlah" />
                                                        </div>
                                                        <div class="col-6">
                                                            <input type="text" id="satuan"
                                                                class="form-control form-rab-detail" placeholder="satuan" />
                                                        </div>

                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Harga Satuan</td>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <input type="text" id="harga_satuan"
                                                                class="form-control form-rab-detail" placeholder="harga" />
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Sumber Dana</td>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <select class="form-control form-rab-detail" id="sumber_dana">
                                                                <option value="">Pilih Sumber Dana</option>
                                                                <option ng-repeat="row in sumberdana"
                                                                    value="@{{ row.id }}">@{{ row.jenis }}
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </td>
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
    <script src="{{ asset('assets/js/admin/belanja/rab/detail.js') }}"></script>
    <script src="{{ asset('assets/js/admin/belanja/rab/service.js') }}"></script>
@endsection
