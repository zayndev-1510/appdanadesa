app.service("service", ["$http", function($http) {

    this.dataSumberDana = function(callback) {
        $http({
            url: URL_API+"sumber-dana",
            method: "GET"
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }
    this.createSumberDana = function(obj, callback) {

        $http({
            url:URL_API+"sumber-dana",
            method: "POST",
            data: obj
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }
    this.updateSumberDana = function(obj, id,callback) {
        $http({
            url: URL_API+"sumber-dana/"+id,
            method: "PUT",
            data: obj
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }

    this.deleteSumberDana = function(id,callback) {
        $http({
            url: URL_API+"sumber-dana/"+id,
            method: "DELETE",

        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }



}]);
