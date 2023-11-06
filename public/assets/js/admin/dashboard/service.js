app.service("service", ["$http", function ($http) {


    const accessToken=localStorage.getItem("TOKEN_API");
    this.get_anggaran_tahun = function (callback) {
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

    this.get_anggaran_kegiatan = function (callback) {
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
    this.get_anggaran_pendapatan = function (callback) {
        $http({
            url: URL_API + "rap",
            method: "GET",
            headers: {
                'Authorization': 'Bearer ' + accessToken // Attach the access token as a Bearer token
            }
        }).then(function (e) {

            callback(e.data);
        }).catch(function (err) {

        });
    }
    this.get_anggaran_rab = function (callback) {
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

}]);
