app.service("service", ["$http", function($http) {

    this.dataCalonKkn = function(callback) {
        $http({
            url: URL_API+"mahasiswa/load-data-calon-kkn",
            method: "GET"
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }

    this.getBerkasCalonKkn=function(id,callback){
        $http({
            url: URL_API+"mahasiswa/berkas-calon-kkn/"+id,
            method: "GET"
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }

    this.konfirmasiCalon=function(obj,callback){
        $http({
            url: URL_API+"mahasiswa/konfirmasi-status",
            method: "PUT",
            data:obj
        }).then(function(e) {
            callback(e.data);
        }).catch(function(err) {

        });
    }


    this.getPeriodeKkn=function(callback){
        $http({
            url: URL_API+"periode-kkn/load-data",
            method: "GET"
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }
    this.getCalonKknPeriode=function(id,callback){
        $http({
            url: URL_API+"mahasiswa/get-calon-kkn-periode/"+id,
            method: "GET"
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }


}]);
