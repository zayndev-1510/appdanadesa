app.service("service", ["$http", function($http) {

    this.dataBidang = function(callback) {
        $http({
            url: URL_API+"bidang",
            method: "GET"
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }
    this.createBidang = function(obj, callback) {
        $http({
            url:URL_API+"bidang",
            method: "POST",
            data: obj
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }
    this.updateBidang = function(obj, id,callback) {
        $http({
            url: URL_API+"bidang/"+id,
            method: "PUT",
            data: obj
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }

    this.deleteSumberDana = function(id,callback) {
        $http({
            url: URL_API+"bidang/"+id,
            method: "DELETE",

        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }



}]);
