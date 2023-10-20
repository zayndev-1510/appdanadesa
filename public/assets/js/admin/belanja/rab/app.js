/*jshint esversion: 6 */
$(document).ready(function () {
    $('#dataTable').DataTable();
});
var app = angular.module("homeApp", ['ngRoute', 'datatables']);


app.controller("homeController", function ($scope, service) {

    var fun = $scope;
    fun.action = true;
    var attribut = [
        "paket_kegiatan","kelompok", "jenis", "objek", "anggaran"
    ];

    $(".form-rab").each((index, element) => {
        $(element).attr("name", attribut[index]);
        $(element).attr("id", attribut[index]);

    });
    fun.clearinput = () => {
        fun.table = true;
    }
    fun.get_kegiatan = () => {
        service.get_kegiatan(res => {
            const { data } = res;
            fun.datakegiatan = data;

        });
    }

    fun.get_kelompok = () => {
        service.get_kelompok(res => {
            const { data } = res;
            fun.datakelompok = data;
        })
    }

    fun.get_rab = () => {
        service.get_rab((res) => {
            const { data } = res;
            fun.datarab = data;
        });
    }
    fun.clearinput();
    fun.get_kegiatan();
    fun.get_rab();

    fun.formatRupiah = (amount) => {
        const formatter = new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0
        });

        return formatter.format(amount);
    }

    fun.add_form = () => {
        fun.table = false;
        fun.form = true;
        fun.aksi = false;
        fun.ket = "Form Rencana Anggaran Belanja Desa";
        fun.get_kelompok();
        fun.datajenis = [];
        fun.dataobjek = [];

    }

    fun.pilih_kegiatan = (row, a) => {

        var action = false;

        if (a == 0) {
            action = true;
        }
        const newdata = fun.datakegiatan.filter((value) => {
            value.action = false;
            if (row.id === value.id) {
                value.action = action;
            }
            return value;
        })
        fun.datakegiatan = newdata;
        const { id, kode_kegiatan, kode_bidang, kode_sub_bidang, kegiatan } = row;
        fun.kode_kegiatan = kode_bidang + "." + kode_sub_bidang + "." + kode_kegiatan;
        fun.id_kegiatan = id;
        fun.kegiatan = kegiatan;

        // paket kegiatan
        service.get_paket_kegiatan(id, res => {
            const { data } = res;
            fun.paketkegiatan = data;
        });
    }
    fun.get_nilai_paket=(id_paket)=>{
        const filter=fun.paketkegiatan.filter(row=>{
            return row.id==id_paket;
        })
       fun.nilai=fun.formatRupiah(filter[0].nilai);
    }

    fun.get_jenis_data = (id) => {
        service.get_jenis(res => {
            const { data } = res;
            const filter = data.filter(value => {
                return value.id_kelompok == parseInt(id);
            })
            fun.datajenis = filter;
        })
    }


    fun.get_objek_data = (id) => {
        service.get_objek(res => {
            const { data } = res;
            const filter = data.filter(value => {
                return value.id_jenis == parseInt(id);
            })
            fun.dataobjek = filter;
        })
    }

    fun.save = () => {
        var check = true;
        if (fun.id_kegiatan === undefined) {
            check = false;
            swal({
                text: "Pilih Kegiatan Terlebih Dahulu !",
                icon: "error"
            });
        }
        $(".form-rab").each((index, element) => {
            const name = $(element).attr("name"); // Get the name attribute of the current element
            const value = $(element).val();
            if (value === '') {
                swal({
                    text: name + " " + "Masih Kosong",
                    icon: "warning"
                });
                check = false;
                return false;
            }

        });

        if (check) {
            var obj = {
                id_kegiatan: fun.id_kegiatan,
                kode: parseInt($("#objek").val()),
                anggaran: 0,
                paket_kegiatan:parseInt($("#paket_kegiatan").val())
            }
            service.save_data(obj, (res) => {
                const { success } = res;
                if (success) {
                    swal({
                        text: "simpan data berhasil",
                        icon: "success"
                    });
                    fun.get_rab();
                    return;
                }
                swal({
                    text: "simpan data gagal",
                    icon: "error"
                });
            });
        }
    }

    fun.edit = (row) => {
        fun.table = false;
        fun.form = true;
        fun.aksi = true;
        fun.id_kegiatan = row.id_kegiatan;
        fun.id = row.id;

        const newdata = fun.datakegiatan.filter((value) => {
            value.action = false;
            if (row.id_kegiatan === value.id) {
                value.action = true;
                fun.kode_kegiatan = value.kode_bidang + "." + value.kode_sub_bidang + "." + value.kode_kegiatan;
                fun.kegiatan = value.kegiatan;
            }
            return value;
        })
        $("#kelompok").val(row.id_kelompok);


        service.get_jenis(res => {
            const data = res.data;
            const datajenis = data.filter(value => value.id_kelompok === row.id_kelompok);
            fun.datajenis = datajenis;
            setTimeout(() => {
                $("#jenis").val(row.id_jenis)
            }, 300);
        });;
        service.get_objek(res => {
            const { data } = res;
            const dataobjek = data.filter(value => {
                return value.id_jenis == row.id_jenis;
            })
            fun.dataobjek = dataobjek;
            setTimeout(() => {
                $("#objek").val(row.id_objek)
            }, 300)
        });
        fun.datakegiatan = newdata;
    }

    fun.update = () => {
        var obj = {
            id_kegiatan: fun.id_kegiatan,
            kode: parseInt($("#objek").val(),),
            anggaran: 0,
        }
        service.update_data(obj, fun.id, (res) => {
            const { success } = res;
            if (success) {
                swal({
                    text: "simpan data berhasil",
                    icon: "success"
                });
                fun.get_rab();
                fun.form = false;
                fun.table = true;

                return;
            }
            swal({
                text: "simpan data gagal",
                icon: "error"
            });
        });
    }

    fun.batal = () => {
        fun.form = false;
        fun.table = true;
        location.reload();
    }

    fun.delete = (row) => {
        service.delete_data(row.id, res => {
            const { success } = res;
            if (success) {
                swal({
                    text: "hapus data berhasil !",
                    icon: "success"
                })
                fun.get_rab();
                return;
            }
            swal({
                text: "hapus data gagal",
                "icon": "error"
            });
        })
    }

});
