app.service("service", ["$http", function($http) {

    this.dataKegiatan = function(callback) {
        $http({
            url: URL_API+"kegiatan",
            method: "GET"
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }
    this.createKegiatan = function(obj, callback) {
        $http({
            url:URL_API+"kegiatan",
            method: "POST",
            data: obj
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }
    this.updateKegiatan = function(obj, id,callback) {
        $http({
            url: URL_API+"kegiatan/"+id,
            method: "PUT",
            data: obj
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }

    this.deleteKegiatan = function(id,callback) {
        $http({
            url: URL_API+"kegiatan/"+id,
            method: "DELETE",

        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }



}]);
