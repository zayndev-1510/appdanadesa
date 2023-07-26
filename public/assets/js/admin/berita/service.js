app.service("service", ["$http", function($http) {

    this.dataBerita = function(callback) {
        $http({
            url: URL_API+"berita/load-data",
            method: "GET"
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }

    this.uploadThumbnail= function(obj, callback) {

        $http({
            url:URL_API+"berita/upload-thumbnail",
            method: "POST",
            data: obj,
            headers: {
                'Content-Type':undefined
            }
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }

    this.createBerita = function(obj, callback) {

        $http({
            url:URL_API+"berita/save-data",
            method: "POST",
            data: obj
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }
    this.updateBerita = function(obj, callback) {
        $http({
            url: URL_API+"berita/update-data",
            method: "PUT",
            data: obj
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }

    this.deleteBerita = function(id,callback) {
        $http({
            url: URL_API+"berita/delete-data/"+id,
            method: "DELETE",

        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }



}]);
