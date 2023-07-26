app.service("service", ["$http", function($http) {

    this.dataPeriodeKkn = function(callback) {
        $http({
            url: URL_API+"periode-kkn/load-data",
            method: "GET"
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }
    this.createPeriodeKkn = function(obj, callback) {

        $http({
            url:URL_API+"periode-kkn/save-data",
            method: "POST",
            data: obj
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }
    this.updatePeriodeKkn = function(obj, callback) {
        $http({
            url: URL_API+"periode-kkn/update-data",
            method: "PUT",
            data: obj
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }

    this.deletePeriodeKkn = function(id,callback) {
        $http({
            url: URL_API+"periode-kkn/delete-data/"+id,
            method: "DELETE",

        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }



}]);
