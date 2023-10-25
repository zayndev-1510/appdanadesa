/*jshint esversion: 6 */
$(document).ready(function () {
    $('#dataTable').DataTable();
});
var app = angular.module("homeApp", ['ngRoute', 'datatables']);


app.controller("homeController", function ($scope, service) {

    var fun = $scope;
    fun.get_all = () => {
        fun.table = true;
        fun.form = false;
        service.get_all(res => {
            const { data } = res;

            fun.anggaran_kegiatan = data;
        })
    }

    fun.get_anggaran_tahun = () => {

        service.get_anggaran_tahun(res => {
            const { data } = res;
            fun.anggaran_tahun = data;
        })
    }
    fun.get_all();
    fun.get_anggaran_tahun();


    fun.formatRupiah = (amount) => {
        const formatter = new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0
        });
        return formatter.format(amount);
    }

    fun.cetak = () => {
        const tahun_anggaran = $("#tahun_anggaran").val();
        if (tahun_anggaran === "") {
            swal({
                text: "Silakan pilih tahun anggaran !",
                icon: "warning"
            });
            return;
        }
        window.location.href = URL_APP + "admin/rab/laporan/cetak/" + tahun_anggaran;
    }



});
