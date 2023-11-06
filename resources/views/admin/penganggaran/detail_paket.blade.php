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
                                            <div class="row">
                                                <div class="col-12">
                                                    <button class="alert alert-info" ng-click="edit(row)">Paket</button>
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
            <div class="col-8 mt-5" ng-show="form" style="margin: auto;">
                <div class="card">
                    <div class="card-body">
                        <div class="data-tab">

                            <div class="row">
                                <div class="col-12">
                                    <div class="row" style="margin-bottom: 10px;">
                                        <div class="col-8">
                                            <div class="alert alert-info poppins">@{{ ket }}</div>
                                        </div>
                                        <div class="col-2">
                                            <button class="btn btn-primary poppins"
                                                 ng-click="tambahData()" style="width: 100%;"><i
                                                    class="ti-plus"></i> Paket</button>
                                        </div>
                                        <div class="col-2">
                                            <button class="btn btn-danger poppins" ng-click="batal()"
                                                style="width: 100%;"><i class="ti-cancel"></i> Batal </button>
                                        </div>
                                    </div>
                                    <table class="table table-bordered" style="margin-top: 25px;">
                                        <tbody>
                                            <tr>
                                                <td>Kode Kegiatan</td>
                                                <td>
                                                    <p>@{{ kode_kegiatan }}</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Nama Kegiatan</td>
                                                <td>
                                                    <p>@{{ kegiatan }}</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Lokasi</td>
                                                <td>
                                                    <p>@{{ lokasi }}</p>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Penanggung Jawab</td>
                                                <td>
                                                    <p>@{{ karyawan }}</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Pagu</td>
                                                <td>
                                                    <p>@{{ formatRupiah(pagu) }}</p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-borderd">
                                        <thead>
                                            <tr class="text-center">
                                                <th>No</th>
                                                <th>Nama Paket</th>
                                                <th>Uraian Output</th>
                                                <th>Target</th>
                                                <th>Satuan</th>
                                                <th>Nilai</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr ng-repeat="row in detaildata" class="text-center">
                                                <td>@{{ $index + 1 }}</td>
                                                <td>@{{ row.nama_paket }}</td>
                                                <td>@{{ row.uraian }}</td>
                                                <td>@{{ row.target }}</td>
                                                <td>@{{ row.satuan }}</td>
                                                <td>@{{ formatRupiah(row.nilai) }}</td>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <button class="alert alert-warning" ng-click="editanggaran(row)"
                                                                data-toggle="modal" data-target="#myModal">Edit</button>
                                                        </div>
                                                        <div class="col-4">
                                                            <button class="alert alert-danger"
                                                                ng-click="deleteanggaran(row)">Hapus</button>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="5">Total</td>
                                                <td class="text-center">@{{formatRupiah(totalnilai)}}</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title" style="font-size: 13px;">@{{ ket }}</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <table class="table table-bordered">
                            <tr>
                                <td>Sisa Pagu</td>
                                <td>:</td>
                                <td>@{{formatRupiah(sisapagu)}}</td>
                            </tr>
                        </table>
                        <div class="form-item">
                            <select class="forms-label">
                                <option value="">Pilih Pola Kegiatan</option>
                                <option ng-repeat="row in polakegiatan" value="@{{ row.id }}">
                                    @{{ row.keterangan }}
                                </option>
                            </select>
                            <label>Pola Kegiatan</label>
                            <p class="poppins"><small style="color: red"> * </small> Wajib Di Isi</p>
                        </div>
                        <div class="form-item">
                            <select class="forms-label">
                                <option value="">Pilih Sumber Dana</option>
                                <option ng-repeat="row in sumberdana" value="@{{ row.id }}">
                                    @{{ row.jenis }}
                                </option>
                            </select>
                            <label>Sumber Dana</label>
                            <p class="poppins"><small style="color: red"> * </small> Wajib Di Isi</p>
                        </div>
                        <div class="form-item">
                            <input type="text" class="forms-label" />
                            <label>Nama Paket</label>
                            <p class="poppins"><small style="color: red"> * </small> Wajib Di Isi</p>
                        </div>
                        <div class="form-item">
                            <input type="text" class="forms-label" id="nilai" />
                            <label>Nilai</label>
                            <p class="poppins"><small style="color: red"> * </small> Wajib Di Isi</p>
                        </div>
                        <div class="form-item">
                            <input type="text" class="forms-label" id="uraian" />
                            <label>Uraian</label>
                            <p class="poppins"><small style="color: red"> * </small> Wajib Di Isi</p>
                        </div>
                        <div class="form-item">
                            <input type="text" class="forms-label" id="" />
                            <label>Satuan</label>
                            <p class="poppins"><small style="color: red"> * </small> Wajib Di Isi</p>
                        </div>
                        <div class="form-item">
                            <input type="text" class="forms-label" />
                            <label>Target</label>
                            <p class="poppins"><small style="color: red"> * </small> Wajib Di Isi</p>
                        </div>

                        <div class="form-item">
                            <select class="forms-label">
                                <option value="">Pilih Sifat Kegiatan</option>
                                <option ng-repeat="row in sifatkegiatan" value="@{{ row.label }}">
                                    @{{ row.label }}</option>
                            </select>
                            <label>Sifat Kegiatan</label>
                            <p class="poppins"><small style="color: red"> * </small> Wajib Di Isi</p>
                        </div>
                        <div class="form-item">
                            <input type="text" class="forms-label" />
                            <label>Lokasi kegiatan</label>
                            <p class="poppins"><small style="color: red"> * </small> Wajib Di Isi</p>
                        </div>



                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" ng-hide="aksi" ng-click="save()"><i
                                class="ti-save"></i> SIMPAN</button>
                        <button type="button" class="btn btn-success" ng-show="aksi" ng-click="updateDetail()"><i
                                class="ti-save"></i> PERBARUI</button>
                        <button type="button" class="btn btn-danger"data-dismiss="modal"><i class="ti-close"></i>
                            BATAL</button>
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
    <script src="{{ asset('assets/js/admin/anggaran/kegiatan/detail.js') }}"></script>
    <script src="{{ asset('assets/js/admin/anggaran/kegiatan/service.js') }}"></script>
@endsection
