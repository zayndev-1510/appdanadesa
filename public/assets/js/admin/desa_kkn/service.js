app.service("service", ["$http", function($http) {

    this.dataPeriodeKkn = function(callback) {
        $http({
            url: URL_API+"periode-kkn/load-data",
            method: "GET"
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }

    this.getDataKabupaten = function(callback) {
        $http({
            url:"https://api.binderbyte.com/wilayah/kabupaten?api_key=d31d2538d0af25a84c0854b31cde5a5cd82e2566acb993fd29689d981521f960&id_provinsi=74",
            method: "GET"
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }

    this.getDataKecamatan = function(id,callback) {
        $http({
            url:"https://api.binderbyte.com/wilayah/kecamatan?api_key=d31d2538d0af25a84c0854b31cde5a5cd82e2566acb993fd29689d981521f960&id_kabupaten="+id,
            method: "GET"
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }

    this.getDataDesa= function(id,callback) {
        $http({
            url:"https://api.binderbyte.com/wilayah/kelurahan?api_key=d31d2538d0af25a84c0854b31cde5a5cd82e2566acb993fd29689d981521f960&id_kecamatan="+id,
            method: "GET"
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }





    this.dataDesaKkn = function(callback) {
        $http({
            url: URL_API+"desa/load-data",
            method: "GET"
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }


    this.createDesaKkn = function(obj, callback) {

        $http({
            url:URL_API+"desa/save-data",
            method: "POST",
            data: obj
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }
    this.updateDesaKkn = function(obj, callback) {
        $http({
            url: URL_API+"desa/update-data",
            method: "PUT",
            data: obj
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }

    this.deleteDesaKkn = function(id,callback) {
        $http({
            url: URL_API+"desa/delete-data/"+id,
            method: "DELETE",

        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }



}]);
