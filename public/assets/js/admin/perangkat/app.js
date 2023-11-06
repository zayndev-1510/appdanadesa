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
    var old_password = null;

    fun.check = true;
    fun.error = false;
    fun.pass_new = false;
    var responjson = [
        { sukses: "Simpan data berhasil", error: "Simpan data gagal" },
        { sukses: "Update Data Berhasil", error: "Update data gagal" },
        { sukses: "Delete Data Berhasil", error: "Delete data gagal" }
    ];

    var perangkat = document.getElementsByClassName("perangkat");


    const formItem = $(".form-item");
    const formPerangkat=$(".perangkat");
    formItem.each((index, element) => {
        const labelElement = $(element).find("label").attr("for");
        $(formPerangkat).eq(index).attr("name",labelElement);
        $(formPerangkat).eq(index).attr("id",labelElement);

    })


    fun.aksi = true;
    fun.loadData = () => {
        service.dataPerangkat((res) => {
            fun.dataperangkat = res.data;
        })
    }

    fun.loadJabatan = () => {
        service.dataJabatan((res) => {
            fun.datajabatan = res.data;
        })
    }



    fun.loadData();
    fun.loadJabatan();

    fun.clearText = () => {
        for (var i = 0; i < perangkat.length; i++) {
            perangkat[i].value = "";
        }
    }

    fun.tambahData = () => {
        fun.aksi = false;
        fun.check = false;
        fun.ket = "Form Tambah Perangkat Desa";
        fun.ket_pass = "Password";
        fun.clearText();

    }

    fun.editData = (row) => {
        id = row.id;
        fun.aksi = true;
        fun.check = false;
        fun.ket_pass = "Password Lama"
        fun.pass_new = true;
        perangkat[0].value = row.namalengkap;
        perangkat[1].value = row.tempatlahir;
        perangkat[2].value = row.tgllahir;
        perangkat[3].value = row.jeniskelamin;
        perangkat[4].value = row.nohandphone;
        perangkat[5].value = row.email;
        perangkat[6].value = row.nosk;
        perangkat[7].value = row.tglsk;
        perangkat[8].value = row.idjabatan;
        perangkat[9].value = row.username;
        old_password = row.password;
    }

    fun.checkValidation = () => {
        if (perangkat[0].value.length == 0) {
            message = "Nama Lengkap Belum Di Masukan";
            return true;
        }
        else if (perangkat[1].value.length == 0) {
            message = "Tempat Lahir Belum Di Masukan";
            return true;
        }
        else if (perangkat[2].value.length == 0) {
            message = "Tanggal Lahir Belum Di Atur";
            return true;
        }
        else if (perangkat[3].value.length == 0) {
            message = "Jenis Kelamin Belum Di Pilih";
            return true;
        }
        else if (perangkat[4].value.length == 0) {
            message = "Nomor Handphone Belum Di Masukan";
            return true;
        }
        else if (perangkat[5].value.length == 0) {
            message = "Email Belum Di Masukan";
            return true;
        }
        else if (perangkat[6].value.length == 0) {
            message = "Nomor Surat Keputusan Belum Di Masukan";
            return true;
        }
        else if (perangkat[7].value.length == 0) {
            message = "Tanggal Keluar Surat Keputusan Belum Dimasukan";
            return true;
        }
        else if (perangkat[8].value.length == 0) {
            message = "Jabatan Belum Di Pilih";
            return true;
        }
        else if (perangkat[9].value.length == 0) {
            message = "Username Belum Di Masukan";
            return true;
        }
        else if (perangkat[10].value.length == 0) {
            message = "Password Belum Di Masukan";
            return true;
        }
        else if (perangkat[12].value.length == 0) {
            message = "Role Belum Di Pilih";
            return true;
        }

        return false;
    }


    fun.savePerangkat = () => {
        var check = fun.checkValidation();
        if (check) {
            fun.error = true;
            fun.message = message;
            return true;
        }
        var data = {
            nama_lengkap: perangkat[0].value,
            tempat_lahir: perangkat[1].value,
            tgl_lahir: perangkat[2].value,
            jenis_kelamin: perangkat[3].value,
            no_handphone: perangkat[4].value,
            email: perangkat[5].value,
            no_sk: perangkat[6].value,
            tgl_sk: perangkat[7].value,
            id_jabatan: parseInt(perangkat[8].value),
            username: perangkat[9].value,
            password: perangkat[10].value,
            role: perangkat[12].value,
        }
        service.createPerangkat(data, (res) => {
            if (res.success) {
                swal({
                    text: responjson[0].sukses,
                    icon: "success"
                });
                fun.clearText();
                return;
            }
            swal({
                text: responjson[0].error,
                icon: "error"
            });
        })

    }

    fun.updatePerangkat = () => {
        var data = {
            nama_lengkap: perangkat[0].value,
            tempat_lahir: perangkat[1].value,
            tgl_lahir: perangkat[2].value,
            jenis_kelamin: perangkat[3].value,
            no_handphone: perangkat[4].value,
            email: perangkat[5].value,
            no_sk: perangkat[6].value,
            tgl_sk: perangkat[7].value,
            id_jabatan: parseInt(perangkat[8].value),
            username: perangkat[9].value,
            password: old_password,
            password_new: null,
            role: perangkat[12].value
        }
        if (perangkat[10].value.length != 0 && perangkat[11].value.length != 0) {
            data.password = perangkat[10].value;
            data.password_new = perangkat[11].value;
        }

        service.updatePerangkat(data, id, (res) => {
            if (res.success) {
                swal({
                    text: responjson[1].sukses,
                    icon: "success"
                });
                fun.loadData();
                fun.check = true;
                return;
            }

            swal({
                text: res.message,
                icon: "error"
            });
        })
    }


    fun.delete = (row) => {
        service.deletePerangkat(row.id, (res) => {
            if (res.success) {
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

    fun.batal = () => {
        fun.loadData();
        fun.clearText();
        fun.check = true;
    }




});
