app.service("service", ["$http", function ($http) {



    this.get_bidang = function (callback) {
        $http({
            url: URL_API + "sub_bidang",
            method: "GET"
        }).then(function (e) {

            callback(e.data);
        }).catch(function (err) {

        });
    }
    this.get_kegiatan = (callback) => {
        $http({
            url: URL_API + "kegiatan",
            method: "GET"
        }).then(function (e) {

            callback(e.data);
        }).catch(function (err) {

        });
    }

    this.get_tahun_anggaran = (callback) => {
        $http({
            url: URL_API + "tahun-anggaran",
            method: "GET"
        }).then(function (e) {

            callback(e.data);
        }).catch(function (err) {

        });
    }

    this.get_perangkat_desa = (callback) => {
        $http({
            url: URL_API + "perangkat-desa",
            method: "GET"
        }).then(function (e) {

            callback(e.data);
        }).catch(function (err) {

        });
    }
    this.get_all = function (callback) {
        $http({
            url: URL_API + "anggaran-kegiatan",
            method: "GET"
        }).then(function (e) {

            callback(e.data);
        }).catch(function (err) {

        });
    }

    this.save_data = function (obj, callback) {
        $http({
            url: URL_API + "anggaran-kegiatan/",
            method: "POST",
            data: obj,
        }).then(function successCallback(e) {
            callback(e.data);
        }).catch(function (err) {
            callback(err);
        });
    }

    this.update_data = function (obj, id, callback) {
        $http({
            url: URL_API + "anggaran-kegiatan/" + id,
            method: "PUT",
            data: obj,
        }).then(function successCallback(e) {
            callback(e.data);
        }).catch(function (err) {
            callback(err);
        });
    }

    this.delete_data = function (id, callback) {
        $http({
            url: URL_API + "anggaran-kegiatan/" + id,
            method: "DELETE",
        }).then(function successCallback(e) {
            callback(e.data);
        }).catch(function (err) {
            callback(err);
        });
    }



}]);
