@extends('admin.layout.template')
@section('header-lvl-1')
    <div class="col-sm-6">
        <div class="breadcrumbs-area clearfix">
            <h4 class="page-title pull-left">Dashboard</h4>
            <ul class="breadcrumbs pull-left">
                <li><a href="index.html">Home</a></li>
                <li><span>{{ $data->keterangan }}</span></li>
            </ul>
        </div>
    </div>
@endsection
@section('content')
    <div class="main-content-inner" ng-app="homeApp" ng-controller="homeController">
        <div class="row">
            <div class="col-12 mt-5" ng-show="check">
                <div class="card">
                    <div class="card-body" id="tabel-toko">
                        <div class="row" style="margin-bottom: 10px;">
                            <div class="col-10">
                                <p style="font-size: 17px">{{ $data->keterangan }}</p>
                            </div>
                            <div class="col-2">
                                <button class="btn btn-primary" data-toggle="modal" data-target="#myModal"
                                    ng-click="tambahData()" style="width: 100%;"><i class="ti-plus"></i> Tambah Data</button>
                            </div>
                        </div>
                        <div class="data-tab">
                            {{-- Tabel Data Perangkat --}}
                            <table datatable="ng" class="table table-bordered">
                                <thead class="bg-light" style="font-size: 12px;">
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Nama Lengkap</th>
                                        <th>Tempat Lahir</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Jabatan</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody style="font-size: 12px">
                                    <tr class="text-center" ng-repeat="row in dataperangkat">
                                        <td>@{{ $index + 1 }}</td>
                                        <td>@{{ row.namalengkap }}</td>
                                        <td>@{{ row.tempatlahir}}</td>
                                        <td>@{{ row.tgllahir }}</td>
                                        <td>@{{ row.jeniskelamin }}</td>
                                        <td>@{{ row.jabatan }}</td>
                                        <td>@{{ row.username }}</td>
                                        <td>@{{ row.password }}</td>
                                        <td>
                                            <span class="fa fa-edit" style="font-size: 20px;color: yellow;cursor: pointer;"
                                                ng-click="editData(row)" data-toggle="modal" data-target="#myModal"></span>
                                            <span class="fa fa-trash" style="font-size: 20px;color:red;cursor: pointer;"
                                                ng-click="delete(row)"></span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            {{--  --}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-8 mt-5 container-perangkat" ng-hide="check">
                <div class="card">
                    <div class="card-body" id="tabel-toko">
                        <div class="row" style="margin-bottom: 10px;">
                            <div class="col-10">
                                <h3 style="font-size: 17px">@{{ ket }}</h3>
                            </div>
                            <div class="col-2">

                            </div>
                        </div>

                        {{-- Alert Error --}}
                        <div class="alert alert-danger" role="alert" ng-show="error">
                            @{{message}}
                          </div>
                        {{--  --}}

                        {{-- profil --}}
                        <h5>Profil</h5>
                        <hr></hr>
                        <div class="form">
                            <div class="form-item">
                              <input type="text"  class="perangkat forms-label">
                              <label for="username">Nama Lengkap</label>
                            </div>

                            <div class="form-item">
                                <input type="text"" class="perangkat forms-label">
                                <label for="tempat_lahir">Tempat Lahir</label>
                            </div>

                            <div class="form-item">
                                <input type="date" class="perangkat forms-label">
                                <label for="tgl_lahir">Tanggal Lahir</label>
                            </div>
                            <div class="form-item">
                                <select class="forms-label perangkat">
                                    <option value="">Pilih Kelamin</option>
                                    <option value="L">Pria</option>
                                    <option value="W">Wanita</option>
                                </select>
                                <label for="jk">Jenis Kelamin</label>
                            </div>
                            {{--  --}}

                            {{-- kontak --}}
                            <h5>Kontak</h5>
                            <hr></hr>
                            <div class="form-item">
                                <input type="text" class="perangkat forms-label">
                                <label for="nomor_handphone">Nomor Handphone</label>
                            </div>
                            <div class="form-item">
                                <input type="email" class="perangkat forms-label">
                                <label for="email">Email</label>
                            </div>
                            {{--  --}}

                            {{-- Surat keputusan --}}
                            <h5>Surat Keputusan</h5>
                            <hr></hr>
                            <div class="form-item">
                                <input type="text" class="perangkat forms-label">
                                <label for="username">NO SK</label>
                            </div>
                            <div class="form-item">
                                <input type="date" class="perangkat forms-label">
                                <label for="tgl_sk">Tanggal SK</label>
                            </div>
                            {{--  --}}

                            {{-- Jabatan --}}
                            <h5>Jabatan</h5>
                            <hr></hr>
                            <div class="form-item">
                                <select class="forms-label perangkat">
                                    <option ng-repeat="row in datajabatan" value="@{{row.id}}">@{{row.jabatan}}</option>
                                </select>
                                <label for="username">Jabatan</label>
                            </div>
                            {{--  --}}

                            {{-- Akun pengguna --}}
                            <h5>Akun Pengguna</h5>
                            <hr></hr>
                            <div class="form-item">
                                <input type="text" class="perangkat forms-label">
                                <label for="username">Username</label>
                            </div>
                            <div class="form-item">
                                <input type="password" class="perangkat forms-label">
                                <label for="password">@{{ket_pass}}</label>
                                <p ng-show="pass_new"><small style="color: red"> * </small> Jika Tidak Memperbarui Password Anda Bisa Melewatkan Ini</p>
                            </div>
                            <div class="form-item" ng-show="pass_new">
                                <input type="password" class="perangkat forms-label">
                                <label for="password">Password Baru</label>
                                <p ng-show="pass_new"><small style="color: red"> * </small> Jika Tidak Memperbarui Password Anda Bisa Melewatkan Ini</p>
                            </div>
                            {{--  --}}

                          </div>
                        <div class="row">
                            <div class="col-10">
                                <button class="btn btn-success" ng-hide="aksi" ng-click="savePerangkat()">Simpan</button>
                                <button class="btn btn-primary" ng-show="aksi" ng-click="updatePerangkat()">Perbarui</button>
                            </div>
                            <div class="col-2">
                                <button class="btn btn-danger">Batal</button>
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
    <script src="{{ asset('assets/js/admin/perangkat/app.js') }}"></script>
    <script src="{{ asset('assets/js/admin/perangkat/servive.js') }}"></script>
@endsection
