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
    this.updateProfilDesa = function(fd,id,callback) {
        $http({
            url: URL_API + "profil-desa/"+id,
            method: "POST",
            data: fd,
            headers: {
                'Content-Type': undefined
            },
        }).then(function successCallback(e) {
            callback(e.data);
        }).catch(function (err) {
            callback(err);
        });
    }

    this.uploadFotoMahasiswa=function(fd, id,callback) {

    }

}]);
