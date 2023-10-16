app.service("service", ["$http", function($http) {



    this.get_all = function(callback) {
        $http({
            url: URL_API+"setting",
            method: "GET"
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
                'Content-Type': undefined
            },
        }).then(function successCallback(e) {
            callback(e.data);
        }).catch(function (err) {
            callback(err);
        });
    }

}]);
