app.service("service", ["$http", function($http) {

    const accessToken=localStorage.getItem("TOKEN_API");
    this.dataBidang = function(callback) {
        $http({
            url: URL_API+"bidang",
            method: "GET",
            headers: {
                'Authorization': 'Bearer ' + accessToken // Attach the access token as a Bearer token
            }
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }
    this.createBidang = function(obj, callback) {
        $http({
            url:URL_API+"bidang",
            method: "POST",
            data: obj,
            headers: {
                'Authorization': 'Bearer ' + accessToken // Attach the access token as a Bearer token
            }
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }
    this.updateBidang = function(obj, id,callback) {
        $http({
            url: URL_API+"bidang/"+id,
            method: "PUT",
            data: obj,
            headers: {
                'Authorization': 'Bearer ' + accessToken // Attach the access token as a Bearer token
            }
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }

    this.deleteBidang = function(id,callback) {
        $http({
            url: URL_API+"bidang/"+id,
            method: "DELETE",
            headers: {
                'Authorization': 'Bearer ' + accessToken // Attach the access token as a Bearer token
            }

        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }
}]);
