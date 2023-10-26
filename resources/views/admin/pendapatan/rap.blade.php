<x-layout :datalayout="$data" :datalogin="$datalogin">
    <x-header :dataheader="$data" />
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
                                            <th>Kode Rincian</th>
                                            <th>Nama Rincian</th>
                                            <th>Anggaran</th>
                                            <th>Tanggal Buat</th>
                                            <th>Tanggal Update</th>
                                            <th>Tahun Anggaran</th>
                                            <th>
                                                Aksi
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody style="font-size: 12px">
                                        <tr class="text-center" ng-repeat="row in rap">
                                            <td>
                                                <p class="margin-table-top">@{{ row.kode_kelompok }} @{{ row.kode_jenis }}
                                                    @{{ row.kode_objek }}</p>
                                            </td>
                                            <td>
                                                <p class="margin-table-top">@{{ row.rincian }}</p>
                                            </td>
                                            <td>
                                                <p class="margin-table-top">@{{ row.anggaran | currency: "Rp. ": 0 }} </p>
                                            </td>
                                            <td>
                                                <p class="margin-table-top">@{{ row.created_at }}</p>
                                            </td>
                                            <td>
                                                <p class="margin-table-top">@{{ row.updated_at }}</p>
                                            </td>
                                            <td>
                                                <p class="margin-table-top">@{{ row.tahun }}</p>
                                            </td>
                                            <td>
                                                <button class="alert alert-warning" ng-click="editRap(row)"> Edit
                                                    Data</button>
                                                <button class="alert alert-info" ng-click="detailRincian(row)"> Detail
                                                    Rincian</button>
                                                <button class="alert alert-danger" ng-click="deleteRap(row)">Hapus
                                                    Data</button>
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
                                        <div class="alert alert-info poppins">PIlih terlebih dahulu kelompok dan jenis untuk
                                            menampilkan data objek pendapatan desa</div>
                                    </div>
                                    <div class="col-12" style="margin-bottom: 20px">
                                        <div class="row">
                                            <div class="col-4">
                                                <select class="form-control kelompok" ng-change="getJenis()"
                                                    ng-model="kelompok" name="kelompok" id="kelompok">
                                                    <option value="">Pilih Kelompok</option>
                                                    <option ng-repeat="row in datakelompok" value="@{{ row.id }}">
                                                        @{{ row.keterangan }}</option>
                                                </select>
                                                <p class="poppins" style="font-size: 12px;><small style="color: red"> *
                                                    </small>
                                                    Kelompok Pendapatan</p>
                                            </div>
                                            <div class="col-4">
                                                <select class="form-control jenis" name="jenis" id="jenis">
                                                    <option value="">Pilih Jenis</option>
                                                    <option ng-repeat="row in datajenis" value="@{{ row.id }}">
                                                        @{{ row.keterangan }}</option>
                                                </select>
                                                <p class="poppins" style="font-size: 12px;"><small style="color: red"> *
                                                    </small> Jenis Pendapatan</p>
                                            </div>
                                            <div class="col-4">
                                                <button class="btn btn-success" ng-click="filterData()">Filter Data</button>
                                                <button class="btn btn-danger" ng-click="kembali()">Kembali</button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <table datatable="ng" class="table table-bordered table-jabatan">
                                            <thead class="bg-light" style="font-size: 12px;">
                                                <tr class="text-center">
                                                    <th>Kode</th>
                                                    <th>Objek</th>
                                                    <th>Tahun Anggaran</th>
                                                    <th>
                                                        Aksi
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody style="font-size: 12px">
                                                <tr class="text-center" ng-repeat="row in dataobjek">
                                                    <td>@{{ row.kode_kelompok }} @{{ row.kode_jenis }}
                                                        @{{ row.kode }}
                                                    </td>
                                                    <td>@{{ row.keterangan }}</td>
                                                    <td>
                                                        <select class="form-control" name="tahun_anggaran"
                                                            id="tahun_anggaran">
                                                            <option value="">Pilih Tahun Anggaran</option>
                                                            <option ng-repeat="row in anggaran_tahun"
                                                                value="@{{ row.id }}">@{{ row.tahun }}
                                                            </option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-primary" ng-click="pilih_objek(row,0)"
                                                            ng-if="row.status==0">Tambahkan</button>
                                                        <button class="btn btn-warning" ng-click="pilih_objek(row,1)"
                                                            ng-if="row.status==1">Perbarui</button>
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
                <div class="col-10 mt-5" ng-show="detail" style="margin: auto">
                    <div class="card">
                        <div class="card-body">
                            <div class="data-tab">
                                <div class="row">
                                    <div class="col-12" style="margin-bottom: 10px;">
                                        <div class="row">
                                            <div class="col-6">
                                                <button class="btn btn-danger poppins" ng-click="batal()">Kembali</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="alert alert-info poppins">Detail Rincian Pendapatan</div>
                                    </div>

                                    <div class="col-12">
                                        <table class="table table-bordered table-jabatan">
                                            <tbody style="font-size: 12px">
                                                <tr>
                                                    <td>Kode Rincian</td>
                                                    <td>:</td>
                                                    <td>@{{ kode_rincian }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Nama Rincian</td>
                                                    <td>:</td>
                                                    <td>@{{ rincian }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Total Anggaran</td>
                                                    <td>:</td>
                                                    <td>@{{ totalanggaran | currency: "Rp. ": 0 }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-12">
                                        <table class="table table-bordered table-jabatan">
                                            <thead>
                                                <tr class="text-center">
                                                    <td>Nomor Urut</td>
                                                    <td>Uraian</td>
                                                    <td>Jumlah Satuan</td>
                                                    <td>Harga Satuan</td>
                                                    <td>Total</td>
                                                    <td>Sumber Dana</td>
                                                    <td>Aksi</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr ng-if="datalen==0">
                                                    <td colspan="7">001</td>
                                                    <td>
                                                        <button class="alert alert-success" data-toggle="modal"
                                                            data-target="#myModal">Tambah Detail Rincian</button>
                                                    </td>
                                                </tr>
                                                <tr ng-repeat="row in detailrap" class="text-center poppins">
                                                    <td>
                                                        <p class="margin-table-top">@{{ row.no_urut }}</p>
                                                    </td>
                                                    <td>
                                                        <p class="margin-table-top">@{{ row.uraian }}</p>
                                                    </td>
                                                    <td>
                                                        <p class="margin-table-top">@{{ row.jumlah_satuan }}</p>
                                                    </td>
                                                    <td>
                                                        <p class="margin-table-top">@{{ row.harga_satuan | currency: "Rp. ": 0 }}</p>
                                                    </td>
                                                    <td>
                                                        <p class="margin-table-top">@{{ row.total | currency: "Rp. ": 0 }}</p>
                                                    </td>
                                                    <td>
                                                        <p class="margin-table-top">@{{ row.jenis }}</p>
                                                    </td>
                                                    <td class="text-center">
                                                        <button class="alert alert-warning" data-toggle="modal"
                                                            data-target="#myModal" ng-click="edit(row)">Edit Data</button>
                                                        <button class="alert alert-danger" ng-click="delete(row)">Hapus
                                                            Data</button>
                                                    </td>
                                                </tr>
                                                <tr ng-if="datalen!=0">
                                                    <td colspan="6" class="text-center">@{{ no_urut }}</td>
                                                    <td class="text-center">
                                                        <button class="alert alert-success" data-toggle="modal"
                                                            data-target="#myModal"
                                                            ng-click="tambah_detail_pendapatan()">Tambah Detail
                                                            Rincian</button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
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
                                    <h4 class="modal-title alert alert-info" style="font-size: 15px;">
                                        @{{ ket }}
                                    </h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <div class="form-item">
                                        <input type="text" class="forms-label detail_rap" ng-model="no_urut"
                                            name="no_urut" id="no_urut" readonly>
                                        <label for="nomor">Nomor Urut</label>
                                        <p class="poppins" style="font-size: 12px;"><small style="color: red"> * </small>
                                            Wajib Di Isi</p>
                                    </div>
                                    <div class="form-item">
                                        <input type="text" class="forms-label detail_rap" name="uraian"
                                            id="uraian">
                                        <label for="uraian">Uraian</label>
                                        <p class="poppins" style="font-size: 12px;"><small style="color: red"> * </small>
                                            Wajib Di Isi</p>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-item">
                                                <input type="number" class="forms-label detail_rap" name="jumlah"
                                                    id="jumlah">
                                                <label for="jml_satuan">Jumlah</label>
                                                <p class="poppins" style="font-size: 12px;"><small style="color: red"> *
                                                    </small>
                                                    Wajib Di Isi</p>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-item">
                                                <input type="text" class="forms-label detail_rap" name="satuan"
                                                    id="satuan">
                                                <label for="jml_satuan">Satuan</label>
                                                <p class="poppins" style="font-size: 12px;"><small style="color: red"> *
                                                    </small>
                                                    Wajib Di Isi</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-item">
                                        <input type="text" class="forms-label detail_rap" name="harga_satuan"
                                            id="harga_satuan">
                                        <label for="harga_satuan">Harga Satuan</label>
                                        <p class="poppins" style="font-size: 12px;"><small style="color: red"> * </small>
                                            Wajib Di Isi</p>
                                    </div>

                                    <div class="form-item">
                                        <select class="form-control detail_rap" name="sumber_dana" id="sumber_dana">
                                            <option value="">Sumber Dana</option>
                                            <option ng-repeat="row in sumberdana" value="@{{ row.id }}">
                                                @{{ row.jenis }}</option>
                                        </select>
                                        <p class="poppins" style="font-size: 12px;"><small style="color: red"> * </small>
                                            Wajib Di Isi</p>
                                    </div>


                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-success" ng-hide="aksi" ng-click="save()"><i
                                            class="ti-save"></i> SIMPAN</button>
                                    <button type="button" class="btn btn-success" ng-show="aksi" ng-click="update()"><i
                                            class="ti-save"></i> PERBARUI</button>
                                    <button type="button" class="btn btn-danger"data-dismiss="modal"><i
                                            class="ti-close"></i>
                                        BATAL</button>
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
        <script src="{{ asset('assets/js/admin/pendapatan/rap/app.js') }}"></script>
        <script src="{{ asset('assets/js/admin/pendapatan/rap/service.js') }}"></script>
    @endsection

</x-layout>
