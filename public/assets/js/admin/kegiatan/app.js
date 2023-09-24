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
    var data_bidang=[];
    var data_kegiatan=[];
    var bidang = document.getElementsByClassName("bidang");

    var responjson = [
        { sukses: "Simpan data berhasil", error: "Simpan data gagal" },
        { sukses: "Update Data Berhasil", error: "Update data gagal" },
        { sukses: "Delete Data Berhasil", error: "Delete data gagal" }
    ];

    fun.aksi = true;

    fun.loadData = () => {
        service.dataKegiatan((res) => {
            fun.databidang = res.data.sub_bidang;
            fun.data_bidang=res.data.sub_bidang;
            data_bidang=res.data.sub_bidang;
            fun.datakegiatan = res.data.kegiatan;
            data_kegiatan=res.data.kegiatan;
        })
    }

    fun.loadData();

    fun.get_sub_bidang=()=>{
        const filter=data_bidang.filter(value=>{
            return value.id_bidang==fun.id_bidangs;
        })
        fun.data_sub_bidang=filter[0].sub_bidangs;
    }
    fun.get_kegiatan=()=>{
        const filter=data_kegiatan.filter(value=>{
            return value.id_sub_bidang==fun.id_sub_bidangs;
        })
        fun.datakegiatan=filter[0];
    }
    fun.clearText = () => {
        for (var i = 0; i < bidang.length; i++) {
            bidang[i].value = "";
        }
    }
    fun.tambahData = () => {
        fun.aksi = false;
        fun.ket = "Form Tambah Kegiatan";
        fun.clearText();

    }

    fun.getSubBidang = (id_bidang) => {
        const get_data_sub_bidang = fun.databidang.filter(item => item.id_bidang === parseInt(bidang[0].value));
        fun.subbidangs = get_data_sub_bidang[0].sub_bidangs;
    }

    fun.editData = (row) => {
        const { id_bidang, id_sub_bidang, kode_kegiatan, kegiatan } = row;
        id = row.id;
        bidang[0].value = id_bidang;
        bidang[2].value = kode_kegiatan;
        bidang[3].value = kegiatan;
        //filtered data
        const get_data_sub_bidang = fun.databidang.filter(item => item.id_bidang === parseInt(id_bidang));
        fun.subbidangs = get_data_sub_bidang[0].sub_bidangs;
        setTimeout(() => {
            bidang[1].value = id_sub_bidang;
        }, 100);
        fun.aksi = true;
        fun.ket = "Form Edit Kegiatan";
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

        service.createKegiatan(data, (res) => {
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

        service.updateKegiatan(data, id, (res) => {
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
        service.deleteKegiatan(row.id, (res) => {
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
