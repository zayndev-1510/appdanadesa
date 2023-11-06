app.service("service", ["$http", function ($http) {
    const accessToken=localStorage.getItem("TOKEN_API");

    this.get_kegiatan = (callback) => {
        $http({
            url: URL_API + "anggaran-kegiatan",
            method: "GET",
            headers: {
                'Authorization': 'Bearer ' + accessToken // Attach the access token as a Bearer token
            }
        }).then(function (e) {

            callback(e.data);
        }).catch(function (err) {

        });
    }

    this.get_anggaran_tahun= (callback) => {
        $http({
            url: URL_API + "anggaran-tahun",
            method: "GET",
            headers: {
                'Authorization': 'Bearer ' + accessToken // Attach the access token as a Bearer token
            }
        }).then(function (e) {

            callback(e.data);
        }).catch(function (err) {

        });
    }

    this.get_kelompok = (callback) => {
        $http({
            url: URL_API + "kelompok-belanja",
            method: "GET",
            headers: {
                'Authorization': 'Bearer ' + accessToken // Attach the access token as a Bearer token
            }
        }).then(function (e) {

            callback(e.data);
        }).catch(function (err) {

        });
    }

    this.get_jenis = (callback) => {
        $http({
            url: URL_API + "jenis-belanja",
            method: "GET",
            headers: {
                'Authorization': 'Bearer ' + accessToken // Attach the access token as a Bearer token
            }
        }).then(function (e) {

            callback(e.data);
        }).catch(function (err) {

        });
    }

    this.get_objek = (callback) => {
        $http({
            url: URL_API + "objek-belanja",
            method: "GET",
            headers: {
                'Authorization': 'Bearer ' + accessToken // Attach the access token as a Bearer token
            }
        }).then(function (e) {

            callback(e.data);
        }).catch(function (err) {

        });
    }


    this.get_rab = function (callback) {
        $http({
            url: URL_API + "rab",
            method: "GET",
            headers: {
                'Authorization': 'Bearer ' + accessToken // Attach the access token as a Bearer token
            }
        }).then(function (e) {

            callback(e.data);
        }).catch(function (err) {

        });
    }

    this.save_data = function (obj, callback) {
        $http({
            url: URL_API + "rab/",
            method: "POST",
            data: obj,
            headers: {
                'Authorization': 'Bearer ' + accessToken // Attach the access token as a Bearer token
            }
        }).then(function successCallback(e) {
            callback(e.data);
        }).catch(function (err) {
            callback(err);
        });
    }

    this.update_data = function (obj, id, callback) {
        $http({
            url: URL_API + "rab/" + id,
            method: "PUT",
            data: obj,
            headers: {
                'Authorization': 'Bearer ' + accessToken // Attach the access token as a Bearer token
            }
        }).then(function successCallback(e) {
            callback(e.data);
        }).catch(function (err) {
            callback(err);
        });
    }

    this.delete_data = function (id, callback) {
        $http({
            url: URL_API + "rab/" + id,
            method: "DELETE",
            headers: {
                'Authorization': 'Bearer ' + accessToken // Attach the access token as a Bearer token
            }
        }).then(function successCallback(e) {
            callback(e.data);
        }).catch(function (err) {
            callback(err);
        });
    }

    this.get_paket_kegiatan = function (id, callback) {
        $http({
            url: URL_API + "detail-kegiatan/paket/" + id,
            method: "GET",
            headers: {
                'Authorization': 'Bearer ' + accessToken // Attach the access token as a Bearer token
            }
        }).then(function successCallback(e) {
            callback(e.data);
        }).catch(function (err) {
            callback(err);
        });
    }

    // detail rab desa
    this.get_rincian_rab = function (id, callback) {
        $http({
            url: URL_API + "detail-rab/" + id,
            method: "GET",
            headers: {
                'Authorization': 'Bearer ' + accessToken // Attach the access token as a Bearer token
            }
        }).then(function successCallback(e) {
            callback(e.data);
        }).catch(function (err) {
            callback(err);
        });
    }

    this.get_sumber_dana = function (callback) {
        $http({
            url: URL_API + "sumber-dana/",
            method: "GET",
            headers: {
                'Authorization': 'Bearer ' + accessToken // Attach the access token as a Bearer token
            }
        }).then(function successCallback(e) {
            callback(e.data);
        }).catch(function (err) {
            callback(err);
        });
    }

    this.save_rab_rinci = function (obj, callback) {
        $http({
            url: URL_API + "detail-rab/",
            method: "POST",
            data: obj,
            headers: {
                'Authorization': 'Bearer ' + accessToken // Attach the access token as a Bearer token
            }
        }).then(function successCallback(e) {
            callback(e.data);
        }).catch(function (err) {
            callback(err);
        });
    }

    this.update_rab_rinci = function (obj, id,callback) {
        $http({
            url: URL_API + "detail-rab/"+id,
            method: "PUT",
            data: obj,
            headers: {
                'Authorization': 'Bearer ' + accessToken // Attach the access token as a Bearer token
            }
        }).then(function successCallback(e) {
            callback(e.data);
        }).catch(function (err) {
            callback(err);
        });
    }

    this.delete_rab_rinci = function (id,callback) {
        $http({
            url: URL_API + "detail-rab/"+id,
            method: "DELETE",
            headers: {
                'Authorization': 'Bearer ' + accessToken // Attach the access token as a Bearer token
            }
        }).then(function successCallback(e) {
            callback(e.data);
        }).catch(function (err) {
            callback(err);
        });
    }
}]);
