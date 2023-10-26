<x-layout :datalayout="$data" :datalogin="$datalogin">
    <x-header :dataheader="$data" />
    @section('content')
        <div class="main-content-inner" ng-app="homeApp" ng-controller="homeController">
            <div class="row">
                <div class="col-12 mt-5">
                    <div class="card">
                        <div class="card-body" id="tabel-toko">
                            <div class="row" style="margin-bottom: 10px;">
                                <div class="col-10">
                                    <p style="font-size: 17px;font-weight: 800" class="poppins">{{ $data->keterangan }}</p>
                                </div>
                                <div class="col-2">
                                    <button class="btn btn-primary poppins" data-toggle="modal" data-target="#myModal"
                                        ng-click="add_form()" style="width: 100%;"><i class="ti-plus"></i> Tambah
                                        Data</button>
                                </div>
                            </div>
                            <div class="data-tab">
                                <table datatable="ng" class="table table-bordered table-jabatan">
                                    <thead class="bg-light" style="font-size: 12px;">
                                        <tr class="text-center">
                                            <th>Kode</th>
                                            <th>Keterangan</th>
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

            </div>

            <div class="modal" id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">@{{ ket }}</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="form-item">
                                <input type="text" class="forms-label" name="kode" id="kode">
                                <label for="jenis">Kode Kelompok Belanja</label>
                                <p class="poppins"><small style="color: red"> * </small> Wajib Di Isi</p>
                            </div>
                            <div class="form-item">
                                <input type="text" class="forms-label" name="keterangan" id="keterangan">
                                <label for="jenis">Keterangan Kelompok Belanja</label>
                                <p class="poppins"><small style="color: red"> * </small> Wajib Di Isi</p>
                            </div>

                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" ng-hide="aksi" ng-click="save()"><i
                                    class="ti-save"></i> SIMPAN</button>
                            <button type="button" class="btn btn-success" ng-show="aksi" ng-click="update()"><i
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
        <script src="{{ asset('assets/js/admin/belanja/kelompok/app.js') }}"></script>
        <script src="{{ asset('assets/js/admin/belanja/kelompok/service.js') }}"></script>
    @endsection

</x-layout>
