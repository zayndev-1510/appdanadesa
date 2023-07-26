/*jshint esversion: 6 */
var app = angular.module("homeApp", ['ngRoute']);

var error=document.getElementsByClassName("errormessage");
function changeBorder(event,check){
    var input = event.target; // Get the input element
    var value = input.value; // Get the value of the input
    if(value.length>0){
        event.target.classList.remove("error-input");
        if(check==1)  error[0].innerHTML="";
        else if(check==2) error[1].innerHTML="";
    }
}

app.controller("homeController", function($scope, service) {

    var fun = $scope;
    var service = service;

    var username = document.getElementById("username");
    var password = document.getElementById("password");
    var form_login=document.getElementsByClassName("form-login");

    fun.checkValidation=()=>{
        const userlen = username.value.length;
        const passlen = password.value.length;
        if(userlen==0){
            form_login[0].classList.add("error-input");
           error[0].innerHTML="Username masih kosong !"
            return true;
        }else if(passlen==0){
            form_login[1].classList.add("error-input");
            error[1].innerHTML="Password masih kosong !"
           return true;
        }
        return false;
    }
    fun.loginAkun = () => {

       var checkvalidation=fun.checkValidation();
       if(!checkvalidation){
        const obj = {
            username: username.value,
            password: password.value
        }
        service.LoginAkun(obj, (res) => {

            var success=res.success;
            if(success){
                swal({
                    text:res.message,
                    icon:"success"
                });
            }
            setInterval(function(){
                window.location.href=res.redirect;
            },2000)
        })

       }



    }
});
