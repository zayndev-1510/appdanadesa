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
    var attribut = ["tahun", "status"];
    const newOptionsData = [
        { value: "1", text: "Aktif" },
        { value: "0", text: "Non Aktif" },
    ];
    var responjson = [
        { sukses: "Simpan data berhasil", error: "Simpan data gagal" },
        { sukses: "Update Data Berhasil", error: "Update data gagal" },
        { sukses: "Delete Data Berhasil", error: "Delete data gagal" }
    ];
    fun.aksi = true;

    // set element in form
    $(".anggaran-tahun").each((index, element) => {
        $(element).attr("name", attribut[index]);
        $(element).attr("id", attribut[index]);
        const name = $(element).attr("name");
        var label = $(element).next();
        label.attr("for", name);
    })

    // appaend value in option
    const mySelect = $("#status");

    // Loop through the new options data and append them to the select element
    newOptionsData.forEach((optionData) => {
        const newOption = $("<option>", {
            value: optionData.value,
            text: optionData.text
        });
        mySelect.append(newOption);
    });


    fun.clear_input = () => {
        $(".anggaran-tahun").each((index, element) => {
            $(element).val("");
        })
        fun.aksi = false;
    }
    fun.clear_input

    fun.get_all = () => {
        service.get_anggaran_tahun(res => {
            const { data } = res;
            const filterdata = data.filter(value => {
                value.ket = (value.status == 1) ? "Aktif" : "Non Aktif";
                return value;
            })
            fun.anggarantahun = filterdata;
        });
    }

    fun.get_all();

    fun.save = () => {
        let payload = {};
        var check = true;
        $(".anggaran-tahun").each((index, element) => {
            var value = $(element).val();
            var name = $(element).attr("name");
            if (value === '') {
                swal({
                    text: name + " masih kosong ",
                    icon: "error"
                });
                check = false;
                return false;
            }
            payload[name] = value;
        });

        if (check) {
            service.save_anggaran_tahun(payload, res => {
                const { success } = res;
                if (success) {
                    swal({
                        text: "Simpan data berhasil",
                        icon: "success"
                    });
                    fun.get_all();
                    fun.clear_input();
                    return;
                }
                swal({
                    text: "Simpan data gagal",
                    icon: "error"
                });
            })
        }
    }

    fun.edit = (row) => {
        fun.id = parseInt(row.id);
        const edit = ["tahun", "status"];
        $(".anggaran-tahun").each((index, element) => {
            $(element).val(row[edit[index]]);
        })
    }

    fun.update = () => {
        let payload = {};
        var check = true;
        $(".anggaran-tahun").each((index, element) => {
            var value = $(element).val();
            var name = $(element).attr("name");
            if (value === '') {
                swal({
                    text: name + " masih kosong ",
                    icon: "error"
                });
                check = false;
                return false;
            }
            payload[name] = value;
        });

        if (check) {
            service.update_anggaran_tahun(payload, fun.id, res => {
                const { success } = res;
                if (success) {
                    swal({
                        text: "Simpan data berhasil",
                        icon: "success"
                    });
                    fun.get_all();
                    fun.clear_input();
                    return;
                }
                swal({
                    text: "Simpan data gagal",
                    icon: "error"
                });
            })
        }
    }

    fun.delete = (row) => {
        service.delete_anggaran_tahun(row.id, res => {
            const { success } = res;
            if (success) {
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
