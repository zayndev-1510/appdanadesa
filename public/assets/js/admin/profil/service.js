app.service("service", ["$http", function($http) {

    const accessToken=localStorage.getItem("TOKEN_API");

    this.dataProfilDesa = function(callback) {
        $http({
            url: URL_API+"profil-desa",
            method: "GET",
            headers: {
                'Authorization': 'Bearer ' + accessToken // Attach the access token as a Bearer token
            }
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
                'Content-Type': undefined,
                'Authorization': 'Bearer ' + accessToken // Attach the access token as a Bearer token
            },
        }).then(function successCallback(e) {
            callback(e.data);
        }).catch(function (err) {
            callback(err);
        });
    }
}]);
