app.service("service", ["$http", function($http) {

    const accessToken=localStorage.getItem("TOKEN_API");
    this.dataJabatan = function(callback) {
        $http({
            url: URL_API+"jabatan-desa",
            method: "GET",
            headers: {
                'Authorization': 'Bearer ' + accessToken // Attach the access token as a Bearer token
            }
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }
    this.createJabatan = function(obj, callback) {

        $http({
            url:URL_API+"jabatan-desa",
            method: "POST",
            data: obj,
            headers: {
                'Authorization': 'Bearer ' + accessToken // Attach the access token as a Bearer token
            }
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }
    this.updateJabatan = function(obj, id,callback) {
        $http({
            url: URL_API+"jabatan-desa/"+id,
            method: "PUT",
            data: obj,
            headers: {
                'Authorization': 'Bearer ' + accessToken // Attach the access token as a Bearer token
            }
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }

    this.deleteJabatan = function(id,callback) {
        $http({
            url: URL_API+"jabatan-desa/"+id,
            method: "DELETE",
            headers: {
                'Authorization': 'Bearer ' + accessToken // Attach the access token as a Bearer token
            }
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }
}]);
