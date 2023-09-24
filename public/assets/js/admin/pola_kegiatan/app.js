/*jshint esversion: 6 */
$(document).ready(function () {
    $('#dataTable').DataTable();
});
var app = angular.module("homeApp", ['ngRoute', 'datatables']);


app.controller("homeController", function ($scope, service) {

    var fun = $scope;

    fun.get_all = () => {
        service.get_all(res => {
            fun.polakegiatan = res.data;
        });
    }

    fun.get_all();


    fun.add_form = () => {
        $("#pola").val("");
        fun.ket = "Form Menambahkan Pola Kegiatan";
        fun.aksi = false;
    }

    fun.edit = (row) => {
        fun.aksi = true;
        const {id,keterangan}=row;
        fun.ket = "Form Memperbarui Pola Kegiatan";
        fun.id = id;
        $("#pola").val(keterangan);

    }

    fun.save = () => {
        const obj = {
            keterangan: $("#pola").val()
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
            keterangan: $("#pola").val()
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
