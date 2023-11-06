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
    this.save_anggaran_tahun = function (obj, callback) {
        $http({
            url: URL_API + "anggaran-tahun",
            method: "POST",
            data: obj,
            headers: {
                'Authorization': 'Bearer ' + accessToken // Attach the access token as a Bearer token
            }
        }).then(function (e) {
            callback(e.data);
        }).catch(function (err) {

        });
    }
    this.update_anggaran_tahun = function (obj, id, callback) {
        $http({
            url: URL_API + "anggaran-tahun/" + id,
            method: "PUT",
            data: obj,
            headers: {
                'Authorization': 'Bearer ' + accessToken // Attach the access token as a Bearer token
            }
        }).then(function (e) {

            callback(e.data);
        }).catch(function (err) {

        });
    }

    this.delete_anggaran_tahun = function (id, callback) {
        $http({
            url: URL_API + "anggaran-tahun/" + id,
            method: "DELETE",
            headers: {
                'Authorization': 'Bearer ' + accessToken // Attach the access token as a Bearer token
            }
        }).then(function (e) {

            callback(e.data);
        }).catch(function (err) {

        });
    }
}]);
