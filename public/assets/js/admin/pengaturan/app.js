/*jshint esversion: 6 */
$(document).ready(function () {
    $('#dataTable').DataTable();
});
var app = angular.module("homeApp", ['ngRoute', 'datatables']);


app.controller("homeController", function ($scope, service) {

    var fun = $scope;
    fun.table = true;
    var urlfotologin = null;
    var urlfotorel = null;
    var id=0;
    var id_user=0;
    fun.get_all = () => {
        service.get_all(res => {
            const { user, pengaturan } = res.data;
            $("#username").val(user.username);
            $("#katasandi").val(user.password);
            $("#judul_aplikasi").val(pengaturan.judul_aplikasi);
            id=pengaturan.id;
            id_user=user.id;

        });
    }

    fun.get_all();

    $("#openfilelogin").on("click", () => {
        $("#filelogin").click();
    })

    $("#openfilerel").on("click", () => {
        $("#filerel").click();
    })


    // Listen for changes in the file input element
    $("#filelogin").on("change", () => {
        // Get the selected file
        const selectedFile = $("#filelogin")[0].files[0];

        if (selectedFile) {
            // You can now work with the selected file
            urlfotologin = URL.createObjectURL(selectedFile);
        }

    });

    // Listen for changes in the file input element
    $("#filerel").on("change", () => {
        // Get the selected file
        const selectedFile = $("#filerel")[0].files[0];

        if (selectedFile) {
            // You can now work with the selected file
            urlfotorel = URL.createObjectURL(selectedFile);
        }
    });

    $("#viewberkasrel").on("click", () => {
        if (urlfotorel === null || urlfotorel === "") {
            swal({
                text: "File Logo Rel Belum Ada",
                icon: "warning"
            });
            return;
        }
        window.open(urlfotorel, '_blank');
    })

    $("#viewberkas").on("click", () => {

        if (urlfotologin === null || urlfotologin === "") {
            swal({
                text: "File Logo Login Belum Ada",
                icon: "warning"
            });
            return;
        }
        window.open(urlfotologin, '_blank');
    })

    $("#update").on("click", () => {
        var formdata = new FormData();
        const sandiold=$("#katasandi").val();
        const sandinew=$("#katasandinew").val();
        formdata.append("fotologin", $("#filelogin")[0].files[0])
        formdata.append("fotorel", $("#filerel")[0].files[0]);
        formdata.append("data",JSON.stringify(
            {
             "judul_aplikasi":$("#judul_aplikasi").val(),
             "id":id,
             "username":$("#username").val(),
             "password":sandinew,
             "id_user":id_user
            }
        ))
        service.updateSetting(formdata, (res) => {
                const {success}=res;
                if(success){
                    swal({
                        text:"Pembaruan data berhasil",
                        icon:"success"
                    })
                }
        });
    });
});
