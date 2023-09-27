app.service("service", ["$http", function($http) {


    this.get_all = function(callback) {
        $http({
            url: URL_API+"kelompok-pendapatan",
            method: "GET"
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }
    this.save_data = function(obj,callback) {
        $http({
            url: URL_API + "kelompok-pendapatan/",
            method: "POST",
            data: obj,
        }).then(function successCallback(e) {
            callback(e.data);
        }).catch(function (err) {
            callback(err);
        });
    }

    this.update_data=function(obj, id,callback) {
        $http({
            url: URL_API + "kelompok-pendapatan/"+id,
            method: "PUT",
            data: obj,
        }).then(function successCallback(e) {
            callback(e.data);
        }).catch(function (err) {
            callback(err);
        });
    }

    this.delete_data=function(id,callback) {
        $http({
            url: URL_API + "kelompok-pendapatan/"+id,
            method: "DELETE",
        }).then(function successCallback(e) {
            callback(e.data);
        }).catch(function (err) {
            callback(err);
        });
    }



}]);