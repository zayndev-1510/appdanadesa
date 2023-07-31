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
    this.createJabatan = function(obj, callback) {

        $http({
            url:URL_API+"jabatan-desa",
            method: "POST",
            data: obj
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }
    this.updateJabatan = function(obj, id,callback) {
        $http({
            url: URL_API+"jabatan-desa/"+id,
            method: "PUT",
            data: obj
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }

    this.deleteJabatan = function(id,callback) {
        $http({
            url: URL_API+"jabatan-desa/"+id,
            method: "DELETE",

        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }



}]);
