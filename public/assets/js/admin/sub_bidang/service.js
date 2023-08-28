app.service("service", ["$http", function($http) {
    
    this.dataSubBidang = function(callback) {
        $http({
            url: URL_API+"sub_bidang",
            method: "GET"
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }
    this.createSubBidang = function(obj, callback) {
        $http({
            url:URL_API+"sub_bidang",
            method: "POST",
            data: obj
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }
    this.updateSubBidang = function(obj, id,callback) {
        $http({
            url: URL_API+"sub_bidang/"+id,
            method: "PUT",
            data: obj
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }

    this.deleteSubBidang = function(id,callback) {
        $http({
            url: URL_API+"sub_bidang/"+id,
            method: "DELETE",

        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }



}]);
