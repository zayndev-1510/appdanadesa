app.service("service", ["$http", function($http) {


    this.dataJabatan = function(callback) {
        $http({
            url: URL_API+"jabatan-desa",
            method: "GET"
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }

    this.dataPerangkat = function(callback) {
        $http({
            url: URL_API+"perangkat-desa",
            method: "GET"
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }
    this.createPerangkat = function(obj, callback) {

        $http({
            url:URL_API+"perangkat-desa",
            method: "POST",
            data: obj
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }

    this.updatePerangkat = function(obj, id,callback) {
        $http({
            url: URL_API+"perangkat-desa/"+id,
            method: "PUT",
            data: obj
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }

    this.deletePerangkat = function(id,callback) {
        $http({
            url: URL_API+"perangkat-desa/"+id,
            method: "DELETE",

        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }



}]);
