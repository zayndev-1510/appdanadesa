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
                            <div class="col-12">
                               <h4 class="text-center">Profil Desa</h4>
                            </div>
                        </div>
                        <div class="data-tab">

                            {{-- // form profil desa --}}
                            <div class="form">
                                <div class="form-item">
                                <input type="text" class="profil-desa forms-label" value="@{{ provinsi }}">
                                <label for="provinsi">Provinsi</label>
                                </div>

                                <div class="form-item">
                                    <input type="text"" class="profil-desa  forms-label" value="@{{ kecamatan}}">
                                    <label for="kecamatan">Kecamatan</label>
                                </div>

                                <div class="form-item">
                                    <input type="text" class="profil-desa  forms-label" value="@{{ kabupaten }}">
                                    <label for="kabupaten">Kabupaten</label>
                                </div>

                                <div class="form-item">
                                    <input type="text" class="profil-desa  forms-label" value="@{{desa}}">
                                    <label for="desa">Kelurahan/Desa</label>
                                </div>
                                <div class="form-item">
                                    <select class="forms-label profil-desa ">
                                        <option ng-repeat="row in dataperangkat" value="@{{row.id}}">@{{row.nama_lengkap}}</option>
                                    </select>
                                    <label for="username">Nama Pengisi</label>
                                </div>
                                <div class="form-item">
                                    <input type="text" class="profil-desa  forms-label" value="@{{ jabatan }}">
                                    <label for="jabatan">Jabatan</label>
                                </div>
                            </div>
                        {{--  --}}

                        {{-- // button --}}
                        <div class="row">
                            <div class="col-10">
                                <button class="btn btn-primary" ng-click="updateProfil()">Perbarui</button>
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
    <script src="{{ asset('assets/js/admin/profil/app.js') }}"></script>
    <script src="{{ asset('assets/js/admin/profil/service.js') }}"></script>
@endsection
