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

    fun.get_anggaran_tahun=()=>{
        service.get_anggaran_tahun(res=>{
            const {data}=res;
            fun.datatemp=data;

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
            console.log(data);
        })
    }

    fun.batal = () => {
        fun.get_all();
        fun.table = true;
        fun.form = false;
    }
    fun.get_all();
    fun.get_bidang();
    fun.get_kegiatan();
    fun.get_tahun_anggaran();
    fun.get_perangkat_desa();
    fun.get_anggaran_tahun();

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

    $("#pagu").blur(function () {

        const unformattedNumber = this.value.replace(/\./g, '');
        fun.pagu = unformattedNumber;
        $("#pagu").val(fun.formatRupiah(unformattedNumber));
    });

    $("#pagu").focus(function (event) {
        if (fun.pagu !== undefined) {
            let inputValue = $(this).val();
            // Remove non-digit characters and parse the numeric value
            inputValue = inputValue.replace(/\D/g, '');

            // Format the numeric value with commas
            const formattedValue = inputValue.replace(/\B(?=(\d{3})+(?!\d))/g, '.');

            // Update the input field with the formatted value
            $(this).val(formattedValue);
        }


    });

    $("#pagu").on("input", function (event) {

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

    fun.add_form = () => {
        fun.kode_kegiatan = "";
        fun.kegiatan = "";
        $("#lokasi").val("");
        $("#waktu").val("");
        $("#volume").val("");
        $("#pagu").val("");
        $("#keluaran").val("");
        fun.id_perangkat="";
        fun.jabatan = "";
        fun.id_kegiatan = "";
        fun.ket = "Form Menambahkan Anggaran Kegiatan Desa";
        fun.aksi = false;
        fun.form = true;
        fun.table = false;
        fun.ket_input = "PIlih terlebih dahulu kegiatan desa untuk melakukan penginputan anggaran kegiatan";
    }

    fun.edit = (row) => {
        fun.aksi = true;
        const { id, kode_kegiatan, kode_sub_bidang, kode_bidang, id_kegiatan, lokasi,
            waktu, keluaran, volume,tahun_anggaran, id_perangkat, pagu, kegiatan, jabatan
        } = row;
        fun.ket = "Form Memperbarui Anggaran Kegiatan Desa";
        fun.id = id;
        fun.table = false;
        fun.form = true;
        fun.id = id;
        fun.kode_kegiatan = kode_bidang + "." + kode_sub_bidang + "." + kode_kegiatan;
        fun.kegiatan = kegiatan;
        $("#lokasi").val(lokasi);
        $("#waktu").val(waktu);
        $("#volume").val(volume);
        $("#pagu").val(pagu);
        $("#keluaran").val(keluaran);
        $("#id_perangkat_desa").val(id_perangkat);
        $("#tahun_anggaran").val(tahun_anggaran);
        fun.jabatan = jabatan;
        fun.id_kegiatan = id_kegiatan;
        fun.ket_input = "Jika ingin memperbarui anggaran kegiatan anda bisa memilih ulang kembali kegiatan jika dibutuhkan"
    }

    fun.validation = (obj) => {

        const customKeyMessages = {
            id_perangkat_desa: "perangkat Desa",
            id_kegiatan: "kegiatan"
            // Add more custom key messages as needed
        };

        for (const key in obj) {
            if (obj.hasOwnProperty(key) && !obj[key]) {
                const customKeyMessage = customKeyMessages[key] || key; // Use the custom message if available, or the original key
                return `${customKeyMessage} tidak boleh kosong.`;
            }
        }
        return null; // All properties have values
    }
    fun.save = () => {
        var payloads = [];
        $(".anggaran-kegiatan").each((index, element) => {
            const nameAttr = $(element).attr("name"); // Get the name attribute of the current element
            payloads[nameAttr] = $(element).val();
        });
        payloads["pagu"] = fun.pagu;
        payloads["id_kegiatan"] = (fun.id_kegiatan === undefined) ? "" : fun.id_kegiatan;
        var check = fun.validation(payloads);
        if (check !== null) {
            swal({
                text: check,
                icon: "warning"
            });
            return;
        }
        var obj = { ...payloads };
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
        const payloads = [];
        $(".anggaran-kegiatan").each((index, element) => {
            const nameAttr = $(element).attr("name"); // Get the name attribute of the current element
            payloads[nameAttr] = $(element).val();
        });
        payloads["pagu"] = fun.pagu;
        payloads["id_kegiatan"] = (fun.id_kegiatan === undefined) ? "" : fun.id_kegiatan;
        var obj = { ...payloads };
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
