app.service("service", ["$http", function($http) {

    const accessToken=localStorage.getItem("TOKEN_API");

    this.get_all = function(callback) {
        $http({
            url: URL_API+"kelompok-belanja",
            method: "GET",
            headers: {
                'Authorization': 'Bearer ' + accessToken // Attach the access token as a Bearer token
            }
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }
    this.save_data = function(obj,callback) {
        $http({
            url: URL_API + "kelompok-belanja/",
            method: "POST",
            data: obj,
            headers: {
                'Authorization': 'Bearer ' + accessToken // Attach the access token as a Bearer token
            }
        }).then(function successCallback(e) {
            callback(e.data);
        }).catch(function (err) {
            callback(err);
        });
    }

    this.update_data=function(obj, id,callback) {
        $http({
            url: URL_API + "kelompok-belanja/"+id,
            method: "PUT",
            data: obj,
            headers: {
                'Authorization': 'Bearer ' + accessToken // Attach the access token as a Bearer token
            }
        }).then(function successCallback(e) {
            callback(e.data);
        }).catch(function (err) {
            callback(err);
        });
    }

    this.delete_data=function(id,callback) {
        $http({
            url: URL_API + "kelompok-belanja/"+id,
            method: "DELETE",
            headers: {
                'Authorization': 'Bearer ' + accessToken // Attach the access token as a Bearer token
            }
        }).then(function successCallback(e) {
            callback(e.data);
        }).catch(function (err) {
            callback(err);
        });
    }



}]);
