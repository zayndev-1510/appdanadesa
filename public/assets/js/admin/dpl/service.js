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

    this.dataDpl = function(callback) {
        $http({
            url: URL_API+"dpl/load-data",
            method: "GET"
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }


    this.createDpl = function(obj, callback) {

        $http({
            url:URL_API+"dpl/save-data",
            method: "POST",
            data: obj
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }
    this.updateDpl = function(obj, callback) {
        $http({
            url: URL_API+"dpl/update-data",
            method: "PUT",
            data: obj
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }

    this.deleteDpl = function(id,callback) {
        $http({
            url: URL_API+"dpl/delete-data/"+id,
            method: "DELETE",

        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }



}]);
