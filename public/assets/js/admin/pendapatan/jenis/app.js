/*jshint esversion: 6 */
$(document).ready(function () {
    $('#dataTable').DataTable();
});
var app = angular.module("homeApp", ['ngRoute', 'datatables']);


app.controller("homeController", function ($scope, service) {

    var fun = $scope;


    fun.get_kelompok = () => {
        service.get_kelompok(res => {
            fun.kelompokdata = res.data;
        });
    }
    fun.get_all = () => {
        fun.table = true;
        fun.form = false;
        service.get_all(res => {
            fun.jenisdata = res.data;
        });
    }

    fun.get_all();
    fun.get_kelompok();

    fun.pilih_kelompok = (row) => {
        const { id, kode, keterangan } = row;
        fun.kode_kelompok = kode;
        fun.id_kelompok = id;
        fun.keterangan_kelompok = keterangan;
    }

    fun.add_form = () => {
        $("#kode").val("");
        $("#keterangan").val("");
        fun.ket = "Form Menambahkan Jenis Pendapatan Desa";
        fun.aksi = false;
        fun.form = true;
        fun.table = false;
    }

    fun.edit = (row) => {
        fun.aksi = true;
        const { id, id_kelompok, kode, keterangan } = row;
        fun.ket = "Form Memperbarui Kelompok Pendapatan Desa";
        fun.id = id;
        fun.table = false;
        fun.form = true;
        fun.get_kelompok();
        $("#kode").val(kode)
        $("#keterangan").val(keterangan);
        fun.id_kelompok = id_kelompok;

        // filter data in kelompok

        const filterdata = fun.kelompokdata.filter(value => {
            return value.id == id_kelompok
        })
        fun.kode_kelompok = filterdata[0].kode;
        fun.keterangan_kelompok = filterdata[0].keterangan;

    }

    fun.validation = (obj) => {

        // Check if the 'kode' property is empty
        if (!obj.kode) {
            return "Kode Jenis Pendapatan tidak boleh kosong";
        }

        // Check if the 'kode' property is empty
        if (!obj.id_kelompok) {
            return "Kode Jenis Pendapatan tidak boleh kosong";
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
            id_kelompok: fun.id_kelompok,
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
            id_kelompok: fun.id_kelompok,
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
