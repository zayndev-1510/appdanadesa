/*jshint esversion: 6 */
var app = angular.module("homeApp", ['ngRoute']);




app.controller("homeController", function ($scope, service) {

    var fun = $scope;
    var service = service;
    let tahun_aktif = 0;


    fun.formatRupiah = (amount) => {
        const formatter = new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0
        });

        return formatter.format(amount);
    }
    fun.get_anggaran_kegiatan = () => {
        service.get_anggaran_kegiatan(res => {
            const { data } = res;
            const filterdata = data.filter(value => {
                return value.tahun_anggaran == tahun_aktif;
            });
            fun.anggaran_kegiatan = filterdata;
            fun.total = filterdata.reduce((accumulator, value) =>
                accumulator + value.pagu, 0);
        });
    }

    fun.get_anggaran_pendapatan = () => {
        service.get_anggaran_pendapatan(res => {
            const { data } = res;

            const filterdata = data.filter(value => {
                return value.tahun_anggaran == tahun_aktif;
            });

            fun.rap = filterdata;
            fun.totalrap = filterdata.reduce((accumulator, value) =>
                accumulator + value.anggaran, 0);
        });
    }
    fun.get_anggaran_rab = () => {
        service.get_anggaran_rab(res => {
            const { data } = res;
            fun.datarab = data;
            fun.totalrab = data.reduce((accumulator, value) =>
                accumulator + value.anggaran, 0);
        });
    }

    fun.get_anggaran_tahun = () => {
        service.get_anggaran_tahun(res => {
            const { data } = res;
            const filter = data.filter(value => {
                return value.status == 1;
            })
            tahun_aktif = filter[0].id;
            fun.tahun_aktif = filter[0].tahun;
        });
    }
    fun.get_anggaran_tahun();
    fun.get_anggaran_kegiatan();
    fun.get_anggaran_pendapatan();
    fun.get_anggaran_rab();

});
