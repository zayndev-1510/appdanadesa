/*jshint esversion: 6 */
$(document).ready(function () {
    $('#dataTable').DataTable();
});
var app = angular.module("homeApp", ['ngRoute', 'datatables']);


app.controller("homeController", function ($scope, service) {

    var fun = $scope;
    fun.table = true;

    fun.get_rab = () => {
        service.get_rab(res => {
            const { data } = res;
            fun.datarab = data;
        })
    }

    fun.get_sumber_dana = () => {
        service.get_sumber_dana(res => {
            const { data } = res;
            fun.sumberdana = data;
        })
    }

    fun.clear_input = () => {
        $(".form-rab-detail").each((index, element) => {
            $(element).val("");
        });
    }
    fun.get_rab();
    fun.get_sumber_dana();

    fun.get_rab_rinci = (row) => {
        var len = 0;
        service.get_rincian_rab(row.id, res => {
            const { data } = res;
            const filter = data.filter(value => {
                const str = value.jumlah.split(" ");
                const jumlah = str[0];
                value.total = jumlah * value.harga;
                return value;
            })

            len = data.length;
            var nomor_urut = null;
            fun.rabrinci = filter;
            if (len === 0) {
                nomor_urut = "0000001";
            } else {
                nomor_urut = (parseInt(len++, 10) + 1).toString().padStart(7, '0');
            }
            fun.nomor_urut = nomor_urut;
            fun.nama_paket = row.nama_paket;
            fun.rincian = row.rincian;
            fun.kegiatan = row.kegiatan;
            fun.pagu = row.pagu;
            fun.nilai = row.nilai_paket;
            fun.rab = row.id;

        });
    }
    fun.rincianRab = (row) => {
        fun.table = false;
        fun.form = true;
        fun.data = row;
        fun.ket = "Menambahkan Rincian Rencana Anggaran Belanja";
        fun.get_rab_rinci(row);
        fun.clear_input();
    }

    fun.formatRupiah = (amount) => {
        const formatter = new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0
        });

        return formatter.format(amount);
    }

    $("#harga_satuan").blur(function () {

        const unformattedNumber = this.value.replace(/\./g, '');
        fun.harga = unformattedNumber;
        $("#harga_satuan").val(fun.formatRupiah(unformattedNumber));
    });

    $("#harga_satuan").focus(function (event) {
        if (fun.harga !== undefined) {
            let inputValue = $(this).val();
            // Remove non-digit characters and parse the numeric value
            inputValue = inputValue.replace(/\D/g, '');

            // Format the numeric value with commas
            const formattedValue = inputValue.replace(/\B(?=(\d{3})+(?!\d))/g, '.');

            // Update the input field with the formatted value
            $(this).val(formattedValue);
        }


    });

    $("#harga_satuan").on("input", function (event) {

        // Get the key code of the pressed key
        const keyCode = event.which;

        // Check if the key code corresponds to a number (0-9) or the backspace key
        if ((keyCode < 48 || keyCode > 57) && keyCode !== 8) {
            // Prevent the default action (i.e., prevent non-numeric input)
            event.preventDefault();
        }
        let inputValue = $(this).val();

        // Remove non-digit characters and parse the numeric value
        inputValue = inputValue.replace(/\D/g, '');

        // Format the numeric value with commas
        const formattedValue = inputValue.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
        // Update the input field with the formatted value
        $(this).val(formattedValue);
    });

    fun.save = () => {
        var check = true;
        var payloads = {}
        payloads.nomor_urut = fun.nomor_urut;
        payloads.rab = fun.rab;
        $(".form-rab-detail").each((index, element) => {
            var id_element = $(element).attr("id");
            var value = $(element).val();
            $(element).attr("name", id_element);
            if (value === '') {
                swal({
                    text: id_element + " masih kosong",
                    icon: "warning"
                });
                check = false;
                return false;
            }
            payloads[id_element] = value;
        });
        if (check) {
            delete payloads.harga_satuan;
            payloads.harga = parseInt(fun.harga);
            payloads.jumlah = payloads.jumlah + " " + payloads.satuan;
            service.save_rab_rinci(payloads, res => {
                const { success } = res;
                if (success) {
                    swal({
                        text: "Simpan data berhasil",
                        icon: "success"
                    });
                    fun.get_rab_rinci(fun.data);
                    fun.get_rab();
                    fun.clear_input();
                    return;
                }
            })
        }
    }

    fun.editRincian = (row) => {
        fun.aksi = true;
        fun.id_rab_rinci = row.id;
        const { sumber_dana, rab, uraian, jumlah, harga } = row;
        fun.rab = rab;
        $("#sumber_dana").val(sumber_dana);
        $("#uraian").val(uraian);
        var str = jumlah.split(" ");
        $("#jumlah").val(str[0]);
        $("#satuan").val(str[1]);
        $("#harga_satuan").val((harga))
    }

    fun.update = () => {
        var check = true;
        var payloads = {}
        payloads.nomor_urut = fun.nomor_urut;
        payloads.rab = fun.rab;
        $(".form-rab-detail").each((index, element) => {
            var id_element = $(element).attr("id");
            var value = $(element).val();
            $(element).attr("name", id_element);
            if (value === '') {
                swal({
                    text: id_element + " masih kosong",
                    icon: "warning"
                });
                check = false;
                return false;
            }
            payloads[id_element] = value;
        });
        if (check) {
            delete payloads.harga_satuan;
            payloads.harga = parseInt(fun.harga);
            payloads.jumlah = payloads.jumlah + " " + payloads.satuan;
            service.update_rab_rinci(payloads, fun.id_rab_rinci, res => {
                const { success } = res;
                if (success) {
                    swal({
                        text: "Update data berhasil",
                        icon: "success"
                    });
                    fun.get_rab_rinci(fun.data);
                    fun.get_rab();
                    return;
                }
                swal({
                    text: "Update data gagal",
                    icon: "error"
                })
            })
        }
    }

    fun.deleteRincian = (row) => {
        service.delete_rab_rinci(row.id, res => {
            const { success } = res;
            if (success) {
                swal({
                    text: "hapus data berhasil ",
                    icon: "success"
                });
                fun.get_rab_rinci(fun.data);
                return;
            }
            swal({
                text: "hapus data gagal",
                icon: "error"
            });
        });
    }
    fun.batal = () => {
        fun.table = true;
        fun.form = false;
        fun.clear_input();
    }
});
