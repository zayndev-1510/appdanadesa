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
                                            <th>Kode</th>
                                            <th>Kelompok</th>
                                            <th>Jenis</th>
                                            <th>
                                                Aksi
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody style="font-size: 12px">
                                        <tr class="text-center" ng-repeat="row in jenisdata">
                                            <td>@{{ row.kode_kelompok }} @{{ row.kode }}</td>
                                            <td>@{{ row.keterangan_kelompok }}</td>
                                            <td>@{{ row.keterangan }}</td>
                                            <td>
                                                <span class="fa fa-edit"
                                                    style="font-size: 20px;color: yellow;cursor: pointer;"
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
                                    <div class="col-6">
                                        <table datatable="ng" class="table table-bordered table-jabatan">
                                            <thead class="bg-light" style="font-size: 12px;">
                                                <tr class="text-center">
                                                    <th>Kode</th>
                                                    <th>Jenis</th>
                                                    <th>
                                                        Aksi
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody style="font-size: 12px">
                                                <tr class="text-center" ng-repeat="row in kelompokdata">
                                                    <td>@{{ row.kode }}</td>
                                                    <td>@{{ row.keterangan }}</td>
                                                    <td>
                                                        <button class="btn btn-primary"
                                                            ng-click="pilih_kelompok(row)">Pilih</button>
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
                                                    <td>Kode Kelompok</td>
                                                    <td>
                                                        <p>@{{ kode_kelompok }}</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Keterangan Kelompok Pendapatan</td>
                                                    <td>
                                                        <p>@{{ keterangan_kelompok }}</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Kode Jenis</td>
                                                    <td>
                                                        <input type="text" class="form-control" name="kode"
                                                            id="kode" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Keterangan Jenis Pendapatan</td>
                                                    <td>
                                                        <textarea class="form-control" name="keterangan" id="keterangan"></textarea>
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
        <script src="{{ asset('assets/js/admin/pendapatan/jenis/app.js') }}"></script>
        <script src="{{ asset('assets/js/admin/pendapatan/jenis/service.js') }}"></script>
    @endsection
</x-layout>
