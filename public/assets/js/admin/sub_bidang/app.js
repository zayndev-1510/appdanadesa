/*jshint esversion: 6 */
$(document).ready(function () {
    $('#dataTable').DataTable();
});
var app = angular.module("homeApp", ['ngRoute', 'datatables']);


app.controller("homeController", function ($scope, service) {

    var fun = $scope;
    var service = service;
    var message = "";
    var id = 0;
    var data = {};



    var responjson = [
        { sukses: "Simpan data berhasil", error: "Simpan data gagal" },
        { sukses: "Update Data Berhasil", error: "Update data gagal" },
        { sukses: "Delete Data Berhasil", error: "Delete data gagal" }
    ];

    var bidang = document.getElementsByClassName("bidang");

    fun.aksi = true;

    fun.loadData = () => {
        service.dataSubBidang((res) => {
            fun.datasubbidang = res.data.sub_bidang;
            fun.databidang = res.data.bidang;
        })
    }

    fun.loadData();

    fun.clearText = () => {
        for (var i = 0; i < bidang.length; i++) {
            bidang[i].value = "";
        }
    }

    fun.tambahData = () => {
        fun.aksi = false;
        fun.ket = "Form Tambah Sub Bidang";
        fun.clearText();

    }

    fun.editData = (row) => {
        const { id_bidang, sub_bidang, kode_sub_bidang } = row;
        id = row.id;
        bidang[0].value = kode_sub_bidang;
        bidang[1].value = id_bidang;
        bidang[2].value = sub_bidang
        fun.aksi = true;
        fun.ket = "Form Edit Sub Bidang";
    }



    fun.checkValidation = () => {
        var check = false;
        $(".bidang").each(function (index, element) {
            const key = $(element).attr("name");
            const value = $(element).val();

            const modifiedKey = key
                .split('_')
                .map(word => word.charAt(0).toUpperCase() + word.slice(1).toLowerCase())
                .join(' ');
            if (value === null || value.trim() === "") {
                message = modifiedKey + " is empty";
                check = true;
                return false;
            }
            // Push an object with 'key' and 'value' properties into the 'data' array
            data[key] = value;
        });

        return check;
    }

    fun.saveBidang = () => {
        var check = fun.checkValidation();
        if (check) {
            swal({
                text: message,
                icon: "error"
            });

            return;
        }

        service.createSubBidang(data, (res) => {
            if (res.success) {
                swal({
                    text: responjson[0].sukses,
                    icon: "success"
                });
                fun.loadData();
                fun.clearText();
                return;
            }
            swal({
                text: responjson[0].error,
                icon: "error"
            });
        })

    }

    fun.updateBidang = () => {
        $(".bidang").each(function (index, element) {
            const key = $(element).attr("name");
            const value = $(element).val();
            data[key] = value;
        });

        service.updateSubBidang(data, id, (res) => {
            if (res.success) {
                swal({
                    text: responjson[1].sukses,
                    icon: "success"
                });
                fun.loadData();
                return;
            }

            swal({
                text: responjson[1].error,
                icon: "error"
            });
        })
    }

    fun.delete = (row) => {
        service.deleteSubBidang(row.id, (res) => {
            if (res.success > 0) {
                swal({
                    text: responjson[2].sukses,
                    icon: "success"
                });
                fun.loadData();
                return;
            }

            swal({
                text: responjson[2].error,
                icon: "error"
            });
        })
    }

});
