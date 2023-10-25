/*jshint esversion: 6 */
$(document).ready(function () {
    $('#dataTable').DataTable();
});
var app = angular.module("homeApp", ['ngRoute', 'datatables']);


app.controller("homeController", function ($scope, service) {

    var fun = $scope;
    var datakelompok = [];
    let datajenis = [];


    fun.get_kelompok = () => {
        service.get_kelompok(res => {
            const { data } = res;
            const kelompokdata = data.filter(value => {
                value.status = 0;
                return value;
            })
            datakelompok = kelompokdata;
            fun.datakelompok = kelompokdata;
        });
    }
    fun.get_all = () => {
        fun.table = true;
        fun.form = false;
        service.get_all(res => {
            fun.objekdata = res.data.objek;
        });
    }

    fun.get_all();
    fun.get_kelompok();

    fun.pilih_kelompok = (row, status) => {
        const { id, kode, keterangan } = row;
        fun.id_kelompok = id;

        const data_temp = datakelompok.filter(value => {
            if (value.id == id) {
                value.status = status;
            }
            return value;
        })
        fun.datakelompok = data_temp;

        service.get_jenis(res => {
            const { data } = res;
            const filterdata = data.filter(value => {
                value.status = 0;
                return value.id_kelompok == id;
            })
            fun.jenisdata = filterdata;
        });
    }

    fun.pilih_jenis = (row, status) => {
        const { id, id_kelompok, kode, kode_kelompok, keterangan } = row;
        fun.id_jenis = id;
        fun.kode_jenis = "";
        fun.keterangan_jenis = "";
        if (status === 1) {
            fun.kode_jenis = kode_kelompok + "" + kode
            fun.keterangan_jenis = keterangan;
        }


        const data = datajenis.filter(value => {
            if (value.id == id) {
                value.status = status;
            }
            return value;
        });

        fun.jenisdata = data;

    }

    fun.add_form = () => {
        $("#kode").val("");
        $("#keterangan").val("");
        fun.kode_jenis = "";
        fun.keterangan_jenis = "";
        fun.get_kelompok();
        fun.jenisdata = [];
        fun.ket = "Form Menambahkan Objek Belanja Desa";
        fun.aksi = false;
        fun.form = true;
        fun.table = false;
    }

    fun.edit = (row) => {
        fun.aksi = true;
        const { id, id_kelompok, kode, keterangan } = row;
        fun.ket = "Form Memperbarui Objek Belanja Desa";
        fun.id = id;
        fun.table = false;
        fun.form = true;
        $("#kode").val(kode)
        $("#keterangan").val(keterangan);
        fun.id_kelompok = row.id_kelompok;
        fun.id_jenis = row.id_jenis;


        // filter data in kelompok

        const filterdata = datakelompok.filter(value => {
            if (value.id == row.id_kelompok) {
                value.status = 1;
            }
            return value;
        })
        fun.datakelompok = filterdata;
        service.get_jenis(res => {
            const { data } = res;
            const filterjenis = data.filter(value => {
                value.status = 0;
                if (value.id == row.id_jenis) {
                    fun.kode_jenis = value.kode_kelompok + "" + value.kode
                    fun.keterangan_jenis = value.keterangan;
                    value.status = 1;
                }
                return value.id_kelompok === row.id_kelompok;
            })
            datajenis = filterjenis;
            fun.jenisdata = filterjenis;
        });


    }

    fun.validation = (obj) => {

        // Check if the 'kode' property is empty
        if (!obj.kode) {
            return "Kode Objek belanja tidak boleh kosong";
        }

        // Check if the 'idk_kelompok' property is empty
        if (!obj.id_kelompok) {
            return "Kode Kelompok belanja tidak boleh kosong";
        }

        // Check if the 'id_jenis' property is empty
        if (!obj.id_jenis) {
            return "Kode Jenis belanja tidak boleh kosong";
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
            id_jenis: fun.id_jenis,
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
            id_jenis: fun.id_jenis,
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
    fun.batal = () => {
        fun.form = false;
        fun.table = true;
    }
});
