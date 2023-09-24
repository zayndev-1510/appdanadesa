/*jshint esversion: 6 */
$(document).ready(function () {
    $('#dataTable').DataTable();
});
var app = angular.module("homeApp", ['ngRoute', 'datatables']);


app.controller("homeController", function ($scope, service) {

    var fun = $scope;

    fun.get_all = () => {
        service.get_all(res => {
            fun.kelompokdata = res.data;
        });
    }

    fun.get_all();


    fun.add_form = () => {
        $("#kode").val("");
        $("#keterangan").val("");
        fun.ket = "Form Menambahkan Pola Kegiatan";
        fun.aksi = false;
    }

    fun.edit = (row) => {
        fun.aksi = true;
        const { id, kode, keterangan } = row;
        fun.ket = "Form Memperbarui Kelompok Pendapatan Desa";
        fun.id = id;
        $("#kode").val(kode)
        $("#keterangan").val(keterangan);

    }

    fun.validation = (obj) => {

        // Check if the 'kode' property is empty
        if (!obj.kode) {
            return "Kode kelompok Pendapatan tidak boleh kosong";
        }

        // Check if the 'keterangan' property is empty
        if (!obj.keterangan) {
            return "Keterangan tidak boleh kosong.";
        }

        // Add additional validation logic as needed

        // If all checks pass, return null to indicate the object is valid
        return null
    }
    fun.save = () => {

        const obj = {
            kode: $("#kode").val(),
            keterangan: $("#keterangan").val()
        }
        var check = fun.validation(obj);
        if (check !== null) {
            swal({
                text: check,
                icon: "error"
            });
            return;
        }
        service.save_data(obj, res => {
            if (res.success) {
                swal({
                    text: "Simpan data berhasil",
                    icon: "success"
                });
                fun.get_all();
                return;
            }
            swal({
                text: "Simpan data gagal",
                icon: "error"
            });
        })
    }
    fun.update = () => {
        const obj = {
            kode: $("#kode").val(),
            keterangan: $("#keterangan").val()
        }
        service.update_data(obj, fun.id, res => {
            if (res.success) {
                swal({
                    text: "Perbarui data berhasil",
                    icon: "success"
                });
                fun.get_all();
                return;
            }
            swal({
                text: "Perbarui data gagal",
                icon: "error"
            });
        })
    }

    fun.delete = (row) => {
        service.delete_data(row.id, res => {
            if (res.success) {
                swal({
                    text: "Hapus data berhasil",
                    icon: "success"
                });
                fun.get_all();
                return;
            }
            swal({
                text: "Hapus data gagal",
                icon: "error"
            });
        })
    }
});
