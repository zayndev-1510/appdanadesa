app.service("service", ["$http", function($http) {

    this.dataFakultasMahasiswa = function(callback) {
        $http({
            url: URL_API+"mahasiswa/load-data-fakultas-mahasiswa",
            method: "GET"
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }


    this.dataMahasiswa = function(callback) {
        $http({
            url: URL_API+"mahasiswa/load-data-mahasiswa",
            method: "GET"
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }

    this.createMahasiswa = function(obj, callback) {

        $http({
            url:URL_API+"mahasiswa/save-data-mahasiswa",
            method: "POST",
            data: obj,
    
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }
    this.updateMahasiswa = function(obj, callback) {
        $http({
            url: URL_API+"mahasiswa/update-data-mahasiswa",
            method: "POST",
            data: obj
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }

    this.deleteMahasiswa= function(id,callback) {
        $http({
            url: URL_API+"mahasiswa/delete-data-mahasiswa/"+id,
            method: "DELETE",

        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }

    this.uploadFotoMahasiswa=function(fd, id,callback) {
        $http({
            url: URL_API + "mahasiswa/upload-foto-mhs/"+id,
            method: "POST",
            data: fd,
            headers: {
                'Content-Type': undefined
            },
        }).then(function successCallback(e) {
            callback(e.data);
        }).catch(function (err) {
            callback(err);
        });
    }



}]);
