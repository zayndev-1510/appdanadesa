app.service("service", ["$http", function($http) {

    this.dataFakultas = function(callback) {
        $http({
            url: URL_API+"fakultas/load-data-fakultas",
            method: "GET"
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }
    this.dataJurusan = function(callback) {
        $http({
            url: URL_API+"jurusan/load-data-jurusan",
            method: "GET"
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }
    this.createJurusan = function(obj, callback) {

        $http({
            url:URL_API+"jurusan/save-data-jurusan",
            method: "POST",
            data: obj
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }
    this.updateJurusan = function(obj, callback) {
        $http({
            url: URL_API+"jurusan/update-data-jurusan",
            method: "PUT",
            data: obj
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }

    this.deleteJurusan = function(id,callback) {
        $http({
            url: URL_API+"jurusan/delete-data-jurusan/"+id,
            method: "DELETE",

        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }



}]);
