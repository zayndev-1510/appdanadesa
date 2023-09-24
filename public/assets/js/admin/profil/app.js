/*jshint esversion: 6 */
$(document).ready(function () {
    $('#dataTable').DataTable();
});
var app = angular.module("homeApp", ['ngRoute', 'datatables']);


app.controller("homeController", function ($scope, service) {

    var fun = $scope;
    var service = service;
    var message = "";
    var id_update = 0;

    var profil_desa = document.getElementsByClassName("profil-desa");
    var fileupload = null;

    fun.loadProfilDesa = () => {
        service.dataProfilDesa(res => {
            const { id, provinsi, kecamatan, kabupaten, desa, perangkat, idperangkat, jabatan, foto } = res.data;
            fun.provinsi = provinsi
            fun.kecamatan = kecamatan
            fun.kabupaten = kabupaten;
            fun.desa = desa
            fun.dataperangkat = perangkat;
            fun.jabatan = jabatan;
            var urlfoto = URL_APP + "default.jpg";
            if (foto !== null) {
                urlfoto = URL_APP + "uploads/" + foto;
            }

            $("#load_image").attr("src", urlfoto);
            id_update = id;
            setTimeout(() => {
                profil_desa[4].value = idperangkat
            }, 100);
        });
    }

    fun.loadProfilDesa();

    fun.updateProfil = () => {
        const data = {
            provinsi: profil_desa[0].value,
            kecamatan: profil_desa[1].value,
            kabupaten: profil_desa[2].value,
            desa: profil_desa[3].value,
            id_pengisi: parseInt(profil_desa[4].value)
        }

        if (fileupload !== null) {
            var formdata = new FormData();
            formdata.append("files", fileupload);
            formdata.append("data", JSON.stringify(data));
            service.updateProfilDesa(formdata, id_update, res => {
                const { success } = res;
                if (success) {
                    swal({
                        text: "Perbarui Profil Desa Berhasil",
                        icon: "success"
                    });
                    fun.loadProfilDesa();
                    return true;
                }
                swal({
                    text: "Perbarui Profil Desa Gagal",
                    icon: "error"
                });
            });
        }

    }

    fun.openLogo = () => {

        var fileInput = document.getElementById("file");
        fileInput.click();

        fileInput.addEventListener("change", () => {
            var selectedFile = fileInput.files[0];

            // Create a FileReader object to read the file
            var reader = new FileReader();

            // Set up an event listener for when the file has been read
            reader.onload = function (event) {
                // Set the src attribute of the image element to the data URL of the selected file
                $("#load_image").attr("src", event.target.result);
                const fileName = selectedFile.name;

                // Check if the file extension is not an image extension
                const imageExtensions = ['.jpg', '.jpeg', '.png', '.gif', '.bmp'];
                const fileExtension = fileName.slice(((fileName.lastIndexOf(".") - 1) >>> 0) + 2).toLowerCase();
                console.log(fileExtension);

                if (imageExtensions.includes('.' + fileExtension)) {
                    fileupload = fileInput.files[0];
                }
            };

            // Read the selected file as a data URL
            reader.readAsDataURL(selectedFile);
        });
    }

});
