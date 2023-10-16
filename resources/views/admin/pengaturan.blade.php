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
            <div class="col-8 mt-5" style="margin: auto">
                <div class="card">
                    <div class="card-body" id="tabel-toko">
                        <div class="row" style="margin-bottom: 10px;">

                        </div>
                        <div class="data-tab">

                            <div class="row">
                                <div class="col-md-12">
                                    {{-- // form profil desa --}}
                                    <h5 class="poppins" style="margin-bottom: 10px;">Akun Administrasi</h5>
                                    <div class="form">
                                        <div class="form-item">
                                            <input type="text" class="profil-desa forms-label"
                                                value="@{{ provinsi }}" id="username" name="username">
                                            <label for="username">Nama Pengguna</label>
                                        </div>

                                        <div class="form-item">
                                            <input type="text" class="profil-desa  forms-label"
                                                value="@{{ kecamatan }}" id="katasandi" name="katasandi" disabled>
                                            <label for="katasandi">Kata Sandi</label>
                                        </div>

                                        <div class="form-item">
                                            <input type="password" class="profil-desa  forms-label"
                                                value="@{{ kecamatan }}" id="katasandinew" name="katasandinew">
                                            <label for="katasandinew">Kata Sandi Baru</label>
                                        </div>

                                        <div class="form-item">
                                            <input type="text" class="profil-desa  forms-label"
                                                value="@{{ kabupaten }}" id="judul_aplikasi" name="judul_aplikasi">
                                            <label for="judul_aplikasi">Judul Aplikasi</label>
                                        </div>
                                        <div class="row">
                                            <div class="col-8">
                                              <p class="poppins" style="font-size: 13px;">Foto Logo Login</p>
                                            </div>
                                            <div class="col-2">
                                                <input type="file" id="filelogin" name="filelogin" style="display: none;"/>
                                                <button class="alert alert-success" id="openfilelogin">Pilih Berkas</button>
                                            </div>
                                            <div class="col-2">

                                                <button class="alert alert-info" id="viewberkas">Lihat Berkas</button>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-8">

                                              <p class="poppins" style="font-size: 13px;">Foto Rel</p>
                                            </div>
                                            <div class="col-2">
                                                <input type="file" id="filerel" name="filerel" style="display: none;"/>
                                                <button class="alert alert-success" id="openfilerel">Pilih Berkas</button>
                                            </div>
                                            <div class="col-2">
                                                <button class="alert alert-info" id="viewberkasrel">Lihat Berkas</button>
                                            </div>
                                        </div>
                                    </div>
                                    {{--  --}}
                                </div>
                            </div>

                            {{-- // button --}}
                            <div class="row">
                                <div class="col-10">
                                    <button class="btn btn-primary" id="update" name="update">Perbarui</button>
                                </div>
                            </div>
                            {{--  --}}
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
        <script src="{{ asset('assets/js/admin/pengaturan/app.js') }}"></script>
        <script src="{{ asset('assets/js/admin/pengaturan/service.js') }}"></script>
    @endsection
