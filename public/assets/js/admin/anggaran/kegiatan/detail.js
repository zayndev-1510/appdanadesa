/*jshint esversion: 6 */
$(document).ready(function () {
    $('#dataTable').DataTable();
});
var app = angular.module("homeApp", ['ngRoute', 'datatables']);


app.controller("homeController", function ($scope, service) {

    var fun = $scope;

    var data_sub_bidang = [];
    var data_kegiatan = [];
    var data_perangkat_desa = [];
    var pagu_detail = 0;



    fun.get_pola_kegiatan = () => {
        service.get_pola_kegiatan(res => {
            const { data } = res;
            fun.polakegiatan = data;

        });
    }

    fun.get_form = () => {
        service.get_form(res => {
            const { data } = res;
            fun.formdata = data;
            $(".form-item").each((index, row) => {
                const element = $(row);
                var label = element.find("label");
                label.prop("for", data[index].label);
                var previouselement = label.prev();
                previouselement.prop("name", data[index].label);
                previouselement.prop("id", data[index].label);
            })
        });
    }

    fun.get_sumber_dana = () => {
        service.get_sumber_dana(res => {
            const { data } = res;
            fun.sumberdana = data;

        });
    }

    fun.get_bidang = () => {
        service.get_bidang(res => {
            const { bidang, sub_bidang } = res.data;
            fun.databidang = bidang;
            data_sub_bidang = sub_bidang;
        });
    }

    fun.get_tahun_anggaran = () => {
        service.get_tahun_anggaran(res => {
            const { data } = res;
            fun.datatahun = data;
        });
    }

    fun.get_perangkat_desa = () => {
        service.get_perangkat_desa(res => {
            const { data } = res;
            fun.dataperangkat = data;
            data_perangkat_desa = data;
        })
    }

    fun.get_kegiatan = () => {
        service.get_kegiatan(res => {
            const { kegiatan } = res.data;
            fun.datakegiatan = kegiatan;
            data_kegiatan = kegiatan;
        })
    }

    fun.get_sub_bidang = (id) => {
        const filter = data_sub_bidang.filter(res => {
            return res.id_bidang == id;
        });
        fun.data_sub_bidang = filter;
    }

    fun.filter_data = (id) => {

        if (id === undefined) {
            swal({
                text: "Silakan Pilih Bidang Dan Sub Bidang Terlebih Dahulu",
                icon: "warning"
            });
            return;
        }

        const filter = data_kegiatan.filter(row => {
            return row.id_sub_bidang == fun.id_sub_bidang;
        })

        fun.datakegiatan = filter;

    }

    fun.get_all = () => {
        fun.table = true;
        fun.form = false;
        service.get_all(res => {
            const { data } = res;
            fun.anggaran_kegiatan = data;
        })
    }
    fun.read_data_json = () => {
        fetch('/assets/js/admin/anggaran/kegiatan/data.json')
            .then(response => response.json())
            .then(data => {
                const uppercaseData = data.map(item => ({
                    label: item.label.toUpperCase()
                }));
                fun.sifatkegiatan = uppercaseData;
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }

    fun.clear_input = () => {
        $(".forms-label").each((index, element) => {
            $(element).val("");
        });
        fun.get_form();
        fun.read_data_json();
    }

    fun.get_all();
    fun.get_bidang();
    fun.get_kegiatan();
    fun.get_tahun_anggaran();
    fun.get_perangkat_desa();
    fun.get_pola_kegiatan();
    fun.get_sumber_dana();
    fun.get_form();
    fun.read_data_json();

    fun.pilih_kegiatan = (row) => {
        const { id, kode_kegiatan, kode_bidang, kode_sub_bidang, kegiatan } = row;
        fun.kode_kegiatan = kode_bidang + "." + kode_sub_bidang + "." + kode_kegiatan;
        fun.id_kegiatan = id;
        fun.kegiatan = kegiatan;
    }

    fun.get_jabatan = () => {
        const id_perangkat = fun.id_perangkat;
        const filter = data_perangkat_desa.filter(res => {
            return res.id == id_perangkat;
        })
        fun.jabatan = filter[0].jabatan;

    }

    fun.formatRupiah = (amount) => {
        const formatter = new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0
        });

        return formatter.format(amount);
    }

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

    $("#nilai").blur(function () {

        const unformattedNumber = this.value.replace(/\./g, '');
        fun.nilai = unformattedNumber;
        $("#nilai").val(fun.formatRupiah(unformattedNumber));
    });

    $("#nilai").focus(function (event) {
        if (fun.nilai !== undefined) {
            let inputValue = $(this).val();
            // Remove non-digit characters and parse the numeric value
            inputValue = inputValue.replace(/\D/g, '');

            // Format the numeric value with commas
            const formattedValue = inputValue.replace(/\B(?=(\d{3})+(?!\d))/g, '.');

            // Update the input field with the formatted value
            $(this).val(formattedValue);
        }


    });

    $("#nilai").on("input", function (event) {

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


    fun.detail_data_anggaran = (id) => {
        service.get_detail_anggaran(id, (res) => {
            const { data } = res;
            fun.detaildata = data;
            const sum = data.reduce((accumulator, row) => accumulator +row.nilai, 0);
            fun.totalnilai=fun.formatRupiah(sum);
        });
    }

    fun.edit = (row) => {
        const { id, kode_kegiatan, kode_sub_bidang, kode_bidang, id_kegiatan, lokasi,
            waktu, keluaran, volume, id_perangkat, pagu, kegiatan, jabatan, nama_lengkap,
        } = row;
        fun.ket = "Form Menambahkan Paket Kegiatan Desa";
        fun.table = false;
        fun.form = true;
        fun.id = id;
        fun.id_anggaran_kegiatan = parseInt(id);
        fun.kode_kegiatan = kode_bidang + "." + kode_sub_bidang + "." + kode_kegiatan;
        fun.kegiatan = kegiatan;
        fun.lokasi = lokasi;
        fun.jabatan = jabatan;
        fun.id_kegiatan = id_kegiatan;
        fun.ket_input = "";
        fun.karyawan = nama_lengkap;
        fun.pagu = fun.formatRupiah(pagu);
        pagu_detail = pagu;
        fun.detail_data_anggaran(id);
    }

    fun.editanggaran = (row) => {
        fun.id_detail = row.id;
        fun.aksi = true;
        const formedit = fun.formdata;
        for (var i = 0; i < formedit.length; i++) {
            const label = formedit[i].label;

            if (label === "nilai") {
                row[label] = fun.formatRupiah(row[label]);
            }
            $("#" + formedit[i].label).val(row[label]);
        }
    }
    fun.save = () => {
        var payloads = [];
        var check = true;
        $(".forms-label").each((index, element) => {

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
            payloads[name] = $(element).val();
        });
        if (check) {
            payloads["id_anggaran_kegiatan"] = fun.id_anggaran_kegiatan;
            payloads["nilai"] = parseInt(fun.nilai);
        }

        if (payloads["nilai"] > pagu_detail) {
            swal({
                text: "Nilai tidak boleh melebihi pagu !",
                icon: "warning"
            });
            return;
        }

        var obj = { ...payloads };
        service.save_detail_rak(obj, res => {
            if (res.success) {
                swal({
                    text: "Simpan data berhasil",
                    icon: "success"
                });
                fun.clear_input();
                fun.detail_data_anggaran(fun.id_anggaran_kegiatan);
                return;
            }
            swal({
                text: "Simpan data gagal",
                icon: "error"
            });
        })
    }

    fun.updateDetail = () => {
        var payloads = [];
        $(".forms-label").each((index, element) => {
            const name = $(element).attr("name");
            const value = $(element).val();
            payloads[name] = value;
        });
        payloads["id_anggaran_kegiatan"] = fun.id_anggaran_kegiatan;
        payloads["nilai"] = parseInt(fun.nilai);
        const id = fun.id_detail;
        var obj = { ...payloads };
        service.update_detail_rak(obj, id, (res) => {
            const { success } = res;
            if (success) {
                swal({
                    text: "Perbarui data berhasil",
                    icon: "success"
                });
                fun.detail_data_anggaran(fun.id_anggaran_kegiatan);
                return;
            }
            swal({
                text: "Perbarui data gagal",
                icon: "error"
            });
        })
    }

    fun.deleteanggaran = (row) => {
        service.delete_detail_rak(row.id, (res) => {
            if (res.success) {
                swal({
                    text: "Hapus data berhasil",
                    icon: "success"
                });
                fun.clear_input();
                fun.detail_data_anggaran(fun.id_anggaran_kegiatan);
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
