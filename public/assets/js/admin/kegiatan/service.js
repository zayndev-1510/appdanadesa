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

    this.dataKegiatan = function(callback) {
        $http({
            url: URL_API+"kegiatan",
            method: "GET",
            headers: {
                'Authorization': 'Bearer ' + accessToken // Attach the access token as a Bearer token
            }
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }
    this.createKegiatan = function(obj, callback) {
        $http({
            url:URL_API+"kegiatan",
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
    this.updateKegiatan = function(obj, id,callback) {
        $http({
            url: URL_API+"kegiatan/"+id,
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

    this.deleteKegiatan = function(id,callback) {
        $http({
            url: URL_API+"kegiatan/"+id,
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
