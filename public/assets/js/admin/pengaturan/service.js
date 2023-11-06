app.service("service", ["$http", function($http) {

    const accessToken=localStorage.getItem("TOKEN_API");
    this.get_all = function(callback) {
        $http({
            url: URL_API+"setting",
            method: "GET",
            headers: {
                'Authorization': 'Bearer ' + accessToken // Attach the access token as a Bearer token
            }
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }

    this.updateSetting = function(fd,callback) {
        $http({
            url: URL_API + "setting",
            method: "POST",
            data: fd,

            headers: {
                'Content-Type': undefined,
                'Authorization': 'Bearer ' + accessToken
            },
        }).then(function successCallback(e) {
            callback(e.data);
        }).catch(function (err) {
            callback(err);
        });
    }

}]);
