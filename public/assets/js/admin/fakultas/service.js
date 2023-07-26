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
    this.createFakultas = function(obj, callback) {

        $http({
            url:URL_API+"fakultas/save-data-fakultas",
            method: "POST",
            data: obj
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }
    this.updateFakultas = function(obj, callback) {
        $http({
            url: URL_API+"fakultas/update-data-fakultas",
            method: "PUT",
            data: obj
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }

    this.deleteFakultas = function(id,callback) {
        $http({
            url: URL_API+"fakultas/delete-data-fakultas/"+id,
            method: "DELETE",

        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }



}]);
