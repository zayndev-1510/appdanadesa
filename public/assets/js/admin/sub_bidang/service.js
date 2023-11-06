app.service("service", ["$http", function($http) {

    const accessToken=localStorage.getItem("TOKEN_API");

    this.dataSubBidang = function(callback) {
        $http({
            url: URL_API+"sub_bidang",
            method: "GET",
            headers: {
                'Authorization': 'Bearer ' + accessToken // Attach the access token as a Bearer token
            }
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }
    this.createSubBidang = function(obj, callback) {
        $http({
            url:URL_API+"sub_bidang",
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
    this.updateSubBidang = function(obj, id,callback) {
        $http({
            url: URL_API+"sub_bidang/"+id,
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

    this.deleteSubBidang = function(id,callback) {
        $http({
            url: URL_API+"sub_bidang/"+id,
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
