app.service("service", ["$http", function($http) {

    this.LoginAkun = function(obj, callback) {
        $http({
            url: URL_API+"login",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: "POST",
            data: obj,
          //set the headers so angular passing info as form data (not request payload)
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }


}]);
