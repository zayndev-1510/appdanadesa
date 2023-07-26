app.service("service", ["$http", function($http) {
    var link = "http://localhost:8000/api/admin/";
    var dashboard = "http://localhost:8080/dashboard/main"
    this.dataDashboard = function(callback) {
        $http({
            url: dashboard,
            method: "GET"
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }

    this.dataMahasiswa = function(callback) {
        $http({
            url: link + "grafik-mahasiswa",
            method: "GET"
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }

}]);