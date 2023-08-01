app.service("service", ["$http", function($http) {

    this.dataProfilDesa = function(callback) {
        $http({
            url: URL_API+"profil-desa",
            method: "GET"
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }
    this.updateProfilDesa = function(obj,id,callback) {
        $http({
            url: URL_API+"profil-desa/"+id,
            method: "PUT",
            data:obj
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }

}]);
