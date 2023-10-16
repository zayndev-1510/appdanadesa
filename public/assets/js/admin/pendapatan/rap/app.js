/*jshint esversion: 6 */
$(document).ready(function () {
    $('#dataTable').DataTable();
});
var app = angular.module("homeApp", ['ngRoute', 'datatables']);


app.controller("homeController", function ($scope, service) {

    var fun = $scope;
    fun.table = true;
    var datajenis = [];
    var dataobjek = [];

    var formattedValue = "";
    fun.get_all = () => {
        service.get_all(res => {
            fun.rap = res.data;
        });
    }

    fun.get_objek = () => {
        service.get_objek(res => {
            const { kelompok, jenis, objek } = res.data;
            fun.datakelompok = kelompok;
            datajenis = jenis;
            dataobjek = objek;
        });
    }

    fun.get_all();
    fun.get_objek();


    fun.getJenis = () => {
        const id_kelompok = $(".kelompok").val();
        const filter = datajenis.filter(row => {
            return row.id_kelompok == id_kelompok;
        });
        fun.datajenis = filter;
    }

    fun.filterData = () => {
        const id_jenis = $(".jenis").val();
        const filter = dataobjek.filter(row => {
            row.status = 0;
            return row.id_jenis == id_jenis;
        })
        fun.dataobjek = filter;
    }

    fun.pilih_objek = (row) => {
        const obj = {
            id_objek: row.id,
            total: 0
        }
        service.save_data(obj, (res) => {
            if (res.success) {
                swal({
                    text: "Penambahan Rincian Anggaran Pendapatan Berhasil",
                    icon: "success"
                });
                fun.table = true;
                fun.form = false;
                fun.detail = false;
                return;
            }
            swal({
                text: "Penambahan Rincian Anggaran Pendapatan Gagal",
                icon: "error"
            });

        })

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
        fun.harga_satuan = unformattedNumber;
        $("#harga_satuan").val(fun.formatRupiah(unformattedNumber));
    });

    fun.formatNumberWithCommas = (number) => {
        // Convert the number to a string
        const numberString = number.toString();

        // Split the number into parts before and after the decimal point (if any)
        const parts = numberString.split(".");

        // Get the integer part and format it with commas
        const integerPart = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".");

        // Combine the integer part with the decimal part (if any)
        let formattedNumber = integerPart;
        if (parts.length > 1) {
            formattedNumber += "." + parts[1];
        }

        return formattedNumber;
    }

    $("#harga_satuan").focus(function (event) {
        if (fun.harga_satuan !== undefined) {
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


    fun.batal = () => {
        fun.table = true;
        fun.form = false;
        fun.detail = false;
        fun.get_all();
    }
    fun.detailRincian = (row) => {
        fun.detailtemp = row;
        fun.ket = "Menambahkan Detail Rincian Anggaran Pendapatan";
        fun.table = false;
        fun.form = false;
        fun.detail = true;
        fun.kode_rincian = row.kode_kelompok + "." + row.kode_jenis + "." + row.kode_objek;
        fun.rincian = row.rincian;
        fun.id_rap = row.id;

        service.check_nomor_urut(row.id, (res) => {
            const { detail, sumberdana } = res.data;
            const len = detail.length;
            fun.detailrap = detail;
            const totalanggaran = detail.reduce((accumulator, value) => {
                // Split the "jumlah_satuan" string and parse it as a number
                const split = value.jumlah_satuan.split(" ");
                const hargaSatuan = parseFloat(split[0]) * value.harga_satuan;

                // Add the parsed number to the accumulator
                return accumulator + hargaSatuan;
            }, 0); // Initialize the accumulator to 0

            fun.totalanggaran = totalanggaran;
            fun.datalen = len;
            fun.sumberdana = sumberdana;
            fun.no_urut = (len + 1).toString().padStart(3, '0');
        })
    }
    fun.tambah_detail_pendapatan = () => {
        $("#uraian").val("");
        $("#jumlah_satuan").val("");
        $("#harga_satuan").val("");
        $("#sumber_dana").val("");
    }
    fun.add_form = () => {
        fun.table = false;
        fun.form = true;
        fun.detail = false;
        fun.ket = "Form Menambahkan Pola Kegiatan";
        fun.aksi = false;
    }

    fun.edit = (row) => {
        fun.id = row.id;
        fun.aksi = true;
        const { no_urut, uraian, jumlah_satuan, harga_satuan, total, id_sumber } = row;
        fun.no_urut = no_urut
        $("#uraian").val(uraian);
        $("#jumlah_satuan").val(jumlah_satuan);
        $("#harga_satuan").val(fun.formatRupiah(harga_satuan));
        $("#sumber_dana").val(id_sumber);
        fun.harga_satuan = harga_satuan;
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
        const params = {};
        const elementform = $(".form-item");
        var check = 1;
        for (var i = 0; i < elementform.length; i++) {
            const value = $(".detail_rap").eq(i).val();
            const labelForFormItem = elementform.find("label");
            const labelText = labelForFormItem.eq(i).text();
            if (value === "") {
                swal({
                    text: labelText + " " + "Tidak Boleh Kosong !",
                    icon: "warning"
                })
                check = 0;
                break;
            }
            const name = $(".detail_rap").eq(i).attr("name");
            params[name] = value;
        }
        if (check > 0) {
            params.id_rap = fun.id_rap;

            params.harga_satuan = Number(fun.harga_satuan);
            const jml_satuan = params.jumlah_satuan.split(" ");
            params.id_sumber = parseInt(params.sumber_dana);
            delete params.sumber_dana;
            params.id = fun.id_rap;
            params.total = Number(jml_satuan[0]) * Number(params.harga_satuan);

            service.save_data(params, res => {
                if (res.success) {
                    swal({
                        text: "Simpan data berhasil",
                        icon: "success"
                    });
                    fun.tambah_detail_pendapatan();
                    fun.detailRincian(fun.detailtemp);
                    return;
                }
                swal({
                    text: "Simpan data gagal",
                    icon: "error"
                });
            })
        }
    }
    fun.update = () => {
        const params = {};
        const elementform = $(".form-item");
        var check = 1;
        for (var i = 0; i < elementform.length; i++) {
            const value = $(".detail_rap").eq(i).val();
            const labelForFormItem = elementform.find("label");
            const labelText = labelForFormItem.eq(i).text();
            if (value === "") {
                swal({
                    text: labelText + " " + "Tidak Boleh Kosong !",
                    icon: "warning"
                })
                check = 0;
                break;
            }
            const name = $(".detail_rap").eq(i).attr("name");
            params[name] = value;
        }
        if (check > 0) {
            params.id_rap = fun.id_rap;


            params.harga_satuan = Number(fun.harga_satuan);
            const jml_satuan = params.jumlah_satuan.split(" ");

            params.id_sumber = parseInt(params.sumber_dana);
            delete params.sumber_dana;
            params.id = fun.id_rap;
            params.total = Number(jml_satuan[0]) * Number(params.harga_satuan);
            service.update_data(params, fun.id, res => {
                if (res.success) {
                    swal({
                        text: "Perbarui data berhasil",
                        icon: "success"
                    });

                    return;
                }
                swal({
                    text: "Perbarui data gagal",
                    icon: "error"
                });
            })
        }
    }

    fun.delete = (row) => {
        service.delete_data(row.id, res => {
            if (res.success) {
                swal({
                    text: "Hapus data berhasil",
                    icon: "success"
                });
                fun.detailRincian(fun.detailtemp);
                return;
            }
            swal({
                text: "Hapus data gagal",
                icon: "error"
            });
        })
    }
});
