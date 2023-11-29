app.service("service", ["$http", function($http) {

    const accessToken=localStorage.getItem("TOKEN_API");

    this.get_objek = function(callback) {
        $http({
            url: URL_API+"objek-pendapatan",
            method: "GET",
            headers: {
                'Authorization': 'Bearer ' + accessToken // Attach the access token as a Bearer token
            }
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }

    this.get_all = function(callback) {
        $http({
            url: URL_API+"rap",
            method: "GET",
            headers: {
                'Authorization': 'Bearer ' + accessToken // Attach the access token as a Bearer token
            }
        }).then(function(e) {
            callback(e.data);
        }).catch(function(err) {

        });
    }

    this.check_nomor_urut= function(id,callback) {
        $http({
            url: URL_API+"detail-rap/check_nomor_urut/"+id,
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
            url: URL_API + "detail-rap/",
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
            url: URL_API + "detail-rap/"+id,
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
            url: URL_API + "detail-rap/"+id,
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

    this.save_rap= function(obj,callback) {
        $http({
            url: URL_API + "rap/",
            method: "POST",
            data: obj,
        }).then(function successCallback(e) {
            callback(e.data);
        }).catch(function (err) {
            callback(err);
        });
    }

    this.update_rap= function(obj,id,callback) {
        $http({
            url: URL_API + "rap/"+id,
            method: "PUT",
            data: obj,
        }).then(function successCallback(e) {
            callback(e.data);
        }).catch(function (err) {
            callback(err);
        });
    }

    this.delete_rap=function(id,callback) {
        $http({
            url: URL_API + "rap/"+id,
            method: "DELETE",
        }).then(function successCallback(e) {
            callback(e.data);
        }).catch(function (err) {
            callback(err);
        });
    }

    this.get_anggaran_tahun=function(callback) {
        $http({
            url: URL_API + "anggaran-tahun/",
            method: "GET",
        }).then(function successCallback(e) {
            callback(e.data);
        }).catch(function (err) {
            callback(err);
        });
    }





}]);
