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

    this.dataPerangkat = function(callback) {
        $http({
            url: URL_API+"perangkat-desa",
            method: "GET",
            headers: {
                'Authorization': 'Bearer ' + accessToken // Attach the access token as a Bearer token
            }
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }
    this.createPerangkat = function(obj, callback) {
        $http({
            url:URL_API+"perangkat-desa",
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

    this.updatePerangkat = function(obj, id,callback) {
        $http({
            url: URL_API+"perangkat-desa/"+id,
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

    this.deletePerangkat = function(id,callback) {
        $http({
            url: URL_API+"perangkat-desa/"+id,
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
