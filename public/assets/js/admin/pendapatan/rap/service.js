app.service("service", ["$http", function($http) {


    this.get_objek = function(callback) {
        $http({
            url: URL_API+"objek-pendapatan",
            method: "GET"
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }

    this.get_all = function(callback) {
        $http({
            url: URL_API+"rap",
            method: "GET"
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }


    this.check_nomor_urut= function(id,callback) {
        $http({
            url: URL_API+"detail-rap/check_nomor_urut/"+id,
            method: "GET"
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }
    this.save_data = function(obj,callback) {
        $http({
            url: URL_API + "detail-rap/",
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
            url: URL_API + "detail-rap/"+id,
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
            url: URL_API + "detail-rap/"+id,
            method: "DELETE",
        }).then(function successCallback(e) {
            callback(e.data);
        }).catch(function (err) {
            callback(err);
        });
    }



}]);
